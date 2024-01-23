<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Customers;
use App\Models\EnquiryFollowup;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {


        return view(
            'admin.dashboard.new'
        );
    }

    public function getCalenderData(Request $request)
    {
        $events = Notifications::all(); // get all events from the database

        $formattedEvents = [];

        foreach ($events as $event) {

            $formattedEvents[] = [
                'title' => $event->message,

                'start' => date('Y-m-d', strtotime($event->time_notify)),
                'end' => date('Y-m-d', strtotime($event->time_notify)),
                // 'end' => "2020-09-14",
                // 'url' => '/events/' . $event->id
            ];
        }

        // Return the formatted data as a JSON response
        return response()->json($formattedEvents);




        // $events = [
        //     ['title' => 'Event 1',            'start' => '2020-09-12',            'end' => '2020-09-13'],
        //     ['title' => 'Event 2',            'start' => '2020-09-15',            'end' => '2020-09-19']
        // ];

        // return response()->json($events);
    }

    public function ticketOrders(Request $request)
    {
        $bookingTicketWhere = '';
        $bookingTicketLimit = '';


        // $results = DB::table('booking_tickets as bt')
        //     ->join('booking_details as bd', 'bd.id', '=', 'bt.booking_detail_id')
        //     ->join('consolidators as c', 'c.id', '=', 'bt.consolidator_id')
        //     ->join('users as u', 'u.id', '=', 'bt.added_by')
        //     ->select('bd.booking_id', 'bd.depature_date', 'bd.return_date', 'bd.depature_airport', 'bd.destination_airport', 'bd.pnr', 'c.name AS consolidatorName', 'u.name AS requestedBy', 'bt.*');

        // if ($user->hasRole('Administrator')) {
        //     $results->where('bt.status', '=', 'request');
        // } else {
        //     $results->where(function ($query) use ($user) {
        //         $query->whereIn('bt.status', ['request', 'confirm', 'revise', 'date_change_request'])
        //             ->where('bt.added_by', '=', $user->id);
        //     });
        //     $bookingTicketLimit = 10;
        //     $results->take($bookingTicketLimit);
        // }


        // $results = $results->orderByRaw("bt.status = 'request' DESC, bt.id DESC")->get();

        // dd($results);
        $user = User::find(Auth::user()->id);
        $columns = ['bd.booking_id', 'bd.depature_date', 'bd.return_date', 'bd.depature_airport', 'bd.destination_airport', 'bd.pnr', 'c.name AS consolidatorName', 'u.name AS requestedBy', 'bt.status', 'bt.created_at', 'bt.id'];

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order_column = $columns[$request->input('order.0.column', 0)];
        $order_direction = $request->input('order.0.dir', 'asc');
        $search  = $request->input('search.value');

        $results = DB::table('booking_tickets as bt')
            ->join('booking_details as bd', 'bd.id', '=', 'bt.booking_detail_id')
            ->join('consolidators as c', 'c.id', '=', 'bt.consolidator_id')
            ->join('users as u', 'u.id', '=', 'bt.added_by')
            ->select($columns);

        if ($user->hasRole('Administrator')) {
            $results->where('bt.status', '=', 'request');
        } else {
            $results->where(function ($query) {
                $query->whereIn('bt.status', ['request', 'confirm', 'revise', 'date_change_request'])
                    ->where('bt.added_by', '=', Auth::user()->id);
            });
        }



        $records_filtered = $results->count();
        $results = $results->orderByRaw("bt.status = 'request' DESC, $order_column $order_direction")
            ->offset($start)
            ->limit($length)
            ->get();

        $records_total = DB::table('booking_tickets')->count();

        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $results
        ]);
    }
    public function voidTicketOrders(Request $request)
    {

        $user = User::find(Auth::user()->id);
        $columns = ['bd.booking_id', 'bd.depature_date', 'bd.return_date', 'bd.depature_airport', 'bd.destination_airport', 'bd.pnr', 'c.name AS consolidatorName', 'u.name AS requestedBy', 'bt.status', 'bt.created_at', 'bt.id'];

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order_column = $columns[$request->input('order.0.column', 0)];
        $order_direction = $request->input('order.0.dir', 'asc');
        $search  = $request->input('search.value');

        $results = DB::table('booking_tickets as bt')
            ->join('booking_details as bd', 'bd.id', '=', 'bt.booking_detail_id')
            ->join('consolidators as c', 'c.id', '=', 'bt.consolidator_id')
            ->join('users as u', 'u.id', '=', 'bt.added_by')
            ->select($columns);

        if ($user->hasRole('Administrator')) {
            $results->where('bt.status', '=', 'void_request');
        } else {
            $results->where(function ($query) {
                $query->whereIn('bt.status', ['void_request'])
                    ->where('bt.added_by', '=', Auth::user()->id);
            });
        }



        $records_filtered = $results->count();
        $results = $results->orderByRaw("bt.status = 'request' DESC, $order_column $order_direction")
            ->offset($start)
            ->limit($length)
            ->get();

        $records_total = DB::table('booking_tickets')->count();

        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $results
        ]);
    }
    public function cancelTicketOrders(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $columns = ['btcr.id', 'bd.booking_id', 'bd.depature_date', 'bd.return_date', 'bd.depature_airport', 'bd.destination_airport', 'bd.pnr', 'c.name AS consolidatorName', 'u.name AS requestedBy', 'btcr.status'];

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order_column = $columns[$request->input('order.0.column', 0)];
        $order_direction = $request->input('order.0.dir', 'asc');
        $search = $request->input('search.value');

        $query = DB::table('booking_ticket_cancel_request AS btcr')
            ->select($columns)
            ->join('booking_tickets AS bt', 'bt.id', '=', 'btcr.booking_ticket_id')
            ->join('booking_details AS bd', 'bd.id', '=', 'bt.booking_detail_id')
            ->join('consolidators AS c', 'c.id', '=', 'bt.consolidator_id')
            ->join('users AS u', 'u.id', '=', 'btcr.added_by');

        if ($user->hasRole('Administrator')) {
            $query->where('btcr.status', '=', 'pending');
        } else {
            $query->where('btcr.added_by', '=', Auth::user()->id);
        }

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('btcr.id', 'LIKE', '%' . $search . '%')
                    ->orWhere('bd.booking_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('bd.depature_date', 'LIKE', '%' . $search . '%')
                    ->orWhere('bd.return_date', 'LIKE', '%' . $search . '%')
                    ->orWhere('bd.depature_airport', 'LIKE', '%' . $search . '%')
                    ->orWhere('bd.destination_airport', 'LIKE', '%' . $search . '%')
                    ->orWhere('btcr.pnr', 'LIKE', '%' . $search . '%')
                    ->orWhere('c.name', 'LIKE', '%' . $search . '%')
                    ->orWhere('u.name', 'LIKE', '%' . $search . '%');
            });
        }

        $records_filtered = $query->count();
        $data = $query->orderByRaw("btcr.status = 'pending' DESC, btcr.id DESC")
            ->offset($start)
            ->limit($length)
            ->get();

        $records_total = DB::table('booking_ticket_cancel_request')->count();

        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $data
        ]);
    }
    public function bookingCloseRequest(Request $request)
    {


        $user = User::find(Auth::user()->id);
        $columns = ['bcr.*', 'u1.name AS requested_by', 'b.date_added AS booking_date', 'b.booking_type'];

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order_column = $columns[$request->input('order.0.column', 0)];
        $order_direction = $request->input('order.0.dir', 'asc');
        $search = $request->input('search.value');

        $query = DB::table('booking_close_request AS bcr')
            ->select($columns)
            ->join('bookings AS b', 'b.id', '=', 'bcr.booking_id')
            ->join('users AS u1', 'u1.id', '=', 'bcr.added_by');

        if ($user->hasRole('Administrator')) {
            $query->where('bcr.status', '=', 'pending');
        } else {
            $query->where('btcr.added_by', '=', Auth::user()->id);
        }


        $records_filtered = $query->count();
        $data = $query->orderByRaw("bcr.status = 'pending' DESC, bcr.id DESC")
            ->offset($start)
            ->limit($length)
            ->get();
        dd($data);
        $records_total = DB::table('booking_close_request')->count();

        return response()->json([
            'draw' => $request->input('draw', 1),
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $data
        ]);
    }
    public function search(Request $request)
    {
        $output = '';
        $where = array();
        $whereStr = '';

        // print_r($where);
        // if (!empty($request->input('search_s_customer_name'))) {
        //     $where[] = ["b.full_name", 'LIKE', '%' . $request->input('search_s_customer_name') . '%'];
        // }
        // if (!empty($request->input('search_s_email'))) {
        //     $where[] = ["b.email", 'LIKE', '%' . $request->input('search_s_email') . '%'];
        // }
        // if (!empty($request->input('search_s_consultant'))) {
        //     $where[] = ["b.added_by", '=', $request->input('search_s_consultant')];
        // }
        // if (!empty($request->input('search_s_phone'))) {
        //     $where[] = ['b.phone', 'LIKE', '%' . $request->input('search_s_phone') . '%'];
        //     $where[] = ['b.mobile', 'LIKE', '%' . $request->input('search_s_phone') . '%'];
        // }
        // if (!empty($request->input('search_s_from'))) {
        //     $where[] = ['b.date_added', '>=', $request->input('search_s_from')];
        // }
        // if (!empty($request->input('search_s_to'))) {
        //     $where[] = ['b.created_at', '<=', $request->input('search_s_to')];
        // }

        // if (!empty($request->input('search_s_file_number'))) {
        //     $where[] = ["b.id", 'LIKE', '%' . $request->input('search_s_file_number') . '%'];
        //     $where[] = ["b.full_name", 'LIKE', '%' . $request->input('search_s_file_number') . '%'];
        //     $where[] = ["b.email", 'LIKE', '%' . $request->input('search_s_file_number') . '%'];
        //     $where[] = ['b.phone', 'LIKE', '%' . $request->input('search_s_file_number') . '%'];
        //     $where[] = ['b.mobile', 'LIKE', '%' . $request->input('search_s_file_number') . '%'];
        // }

        //         if (!empty($where)) {
        //             DB::connection()->enableQueryLog();

        //             $bookingRes = DB::table('bookings as b')
        //                 // ->join('users as u', 'u.id', '=', 'b.added_by')
        //                 ->select('b.*')
        //                 ->where($where)
        //                 ->get();

        // // Get the executed queries
        // $queries = DB::getQueryLog();

        // // Display the last executed query
        // dd(end($queries));



        // DB::connection()->enableQueryLog();

        if (!empty($request->input('search_s_file_number'))) {
            $searchTerm = '%' . $request->input('search_s_file_number') . '%';

            $bookingRes = DB::table('bookings as b')
                ->join('users as u', 'u.id', '=', 'b.added_by')
                ->orWhere(function ($query) use ($searchTerm) {
                    $query->where('b.id', 'LIKE', $searchTerm)
                        ->orWhere('b.full_name', 'LIKE', $searchTerm)
                        ->orWhere('b.email', 'LIKE', $searchTerm)
                        ->orWhere('b.phone', 'LIKE', $searchTerm)
                        ->orWhere('b.mobile', 'LIKE', $searchTerm);
                })
                ->select('b.*', 'u.name as agent')
                ->get();

            }
            // Get the executed queries
            // $queries = DB::getQueryLog();

            // Display the last executed query
            // dd(end($queries));


            // $bookingRes = DB::table('bookings as b')
            //     ->join('users as u', 'u.id', '=', 'b.added_by')
            //     ->select('b.*', 'u.name as agent')
            //     ->where($where)
            //     ->get();
            $output .=  '<table id="ticket_order_table"';
            $output .= 'class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"';
            $output .= 'style="width:100%">';
            if ($bookingRes->count() > 0) {
                $output .= '<thead>';

                $output .= '<tr>';
                $output .= '    <th class="fw-bold text-gray-600"';
                $output .= '        style="width: 10%"> INVOICE#</th>';
                $output .= '    <th class="fw-bold text-gray-600"';
                $output .= '        style="width: 20%">CONSULTANT';
                $output .= '    </th>';
                $output .= '    <th class="fw-bold text-gray-600"';
                $output .= '        style="width: 20%">PASSENGERS';
                $output .= '    </th>';
                $output .= '    <th class="fw-bold text-gray-600"';
                $output .= '        style="width: 15%">DATE';
                $output .= '    </th>';

                $output .= '  <th class="fw-bold text-gray-600"';
                $output .= '      style="width: 20%">EMAIL</th>';
                $output .= '  <th class="fw-bold text-gray-600"';
                $output .= '      style="width: 10%">STATUS</th>';
                $output .= '  <th class="fw-bold text-gray-600"';
                $output .= '      style="width: 20%">ACTION';
                $output .= '  </th>';


                $output .= ' </tr>';



                $output .= '</thead>';
                foreach ($bookingRes as $bookingArr) {

                    extract((array) $bookingArr);
                    $customer = Customers::where(function ($query) use ($email, $mobile) {
                        $query->where('email', $email)
                            ->orWhere('mobile', $mobile);
                    })->pluck('id');
                    $customer_id = $customer[0];
                    $output .= '<tr>
                            <td>A' . $id . '</td>
                            <td>' . $agent . '</td>
                            <td>' . $full_name . '</td>
                            <td>' . $created_at . '</td>
                            <td>' . $email . '<br />'.$email2.'</td>';
                    if ($status == 'pending') {
                        $output .= '<td><span class="badge badge-warning">Pending</span></td>';
                    } else {
                        $output .= '<td><span class="badge badge-warning">' . ucfirst($status) . '</span></td>';
                    }
                    $output .= '<td><a href="/file/details/' .$customer_id.'/'. $id . '" ><i class="fa-solid fa-eye text-success"></i></a> <a href="/file/addfile/' . $customer_id .'" ><i class="fa-solid fa-plus text-danger"></i></a></td>
                        </tr>';
                }
            } else {
                $output .= '<tr>
                        <td colspan="7">No Record Found.</td>
                    </tr>';
            }
        // } else {
        //     $output .= '<tr>
        //             <td colspan="7">Select some search parameters.</td>
        //         </tr>';
        // }
        $output .= '</table>';



        return response()->json(['success' => true, 'html' => $output]);
    }
}
