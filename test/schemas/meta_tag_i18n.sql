DROP TABLE IF EXISTS `meta_tag_i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_tag_i18n` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `culture` varchar(7) NOT NULL,
  PRIMARY KEY (`id`,`culture`),
  CONSTRAINT `meta_tag_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `meta_tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `meta_tag_i18n` WRITE;
/*!40000 ALTER TABLE `meta_tag_i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `meta_tag_i18n` ENABLE KEYS */;
UNLOCK TABLES;
