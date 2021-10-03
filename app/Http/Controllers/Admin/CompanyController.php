<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);

        return view('admin.companies.index',compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
		
		$data = $request->all();

        if ($request->has('logo') && ($request['logo'] instanceof  UploadedFile)) {
            $data['logo'] = $this->uploadOne($request['logo'], 'company');
        }

        Company::create($data);

        return redirect()->route('companies.index')
            ->with('success','Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('admin.companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
        ]);
		
		$data = $request->all();

        //Logo Upload
        if ($request->has('logo') && ($request['logo'] instanceof  UploadedFile)) {

            if ($company->logo != null) {
                $this->deleteOne($company->logo);
            }

            $data['logo'] = $this->uploadOne($request['logo'], 'company');
        }

        $company->update($data);

        return redirect()->route('companies.index')
            ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success','Company deleted successfully');
    }
}
