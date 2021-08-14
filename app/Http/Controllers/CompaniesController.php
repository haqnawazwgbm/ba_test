<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::latest()->paginate(10);
        return view('companies/list', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'logo' => ['dimensions:min_width=100,min_height=100'],
        ]);

        $uploadedFile = $request->file('logo');
        $filename = time().$uploadedFile->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            'public',
            $uploadedFile,
            $filename
        );

        $company = new Companies;

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo = $filename;

        $company->save();

        return redirect()->route('companies')->with('message', 'Record created successfully!');
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
        $company = Companies::where('id', $id)->first();
        return view('companies/edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'logo' => ['dimensions:min_width=100,min_height=100'],
        ]);


        $company = Companies::find($request->id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if($request->hasFile('logo')) {
            $uploadedFile = $request->file('logo');
            $filename = time().$uploadedFile->getClientOriginalName();

            Storage::disk('local')->putFileAs(
                'public',
                $uploadedFile,
                $filename
            );
            $company->logo = $filename;
        }
        

        $company->save();

        return redirect()->route('companies')->with('message', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Companies::find($id);
        Storage::delete('public/'.$company->logo);

        $company->delete();
        return redirect()->route('companies')->with('message', 'Record deleted successfully!');
    }
}
