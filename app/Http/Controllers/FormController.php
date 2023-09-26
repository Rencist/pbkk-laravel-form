<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FormController extends Controller
{
    public function postFormView()
    {
        return view('form');
    }

    public function postForm(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'password' => 'required|max:255',
            'email' => 'required|email:rfc|max:255',
            'nilai_double' => 'required|numeric|between:2.50,99.99',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);


        $request->foto->storeAs('public/fotos', $request->foto->getClientOriginalName());

        $results = [
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => $request->password,
            'email' => $request->email,
            'nilai_double' => $request->nilai_double,
            'foto' => $request->foto->getClientOriginalName(),
        ];

        return view('form-view')->with(['results' => $results, 'status' => 'success']);
    }
}
