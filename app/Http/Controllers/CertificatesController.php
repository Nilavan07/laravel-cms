<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    
    public function list()
    {
        $certificates = Certificate::orderBy('date_awarded', 'desc')->get();

        return view('console.certificates.list', compact('certificates'));
    }

    
    public function addForm()
    {
        return view('console.certificates.add');
    }

    
    public function add(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'issuer'       => 'required|string|max:255',
            'date_awarded' => 'required|date',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                                    ->store('certificates', 'public');
        }

        Certificate::create($data);

        return redirect('/console/certificates/list')
               ->with('message', 'Certificate added.');
    }

    
    public function editForm(Certificate $certificate)
    {
        return view('console.certificates.edit', compact('certificate'));
    }

    
    public function edit(Request $request, Certificate $certificate)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'issuer'       => 'required|string|max:255',
            'date_awarded' => 'required|date',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                                    ->store('certificates', 'public');
        }

        $certificate->update($data);

        return redirect('/console/certificates/list')
               ->with('message', 'Certificate updated.');
    }

    
    public function delete(Certificate $certificate)
    {
        $certificate->delete();

        return redirect('/console/certificates/list')
               ->with('message', 'Certificate deleted.');
    }

    public function imageForm(Certificate $certificate)
    {
        return view('console.certificates.image', compact('certificate'));
    }

    
    public function image(Request $request, Certificate $certificate)
    {
        $data = $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')
                        ->store('certificates', 'public');

        $certificate->update(['image' => $path]);

        return redirect('/console/certificates/list')
               ->with('message', 'Certificate image updated.');
    }
}
