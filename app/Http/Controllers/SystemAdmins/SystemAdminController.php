<?php

namespace App\Http\Controllers\SystemAdmins;

use App\Http\Controllers\Controller;
use App\Traits\AuthenticatesJwtUsers;
use Illuminate\Http\Request;

class SystemAdminController extends Controller
{
    use AuthenticatesJwtUsers;

    /**
     * SystemAdminController constructor.
     */
    public function __construct()
    {
        $this -> setGuardName( 'system' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Returned All";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        return "Created";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        return "Returned Single";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        return "Updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Deleted";
    }
}
