<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        $services = Services::get();
        return view('admin.services.index', compact('services'));
    }

    public function datatable(Request $request)
    {

        $columns = ['id', 'title', 'category_id', 'link', 'start_time', 'speed_per_day', 'average_time', 'refill', 'description', 'price', 'status', 'added_by', 'updated_by'];


        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order_column = $columns[$request->input('order.0.column', 0)];
        $order_direction = $request->input('order.0.dir', 'asc');
        $search  = json_decode($request->input('search.value'), true);

        $query = Services::select($columns)
            ->orderBy($order_column, $order_direction);
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                if (!empty($search['s_id'])) {
                    $query->where('id', 'like', '%' . $search['s_id'] . '%');
                }
                if (!empty($search['s_title'])) {
                    $query->where('title', 'like', '%' . $search['s_title'] . '%');
                }
                if (!empty($search['s_details'])) {
                    $query->where('description', 'like', '%' . $search['s_details'] . '%');
                }

            });
        }
        $records_filtered = $query->count();
        $data = $query->offset($start)->limit($length)->get();

        $records_total = Services::count();
        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $data
        ]);
    }

    public function add()
    {
        $services = new Services();
        $categories = Categories::get();
        return view('admin.services.add',compact('services','categories'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/services/add')->withErrors($validator)->with('error', 'Some Error Occurred with input fields. Please try again.')->withInput();
        }
        $data = [];
        $data = [
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'link' => $request->input('link'),
            'start_time' => $request->input('start_time'),
            'speed_per_day' => $request->input('speed_per_day'),
            'average_time' => $request->input('average_time'),
            'refill' => $request->input('refill'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'added_by' => Auth::guard('web')->id(),
            'updated_by' => Auth::guard('web')->id(),
        ];

        if (Services::create($data)) {
            return redirect('/services')->with('success', 'Record is stored successfully.');
        }
    }
    public function edit($id)
    {
        if (!$id) {
            return abort(401);
        }
        $services = Services::where([
            'id' => $id
        ])->first();
        $categories = Categories::get();
        return view('admin.services.edit', compact('services','categories'));
    }
    public function edit_store(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }

        $data = [
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'link' => $request->input('link'),
            'start_time' => $request->input('start_time'),
            'speed_per_day' => $request->input('speed_per_day'),
            'average_time' => $request->input('average_time'),
            'refill' => $request->input('refill'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'updated_by' => Auth::guard('web')->id(),
        ];



        $notes = Services::where([
            'id' => $id
        ])->update($data);
        if ($notes) {
            return redirect('/services')->with('success', 'Record is updated successfully.');
        } else {
            return redirect('/services/edit/{$id}')->with('error', 'Something went wrong.');
        }
    }
    public function delete(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }


        $del = Services::where([
            'id' => $id
        ])->delete();
        if ($del) {
            return redirect('/services')->with('success', 'Record is deleted successfully.');
        } else {
            return redirect('/services')->with('error', 'Something went wrong.');
        }
    }
}
