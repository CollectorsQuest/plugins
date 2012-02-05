DROP TABLE IF EXISTS `short_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `short_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text,
  `url_decoded` text,
  `hash` varchar(8) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `is_public` tinyint(1) NOT NULL DEFAULT '1',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `short_url_I_1` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `short_url` WRITE;
/*!40000 ALTER TABLE `short_url` DISABLE KEYS */;
/*!40000 ALTER TABLE `short_url` ENABLE KEYS */;
UNLOCK TABLES;
