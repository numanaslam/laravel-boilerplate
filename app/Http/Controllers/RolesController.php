<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        $roles = Roles::get();
        return view('admin.roles.index', compact('roles'));
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
        $query = Roles::select($columns)
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

        $records_total = Roles::count();

        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $data
        ]);
    }
    public function add()
    {
        $roles = new Roles();
        return view('admin.roles.add', compact('roles'));
    }
    public function store(Request $request)
    {
        //  dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/roles/add')->withErrors($validator)->with('error', 'Some Error Occurred with input fields. Please try again.')->withInput();
        }
        $data = [];
        $data['name'] = $request->input('name');
        if ($role = Roles::create($data)) {
            $permissions = $request->input('permissions');
            foreach ($permissions as $p) {
                $role->givePermissionTo($p);
            }
            return redirect('/roles')->with('success', 'Record is stored successfully.');
        }
    }
    public function edit($id)
    {
        if (!$id) {
            return abort(401);
        }
        $roles = Roles::where([
            'id' => $id
        ])->first();
        $permissions = $roles->permissions;
        // dd($permissions);
        return view('admin.roles.edit', compact('roles', 'permissions'));
    }
    public function edit_store(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }

        $data = [];
        $data['name'] = $request->input('name');


        $roles = Roles::where([
            'id' => $id
        ])->update($data);

        // get old permissions and revoke those
        $role = Roles::where([
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


        if ($roles) {
            return redirect('/roles')->with('success', 'Record is updated successfully.');
        } else {
            return redirect('/roles/edit/{$id}')->with('error', 'Something went wrong.');
        }
    }
    public function delete(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }


        $del = Roles::where([
            'id' => $id
        ])->delete();
        if ($del) {
            return redirect('/roles')->with('success', 'Record is deleted successfully.');
        } else {
            return redirect('/roles')->with('error', 'Something went wrong.');
        }
    }
}
