<?php defined('BASEPATH') or exit('No direct script access allowed');

class PesertaProyeks extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = 'pesertaproyek';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'vendor', 'sTitle' => 'Vendor'),

    );
    $this->form = array(
      array(
        'name' => 'vendor',
        'label' => 'Vendor',
        'options' => array(),
        'width' => 2,
        'attributes' => array(
          array('data-autocomplete' => 'true'),
          array('data-model' => 'Vendors'),
          array('data-field' => 'vendor')
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
      ->select('pesertaproyek.vendor');
    return parent::dt();
  }
}
