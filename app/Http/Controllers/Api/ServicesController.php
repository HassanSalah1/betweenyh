<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Services;
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


class ServicesController extends Controller
{

    public function services()
  {
     $services = auth()->user()->services->map(function ($map){
        return[
         'id' => $map->id,
         'title' => $map->title,
         'description' => $map->description,
         'url' => $map->url,
        ];
     })->values();

    $date = [
      'status' => true,
      'message' => null,
      'data' =>  $services
    ];
    return response()->json($date);
  }

    public function createOrUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            //'description' => ['required'],
            'url' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first()], 400);
        }
         Services::updateOrCreate([
             'id' => $request->id
         ],
         [
             'user_id'   => Auth::user()->id,
             'title' => $request->title,
             'description' => $request->description,
             'url' => $request->url,
             'sort' => Services::where('user_id',Auth::user()->id)->max('sort')+1,
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
            Services::updateOrInsert(['id' => $data['id']], $data);
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
        $service = Services::find($id);

        if ($service){
            $service->delete();
            $date = [
                'status' => true,
                'message' => 'Deleted Successfully',
                'data' => null,
            ];
            return response()->json($date);
        }
        $date = [
            'status' => true,
            'message' => 'Service not found',
            'data' => null,
        ];
        return response()->json($date);
    }
}
