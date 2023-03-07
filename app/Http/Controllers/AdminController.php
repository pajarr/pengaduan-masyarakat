<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dataTable()
    {
        $data = Admin::get();
        $latest = DB::table('pengaduan')->orderBy('id', 'desc')->first();
        $total = DB::table('pengaduan')->count();
        $belum = DB::table('pengaduan')->where('status','=','proses')->selectRaw('count(id) as id')->pluck('id');
        $sudah = DB::table('pengaduan')->where('status','=','selesai')->selectRaw('count(id) as id')->pluck('id');
        return view('dashboard', compact('data', 'total', 'belum', 'sudah', 'latest'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function table(Admin $id)
    {
        $show = Admin::findOrFail($id);
        $data = Admin::get();
        return view('table', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function tablePetugas(Admin $id)
    {
        $show = Admin::findOrFail($id);
        $data = Admin::get();
        return view('table', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Admin $id): RedirectResponse
    {
        $request->validate([
            'tanggapan' => 'required',
            'tgl_tanggapan' => 'required'
        ]);
        Admin::findOrFail($id);
        Pengaduan::create($request->all());
        // $post = DB::table('pengaduan')->update(['tanggapan' => $request->tanggapan]);
        // $post = Admin::get();
        return redirect()->route('dataPengaduan');
    }

    /**
     * Display the specified resource.
     */
    public function dataPetugas(User $user)
    {
        $petugas = User::get()->where('role', '=', 'Petugas');
        return view('petugas', compact('petugas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function dataMasyarakat(User $user)
    {
        $masyarakat = User::get()->where('role', '=', 'Masyarakat');
        return view('masyarakat', compact('masyarakat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function get_cetak()
    {
        $data = Admin::all();
        $belum = DB::table('pengaduan')->where('status','=','proses')->selectRaw('count(id) as id')->pluck('id');
        $sudah = DB::table('pengaduan')->where('status','=','selesai')->selectRaw('count(id) as id')->pluck('id');
        $total = DB::table('pengaduan')->where('tgl_pengaduan','=', Carbon::today())->get();
        dd($total);
        return view('pengaduan-pdf',compact('data', 'sudah', 'belum'));
    }

    public function cetak_pdf()
    {
    	$data = Admin::all();
        $belum = DB::table('pengaduan')->where('status','=','proses')->selectRaw('count(id) as id')->pluck('id');
        $sudah = DB::table('pengaduan')->where('status','=','selesai')->selectRaw('count(id) as id')->pluck('id');
    	$pdf = PDF::loadview('pengaduan-pdf',['data'=>$data, 'belum'=>$belum, 'sudah'=>$sudah, 'belum'=>$belum]);
    	return $pdf->download('laporan-pengaduan.pdf');

    }

    public function update(Admin $id)
    {
        $data = Admin::findOrFail($id);
        $data = DB::table('pengaduan')
                ->update(['status' => 'proses']);
        
        //redirect to index
        return redirect()->route('dataPengaduan');
    }

    public function edit(Admin $admin)
    {
        $data = Admin::get();
        return view('admin.tanggapan',compact('data'));
    }

    // public function editData(Request $request)
    // {
    //      dd('test');
    // }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            Admin::findOrFail($id)->delete();
            return redirect()->route('dataPengaduan');
    }
}
