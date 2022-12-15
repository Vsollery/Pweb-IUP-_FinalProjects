--
-- Table structure for table `renew`
--

DROP TABLE IF EXISTS `renew`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `renew` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL,
  PRIMARY KEY (`RollNo`,`BookId`),
  KEY `BookId` (`BookId`),
  CONSTRAINT `renew_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`),
  CONSTRAINT `renew_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `renew`
--

LOCK TABLES `renew` WRITE;
/*!40000 ALTER TABLE `renew` DISABLE KEYS */;
INSERT INTO `renew` VALUES ('denta12',2);
/*!40000 ALTER TABLE `renew` ENABLE KEYS */;
UNLOCK TABLES;


