DROP TABLE IF EXISTS `attribute_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `attribute_category` WRITE;
/*!40000 ALTER TABLE `attribute_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_category` ENABLE KEYS */;
UNLOCK TABLES;
