<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()

    {
        $this->middleware('role:Admin')->only('index','show');
        $this->middleware('role:Customer')->only('store','order_history');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    { 
        $date1 = $request->sdate;
        $date2 = $request->edate;

        if ($request->sdate && $request->edate) {
            $orders = Order::whereBetween('orderdate', [($date1),($date2)])->where('status',0)->get();
        }else{
            $orders = Order::all();
        }

        return view('backend.orders.orderlist',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $catArr = json_decode($request->shop_data);

        $total = 0;

        foreach ($catArr as $key => $row) {
            $total+=(($row->price-$row->discount) * $row->qty);
        }

        $order =new Order;
        $order->voucherno = uniqid();
        $order->orderdate = date('Y-m-d');
        $order->user_id =Auth::id();
        $order->total = $total;
        $order->note= $request->note;
        $order->save();

        foreach ($catArr as $key => $row) {
            $order->items()->attach($row->id,['qty'=>$row->qty]);
            # code...
        }
        return 'Successful';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
       
        return view('backend.orders.orderdetail',compact('order'));
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

     public function order_history()
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id',$user_id)->orderBy('id','DESC')->get();
        return view('orders_history',compact('orders'));
    }
}
