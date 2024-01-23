<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        $categories = Categories::get();
        return view('admin.categories.index', compact('categories'));
    }

    public function datatable(Request $request)
    {

        $columns = ['id', 'title', 'details', 'status', 'added_by'];

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order_column = $columns[$request->input('order.0.column', 0)];
        $order_direction = $request->input('order.0.dir', 'asc');
        $search  = json_decode($request->input('search.value'), true);

        $query = Categories::select($columns)
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

        $records_total = Categories::count();
        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $data
        ]);
    }

    public function add()
    {
        $categories = new Categories();
        return view('admin.categories.add',compact('categories'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/categories/add')->withErrors($validator)->with('error', 'Some Error Occurred with input fields. Please try again.')->withInput();
        }
        $data = [];
        $data['title'] = $request->input('title');
        $data['details'] = $request->input('details');
        $data['status'] = $request->input('status');
        $data['added_by'] = Auth::guard('web')->id();
        $data['updated_by'] = Auth::guard('web')->id();
        if (Categories::create($data)) {
            return redirect('/categories')->with('success', 'Record is stored successfully.');
        }
    }
    public function edit($id)
    {
        if (!$id) {
            return abort(401);
        }
        $categories = Categories::where([
            'id' => $id
        ])->first();
        return view('admin.categories.edit', compact('categories'));
    }
    public function edit_store(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }

        $data = [];
        $data['title'] = $request->input('title');
        $data['details'] = $request->input('details');
        $data['status'] = $request->input('status');
        $data['updated_by'] = Auth::guard('web')->id();


        $notes = Categories::where([
            'id' => $id
        ])->update($data);
        if ($notes) {
            return redirect('/categories')->with('success', 'Record is updated successfully.');
        } else {
            return redirect('/categories/edit/{$id}')->with('error', 'Something went wrong.');
        }
    }
    public function delete(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }


        $del = Categories::where([
            'id' => $id
        ])->delete();
        if ($del) {
            return redirect('/categories')->with('success', 'Record is deleted successfully.');
        } else {
            return redirect('/categories')->with('error', 'Something went wrong.');
        }
    }
}
