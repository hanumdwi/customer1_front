<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use PDF;
use Redirect;

class PemesananController extends Controller
{

    public function indexawal()
    {
        $sewa_bus= Sewa_Bus::all();
        $customer= customer::all();

        $category_armada=DB::table('category_armada')->get();

        $pricelist_sewa_armada=DB::table('pricelist_sewa_armada')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('pricelist_sewa_armada.ID_PRICELIST', 'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 
        'pricelist_sewa_armada.PRICELIST_SEWA', 'pricelist_sewa_armada.ID_CATEGORY')
        ->get();

        $sewa_bus_category=DB::table('sewa_bus_category')
        ->join('sewa_bus','sewa_bus_category.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('sewa_bus_category.ID_SEWA_BUS', 'sewa_bus_category.ID_PRICELIST',
        'sewa_bus_category.QUANTITY', 'sewa_bus_category.TOTAL',
        'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 'pricelist_sewa_armada.PRICELIST_SEWA')
        ->get();


        return view('pemesanan', ['sewa_bus' =>$sewa_bus,'customer'=>$customer],
        ['sewa_bus_category'=>$sewa_bus_category,'pricelist_sewa_armada'=>$pricelist_sewa_armada, 'category_armada'=>$category_armada]);
    }


    public function index(Request $request, $id)
    {
        $sewa_bus= Sewa_Bus::find($id);
        $pengguna= Pengguna::find($sewa_bus->ID_PENGGUNA);
        $customer= customer::find($sewa_bus->ID_CUSTOMER);

        $category_armada=DB::table('category_armada')->get();

        $pricelist_sewa_armada=DB::table('pricelist_sewa_armada')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('pricelist_sewa_armada.ID_PRICELIST', 'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 
        'pricelist_sewa_armada.PRICELIST_SEWA', 'pricelist_sewa_armada.ID_CATEGORY')
        ->get();

        $sewa_bus_category=DB::table('sewa_bus_category')
        ->join('sewa_bus','sewa_bus_category.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('sewa_bus_category.ID_SEWA_BUS', 'sewa_bus_category.ID_PRICELIST',
        'sewa_bus_category.QUANTITY', 'sewa_bus_category.TOTAL', 
        'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 'pricelist_sewa_armada.PRICELIST_SEWA')
        ->get();

        $armada=DB::table('armada')
        ->join('category_armada', 'armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->join('pricelist_sewa_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->join('sewa_bus_category', 'sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->leftjoin('schedule_armada', 'armada.ID_ARMADA', '=', 'schedule_armada.ID_ARMADA','and','schedule_armada.STATUS_ARMADA', '=', 1)
        ->select('armada.ID_ARMADA', 'armada.PLAT_NOMOR', 'category_armada.NAMA_CATEGORY')
        ->distinct()
        ->get();

        $rekening=DB::table('rekening')->get();
        $pembayaran=DB::table('pembayaran')
        ->join('rekening', 'pembayaran.ID_REKENING', 'rekening.ID_REKENING')
        ->select('pembayaran.*', 'rekening.NAMA_BANK', 'rekening.NOMOR_REKENING')
        ->get();
     

        return view('datatable', ['sewa_bus' =>$sewa_bus,'pengguna'=>$pengguna,'customer'=>$customer],
        ['sewa_bus_category'=>$sewa_bus_category,'pricelist_sewa_armada'=>$pricelist_sewa_armada, 
        'category_armada'=>$category_armada, 'pembayaran'=>$pembayaran, 'armada'=>$armada, 'rekening'=>$rekening]);
   
}

    public function indexpaket(Request $request, $id)
    {
        $sewa_paket_wisata= Sewa_Paket_Wisata::find($id);
        $pengguna= Pengguna::find($sewa_paket_wisata->ID_PENGGUNA);
        $customer= Customer::find($sewa_paket_wisata->ID_CUSTOMER);
        
        $paket_wisata= Paket_Wisata::find($sewa_paket_wisata->ID_PAKET);

        $armada=DB::table('armada')
        ->join('category_armada', 'armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->leftjoin('schedule_armada', 'armada.ID_ARMADA', '=', 'schedule_armada.ID_ARMADA')
        ->select('armada.ID_ARMADA', 'armada.PLAT_NOMOR', 'category_armada.NAMA_CATEGORY')
        ->where('schedule_armada.STATUS_ARMADA', '=', 1)
        ->get();

        $rekening=DB::table('rekening')->get();
        $pembayaran_paket=DB::table('pembayaran_paket')
        ->join('rekening', 'pembayaran_paket.ID_REKENING', 'rekening.ID_REKENING')
        ->select('pembayaran_paket.*', 'rekening.NAMA_BANK', 'rekening.NOMOR_REKENING')
        ->get();

        return view('sewa_paket_detail', ['sewa_paket_wisata' =>$sewa_paket_wisata,'pengguna'=>$pengguna,
        'customer'=>$customer,'paket_wisata'=>$paket_wisata, 'armada'=>$armada, 
        'pembayaran_paket'=>$pembayaran_paket, 'rekening'=>$rekening]);
       
}
 
    public function pdf(Request $request, $ids)
    {
        $sewa_bus= Sewa_Bus::find($ids);
        $pengguna= Pengguna::find($sewa_bus->ID_PENGGUNA);
        $customer= customer::find($sewa_bus->ID_CUSTOMER);
        
        $category_armada=DB::table('category_armada')->get();
        $pricelist_sewa_armada=DB::table('pricelist_sewa_armada')->get();
        $sewa_bus_category=DB::table('sewa_bus_category')
        ->join('sewa_bus','sewa_bus_category.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('sewa_bus_category.ID_SEWA_BUS', 'sewa_bus_category.ID_PRICELIST',
        'sewa_bus_category.QUANTITY', 'sewa_bus_category.TOTAL',
        'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 'pricelist_sewa_armada.PRICELIST_SEWA')
        ->get();


        return view('invoice',['sewa_bus'=>$sewa_bus, 'pengguna'=>$pengguna,'customer'=>$customer],
        ['sewa_bus_category'=>$sewa_bus_category, 'pricelist_sewa_armada'=>$pricelist_sewa_armada, 'category_armada'=>$category_armada]);
    }

    public function pdf_paket(Request $request, $id)
    {
        $sewa_paket_wisata= Sewa_Paket_Wisata::find($id);
        $pengguna= Pengguna::find($sewa_paket_wisata->ID_PENGGUNA);
        $customer= customer::find($sewa_paket_wisata->ID_CUSTOMER);

        $paket_wisata=DB::table('paket_wisata')->get();
        $sewa_paket_wisata=DB::table('sewa_paket_wisata')
        ->join('paket_wisata','sewa_paket_wisata.ID_PAKET', '=', 'paket_wisata.ID_PAKET')
        ->where('ID_SEWA_PAKET', '=', $id)
        ->select('sewa_paket_wisata.ID_SEWA_PAKET','sewa_paket_wisata.TGL_SEWA_PAKET',
        'sewa_paket_wisata.TGL_AKHIR_SEWA_PAKET', 'sewa_paket_wisata.DP_PAKET',
        'sewa_paket_wisata.HARGA_SEWA_PAKET','sewa_paket_wisata.JAM_SEWA_PAKET',
        'sewa_paket_wisata.JAM_AKHIR_SEWA_PAKET','paket_wisata.NAMA_PAKET')
        ->get();

        return view('invoicepaket',['sewa_paket_wisata'=>$sewa_paket_wisata, 'pengguna'=>$pengguna,
        'customer'=>$customer, 'paket_wisata'=>$paket_wisata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //dd($request->all());
        $sewa_bus= Sewa_Bus::find($id);
//dd($request->id);
        foreach ($request['id'] as $key) {
            DB::table('sewa_bus_category')->insert([
            'ID_SEWA_BUS'   => $id,
            'ID_PRICELIST'  => $key,
            
            // 'NAMA_CATEGORY' => $request['cat'][$key],
            // 'TUJUAN_SEWA' => $request['tj'][$key],
            'QUANTITY' => $request['qty'][$key],
            //'PRICELIST_SEWA'=> $request['harga'][$key],
            'DISCOUNT'=> $request['discount'][$key],
            'TOTAL'=> $request['subtotal'][$key]
            // 'DP_BUS'=> $request['dpbus'][$key],
            // 'SISA_BAYAR'=> $request['sisabayar'][$key]
        ]);
    }
            $sewa_bus_category=DB::table('sewa_bus_category')
            ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST','=','pricelist_sewa_armada.ID_PRICELIST')
            ->join('category_armada','pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
            ->select('sewa_bus_category.*','pricelist_sewa_armada.TUJUAN_SEWA', 'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.PRICELIST_SEWA')
            ->where('ID_SEWA_BUS', $request->ID_SEWA_BUS)
            ->get();

            DB::table('sewa_bus')->where('ID_SEWA_BUS',$request->idsewa)->update([
                'DP_BUS'        => $request->dpbus,
                'SISA_SEWA_BUS' => $request->sisa,
                'total_payment' => $request->sub
        ]);
            
        $total=$request->total_payment;
        $subtotal=100/75*$total;
        $sisa_bayar=$total-$subtotal;



       return Redirect::back()->with(['sewa_bus_category'=>$sewa_bus_category, 'total'=>$total, 'subtotal'=>$subtotal, 
       'sisa_bayar'=>$sisa_bayar, 'sewa_bus' =>$sewa_bus]);       
    //    return redirect('invoice', ['sewa_bus_category'=>$sewa_bus_category, 'total'=>$total, 'subtotal'=>$subtotal, 'sisa_bayar'=>$sisa_bayar]);       
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
 
        return Redirect::back()->with('insert','data berhasil di tambah');
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
        

        return Redirect::back()->with('insert','data berhasil di tambah');
    }

 

    public function cetak_pdf($id)
    {
    	$customer=DB::table('customer')->get();
        $pengguna=DB::table('pengguna')->get();
        $sewa_bus=DB::table('sewa_bus')
        ->join('customer','sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna','sewa_bus.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->select('sewa_bus.ID_SEWA_BUS','sewa_bus.TGL_SEWA_BUS',
        'sewa_bus.TGL_AKHIR_SEWA','sewa_bus.LAMA_SEWA','customer.NAMA_CUSTOMER', 'sewa_bus.DP_BUS',
        'sewa_bus.HARGA_SEWA_BUS','sewa_bus.JAM_SEWA','sewa_bus.JAM_AKHIR_SEWA','pengguna.NAMA_PENGGUNA')
        ->get();

    	// $pdf = PDF::loadview('invoice',['sewa_bus'=>$sewa_bus]);
        // return $pdf->stream();
        // $pegawai = Pegawai::all();
 
    	$pdf = PDF::loadview('pegawai_pdf',['sewa_bus' =>$sewa_bus,'ID_SEWA_BUS'=>$ID_SEWA_BUS,'customer'=>$customer,'pengguna'=>$pengguna]);
    	return $pdf->download('laporan-sewa_bus-pdf');
    }


    public function getTujuan(){
        $tmp = DB::table('pricelist_sewa_armada')
        ->get();

        return response()->json(['status'=>'success','data'=>$tmp]);
    }
}
