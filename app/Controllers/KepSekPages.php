<?php

namespace App\Controllers;

use finfo;

class KepSekPages extends BaseController
{
    protected $groupChecking = true;
    protected $dummyId = "KS01";
    protected $annualLeaveRequestedModel;
    protected $dataKaryawanModel;
    protected $dataAbsensiModel;
    protected $settingModel;
    protected $userModel;

    public function __construct()
    {
        $this->annualLeaveRequestedModel = new \App\Models\AnnualLeaveRequestedModel();
        $this->dataKaryawanModel = new \App\Models\DataKaryawanModel();
        $this->dataAbsensiModel = new \App\Models\DataAbsensiModel();
        $this->settingModel = new \App\Models\SettingModel();
        $this->userModel = new \App\Models\UserModel();
    }

    public function ViewDashboard()
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = auth()->getUser()->inGroup('kepsek');
            $userId = user_id();
        }

        if ($inGroup) {
            $tb_data_karyawan = $this->dataKaryawanModel->findAll();
            $tb_annual = $this->annualLeaveRequestedModel->findAll();
            $tb_absensi = $this->dataAbsensiModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'title' => 'Master Data',
                'data_karyawan' => $tb_data_karyawan,
                'requested' => $tb_annual,
                'absensi' => $tb_absensi,
                'users' => $tb_user,
                'current_id' => $userId
            ];

            return view('kepSekDashboard', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewMasterData()
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = auth()->getUser()->inGroup('kepsek');
            $userId = user_id();
        }

        if ($inGroup) {
            $tb_data_karyawan = $this->dataKaryawanModel->findAll();
            $tb_annual = $this->annualLeaveRequestedModel->findAll();
            $tb_absensi = $this->dataAbsensiModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'title' => 'Master Data',
                'data_karyawan' => $tb_data_karyawan,
                'requested' => $tb_annual,
                'absensi' => $tb_absensi,
                'users' => $tb_user,
                'current_id' => $userId
            ];

            return view('kepSekMasterData', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewHistoryData()
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = auth()->getUser()->inGroup('kepsek');
            $userId = user_id();
        }

        if ($inGroup) {
            $tb_data_karyawan = $this->dataKaryawanModel->findAll();
            $tb_absensi = $this->dataAbsensiModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'autoSearchKey' => "",
                'data_karyawan' => $tb_data_karyawan,
                'absensi' => $tb_absensi,
                'users' => $tb_user,
                'current_id' => $userId
            ];

            return view('kepSekHistoryAbsensi', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewHistorydPageWithParam($autosearch)
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = auth()->getUser()->inGroup('kepsek');
            $userId = user_id();
        }

        if ($inGroup) {
            $tb_absensi = $this->dataAbsensiModel->findAll();
            $tb_data_karyawan = $this->dataKaryawanModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'autoSearchKey' => $autosearch,
                'data_karyawan' => $tb_data_karyawan,
                'absensi' => $tb_absensi,
                'users' => $tb_user,
                'current_id' => $userId
            ];

            return view('kepsekHistoryAbsensi', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
