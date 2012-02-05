DROP TABLE IF EXISTS `attribute_measure_unit_i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_measure_unit_i18n` (
  `id` int(11) NOT NULL,
  `unit` char(25) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(132) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `culture` varchar(7) NOT NULL,
  PRIMARY KEY (`id`,`culture`),
  UNIQUE KEY `attribute_measure_unit_i18n_U_1` (`slug`,`culture`),
  CONSTRAINT `attribute_measure_unit_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `attribute_measure_unit` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `attribute_measure_unit_i18n` WRITE;
/*!40000 ALTER TABLE `attribute_measure_unit_i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_measure_unit_i18n` ENABLE KEYS */;
UNLOCK TABLES;
