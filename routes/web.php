<?php

use App\Models\Company;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;

// Home route - Display companies
Route::get('/', [CompanyController::class, 'index'])->name('home');

// Store company details
Route::post('/store-company', function (Request $request) {
    try {
        // Validate input fields
        $request->validate([
            "name" => "required|max:255",
            "address" => "required",
            "email" => "required|email",
            "contact" => "required|numeric",
            "status" => "required|in:active,inactive",
            "link" => "nullable|url",
            "logo" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        // Create new company instance
        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->email = $request->email;
        $company->contact = $request->contact;
        $company->status = $request->status;
        $company->link = $request->link;

        // Handle image upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $company->logo = 'images/' . $fileName;
        }

        $company->save();

        return redirect()->route('home')->with('success', 'Company details created successfully!');
    } catch (\Exception $e) {
        return redirect()->route('home')->with('error', 'Failed to create company. Please try again.');
    }
});

// Delete company
Route::delete('/delete-company/{id}', function ($id) {
    try {
        $company = Company::find($id);
        if (!$company) {
            return redirect()->route('home')->with('error', 'Company not found!');
        }

        $company->delete();

        return redirect()->route('home')->with('success', 'Company deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->route('home')->with('error', 'Failed to delete company. Please try again.');
    }
});

// Edit company (return edit form)
Route::get('/edit/{id}', [CompanyController::class, 'edit']);

// Update company details
Route::put('/update-company/{id}', function (Request $request, $id) {
    try {
        // Validate input fields
        $request->validate([
            "name" => "required|max:255",
            "address" => "required",
            "email" => "required|email",
            "contact" => "required|numeric",
            "status" => "required|in:active,inactive",
            "link" => "nullable|url",
            "logo" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        $company = Company::find($id);
        if (!$company) {
            return redirect()->route('home')->with('error', 'Company not found!');
        }

        $company->name = $request->name;
        $company->address = $request->address;
        $company->email = $request->email;
        $company->contact = $request->contact;
        $company->status = $request->status;
        $company->link = $request->link;

        // Handle image upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $company->logo = 'images/' . $fileName;
        }

        $company->update();

        return redirect()->route('home')->with('success', 'Company details updated successfully!');
    } catch (\Exception $e) {
        return redirect()->route('home')->with('error', 'Failed to update company. Please try again.');
    }
});
