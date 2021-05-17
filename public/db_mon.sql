/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.11-MariaDB : Database - db_mon
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_mon` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_mon`;

/*Table structure for table `fe` */

DROP TABLE IF EXISTS `fe`;

CREATE TABLE `fe` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ticket_number` int(12) DEFAULT NULL,
  `tanggal_ticket` date DEFAULT NULL,
  `id_customer` int(10) DEFAULT NULL,
  `incident_desc` varchar(5) DEFAULT NULL,
  `machine_type` varchar(10) DEFAULT NULL,
  `sn` varchar(20) DEFAULT NULL,
  `id_office` int(10) DEFAULT NULL,
  `other` int(5) DEFAULT NULL,
  `incident_received` datetime DEFAULT NULL,
  `appointment` datetime DEFAULT NULL,
  `departure` datetime DEFAULT NULL,
  `arrival` datetime DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `finish` datetime DEFAULT NULL,
  `voltage` decimal(10,0) DEFAULT NULL,
  `grounding` decimal(10,0) DEFAULT NULL,
  `temperature` decimal(10,0) DEFAULT NULL,
  `ac` int(2) DEFAULT NULL COMMENT '1=ready, 2=not',
  `ups` int(2) DEFAULT NULL COMMENT '1=ready, 2=not',
  `lainnya` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `work_status` int(2) DEFAULT NULL COMMENT '1=completed, 2=pending',
  `nama_customer` text DEFAULT NULL,
  `nama_engineer` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fe` */

/*Table structure for table `fe_action_text` */

DROP TABLE IF EXISTS `fe_action_text`;

CREATE TABLE `fe_action_text` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_fe` int(10) DEFAULT NULL,
  `action_text` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fe_action_text` */

/*Table structure for table `fe_bad_sparepart` */

DROP TABLE IF EXISTS `fe_bad_sparepart`;

CREATE TABLE `fe_bad_sparepart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_fe` int(10) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `part_number` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fe_bad_sparepart` */

/*Table structure for table `fe_checklist` */

DROP TABLE IF EXISTS `fe_checklist`;

CREATE TABLE `fe_checklist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_fe` int(10) DEFAULT NULL,
  `id_pertanyaan_detail` int(10) DEFAULT NULL,
  `jawaban` int(2) DEFAULT 0 COMMENT '1 = ya, 0 = tidak',
  `keterangan` text DEFAULT NULL,
  `date_visit` date DEFAULT NULL,
  `time_visit` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fe_checklist` */

/*Table structure for table `fe_new_sparepart` */

DROP TABLE IF EXISTS `fe_new_sparepart`;

CREATE TABLE `fe_new_sparepart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_fe` int(10) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `part_number` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fe_new_sparepart` */

/*Table structure for table `fe_ttd` */

DROP TABLE IF EXISTS `fe_ttd`;

CREATE TABLE `fe_ttd` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_fe` int(10) DEFAULT NULL,
  `ttd_customer` text DEFAULT NULL,
  `ttd_engineer` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fe_ttd` */

/*Table structure for table `m_customer` */

DROP TABLE IF EXISTS `m_customer`;

CREATE TABLE `m_customer` (
  `id_customer` int(10) NOT NULL AUTO_INCREMENT,
  `customer` varchar(30) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `m_customer` */

/*Table structure for table `m_menu` */

DROP TABLE IF EXISTS `m_menu`;

CREATE TABLE `m_menu` (
  `m_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_menu_nama` varchar(255) DEFAULT NULL,
  `m_menu_url` text DEFAULT NULL,
  `m_menu_parent` int(11) DEFAULT NULL,
  `m_menu_level` int(11) DEFAULT NULL,
  `m_menu_icon` varchar(50) DEFAULT NULL,
  `m_menu_status` enum('0','1') DEFAULT NULL,
  `m_menu_position` int(25) DEFAULT NULL,
  `m_menu_created_date` datetime DEFAULT NULL,
  `m_menu_modified_date` datetime DEFAULT NULL,
  `m_menu_created_by` varchar(50) DEFAULT NULL,
  `m_menu_modified_by` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`m_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

/*Data for the table `m_menu` */

insert  into `m_menu`(`m_menu_id`,`m_menu_nama`,`m_menu_url`,`m_menu_parent`,`m_menu_level`,`m_menu_icon`,`m_menu_status`,`m_menu_position`,`m_menu_created_date`,`m_menu_modified_date`,`m_menu_created_by`,`m_menu_modified_by`,`icon`) values (1,'User Account','Akun',2,2,'akunpengguna.png','1',1,NULL,'2019-02-20 07:58:17',NULL,'admin','fa fa-gg'),(2,'Setting','#',0,1,'','1',1,NULL,'2019-02-20 07:58:50',NULL,'admin','fa fa-gg'),(3,'Menu Management','Menu',2,2,'menu.png','1',2,NULL,'2019-02-20 07:59:20',NULL,'admin','fa fa-gg'),(4,'Access Management','Aturan',2,2,'hakakses.png','1',3,NULL,'2019-02-20 07:59:42',NULL,'admin','fa fa-gg'),(5,'User Management','Pengguna',2,2,'pengguna.png','1',4,NULL,'2019-02-20 08:00:14',NULL,'admin','fa fa-gg');

/*Table structure for table `m_office` */

DROP TABLE IF EXISTS `m_office`;

CREATE TABLE `m_office` (
  `id_office` int(10) NOT NULL AUTO_INCREMENT,
  `office` text DEFAULT NULL,
  PRIMARY KEY (`id_office`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `m_office` */

/*Table structure for table `m_otoritas_menu` */

DROP TABLE IF EXISTS `m_otoritas_menu`;

CREATE TABLE `m_otoritas_menu` (
  `m_role_id` int(11) DEFAULT NULL,
  `m_menu_id` int(11) DEFAULT NULL,
  `m_role_view` enum('0','1') DEFAULT '0',
  `m_role_add` enum('0','1') DEFAULT '0',
  `m_role_edit` enum('0','1') DEFAULT '0',
  `m_role_delete` enum('0','1') DEFAULT '0',
  `m_role_export` enum('0','1') DEFAULT '0',
  `m_role_import` enum('0','1') DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `m_role_id` (`m_role_id`) USING BTREE,
  KEY `m_menu_id` (`m_menu_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=735 DEFAULT CHARSET=utf8;

/*Data for the table `m_otoritas_menu` */

insert  into `m_otoritas_menu`(`m_role_id`,`m_menu_id`,`m_role_view`,`m_role_add`,`m_role_edit`,`m_role_delete`,`m_role_export`,`m_role_import`,`id`) values (1,1,'1','1','1','1','1','1',1),(1,2,'1','1','1','1','1','1',2),(1,3,'1','1','1','1','1','1',3),(1,4,'1','1','1','1','1','1',4),(1,5,'1','1','1','1','1','1',5);

/*Table structure for table `m_pertanyaan_detail` */

DROP TABLE IF EXISTS `m_pertanyaan_detail`;

CREATE TABLE `m_pertanyaan_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pertanyaan` int(10) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `m_pertanyaan_detail` */

/*Table structure for table `m_pertanyaan_header` */

DROP TABLE IF EXISTS `m_pertanyaan_header`;

CREATE TABLE `m_pertanyaan_header` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `desc` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `m_pertanyaan_header` */

/*Table structure for table `m_role` */

DROP TABLE IF EXISTS `m_role`;

CREATE TABLE `m_role` (
  `m_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_role_nama` varchar(50) DEFAULT NULL,
  `m_role_ket` text DEFAULT NULL,
  PRIMARY KEY (`m_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

/*Data for the table `m_role` */

insert  into `m_role`(`m_role_id`,`m_role_nama`,`m_role_ket`) values (1,'Administrator','Super Admin');

/*Table structure for table `m_user` */

DROP TABLE IF EXISTS `m_user`;

CREATE TABLE `m_user` (
  `m_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_user_nama` varchar(50) DEFAULT NULL,
  `m_user_username` varchar(50) DEFAULT NULL,
  `m_user_password` varchar(32) DEFAULT NULL,
  `m_user_email` varchar(255) DEFAULT NULL,
  `m_user_tlp` varchar(15) DEFAULT NULL,
  `m_user_status` enum('1','0') DEFAULT NULL,
  `m_user_created_date` datetime DEFAULT NULL,
  `m_user_modified_date` datetime DEFAULT NULL,
  `m_user_created_by` varchar(50) DEFAULT NULL,
  `m_user_modified_by` varchar(50) DEFAULT NULL,
  `m_role_id` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`m_user_id`),
  KEY `m_role_id` (`m_role_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=762 DEFAULT CHARSET=utf8;

/*Data for the table `m_user` */

insert  into `m_user`(`m_user_id`,`m_user_nama`,`m_user_username`,`m_user_password`,`m_user_email`,`m_user_tlp`,`m_user_status`,`m_user_created_date`,`m_user_modified_date`,`m_user_created_by`,`m_user_modified_by`,`m_role_id`,`foto`) values (1,'Vredy Wijaya','admin','e10adc3949ba59abbe56e057f20f883e','vredy.wijaya@abacusts.co.id','081807405712','1','2015-05-07 00:00:00','2019-02-18 00:00:00','Administrator','Administrator',1,'profil1.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
