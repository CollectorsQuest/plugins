DROP TABLE IF EXISTS `bookstore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookstore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `location` varchar(128) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `bookstore` WRITE;
/*!40000 ALTER TABLE `bookstore` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookstore` ENABLE KEYS */;
UNLOCK TABLES;
