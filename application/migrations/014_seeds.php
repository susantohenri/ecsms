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
    foreach (array('Admin', 'HSSE', 'MPE', 'Vendor') as $role) {
      $roledb = $this->Roles->create(array('name' => $role));
      if ('Admin' === $role) $admin = $roledb;
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

    // NO ONE PERMITTED TO CREATE OR DELETE STEPS
    foreach (array('PesertaProject', 'HSE', 'PJA', 'WIP', 'LaporanBulanan', 'KPI') as $step) {
      foreach (array('create', 'delete') as $action) {
        foreach ($this->Permissions->find(array(
          'entity' => $step,
          'action' => $action
        )) as $permission) $this->Permissions->delete($permission->uuid);
      }
    }

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
  }

  function down()
  {
  }
}
