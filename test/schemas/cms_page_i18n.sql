DROP TABLE IF EXISTS `cms_page_i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_page_i18n` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `culture` varchar(7) NOT NULL,
  PRIMARY KEY (`id`,`culture`),
  UNIQUE KEY `cms_page_i18n_U_1:` (`slug`,`culture`),
  CONSTRAINT `cms_page_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `cms_page` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `cms_page_i18n` WRITE;
/*!40000 ALTER TABLE `cms_page_i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_page_i18n` ENABLE KEYS */;
UNLOCK TABLES;
