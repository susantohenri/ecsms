<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_laporanbulanan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `laporanbulanan` (
        `uuid` varchar(36) NOT NULL,
        `orders` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `project` varchar(36) NOT NULL,
        `bulan` TINYINT(1) NOT NULL,
        `progress` INT(11) NOT NULL,
        `lock` TINYINT(1) NOT NULL,
        `a1` varchar(255) NOT NULL,
        `a2` varchar(255) NOT NULL,
        `b1` varchar(255) NOT NULL,
        `b2` varchar(255) NOT NULL,
        `b3` varchar(255) NOT NULL,
        `b4` varchar(255) NOT NULL,
        `b5` varchar(255) NOT NULL,
        `c1` varchar(255) NOT NULL,
        `c2` varchar(255) NOT NULL,
        `c3` varchar(255) NOT NULL,
        `c4` varchar(255) NOT NULL,
        `c5` varchar(255) NOT NULL,
        `c6` varchar(255) NOT NULL,
        `c7` varchar(255) NOT NULL,
        `c8` varchar(255) NOT NULL,
        `c9` varchar(255) NOT NULL,
        `c10` varchar(255) NOT NULL,
        `c11` varchar(255) NOT NULL,
        `c12` varchar(255) NOT NULL,
        PRIMARY KEY (`uuid`),
        KEY `project` (`project`)
      ) ROW_FORMAT=DYNAMIC ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `laporanbulanan`");
  }

}