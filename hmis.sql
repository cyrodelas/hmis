/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.26-MariaDB : Database - hmis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hmis` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hmis`;

/*Table structure for table `admin_menu_main` */

DROP TABLE IF EXISTS `admin_menu_main`;

CREATE TABLE `admin_menu_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `module_description` text,
  `pri` int(11) DEFAULT NULL,
  `font_icon` varchar(225) DEFAULT NULL,
  `url_link` varchar(225) DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `admin_menu_main` */

insert  into `admin_menu_main`(`id`,`title`,`module_description`,`pri`,`font_icon`,`url_link`,`act`) values (1,'Patient Information',NULL,1,NULL,NULL,1),(2,'Patient Medical History',NULL,1,NULL,NULL,1),(3,'Patient Consultation',NULL,1,NULL,NULL,1);

/*Table structure for table `admin_menu_sub` */

DROP TABLE IF EXISTS `admin_menu_sub`;

CREATE TABLE `admin_menu_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `module_description` text,
  `pri` int(11) DEFAULT NULL,
  `font_icon` varchar(225) DEFAULT NULL,
  `url_link` varchar(225) DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  `main_menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin_menu_sub` */

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
  `act` int(11) DEFAULT '1',
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_info` */

insert  into `user_info`(`user_id`,`user_empid`,`user_fn`,`user_ln`,`user_role`,`user_dept`,`user_designation`,`user_email`,`user_contact`,`user_image`,`user_name`,`user_pass`,`user_sa`,`user_sq`,`act`) values (1,'07042022001','Alma','De Fiesta','Patient',NULL,NULL,'agdefiesta@cvsu.edu.ph',NULL,'user.png','hmispatient','827ccb0eea8a706c4c34a16891f84e7b',NULL,NULL,1),(2,'07042022002','Alma','De Fiesta','Health Worker',NULL,NULL,'agdefiesta@cvsu.edu.ph',NULL,'user.png','hmishw','827ccb0eea8a706c4c34a16891f84e7b',NULL,NULL,1),(2,'07042022003','Alma','De Fiesta','Administrator',NULL,NULL,'agdefiesta@cvsu.edu.ph',NULL,'user.png','hmisadmin','827ccb0eea8a706c4c34a16891f84e7b',NULL,NULL,1);

/*Table structure for table `user_role_information` */

DROP TABLE IF EXISTS `user_role_information`;

CREATE TABLE `user_role_information` (
  `controlID` int(11) NOT NULL AUTO_INCREMENT,
  `userRole` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`controlID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_role_information` */

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_roles` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
