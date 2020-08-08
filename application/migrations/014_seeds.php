<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_seeds extends CI_Migration
{

  function up()
  {

    $menu_icon = array(
      'Admin' => 'user-secret',
      'HSSE' => 'street-view',
      'MPE' => 'user-circle',
      'Vendor' => 'wrench',
      'Email' => 'envelope',
      'Template' => 'copy'
    );

    $this->load->model(array('Users', 'Roles', 'Permissions', 'Menus'));
    $fas = array('database', 'desktop', 'download', 'ethernet', 'hdd', 'hdd', 'headphones', 'keyboard', 'keyboard', 'laptop', 'memory', 'microchip', 'mobile', 'mobile-alt', 'plug', 'power-off', 'print', 'satellite', 'satellite-dish', 'save', 'save', 'sd-card', 'server', 'sim-card', 'stream', 'tablet', 'tablet-alt', 'tv', 'upload');

    $admin = null;
    $vendor= null;
    foreach (array('Admin', 'HSSE', 'MPE', 'Vendor') as $role) {
      $roledb = $this->Roles->create(array('name' => $role));
      if ('Admin' === $role) $admin = $roledb;
      if ('Vendor' === $role) $vendor = $roledb;
      foreach (array('index', 'create', 'read', 'update', 'delete') as $action) {
        $this->Permissions->create(array(
          'role' => $admin,
          'action' => $action,
          'entity' => $role
        ));
      }

      $this->Menus->create(array(
        'role' => $admin,
        'name' => $role,
        'url' => $role,
        'icon' => $menu_icon[$role]
      ));
    }

    foreach (array('User', 'Role', 'Permission', 'Menu', 'Project', 'PesertaProject', 'HSE', 'PJA', 'WIP', 'LaporanBulanan', 'KPI', 'Email', 'Template'/*additionalEntity*/) as $entity) {
      foreach (array('index', 'create', 'read', 'update', 'delete') as $action) {
        $this->Permissions->create(array(
          'role' => $admin,
          'action' => $action,
          'entity' => $entity
        ));
      }
    }

    $this->Menus->create(array(
      'role' => $admin,
      'name' => 'Email',
      'url' => 'Email',
      'icon' => $menu_icon['Email']
    ));

    $this->Menus->create(array(
      'role' => $admin,
      'name' => 'Template',
      'url' => 'Template',
      'icon' => $menu_icon['Template']
    ));

    $this->Users->create(array(
      'username' => 'admin',
      'password' => md5('admin'),
      'role' => $admin
    ));

    foreach (array ('HSE', 'LaporanBulanan') as $updateableByVendors) {
      $this->Permissions->create(array(
        'role' => $vendor,
        'action' => 'update',
        'entity' => $updateableByVendors
      ));
    }

    // NO ONE PERMITTED TO CREATE OR DELETE STEPS
    foreach (array('PesertaProject', 'HSE', 'PJA', 'WIP', 'LaporanBulanan', 'KPI') as $step) {
      foreach (array('create', 'delete') as $action) {
        foreach ($this->Permissions->find(array(
          'entity' => $step,
          'action' => $action
        )) as $permission) $this->Permissions->delete($permission->uuid);
      }
    }
    // EXCEPTION FOR SUBFORM
    $this->Permissions->create(array(
      'role' => $admin,
      'action' => 'create',
      'entity' => 'PesertaProject'
    ));
    $this->Permissions->create(array(
      'role' => $admin,
      'action' => 'delete',
      'entity' => 'PesertaProject'
    ));

    // DUMMY
    $this->load->model('Projects');
    foreach (array(
      'Revisi Lelang Peralatan Laboratorium PT Pertamina Lubricants Tahun 2020',
      'Pembangunan TBBM Sukabumi dan Jalur Pipanisasi Padalarang – Sukabumi',
      'Lelang Peralatan Laboratorium PT Pertamina Lubricants Tahun 2020',
      'Pengadaan Tabung BG 5.5 kg, Tabung BG 12 kg, Valve Tabung LPG 3 kg dan Valve Tabung 12 kg',
      'PEMBERITAHUAN TENDER TERBUKA BUILD, MIGRATE & OPERATE PERTAMINA SINERGI DATA CENTER (PSDC)',
      'PEKERJAAN PEMBANGUNAN WAREHOUSE TPS B3 PROYEK RDMP RU V – BALIKPAPAN',
      'PENGADAAN SOFTWARE PURCHASE, SOFTWARE ANNUAL UPDATE SUBSCRIPTION, PROFESSIONAL SERVICE & TRAINING PRODUK ARCGIS (ULANG II)',
      'TENDER TERBUKA ENGINEERING, PROCUREMENT AND CONSTRUCTION (EPC) DUMAI CALCINER PROJECT',
      'Jasa Perbaikan Lampu Penerangan Jalan Tenaga Surya Pada Perkantoran PT Pertamina (Persero)',
      'PENGADAAN ANNUAL TECHNICAL SUPPORT (ATS) LISENSI SAP TAHUN 2020',
      'AMANDEMEN TENDER TERBUKA - Pengadaan Kapal Baru Tahun 2020 dengan Ukuran 17.500 LTDW',
      'Jasa Konsultan Assessment Instalasi MEP dan HVAC Gedung Perkantoran Pertamina',
      'Penyediaan Paket Perdana Program Konversi Untuk Mesin Pompa Air Bagi Petani Sasaran Tahun Anggaran 2019 (Termasuk Pendistribusian dan Pemasangan)',
      'Penyediaan Paket Perdana Program Konversi Untuk Kapal Penangkap Ikan Bagi Nelayan Sasaran Tahun Anggaran 2019 (Termasuk Pendistribusian dan Pemasangan)',
      'PENGADAAN JASA KONSULTANSI POTENSI ANGIN UNTUK PEMBANGKIT LISTRIK TENAGA BAYU (PLTB)'
    ) as $project) {
      $this->Projects->create(array('nama' => $project));
    }
    // $this->load->model('Vendors');
    foreach (array(
      'PT ABM Investama Tbk',
      'PT Adira Dinamika Multi Finance Tbk',
      'PT Aneka Tambang (Persero) Tbk',
      'PT Astra International Tbk',
      'PT Bank Central Asia Tbk',
      'PT Bank CIMB Niaga Tbk',
      'PT Bank Danamon Tbk',
      'PT Bank International Indonesia Tbk',
      'PT Bank Mandiri (Persero) Tbk',
      'PT Bank Negara Indonesia Tbk',
      'PT Bank NISP Tbk',
      'PT Bank Rakyat Indonesia Tbk',
      'PT Bank Tabungan Negara Tbk',
      'PT BPD Jawa Barat dan Banten Tbk',
      'PT XL Axiata Tbk',
      'PT Garuda Indonesia (Persero )Tbk',
      'PT Indo Tambangraya Megah Tbk',
      'PT Indosat Tbk',
      'PT Jasa Marga (Persero) Tbk',
      'PT Perusahaan Gas Negara Tbk',
      'PT Semen Indonesia (Persero) Tbk',
      'PT Tambang Batubara Bukit Asam (Persero) Tbk',
      'PT Telekomunikasi Indonesia Tbk',
      'PT Waskita Karya (Persero) Tbk',
      'PT Wijaya Karya (Persero) Tbk.',
      'PT AKR Corporindo Tbk',
      'PT Bank Mega Tbk',
      'PT Bank Pan Indonesia Tbk',
      'PT Bank Permata Tbk',
      'PT Bank Tabungan Pensiunan Negara Tbk',
      'PT Bumi Resources Tbk',
      'PT Ciputra Development Tbk',
      'PT Golden Energy Mines Tbk',
      'PT Hero Supermarket Tbk',
      'PT Holcim Indonesia Tbk',
      'PT Indocement Tunggal Prakasa Tbk',
      'PT Indofood CBP Sukses Makmur Tbk',
      'PT Indofood Sukses Makmur Tbk',
      'PT Kalbe Farma Tbk',
      'PT Lippo Karawaci Tbk',
      'PT Pacific Utama Tbk',
      'PT Pakuwon Jati Tbk',
      'PT Sumber Alfaria Trijaya Tbk',
      'PT Surya Citra Media Tbk',
      'PT Tower Bersama Infrastructure Tbk',
      'PT Unilever Indonesia Tbk',
      'PT United Tractors Tbk, PT Vale Indonesia Tbk.'
    ) as $company) $this->Users->create(
      array(
        'vendor' => $company,
        'username' => rand(),
        'password' => md5('admin'),
        'role' => $vendor
      )
    );
  }

  function down()
  {
  }
}
