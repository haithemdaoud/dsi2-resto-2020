<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Order;
use App\OrderLine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      
        $user_id=auth('api')->user()->id;
        $data=json_decode($request->data);
      
        
        $order=new Order();
        $order->tax_rate=0.18;
        $order->tax_amount=0;
        $order->total_amount=0;
        $order->user_id=$user_id;
        $order->save();
        
        $order_id=$order->id;
        $total=0;
       
        foreach($data as $item)
        {
            
            $orderLine=new OrderLine();
               
                
                $orderLine->order_id=$order_id;
                $orderLine->meal_id=$item->id;
                $orderLine->quantity_ordered=$item->quantity;
                $orderLine->price_each=$item->sell_price;
                $orderLine->save();
                
                $total+=($item->quantity*$item->sell_price);
        }
        $order->total_amount=$total;
        $order->tax_amount=($total*0.18);
        $order->save();
        return response($order, Response::HTTP_CREATED);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
   
}
