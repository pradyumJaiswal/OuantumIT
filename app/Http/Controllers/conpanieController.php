<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\companie;
use App\Models\employee;
use Illuminate\Support\Facades\Storage;
class conpanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = companie::latest()->paginate(2);
         return View('companies.index', compact('company'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return View('companies.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $logoName = time() . '.' . $request->logo->getClientOriginalExtension();
        $logoPath = $request->logo->storeAs('logos', $logoName, 'public');
        $company = new companie;
        $company->Name = $request->input('Name');
        $company->Email = $request->input('Email');
        $company->Logo = $logoPath;
        $company->Website = $request->input('Website');
        $company->save();
        return redirect('Company')->with('status', 'Company Added Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $my_company = companie::find($id);
        return view('companies.edit', compact('my_company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = companie::find($id);
        $company->Name = $request->input('Name');
        $company->Email = $request->input('Email');
        $company->Website = $request->input('Website');


        if ($request->hasFile('Logo')) {

            if ($company->Logo)
            {
                Storage::delete($company->Logo);
            }


            $logoPath = $request->file('Logo')->store('logos', 'public');
            $company->Logo = $logoPath;
        }

        $company->save();

        return redirect('Company')->with('status', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeCount = employee::where('Company', $id)->count();
        if ($employeeCount > 0) {
            employee::where('Company', $id)->delete();
        }
        $company = companie::find($id);
        $company->delete();
        return redirect('Company')->with('status','Company deleted Successfully');
    }
}
