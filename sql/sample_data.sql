-- Dumping data for table `user`
LOCK TABLES `user` WRITE;
INSERT INTO `user`
  (`id`, `name`, `created_at`, `updated_at`, `deleted_at`)
VALUES
  (1,'Giovanni',NOW(),NOW(),NULL),
  (2,'Alessia',NOW(),NOW(),NULL),
  (3,'PHP',NOW(),NOW(),NULL),
  (4,'Demo',NOW(),NOW(),NULL);
UNLOCK TABLES;
