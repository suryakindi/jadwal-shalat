<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    ##GET Current Location ##
    $user_ip = getenv('REMOTE_ADDR');
    $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
    $country = $geo["geoplugin_countryName"];
    $city = $geo["geoplugin_city"];
    $date = date('Y-m-d');
    ##GET Current Location ##
    
    ## HIT API 
    $namakota = strtoupper($city);
    if($namakota == NULL OR $namakota == FALSE){
        $namakota = 'JAKARTA';
    }
    $getnamakota = Http::get('https://api.banghasan.com/sholat/format/json/kota/nama/'.$namakota);
    $jsongetnamakota = $getnamakota->json();
    $namakota = $jsongetnamakota['kota'][0]['nama'];
    $idkota = $jsongetnamakota['kota'][0]['id'];
    $getdetail = Http::get('https://api.banghasan.com/sholat/format/json/jadwal/kota/'.$idkota.'/tanggal/'.$date.'');
    $jsongetdetail = $getdetail->json();
    $datajadwal = $jsongetdetail['jadwal']['data'];
   
    
    
    ## END HIT API
     return view('welcome', ['jadwalkotasekarang'=>$datajadwal, 'namakotasekarang'=>$namakota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ## GET ID DETAIL INFO KOTA ##
        // $namakota = str_replace('', '$%20', $request->namakota);
        // $response = Http::get('https://api.banghasan.com/sholat/format/json/kota');
        // $jsondata = $response->json();
        // $datakota = $jsondata['kota'];
        // $kota = array_column($datakota, 'nama');
        // $indexarray = array_search(strtoupper($namakota), $kota);
        // $getinfokota = $datakota[$indexarray];
        // $idkota = $getinfokota['id']; 
         ## END GET ID DETAIL INFO KOTA ##
        
        $namakota = str_replace('', '$20', $request->namakota);
        $getnamakota = Http::get('https://api.banghasan.com/sholat/format/json/kota/nama/'.$namakota);
        $jsongetnamakota = $getnamakota->json();
        if($jsongetnamakota['kota'] == NULL){
            echo 'Data Tidak Ditemukan';
            die;
        }else{
            $namakota = $jsongetnamakota['kota'][0]['nama'];
            $idkota = $jsongetnamakota['kota'][0]['id'];
            $getdetail = Http::get('https://api.banghasan.com/sholat/format/json/jadwal/kota/'.$idkota.'/tanggal/'.$request->tanggal.'');
            $jsongetdetail = $getdetail->json();
            $datajadwal = $jsongetdetail['jadwal']['data'];
        }
       
       
        
        return view('welcome', ['jadwal'=>$datajadwal, 'namakota'=>$namakota]);
       

    }

    
}
