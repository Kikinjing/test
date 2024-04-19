<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    public function show($id)
    {
        $penjualans = DetailPenjualan::where('penjualan_id', $id)->get();
        // return json_encode($penjualans);
        return view('admin.penjualan.show', compact('penjualans'));
    }
}
