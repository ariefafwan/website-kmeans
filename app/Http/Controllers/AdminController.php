<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Hasil;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $page = "Dashboard";
        $hasil = Hasil::all();
        return view('home', compact('page', 'hasil'));
    }

    public function kmeans()
    {
        $page = "K-Means Method";
        return view('kmeans', compact('page'));
    }

    public function test()
    {
        function aasort(&$array, $key)
        {
            $sorter = array();
            $ret = array();
            reset($array);
            foreach ($array as $ii => $va) {
                $sorter[$ii] = $va[$key];
            }
            asort($sorter);
            foreach ($sorter as $ii => $va) {
                $ret[$ii] = $array[$ii];
            }
            $array = $ret;
        }
        $process = array();
        $page = "Test";

        return view('test', compact('page'));
    }

    public function data()
    {
        $page = "Data Hasil Produksi";
        $data = Data::all();
        return view('data.data', compact('page', 'data'));
    }

    public function storedata(Request $request)
    {
        if ($request->validate([
            'bulan' => 'required',
            'ha_block' => 'required|numeric',
            'ffb_produksi_ton' => 'required|numeric',
            'janjang_panen' => 'required|numeric',
            'brondolan_kg' => 'required|numeric'
        ])) {
            //create data
            $dataupload = new Data();
            $dataupload->bulan = $request->bulan;
            $dataupload->ha_block = $request->ha_block;
            $dataupload->ffb_produksi_ton = $request->ffb_produksi_ton;
            $dataupload->janjang_panen = $request->janjang_panen;
            $dataupload->brondolan_kg = $request->brondolan_kg;
            $dataupload->save();
        }
        Alert::success('Informasi Pesan!', 'Data Baru Berhasil ditambahkan');
        return redirect()->route('data.index');
    }

    public function editdata($id)
    {
        $data = Data::findOrFail($id);
        return json_encode($data);
    }

    public function updatedata(Request $request)
    {       //update data
        $data = Data::where('id', $request->id)->get();
        foreach ($data as $row) {
            $id = $row->id;
            $dataupload = Data::findOrFail($id);
        }
        $dataupload->bulan = $request->bulan;
        $dataupload->ha_block = $request->ha_block;
        $dataupload->ffb_produksi_ton = $request->ffb_produksi_ton;
        $dataupload->janjang_panen = $request->janjang_panen;
        $dataupload->brondolan_kg = $request->brondolan_kg;
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
}
