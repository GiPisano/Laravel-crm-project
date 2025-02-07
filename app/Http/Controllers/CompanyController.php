<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }


    public function create()
    {
        return view('companies.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'vat_number' => 'required|digits:11|unique:companies,vat_number',
        ]);

        $data = $request->only(['name', 'vat_number']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company = Company::create($data);


        return redirect()->route('companies.index', $company->id)
            ->with('success', 'Company successfully created!');
    }



    public function show(Company $company)
    {
        return view('comapnies.show', compact('company'));
    }


    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }


    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'vat_number' => 'required|digits:11|unique:companies,vat_number,' . $company->id,
        ]);

        $data = $request->only(['name', 'vat_number']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($data);

        return redirect()->route('companies.index')->with('success', 'Company successfully updated!');
    }


    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company successfully deleted!');
    }
}
