<?php

namespace App\Http\Controllers;

use App\Models\DashboardAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->count();
        return view('admin_layout.admin', compact('user'));
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
     * @param  \App\Models\DashboardAdmin  $dashboardAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(DashboardAdmin $dashboardAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DashboardAdmin  $dashboardAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(DashboardAdmin $dashboardAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DashboardAdmin  $dashboardAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DashboardAdmin $dashboardAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DashboardAdmin  $dashboardAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(DashboardAdmin $dashboardAdmin)
    {
        //
    }
}
