-- MySQL dump 10.11
--
-- Host: localhost    Database: db_wms
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `table_company`
--

DROP TABLE IF EXISTS `table_company`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
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
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table_company`
--

LOCK TABLES `table_company` WRITE;
/*!40000 ALTER TABLE `table_company` DISABLE KEYS */;
INSERT INTO `table_company` VALUES ('0001','公司B','经销商','李某','123456','123456','123456@123','','','','西北','','',''),('0002','公司C','供应商','王某','123456','123456','','','','','华北','','',''),('0003','公司D','经销商','张某','123456','123456','','','','','东北','','',''),('0000','公司A','经销商','','','','','','','','东北','','',''),('0004','经销商1','经销商','','','','','','','','华中','','',''),('0005','经销商2','经销商','','','','','','','','华南','','',''),('0006','供应商1','供应商','','','','','','','','东北','','',''),('0007','供应商2','供应商','','','','','','','','东南','','',''),('0008','经销商3','经销商','','','','','','','','华南','','',''),('0009','供应商3','供应商','','','','','','','','东南','','','');
/*!40000 ALTER TABLE `table_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_depart`
--

DROP TABLE IF EXISTS `table_depart`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `table_depart` (
  `id` varchar(4) NOT NULL,
  `name` varchar(10) NOT NULL,
  `major` varchar(20) default NULL,
  `phone` varchar(8) default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table_depart`
--

LOCK TABLES `table_depart` WRITE;
/*!40000 ALTER TABLE `table_depart` DISABLE KEYS */;
INSERT INTO `table_depart` VALUES ('0001','市场部','asd','13518aa'),('0002','研发部','asfwaad','351860'),('1003','人力资源部','zang','132xxxxx'),('0000','办公室','王总','88888888'),('9999','Preset','None','0');
/*!40000 ALTER TABLE `table_depart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_employee`
--

DROP TABLE IF EXISTS `table_employee`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
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
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table_employee`
--

LOCK TABLES `table_employee` WRITE;
/*!40000 ALTER TABLE `table_employee` DISABLE KEYS */;
INSERT INTO `table_employee` VALUES ('13112700','张三','女','job1',2147483647,'wuhan','研发部'),('13112900','李四','男','job2',131,'wuhan','研发部'),('13112902','李四','女','job2',131,'wuhan','研发部'),('13113002','测试者','男','职位1',2147483647,'暂定','市场部'),('13112904','李四','男','job2',131,'wuhan','研发部'),('13112901','王五','男','job3',0,'unset','人力资源部'),('13112906','李四','男','job2',131,'wuhan','研发部'),('13112907','李四','男','job2',131,'wuhan','研发部'),('13113004','测试者','男','职位1',2147483647,'暂定','研发部'),('13120200','1','男','1',1,'1','办公室'),('13120201','市场部','女','job4',2147483647,'DEFINED','办公室'),('99999999','None','男','None',0,'None','Preset'),('13121900','张星','男','None',132,'123','办公室');
/*!40000 ALTER TABLE `table_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_itemclassify`
--

DROP TABLE IF EXISTS `table_itemclassify`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `table_itemclassify` (
  `id` varchar(4) NOT NULL,
  `name` varchar(10) default NULL,
  `lowerclass` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table_itemclassify`
--

LOCK TABLES `table_itemclassify` WRITE;
/*!40000 ALTER TABLE `table_itemclassify` DISABLE KEYS */;
INSERT INTO `table_itemclassify` VALUES ('0000','分类A','|小类1|小类2|小类3|小类4'),('0001','分类B','|小类1|小类2|小类3|小类4'),('0002','分类C','|小类A|小类B|小类C|小类D|小类E');
/*!40000 ALTER TABLE `table_itemclassify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_measureunit`
--

DROP TABLE IF EXISTS `table_measureunit`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `table_measureunit` (
  `id` varchar(4) NOT NULL,
  `name` varchar(5) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table_measureunit`
--

LOCK TABLES `table_measureunit` WRITE;
/*!40000 ALTER TABLE `table_measureunit` DISABLE KEYS */;
INSERT INTO `table_measureunit` VALUES ('0000','None'),('0003','箱'),('0004','台'),('0005','件'),('0001','个'),('0002','把'),('0006','包');
/*!40000 ALTER TABLE `table_measureunit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_warehouse`
--

DROP TABLE IF EXISTS `table_warehouse`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `table_warehouse` (
  `id` varchar(4) NOT NULL,
  `name` varchar(10) NOT NULL,
  `fuzeren` varchar(10) default NULL,
  `phone` varchar(8) default NULL,
  `address` varchar(50) default NULL,
  `remark` varchar(50) default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table_warehouse`
--

LOCK TABLES `table_warehouse` WRITE;
/*!40000 ALTER TABLE `table_warehouse` DISABLE KEYS */;
INSERT INTO `table_warehouse` VALUES ('0000','仓库0','张三','12345678','武汉','无'),('0001','仓库1','李四','12345678','',''),('0003','仓库3','XX','123','',''),('0002','仓库2','王五','12345678','','');
/*!40000 ALTER TABLE `table_warehouse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_warehouse_0000`
--

DROP TABLE IF EXISTS `table_warehouse_0000`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `table_warehouse_0000` (
  `id` varchar(8) NOT NULL,
  `num` int(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table_warehouse_0000`
--

LOCK TABLES `table_warehouse_0000` WRITE;
/*!40000 ALTER TABLE `table_warehouse_0000` DISABLE KEYS */;
INSERT INTO `table_warehouse_0000` VALUES ('0001',1010),('0002',300),('0003',6000),('5365',0),('1008',100);
/*!40000 ALTER TABLE `table_warehouse_0000` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_warehouse_0001`
--

DROP TABLE IF EXISTS `table_warehouse_0001`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `table_warehouse_0001` (
  `id` varchar(8) NOT NULL,
  `num` int(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table_warehouse_0001`
--

LOCK TABLES `table_warehouse_0001` WRITE;
/*!40000 ALTER TABLE `table_warehouse_0001` DISABLE KEYS */;
INSERT INTO `table_warehouse_0001` VALUES ('0001',200),('0002',2000),('0003',3000),('1008',310),('5365',90);
/*!40000 ALTER TABLE `table_warehouse_0001` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_warehouse_0002`
--

DROP TABLE IF EXISTS `table_warehouse_0002`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `table_warehouse_0002` (
  `id` varchar(8) NOT NULL,
  `num` int(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table_warehouse_0002`
--

LOCK TABLES `table_warehouse_0002` WRITE;
/*!40000 ALTER TABLE `table_warehouse_0002` DISABLE KEYS */;
INSERT INTO `table_warehouse_0002` VALUES ('0001',500),('0002',2000),('0003',3000);
/*!40000 ALTER TABLE `table_warehouse_0002` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_warehouse_0003`
--

DROP TABLE IF EXISTS `table_warehouse_0003`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `table_warehouse_0003` (
  `id` varchar(8) NOT NULL,
  `num` int(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `table_warehouse_0003`
--

LOCK TABLES `table_warehouse_0003` WRITE;
/*!40000 ALTER TABLE `table_warehouse_0003` DISABLE KEYS */;
INSERT INTO `table_warehouse_0003` VALUES ('0001',1000),('0002',2000),('0003',3000),('1008',90);
/*!40000 ALTER TABLE `table_warehouse_0003` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tb_admin` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `name` varchar(25) NOT NULL default '',
  `pwd` varchar(50) default NULL,
  `authority` varchar(100) default NULL,
  `state` int(4) unsigned zerofill default NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (1,'hust','698d51a19d8a121ce581499d7b701668','1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1',0001),(2,'华小科','d41d8cd98f00b204e9800998ecf8427e','1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1',0001);
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_inout`
--

DROP TABLE IF EXISTS `tb_inout`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tb_inout` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `type` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cost` int(4) NOT NULL,
  PRIMARY KEY  (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_inout`
--

LOCK TABLES `tb_inout` WRITE;
/*!40000 ALTER TABLE `tb_inout` DISABLE KEYS */;
INSERT INTO `tb_inout` VALUES (1,'出库','销售出库',0),(2,'出库','生产领料',0),(3,'出库','领用出库',0),(4,'入库','采购入库',1),(5,'入库','生产入库',0),(6,'入库','领料还回',1),(14,'入库','销售退货',1);
/*!40000 ALTER TABLE `tb_inout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_product`
--

DROP TABLE IF EXISTS `tb_product`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
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
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_product`
--

LOCK TABLES `tb_product` WRITE;
/*!40000 ALTER TABLE `tb_product` DISABLE KEYS */;
INSERT INTO `tb_product` VALUES (8,'分类A','小类1','货品A','0001','A3S5D4FS5','MODEL A','个',1000,500,5,10,'','','2013-12-17'),(2,'分类C','3','足球鞋','1002','41645632163532321','dg414','包',8,5,55,82,'','ftgjt是grey和任何','2013-12-14'),(6,'分类B','小类1','rfg','3245','63398698','28','个',20,120,20,22,'','','2013-12-16'),(4,'分类A','小类2','羽绒服','1008','45325365327865','85','把',55,20,50,60,'product/upimages/4.jpg','rtut6ur5y56','2013-12-15'),(5,'分类D','分类3','手机','1009','45278969869','55','台',200,100,1000,1500,'','ereyrtuy6rtu','2013-12-15'),(7,'分类B','','fgh','5365','535646','55','台',100,80,100,120,'','','2013-12-16'),(9,'分类B','小类1','货品B','0002','1354132','MODEL B','个',1000,100,1,3,'','','2013-12-17'),(10,'分类C','2','货品C','0003','1356','MODEL C','把',8000,200,46,66,'','','2013-12-17'),(11,'分类D','分类1','货品D','0004','123456','MODEL D','件',10000,10,51,111,'','','2013-12-17');
/*!40000 ALTER TABLE `tb_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_check`
--

DROP TABLE IF EXISTS `test_check`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `test_check` (
  `id` varchar(8) NOT NULL,
  `date` varchar(10) default NULL,
  `yewuyuan` varchar(10) default NULL,
  `warehouse` varchar(4) default NULL,
  `remark` varchar(100) default NULL,
  `itemstring` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `test_check`
--

LOCK TABLES `test_check` WRITE;
/*!40000 ALTER TABLE `test_check` DISABLE KEYS */;
INSERT INTO `test_check` VALUES ('13121400','2013-12-14','mains','0000','none','0001+1000+1000|0002+300+300|0003+6000+6000'),('13121401','2013-12-14','mains','0003','test','0001+1000+1000|0002+2000+2000|0003+3000+2000'),('13122300','2013-12-23','mains','0002','','0001+500+500|0002+2000+2000|0003+3000+3000');
/*!40000 ALTER TABLE `test_check` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_exchange`
--

DROP TABLE IF EXISTS `test_exchange`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
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
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `test_exchange`
--

LOCK TABLES `test_exchange` WRITE;
/*!40000 ALTER TABLE `test_exchange` DISABLE KEYS */;
INSERT INTO `test_exchange` VALUES ('13121400','2013-12-14','mains','none','0001','0000','none','0001+500'),('13121401','2013-12-14','mains','none','0001','0000','none','0001+120'),('13121402','2013-12-14','mains','none','0000','0001','none','0001+120'),('13121403','2013-12-14','mains','none','0000','0001','none','0001+120'),('13121404','2013-12-14','mains','none','0000','0001','none','0001+120'),('13121405','2013-12-14','mains','none','0000','0001','none','0001+120'),('13121406','2013-12-14','mains','none','0001','0000','test','0001+360'),('13121407','2013-12-14','mains','none','0001','0000','test','0001+160'),('13121800','2013-12-18','mains','none','0000','0001','','5365+30'),('13121801','2013-12-18','mains','none','0000','0001','','5365+30'),('13121802','2013-12-18','mains','none','0001','0000','test','1008+200'),('13122300','2013-12-23','mains','none','0000','0001','','1008+10'),('13122301','2013-12-23','mains','none','0000','0001','','5365+30'),('13122302','2013-12-23','mains','none','0000','0003','','1008+90');
/*!40000 ALTER TABLE `test_exchange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_inout`
--

DROP TABLE IF EXISTS `test_inout`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `test_inout` (
  `id` varchar(8) NOT NULL,
  `item` varchar(4) default NULL,
  `num` int(4) default NULL,
  `price` float(8,2) default NULL,
  `receipt` varchar(8) default NULL,
  `type` varchar(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `test_inout`
--

LOCK TABLES `test_inout` WRITE;
/*!40000 ALTER TABLE `test_inout` DISABLE KEYS */;
INSERT INTO `test_inout` VALUES ('13121100','0001',120,12344.45,'13121100','3'),('13121101','0002',222,222.00,'13121100','3'),('13121102','0003',3333,333.00,'13121100','3'),('13121103','0001',120,12344.45,'13121101','3'),('13121104','0002',222,222.00,'13121101','3'),('13121105','0003',3333,333.00,'13121101','3'),('13121106','0001',250,123.00,'13121102','3'),('13121107','0002',200,1222.00,'13121102','3'),('13121108','0003',1111,1231.00,'13121102','3'),('13121109','0001',250,123.00,'13121103','3'),('13121110','0002',200,1222.00,'13121103','3'),('13121111','0003',1111,1231.00,'13121103','3'),('13121112','0001',120,20.00,'13121104','3'),('13121113','0002',144,0.00,'13121104','3'),('13121114','0003',666,0.00,'13121104','3'),('13121115','0001',100,10.00,'13121105','5'),('13121116','0002',200,20.00,'13121105','5'),('13121117','0003',300,30.00,'13121105','5'),('13121118','0004',400,40.00,'13121105','5'),('13121400','0001',500,0.00,'13121400','none'),('13121401','0001',120,0.00,'13121401','none'),('13121402','0001',120,0.00,'13121403','none'),('13121403','0001',120,0.00,'13121404','none'),('13121404','0001',120,0.00,'13121405','none'),('13121405','0001',360,0.00,'13121406','none'),('13121406','0001',160,0.00,'13121407','none'),('13121700','1008',500,50.55,'13121700','4'),('13121800','0001',15,29.99,'13121800','4'),('13121801','5365',90,59.99,'13121800','4'),('13121802','5365',30,0.00,'13121800','none'),('13121803','5365',30,0.00,'13121801','none'),('13121804','1008',200,0.00,'13121802','none'),('13122300','1008',10,0.00,'13122300','none'),('13122301','5365',30,0.00,'13122301','none'),('13122302','1008',90,0.00,'13122302','none'),('13122700','0001',1,1.00,'13122700','4'),('13122701','0001',6,6.00,'13122701','3');
/*!40000 ALTER TABLE `test_inout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_receipt`
--

DROP TABLE IF EXISTS `test_receipt`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
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
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `test_receipt`
--

LOCK TABLES `test_receipt` WRITE;
/*!40000 ALTER TABLE `test_receipt` DISABLE KEYS */;
INSERT INTO `test_receipt` VALUES ('13121101','2013-12-11','mains','3','0000','0000','none','0001+120+12344.45|0002+222+222|0003+3333+333'),('13121100','2013-12-11','mains','3','0000','0000','none','0001+120+12344.45|0002+222+222|0003+3333+333'),('13121102','2013-12-11','mains','3','0000','0000','','0001+250+123|0002+200+1222|0003+1111+1231'),('13121103','2013-12-11','mains','3','0000','0000','','0001+250+123|0002+200+1222|0003+1111+1231'),('13121104','2013-12-11','mains','3','0000','0000','none','0001+120+20.00|0002+144+0.00|0003+666+0.00'),('13121105','2013-12-11','mains','5','0001','0001','测试','0001+100+10|0002+200+20|0003+300+30|0004+400+40'),('13121400','2013-12-14','mains','4','0000','0001','','0001+500+0.33'),('13121401','2013-12-14','mains','3','0000','0002','','0001+500+1.33'),('13121700','2013-12-17','mains','4','0000','0001','none','1008+500+50.55'),('13121800','2013-12-18','mains','4','0006','0000','none','0001+15+29.99|5365+90+59.99'),('13122700','2013-12-27','mains','4','0006','0000','test','0001+1+1'),('13122701','2013-12-27','mains','3','0000','0000','test','0001+6+6.00');
/*!40000 ALTER TABLE `test_receipt` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-06  9:26:51
