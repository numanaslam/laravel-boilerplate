<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permisssions;
use Illuminate\Support\Facades\Validator;

class PermissionsController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        $permissions = Permisssions::get();
        return view('admin.permissions.index', compact('permissions'));
    }
    public function datatable(Request $request)
    {

        $columns = ['id', 'name'];

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order_column = $columns[$request->input('order.0.column', 0)];
        $order_direction = $request->input('order.0.dir', 'asc');
        $search  = json_decode($request->input('search.value'), true);
        // print_r($search);
        //  dd($search);
        $query = Permisssions::select($columns)
            ->orderBy($order_column, $order_direction);

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                if (!empty($search['s_id'])) {
                    $query->where('id', 'like', '%' . $search['s_id'] . '%');
                }
                if (!empty($search['s_name'])) {
                    $query->where('name', 'like', '%' . $search['s_name'] . '%');
                }
            });
        }

        $records_filtered = $query->count();
        $data = $query->offset($start)
            ->limit($length)
            ->get();

        $records_total = Permisssions::count();

        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $data
        ]);
    }
    public function add()
    {
        $permission = new Permisssions();
        return view('admin.permissions.add', compact('permission'));
    }
    public function store(Request $request)
    {
        //  dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/permissions/add')->withErrors($validator)->with('error', 'Some Error Occurred with input fields. Please try again.')->withInput();
        }
        $data = [];
        $data['name'] = $request->input('name');
        $data['guard'] = 'web';
        if ($role = Permisssions::create($data)) {

            return redirect('/permissions')->with('success', 'Record is stored successfully.');
        }
    }
    public function edit($id)
    {
        if (!$id) {
            return abort(401);
        }
        $permission = Permisssions::where([
            'id' => $id
        ])->first();

        return view('admin.permissions.edit', compact('permission'));
    }
    public function edit_store(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }

        $data = [];
        $data['name'] = $request->input('name');


        $permissions = Permisssions::where([
            'id' => $id
        ])->update($data);

        // get old permissions and revoke those
        $role = Permisssions::where([
            'id' => $id
        ])->first();
        $permissions = $role->permissions;
        foreach ($permissions as $p) {
            $role->revokePermissionTo($p);
        }
        // now assign new permissions to role
        $permissions = $request->input('permissions');
        foreach ($permissions as $p) {
            $role->givePermissionTo($p);
        }


        if ($permissions) {
            return redirect('/permissions')->with('success', 'Record is updated successfully.');
        } else {
            return redirect('/permissions/edit/{$id}')->with('error', 'Something went wrong.');
        }
    }
    public function delete(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }


        $del = Permisssions::where([
            'id' => $id
        ])->delete();
        if ($del) {
            return redirect('/permissions')->with('success', 'Record is deleted successfully.');
        } else {
            return redirect('/permissions')->with('error', 'Something went wrong.');
        }
    }
}
