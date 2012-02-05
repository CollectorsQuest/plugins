DROP TABLE IF EXISTS `cms_slot_i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_slot_i18n` (
  `id` int(11) NOT NULL,
  `contents` text,
  `culture` varchar(7) NOT NULL,
  PRIMARY KEY (`id`,`culture`),
  CONSTRAINT `cms_slot_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `cms_slot` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `cms_slot_i18n` WRITE;
/*!40000 ALTER TABLE `cms_slot_i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_slot_i18n` ENABLE KEYS */;
UNLOCK TABLES;
