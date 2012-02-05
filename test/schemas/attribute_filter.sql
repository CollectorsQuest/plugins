DROP TABLE IF EXISTS `attribute_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_id` int(11) NOT NULL,
  `pattern` varchar(128) NOT NULL,
  `replacement` varchar(128) NOT NULL,
  `limit` tinyint(4) DEFAULT '-1',
  `position` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `attribute_filter_FI_1` (`attribute_id`),
  CONSTRAINT `attribute_filter_FK_1` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `attribute_filter` WRITE;
/*!40000 ALTER TABLE `attribute_filter` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_filter` ENABLE KEYS */;
UNLOCK TABLES;
