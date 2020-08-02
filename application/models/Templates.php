<?php defined('BASEPATH') or exit('No direct script access allowed');

class Templates extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = 'template';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Nama'),

    );
    $this->form = array(
      array(
        'name' => 'nama',
        'width' => 2,
        'label' => 'Nama',
      ),
      array(
        'name' => 'konten',
        'width' => 2,
        'label' => 'Konten',
        'type' => 'textarea',
        'attributes' => array(
          array('rows' => 15)
        )
      ),
    );
    $this->childs = array();
  }

  function dt()
  {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.orders")
      ->select('template.nama');
    return parent::dt();
  }
}
