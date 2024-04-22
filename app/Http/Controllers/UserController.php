<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public $user = NULL;
    public function index()
    {
        //         $user= User::find(Auth::guard('web')->id());
        //         $user = User::find(21);
        //         echo "//////////";
        // print_r($user->hasPermissionTo('edit users'));
        //print_r( $hasPermission = auth()->user()->role->hasPermissionTo('edit articles'));

        //  $user = User::find(21);
        // $role = Role::findByName('administrator');

        // $user->assignRole($role);


        // $roleName = $user->roles->first();

        // echo "<pre>";
        // print_r($roleName);
        // echo "</pre>";
        // echo "/------";
        // // Get the permission
        // $permission = ModelsPermission::find(1);
        // echo "<pre>";
        // print_r($permission);
        // echo "</pre>";

        // // Assign the permission to the user
        // $user->syncPermissions($permission);

        // $permissions = $user->permissions;

        // foreach ($permissions as $permission) {
        //     echo "///".$permission->name;
        // }


        // foreach ($user->roles as $role) {
        //     echo $role->name;
        // }

        // dd($user);
        $notes = User::get();
        return view('admin.users.index', compact('notes'));
    }
    public function datatable(Request $request)
    {

        $columns = ['id', 'name', 'email', 'phone', 'is_active'];

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order_column = $columns[$request->input('order.0.column', 0)];
        $order_direction = $request->input('order.0.dir', 'asc');
        $search  = json_decode($request->input('search.value'), true);
        $query = User::select($columns)
            ->orderBy($order_column, $order_direction);

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                if (!empty($search['s_id'])) {
                    $query->where('id', 'like', '%' . $search['s_id'] . '%');
                }
                if (!empty($search['s_name'])) {
                    $query->where('name', 'like', '%' . $search['s_name'] . '%');
                }
                if (!empty($search['s_email'])) {
                    $query->where('email', 'like', '%' . $search['s_email'] . '%');
                }
            });
        }

        $records_filtered = $query->count();
        $data = $query->offset($start)
            ->limit($length)
            ->get();
        foreach ($data as $d) {


            if ($d['is_active'] == '0') {
                $d['is_active'] = '<span class="badge badge-light-warning">InActive</span>';
            } else if ($d['is_active'] == '1') {
                $d['is_active'] = '<span class="badge badge-light-success">Active</span>';
            }
        }
        $records_total = User::count();

        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $data
        ]);
    }
    public function add()
    {
        $users = new User();
        $roles = Roles::get();
        $access_levels = ['from_all', 'ip_restricted'];
        $user_roles = $users->getRoleNames();
        return view('admin.users.add', compact('users', 'roles', 'access_levels', 'user_roles'));
    }
    public function register()
    {
        return view('admin.users.register');
    }
    public function addUser(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'email|required|unique:users|max:255',
            'role' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/users/add')->withErrors($validator)->with('error', 'Some Error Occurred with input fields. Please try again.')->withInput();
        }

        $is_active = 1;
        if (!$request->input('is_active')) {
            $is_active = 0;
        }
        $data = [];
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['nick_name'] = $request->input('nick_name');
        $data['user_name'] = $request->input('user_name');
        $data['address'] = $request->input('address');
        $data['commission_upto_1000'] = $request->input('commission_upto_1000');
        $data['commission_above_1000'] = $request->input('commission_above_1000');
        $data['access_level'] = $request->input('access_level');
        $data['mail_email'] = $request->input('mail_email');
        $data['mail_password'] = $request->input('mail_password');
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['address'] = $request->input('address');
        $data['added_by'] =  Auth::guard('web')->id();

        $role = $request->input('role');
        $data['password'] = Hash::make($request->input('password'));
        $user_id = User::create($data);
        if ($user_id) {
            // $role = Role::findByName($role);
             $user_id->assignRole($role);
            // $user_id->syncPermissions($permission);
            return redirect('/users')->with('success', 'Record is updated successfully.');
        } else {
            return redirect('/users/edit/{$id}')->with('error', 'Something went wrong.');
        }
    }
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'email|required|unique:users|max:255',
            'pass_1' => 'required|min:8',
            'pass_2' => 'required|same:pass_1'
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        $data = [];
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');

        // $data['password'] = bcrypt($request->input('pass_1'));
        // $data['password'] = Hash::make($request->input('pass_1'));
        $data['password'] = $request->input('pass_1');
        User::create($data);
        return redirect('/login');
    }
    public function edit($id)
    {
        if (!$id) {
            return abort(401);
        }
        $users = User::where([
            'id' => $id
        ])->first();
        $user_roles = $users->getRoleNames();
        $roles = Roles::get();
        $access_levels = ['from_all', 'ip_restricted'];
        return view('admin.users.edit', compact('users', 'user_roles', 'roles', 'access_levels'));
    }
    public function edit_store(Request $request, $id)
    {

        if (!$id) {
            return abort(401);
        }

        $data = [];
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['nick_name'] = $request->input('nick_name');
        $data['user_name'] = $request->input('user_name');
        $data['address'] = $request->input('address');
        $data['access_level'] = $request->input('access_level');
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['address'] = $request->input('address');
        $data['updated_by'] =  Auth::user()->id;
        if ($request->input('password') != '') {
            $data['password'] = Hash::make($request->input('password'));
        }
        $user = User::find($id);
        $role = Role::findByName($request->input('role'));

        $user->assignRole($role);

        $role = Role::findByName($role->name);
        $user->syncRoles([$role]);

         $permissions = $role->permissions;


        // // You can then loop through the $permissions collection to display the permissions
        foreach ($permissions as $permission) {
            //echo $permission->name;
            $user->givePermissionTo($permission);
            $user->syncPermissions($permission);

        }

        // $user_id->assignRole($role);
        // $user_id->syncPermissions($permission);

        $user = User::where([
            'id' => $id
        ])->update($data);
        if ($user) {
            return redirect('/users')->with('success', 'Record is updated successfully.');
        } else {
            return redirect('/users/edit/{$id}')->with('error', 'Something went wrong.');
        }
    }
    public function delete(Request $request, $id)
    {
        if (!$id) {
            return abort(401);
        }


        $del = User::where([
            'id' => $id
        ])->delete();
        if ($del) {
            return redirect('/users')->with('success', 'Record is deleted successfully.');
        } else {
            return redirect('/users')->with('error', 'Something went wrong.');
        }
    }
    public function login(Request $request)
    {
        if (Auth::user()) {
            return redirect('/dashboard')->with('success', 'You are already logged In.');
        }
        return view('admin.users.login');
    }
    public function validation(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'email|required|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }
        // $userdata = array(
        //     'email' => $request->get('email'),
        //     'password' => $request->input('password')
        // );
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // $request->session()->flash('error', 'Invalid Request');//
            return redirect('/dashboard')->with('success', 'You have successfully Logged In.');
        } else {

            // $request->session()->flash('error', 'Invalid Request');
            // return redirect()->route('login');
            return back()->with('error', 'Invalid Email or Password. Please Try Again.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('error', 'You have logged out successfully.');;
    }
    public function profile(Request $request)
    {
        if (!Auth::user()) {
            return redirect('/login')->with('error', 'Please Login First');
        }
        return view('admin.users.profile');
    }
    public function settings(Request $request)
    {
        if (!Auth::user()) {
            return redirect('/login')->with('error', 'Please Login First');
        }
        return view('admin.users.settings');
    }
}
