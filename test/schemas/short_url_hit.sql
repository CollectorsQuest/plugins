DROP TABLE IF EXISTS `short_url_hit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `short_url_hit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_url_id` int(11) NOT NULL,
  `session_id` varchar(32) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `referrer` varchar(255) DEFAULT NULL,
  `is_mobile` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `short_url_hit_FI_1` (`short_url_id`),
  CONSTRAINT `short_url_hit_FK_1` FOREIGN KEY (`short_url_id`) REFERENCES `short_url` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `short_url_hit` WRITE;
/*!40000 ALTER TABLE `short_url_hit` DISABLE KEYS */;
/*!40000 ALTER TABLE `short_url_hit` ENABLE KEYS */;
UNLOCK TABLES;
