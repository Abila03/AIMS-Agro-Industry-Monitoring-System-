<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suhu;
use App\Models\Ph;
use App\Models\ParameterSuhu;
use App\Models\Control;
use Illuminate\Support\Carbon;

class SuhuController extends Controller
{
    public function index()
    {
      $riwayatSuhu = Suhu::orderBy('id_suhu', 'desc')->paginate(10); 
        return view('suhu.riwayat',  ['riwayatSuhu'=> $riwayatSuhu]);
    }
    
    public function latestSuhu()
    {
        $latestSuhu = Suhu::orderBy('id_suhu', 'desc')->first();
        return view('suhu.suhu',  ['latestSuhu'=> $latestSuhu]);
    }

    public function homeData()
    {
        $suhu = Suhu::orderBy('id_suhu', 'desc')->first();
        $ph = Ph::orderBy('id_ph', 'desc')->first();
        // $ppm = Ppm::find(1);
    
        return view('home', compact('suhu', 'ph'));
    }

    // public function bacasuhu()
    // {
    //     $suhuData = Suhu::select("*")->get();
    //     return view('suhu.suhu', ['nilaisensor'=> $suhuData]);
    // }

    public function updateparametersuhu(Request $request)
    {
      try {
        $parameter = ParameterSuhu::find(1);
        $maxSuhu = $request->input('max_suhu');
        $minSuhu = $request->input('min_suhu');
        $parameter->max_suhu = $maxSuhu;
        $parameter->min_suhu = $minSuhu;
        $parameter->save();
        return redirect()->back()->with('success', 'Parameter suhu berhasil diperbarui.');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui parameter suhu: ' . $e->getMessage());
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui parameter suhu.');
    }
    }

    // public function tampilparameterSuhu()
    // {
    //     $latestParameterSuhu = ParameterSuhu::find(1);
    //     return view('suhu.suhu', ['latestParameterSuhu' =>  $latestParameterSuhu]);
    // }



    


}