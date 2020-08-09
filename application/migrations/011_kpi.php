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
        `a1_target` TINYINT(1) NOT NULL,
        `a1_actual` TINYINT(1) NOT NULL,
        `a1_score_max` TINYINT(1) NOT NULL,
        `a1_score_actual` TINYINT(1) NOT NULL,
        `a2_target` TINYINT(1) NOT NULL,
        `a2_actual` TINYINT(1) NOT NULL,
        `a2_score_max` TINYINT(1) NOT NULL,
        `a2_score_actual` TINYINT(1) NOT NULL,
        `b1_target` TINYINT(1) NOT NULL,
        `b1_actual` TINYINT(1) NOT NULL,
        `b1_score_max` TINYINT(1) NOT NULL,
        `b1_score_actual` TINYINT(1) NOT NULL,
        `b2_target` TINYINT(1) NOT NULL,
        `b2_actual` TINYINT(1) NOT NULL,
        `b2_score_max` TINYINT(1) NOT NULL,
        `b2_score_actual` TINYINT(1) NOT NULL,
        `b3_target` TINYINT(1) NOT NULL,
        `b3_actual` TINYINT(1) NOT NULL,
        `b3_score_max` TINYINT(1) NOT NULL,
        `b3_score_actual` TINYINT(1) NOT NULL,
        `b4_target` TINYINT(1) NOT NULL,
        `b4_actual` TINYINT(1) NOT NULL,
        `b4_score_max` TINYINT(1) NOT NULL,
        `b4_score_actual` TINYINT(1) NOT NULL,
        `b5_target` TINYINT(1) NOT NULL,
        `b5_actual` TINYINT(1) NOT NULL,
        `b5_score_max` TINYINT(1) NOT NULL,
        `b5_score_actual` TINYINT(1) NOT NULL,
        `c1_target` TINYINT(1) NOT NULL,
        `c1_actual` TINYINT(1) NOT NULL,
        `c1_score_max` TINYINT(1) NOT NULL,
        `c1_score_actual` TINYINT(1) NOT NULL,
        `c2_target` TINYINT(1) NOT NULL,
        `c2_actual` TINYINT(1) NOT NULL,
        `c2_score_max` TINYINT(1) NOT NULL,
        `c2_score_actual` TINYINT(1) NOT NULL,
        `c3_target` TINYINT(1) NOT NULL,
        `c3_actual` TINYINT(1) NOT NULL,
        `c3_score_max` TINYINT(1) NOT NULL,
        `c3_score_actual` TINYINT(1) NOT NULL,
        `c4_target` TINYINT(1) NOT NULL,
        `c4_actual` TINYINT(1) NOT NULL,
        `c4_score_max` TINYINT(1) NOT NULL,
        `c4_score_actual` TINYINT(1) NOT NULL,
        `c5_target` TINYINT(1) NOT NULL,
        `c5_actual` TINYINT(1) NOT NULL,
        `c5_score_max` TINYINT(1) NOT NULL,
        `c5_score_actual` TINYINT(1) NOT NULL,
        `c6_target` TINYINT(1) NOT NULL,
        `c6_actual` TINYINT(1) NOT NULL,
        `c6_score_max` TINYINT(1) NOT NULL,
        `c6_score_actual` TINYINT(1) NOT NULL,
        `c7_target` TINYINT(1) NOT NULL,
        `c7_actual` TINYINT(1) NOT NULL,
        `c7_score_max` TINYINT(1) NOT NULL,
        `c7_score_actual` TINYINT(1) NOT NULL,
        `c8_target` TINYINT(1) NOT NULL,
        `c8_actual` TINYINT(1) NOT NULL,
        `c8_score_max` TINYINT(1) NOT NULL,
        `c8_score_actual` TINYINT(1) NOT NULL,
        `c9_target` TINYINT(1) NOT NULL,
        `c9_actual` TINYINT(1) NOT NULL,
        `c9_score_max` TINYINT(1) NOT NULL,
        `c9_score_actual` TINYINT(1) NOT NULL,
        `c10_target` TINYINT(1) NOT NULL,
        `c10_actual` TINYINT(1) NOT NULL,
        `c10_score_max` TINYINT(1) NOT NULL,
        `c10_score_actual` TINYINT(1) NOT NULL,
        `c11_target` TINYINT(1) NOT NULL,
        `c11_actual` TINYINT(1) NOT NULL,
        `c11_score_max` TINYINT(1) NOT NULL,
        `c11_score_actual` TINYINT(1) NOT NULL,
        `c12_target` TINYINT(1) NOT NULL,
        `c12_actual` TINYINT(1) NOT NULL,
        `c12_score_max` TINYINT(1) NOT NULL,
        `c12_score_actual` TINYINT(1) NOT NULL,
        PRIMARY KEY (`uuid`),
        KEY `project` (`project`)
      ) ROW_FORMAT=DYNAMIC ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `kpi`");
  }

}