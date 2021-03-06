<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonfirmasiPembayaran_Controller extends Controller
{
    // Fungsi ini dipakai oleh admin untuk mengkonfirmasi pembayaran
    var $location = "KonfirmasiPembayaran";
    public function index(Request $request)
    {
        // Menampilkan detail pembayaran oleh instansi yang diambil dengan beberapa query dari tabel tb_transaksi_pelayanan
        $data['instansi'] = DB::table('tb_transaksi_pelayanan')
            ->selectRaw('tb_transaksi_pelayanan.*,
                    tb_instansi.nama_pendaftar as nama_pendaftar,
                    tb_instansi.nama_instansi as nama_instansi,
                    tb_jenis_pelayanan.jenis_pelayanan as jenis_pelayanan,
                    tb_text_status.style as style,
                    tb_text_status.text as text')
            ->leftJoin('tb_instansi', 'tb_instansi.id', '=', 'tb_transaksi_pelayanan.id_instansi')
            ->leftJoin('tb_jenis_pelayanan', 'tb_jenis_pelayanan.id', '=', 'tb_transaksi_pelayanan.id_jenis_pelayanan')
            ->leftJoin('tb_text_status', 'tb_text_status.id_status', '=', 'tb_transaksi_pelayanan.id_status_pembayaran')
            ->orderBy('tb_transaksi_pelayanan.id', 'ASC')
            ->where('tb_transaksi_pelayanan.is_deleted', 1)
            ->groupByRaw('tb_transaksi_pelayanan.id')
            ->get();

        // $data['siswa'] = DB::table('tb_siswas')->where([['is_deleted',1],['id_pelayanan',$data[])

        return view('admin.konfirmasiPembayaran', $data);
    }

    public function index_post(Request $request)
    {
        // fungsi ini dipakai untuk melakukan konfirmasi apakah proses tersebut diterima atau ditolak
       $id = $request->id_data;
       $status = $request->status;
       DB::table('tb_transaksi_pelayanan')->where('id',$id)->update(['id_status_pembayaran'=>$status]);
        return redirect('konfirmasi_pembayaran');
    }

    public function detail_pelayanan($id)
    {
        // Fungsi ini dipakai untuk menampilkan detail pelayanan yang diajukan oleh instansi
        // Status 
        $data['instansi'] = DB::table('tb_transaksi_pelayanan')
        ->selectRaw('tb_transaksi_pelayanan.*,
                tb_instansi.nama_pendaftar as nama_pendaftar,
                tb_instansi.nama_instansi as nama_instansi,
                tb_jenis_pelayanan.jenis_pelayanan as jenis_pelayanan,
                tb_jenis_pelayanan.satuan_waktu as satuan_waktu,
                tb_text_status.style as style,
                tb_text_status.text as text')
        ->leftJoin('tb_instansi', 'tb_instansi.id', '=', 'tb_transaksi_pelayanan.id_instansi')
        ->leftJoin('tb_jenis_pelayanan', 'tb_jenis_pelayanan.id', '=', 'tb_transaksi_pelayanan.id_jenis_pelayanan')
        ->leftJoin('tb_text_status', 'tb_text_status.id_status', '=', 'tb_transaksi_pelayanan.id_status_pembayaran')
        ->orderBy('tb_transaksi_pelayanan.id', 'ASC')
        ->where([['tb_transaksi_pelayanan.is_deleted', 1],['tb_transaksi_pelayanan.id',$id]])
        ->groupByRaw('tb_transaksi_pelayanan.id')
        ->first();

        $data['siswa'] = DB::table('tb_siswa')
        ->selectRaw('tb_siswa.*,
                tb_text_status.style as style,
                tb_text_status.text as text')
        ->leftJoin('tb_text_status', 'tb_text_status.id_status', '=', 'tb_siswa.id_status')
        ->where([['tb_siswa.is_deleted', 1], ['tb_siswa.id_pelayanan', $id]])->get();
        // print_r($data['siswa']);
        return view('admin.detail_konfirmasi', $data);
    }

    public function tolakSIswa(Request $request)
    {
        $id_hapus = $request->id_data;
        $id_data = $request->id_pelayanan;
        $msg = $request->msg;
        DB::table('tb_siswa')->where('id',$id_hapus)->update(['id_status'=>22,'msg_fail'=>$msg]);

        return redirect('/konfirmasi_pembayaran/detail/' . $id_data);

    }
}
