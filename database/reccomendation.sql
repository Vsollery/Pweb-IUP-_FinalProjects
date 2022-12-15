DROP TABLE IF EXISTS `recommendations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recommendations` (
  `R_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Book_Name` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `RollNo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`R_ID`),
  KEY `RollNo` (`RollNo`),
  CONSTRAINT `recommendations_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recommendations`
--

LOCK TABLES `recommendations` WRITE;
/*!40000 ALTER TABLE `recommendations` DISABLE KEYS */;
INSERT INTO `recommendations` VALUES (null,'The Idiot','Test','denta12');
/*!40000 ALTER TABLE `recommendations` ENABLE KEYS */;
UNLOCK TABLES;


