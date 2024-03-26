<?php

namespace App\Controllers;

use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\PerhitunganModel;

class Perhitungan extends BaseController
{
    public function __construct()
    {
        $this->alternatif = new AlternatifModel();
        $this->kriteria = new KriteriaModel();
        $this->perhitungan = new PerhitunganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Perhitungan',
            'page'  => 'perhitungan',
            'alternatif'    => $this->alternatif->findAll(),
            'kriteria'      => $this->kriteria->findAll(),
            'model_perhitungan'     => $this->perhitungan
        ];
        return view('perhitungan/index', $data);
    }

    public function hasil()
    {
        $this->perhitungan->deleteAllHasil();

        //  ============ keterangan ============
        // x = matrik keputusan
        // w = bobot kriteria
        // Y = normalisasi matrik
        // Yi = optimasi

        $dt_alternatif = $this->alternatif->findAll();
        $dt_kriteria = $this->kriteria->findAll();

        $Y = 0;

        foreach ($dt_alternatif as $alternatif) {
            $hasil = 0;
            foreach ($dt_kriteria as $kriteria) {
                // inisialisasi matrik keputusan
                $x = $this->perhitungan->getNilai($alternatif->id_alternatif, $kriteria->id_kriteria);
                // inisialisasi pembagi
                $penyebut = $this->perhitungan->getPenyebut($kriteria->id_kriteria);
                // inisialisasi bobot
                $w = $kriteria->bobot/100;
                // hitung matrik ternormalisasi
                $Y = $x->nilai / $penyebut->nilai;
                // Optimasi
                $Yi = $Y * $w;

                // hitung hasil
                if ($kriteria->jenis_kriteria == "benefit") {
                    $hasil += $Yi;
                } else {
                    $hasil -= $Yi;
                }
            }
            $this->perhitungan->insertHasil($alternatif->id_alternatif, $hasil);
        }

        $data = [
            'title' => 'hasil',
            'page'  => 'hasil',
            'dt'    => $this->perhitungan->getHasil()
        ];

        return view('perhitungan/hasil', $data);
    }
}
