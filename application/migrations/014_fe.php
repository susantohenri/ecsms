<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_fe extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `fe` (
        `uuid` varchar(36) NOT NULL,
        `orders` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `incident_1_jml_kasus` INT(11) NOT NULL,
        `incident_1_punishment` varchar(255) NOT NULL,
        `incident_2_jml_kasus` INT(11) NOT NULL,
        `incident_2_punishment` varchar(255) NOT NULL,
        `elemen_1_nilai_awal` FLOAT NOT NULL,
        `elemen_1_bobot` INT(11) NOT NULL,
        `elemen_1_nilai_akhir` FLOAT NOT NULL,
        `elemen_2_nilai_awal` FLOAT NOT NULL,
        `elemen_2_bobot` INT(11) NOT NULL,
        `elemen_2_nilai_akhir` FLOAT NOT NULL,
        `elemen_3_nilai_awal` FLOAT NOT NULL,
        `elemen_3_bobot` INT(11) NOT NULL,
        `elemen_3_nilai_akhir` FLOAT NOT NULL,
        `elemen_4_nilai_awal` FLOAT NOT NULL,
        `elemen_4_bobot` INT(11) NOT NULL,
        `elemen_4_nilai_akhir` FLOAT NOT NULL,
        `acceptedAt` datetime DEFAULT NULL,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `project` varchar(36) NOT NULL,
        `progress` INT(11) NOT NULL,
        PRIMARY KEY (`uuid`),
        KEY `project` (`project`)
      ) ROW_FORMAT=DYNAMIC ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `fe`");
  }

}