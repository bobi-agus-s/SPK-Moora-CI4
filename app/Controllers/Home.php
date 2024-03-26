<?php

namespace App\Controllers;

use App\Models\PerhitunganModel;

class Home extends BaseController
{

    public function __construct()
    {
        $this->perhitungan = new PerhitunganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'page'  => 'dashboard',
            'dt_hasil' => $this->perhitungan->getHasil()
        ];
        return view('home', $data);
    }
}
