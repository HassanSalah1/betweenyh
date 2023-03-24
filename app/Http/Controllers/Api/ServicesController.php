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
     $services = Services::all()->map(function ($map){
        return[
         'id' => $map->id,
         'title' => $map->title,
         'description' => $map->description,
         'url' => $map->url,

        ];
     });

    $date = [
      'status' => true,
      'services' =>  $services
    ];
    return response()->json($date);
  }

    public function createOrUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
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
         ]
         );
        $date = [
            'status' => true,
            'message' => 'Added Successfully'
        ];

        return response()->json($date);

    }
}
