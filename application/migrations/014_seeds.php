<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_seeds extends CI_Migration
{

  function up()
  {
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
        'icon' => $fas[rand(0, count($fas) - 1)]
      ));
    }

    foreach (array('User', 'Role', 'Permission', 'Menu', 'Proyek', 'PesertaProyek', 'HSE', 'PJA', 'WIP', 'LaporanBulanan', 'KPI', 'PenerimaEmail', 'TemplateEmail'/*additionalEntity*/) as $entity) {
      foreach (array('index', 'create', 'read', 'update', 'delete') as $action) {
        $this->Permissions->create(array(
          'role' => $admin,
          'action' => $action,
          'entity' => $entity
        ));
      }
      if (!in_array($entity, array('Menu', 'Permission', 'Role', 'User'))) $this->Menus->create(array(
        'role' => $admin,
        'name' => $entity,
        'url' => $entity,
        'icon' => $fas[rand(0, count($fas) - 1)]
      ));
    }

    $this->Users->create(array(
      'username' => 'admin',
      'password' => md5('admin'),
      'role' => $admin
    ));
  }

  function down()
  {
  }
}
