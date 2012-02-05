DROP TABLE IF EXISTS `meta_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `parameters` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `meta_tag_U_1` (`url`,`parameters`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `meta_tag` WRITE;
/*!40000 ALTER TABLE `meta_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `meta_tag` ENABLE KEYS */;
UNLOCK TABLES;
