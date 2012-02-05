DROP TABLE IF EXISTS `attribute_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `attribute_date` WRITE;
/*!40000 ALTER TABLE `attribute_date` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_date` ENABLE KEYS */;
UNLOCK TABLES;
