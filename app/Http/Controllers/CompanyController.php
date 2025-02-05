<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    //
    public function index()
    {
       $companies = Company::all();
    //    return $company;
       return view('home',compact('companies'));
    }
    public function delete($id){
        // return  $id;
        $company = Company::find($id);
        $company->delete();
        return "Company Deleted Successfully";
    }
    public function edit($id){
        $company = Company::find($id);
        return view("edit",compact('company'));
    }
}
