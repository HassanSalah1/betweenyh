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


class SocialController extends Controller
{
    public function socials()
  {
     $socials = Social::all()->sortBy('sort')->map(function ($map){
        return[
         'id' => $map->id,
         'name' => $map->name,
         'image' =>  url(Storage::url($map->image))
        ];
     });

    $date = [
      'status' => true,
      'socials' =>  $socials
    ];
    return response()->json($date);
  }
    public function userSocials()
    {
        $socials = auth()->user()->socials->sortBy('sort')->map(function ($map){
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

        $date = [
            'status' => true,
            'message' => null,
            'data' =>  $socials
        ];
        return response()->json($date);
    }

    public function createOrUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
            'url' => ['required'],
            'status' => ['required'],

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first()], 400);
        }
         UserSocial::updateOrCreate([
             'user_id'   => Auth::user()->id,
             'social_id' => $request->id
         ],
         [
             'user_id'   => Auth::user()->id,
             'social_id' => $request->id,
             'url' => $request->url,
             'status' => $request->status,
             'sort' => $request->sort ?? UserSocial::where('user_id',Auth::user()->id)->max('sort')+1,
         ]
         );
        $date = [
            'status' => true,
            'message' => 'Added Successfully',
            'data' => null
        ];
        return response()->json($date);
    }
    public function update(Request $request)
    {

        foreach ($request->all() as $data) {
            UserSocial::updateOrInsert(['id' => $data['id']], $data);
        }

        $date = [
            'status' => true,
            'message' => 'Updated Successfully',
            'data' => null,
        ];
        return response()->json($date);
    }
    public function destroy($id)
    {
        $social = UserSocial::where( ['social_id' => $id])->first();
        if ($social){
            $social->delete();
            $date = [
                'status' => true,
                'message' => 'Deleted Successfully',
                'data' => null,
            ];
            return response()->json($date);
        }
        $date = [
            'status' => true,
            'message' => 'Social not found',
            'data' => null,
        ];
        return response()->json($date);
    }
}
