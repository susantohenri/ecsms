<?php defined('BASEPATH') or exit('No direct script access allowed');

class Vendors extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = 'user';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'vendor', 'sTitle' => 'Nama')
    );
    $this->form  = array();

    $this->form[] = array(
      'name' => 'vendor',
      'label' => 'Vendor'
    );

    $this->form[] = array(
      'name' => 'username',
      'label' => 'Username'
    );

    $this->form[] = array(
      'name' => 'role',
      'type' => 'hidden',
    );

    $this->form[] = array(
      'type' => 'password',
      'name' => 'password',
      'label' => 'Password'
    );

    $this->form[] = array(
      'type' => 'password',
      'name' => 'confirm_password',
      'label' => 'Confirm Password'
    );
  }

  function delete($uuid)
  {
    $user = $this->findOne($uuid);
    if ('Vendor' !== $user['username']) return parent::delete($uuid);
  }

  function save($data)
  {
    $this->load->model('Roles');
    $Vendor = $this->Roles->findOne(array('name' => 'Vendor'));
    $data['role'] = $Vendor['uuid'];

    if (strlen($data['password']) > 0) {
      if ($data['password'] !== $data['confirm_password']) return array('error' => array('message' => 'Password tidak sesuai'));
      else $data['password'] = md5($data['password']);
    } else unset($data['password']);
    unset($data['confirm_password']);
    return parent::save($data);
  }

  function findOne($param)
  {
    if (!is_array($param)) $param = array("{$this->table}.uuid" => $param);
    $this->db
      ->join('role', 'role.uuid = user.role', 'left')
      ->where('role.name', 'Vendor');
    $record = parent::findOne($param);
    $record['confirm_password'] = '';
    return $record;
  }

  function dt()
  {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.orders")
      ->select("{$this->table}.vendor")
      ->join('role', 'role.uuid = user.role', 'left')
      ->where('role.name', 'Vendor');
    return parent::dt();
  }
}
