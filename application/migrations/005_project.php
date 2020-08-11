<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_project extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `project` (
        `uuid` varchar(36) NOT NULL,
        `orders` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `nama` varchar(255) NOT NULL,
        `lokasi` varchar(255) NOT NULL,
        `jangka_waktu` INT(11) NOT NULL,
        `jumlah_laporan_bulanan` INT(11) NOT NULL,
        `pemenang` varchar(36) NOT NULL,
        `progress` TINYINT(1) NOT NULL,
        PRIMARY KEY (`uuid`),
        KEY `peserta` (`pemenang`)
      ) ROW_FORMAT=DYNAMIC ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `project`");
  }

}