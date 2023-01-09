<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $annualLeaveRequestedModel;
    protected $dataKaryawanModel;
    protected $dataAbsensiModel;
    protected $settingModel;
    protected $inGroupCheck = false;

    public function __construct()
    {
        $this->annualLeaveRequestedModel = new \App\Models\AnnualLeaveRequestedModel();
        $this->dataKaryawanModel = new \App\Models\DataKaryawanModel();
        $this->dataAbsensiModel = new \App\Models\DataAbsensiModel();
        $this->settingModel = new \App\Models\SettingModel();
    }

    public function index()
    {
        $tb_data_karyawan = $this->dataKaryawanModel->findAll();
        $tb_annual = $this->annualLeaveRequestedModel->findAll();
        $tb_absensi = $this->dataAbsensiModel->findAll();

        $data = [
            'title' => 'Master Data',
            'data_karyawan' => $tb_data_karyawan,
            'requested' => $tb_annual,
            'absensi' => $tb_absensi
        ];

        if (in_groups('admin')) {
            return view('adminDashboard', $data);
        } else if (in_groups('kepsek')) {
            return view('kepSekDashboard', $data);
        } else {
            return view('Home', $data);
        }
    }
}
