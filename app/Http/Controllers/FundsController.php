<?php

namespace App\Http\Controllers;

use App\Models\Funds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FundsController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        $funds = Funds::get();
        return view('admin.funds.index', compact('funds'));
    }

    public function datatable(Request $request)
    {

        $columns = ['id', 'user_id', 'amount','transaction_date','payment_method', 'status', 'added_by'];

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order_column = $columns[$request->input('order.0.column', 0)];
        $order_direction = $request->input('order.0.dir', 'asc');
        $search  = json_decode($request->input('search.value'), true);

        $query = Funds::select($columns)
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

        $records_total = Funds::count();
        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $data
        ]);
    }

    public function add()
    {
        $funds = new Funds();
        return view('admin.funds.add',compact('funds'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'payment_method' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/funds/add')->withErrors($validator)->with('error', 'Some Error Occurred with input fields. Please try again.')->withInput();
        }
        $imageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension(); // Generate a unique name for the image
            $image->storeAs('uploads/funds', $imageName, 'public'); // Save the image to the public/uploads folder
            $data['image'] = $imageName;
        }
        $data = [];
        $data['user_id'] = Auth::guard('web')->id();
        $data['amount'] = $request->input('amount');
        $data['transaction_date'] = now(); // Assuming you want to set the current timestamp
        $data['payment_method'] = $request->input('payment_method');
        $data['image'] = $imageName;
        $data['added_by'] = Auth::guard('web')->id();
        $data['updated_by'] = Auth::guard('web')->id();
        if (Funds::create($data)) {
            return redirect('/funds')->with('success', 'Record is stored successfully.');
        }
    }
    public function edit($id)
    {
        if (!$id) {
            return abort(401);
        }
        $funds = Funds::where([
            'id' => $id
        ])->first();
        return view('admin.funds.edit', compact('funds'));
    }
    public function edit_store(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }
        $imageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension(); // Generate a unique name for the image
            $image->storeAs('uploads/funds', $imageName, 'public'); // Save the image to the public/uploads folder
            $data['image'] = $imageName;
        }

        $data = [];
        $data['user_id'] = Auth::guard('web')->id();
        $data['amount'] = $request->input('amount');
        $data['transaction_date'] = $request->input('amount');
        $data['payment_method'] = $request->input('payment_method');
        $data['image'] = $imageName;
        $data['status'] = $request->input('status');
        $data['updated_by'] = Auth::guard('web')->id();


        $notes = Funds::where([
            'id' => $id
        ])->update($data);
        if ($notes) {
            return redirect('/funds')->with('success', 'Record is updated successfully.');
        } else {
            return redirect('/funds/edit/{$id}')->with('error', 'Something went wrong.');
        }
    }
    public function delete(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }


        $del = Funds::where([
            'id' => $id
        ])->delete();
        if ($del) {
            return redirect('/funds')->with('success', 'Record is deleted successfully.');
        } else {
            return redirect('/funds')->with('error', 'Something went wrong.');
        }
    }
    public function details($id)
    {
        if (!$id) {
            return abort(401);
        }
        $fund = Funds::where([
            'id' => $id
        ])->first();


        return view('admin.funds.details', compact('fund'));
    }
}
