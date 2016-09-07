DROP TABLE IF EXISTS table_company;
CREATE TABLE `table_company` (
  `id` varchar(4) NOT NULL,
  `name` varchar(10) NOT NULL,
  `type` varchar(10) default NULL,
  `contact` varchar(10) default NULL,
  `phone` varchar(12) default NULL,
  `fax` varchar(12) default NULL,
  `email` varchar(20) default NULL,
  `bank` varchar(10) default NULL,
  `bankaccount` varchar(20) default NULL,
  `tariff` varchar(20) default NULL,
  `area` varchar(10) default NULL,
  `province` varchar(10) default NULL,
  `address` varchar(50) default NULL,
  `zipcode` varchar(10) default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_company VALUES('0001', '??B', 'type A', '??', '123456', '123456', '123456@123', '', '', '', '', '', '', '');
INSERT INTO table_company VALUES('0002', '??C', '', '??', '123456', '123456', '', '', '', '', '', '', '', '');
INSERT INTO table_company VALUES('0003', '??D', '', '??', '123456', '123456', '', '', '', '', '', '', '', '');



DROP TABLE IF EXISTS table_depart;
CREATE TABLE `table_depart` (
  `id` varchar(4) NOT NULL,
  `name` varchar(10) NOT NULL,
  `major` varchar(20) default NULL,
  `phone` varchar(8) default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_depart VALUES('0001', '???', '', NULL);
INSERT INTO table_depart VALUES('0002', '???', '', NULL);
INSERT INTO table_depart VALUES('1003', '?????', 'zang', '132xxxxx');
INSERT INTO table_depart VALUES('0000', '???', '??', '88888888');



DROP TABLE IF EXISTS table_employee;
CREATE TABLE `table_employee` (
  `id` varchar(8) NOT NULL,
  `name` varchar(10) NOT NULL,
  `gender` varchar(10) default NULL,
  `job` varchar(10) default NULL,
  `phone` int(11) default NULL,
  `address` varchar(50) default NULL,
  `depart` varchar(10) default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_employee VALUES('13112700', '??', '?', 'job1', '2147483647', 'wuhan', '???');
INSERT INTO table_employee VALUES('13112900', '??', '?', 'job2', '131', 'wuhan', '???');
INSERT INTO table_employee VALUES('13112902', '??', '?', 'job2', '131', 'wuhan', '???');
INSERT INTO table_employee VALUES('13113002', '???', '?', '??1', '2147483647', '??', '???');
INSERT INTO table_employee VALUES('13112904', '??', '?', 'job2', '131', 'wuhan', '???');
INSERT INTO table_employee VALUES('13112901', '??', '?', 'job3', '0', 'unset', '?????');
INSERT INTO table_employee VALUES('13112906', '??', '?', 'job2', '131', 'wuhan', '???');
INSERT INTO table_employee VALUES('13112907', '??', '?', 'job2', '131', 'wuhan', '???');
INSERT INTO table_employee VALUES('13113003', '???', '?', '??1', '2147483647', '??', '???');
INSERT INTO table_employee VALUES('13113004', '???', '?', '??1', '2147483647', '??', '???');
INSERT INTO table_employee VALUES('13120200', '1', '?', '1', '1', '1', '???');
INSERT INTO table_employee VALUES('13120201', '???', '?', 'job4', '2147483647', 'DEFINED', '???');



DROP TABLE IF EXISTS table_itemclassify;
CREATE TABLE `table_itemclassify` (
  `id` varchar(4) NOT NULL,
  `name` varchar(10) default NULL,
  `lowerclass` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_itemclassify VALUES('0000', '??A', '??1,??2,??3,??4');
INSERT INTO table_itemclassify VALUES('0001', '??B', '??1,??,??3,??4');
INSERT INTO table_itemclassify VALUES('0002', '??C', '1,2,3,4,5');
INSERT INTO table_itemclassify VALUES('0003', '??E', '??1,??2,??3');
INSERT INTO table_itemclassify VALUES('0004', '??D', '??1,??2,??3');



DROP TABLE IF EXISTS table_measureunit;
CREATE TABLE `table_measureunit` (
  `id` varchar(4) NOT NULL,
  `name` varchar(5) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_measureunit VALUES('0000', 'None');
INSERT INTO table_measureunit VALUES('0003', '?');
INSERT INTO table_measureunit VALUES('0004', '?');
INSERT INTO table_measureunit VALUES('0005', '?');
INSERT INTO table_measureunit VALUES('0001', '?');
INSERT INTO table_measureunit VALUES('0002', '?');
INSERT INTO table_measureunit VALUES('0006', '?');



DROP TABLE IF EXISTS table_warehouse;
CREATE TABLE `table_warehouse` (
  `id` varchar(4) NOT NULL,
  `name` varchar(10) NOT NULL,
  `fuzeren` varchar(10) default NULL,
  `phone` varchar(8) default NULL,
  `address` varchar(50) default NULL,
  `remark` varchar(50) default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_warehouse VALUES('0000', '??1', '??', '12345678', '??', '?');
INSERT INTO table_warehouse VALUES('0003', '??4', '?X', '123456', '??', '????1234567890');



DROP TABLE IF EXISTS tb_admin;
CREATE TABLE `tb_admin` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `name` varchar(25) NOT NULL default '',
  `pwd` varchar(50) default NULL,
  `authority` varchar(100) default NULL,
  `state` int(4) unsigned zerofill default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gb2312;
INSERT INTO tb_admin VALUES('1', 'tsoft', '698d51a19d8a121ce581499d7b701668', '1,1,1,1,1,0,0,0,0,0', '0001');
INSERT INTO tb_admin VALUES('2', 'hust', 'd923c56282507665deec912b66556af4', '1,1,1,1,1,0,0,0,0,0', '0001');



DROP TABLE IF EXISTS tb_inout;
CREATE TABLE `tb_inout` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `type` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cost` int(4) NOT NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=gb2312;
INSERT INTO tb_inout VALUES('1', '??', '????', '0');
INSERT INTO tb_inout VALUES('2', '??', '????', '0');
INSERT INTO tb_inout VALUES('3', '??', '????', '0');
INSERT INTO tb_inout VALUES('4', '??', '????', '1');
INSERT INTO tb_inout VALUES('5', '??', '????', '0');
INSERT INTO tb_inout VALUES('6', '??', '????', '1');
INSERT INTO tb_inout VALUES('14', '??', '????', '1');



