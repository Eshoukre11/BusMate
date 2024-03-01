<?php

namespace App\Http\Controllers\DashboardUniversity;

use App\Http\Controllers\Controller;
use App\Models\company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = company::get();
        return view('DashboardUniversity.Contract.company')->with('company', $contracts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            return view('DashboardCompany.Buses.company')->with('company', company::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'company not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {

            return view('DashboardUniversity.Contract.editcompany')->with('edit_company', company::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Company not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $request->validate([

            'company_name' => ['required', 'alpha_dash'],
            'company_address' => ['required'],
            'comunication_email' => ['required', 'email'],
            'phone_number' => ['required', 'regex:/^09\d{8}$/'],
            'company_website' => ['url'],

        ]);
        try {

            $company = company::findOrFail($id);

            $company->update($request->only(["company_name", "company_address", "comunication_email", "phone_number", "company_website"]));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return redirect()->back()->with('error', 'contract not found');
        }
        //-----------------------------------------------
        return redirect()->route('Company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
