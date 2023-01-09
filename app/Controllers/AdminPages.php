<?php

namespace App\Controllers;

use CodeIgniter\CLI\Console;

class AdminPages extends BaseController
{
    protected $groupChecking = false;
    protected $dummyId = "admin01";
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

    public function ViewAdminPage()
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = in_groups('admin');
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

            return view('adminDashboard', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewAdminSettingPage()
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = in_groups('admin');
            $userId = user_id();
        }

        if ($inGroup) {
            $tb_data_karyawan = $this->dataKaryawanModel->findAll();
            $tb_annual = $this->annualLeaveRequestedModel->findAll();
            $tb_absensi = $this->dataAbsensiModel->findAll();
            $tb_setting = $this->settingModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'title' => 'Master Data',
                'data_karyawan' => $tb_data_karyawan,
                'requested' => $tb_annual,
                'absensi' => $tb_absensi,
                'setting' => $tb_setting,
                'users' => $tb_user,
                'current_id' => $userId
            ];

            return view('adminSetting', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewAdminMasterDataPage()
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = in_groups('admin');
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

            return view('adminMasterData', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewAdminAnnualLeavedPage()
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = in_groups('admin');
            $userId = user_id();
        }

        if ($inGroup) {
            $table = $this->annualLeaveRequestedModel->findAll();
            $tb_karyawan = $this->dataKaryawanModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'title' => 'Data Tabel Annual Leave Requested',
                'requested' => $table,
                'data_karyawan' => $tb_karyawan,
                'users' => $tb_user,
                'current_id' => $userId
            ];

            return view('adminAnnualLeaveRequested', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewAdminHistorydPage()
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = in_groups('admin');
            $userId = user_id();
        }

        if ($inGroup) {
            $tb_absensi = $this->dataAbsensiModel->findAll();
            $tb_data_karyawan = $this->dataKaryawanModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'autoSearchKey' => "",
                'data_karyawan' => $tb_data_karyawan,
                'absensi' => $tb_absensi,
                'users' => $tb_user,
                'current_id' => $userId
            ];

            return view('adminHistoryAbsensi', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewAdminHistorydPageWithParam($autosearch)
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = in_groups('admin');
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

            return view('adminHistoryAbsensi', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewEditKaryawan($targetid)
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = in_groups('admin');
            $userId = user_id();
        }

        if ($inGroup) {
            $tb_data_karyawan = $this->dataKaryawanModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'title' => 'Master Data',
                'targetid' => $targetid,
                'data_karyawan' => $tb_data_karyawan,
                'users' => $tb_user,
                'current_id' => $userId
            ];

            return view('editDataKaryawan', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function ViewTambahKaryawan()
    {
        $inGroup = true;
        $userId = $this->dummyId;

        if ($this->groupChecking) {
            $inGroup = in_groups('admin');
            $userId = user_id();
        }

        if ($inGroup) {
            $tb_data_karyawan = $this->dataKaryawanModel->findAll();
            $tb_user = $this->userModel->findAll();

            $data = [
                'title' => 'Master Data',
                'data_karyawan' => $tb_data_karyawan,
                'users' => $tb_user,
                'current_id' => $userId
            ];

            return view('tambahKaryawan', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function UpdateSetting()
    {
        $tb_setting = $this->settingModel;

        $tb_setting->save([
            'id' => 1,
            'scanner_link' => $this->request->getPost('scanner_link'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude')
        ]);

        return redirect()->to("/adminDashboard");
    }

    public function UpdateAnnualLeaveApproved($idAction, $idKaryawan)
    {
        $tb_annual = $this->annualLeaveRequestedModel;
        $tb_absensi = $this->dataAbsensiModel;

        $tb_annual->save([
            'id' => $idAction,
            'status' => "Approved"
        ]);

        $action = $tb_annual->find($idAction);
        $date = $action['date'];

        $tb_absensi->insert([
            'id_karyawan' => $idKaryawan,
            'date' => $date,
            'status' => "Izin",
        ]);

        return redirect()->to("/adminAnnualLeaved");
    }

    public function UpdateAnnualLeaveRejected($idAction, $idKaryawan)
    {
        $tb_annual = $this->annualLeaveRequestedModel;

        $tb_annual->save([
            'id' => $idAction,
            'status' => "Rejected"
        ]);

        return redirect()->to("/adminAnnualLeaved");
    }

    public function DeleteKaryawan($id)
    {
        $this->dataKaryawanModel->delete($id);
        return redirect()->to("/adminMasterData");
    }

    public function TambahKaryawan()
    {
        $this->dataKaryawanModel->insert([
            'id' => $this->request->getPost('id'),
            'name' => $this->request->getPost('name'),
            'position' => $this->request->getPost('position'),
            'phone' => $this->request->getPost('phone'),
            'office' => $this->request->getPost('office'),
            'start_date' => $this->request->getPost('startdate'),
            'salary' => $this->request->getPost('salary'),
            'ttl' => $this->request->getPost('ttl')
        ]);

        return redirect()->to("/adminMasterData");
    }

    public function UpdateKaryawan()
    {
        $this->dataKaryawanModel->save([
            'id' => $this->request->getPost('id'),
            'name' => $this->request->getPost('name'),
            'position' => $this->request->getPost('position'),
            'phone' => $this->request->getPost('phone'),
            'office' => $this->request->getPost('office'),
            'start_date' => $this->request->getPost('startdate'),
            'salary' => $this->request->getPost('salary'),
            'ttl' => $this->request->getPost('ttl')
        ]);

        return redirect()->to("/adminMasterData");
    }
}
