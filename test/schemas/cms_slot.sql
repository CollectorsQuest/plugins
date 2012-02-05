DROP TABLE IF EXISTS `cms_slot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Text','RichText','Image') DEFAULT 'RichText',
  `name` varchar(64) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `cms_slot` WRITE;
/*!40000 ALTER TABLE `cms_slot` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_slot` ENABLE KEYS */;
UNLOCK TABLES;
