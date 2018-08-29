/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.28-MariaDB : Database - db_reminder
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_reminder` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_reminder`;

/*Table structure for table `alumni` */

DROP TABLE IF EXISTS `alumni`;

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL DEFAULT 'L',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `alumni` */

insert  into `alumni`(`id`,`nama_lengkap`,`jurusan`,`jenis_kelamin`) values 
(1,'kaceManaf','Teknik Informatika','L'),
(2,'kaceRustam','Desain Komunikasi Visual','L'),
(3,'kaceAmin','Sistem Informasi','L'),
(4,'kaceRais','Multimedia','L'),
(5,'kaceAdi','Hubungan Industri','L'),
(6,'kaceUthe','Broadcasting','P');

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`id`,`nama`,`contact`,`tanggal_mulai`,`tanggal_berakhir`,`keterangan`) values 
(1,'Makan Makan','08987654321','2017-03-31','2017-04-07','Pelepasan macan tutul'),
(2,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(3,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(4,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(6,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(7,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(8,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(9,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(10,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(11,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(12,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(13,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(14,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(15,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(16,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(17,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(18,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(19,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama'),
(20,'Ngumpul','08234567890','2017-04-01','2017-04-01','Lokasi @kedai Mama');

/*Table structure for table `loker` */

DROP TABLE IF EXISTS `loker`;

CREATE TABLE `loker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `loker` */

insert  into `loker`(`id`,`nama_perusahaan`,`contact`,`tanggal_berakhir`,`posisi`,`deskripsi`,`username`) values 
(1,'PT Maju Terus Pantang Mundur','08213123213','2017-04-05','Freelancer','<p>PT. Maju Terus Pantang Mundur adalah sebuah perusahaan yang bergerak di bidang datar yang lurus. Membutuhkan seorang pegawai yang berintegritas tinggi dan memahami rumus pythagoras secara menyeluruh.</p>\r\n<p>Kualifikasi:</p>\r\n<ol>\r\n<li>Bertubuh Gitar Spanyola</li>\r\n<li>Minimal berusia 35 Tahun</li>\r\n<li>Rajin pangkal pandai</li>\r\n</ol>\r\n<p>Jika anda memenuhi kualifikasi di atas, silahkan mengirimkan cv anda pada&nbsp;<a href=\"http://www.majumundur.com\">website kami</a>&nbsp;atau pada email kami di maju@terus.com</p>','administrator');

/*Table structure for table `mst_cabang` */

DROP TABLE IF EXISTS `mst_cabang`;

CREATE TABLE `mst_cabang` (
  `id_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `namacabang` varchar(100) NOT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `createdby` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `mst_cabang` */

insert  into `mst_cabang`(`id_cabang`,`namacabang`,`wilayah`,`createdby`,`createdate`) values 
(5,'HOLDING','Jabodetabek','Ahmad Sopian',NULL);

/*Table structure for table `mst_jenis_perizinan` */

DROP TABLE IF EXISTS `mst_jenis_perizinan`;

CREATE TABLE `mst_jenis_perizinan` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perizinan` varchar(45) DEFAULT NULL,
  `createby` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_jenis_perizinan` */

/*Table structure for table `mst_perizinan` */

DROP TABLE IF EXISTS `mst_perizinan`;

CREATE TABLE `mst_perizinan` (
  `kode_izin` varchar(50) DEFAULT NULL,
  `wilayah` varchar(50) DEFAULT NULL,
  `jenis_perizinan` varchar(250) DEFAULT NULL,
  `createby` varchar(20) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `updateby` varchar(20) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_perizinan` */

insert  into `mst_perizinan`(`kode_izin`,`wilayah`,`jenis_perizinan`,`createby`,`createdate`,`updateby`,`updatedate`) values 
('M.IZIN-0001','Jabodetabek','IJIN PEMAKAIAN PESAWAT ANGKAT & ANGKUT CAR','Ahmad Sopian','2018-08-29 16:40:38','Ahmad Sopian','2018-08-29 16:56:46');

/*Table structure for table `mst_vendor` */

DROP TABLE IF EXISTS `mst_vendor`;

CREATE TABLE `mst_vendor` (
  `id_vendor` int(11) NOT NULL AUTO_INCREMENT,
  `kode_vendor` varchar(45) DEFAULT NULL,
  `nama_vendor` varchar(100) DEFAULT NULL,
  `alamat_vendor` varchar(200) DEFAULT NULL,
  `telepon_vendor` varchar(45) DEFAULT NULL,
  `email_vendor` varchar(45) DEFAULT NULL,
  `nama_pic` varchar(45) DEFAULT NULL,
  `createby` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_vendor`),
  UNIQUE KEY `nama_vendor_UNIQUE` (`nama_vendor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `mst_vendor` */

insert  into `mst_vendor`(`id_vendor`,`kode_vendor`,`nama_vendor`,`alamat_vendor`,`telepon_vendor`,`email_vendor`,`nama_pic`,`createby`,`createdate`) values 
(1,'VDR-0001','SOPIAN LAGI','JALAN SULTAN AGUNG','08210909012','sopian@sopi.com','SOPIAN','Ahmad Sopian',NULL),
(2,'VDR-0002','TEST VENDOR','TEST ALAMAT VENDOR VERSI PANJANG','0812388989','ss@oke.com','SOPIAN','Ahmad Sopian',NULL),
(3,'VDR-0003','TIRTA MAS GEMILANG','Jl.Raya Bekasi KM 28.5','081219093977','sopian@sopian.com','SOPIAN','Ahmad Sopian',NULL),
(6,'VDR-0004','TEST DATE','JL APA AJA BOLEH','08121909399','sopi@oke.com','SIP','Ahmad Sopian','2018-08-28 12:29:25');

/*Table structure for table `mst_wilayah` */

DROP TABLE IF EXISTS `mst_wilayah`;

CREATE TABLE `mst_wilayah` (
  `id_wilayah` varchar(20) DEFAULT NULL,
  `nama_wilayah` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_wilayah` */

insert  into `mst_wilayah`(`id_wilayah`,`nama_wilayah`) values 
('1','Jabodetabek'),
('2','Jawa Timur'),
('3','Pekanbaru');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `wilayah` varchar(45) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `telp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','user') NOT NULL,
  `last_login` datetime NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'noavatar.png',
  `active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`alamat`,`wilayah`,`email`,`telp`,`username`,`password`,`level`,`last_login`,`avatar`,`active`) values 
(1,'Ahmad Sopian','Jl.Sultan Agung','Jabodetabek','sopian.ahmad@suzuki-mobil.co.id','081219093977','administrator','$2y$10$B2ztsNPm8JZyGR/E12rRU.itsFuvdnYCsDg/L4SZ.xCx7usFzvXUG','administrator','2018-08-29 10:50:28','administrator_20170421152220.jpg','1'),
(8,'Test User','Test User','Jabodetabek','shopyan.design@gmail.com','081138515858','testuser','$2y$10$dlPtkTIVk8NS2jMJetCJw.nhjx7QKyFhy3R9lgqB8zY5hpc7qZiO6','user','2018-08-28 12:16:01','noavatar.png','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
