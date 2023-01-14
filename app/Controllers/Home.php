<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $annualLeaveRequestedModel;
    protected $dataKaryawanModel;
    protected $dataAbsensiModel;
    protected $settingModel;
    protected $inGroupCheck = false;
    protected $userController;
    protected $kepsekController;
    protected $adminController;

    public function __construct()
    {
        $this->annualLeaveRequestedModel = new \App\Models\AnnualLeaveRequestedModel();
        $this->dataKaryawanModel = new \App\Models\DataKaryawanModel();
        $this->dataAbsensiModel = new \App\Models\DataAbsensiModel();
        $this->settingModel = new \App\Models\SettingModel();
        $this->userController = new UserPages();
        $this->kepsekController = new KepSekPages();
        $this->adminController = new AdminPages();
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

        if (auth()->getUser()->inGroup('admin')) {
            return $this->adminController->ViewAdminPage();
        } else if (auth()->getUser()->inGroup('kepsek')) {
            return $this->kepsekController->ViewDashboard();
        } else {
            return $this->userController->ViewHomePageUser();
        }
    }
}
