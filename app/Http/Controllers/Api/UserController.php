<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\SocialProvider;
use App\Models\User;

use App\Models\UserSocial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use function App\Http\Controllers\Api\V1\str_contains;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;


class UserController extends Controller
{
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', Rules\Password::defaults()],
      //'phone' => [ 'digits:10','regex:/^(05)/'],
      //'phone' => [ 'required'],
      'image' => [ 'required'],
    ]);

    if ($validator->fails()) {
      return response()->json(['status' => false, 'message' => $validator->errors()->first()], 400);
    }
      //$socials = Social::all()->sortBy('sort');
    //return $socials;
      //$image =null;
//      if ($request->file('image')) {
//          $image = Storage::put('public/users', $request->image);
//      }
      $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'title' => $request->title,
      'phone' => $request->phone ?? '',
      'code' => uniqid(),
      'image' => $request->image,
      'fcm_token' => $request->fcm_token,
      'email_verified_at' => Carbon::now(),
    ]);

      $accessToken = $user->createToken('android')->plainTextToken;

      $date = [
      'status' => true,
      'message' =>  'تم تسجيل الحساب بنجاح',
      'data' => $this->userData($user, $accessToken),
    ];
    return response()->json($date);
  }
  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => ['required', 'string', 'email', 'max:191'],
      'password' => ['required', 'string', 'min:8'],
      'device_name' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json(['status' => false, 'message' => $validator->errors()->first()], 400);
    }
    $credentials = request(['email', 'password']);
    if (!Auth::attempt($credentials)) {
      return response()->json(['status' => false, 'message' => 'البريد الالكتروني او كلمة المرور غير صحيحة'], 400);
    }
    $user =  $request->user();
    if ( $request->has('fcm_token') && $request->fcm_token != ''){
      $user->update(['fcm_token' => $request->fcm_token]);
    }
    $accessToken = $user->createToken($request->device_name)->plainTextToken;

    $date = [
      'status' => true,
      'message' => 'تم تسجيل الدخول',
      'data' =>  $this->userData($user, $accessToken)
    ];
    return response()->json($date);
  }

    public function updateNotification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'allow' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'data' => null
            ], 400);
        }
        $allow = $request->allow == "true" ? 1 : 0;
        auth()->user()->update([
           'allow_notification'  => $allow
        ]);

        return response()->json([
            'status' => true,
            'message' => 'updated',
            'data' => null
        ]);
    }
    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:191'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first()], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'البريد الالكتروني غير موجود'], 400);
        }

        $code = rand(100000, 999999);

        Mail::to($user->email)->send(new VerificationCodeMail($code, $user->name));
        try {
            // Send the verification code email to the user

            $data = [
                'status' => true,
                'message' => 'تم ارسال الكود الى البريد الالكتروني',
                'data' => $code
            ];

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e], 500);
        }
    }
  public function checkCode(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => ['required', 'string', 'email', 'max:191'],
      'code' => ['required', 'string'],
    ]);
    if ($validator->fails()) {
      return response()->json(['status' => false, 'message' => $validator->errors()->first()], 400);
    }
    //$user = User::where('email', $request->email)->first();
    if ($request->code != 123456) {
      return response()->json(['status' => false, 'message' => 'الكود غير صحيح'], 400);
    }
    $date = [
      'status' => true,
      'message' => 'الكود صحيح من فضلك ادخل الباسودر الجديد'
    ];
    return response()->json($date);
  }

  public function createPassword(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => ['required', 'string', 'email', 'max:191'],
      'password' => ['required', 'string', 'min:8'],
     // 'device_name' => 'required',
    ]);
    if ($validator->fails()) {
      return response()->json(['status' => false, 'message' => $validator->errors()->first()], 400);
    }
    $user = User::where('email', $request->email)->first();
    if (!$user) {
      return response()->json(['status' => false, 'message' => 'البريد الالكتروني غير موجود'], 400);
    }
    $user->update(['password' => Hash::make($request->password)]);
    $accessToken = $user->createToken('android')->plainTextToken;
    $date = [
      'status' => true,
      'message' => 'تم تغير الباسورد بنجاح',
      'data' => $this->userData($user, $accessToken)
    ];
    return response()->json($date);
  }


  public function profile(Request $request)
  {
    $user = auth()->user();
    $token = PersonalAccessToken::findToken($request->bearerToken());

    if (!$token){
      $accessToken = $user->createToken($request->device_name)->plainTextToken;
    }else{
      $accessToken = $request->bearerToken();
    }
    $date = [
      'status' => true,
      'message' => null,
      'data' => $this->userData($user, $accessToken)
    ];
    return response()->json($date);
  }

  public function updateProfile(Request $request)
  {
    //dd($request->all());
    $user = auth()->user();
    $data = $request->all();
    if ($request->old_password){
      $rules = [
        'old_password' => [
          function ($attribute, $value, $fail) use ($user) {
            if (!Hash::check($value, $user->password)) {
              $fail('الباسورد القديمة غير صحيحة');
            }
          }
        ],
        'password' => [ 'required', 'confirmed', Rules\Password::defaults()],
      ];
      $data['password'] = Hash::make($request->password);
    } else{
      $rules = [
        //'name' => [ 'string', 'max:255'],
        'email' => [ 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id, 'id')],
      ];
    }

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      return response()->json(['status' => false, 'message' => $validator->errors()->first()], 400);
    }
//    if ($request->file('image')) {
//      if ($user->image && Storage::exists($user->image)) {
//        Storage::delete($user->image);
//      }
//      $image = Storage::put('public/users', $request->image);
//      $data['image'] = $image;
//    }

    $user->update($data);
    $date = [
      'status' => true,
      'message' => 'تم تعديل بيانات الحساب بنجاح',
      'data' => $this->userData($user, $request->bearerToken())
    ];
    return response()->json($date);
  }
  public function delete(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'password' => ['required'],
    ]);
    if ($validator->fails()) {
      return response()->json(['status' => false, 'message' => $validator->errors()->first()], 400);
    }
    $user = auth()->user();
    if (!$user) {
      return response()->json(['status' => false, 'message' => 'المستخدم غير موجود'], 400);
    }
    $check_password = Hash::check($request->password, $user->password);
    if (!$check_password) {
      return response()->json(['status' => false, 'message' => 'الباسورد غير صحيح'], 400);
    }

    $user->delete();
    $date = [
      'status' => true,
      'message' => 'تم حذف الحساب بنجاح'
    ];
    return response()->json($date);
  }

  public function updateFcmToken(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'fcm_token' => ['required'],
      //'notification_permission' => ['required'],
    ]);
    if ($validator->fails()) {
      return response()->json(['status' => false, 'message' => $validator->errors()->first()], 400);
    }

    $request->user()->update(['fcm_token' => $request->fcm_token]);

    $date = [
      'status' => true,
      'message' =>  'FCM updated Successfully'
    ];
    return response()->json($date);
  }
  public function userData($user, $token)
  {
    $socials = $user->socials->sortBy('sort')->map(function ($map){

          if ($map->social->image) {
              $image_url = url(Storage::url($map->social->image));
          }else{
              $image_url = url(asset('/images/avatar.png'));
          }
          return [
              'id' => $map->social_id,
              'name' => $map->social->name,
              'url' => $map->url,
              'status' => $map->status,
              'image' => $image_url,

          ];
      })->values();
    $services = $user->services->sortBy('sort')->map(function ($map){
          return [
              'id' => $map->id,
              'title' => $map->title,
              'description' => $map->description,
              'url' => $map->url,
              'status' => $map->status,


          ];
      })->values();

        return [
            'user' => [
                'id' => $user->id,
                'code' => $user->code,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? null,
                'image' => $user->image,
                'title' => $user->title,
                'bio' => $user->bio,
                'access_token' => $token,
            ],
            'socials' => $socials,
            'services' => $services
        ];
  }

    public function users()
    {
        $users = User::all()->map(function ($map){
//            if ($map->image) {
//                $image_url = url(Storage::url($map->image));
//            }else{
//                $image_url = asset('/images/avatar.png');
//            }
            $code =  $map->code ?? 123231;
            return [
                'name' => $map->name,
                'code' => $map->code,
                'image' => $map->image,
                'url' =>route('user.profile', $code ),
                'printed' => (bool)$map->printed,
            ];
        });
        return [
          'users' => $users
        ];

    }
    public function user($code)
    {
        $user = User::where('code', $code)->first();
        if (!$user)
            return response()->json(['status' => false, 'message'=> 'Not found user']);


       $data = $user->socials->sortBy('sort')->map(function ($map){

            if ($map->social->image) {
                $image_url = url(Storage::url($map->social->image));
            }else{
                $image_url = url(asset('/images/avatar.png'));
            }
            return [
                'id' => $map->id,
                'name' => $map->social->name,
                'url' => $map->url,
                'image' => $image_url,

            ];
        });
//        if ($user->image) {
//            $image_url = $user->image; //url(Storage::url($user->image));
//        }else{
//            $image_url = url(asset('/images/avatar.png'));
//        }
        return [
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone ?? null,
                    'image' => $user->image,
                    'title' => $user->title,
                    'bio' => $user->bio,
                ],
                'socials' => $data
            ]
        ];

    }
}
