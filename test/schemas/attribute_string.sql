DROP TABLE IF EXISTS `attribute_string`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_string` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `attribute_string` WRITE;
/*!40000 ALTER TABLE `attribute_string` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_string` ENABLE KEYS */;
UNLOCK TABLES;
