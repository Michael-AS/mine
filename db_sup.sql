/*
SQLyog Community v12.2.1 (64 bit)
MySQL - 10.1.10-MariaDB : Database - db_sup
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sup` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_sup`;

/*Table structure for table `tarefas` */

DROP TABLE IF EXISTS `tarefas`;

CREATE TABLE `tarefas` (
  `coduser` int(10) DEFAULT NULL,
  `codtarefa` int(10) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `horas` time DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`codtarefa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tarefas` */

insert  into `tarefas`(`coduser`,`codtarefa`,`descricao`,`horas`,`obs`) values 
(1,1,'Roschel','08:00:00',NULL),
(1,2,'Session Site','10:00:00',NULL),
(2,3,'Mercado Livre','10:00:00',NULL),
(2,4,'Control DOC','20:00:00',NULL);

/*Table structure for table `tarefas_copy` */

DROP TABLE IF EXISTS `tarefas_copy`;

CREATE TABLE `tarefas_copy` (
  `coduser` int(10) DEFAULT NULL,
  `codtarefa` int(10) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `horas` time DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`codtarefa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tarefas_copy` */

insert  into `tarefas_copy`(`coduser`,`codtarefa`,`descricao`,`horas`,`obs`) values 
(1,1,'Roschel','08:00:00',NULL),
(2,2,'G DOC','20:00:00',NULL),
(5,3,'Dabus Relatorio','02:00:00',NULL),
(3,4,'Every fucking thing','10:00:00',NULL),
(4,5,'WT Site','12:00:00',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `coduser` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `horas` time DEFAULT NULL,
  PRIMARY KEY (`coduser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`coduser`,`nome`,`cor`,`horas`) values 
(1,'Lucas','blue darken-5',NULL),
(2,'Michael','red darken-3',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
