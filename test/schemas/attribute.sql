DROP TABLE IF EXISTS `attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `measure_unit_id` int(11) DEFAULT NULL,
  `type` enum('string','text','numeric','date','boolean') NOT NULL DEFAULT 'string',
  `is_special` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `attribute_FI_1` (`measure_unit_id`),
  CONSTRAINT `attribute_FK_1` FOREIGN KEY (`measure_unit_id`) REFERENCES `attribute_measure_unit` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `attribute` WRITE;
/*!40000 ALTER TABLE `attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute` ENABLE KEYS */;
UNLOCK TABLES;
