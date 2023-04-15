<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function order()
  {
      $order = auth()->user()->order;
      if (!$order){
          $date = [
              'status' => false,
              'message' =>  'User does not have order ' ,
              'data' => null
          ];
          return response()->json($date);
      }
      $date = [
          'status' => true,
          'message' =>  "Your order status $order->status" ,
          'data' => null
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
    public function confirm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'confirm' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'data' => null
            ], 400);
        }
        $order = auth()->user()->order;
        if (!$order){
            $date = [
                'status' => false,
                'message' =>  'User does not have order ' ,
                'data' => null
            ];
            return response()->json($date);
        }
        if ($request->confirm == true){
            $order->update([
                'status' => 'Confirmed'
            ]);
            $date = [
                'status' => true,
                'message' =>  "Your order status changed successfully" ,
                'data' => null
            ];
            return response()->json($date);

        }
        $date = [
            'status' => true,
            'message' =>  "Your order status not Confirmed" ,
            'data' => null
        ];
        return response()->json($date);
    }
}
