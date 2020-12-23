<?php

namespace App\Http\Controllers;

use App\PanduanPembayaran;
use App\sewa_bus;
use App\pengguna;
use App\customer;
use App\category;
use App\paket_wisata;
use App\sewa_bus_category;
use App\sewa_paket_wisata;
use App\Pricelist_Sewa_Armada;
use App\schedule_armada;
use App\Armada;
use App\rekening;
use App\pembayaran;
use App\Pembayaran_Paket;
use Illuminate\Http\Request;
use DB;

class PanduanPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekening=DB::table('rekening')->get();

        return view('panduan_pembayaran', ['rekening'=>$rekening]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show_pembayaran()
    {
        $rekening=DB::table('rekening')->get();
        $pembayaran=DB::table('pembayaran')
        ->join('rekening', 'pembayaran.ID_REKENING', 'rekening.ID_REKENING')
        ->select('pembayaran.*', 'rekening.NAMA_BANK', 'rekening.NOMOR_REKENING')
        ->get();

        return view('konfirmasi_pembayaran',['pembayaran'=>$pembayaran, 'rekening'=>$rekening]);
    }

    public function show_pembayaran_paket()
    {
        $rekening=DB::table('rekening')->get();
        $pembayaran_paket=DB::table('pembayaran_paket')
        ->join('rekening', 'pembayaran_paket.ID_REKENING', 'rekening.ID_REKENING')
        ->select('pembayaran_paket.*', 'rekening.NAMA_BANK', 'rekening.NOMOR_REKENING')
        ->get();

        return view('konfirmasi_pembayaran_paket',['pembayaran_paket'=>$pembayaran_paket, 'rekening'=>$rekening]);
    }

    public function store_pembayaran(Request $request, $id)
    {
        //dd($request->all());
        $sewa_bus= Sewa_Bus::find($id);
       
        if($request->hasFile('file')) {

            $file = $request->file('file');
        
            $fileName = $file->getClientOriginalName();

            $bayar = new Pembayaran;
                $bayar->CARA_BAYAR            = $request->carabayar;
                $bayar->ID_REKENING           = $request->ID_REKENING;
                $bayar->TGL_BAYAR             = $request->tglbayar;
                $bayar->JUMLAH_BAYAR          = $request->jumlahbayar;
                $bayar->ID_SEWA_BUS           = $id;
                $bayar->STATUS_BAYAR          = 1;
                $bayar->NAMA_BANK_PENGIRIM    = $request->namabank;
                $bayar->NOREK_PENGIRIM        = $request->norek;
                $bayar->KETERANGAN            = $request->keterangan;
                $bayar->ATAS_NAMA             = $request->pemilikrekening;
                $bayar->BUKTI_TF              = $fileName;
                $file->move(public_path().'/buktiTF', $fileName);
                $bayar->save();
        }
 
        return redirect('invoice_pembayaran');
    }

    public function store_pembayaran_paket(Request $request, $id)
    {
        //dd($request->all());
        $sewa_paket_wisata= Sewa_Paket_Wisata::find($id);
       
        if($request->hasFile('file')) {

            $file = $request->file('file');
        
            $fileName = $file->getClientOriginalName();

            $bayar_paket = new Pembayaran_Paket;
                $bayar_paket->CARA_BAYAR            = $request->carabayar;
                $bayar_paket->ID_REKENING           = $request->ID_REKENING;
                $bayar_paket->TGL_BAYAR             = $request->tglbayar;
                $bayar_paket->JUMLAH_BAYAR          = $request->jumlahbayar;
                $bayar_paket->ID_SEWA_PAKET         = $id;
                $bayar_paket->STATUS_BAYAR          = 1;
                $bayar_paket->NAMA_BANK_PENGIRIM    = $request->namabank;
                $bayar_paket->NOREK_PENGIRIM        = $request->norek;
                $bayar_paket->KETERANGAN            = $request->keterangan;
                $bayar_paket->ATAS_NAMA             = $request->pemilikrekening;
                $bayar_paket->BUKTI_TF              = $fileName;
                $file->move(public_path().'/buktiTF_Paket', $fileName);
                $bayar_paket->save();
        }
        

        return redirect('invoice_pembayaran_paket');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
