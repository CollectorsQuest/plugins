DROP TABLE IF EXISTS `cms_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tree_left` int(11) NOT NULL DEFAULT '0',
  `tree_right` int(11) NOT NULL DEFAULT '0',
  `tree_scope` int(11) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `cms_page` WRITE;
/*!40000 ALTER TABLE `cms_page` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_page` ENABLE KEYS */;
UNLOCK TABLES;
