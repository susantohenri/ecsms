<?php defined('BASEPATH') or exit('No direct script access allowed');

class PenerimaEmails extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = 'penerimaemail';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'email', 'sTitle' => 'Email'),

    );
    $this->form = array(
      array(
        'name' => 'email',
        'width' => 2,
        'label' => 'Email',
      ),
    );
    $this->childs = array();
  }

  function dt()
  {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.orders")
      ->select('penerimaemail.email');
    return parent::dt();
  }
}
