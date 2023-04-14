<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
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


class OrderController extends Controller
{
    public function order()
  {
      $order = auth()->user()->order;
      if (!$order){
          $date = [
              'status' => false,
              'message' =>  'User does not have order ' ,
              'data' => ''
          ];
          return response()->json($date);
      }
      $date = [
          'status' => true,
          'message' =>  "Your order status $order->status" ,
          'data' => ''
      ];
      return response()->json($date);
      //Request
      //Processing
      //Waiting confirmation from client
      //Confirmed
      //Shipped
      //Delivered successfully
  }
  public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => ['required'],
            'phone' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'data' => null
            ], 400);
        }
         Order::create([
             'user_id'   => Auth::user()->id,
             'address' => $request->address,
             'phone' => $request->phone
         ]
         );
        $date = [
            'status' => true,
            'message' => 'Your Request Added Successfully',
            'data' => null
        ];
        return response()->json($date);
    }
}