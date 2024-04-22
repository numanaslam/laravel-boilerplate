<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        $orders = Orders::get();
        return view('admin.orders.index', compact('orders'));
    }

    public function datatable(Request $request)
    {

        $columns = ['id', 'customer_id', 'service_id', 'order_date', 'order_status','total_amount'];

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order_column = $columns[$request->input('order.0.column', 0)];
        $order_direction = $request->input('order.0.dir', 'asc');
        $search  = json_decode($request->input('search.value'), true);

        $query = Orders::select($columns)
            ->orderBy($order_column, $order_direction);
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                if (!empty($search['s_id'])) {
                    $query->where('id', 'like', '%' . $search['s_id'] . '%');
                }
                if (!empty($search['s_name'])) {
                    $query->where('title', 'like', '%' . $search['s_name'] . '%');
                }
                if (!empty($search['s_email'])) {
                    $query->where('details', 'like', '%' . $search['s_email'] . '%');
                }
            });
        }
        $records_filtered = $query->count();
        $data = $query->offset($start)->limit($length)->get();

        $records_total = Orders::count();
        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $data
        ]);
    }

    public function add()
    {
        $orders = new Orders();
        $categories = Categories::get();
        $services = Services::get();
        return view('admin.orders.add', compact('orders','categories','services'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'link' => 'required',
            'service_id' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/orders/add')->withErrors($validator)->with('error', 'Some Error Occurred with input fields. Please try again.')->withInput();
        }
        $services = Services::where([
            'id' => $request->input('service_id')
        ])->first();
        $unit_price = isset($services->price)?$services->price:0;
        $data = [];
        $data['customer_id'] = Auth::guard('web')->id();
        $data['service_id'] = $request->input('service_id');
        $data['order_date'] =  now();
        $data['quantity'] = $request->input('quantity');
        $data['unit_price'] = $unit_price;
        $data['total_amount'] = (float)$unit_price * (int)$request->input('quantity');
        $data['payment_method'] = '';
        $data['special_instructions'] = $request->input('special_instructions')?$request->input('special_instructions'):"";
        $data['added_by'] = Auth::guard('web')->id();
        $data['updated_by'] = Auth::guard('web')->id();
        if (Orders::create($data)) {
            return redirect('/orders')->with('success', 'Record is stored successfully.');
        }
    }
    public function edit($id)
    {
        if (!$id) {
            return abort(401);
        }
        $orders = Orders::where([
            'id' => $id
        ])->first();
        return view('admin.orders.edit', compact('orders'));
    }
    public function edit_store(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }

        $data = [];
        $data['customer_id'] = $request->input('customer_id');
        $data['service_id'] = $request->input('service_id');
        $data['order_date'] = $request->input('order_date');
        $data['order_status'] = $request->input('order_status');
        $data['quantity'] = $request->input('quantity');
        $data['unit_price'] = $request->input('unit_price');
        $data['total_amount'] = $request->input('total_amount');
        $data['payment_method'] = $request->input('payment_method');
        $data['special_instructions'] = $request->input('special_instructions');
        $data['updated_by'] = Auth::guard('web')->id();


        $notes = Orders::where([
            'id' => $id
        ])->update($data);
        if ($notes) {
            return redirect('/orders')->with('success', 'Record is updated successfully.');
        } else {
            return redirect('/orders/edit/{$id}')->with('error', 'Something went wrong.');
        }
    }
    public function delete(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }


        $del = Orders::where([
            'id' => $id
        ])->delete();
        if ($del) {
            return redirect('/orders')->with('success', 'Record is deleted successfully.');
        } else {
            return redirect('/orders')->with('error', 'Something went wrong.');
        }
    }
}
