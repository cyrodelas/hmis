/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.27-MariaDB : Database - hmis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hmis` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `hmis`;

/*Table structure for table `admin_menu_main` */

DROP TABLE IF EXISTS `admin_menu_main`;

CREATE TABLE `admin_menu_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `module_description` text DEFAULT NULL,
  `pri` int(11) DEFAULT NULL,
  `font_icon` varchar(225) DEFAULT NULL,
  `url_link` varchar(225) DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `admin_menu_main` */

insert  into `admin_menu_main`(`id`,`title`,`module_description`,`pri`,`font_icon`,`url_link`,`act`) values (1,'Patient Information',NULL,1,NULL,NULL,1),(2,'Patient Medical History',NULL,1,NULL,NULL,1),(3,'Patient Consultation',NULL,1,NULL,NULL,1);

/*Table structure for table `admin_menu_sub` */

DROP TABLE IF EXISTS `admin_menu_sub`;

CREATE TABLE `admin_menu_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `module_description` text DEFAULT NULL,
  `pri` int(11) DEFAULT NULL,
  `font_icon` varchar(225) DEFAULT NULL,
  `url_link` varchar(225) DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  `main_menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `admin_menu_sub` */

/*Table structure for table `sv_brand` */

DROP TABLE IF EXISTS `sv_brand`;

CREATE TABLE `sv_brand` (
  `idNo` int(11) NOT NULL,
  `bName` varchar(255) DEFAULT NULL,
  `bDesc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sv_brand` */

/*Table structure for table `sv_consultationt` */

DROP TABLE IF EXISTS `sv_consultationt`;

CREATE TABLE `sv_consultationt` (
  `idNo` int(11) NOT NULL AUTO_INCREMENT,
  `cName` varchar(255) DEFAULT NULL,
  `cDesc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idNo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sv_consultationt` */

insert  into `sv_consultationt`(`idNo`,`cName`,`cDesc`) values (1,'General Consultation',''),(2,'Pre - Natal Consultation',''),(3,'Child Care Consultation','');

/*Table structure for table `sv_examination` */

DROP TABLE IF EXISTS `sv_examination`;

CREATE TABLE `sv_examination` (
  `idNo` int(11) NOT NULL AUTO_INCREMENT,
  `eName` varchar(255) DEFAULT NULL,
  `eDesc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idNo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sv_examination` */

insert  into `sv_examination`(`idNo`,`eName`,`eDesc`) values (1,'Urinalysis','a test of your urine');

/*Table structure for table `sv_generic` */

DROP TABLE IF EXISTS `sv_generic`;

CREATE TABLE `sv_generic` (
  `idNo` int(11) NOT NULL,
  `gName` varchar(255) DEFAULT NULL,
  `gDesc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sv_generic` */

/*Table structure for table `sv_naturev` */

DROP TABLE IF EXISTS `sv_naturev`;

CREATE TABLE `sv_naturev` (
  `idNo` int(11) NOT NULL AUTO_INCREMENT,
  `nName` varchar(255) DEFAULT NULL,
  `nDesc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idNo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sv_naturev` */

insert  into `sv_naturev`(`idNo`,`nName`,`nDesc`) values (1,'Walk-in',''),(2,'Follow-up Check Up','');

/*Table structure for table `sv_physician` */

DROP TABLE IF EXISTS `sv_physician`;

CREATE TABLE `sv_physician` (
  `idNo` int(11) NOT NULL AUTO_INCREMENT,
  `pName` varchar(255) DEFAULT NULL,
  `pDesc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idNo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sv_physician` */

insert  into `sv_physician`(`idNo`,`pName`,`pDesc`) values (1,'Family Physician','Family practice physicians are primary care providers who see patients of all ages and provide basic care for a variety of common ailments'),(2,'Pediatrician',''),(3,'Cardiologist','');

/*Table structure for table `sv_results` */

DROP TABLE IF EXISTS `sv_results`;

CREATE TABLE `sv_results` (
  `idNo` int(11) NOT NULL,
  `rName` varchar(255) DEFAULT NULL,
  `rDesc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sv_results` */

/*Table structure for table `sv_speciality` */

DROP TABLE IF EXISTS `sv_speciality`;

CREATE TABLE `sv_speciality` (
  `idNo` int(11) NOT NULL,
  `pCat` int(11) DEFAULT NULL,
  `sName` varchar(255) DEFAULT NULL,
  `sDesc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sv_speciality` */

/*Table structure for table `sv_symptoms` */

DROP TABLE IF EXISTS `sv_symptoms`;

CREATE TABLE `sv_symptoms` (
  `idNo` int(11) NOT NULL AUTO_INCREMENT,
  `sName` varchar(255) DEFAULT NULL,
  `sDesc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idNo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sv_symptoms` */

insert  into `sv_symptoms`(`idNo`,`sName`,`sDesc`) values (1,'Cough','expel air from the lungs with a sudden sharp sound.'),(2,'Runny Nose','mucus dripping or running out of your nose');

/*Table structure for table `sv_uom` */

DROP TABLE IF EXISTS `sv_uom`;

CREATE TABLE `sv_uom` (
  `idNo` int(11) DEFAULT NULL,
  `uName` varchar(255) DEFAULT NULL,
  `uDesc` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sv_uom` */

/*Table structure for table `user_info` */

DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_empid` varchar(255) DEFAULT NULL,
  `user_fn` varchar(255) DEFAULT NULL,
  `user_ln` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `user_dept` int(11) DEFAULT NULL,
  `user_designation` int(11) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_contact` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_sa` varchar(255) DEFAULT NULL,
  `user_sq` varchar(255) DEFAULT NULL,
  `act` int(11) DEFAULT 1,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `user_info` */

insert  into `user_info`(`user_id`,`user_empid`,`user_fn`,`user_ln`,`user_role`,`user_dept`,`user_designation`,`user_email`,`user_contact`,`user_image`,`user_name`,`user_pass`,`user_sa`,`user_sq`,`act`) values (1,'07042022001','Alma','De Fiesta','Patient',NULL,NULL,'agdefiesta@cvsu.edu.ph',NULL,'user.png','hmispatient','827ccb0eea8a706c4c34a16891f84e7b',NULL,NULL,1),(2,'07042022002','Alma','De Fiesta','Health Worker',NULL,NULL,'agdefiesta@cvsu.edu.ph',NULL,'user.png','hmishw','827ccb0eea8a706c4c34a16891f84e7b',NULL,NULL,1),(2,'07042022003','Alma','De Fiesta','Administrator',NULL,NULL,'agdefiesta@cvsu.edu.ph',NULL,'user.png','hmisadmin','827ccb0eea8a706c4c34a16891f84e7b',NULL,NULL,1);

/*Table structure for table `user_role_information` */

DROP TABLE IF EXISTS `user_role_information`;

CREATE TABLE `user_role_information` (
  `controlID` int(11) NOT NULL AUTO_INCREMENT,
  `userRole` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`controlID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `user_role_information` */

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `user_roles` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
