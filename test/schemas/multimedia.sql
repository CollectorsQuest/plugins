DROP TABLE IF EXISTS `multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` char(64) NOT NULL,
  `model_id` int(11) DEFAULT NULL,
  `type` enum('image','video','pdf') NOT NULL DEFAULT 'image',
  `name` char(128) NOT NULL,
  `slug` char(128) NOT NULL,
  `md5` char(32) NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT '0',
  `position` smallint(5) unsigned DEFAULT '65535',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `multimedia_U_1` (`slug`),
  UNIQUE KEY `multimedia_U_2` (`model`,`model_id`,`md5`),
  KEY `multimedia_I_1` (`model`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `multimedia` WRITE;
/*!40000 ALTER TABLE `multimedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `multimedia` ENABLE KEYS */;
UNLOCK TABLES;
