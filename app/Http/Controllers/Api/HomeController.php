<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
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


class HomeController extends Controller
{
    public function index()
      {
          $date = [
              'status' => true,
              'message' => null,
              'data' =>  [
                  'app_version' => 1,
                  'allow_notification' => true,
                  'about' => optional(Page::where('slug', 'about')->first())->body,
                  'terms' => optional(Page::where('slug', 'terms')->first())->body,
              ]
            ];
        return response()->json($date);
      }
}
