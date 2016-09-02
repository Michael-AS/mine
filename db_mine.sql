/*
SQLyog Community v12.2.4 (64 bit)
MySQL - 5.6.32 : Database - db_lucas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_lucas` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_mine`;

/*Table structure for table `custos` */

DROP TABLE IF EXISTS `custos`;

CREATE TABLE `custos` (
  `codcusto` int(10) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `dtcadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`codcusto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `custos` */

insert  into `custos`(`codcusto`,`descricao`,`valor`,`dtcadastro`) values 
(1,'Russi',17.5,'2016-08-31 15:21:31'),
(2,'Almoço',16,'2016-08-30 15:21:51');

/*Table structure for table `horas` */

DROP TABLE IF EXISTS `horas`;

CREATE TABLE `horas` (
  `codhora` int(10) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `horas` time DEFAULT NULL,
  `dtcadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`codhora`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `horas` */

insert  into `horas`(`codhora`,`descricao`,`horas`,`dtcadastro`) values 
(1,'Trabalho','00:00:05',NULL),
(2,'GITFuck','00:00:12','2016-08-31 13:13:24');

/*Table structure for table `tarefas` */

DROP TABLE IF EXISTS `tarefas`;

CREATE TABLE `tarefas` (
  `codtarefa` int(10) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `dtcadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`codtarefa`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tarefas` */

insert  into `tarefas`(`codtarefa`,`descricao`,`dia`,`dtcadastro`) values 
(1,'Roschel','2016-10-04',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
