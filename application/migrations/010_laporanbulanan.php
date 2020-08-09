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
        `progress` TINYINT(1) NOT NULL,
        `lock` TINYINT(1) NOT NULL,
        `a1` INT(11) NOT NULL,
        `a2` INT(11) NOT NULL,
        `b1` INT(11) NOT NULL,
        `b2` INT(11) NOT NULL,
        `b3` INT(11) NOT NULL,
        `b4` INT(11) NOT NULL,
        `b5` INT(11) NOT NULL,
        `c1` INT(11) NOT NULL,
        `c2` INT(11) NOT NULL,
        `c3` INT(11) NOT NULL,
        `c4` INT(11) NOT NULL,
        `c5` INT(11) NOT NULL,
        `c6` INT(11) NOT NULL,
        `c7` INT(11) NOT NULL,
        `c8` INT(11) NOT NULL,
        `c9` INT(11) NOT NULL,
        `c10` INT(11) NOT NULL,
        `c11` INT(11) NOT NULL,
        `c12` INT(11) NOT NULL,
        PRIMARY KEY (`uuid`),
        KEY `project` (`project`)
      ) ROW_FORMAT=DYNAMIC ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `laporanbulanan`");
  }

}