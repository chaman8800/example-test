<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;


class DetailController extends Controller
{
    public function index()
    {
        $details = Detail::all();
        return view('details.index', compact('details'));
    }

    public function store(Request $request)
    {
        $encryptedData = Crypt::encryptString($request->input('data'));

        $detail = new Detail();
        $detail->name = $request->input('name');
        $detail->email = $request->input('email');
        $detail->mobile = $request->input('mobile');
        $detail->password = $request->input('password');
        $detail->role = $request->input('role');
        $detail->encrypted_data = $encryptedData;
        $detail->save();

        return redirect()->route('details.index');
    }

    public function edit($id)
    {
        $detail = Detail::find($id);
        return view('details.edit', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $detail = Detail::find($id);
        $detail->name = $request->input('name');
        $detail->email = $request->input('email');
        $detail->mobile = $request->input('mobile');
        $detail->password = $request->input('password');
        $detail->role = $request->input('role');
        $detail->encrypted_data = Crypt::encryptString($request->input('data'));
        $detail->save();

        return redirect()->route('details.index');
    }

    public function destroy($id)
    {
        $detail = Detail::find($id);
        $detail->delete();

        return redirect()->route('details.index');
    }

    public function bulkUpload(Request $request)
    {

    }

    public function bulkDownload()
    {
       
    }
}
