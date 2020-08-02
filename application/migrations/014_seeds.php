<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_seeds extends CI_Migration
{

  function up()
  {

    $menu_icon = array(
      'Admin' => 'user-secret',
      'HSSE' => 'user',
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
  }

  function down()
  {
  }
}
