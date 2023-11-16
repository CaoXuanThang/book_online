<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startDate = now()->startOfWeek(); // Lấy ngày đầu tuần
        $endDate = now()->endOfWeek(); // Lấy ngày cuối tuần
        $invoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->where('status', 1)
            ->selectRaw('DATE(created_at) as date, SUM(total_amount) as sum')
            ->groupBy('date')
            ->get();
        // select count books
        $count_phones = DB::table('books')->count();
        $sum_invoices = DB::table('invoices')->where('status', 1)->sum('total_amount');
        $order_delivered = DB::table('invoices')->where('status', 1)->count();
        $order_pending = DB::table('invoices')->where('status', 0)->count();
        return view('admin.dashboard', compact('invoices', 'count_phones', 'sum_invoices', 'order_delivered', 'order_pending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
