<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrders(){
        $orders = Order::where('user_id', auth()->id())->get();
        return view('pages.create-order', compact('orders'));
    }

    public function showCreateOrder(){
        $services = Service::all();
        return view('pages.form-order', compact('services'));
    }

    public function createOrder(Request $request){
        // dd($request);
        $data = $request->validate([
            'address' => 'required|min:10',
            'date' => 'required',
            'time' => 'required',
            'phone' => 'required',
            'service_id' => 'nullable|exists:services,id',
            'other_service' => 'nullable',
            'payment' => 'required'
        ]);

        $data['user_id'] = auth()->id();

        Order::create($data);

        return redirect()->route('view.orders');
    }

    public function showAdmin(){
        $orders = Order::all();
        return view('pages.admin', compact('orders'));
    }

    public function updateStatus(Request $request, $id){
        $data = $request->validate([
            'status' => 'required',
            'comment' => 'nullable'
        ]);

        if($request->input('status') === 'отменено'){
            if(empty($request->input('comment'))){
                return back()->withErrors(['error'=> 'Не заполнен комментарий']);
            }
        }

        $order = Order::findOrFail($id);
        $order->update($data);

        return redirect()->back();
    }
}
