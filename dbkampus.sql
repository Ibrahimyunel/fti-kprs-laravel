# Host: localhost  (Version 5.5.27)
# Date: 2023-06-12 09:40:36
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "mmahasiswa"
#

DROP TABLE IF EXISTS `mmahasiswa`;
CREATE TABLE `mmahasiswa` (
  `cnim` varchar(10) NOT NULL,
  `ckdlok` char(1) DEFAULT NULL,
  `CNAMA` varchar(50) DEFAULT NULL,
  `CALAMAT` varchar(200) DEFAULT NULL,
  `CNORMH` varchar(4) DEFAULT NULL,
  `CRT` varchar(3) DEFAULT NULL,
  `CRW` varchar(3) DEFAULT NULL,
  `CNOTELP` varchar(15) DEFAULT NULL,
  `CKDPOS` varchar(5) DEFAULT NULL,
  `CTEMPLHR` varchar(35) DEFAULT NULL,
  `DTGLHR` date DEFAULT NULL,
  `CJENKEL` char(1) DEFAULT NULL,
  `CGOLDAR` char(1) DEFAULT NULL,
  `CAGAMA` varchar(1) DEFAULT NULL,
  `CSTATNKH` char(1) DEFAULT NULL,
  `IPK` float DEFAULT NULL,
  `PASSWORD` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`cnim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "mmahasiswa"
#

/*!40000 ALTER TABLE `mmahasiswa` DISABLE KEYS */;
INSERT INTO `mmahasiswa` VALUES ('1211500134','0','Astri','Pamulang','10','10','10','08566666666','12260','Jambi','2002-08-17','2','A','2','1',2.23,'123qwe'),('1211501851','0','Bedu','Ciledug','12','2','2','02194979952','12260','jakarta','1997-02-02','1','o','1','1',3.09,'123qwe'),('1311500431','0','Budi','Ciledug','12','2','2','02194979952','12260','jakarta','1993-07-12','1','O','1','1',2.81,'123qwe'),('1311501587','0','Lastri','Kemayoran','90','1','2','085777777701','12260','jakarta','2001-12-30','2','O','1','1',3.91,'123qwe'),('1511500464','0','Bambang','Tangerang','2','3','1','089999999','12360','Yogyakarta','2000-09-08','1','A','2','1',1.89,'123qwe');
/*!40000 ALTER TABLE `mmahasiswa` ENABLE KEYS */;

#
# Structure for table "mtbmtkul"
#

DROP TABLE IF EXISTS `mtbmtkul`;
CREATE TABLE `mtbmtkul` (
  `CNOTAB` varchar(50) NOT NULL,
  `CNAMAMK` varchar(100) DEFAULT NULL,
  `NSKS` int(1) DEFAULT NULL,
  PRIMARY KEY (`CNOTAB`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "mtbmtkul"
#

/*!40000 ALTER TABLE `mtbmtkul` DISABLE KEYS */;
INSERT INTO `mtbmtkul` VALUES ('EK014','Ekonomi Makro',3),('EK023','Kewirausahaan',2),('IF007','E-Commerce',2),('IF009','Interaksi Manusia dan Komputer',2),('IF013','Konsep Sistem Informasi',3),('IF017','Pemodelan Sistem Informasi',3),('IF068','Perencanaan Sumber Daya Perusahaan',3),('IF071','Manajemen Rantai Persediaan',3),('KM006','Desain Grafis',3),('KP137','Rekayasa Data',3),('KP367','Algortima dan Struktur Data 3',3),('KP374','Keamanan Web',3),('KP377','Pengelolaan Linux',3),('KP378','Bahasa Query Terstruktur',2),('PG067','Cloud Computing',3),('PG170','Aplikasi dan Teknik Analisis',3),('PG174','Pemrograman Java Enterprise',3);
/*!40000 ALTER TABLE `mtbmtkul` ENABLE KEYS */;

#
# Structure for table "tjadkul"
#

DROP TABLE IF EXISTS `tjadkul`;
CREATE TABLE `tjadkul` (
  `NOJADKUL` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CTHAJAR` varchar(8) NOT NULL,
  `CSMT` varchar(1) NOT NULL,
  `CHARI` varchar(1) DEFAULT NULL,
  `CSESI` varchar(2) DEFAULT NULL,
  `CKDRUANG` varchar(3) DEFAULT NULL,
  `CNOTAB` varchar(50) DEFAULT NULL,
  `CKELOMPOK` varchar(5) NOT NULL,
  `NMAKS` int(3) DEFAULT NULL,
  `NISI` int(3) DEFAULT NULL,
  PRIMARY KEY (`NOJADKUL`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

#
# Data for table "tjadkul"
#

/*!40000 ALTER TABLE `tjadkul` DISABLE KEYS */;
INSERT INTO `tjadkul` VALUES (1,'20152016','E','1','01','321','KM006','KA',30,7),(2,'20152016','E','1','03','321','EK014','KA',30,3),(3,'20152016','E','1','05','333','IF068','JC',40,1),(4,'20152016','E','2','01','422','PG067','TA',37,9),(5,'20152016','E','2','04','423','KM006','KB',30,-1),(6,'20152016','E','2','07','443','EK014','KB',30,0),(7,'20152016','E','3','01','521','IF071','BC',60,60),(8,'20152016','E','3','05','521','PG174','TB',25,25),(9,'20152016','E','3','05','533','PG174','FO',60,42),(10,'20152016','E','3','01','542','IF007','AA',37,10),(11,'20152016','E','3','07','543','IF009','JB',40,18),(12,'20152016','E','4','01','622','EK023','AA',37,9),(13,'20152016','E','4','03','623','IF068','JB',40,15),(14,'20152016','E','4','04','624','KP137','AA',27,24),(15,'20152016','E','4','07','631','KP377','AB',27,27),(16,'20152016','E','4','10','633','PG174','AD',27,-1),(17,'20152016','E','5','02','712','KP378','XA',28,11),(18,'20152016','E','5','05','711','EK014','EN',60,3),(19,'20152016','E','5','01','713','KP367','XB',30,4),(20,'20152016','E','5','05','713','KP377','CA',27,1),(21,'20152016','E','5','08','713','IF071','CA',27,1),(22,'20152016','E','5','08','714','IF013','JC',40,2);
/*!40000 ALTER TABLE `tjadkul` ENABLE KEYS */;

#
# Structure for table "trkrs"
#

DROP TABLE IF EXISTS `trkrs`;
CREATE TABLE `trkrs` (
  `CKDFAK` varchar(2) NOT NULL,
  `CTHAJAR` varchar(8) NOT NULL,
  `CSMT` varchar(1) NOT NULL,
  `CNOTAB` varchar(50) DEFAULT NULL,
  `CKELOMPOK` varchar(5) DEFAULT NULL,
  `CNIM` varchar(10) DEFAULT NULL,
  `NOJADKUL` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "trkrs"
#

/*!40000 ALTER TABLE `trkrs` DISABLE KEYS */;
INSERT INTO `trkrs` VALUES ('01','20152016','E','EK023','AA','1211501851',12),('01','20152016','E','IF068','JC','1211501851',3),('01','20152016','E','PG067','TA','1311500431',4),('01','20152016','E','EK014','KB','1311500431',6),('01','20152016','E','IF009','JB','1511500464',11),('01','20152016','E','KP367','XB','1211501851',19),('01','20152016','E','EK014','EN','1511500464',18),('01','20152016','E','IF013','JC','1311501587',22),('01','20152016','E','PG067','TA','1511500464',4),('01','20152016','E','EK014','EN','1211501851',18),('01','20152016','E','KP377','AB','1211501851',15),('01','20152016','E','KM006','KA','1211501851',1),('01','20152016','E','KM006','KA','1311500431',1),('01','20152016','E','KP367','XB','1511500464',19),('01','20152016','E','KM006','KA','1511500464',1),('01','20152016','E','EK023','AA','1311501587',12),('01','20152016','E','IF009','JB','1311501587',11),('01','20152016','E','EK014','EN','1311501587',18),('01','20152016','E','PG067','TA','1311501587',4),('01','20152016','E','KP378','XA','1311501587',17),('01','20152016','E','KM006','KA','1311501587',1),('01','20152016','E','IF071','BC','1311501587',7),('01','20152016','E','IF007','AA','1511500464',10),('01','20152016','E','KP378','XA','1511500464',17),('01','20152016','E','KP378','XA','1211501851',17),('01','20152016','E','PG067','TA','1211501851',4),('01','20152016','E','IF007','AA','1211501851',10),('01','20152016','E','IF007','AA','1311500431',10),('01','20152016','E','KP367','XB','1311500431',19),('01','20152016','E','KP378','XA','1311500431',17),('01','20152016','E','IF009','JB','1311500431',11),('01','20152016','E','EK023','AA','1311500431',12);
/*!40000 ALTER TABLE `trkrs` ENABLE KEYS */;
