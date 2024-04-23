<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Company::withCount('employees')->get();
        return view('contents.company.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contents.company.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $insertData = $request->all();
        if ($request->logo) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/logo'), $filename);


        }
        $data = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $filename,
        ]);
        return redirect()->route('company.index')->with('message', 'Data Sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
        $data = Company::find($company->id);
        return view('contents.company.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //

        $insertData = $request->all();
        if ($request->logo) {
            $image = $request->file('logo');
//            dd($image);
            $filename = time() . '.' . $image->getClientOriginalExtension();
            if (!empty($company->logo)) {
                Storage::delete('public/logo/'.$company->logo);
                $publicPath = public_path('storage/logo/'.$company->logo);
                if(file_exists($publicPath)) {
                    unlink($publicPath);
                }
            }


            $image->move(storage_path('app/public/logo'), $filename);

            $company->logo = $filename;
        }
        // Update company data
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        $company->update();
        return redirect()->route('company.index')->with('info', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $comp_emp = Employee::where('company_id', $id)->exists();
        if(isset($comp_emp)){
            return response()->json(['Oops' => 'Error Occured'], 500);

        }
        else{

            $data = Company::find($id)->delete();
            return response()->json(['success' => 'data Deleted successfully']);
        }
    }
}
