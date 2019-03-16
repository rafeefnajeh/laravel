<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = DB::table('organization')
        ->join('contacts', 'organization.contact_id', '=', 'contacts.id')
        ->join('users', 'contacts.user_id', '=', 'users.id')
        ->select('contacts.*', 'users.*', 'organization.*')
        ->get();
         return view('admin.organization.index')->with('organizations',$organizations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $organization=Organization::createOrganization($request->all());
        return redirect('/admin/organization')->with('success','Has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        
        $id = $organization->id;
        $organizations = DB::table('organization')
        ->join('contacts', 'organization.contact_id', '=', 'contacts.id')
        ->join('users', 'contacts.user_id', '=', 'users.id')
        ->select('contacts.*', 'users.*', 'organization.*')
        ->where(['organization.id' => $id])
        ->first();
        
        return view('admin.organization.edit', ['organization' =>  $organizations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        Organization::updateOrganization($request->all());    
       
        return redirect("/admin/organization")->with('success','Has been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //return $organization;
        $organization->delete();
        return redirect('/admin/organization')->with('success','has been Deleted');
    }
}