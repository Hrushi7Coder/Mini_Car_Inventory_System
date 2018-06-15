-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.11


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema carinventory
--

CREATE DATABASE IF NOT EXISTS carinventory;
USE carinventory;

--
-- Definition of table `carmodeldet`
--

DROP TABLE IF EXISTS `carmodeldet`;
CREATE TABLE `carmodeldet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `manufactid` int(10) unsigned NOT NULL,
  `modelname` varchar(80) DEFAULT NULL,
  `modelcolor` varchar(45) DEFAULT NULL,
  `modelmanfyear` int(10) unsigned DEFAULT NULL,
  `modelregnum` varchar(45) DEFAULT NULL,
  `modelnote` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carmodeldet`
--

/*!40000 ALTER TABLE `carmodeldet` DISABLE KEYS */;
INSERT INTO `carmodeldet` (`id`,`manufactid`,`modelname`,`modelcolor`,`modelmanfyear`,`modelregnum`,`modelnote`) VALUES 
 (1,1,'WagonR','silver',2015,'reg123po','this is alto800 car.'),
 (2,1,'WagonR','black',2004,'reg12312','wagonr'),
 (3,2,'Nano','red',2008,'htrss3445','nano');
/*!40000 ALTER TABLE `carmodeldet` ENABLE KEYS */;


--
-- Definition of table `carmodelimagedet`
--

DROP TABLE IF EXISTS `carmodelimagedet`;
CREATE TABLE `carmodelimagedet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `carmodelid` int(10) unsigned NOT NULL,
  `imagename` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carmodelimagedet`
--

/*!40000 ALTER TABLE `carmodelimagedet` DISABLE KEYS */;
/*!40000 ALTER TABLE `carmodelimagedet` ENABLE KEYS */;


--
-- Definition of table `manufacturerdet`
--

DROP TABLE IF EXISTS `manufacturerdet`;
CREATE TABLE `manufacturerdet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `manfname` varchar(200) DEFAULT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturerdet`
--

/*!40000 ALTER TABLE `manufacturerdet` DISABLE KEYS */;
INSERT INTO `manufacturerdet` (`id`,`manfname`,`createdon`) VALUES 
 (1,'Maruti','2018-06-15 23:45:12'),
 (2,'Tata','2018-06-16 01:21:23');
/*!40000 ALTER TABLE `manufacturerdet` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
