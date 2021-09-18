<?php

namespace App\Http\Controllers;

use App\Models\DetailKartuKeluarga;
use App\Models\Dusun;
use App\Models\KartuKeluarga;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Mutasi;
use App\Models\Penduduk;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Cart 1 Box
        $penduduk = Penduduk::count();
        $pendudukBaru = Penduduk::take(5)->get();
        $kepalaKeluarga = DetailKartuKeluarga::where('status_dalam_keluarga', 'AYAH')->count();
        $totalWargaKematian = Kematian::count();
        $totalWargaKelahiran = Kelahiran::count();
        $totalDusun = Dusun::count();
        $user = User::count();
        $totalPendudukPindah = Mutasi::count();
        $TotalPendudukDatang = Penduduk::where('kelahiran', 0)->count();

        $menikah = Penduduk::where('status', 'MENIKAH')->count();
        $belum_menikah = Penduduk::where('status', 'BELUM_MENIKAH')->count();
        $bercerai = Penduduk::where('status', 'BERCERAI')->count();

        // Cart 2 grafik
        $month = date('d-m-Y');
        $Jan = Penduduk::whereMonth('created_at', '1')
            ->get()
            ->count();
            $Feb = Penduduk::whereMonth('created_at', '2')
                ->get()
                ->count();

            $Mar = Penduduk::whereMonth('created_at', '3')
                ->get()
                ->count();

            $Apr = Penduduk::whereMonth('created_at', '4')
                ->get()
                ->count();

            $May = Penduduk::whereMonth('created_at', '5')
                ->get()
                ->count();

            $Jun = Penduduk::whereMonth('created_at', '6')
                ->get()
                ->count();

            $Jul = Penduduk::whereMonth('created_at', '7')
                ->get()
                ->count();

            $Aug = Penduduk::whereMonth('created_at', '8')
                ->get()
                ->count();

            $Sep = Penduduk::whereMonth('created_at', '9')
                ->get()
                ->count();

            $Oct = Penduduk::whereMonth('created_at', '10')
                ->get()
                ->count();

            $Nov = Penduduk::whereMonth('created_at', '11')
                ->get()
                ->count();

        $Dec = Penduduk::whereMonth('created_at', '12')
            ->get()
        ->count();

        // Jenis Kelamin
        $laki = Penduduk::where('jenis_kelamin', 'LAKILAKI')->count();
        $wanita = Penduduk::where('jenis_kelamin', 'PEREMPUAN')->count();
        $upnormal = Penduduk::where('jenis_kelamin', 'UPNORMAL')->count();

        return view('pages.dashboard', compact(
            'penduduk',
            'pendudukBaru',
            'kepalaKeluarga',
            'totalWargaKematian',
            'totalWargaKelahiran',
            'totalPendudukPindah',
            'totalDusun',
            'TotalPendudukDatang',
            'user',

            'menikah',
            'belum_menikah',
            'bercerai',

            'month',
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',

            'laki',
            'wanita',
            'upnormal',
        ));
    }
}
