<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_kpi extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `kpi` (
        `uuid` varchar(36) NOT NULL,
        `orders` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `project` varchar(36) NOT NULL,
        `progress` INT(11) NOT NULL,
        `lock` TINYINT(1) NOT NULL,
        `a1` varchar(255) NOT NULL,
        `a1_score` TINYINT(1) NOT NULL,
        `a2` varchar(255) NOT NULL,
        `a2_score` TINYINT(1) NOT NULL,
        `b1` varchar(255) NOT NULL,
        `b1_score` TINYINT(1) NOT NULL,
        `b2` varchar(255) NOT NULL,
        `b2_score` TINYINT(1) NOT NULL,
        `b3` varchar(255) NOT NULL,
        `b3_score` TINYINT(1) NOT NULL,
        `b4` varchar(255) NOT NULL,
        `b4_score` TINYINT(1) NOT NULL,
        `b5` varchar(255) NOT NULL,
        `b5_score` TINYINT(1) NOT NULL,
        `c1` varchar(255) NOT NULL,
        `c1_score` TINYINT(1) NOT NULL,
        `c2` varchar(255) NOT NULL,
        `c2_score` TINYINT(1) NOT NULL,
        `c3` varchar(255) NOT NULL,
        `c3_score` TINYINT(1) NOT NULL,
        `c4` varchar(255) NOT NULL,
        `c4_score` TINYINT(1) NOT NULL,
        `c5` varchar(255) NOT NULL,
        `c5_score` TINYINT(1) NOT NULL,
        `c6` varchar(255) NOT NULL,
        `c6_score` TINYINT(1) NOT NULL,
        `c7` varchar(255) NOT NULL,
        `c7_score` TINYINT(1) NOT NULL,
        `c8` varchar(255) NOT NULL,
        `c8_score` TINYINT(1) NOT NULL,
        `c9` varchar(255) NOT NULL,
        `c9_score` TINYINT(1) NOT NULL,
        `c10` varchar(255) NOT NULL,
        `c10_score` TINYINT(1) NOT NULL,
        `c11` varchar(255) NOT NULL,
        `c11_score` TINYINT(1) NOT NULL,
        `c12` varchar(255) NOT NULL,
        `c12_score` TINYINT(1) NOT NULL,
        PRIMARY KEY (`uuid`),
        KEY `project` (`project`)
      ) ROW_FORMAT=DYNAMIC ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `kpi`");
  }

}