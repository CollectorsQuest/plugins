DROP TABLE IF EXISTS `attribute_numeric`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_numeric` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `attribute_numeric` WRITE;
/*!40000 ALTER TABLE `attribute_numeric` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_numeric` ENABLE KEYS */;
UNLOCK TABLES;
