<?php

namespace App\Http\Controllers;

use App\Http\Middleware\adminonly;
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
        $jurusan = Units::all();
    }

    public function homePage(){
        return view('template');
    }

    public function viewDB($jurusan_id){
        //Select * From kerjasama untuk jurusan yang dipilih, baru tampilkan datanya di page
    }

    public function viewDBDetail($jurusan_id){
        //lihat detail data
    }

    public function viewDBDelete($jurusan_id){
        //delete
    }

    



    public function inputMenuView(){
        return view('inputMenu');
    }

    public function inputMenuSubmit(){
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

        //----------------------------------------------------------------------------------

        //mau fitur pas manggil pengajuan, autofill ke respected fields (yang sama fieldnya)
        

    }
    
    public function pengajuanAcc(){
        //panggil data pengajuan
        $jurusan = Units::all();
        $pengajuan = Pengajuan::all();
        return view('manageBook',['pengajuan' => $pengajuan]);
        return view('pengajuanAcc');
    }

    public function pengajuanAccDetail($pengajuan_id){
        $jurusan = Units::all();
        $pengajuan = Pengajuan::where('id',$pengajuan_id)->first();
        $assign = unitAssigns::where('pengajuan_id',$pengajuan_id)->get();
        return view('pengajuanAccDetail',['jurusan' => $jurusan, 'pengajuan'=>$pengajuan,'assign'=>$assign]);
    }

    public function pengajuanAccExecute($pengajuanId){
        //update pengajuan ganti status ke Accepted, 
        // terus harus refresh page ?
    }

    public function pengajuanInput(){
        return view('pengajuanInput');
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