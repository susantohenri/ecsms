<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_hse extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `hse` (
        `uuid` varchar(36) NOT NULL,
        `orders` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `project` varchar(36) NOT NULL,
        `vendor` varchar(36) NOT NULL,
        `progress` INT(11) NOT NULL,
        `kunci_data_vendor` TINYINT(1) NOT NULL,
        `1a` varchar(255) NOT NULL,
        `1a_score` TINYINT(1) NOT NULL,
        `1b` varchar(255) NOT NULL,
        `1b_score` TINYINT(1) NOT NULL,
        `1c` varchar(255) NOT NULL,
        `1c_score` TINYINT(1) NOT NULL,
        `2a` varchar(255) NOT NULL,
        `2a_score` TINYINT(1) NOT NULL,
        `2b` varchar(255) NOT NULL,
        `2b_score` TINYINT(1) NOT NULL,
        `2c` varchar(255) NOT NULL,
        `2c_score` TINYINT(1) NOT NULL,
        `2d` varchar(255) NOT NULL,
        `2d_score` TINYINT(1) NOT NULL,
        `3a` varchar(255) NOT NULL,
        `3a_score` TINYINT(1) NOT NULL,
        `3b` varchar(255) NOT NULL,
        `3b_score` TINYINT(1) NOT NULL,
        `4a` varchar(255) NOT NULL,
        `4a_score` TINYINT(1) NOT NULL,
        `4b` varchar(255) NOT NULL,
        `4b_score` TINYINT(1) NOT NULL,
        `4c` varchar(255) NOT NULL,
        `4c_score` TINYINT(1) NOT NULL,
        `4d` varchar(255) NOT NULL,
        `4d_score` TINYINT(1) NOT NULL,
        `5a` varchar(255) NOT NULL,
        `5a_score` TINYINT(1) NOT NULL,
        `5b` varchar(255) NOT NULL,
        `5b_score` TINYINT(1) NOT NULL,
        `5c` varchar(255) NOT NULL,
        `5c_score` TINYINT(1) NOT NULL,
        `5d` varchar(255) NOT NULL,
        `5d_score` TINYINT(1) NOT NULL,
        `6a` varchar(255) NOT NULL,
        `6a_score` TINYINT(1) NOT NULL,
        `6b` varchar(255) NOT NULL,
        `6b_score` TINYINT(1) NOT NULL,
        `6c` varchar(255) NOT NULL,
        `6c_score` TINYINT(1) NOT NULL,
        `6d` varchar(255) NOT NULL,
        `6d_score` TINYINT(1) NOT NULL,
        `6e` varchar(255) NOT NULL,
        `6e_score` TINYINT(1) NOT NULL,
        `6f` varchar(255) NOT NULL,
        `6f_score` TINYINT(1) NOT NULL,
        `6g` varchar(255) NOT NULL,
        `6g_score` TINYINT(1) NOT NULL,
        `6h` varchar(255) NOT NULL,
        `6h_score` TINYINT(1) NOT NULL,
        `6i` varchar(255) NOT NULL,
        `6i_score` TINYINT(1) NOT NULL,
        `6j` varchar(255) NOT NULL,
        `6j_score` TINYINT(1) NOT NULL,
        `7a` varchar(255) NOT NULL,
        `7a_score` TINYINT(1) NOT NULL,
        `7b` varchar(255) NOT NULL,
        `7b_score` TINYINT(1) NOT NULL,
        `7c` varchar(255) NOT NULL,
        `7c_score` TINYINT(1) NOT NULL,
        `7d` varchar(255) NOT NULL,
        `7d_score` TINYINT(1) NOT NULL,
        `8a` varchar(255) NOT NULL,
        `8a_score` TINYINT(1) NOT NULL,
        `8b` varchar(255) NOT NULL,
        `8b_score` TINYINT(1) NOT NULL,
        `8c` varchar(255) NOT NULL,
        `8c_score` TINYINT(1) NOT NULL,
        `8d` varchar(255) NOT NULL,
        `8d_score` TINYINT(1) NOT NULL,
        `8e` varchar(255) NOT NULL,
        `8e_score` TINYINT(1) NOT NULL,
        `9a` varchar(255) NOT NULL,
        `9a_score` TINYINT(1) NOT NULL,
        `9b` varchar(255) NOT NULL,
        `9b_score` TINYINT(1) NOT NULL,
        `9c` varchar(255) NOT NULL,
        `9c_score` TINYINT(1) NOT NULL,
        `9d` varchar(255) NOT NULL,
        `9d_score` TINYINT(1) NOT NULL,
        `10a` varchar(255) NOT NULL,
        `10a_score` TINYINT(1) NOT NULL,
        `10b` varchar(255) NOT NULL,
        `10b_score` TINYINT(1) NOT NULL,
        `10c` varchar(255) NOT NULL,
        `10c_score` TINYINT(1) NOT NULL,
        `10d` varchar(255) NOT NULL,
        `10d_score` TINYINT(1) NOT NULL,
        `11a` varchar(255) NOT NULL,
        `11a_score` TINYINT(1) NOT NULL,
        `11b` varchar(255) NOT NULL,
        `11b_score` TINYINT(1) NOT NULL,
        `11c` varchar(255) NOT NULL,
        `11c_score` TINYINT(1) NOT NULL,
        `11d` varchar(255) NOT NULL,
        `11d_score` TINYINT(1) NOT NULL,
        `12a` varchar(255) NOT NULL,
        `12a_score` TINYINT(1) NOT NULL,
        `12b` varchar(255) NOT NULL,
        `12b_score` TINYINT(1) NOT NULL,
        `12c` varchar(255) NOT NULL,
        `12c_score` TINYINT(1) NOT NULL,
        `12d` varchar(255) NOT NULL,
        `12d_score` TINYINT(1) NOT NULL,
        `13a` varchar(255) NOT NULL,
        `13a_score` TINYINT(1) NOT NULL,
        `13b` varchar(255) NOT NULL,
        `13b_score` TINYINT(1) NOT NULL,
        `14a` varchar(255) NOT NULL,
        `14a_score` TINYINT(1) NOT NULL,
        `14b` varchar(255) NOT NULL,
        `14b_score` TINYINT(1) NOT NULL,
        `14c` varchar(255) NOT NULL,
        `14c_score` TINYINT(1) NOT NULL,
        `15a` varchar(255) NOT NULL,
        `15a_score` TINYINT(1) NOT NULL,
        `15b` varchar(255) NOT NULL,
        `15b_score` TINYINT(1) NOT NULL,
        `15c` varchar(255) NOT NULL,
        `15c_score` TINYINT(1) NOT NULL,
        PRIMARY KEY (`uuid`),
        KEY `project` (`project`),
        KEY `vendor` (`vendor`)
      ) ROW_FORMAT=DYNAMIC ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `hse`");
  }

}