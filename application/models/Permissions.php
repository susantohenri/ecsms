<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'permission';
    $this->thead = array();
    $this->form = array(
      array (
        'name' => 'entity',
        'label'=> 'Entity',
        'options' => array(
          array ('text' => 'User', 'value' => 'User'),
          array ('text' => 'Role', 'value' => 'Role'),
          array ('text' => 'Permission', 'value' => 'Permission'),
          array ('text' => 'Proyek', 'value' => 'Proyek'),
          array ('text' => 'PesertaProyek', 'value' => 'PesertaProyek'),
          array ('text' => 'HSE', 'value' => 'HSE'),
          array ('text' => 'PJA', 'value' => 'PJA'),
          array ('text' => 'WIP', 'value' => 'WIP'),
          array ('text' => 'LaporanBulanan', 'value' => 'LaporanBulanan'),
          array ('text' => 'KPI', 'value' => 'KPI'),
          array ('text' => 'PenerimaEmail', 'value' => 'PenerimaEmail'),
          array ('text' => 'TemplateEmail', 'value' => 'TemplateEmail'),
          array ('text' => 'Proyek', 'value' => 'Proyek'),
          array ('text' => 'PesertaProyek', 'value' => 'PesertaProyek'),
          array ('text' => 'HSE', 'value' => 'HSE'),
          array ('text' => 'PJA', 'value' => 'PJA'),
          array ('text' => 'WIP', 'value' => 'WIP'),
          array ('text' => 'LaporanBulanan', 'value' => 'LaporanBulanan'),
          array ('text' => 'KPI', 'value' => 'KPI'),
          array ('text' => 'PenerimaEmail', 'value' => 'PenerimaEmail'),
          array ('text' => 'TemplateEmail', 'value' => 'TemplateEmail'),
          /*additionalEntity*/
        ),
        'width' => 4
      ),
      array (
        'name' => 'action',
        'label'=> 'Action',
        'options' => array(
          array ('text' => 'List', 'value' => 'index'),
          array ('text' => 'Create', 'value' => 'create'),
          array ('text' => 'Detail', 'value' => 'read'),
          array ('text' => 'Update', 'value' => 'update'),
          array ('text' => 'Delete', 'value' => 'delete')
        ),
        'width' => 4
      ),
    );
  }

  function getPermissions () {
    $permission = array();
    foreach ($this->find(array('role' => $this->session->userdata('role'))) as $perm) $permission[] = "{$perm->action}_{$perm->entity}";
    return $permission;
  }

  function getPermittedMenus () {

  }
}