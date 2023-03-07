<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latest = DB::table('pengaduan')->orderBy('id')->limit(1);
        return view('dashboard', compact('latest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        // menyimpan data file yang diupload ke variabel $file
        $validatedData = $request->validate([
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           ]);
    
           $name = $request->foto->getClientOriginalName();
           $path = $request->foto->store('public/images');

        $data = Admin::create([
            'foto' => $path,
            'isi_laporan' => $request->isi_laporan,
            'tgl_tanggapan' => $request->tgl_tanggapan,
            'tanggapan' => $request->tanggapan,
            'nik' => $request->nik,
            'nama_pengadu' => $request->nama_pengadu,
        ]);
        return redirect()->route('dashboard');
    }

    public function show(){

    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function dataRiwayat()
    {
        $data = Admin::get()->where('nama_pengadu', '=', Auth::user()->name );
        return view('masyarakat.riwayat', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Admin::findOrFail($id);
        return view('admin.tanggapan',compact('data'));
    }

    /**
     * 
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $admin = Admin::findOrFail($id)->update([
            'tanggapan' => $request->tanggapan,
            'status' => 'selesai'
        ]);
        return redirect()->route('dataPengaduan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
            $post = User::findOrFail($id);
            $post->delete();
     
            return redirect()->route('dataPetugas');
    }
}
