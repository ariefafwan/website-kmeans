<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Hasil;
use Illuminate\Http\Request;

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
        $page = "Tambah Data";
        $data = Data::all();
        return view('data.data', compact('page', 'data'));
    }

    public function storedata(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
            'ha_block' => 'required|numeric',
            'ffb_produksi_ton' => 'required|numeric',
            'janjang_panen' => 'required|numeric',
            'brondolan_kg' => 'required|numeric'
        ]);
        Data::create($request->all());

        return redirect()->route('data.index');
    }
}
