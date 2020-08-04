<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_pesertaproject extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `pesertaproject` (
        `uuid` varchar(36) NOT NULL,
        `orders` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `project` varchar(36) NOT NULL,
        `vendor` varchar(36) NOT NULL,
        PRIMARY KEY (`uuid`),
        KEY `vendor` (`vendor`)
      ) ROW_FORMAT=DYNAMIC ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `pesertaproject`");
  }

}