<?php

namespace App\Http\Controllers;

use App\Http\Middleware\adminonly;
use App\Models\Kerjasama;
use App\Models\Pengajuan;
use App\Models\Unit;
use App\Models\Unitassign;
// use App\Models\Books;
// use App\Models\Categories;
// use App\Models\Category;
// use App\Models\DetailTransactions;
// use App\Models\genreassigns;
// use App\Models\TransactionHeaders;
// use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

use function PHPUnit\Framework\isEmpty;

class MasterController extends Controller

{
    public function loginPage(){
        return view('login');
        // $jurusan = Unit::all();
        // dd($jurusan);
    }
    

    public function homePage(){
        $jurusan = Unit::all();
        return view('template',['jurusan' => $jurusan]);
    }

    public function viewDB($units_id){
        //$kerjasama = Kerjasama::where('id',$units_id)->get();
        $unit = Unit::where('id',$units_id)->first();
        $jurusan = Unit::all();
        $kerjasama = DB::table('kerjasamas')
        ->join('unitassigns','kerjasamas.id','=','unitassigns.kerjasama_id')
        ->select('kerjasamas.*')
        ->where('unit_id',$units_id)->get();
        // dd($unit);

        //Select * From kerjasama untuk jurusan yang dipilih, baru tampilkan datanya di page

        return view('databaseView',['kerjasama'=>$kerjasama,'jurusan'=>$jurusan,'unit'=>$unit]);


    }

    public function viewDBDetail($jurusan_id){
        //lihat detail data
    }

    public function viewDBDelete($jurusan_id){
        //delete
    }

    



    public function inputMenuView(){
        $jurusan = Unit::all();
        $pengajuan = Pengajuan::where('status',2)->get();
        return view('inputMenu',['jurusan' => $jurusan,'pengajuan'=>$pengajuan]);
    }

    public function inputMenuSubmit(Request $request){
        // dd($request);
        //Submit ke SQL
        // id - PK (autogenerate?)
        // pengajuan_id FK (buat link ke pengajuan)
        // dok_no - ambil dari table pengajuan dimana status = 2, kalo status 2 artinya udah di acc)
        // dok_tipe - integer dimana MOU;MOA;IA
        // dok_dasar - teks (hanya muncul kalau dokTipe bukan MOU)
        // mitra_nama - teks
        // jurusan - link ke table unitassigns
        // tingkat -  integer dimana 1=Internasional;2=Nasional;3=Lokal
        // ks_judul - teks
        // ks_detail - teks
        // dt_start - tgl mulai kerjasama
        // dt_end - tgl end kerjasama
        // ks_bukti - format gambar
        // ks_dokumen - format pdf

        $validateData = $request-> validate([
            'dokNo'=> 'required',
            'dokDasar' => 'nullable',
        ]);
        $bukti = $request->file('ksBukti');
        // dd($bukti->getclientoriginalname());
        $doc = $request->file('ksDoc');

        $pengajuan = Pengajuan::where('id',$validateData['dokNo'])->first();
        $pengajuan->status = 3;
        $pengajuan->save();
        $unit = Unitassign::where('pengajuan_id',$pengajuan->id)->get();


        $kerjasama = new Kerjasama();
        $kerjasama->pengajuan_id = $pengajuan->id;
        $kerjasama->dok_no = $pengajuan->dok_no;
        $kerjasama->dok_tipe = $pengajuan->dok_tipe;
        $kerjasama->dok_dasar = $validateData['dokDasar'];
        $kerjasama->mitra_nama = $pengajuan->mitra_nama;
        $kerjasama->tingkat = $pengajuan->tingkat;
        $kerjasama->ks_judul = $pengajuan->ks_judul;
        $kerjasama->ks_detail = $pengajuan->ks_detail;
        $kerjasama->dt_start = $pengajuan->dt_start;
        $kerjasama->dt_end = $pengajuan->dt_end;

        if($bukti !=null){
            $file = $bukti;
            $ext = $file->getClientOriginalExtension();
            $namafile = $kerjasama->dok_no . "Bukti.". $ext;
            // $path = $request->berkas->move('image',$namafile);
            Storage::putFileAs('public/files',$file,$namafile);
            $path = 'files/' . $namafile;
            $kerjasama->ks_bukti = $path;
        }

        if($doc !=null){
            $file = $doc;
            $ext = $file->getClientOriginalExtension();
            $namafile = $kerjasama->dok_no . "Doc.". $ext;
            // $path = $request->berkas->move('image',$namafile);
            Storage::putFileAs('public/files',$file,$namafile);
            $path = 'files/' . $namafile;
            $kerjasama->ks_dokumen = $path;
        }

        $kerjasama->save();

        //update unit assign
        foreach($unit as $u){
            $US = Unitassign::where('id',$u->id)->first();
            $US->kerjasama_id = $kerjasama->id;
            $US->save();
        }

        //----------------------------------------------------------------------------------

        //mau fitur pas manggil pengajuan, autofill ke respected fields (yang sama fieldnya)
        return redirect('/home');

    }
    
    public function pengajuanAcc(){
        //panggil data pengajuan
        $jurusan = Unit::all();
        // $pengajuan = Pengajuan::all();
        $pengajuan = Pengajuan::where('status',1)->get();
        return view('pengajuanAcc',['jurusan' => $jurusan, 'pengajuan' => $pengajuan]);
    }

    public function pengajuanAccDetail($pengajuan_id){
        $jurusan = Unit::all();
        $pengajuan = Pengajuan::where('id',$pengajuan_id)->first();
        $assign = Unitassign::where('pengajuan_id',$pengajuan_id)->get();
        return view('pengajuanAccDetail',['jurusan' => $jurusan, 'pengajuan'=>$pengajuan,'assign'=>$assign]);
    }
    public function pengajuanAccDetailBack(){
        return redirect('/pengajuanAcc');
    }

    public function pengajuanDelete($pengajuan_id){
        $unit = Unitassign::where('pengajuan_id',$pengajuan_id)->delete();

        $pengajuan = Pengajuan::where('id',$pengajuan_id)->delete();

        //delete pengajuan
        return redirect('/pengajuanInput');
    }

    public function pengajuanAccExecute($pengajuanId){
        //update pengajuan ganti status ke Accepted, 
        // terus harus refresh page ?
        // dd($pengajuanId);
        $pengajuan = Pengajuan::where('id',$pengajuanId)->first();
        $pengajuan->status = 2;
        $pengajuan->save();

        return redirect('/pengajuanAcc');
    }

    public function pengajuanInput(){
        $jurusan = Unit::all();
        $pengajuan = Pengajuan::all();
        return view('pengajuanInput',['jurusan' => $jurusan,'pengajuan' => $pengajuan]);
    }
    public function pengajuanInputDetail($pengajuan_id){
        $jurusan = Unit::all();
        $pengajuan = Pengajuan::where('id',$pengajuan_id)->first();
        $assign = Unitassign::where('pengajuan_id',$pengajuan_id)->get();
        return view('pengajuanInputDetail',['jurusan' => $jurusan, 'pengajuan'=>$pengajuan,'assign'=>$assign]);
    }
    public function pengajuanInputDetailBack(){
        return redirect('/pengajuanInput');
    }
    public function pengajuanInputMenu(){
        $jurusan = Unit::all();
        $pengajuan = Pengajuan::all();
        return view('pengajuanInputMenu',['jurusan' => $jurusan,'pengajuan' => $pengajuan]);
    }
    public function pengajuanInputMenuExecute(Request $request){

        // dd($request);

        // dok_no 
        // dok_tipe
        // mitra_nama
        // mitra_deskripsi
        // mitra_alamat
        // ks_judul
        // ks_detail
        // tingkat
        // pdt
        // pdt_jb
        // pdt_mitra
        // pdt_mitrajb
        // pdt_lokasi
        // dt_start
        // dt_end
        // status (default 1, baru bisa diacc update jadi 2)
        // jurusan (jurusan)


        $validateData = $request-> validate([
            'dokNo'=> 'required',
            'dokTipe' => 'required',
            'mitraNama' => 'required',
            'mitraDeskripsi' => 'required',
            'mitraAlamat' => 'required',
            'ksJudul' => 'required',
            'ksDetail' => 'required',
            'tingkat' => 'required',
            'pdt' => 'required',
            'pdtJb' => 'required',
            'pdtMitra' => 'required',
            'pdtMitraJb' => 'required',
            'pdtLokasi' => 'required',
            'dtStart' => 'required',
            'dtEnd' => 'required'
        ]);
        // dd( $validateData);
        $pengajuan = new Pengajuan();
        $pengajuan->dok_no =  $validateData['dokNo'];
        $pengajuan->dok_tipe =  $validateData['dokTipe'];
        $pengajuan->mitra_nama =  $validateData['mitraNama'];
        $pengajuan->mitra_deskripsi =  $validateData['mitraDeskripsi'];
        $pengajuan->mitra_alamat =  $validateData['mitraAlamat'];
        $pengajuan->ks_judul =  $validateData['ksJudul'];
        $pengajuan->ks_detail =  $validateData['ksDetail'];
        $pengajuan->tingkat =  $validateData['tingkat'];
        $pengajuan->pdt =  $validateData['pdt'];
        $pengajuan->pdt_jb =  $validateData['pdtJb'];
        $pengajuan->pdt_mitra =  $validateData['pdtMitra'];
        $pengajuan->pdt_mitraJb =  $validateData['pdtMitraJb'];
        $pengajuan->pdt_lokasi =  $validateData['pdtLokasi'];
        $pengajuan->dt_start =  $validateData['dtStart'];
        $pengajuan->dt_end =  $validateData['dtEnd'];
        $pengajuan->status = 1;
        $pengajuan->save();

        
        foreach($request->jurusan as $g){
            $unit = new Unitassign();
            $unit->unit_id = $g;
            $unit->pengajuan_id = $pengajuan->id;
            $unit->save(); 
        }
        $pengajuan = Pengajuan::all();
        return redirect('/pengajuanInput');
    }

    public function login(Request $request){
        //kekmana cara return nya alert box ketika fail?


        if(Auth::attempt(['username' => $request->username, 'password' => $request->password],true)){
            Session::put('mysession',$request->username);
            return redirect('/home');
        }
        return 'fail';


    }
    
}