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
INSERT INTO table_company VALUES('0001', '??B', '???', '??', '123456', '123456', '123456@123', '', '', '', '??', '', '', '');
INSERT INTO table_company VALUES('0002', '??C', '???', '??', '123456', '123456', '', '', '', '', '??', '', '', '');
INSERT INTO table_company VALUES('0003', '??D', '???', '??', '123456', '123456', '', '', '', '', '??', '', '', '');
INSERT INTO table_company VALUES('0000', '??A', '???', '', '', '', '', '', '', '', '??', '', '', '');
INSERT INTO table_company VALUES('0004', '???1', '???', '', '', '', '', '', '', '', '??', '', '', '');
INSERT INTO table_company VALUES('0005', '???2', '???', '', '', '', '', '', '', '', '??', '', '', '');
INSERT INTO table_company VALUES('0006', '???1', '???', '', '', '', '', '', '', '', '??', '', '', '');
INSERT INTO table_company VALUES('0007', '???2', '???', '', '', '', '', '', '', '', '??', '', '', '');
INSERT INTO table_company VALUES('0008', '???3', '???', '', '', '', '', '', '', '', '??', '', '', '');
INSERT INTO table_company VALUES('0009', '???3', '???', '', '', '', '', '', '', '', '??', '', '', '');



DROP TABLE IF EXISTS table_depart;
CREATE TABLE `table_depart` (
  `id` varchar(4) NOT NULL,
  `name` varchar(10) NOT NULL,
  `major` varchar(20) default NULL,
  `phone` varchar(8) default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_depart VALUES('0001', '???', 'asd', '13518aa');
INSERT INTO table_depart VALUES('0002', '???', 'asfwaad', '351860');
INSERT INTO table_depart VALUES('1003', '?????', 'zang', '132xxxxx');
INSERT INTO table_depart VALUES('0000', '???', '??', '88888888');
INSERT INTO table_depart VALUES('9999', 'Preset', 'None', '0');



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
INSERT INTO table_employee VALUES('13113004', '???', '?', '??1', '2147483647', '??', '???');
INSERT INTO table_employee VALUES('13120200', '1', '?', '1', '1', '1', '???');
INSERT INTO table_employee VALUES('13120201', '???', '?', 'job4', '2147483647', 'DEFINED', '???');
INSERT INTO table_employee VALUES('99999999', 'None', '?', 'None', '0', 'None', 'Preset');
INSERT INTO table_employee VALUES('13121900', '??', '?', 'None', '132', '123', '???');



DROP TABLE IF EXISTS table_itemclassify;
CREATE TABLE `table_itemclassify` (
  `id` varchar(4) NOT NULL,
  `name` varchar(10) default NULL,
  `lowerclass` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_itemclassify VALUES('0000', '??A', '|??1|??2|??3|??4');
INSERT INTO table_itemclassify VALUES('0001', '??B', '|??1|??2|??3|??4');
INSERT INTO table_itemclassify VALUES('0002', '??C', '|??A|??B|??C|??D|??E');



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
INSERT INTO table_warehouse VALUES('0000', '??0', '??', '12345678', '??', '?');
INSERT INTO table_warehouse VALUES('0001', '??1', '??', '12345678', '', '');
INSERT INTO table_warehouse VALUES('0003', '??3', 'XX', '123', '', '');
INSERT INTO table_warehouse VALUES('0002', '??2', '??', '12345678', '', '');



DROP TABLE IF EXISTS table_warehouse_0000;
CREATE TABLE `table_warehouse_0000` (
  `id` varchar(8) NOT NULL,
  `num` int(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_warehouse_0000 VALUES('0001', '1010');
INSERT INTO table_warehouse_0000 VALUES('0002', '300');
INSERT INTO table_warehouse_0000 VALUES('0003', '6000');
INSERT INTO table_warehouse_0000 VALUES('5365', '0');
INSERT INTO table_warehouse_0000 VALUES('1008', '100');



DROP TABLE IF EXISTS table_warehouse_0001;
CREATE TABLE `table_warehouse_0001` (
  `id` varchar(8) NOT NULL,
  `num` int(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_warehouse_0001 VALUES('0001', '200');
INSERT INTO table_warehouse_0001 VALUES('0002', '2000');
INSERT INTO table_warehouse_0001 VALUES('0003', '3000');
INSERT INTO table_warehouse_0001 VALUES('1008', '310');
INSERT INTO table_warehouse_0001 VALUES('5365', '90');



DROP TABLE IF EXISTS table_warehouse_0002;
CREATE TABLE `table_warehouse_0002` (
  `id` varchar(8) NOT NULL,
  `num` int(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_warehouse_0002 VALUES('0001', '500');
INSERT INTO table_warehouse_0002 VALUES('0002', '2000');
INSERT INTO table_warehouse_0002 VALUES('0003', '3000');



DROP TABLE IF EXISTS table_warehouse_0003;
CREATE TABLE `table_warehouse_0003` (
  `id` varchar(8) NOT NULL,
  `num` int(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO table_warehouse_0003 VALUES('0001', '1000');
INSERT INTO table_warehouse_0003 VALUES('0002', '2000');
INSERT INTO table_warehouse_0003 VALUES('0003', '3000');
INSERT INTO table_warehouse_0003 VALUES('1008', '90');



DROP TABLE IF EXISTS tb_admin;
CREATE TABLE `tb_admin` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `name` varchar(25) NOT NULL default '',
  `pwd` varchar(50) default NULL,
  `authority` varchar(100) default NULL,
  `state` int(4) unsigned zerofill default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gb2312;
INSERT INTO tb_admin VALUES('1', 'hust', '698d51a19d8a121ce581499d7b701668', '1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1', '0001');
INSERT INTO tb_admin VALUES('2', '???', 'd41d8cd98f00b204e9800998ecf8427e', '1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1', '0001');



DROP TABLE IF EXISTS tb_inout;
CREATE TABLE `tb_inout` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `type` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cost` int(4) NOT NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=gb2312;
INSERT INTO tb_inout VALUES('1', '??', '????', '0');
INSERT INTO tb_inout VALUES('2', '??', '????', '0');
INSERT INTO tb_inout VALUES('3', '??', '????', '0');
INSERT INTO tb_inout VALUES('4', '??', '????', '1');
INSERT INTO tb_inout VALUES('5', '??', '????', '0');
INSERT INTO tb_inout VALUES('6', '??', '????', '1');
INSERT INTO tb_inout VALUES('14', '??', '????', '1');



DROP TABLE IF EXISTS tb_product;
CREATE TABLE `tb_product` (
  `id` int(4) NOT NULL auto_increment,
  `maintype` varchar(20) NOT NULL,
  `subtype` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `encode` varchar(20) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `upperlimit` int(4) NOT NULL,
  `lowerlimit` int(4) NOT NULL,
  `inprice` int(4) NOT NULL,
  `outprice` int(4) NOT NULL,
  `tupian` varchar(100) character set gb2312 collate gb2312_bin NOT NULL,
  `jianjie` mediumtext NOT NULL,
  `addtime` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`,`encode`,`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gb2312;
INSERT INTO tb_product VALUES('8', '??A', '??1', '??A', '0001', 'A3S5D4FS5', 'MODEL A', '?', '1000', '500', '5', '10', '', '', '2013-12-17');
INSERT INTO tb_product VALUES('2', '??C', '3', '???', '1002', '41645632163532321', 'dg414', '?', '8', '5', '55', '82', '', 'ftgjt?grey???', '2013-12-14');
INSERT INTO tb_product VALUES('6', '??B', '??1', 'rfg', '3245', '63398698', '28', '?', '20', '120', '20', '22', '', '', '2013-12-16');
INSERT INTO tb_product VALUES('4', '??A', '??2', '???', '1008', '45325365327865', '85', '?', '55', '20', '50', '60', 'product/upimages/4.jpg', 'rtut6ur5y56', '2013-12-15');
INSERT INTO tb_product VALUES('5', '??D', '??3', '??', '1009', '45278969869', '55', '?', '200', '100', '1000', '1500', '', 'ereyrtuy6rtu', '2013-12-15');
INSERT INTO tb_product VALUES('7', '??B', '', 'fgh', '5365', '535646', '55', '?', '100', '80', '100', '120', '', '', '2013-12-16');
INSERT INTO tb_product VALUES('9', '??B', '??1', '??B', '0002', '1354132', 'MODEL B', '?', '1000', '100', '1', '3', '', '', '2013-12-17');
INSERT INTO tb_product VALUES('10', '??C', '2', '??C', '0003', '1356', 'MODEL C', '?', '8000', '200', '46', '66', '', '', '2013-12-17');
INSERT INTO tb_product VALUES('11', '??D', '??1', '??D', '0004', '123456', 'MODEL D', '?', '10000', '10', '51', '111', '', '', '2013-12-17');



DROP TABLE IF EXISTS test_check;
CREATE TABLE `test_check` (
  `id` varchar(8) NOT NULL,
  `date` varchar(10) default NULL,
  `yewuyuan` varchar(10) default NULL,
  `warehouse` varchar(4) default NULL,
  `remark` varchar(100) default NULL,
  `itemstring` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO test_check VALUES('13121400', '2013-12-14', 'mains', '0000', 'none', '0001+1000+1000|0002+300+300|0003+6000+6000');
INSERT INTO test_check VALUES('13121401', '2013-12-14', 'mains', '0003', 'test', '0001+1000+1000|0002+2000+2000|0003+3000+2000');
INSERT INTO test_check VALUES('13122300', '2013-12-23', 'mains', '0002', '', '0001+500+500|0002+2000+2000|0003+3000+3000');



DROP TABLE IF EXISTS test_exchange;
CREATE TABLE `test_exchange` (
  `id` varchar(8) NOT NULL,
  `date` varchar(10) default NULL,
  `yewuyuan` varchar(10) default NULL,
  `type` varchar(4) default NULL,
  `warehouse` varchar(4) default NULL,
  `warehouse2` varchar(4) default NULL,
  `remark` varchar(100) default NULL,
  `itemstring` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO test_exchange VALUES('13121400', '2013-12-14', 'mains', 'none', '0001', '0000', 'none', '0001+500');
INSERT INTO test_exchange VALUES('13121401', '2013-12-14', 'mains', 'none', '0001', '0000', 'none', '0001+120');
INSERT INTO test_exchange VALUES('13121402', '2013-12-14', 'mains', 'none', '0000', '0001', 'none', '0001+120');
INSERT INTO test_exchange VALUES('13121403', '2013-12-14', 'mains', 'none', '0000', '0001', 'none', '0001+120');
INSERT INTO test_exchange VALUES('13121404', '2013-12-14', 'mains', 'none', '0000', '0001', 'none', '0001+120');
INSERT INTO test_exchange VALUES('13121405', '2013-12-14', 'mains', 'none', '0000', '0001', 'none', '0001+120');
INSERT INTO test_exchange VALUES('13121406', '2013-12-14', 'mains', 'none', '0001', '0000', 'test', '0001+360');
INSERT INTO test_exchange VALUES('13121407', '2013-12-14', 'mains', 'none', '0001', '0000', 'test', '0001+160');
INSERT INTO test_exchange VALUES('13121800', '2013-12-18', 'mains', 'none', '0000', '0001', '', '5365+30');
INSERT INTO test_exchange VALUES('13121801', '2013-12-18', 'mains', 'none', '0000', '0001', '', '5365+30');
INSERT INTO test_exchange VALUES('13121802', '2013-12-18', 'mains', 'none', '0001', '0000', 'test', '1008+200');
INSERT INTO test_exchange VALUES('13122300', '2013-12-23', 'mains', 'none', '0000', '0001', '', '1008+10');
INSERT INTO test_exchange VALUES('13122301', '2013-12-23', 'mains', 'none', '0000', '0001', '', '5365+30');
INSERT INTO test_exchange VALUES('13122302', '2013-12-23', 'mains', 'none', '0000', '0003', '', '1008+90');



DROP TABLE IF EXISTS test_inout;
CREATE TABLE `test_inout` (
  `id` varchar(8) NOT NULL,
  `item` varchar(4) default NULL,
  `num` int(4) default NULL,
  `price` float(8,2) default NULL,
  `receipt` varchar(8) default NULL,
  `type` varchar(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO test_inout VALUES('13121100', '0001', '120', '12344.45', '13121100', '3');
INSERT INTO test_inout VALUES('13121101', '0002', '222', '222.00', '13121100', '3');
INSERT INTO test_inout VALUES('13121102', '0003', '3333', '333.00', '13121100', '3');
INSERT INTO test_inout VALUES('13121103', '0001', '120', '12344.45', '13121101', '3');
INSERT INTO test_inout VALUES('13121104', '0002', '222', '222.00', '13121101', '3');
INSERT INTO test_inout VALUES('13121105', '0003', '3333', '333.00', '13121101', '3');
INSERT INTO test_inout VALUES('13121106', '0001', '250', '123.00', '13121102', '3');
INSERT INTO test_inout VALUES('13121107', '0002', '200', '1222.00', '13121102', '3');
INSERT INTO test_inout VALUES('13121108', '0003', '1111', '1231.00', '13121102', '3');
INSERT INTO test_inout VALUES('13121109', '0001', '250', '123.00', '13121103', '3');
INSERT INTO test_inout VALUES('13121110', '0002', '200', '1222.00', '13121103', '3');
INSERT INTO test_inout VALUES('13121111', '0003', '1111', '1231.00', '13121103', '3');
INSERT INTO test_inout VALUES('13121112', '0001', '120', '20.00', '13121104', '3');
INSERT INTO test_inout VALUES('13121113', '0002', '144', '0.00', '13121104', '3');
INSERT INTO test_inout VALUES('13121114', '0003', '666', '0.00', '13121104', '3');
INSERT INTO test_inout VALUES('13121115', '0001', '100', '10.00', '13121105', '5');
INSERT INTO test_inout VALUES('13121116', '0002', '200', '20.00', '13121105', '5');
INSERT INTO test_inout VALUES('13121117', '0003', '300', '30.00', '13121105', '5');
INSERT INTO test_inout VALUES('13121118', '0004', '400', '40.00', '13121105', '5');
INSERT INTO test_inout VALUES('13121400', '0001', '500', '0.00', '13121400', 'none');
INSERT INTO test_inout VALUES('13121401', '0001', '120', '0.00', '13121401', 'none');
INSERT INTO test_inout VALUES('13121402', '0001', '120', '0.00', '13121403', 'none');
INSERT INTO test_inout VALUES('13121403', '0001', '120', '0.00', '13121404', 'none');
INSERT INTO test_inout VALUES('13121404', '0001', '120', '0.00', '13121405', 'none');
INSERT INTO test_inout VALUES('13121405', '0001', '360', '0.00', '13121406', 'none');
INSERT INTO test_inout VALUES('13121406', '0001', '160', '0.00', '13121407', 'none');
INSERT INTO test_inout VALUES('13121700', '1008', '500', '50.55', '13121700', '4');
INSERT INTO test_inout VALUES('13121800', '0001', '15', '29.99', '13121800', '4');
INSERT INTO test_inout VALUES('13121801', '5365', '90', '59.99', '13121800', '4');
INSERT INTO test_inout VALUES('13121802', '5365', '30', '0.00', '13121800', 'none');
INSERT INTO test_inout VALUES('13121803', '5365', '30', '0.00', '13121801', 'none');
INSERT INTO test_inout VALUES('13121804', '1008', '200', '0.00', '13121802', 'none');
INSERT INTO test_inout VALUES('13122300', '1008', '10', '0.00', '13122300', 'none');
INSERT INTO test_inout VALUES('13122301', '5365', '30', '0.00', '13122301', 'none');
INSERT INTO test_inout VALUES('13122302', '1008', '90', '0.00', '13122302', 'none');
INSERT INTO test_inout VALUES('13122700', '0001', '1', '1.00', '13122700', '4');
INSERT INTO test_inout VALUES('13122701', '0001', '6', '6.00', '13122701', '3');



DROP TABLE IF EXISTS test_receipt;
CREATE TABLE `test_receipt` (
  `id` varchar(8) NOT NULL,
  `date` date default NULL,
  `yewuyuan` varchar(10) default NULL,
  `type` varchar(4) default NULL,
  `company` varchar(4) default NULL,
  `warehouse` varchar(4) default NULL,
  `remark` varchar(100) default NULL,
  `itemstring` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO test_receipt VALUES('13121101', '2013-12-11', 'mains', '3', '0000', '0000', 'none', '0001+120+12344.45|0002+222+222|0003+3333+333');
INSERT INTO test_receipt VALUES('13121100', '2013-12-11', 'mains', '3', '0000', '0000', 'none', '0001+120+12344.45|0002+222+222|0003+3333+333');
INSERT INTO test_receipt VALUES('13121102', '2013-12-11', 'mains', '3', '0000', '0000', '', '0001+250+123|0002+200+1222|0003+1111+1231');
INSERT INTO test_receipt VALUES('13121103', '2013-12-11', 'mains', '3', '0000', '0000', '', '0001+250+123|0002+200+1222|0003+1111+1231');
INSERT INTO test_receipt VALUES('13121104', '2013-12-11', 'mains', '3', '0000', '0000', 'none', '0001+120+20.00|0002+144+0.00|0003+666+0.00');
INSERT INTO test_receipt VALUES('13121105', '2013-12-11', 'mains', '5', '0001', '0001', '??', '0001+100+10|0002+200+20|0003+300+30|0004+400+40');
INSERT INTO test_receipt VALUES('13121400', '2013-12-14', 'mains', '4', '0000', '0001', '', '0001+500+0.33');
INSERT INTO test_receipt VALUES('13121401', '2013-12-14', 'mains', '3', '0000', '0002', '', '0001+500+1.33');
INSERT INTO test_receipt VALUES('13121700', '2013-12-17', 'mains', '4', '0000', '0001', 'none', '1008+500+50.55');
INSERT INTO test_receipt VALUES('13121800', '2013-12-18', 'mains', '4', '0006', '0000', 'none', '0001+15+29.99|5365+90+59.99');
INSERT INTO test_receipt VALUES('13122700', '2013-12-27', 'mains', '4', '0006', '0000', 'test', '0001+1+1');
INSERT INTO test_receipt VALUES('13122701', '2013-12-27', 'mains', '3', '0000', '0000', 'test', '0001+6+6.00');



