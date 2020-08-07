<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_hse extends CI_Migration
{

  function up()
  {

    $this->db->query("
      CREATE TABLE `hse` (
        `uuid` varchar(36) NOT NULL,
        `orders` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `project` varchar(36) NOT NULL,
        `vendor` varchar(36) NOT NULL,
        `progress` INT(11) NOT NULL,
        `lock` TINYINT(1) NOT NULL,
        `1a` TINYINT(1) NOT NULL,
        `1b` TINYINT(1) NOT NULL,
        `1c` TINYINT(1) NOT NULL,
        `2a` TINYINT(1) NOT NULL,
        `2b` TINYINT(1) NOT NULL,
        `2c` TINYINT(1) NOT NULL,
        `2d` TINYINT(1) NOT NULL,
        `3a` TINYINT(1) NOT NULL,
        `3b` TINYINT(1) NOT NULL,
        `4a` TINYINT(1) NOT NULL,
        `4b` TINYINT(1) NOT NULL,
        `4c` TINYINT(1) NOT NULL,
        `4d` TINYINT(1) NOT NULL,
        `5a` TINYINT(1) NOT NULL,
        `5b` TINYINT(1) NOT NULL,
        `5c` TINYINT(1) NOT NULL,
        `5d` TINYINT(1) NOT NULL,
        `6a` TINYINT(1) NOT NULL,
        `6b` TINYINT(1) NOT NULL,
        `6c` TINYINT(1) NOT NULL,
        `6d` TINYINT(1) NOT NULL,
        `6e` TINYINT(1) NOT NULL,
        `6f` TINYINT(1) NOT NULL,
        `6g` TINYINT(1) NOT NULL,
        `6h` TINYINT(1) NOT NULL,
        `6i` TINYINT(1) NOT NULL,
        `6j` TINYINT(1) NOT NULL,
        `7a` TINYINT(1) NOT NULL,
        `7b` TINYINT(1) NOT NULL,
        `7c` TINYINT(1) NOT NULL,
        `7d` TINYINT(1) NOT NULL,
        `8a` TINYINT(1) NOT NULL,
        `8b` TINYINT(1) NOT NULL,
        `8c` TINYINT(1) NOT NULL,
        `8d` TINYINT(1) NOT NULL,
        `8e` TINYINT(1) NOT NULL,
        `9a` TINYINT(1) NOT NULL,
        `9b` TINYINT(1) NOT NULL,
        `9c` TINYINT(1) NOT NULL,
        `9d` TINYINT(1) NOT NULL,
        `10a` TINYINT(1) NOT NULL,
        `10b` TINYINT(1) NOT NULL,
        `10c` TINYINT(1) NOT NULL,
        `10d` TINYINT(1) NOT NULL,
        `11a` TINYINT(1) NOT NULL,
        `11b` TINYINT(1) NOT NULL,
        `11c` TINYINT(1) NOT NULL,
        `11d` TINYINT(1) NOT NULL,
        `12a` TINYINT(1) NOT NULL,
        `12b` TINYINT(1) NOT NULL,
        `12c` TINYINT(1) NOT NULL,
        `12d` TINYINT(1) NOT NULL,
        `13a` TINYINT(1) NOT NULL,
        `13b` TINYINT(1) NOT NULL,
        `14a` TINYINT(1) NOT NULL,
        `14b` TINYINT(1) NOT NULL,
        `14c` TINYINT(1) NOT NULL,
        `15a` TINYINT(1) NOT NULL,
        `15b` TINYINT(1) NOT NULL,
        `15c` TINYINT(1) NOT NULL,
        PRIMARY KEY (`uuid`),
        KEY `project` (`project`),
        KEY `vendor` (`vendor`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");
  }

  function down()
  {
    $this->db->query("DROP TABLE IF EXISTS `hse`");
  }
}
