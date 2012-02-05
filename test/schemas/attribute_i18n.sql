DROP TABLE IF EXISTS `attribute_i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_i18n` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `name_abbr` varchar(128) NOT NULL,
  `name_translit` varchar(255) NOT NULL,
  `slug` varchar(132) NOT NULL,
  `description` text,
  `culture` varchar(7) NOT NULL,
  PRIMARY KEY (`id`,`culture`),
  UNIQUE KEY `attribute_i18n_U_1` (`slug`,`culture`),
  CONSTRAINT `attribute_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `attribute` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `attribute_i18n` WRITE;
/*!40000 ALTER TABLE `attribute_i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_i18n` ENABLE KEYS */;
UNLOCK TABLES;
