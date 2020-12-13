<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_template extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `template` (
        `uuid` varchar(36) NOT NULL,
        `orders` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `nama` varchar(255) NOT NULL,
        `konten` TEXT NOT NULL,
        PRIMARY KEY (`uuid`)
      ) ROW_FORMAT=DYNAMIC ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->load->model('Templates');
    foreach (array ('HSE', 'PJA', 'WIP', 'KPI', 'FE') as $module)
    {
      $this->Templates->create(array('nama' => $module));
    }
  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `template`");
  }

}