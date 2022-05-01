/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.1.38-MariaDB : Database - streaming
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`streaming` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `streaming`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`pkey`,`username`,`name`,`password`,`role`,`img`) values 
(1,'admin','yayan','0192023a7bbd73250516f069df18b500',1,''),
(5,'yayan1','Guru','0192023a7bbd73250516f069df18b500',2,''),
(6,'yt','yt','fa0ed5b5c600145bdd9a299952b99651',2,'');

/*Table structure for table `ads` */

DROP TABLE IF EXISTS `ads`;

CREATE TABLE `ads` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `ads` */

insert  into `ads`(`pkey`,`name`,`status`,`createon`,`time`,`img`,`link`) values 
(5,'aaaaaaaaaaaaa',1,1,'1648561807','1648561807.gif','aasscscascasc'),
(6,'testing',1,1,'1649997266','1649997266.jpeg','aaaa'),
(7,'araa',1,1,'1648562981','1648562981.gif','https://www.youtube.com/');

/*Table structure for table `brand` */

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `createon` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `time` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `brand` */

insert  into `brand`(`pkey`,`createon`,`status`,`time`,`name`,`img`) values 
(5,1,1,'1650321283','asdfghnm','1650321283.png'),
(6,1,0,'1650321385','ascasc','1650321385.jpeg');

/*Table structure for table `content` */

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `content` longtext,
  `privacy` longtext,
  `about` longtext,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `content` */

insert  into `content`(`pkey`,`name`,`status`,`createon`,`time`,`content`,`privacy`,`about`) values 
(3,'bodynya',1,1,'1648562390','<h2 style=\"text-align: center;\"><span style=\"color: #ff0000;\"><strong>LASKAR138 Point Reward</strong></span></h2>\r\n<p style=\"text-align: center;\"><strong>Seluruh member LASKAR138 akan mendapatkan Point Reward sebagai Loyalty apresiasi dari LASKAR138</strong> <strong>Dengan Minimal Deposit 100rb Rupiah Pemain akan mendapatkan Point Reward yang dapat ditukar dengan Hadiah</strong></p>\r\n<div class=\"elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-3c53e48 animated-fast animated fadeInUp\" data-id=\"3c53e48\" data-element_type=\"column\" data-settings=\"{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:1000}\">\r\n<div class=\"elementor-widget-wrap elementor-element-populated\">\r\n<div class=\"elementor-element elementor-element-689e4fe elementor-widget elementor-widget-image\" data-id=\"689e4fe\" data-element_type=\"widget\" data-widget_type=\"image.default\">\r\n<div class=\"elementor-widget-container\"><strong><img class=\" lazyloaded\" title=\"\" src=\"https://bookingmarketplace.getdokan.com/wp-content/uploads/2019/08/icon3.png\" alt=\"\" data-src=\"https://bookingmarketplace.getdokan.com/wp-content/uploads/2019/08/icon3.png\" /></strong></div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-0ed1b4b elementor-widget elementor-widget-heading\" data-id=\"0ed1b4b\" data-element_type=\"widget\" data-widget_type=\"heading.default\">\r\n<div class=\"elementor-widget-container\">\r\n<div class=\"elementor-heading-title elementor-size-default\" style=\"text-align: center;\"><strong>Pemain juga mendapatkan akses Deposit dan Withdraw yang khusus dengan VIP Laskar138</strong></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p><strong>LASKAR POINT REWARD</strong>&nbsp;adalah Point Royalti yang diberikan untuk para pemain&nbsp;<strong>LASKAR138</strong>&nbsp;yang setia. Yang selalu mendapatkan Point Reward Dari setiap deposit Minimal 100.000,- Rupiah.&nbsp;<strong>LASKAR POINT REWARD</strong>&nbsp;dapat ditukarkan dengan Hadiah hadiah yang menarik yang ditawarkan oleh&nbsp;<strong>LASKAR138</strong>. Oleh sebab itu seluruh pemain di&nbsp;<strong>LASKAR138</strong>&nbsp;dapat menukarkan Point Tersebut dengan Hadiah hadiah yang ditawarkan TANPA HARUS DIUNDI</p>\r\n<p>Dengan melakukan deposit minimal 100.000 Pemain akan dilayani secara VIP oleh Costumer Service&nbsp;<strong>LASKAR138</strong>&nbsp;yang memiliki keuntungan Prioritas dalam Deposit, Withdraw maupun gangguan dalam permaianan. Nikmatilah Prioritas dalam bermain di situs&nbsp;<strong>LASKAR138</strong></p>\r\n<ul>\r\n<li>Deposit Rp 100.000,-&nbsp; mendapatkan Point&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style=\"color: #ff0000;\"><strong>25 POINT&nbsp;</strong></span></li>\r\n<li>Deposit Rp 500.000,- mendapatkan Point&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style=\"color: #ff0000;\"><strong>150 POINT</strong></span></li>\r\n<li>Deposit Rp 1.000.000,- mendapatkan Point &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"color: #ff0000;\"><strong>350 POINT</strong></span></li>\r\n</ul>\r\n<div>\r\n<p><em>Syarat Dan Ketentuan sebagai berikut :</em></p>\r\n<ol>\r\n<li>Deposit untuk mendapatkan point</li>\r\n<li>Hanya cukup melakukan deposit dengan nominal yang sesuai dan VIP chat akan membantu anda dalam mendapatkan Point LASKAR138 Reward</li>\r\n<li>Deposit Via Pulsa tidak bisa klaim Point Reward</li>\r\n<li>Untuk penukaran POINT REWARD harap Klaim melalui Livechat VIP kami</li>\r\n<li>Untuk pengiriman hadiah paling lamban 3 x 24 jam ( Hari Kerja )</li>\r\n<li>Untuk pengklaiman Wajib mengisi Formulir Data diri</li>\r\n<li>Promo ini dapat berubah kapan saja tanpa pemberitahuan terlebih dahulu</li>\r\n<li>Semua keputusan LASKAR138 bersifat mutlak dan tidak bisa diganggu gugat</li>\r\n</ol>\r\n</div>','AAAAAAAAAAA','VVVVVVVVVV');

/*Table structure for table `head` */

DROP TABLE IF EXISTS `head`;

CREATE TABLE `head` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `createon` int(11) DEFAULT NULL,
  `html` longtext,
  `status` int(11) DEFAULT '0',
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `head` */

insert  into `head`(`pkey`,`name`,`time`,`createon`,`html`,`status`) values 
(1,'nama head','1648457125',1,'<style>\r\n        body {\r\n            background-color: #FFA20B;\r\n        }\r\n    </style>\r\n\r\n<!-- Start of LiveChat (www.livechatinc.com) code -->\r\n<script>\r\n    window.__lc = window.__lc || {};\r\n    window.__lc.license = 13477266;\r\n    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:\"2.0\",on:function(){i([\"on\",c.call(arguments)])},once:function(){i([\"once\",c.call(arguments)])},off:function(){i([\"off\",c.call(arguments)])},get:function(){if(!e._h)throw new Error(\"[LiveChatWidget] You can\'t use getters before load.\");return i([\"get\",c.call(arguments)])},call:function(){i([\"call\",c.call(arguments)])},init:function(){var n=t.createElement(\"script\");n.async=!0,n.type=\"text/javascript\",n.src=\"https://cdn.livechatinc.com/tracking.js\",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))\r\n</script>\r\n<noscript><a href=\"https://www.livechatinc.com/chat-with/13477266/\" rel=\"nofollow\">Chat with us</a>, powered by <a href=\"https://www.livechatinc.com/?welcome\" rel=\"noopener nofollow\" target=\"_blank\">LiveChat</a></noscript>\r\n<!-- End of LiveChat code -->',0),
(2,'scasc','1648560839',1,'',0),
(3,'aaaaaa','1650321787',1,'<meta charset=\"utf-8\">',1);

/*Table structure for table `live` */

DROP TABLE IF EXISTS `live`;

CREATE TABLE `live` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `live` */

insert  into `live`(`pkey`,`name`,`status`,`createon`,`time`,`img`,`link`) values 
(9,'aaas',1,1,'1649784713','1649489305.jpg','http://94.237.75.137:8080/hls/test.m3u8'),
(10,'tttttttt',1,1,'1649489311','1649489311.jpg','http://94.237.75.137:8080/hls/test2.m3u8'),
(11,'saassa',1,1,'1649595887','1649595887.jpg','http://94.237.75.137:8080/hls/streamingkey.m3u8'),
(12,'asacascas',1,1,'1649595895','1649595895.jpg','http://94.237.75.137:8080/hls/streamingkey.m3u8'),
(13,'ascascc',1,1,'1649595902','1649595903.jpg','http://94.237.75.137:8080/hls/streamingkey.m3u8'),
(14,'ascasc',1,1,'1649596572','1649596572.png','http://94.237.75.137:8080/hls/streamingkey.m3u8');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `createon` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`pkey`,`title`,`time`,`createon`,`link`,`status`) values 
(3,'testing','1650225991',1,'ascascascas',1),
(4,'testing2','1650321562',1,'asdf',1),
(5,'testing 3','1650321570',1,'asdf',1);

/*Table structure for table `profile_company` */

DROP TABLE IF EXISTS `profile_company`;

CREATE TABLE `profile_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `titlelogin` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `menutitle` varchar(255) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `profile_company` */

insert  into `profile_company`(`id`,`name`,`alamat`,`telepon`,`phone`,`titlelogin`,`logo`,`title`,`menutitle`) values 
(1,'Slot gacor','testing','2345423','234532','Login Live Streaming','logo.png','Live','Live Streaming');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`pkey`,`name`) values 
(1,'Super Admin'),
(2,'Admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
