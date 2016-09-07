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
INSERT INTO tb_admin VALUES('2', 'hust', '698d51a19d8a121ce581499d7b701668', '1,1,1,1,1,0,0,0,0,0', '0001');



DROP TABLE IF EXISTS tb_employee;
CREATE TABLE `tb_employee` (
  `id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(10) default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO tb_employee VALUES('1', 'hust', 'male');



