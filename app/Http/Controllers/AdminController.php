<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Imports\DataImport;
use App\Models\ClusHasil;
use App\Models\Data;
use App\Models\Desa;
use App\Models\Hasil;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $page = "Dashboard - Peta Penyebaran Data";
        // $cluster = ClusHasil::all();
        return view('home', compact('page'));
    }

    public function resourcedata()
    {
        return json_encode(Data::with('desa')->get());
    }

    public function data()
    {
        $page = "Data Sample";
        $data = Data::orderBy('created_at', 'desc')->get();
        $desa = Desa::all();
        // $cluster = ClusHasil::all();
        return view('data.data', compact('page', 'data', 'desa'));
    }

    public function storedata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'luas_tanah' => 'required',
            'ph_air' => 'required|numeric',
            'ph_tanah' => 'required|numeric',
            'suhu' => 'required|numeric',
            'curah_hujan' => 'required|numeric',
            'desa_id' => 'required|numeric',
            'clus_hasil' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($validator->fails()) {
            // Alert::error('Gagal!', 'Pastikan Data Diisi Dengan Benar');
            // return redirect()->route('data.index');
            return response()->json(['error' => $validator->errors()], 400);
        }

        $dataupload = new Data();
        $dataupload->luas_tanah = $request->luas_tanah;
        $dataupload->ph_air = $request->ph_air;
        $dataupload->ph_tanah = $request->ph_tanah;
        $dataupload->suhu = $request->suhu;
        $dataupload->curah_hujan = $request->curah_hujan;
        $dataupload->desa_id = $request->desa_id;
        $dataupload->clus_hasil = $request->clus_hasil;
        $dataupload->latitude = $request->latitude;
        $dataupload->longitude = $request->longitude;
        $dataupload->save();

        Alert::success('Informasi Pesan!', 'Data Baru Berhasil ditambahkan');
        return redirect()->route('data.index');
    }

    public function editdata($id)
    {
        $data = Data::findOrFail($id);
        return json_encode($data);
    }

    public function updatedata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'luas_tanah' => 'required',
            'ph_air' => 'required|numeric',
            'ph_tanah' => 'required|numeric',
            'suhu' => 'required|numeric',
            'curah_hujan' => 'required|numeric',
            'desa_id' => 'required|numeric',
            'clus_hasil' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan Data Diisi Dengan Benar');
            return redirect()->route('data.index');
            // return response()->json(['error' => $validator->errors()], 400);
        }

        $dataupload = Data::findOrFail($request->id);
        $dataupload->luas_tanah = $request->luas_tanah;
        $dataupload->ph_air = $request->ph_air;
        $dataupload->ph_tanah = $request->ph_tanah;
        $dataupload->suhu = $request->suhu;
        $dataupload->curah_hujan = $request->curah_hujan;
        $dataupload->desa_id = $request->desa_id;
        $dataupload->clus_hasil = $request->clus_hasil;
        $dataupload->latitude = $request->latitude;
        $dataupload->longitude = $request->longitude;
        $dataupload->save();

        Alert::success('Informasi Pesan!', 'Data Berhasil diEdit');
        return redirect()->route('data.index');
    }

    public function destroydata($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        Alert::success('Informasi Pesan!', 'Data Berhasil dihapus');
        return redirect()->route('data.index');
    }

    public function desa()
    {
        $page = 'Desa';
        $desa = Desa::all();
        return view('desa.index', compact('page', 'desa'));
    }

    public function storedesa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan Nama Desa Diisi Dengan Benar');
            return redirect()->route('desa.index');
        }

        $dataupload = new Desa();
        $dataupload->title = $request->title;
        $dataupload->save();

        Alert::success('Informasi Pesan!', 'Desa Berhasil Di Tambahkan');
        return redirect()->route('desa.index');
    }

    public function updatedesa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan Nama Desa Diisi Dengan Benar');
            return redirect()->route('desa.index');
        }

        $dataupload = Desa::findOrFail($request->id);
        $dataupload->title = $request->title;
        $dataupload->save();

        Alert::success('Informasi Pesan!', 'Desa Berhasil Di Update');
        return redirect()->route('desa.index');
    }

    public function editdesa($id)
    {
        $data = Desa::findOrFail($id);
        return json_encode($data);
    }

    public function destroydesa($id)
    {
        $data = Desa::findOrFail($id);
        $data->delete();

        Alert::success('Informasi Pesan!', 'Desa Berhasil dihapus');
        return redirect()->route('desa.index');
    }
}
