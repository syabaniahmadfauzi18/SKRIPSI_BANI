<?php

namespace App\Controllers;

use finfo;

class UserPages extends BaseController
{
    protected $dummyId = "adm01";
    protected $useDummy = false;
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

    public function ViewLoginPageUser()
    {
        return view('userlogin');
    }

    public function ViewHomePageUser()
    {
        $userId = $this->dummyId;
        $isNormalUser = true;

        if (!$this->useDummy) {
            $userId = user_id();
            $isNormalUser = !auth()->getUser()->inGroup('admin') && !auth()->getUser()->inGroup('kepsek');
        }

        if ($isNormalUser) {
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

            return view('Home', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewRequestAnnual($userId)
    {
        $Id = $this->dummyId;
        $isNormalUser = true;

        if (!$this->useDummy) {
            $id = user_id();
            $isNormalUser = !auth()->getUser()->inGroup('admin') && !auth()->getUser()->inGroup('kepsek');
        }

        if ($isNormalUser) {
            $tb_data_karyawan = $this->dataKaryawanModel->findAll();
            $tb_annual = $this->annualLeaveRequestedModel->findAll();
            $tb_absensi = $this->dataAbsensiModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'userId' => $userId,
                'data_karyawan' => $tb_data_karyawan,
                'requested' => $tb_annual,
                'absensi' => $tb_absensi,
                'users' => $tb_user,
                'current_id' => $Id
            ];

            return view('RequestAnnualLeave', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewCheckinPage()
    {
        $userId = $this->dummyId;
        $isNormalUser = true;

        if (!$this->useDummy) {
            $userId = user_id();
            $isNormalUser = !auth()->getUser()->inGroup('admin') && !auth()->getUser()->inGroup('kepsek');
        }

        if ($isNormalUser) {
            $tb_data_karyawan = $this->dataKaryawanModel->findAll();
            $tb_absensi = $this->dataAbsensiModel->findAll();
            $tb_setting = $this->settingModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'absensi' => $tb_absensi,
                'setting' => $tb_setting,
                'users' => $tb_user,
                'data_karyawan' => $tb_data_karyawan,
                'current_id' => $userId
            ];

            return view('checkin', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function SendReqAnnual()
    {
        $userId = $this->dummyId;
        $isNormalUser = true;

        if (!$this->useDummy) {
            $userId = user_id();
            $isNormalUser = !auth()->getUser()->inGroup('admin') && !auth()->getUser()->inGroup('kepsek');
        }

        if ($isNormalUser) {
            $tb_annual = $this->annualLeaveRequestedModel;
            $fileLampiran = $this->request->getFile('lampiran');
            $fileName = $fileLampiran->getRandomName();
            $fileLampiran->move('lampiran', $fileName);

            $tb_annual->insert([
                'requester_id' => $this->request->getPost('name'),
                'date' => $this->request->getPost('tanggal'),
                'reason' => $this->request->getPost('reason'),
                'attachment' => $fileName,
                'status' => 'Requested'
            ]);

            return redirect()->to("/home");
        } else {
            return redirect()->to('/');
        }
    }

    public function SendCheckIn($idKaryawan, $date)
    {
        $userId = $this->dummyId;
        $isNormalUser = true;

        if (!$this->useDummy) {
            $userId = user_id();
            $isNormalUser = !auth()->getUser()->inGroup('admin') && !auth()->getUser()->inGroup('kepsek');
        }

        if ($isNormalUser) {
            $tb_absensi = $this->dataAbsensiModel;

            $tb_absensi->insert([
                'id_karyawan' => $idKaryawan,
                'date' => $date,
                'status' => "Masuk",
            ]);

            return redirect()->to("/home");
        } else {
            return redirect()->to('/');
        }
    }
}
