-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: progetageria
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auteurs`
--

DROP TABLE IF EXISTS `auteurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auteurs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auteurs_publication_id_foreign` (`publication_id`),
  CONSTRAINT `auteurs_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auteurs`
--

LOCK TABLES `auteurs` WRITE;
/*!40000 ALTER TABLE `auteurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `auteurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int unsigned DEFAULT NULL,
  `order` int NOT NULL DEFAULT '1',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compterendus`
--

DROP TABLE IF EXISTS `compterendus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compterendus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `evenement_id` bigint unsigned NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compterendus`
--

LOCK TABLES `compterendus` WRITE;
/*!40000 ALTER TABLE `compterendus` DISABLE KEYS */;
INSERT INTO `compterendus` VALUES (13,52,'ORDRE 1','2022-05-16 11:30:49','2022-05-16 11:30:49');
/*!40000 ALTER TABLE `compterendus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `membre_id` bigint unsigned NOT NULL,
  `contact_id` bigint unsigned NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_membre_id_foreign` (`membre_id`),
  KEY `contacts_contact_id_foreign` (`contact_id`),
  CONSTRAINT `contacts_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  CONSTRAINT `contacts_membre_id_foreign` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_rows` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int unsigned NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),(4,1,'password','password','Password',1,0,0,1,1,0,NULL,4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,6),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),(12,2,'id','number','ID',1,0,0,0,0,0,'{}',1),(13,2,'name','text','Name',1,1,1,1,1,1,'{}',2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),(22,5,'id','text','Id',1,0,0,0,0,0,'{}',1),(23,5,'libelle','text','Libéllé',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',2),(24,5,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(25,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(26,6,'id','text','Id',1,0,0,0,0,0,'{}',1),(27,6,'typeevenement_id','text','Typeevenement Id',1,1,1,1,1,1,'{}',3),(28,6,'intitule','text','Intitulé',1,1,1,1,1,1,'{\"display\":{\"width\":\"6\"}}',4),(29,6,'lieu','text','Lieu',1,1,1,1,1,1,'{\"display\":{\"width\":\"6\"}}',5),(30,6,'date_evenement','date','Date Evenement',1,1,1,1,1,1,'{\"display\":{\"width\":\"6\"}}',6),(31,6,'resume','rich_text_box','Resumé',0,1,1,1,1,1,'{\"display\":{\"width\":\"12\"}}',7),(32,6,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',8),(33,6,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',9),(35,6,'evenement_belongsto_typeevenement_relationship','relationship','Type d\'evenement',1,1,1,1,1,1,'{\"display\":{\"width\":\"6\"},\"model\":\"App\\\\Models\\\\Typeevenement\",\"table\":\"typeevenements\",\"type\":\"belongsTo\",\"column\":\"typeevenement_id\",\"key\":\"id\",\"label\":\"libelle\",\"pivot_table\":\"auteurs\",\"pivot\":\"0\",\"taggable\":\"0\"}',2),(36,7,'id','text','Id',1,0,0,0,0,0,'{}',1),(37,7,'nom','text','Nom',1,1,1,1,1,1,'{\"display\":{\"width\":\"3\"}}',4),(38,7,'prenoms','text','Prénom(s)',1,1,1,1,1,1,'{\"display\":{\"width\":\"3\"}}',5),(39,7,'sexe','select_dropdown','Sexe',1,1,1,1,1,1,'{\"display\":{\"width\":\"3\"},\"default\":\" \",\"options\":{\"\":\"SELECTIONNEZ VOTRE GENERE\",\"M\":\"HOMME\",\"F\":\"FEMME\"}}',6),(40,7,'telephone','text','Telephone',1,1,1,1,1,1,'{\"display\":{\"width\":\"3\"}}',7),(41,7,'email','text','Email',1,1,1,1,1,1,'{\"display\":{\"width\":\"3\"}}',8),(42,7,'specialite','text','Specialité',1,1,1,1,1,1,'{\"display\":{\"width\":\"3\"}}',9),(43,7,'annee_entree','number','Annee d\'entrée',1,1,1,1,1,1,'{\"display\":{\"width\":\"3\"},\"min\":1996}',10),(44,7,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',11),(45,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',12),(46,7,'user_id','text','User Id',1,0,1,1,1,1,'{}',2),(47,7,'membre_belongsto_user_relationship','relationship','Utilisateur',1,0,1,1,1,1,'{\"display\":{\"width\":\"3\"},\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"auteurs\",\"pivot\":\"0\",\"taggable\":\"0\"}',3),(48,8,'id','text','Id',1,0,0,0,0,0,'{}',1),(49,8,'libelle','text','Libéllé',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',2),(50,8,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(51,8,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(52,9,'id','text','Id',1,0,0,0,0,0,'{}',1),(53,9,'titre','text','Titre',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',2),(54,9,'description','text','Description',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',4),(55,9,'logo','image','Logo',0,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',3),(56,9,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',5),(57,9,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(58,10,'id','text','Id',1,0,0,0,0,0,'{}',1),(59,10,'intitule','text','Intitulé',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',2),(60,10,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(61,10,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(62,11,'id','text','Id',1,0,0,0,0,0,'{}',1),(63,11,'titre','text','Titre',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',2),(64,11,'journal','text','Journal',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',3),(65,11,'annee_publication','text','Année Publication',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',4),(66,11,'resume','text_area','Résumé',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',5),(67,11,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',6),(68,11,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(69,12,'id','text','Id',1,0,0,0,0,0,'{}',1),(70,12,'titre','text','Titre',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',4),(71,12,'statut','select_dropdown','Statut',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"},\"options\":{\"\":\"CHOISIR UN STATUT\",\"En cours\":\"En cours\",\"En pause\":\"En pause\",\"Termin\\u00e9\":\"Termin\\u00e9\"}}',5),(72,12,'debut','date','Debut',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',6),(73,12,'fin','date','Fin',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',7),(74,12,'description','text_area','Description',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',8),(75,12,'membre_id','text','Membre Id',1,1,1,1,1,1,'{}',3),(76,12,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',9),(77,12,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',10),(78,12,'projet_belongsto_membre_relationship','relationship','Responsable',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"},\"model\":\"App\\\\Models\\\\Membre\",\"table\":\"membres\",\"type\":\"belongsTo\",\"column\":\"membre_id\",\"key\":\"id\",\"label\":\"nom\",\"pivot_table\":\"auteurs\",\"pivot\":\"0\",\"taggable\":\"0\"}',2),(79,13,'id','text','Id',1,0,0,0,0,0,'{}',1),(80,13,'titre','text','Titre',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',3),(81,13,'type','text','Type',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',4),(82,13,'debut','date','Debut',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',5),(83,13,'fin','date','Fin',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',6),(84,13,'description','text_area','Description',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',8),(85,13,'photo','image','Photo',0,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',7),(86,13,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',9),(87,13,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',10),(88,13,'membre_id','text','Membre Id',1,1,1,1,1,1,'{}',2),(89,13,'offre_belongsto_membre_relationship','relationship','Posté par',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"},\"model\":\"App\\\\Models\\\\Membre\",\"table\":\"membres\",\"type\":\"belongsTo\",\"column\":\"membre_id\",\"key\":\"id\",\"label\":\"nom\",\"pivot_table\":\"auteurs\",\"pivot\":\"0\",\"taggable\":\"0\"}',11),(90,14,'id','text','Id',1,0,0,0,0,0,'{}',1),(91,14,'photo','image','Photo',1,1,1,1,1,1,'{\"display\":{\"width\":\"6\"}}',2),(92,14,'title','text','Titre',1,1,1,1,1,1,'{\"display\":{\"width\":\"6\"}}',3),(93,14,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',4),(94,14,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),(95,15,'id','text','Id',1,0,0,0,0,0,'{}',1),(96,15,'title','text','Titre',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',2),(97,15,'content','rich_text_box','Contenu',1,1,1,1,1,1,'{\"display\":{\"width\":\"12\"}}',4),(98,15,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',5),(99,15,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(100,16,'id','text','Id',1,0,0,0,0,0,'{}',1),(101,16,'title','text','Titre',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',2),(102,16,'value','text','Valeur',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',3),(103,16,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',5),(104,16,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(105,16,'img','image','Image',0,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',4),(106,15,'name','text','Nom',1,1,1,1,1,1,'{\"display\":{\"width\":\"4\"}}',3);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2021-09-08 11:02:37','2021-09-08 11:02:37'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2021-09-08 11:02:38','2021-09-28 12:26:01'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2021-09-08 11:02:38','2021-09-08 11:02:38'),(5,'typeevenements','typeevenements','Type évènement','Type évènements','voyager-check','App\\Models\\Typeevenement',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-09-27 19:59:00','2021-09-27 19:59:00'),(6,'evenements','evenements','Evènement','Evènements','voyager-check','App\\Models\\Evenement',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-09-27 20:11:28','2021-09-27 21:06:06'),(7,'membres','membres','Membre','Membres','voyager-check','App\\Models\\Membre',NULL,'App\\Http\\Controllers\\MembresController',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-09-28 11:25:30','2021-09-28 11:35:36'),(8,'postes','postes','Poste','Postes','voyager-check','App\\Models\\Poste',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-09-28 11:48:10','2021-09-28 11:48:36'),(9,'partenaires','partenaires','Partenaire','Partenaires','voyager-check','App\\Models\\Partenaire',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-09-28 13:37:12','2021-09-28 14:44:33'),(10,'typecontacts','typecontacts','Type de contact','Type de contacts','voyager-check','App\\Models\\Typecontact',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-09-28 14:58:34','2021-09-28 14:58:34'),(11,'publications','publications','Publication','Publications','voyager-check','App\\Models\\Publication',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-09-28 15:11:26','2021-09-28 15:40:41'),(12,'projets','projets','Projet','Projets','voyager-check','App\\Models\\Projet',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-09-28 15:20:34','2021-09-28 15:27:46'),(13,'offres','offres','Offre','Offres','voyager-check','App\\Models\\Offre',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-09-28 16:35:13','2021-09-28 16:38:26'),(14,'sliders','sliders','Slider','Sliders','voyager-check','App\\Models\\Slider',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-10-04 10:39:25','2021-10-04 10:42:41'),(15,'sections','sections','Section','Sections','voyager-check','App\\Models\\Section',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-10-04 10:40:39','2021-10-04 15:44:57'),(16,'information','information','Information','Information','voyager-check','App\\Models\\Information',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-10-04 10:49:30','2021-10-04 15:40:57');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenement_membre`
--

DROP TABLE IF EXISTS `evenement_membre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evenement_membre` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `evenement_id` bigint unsigned NOT NULL,
  `membre_id` bigint unsigned NOT NULL,
  `absence` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('moderateur','participant') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `justificatif` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `evenement_membres_evenement_id_foreign` (`evenement_id`),
  KEY `evenement_membres_membre_id_foreign` (`membre_id`),
  CONSTRAINT `evenement_membre_evenement_id_foreign` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evenement_membres_membre_id_foreign` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenement_membre`
--

LOCK TABLES `evenement_membre` WRITE;
/*!40000 ALTER TABLE `evenement_membre` DISABLE KEYS */;
INSERT INTO `evenement_membre` VALUES (4,11,1,NULL,'2021-10-07 18:12:57','2021-10-07 18:12:57','moderateur',NULL),(5,12,1,1,'2021-10-11 16:32:00','2021-10-11 16:41:17','moderateur',NULL),(6,12,4,1,'2021-10-11 16:35:11','2021-10-11 16:41:38','moderateur',NULL),(7,13,1,1,'2021-12-23 15:12:40','2022-04-11 10:03:52','moderateur',NULL),(8,13,4,1,'2021-12-23 15:13:34','2022-04-11 10:03:45','moderateur',NULL),(9,14,1,0,'2022-01-26 12:06:52','2022-03-02 22:02:33','moderateur',NULL),(10,26,1,NULL,'2022-02-27 12:44:35','2022-02-27 12:44:35','moderateur',NULL),(11,14,5,NULL,'2022-03-02 11:19:47','2022-03-02 11:19:47','moderateur',NULL),(14,14,6,1,'2022-04-11 10:15:22','2022-04-11 10:15:47','moderateur',NULL),(16,27,1,NULL,'2022-04-27 10:25:03','2022-04-27 10:25:03','moderateur',NULL),(17,27,4,NULL,'2022-04-27 10:25:03','2022-04-27 10:25:03','moderateur',NULL),(18,27,5,NULL,'2022-04-27 10:25:03','2022-04-27 10:25:03','moderateur',NULL),(55,30,9,NULL,'2022-04-29 12:15:43','2022-04-29 12:15:43','moderateur',NULL),(61,48,4,0,'2022-04-30 23:33:48','2022-04-30 23:33:48','participant',NULL),(62,48,5,0,'2022-04-30 23:33:48','2022-04-30 23:33:48','participant',NULL),(63,48,6,0,'2022-04-30 23:33:48','2022-04-30 23:33:48','participant',NULL),(64,49,9,NULL,'2022-05-01 01:21:32','2022-05-01 01:21:32','moderateur',NULL),(66,50,9,1,'2022-05-04 15:47:11','2022-05-15 21:09:02','participant','JE SUIS MALADE'),(67,50,7,1,'2022-05-14 20:37:45','2022-05-15 22:02:18','participant','PROBLEME DE FAMILLE'),(74,52,6,0,'2022-05-16 11:32:23','2022-05-16 11:32:23','participant',NULL),(75,52,7,0,'2022-05-16 11:32:23','2022-05-16 11:32:23','participant',NULL),(76,52,9,1,'2022-05-16 11:32:23','2022-05-16 11:34:48','participant','POUR DES RAISON  DES BIZARRES');
/*!40000 ALTER TABLE `evenement_membre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evenements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `typeevenement_id` bigint unsigned NOT NULL,
  `intitule` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_evenement` datetime NOT NULL,
  `resume` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `evenements_intitule_unique` (`intitule`),
  KEY `evenements_typeevenement_id_foreign` (`typeevenement_id`),
  CONSTRAINT `evenements_typeevenement_id_foreign` FOREIGN KEY (`typeevenement_id`) REFERENCES `typeevenements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenements`
--

LOCK TABLES `evenements` WRITE;
/*!40000 ALTER TABLE `evenements` DISABLE KEYS */;
INSERT INTO `evenements` VALUES (11,1,'programme des examens','una','2021-10-01 12:00:00',NULL,'2021-10-07 18:12:57','2021-10-07 18:12:57'),(12,1,'nourriture','cocody','1995-01-01 12:12:00','la nourriture est bonne','2021-10-11 16:32:00','2021-10-11 16:32:00'),(13,1,'la femme autoritaire','adjame','2022-03-12 12:54:00','laisser le libre choix aux femmes de s\'exprimer','2021-12-23 15:12:39','2022-02-27 12:34:20'),(14,1,'le choix des doctorants','una','2022-02-27 12:50:00','Attribuer des thèmes à chaque doctorant','2022-01-26 12:06:52','2022-03-02 11:22:12'),(26,1,'marmitte','una','2022-02-27 12:50:00','choix des marmittes','2022-02-27 12:44:35','2022-02-27 12:44:35'),(27,1,'demo','abobo','2022-03-30 10:27:00','okok','2022-04-27 10:24:35','2022-04-27 10:24:35'),(29,1,'RDV','ABIDJAN','2022-04-29 11:07:00','DANS LA VIE','2022-04-29 11:03:44','2022-04-29 11:03:44'),(30,1,'SALAM','OK COLL','2022-04-01 12:15:00','SALUT LA PLANETE','2022-04-29 12:15:43','2022-04-29 12:15:43'),(46,1,'Danser','abobo','2022-04-15 21:56:00','DDEDE','2022-04-30 21:59:07','2022-04-30 21:59:07'),(48,1,'N1','ABIDJAN','2022-03-28 23:33:00','DE','2022-04-30 23:33:31','2022-04-30 23:33:31'),(49,1,'Ramadan','Mali, Bamako','2022-05-10 01:22:00','La fête du ramadan se déroulera le 2 mai 2022','2022-05-01 01:21:32','2022-05-01 01:21:32'),(50,1,'DEMDE','ABOBO','2022-05-22 15:46:00','LLDOOEDe','2022-05-04 15:46:37','2022-05-14 15:08:23'),(52,1,'AJOURDE','ABOBO','2022-05-10 00:00:00','<p>FICHIER</p>','2022-05-16 11:29:12','2022-05-16 11:41:26');
/*!40000 ALTER TABLE `evenements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fichiers`
--

DROP TABLE IF EXISTS `fichiers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fichiers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `evenement_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fichiers_evenement_id_foreign` (`evenement_id`),
  CONSTRAINT `fichiers_evenement_id_foreign` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fichiers`
--

LOCK TABLES `fichiers` WRITE;
/*!40000 ALTER TABLE `fichiers` DISABLE KEYS */;
INSERT INTO `fichiers` VALUES (5,52,'CAPTURE D\'ECRAN','fichiers/l8JdNXnfNm20220516112958.png','2022-05-16 11:29:58','2022-05-16 11:29:58'),(6,52,'DUSEE','fichiers/yFfdkxVbE420220516113028.png','2022-05-16 11:30:28','2022-05-16 11:30:28');
/*!40000 ALTER TABLE `fichiers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `information_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `information`
--

LOCK TABLES `information` WRITE;
/*!40000 ALTER TABLE `information` DISABLE KEYS */;
INSERT INTO `information` VALUES (1,'email','eria@gmail.com','2021-10-04 10:50:51','2021-10-07 09:55:28',NULL),(3,'logo','log','2021-10-04 15:41:39','2021-10-07 09:52:08','information/October2021/IGRgzQ6o2Ed9jznWwES5.png');
/*!40000 ALTER TABLE `information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (25,'default','{\"uuid\":\"64fe6427-21ea-4e4b-a3b5-8ccfbaf3dbac\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":12:{s:10:\\\"\\u0000*\\u0000membres\\\";a:3:{i:0;s:1:\\\"6\\\";i:1;s:1:\\\"7\\\";i:2;s:1:\\\"9\\\";}s:12:\\\"\\u0000*\\u0000evenement\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:20:\\\"App\\\\Models\\\\Evenement\\\";s:2:\\\"id\\\";i:52;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1652700744,1652700744);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membre_poste`
--

DROP TABLE IF EXISTS `membre_poste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `membre_poste` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `membre_id` bigint unsigned NOT NULL,
  `poste_id` bigint unsigned NOT NULL,
  `debut` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `membre_postes_membre_id_foreign` (`membre_id`),
  KEY `membre_postes_poste_id_foreign` (`poste_id`),
  CONSTRAINT `membre_postes_membre_id_foreign` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`),
  CONSTRAINT `membre_postes_poste_id_foreign` FOREIGN KEY (`poste_id`) REFERENCES `postes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membre_poste`
--

LOCK TABLES `membre_poste` WRITE;
/*!40000 ALTER TABLE `membre_poste` DISABLE KEYS */;
/*!40000 ALTER TABLE `membre_poste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membre_projet`
--

DROP TABLE IF EXISTS `membre_projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `membre_projet` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `membre_id` bigint unsigned NOT NULL,
  `projet_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `membre_projet_membre_id_foreign` (`membre_id`),
  KEY `membre_projet_projet_id_foreign` (`projet_id`),
  CONSTRAINT `membre_projet_membre_id_foreign` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`),
  CONSTRAINT `membre_projet_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membre_projet`
--

LOCK TABLES `membre_projet` WRITE;
/*!40000 ALTER TABLE `membre_projet` DISABLE KEYS */;
/*!40000 ALTER TABLE `membre_projet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membre_publication`
--

DROP TABLE IF EXISTS `membre_publication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `membre_publication` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `membre_id` bigint unsigned NOT NULL,
  `publication_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `membre_publications_membre_id_foreign` (`membre_id`),
  KEY `membre_publications_publication_id_foreign` (`publication_id`),
  CONSTRAINT `membre_publications_membre_id_foreign` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`),
  CONSTRAINT `membre_publications_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membre_publication`
--

LOCK TABLES `membre_publication` WRITE;
/*!40000 ALTER TABLE `membre_publication` DISABLE KEYS */;
/*!40000 ALTER TABLE `membre_publication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membres`
--

DROP TABLE IF EXISTS `membres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `membres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` enum('M','F') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_entree` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `membres_email_unique` (`email`),
  KEY `membres_user_id_foreign` (`user_id`),
  CONSTRAINT `membres_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membres`
--

LOCK TABLES `membres` WRITE;
/*!40000 ALTER TABLE `membres` DISABLE KEYS */;
INSERT INTO `membres` VALUES (1,'BOATRIN','Landrine','F','0777036043','landrineboatrin@gmail.com','Informaticienne de gestion',2022,'2021-09-28 11:34:47','2022-02-27 15:33:45',1),(4,'KOFFI','LAURENT','M','0754545454','koffi@gmail.com','administrateur de base de donnés',2020,'2021-10-07 10:45:25','2021-10-07 10:45:25',3),(5,'zeze','Sylvain','M','0505453212','sylvainzeze@gmail.com','informaticien',2022,'2022-02-27 15:32:56','2022-02-27 16:12:39',4),(6,'Tchimou','Eloge','M','0708994567','elogetchimou@gmail.com','informaticien',2022,'2022-02-27 15:46:48','2022-02-27 15:46:48',5),(7,'Edi','Hilaire','M','0747885543','edihilaire@gmail.com','informaticien',2022,'2022-02-27 15:51:05','2022-02-27 15:51:05',7),(9,'Toto','Toto','M','0788177587','toto@toto.com','Docteur',1996,'2022-04-29 11:11:53','2022-04-29 11:11:53',9);
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2021-09-08 11:02:38','2021-09-08 11:02:38','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,6,'2021-09-08 11:02:39','2021-10-04 10:23:28','voyager.media.index',NULL),(3,1,'Users','','_self','voyager-person',NULL,NULL,5,'2021-09-08 11:02:39','2021-10-04 10:23:27','voyager.users.index',NULL),(4,1,'Roles','','_self','voyager-lock',NULL,NULL,4,'2021-09-08 11:02:39','2021-10-04 10:23:27','voyager.roles.index',NULL),(5,1,'Tools','','_self','voyager-tools',NULL,NULL,7,'2021-09-08 11:02:39','2021-10-04 10:41:55',NULL,NULL),(6,1,'Menu Builder','','_self','voyager-list',NULL,5,1,'2021-09-08 11:02:39','2021-09-27 20:03:25','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,5,2,'2021-09-08 11:02:39','2021-09-27 20:03:25','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,5,3,'2021-09-08 11:02:39','2021-09-27 20:03:26','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,4,'2021-09-08 11:02:39','2021-09-27 20:03:26','voyager.bread.index',NULL),(10,1,'Settings','','_self','voyager-settings',NULL,NULL,8,'2021-09-08 11:02:39','2021-10-04 10:41:55','voyager.settings.index',NULL),(11,1,'Type évènements','','_self','voyager-check',NULL,12,1,'2021-09-27 19:59:00','2021-09-27 20:03:27','voyager.typeevenements.index',NULL),(12,1,'Application','','_self','voyager-activity','#000000',NULL,2,'2021-09-27 20:03:15','2021-09-27 20:03:34',NULL,''),(13,1,'Evenements','','_self','voyager-check',NULL,12,2,'2021-09-27 20:11:28','2021-09-27 21:00:45','voyager.evenements.index',NULL),(14,1,'Membres','','_self','voyager-check',NULL,12,3,'2021-09-28 11:25:31','2021-09-28 11:28:21','voyager.membres.index',NULL),(15,1,'Postes','','_self','voyager-check','#000000',12,4,'2021-09-28 11:48:10','2021-09-28 11:49:30','voyager.postes.index','null'),(16,1,'Partenaires','','_self','voyager-check','#000000',12,5,'2021-09-28 13:37:13','2021-09-28 14:43:15','voyager.partenaires.index','null'),(17,1,'Type de contacts','','_self','voyager-check',NULL,12,6,'2021-09-28 14:58:34','2021-09-28 14:59:15','voyager.typecontacts.index',NULL),(18,1,'Publications','','_self','voyager-check','#000000',12,7,'2021-09-28 15:11:26','2021-09-28 15:12:41','voyager.publications.index','null'),(19,1,'Projets','','_self','voyager-check',NULL,12,8,'2021-09-28 15:20:34','2021-09-28 15:28:06','voyager.projets.index',NULL),(20,1,'Offres','','_self','voyager-check',NULL,12,9,'2021-09-28 16:35:21','2021-09-28 16:46:52','voyager.offres.index',NULL),(21,2,'Accueil','/','_self',NULL,'#000000',NULL,1,'2021-10-04 10:06:09','2021-10-04 10:11:06',NULL,''),(22,2,'A propos','/about','_self',NULL,'#000000',NULL,2,'2021-10-04 10:09:23','2021-10-04 10:11:06',NULL,''),(23,2,'Annuaire','/annuaire','_self',NULL,'#000000',NULL,3,'2021-10-04 10:10:02','2021-10-04 10:11:06',NULL,''),(24,2,'Nos travaux','','_self',NULL,'#000000',NULL,4,'2021-10-04 10:10:37','2021-10-04 10:11:06',NULL,''),(25,2,'Nos publications','/publications','_self',NULL,'#000000',24,1,'2021-10-04 10:11:01','2021-10-04 10:13:51',NULL,''),(26,2,'Nos projets','/projets','_self',NULL,'#000000',24,2,'2021-10-04 10:12:09','2021-10-04 10:14:07',NULL,''),(27,2,'Agenda','','_self',NULL,'#000000',NULL,5,'2021-10-04 10:12:59','2021-10-04 10:14:14',NULL,''),(28,2,'Nos offres','/offres','_self',NULL,'#000000',27,1,'2021-10-04 10:13:18','2021-10-04 10:14:24',NULL,''),(29,2,'Nos évènements','/evenements','_self',NULL,'#000000',27,2,'2021-10-04 10:18:13','2021-10-04 10:18:19',NULL,''),(30,2,'Nous contacter','/contacts-us','_self',NULL,'#000000',NULL,6,'2021-10-04 10:18:55','2022-05-16 11:56:02',NULL,''),(31,1,'Site','','_self','voyager-world','#000000',NULL,3,'2021-10-04 10:19:35','2021-10-04 10:23:27',NULL,''),(32,1,'Sliders','','_self','voyager-check',NULL,31,2,'2021-10-04 10:39:25','2021-10-04 10:50:14','voyager.sliders.index',NULL),(33,1,'Sections','','_self','voyager-check',NULL,31,3,'2021-10-04 10:40:40','2021-10-04 10:50:14','voyager.sections.index',NULL),(34,1,'Information','','_self','voyager-check',NULL,31,1,'2021-10-04 10:49:30','2021-10-04 10:50:14','voyager.information.index',NULL),(35,3,'Tableau','/users/tableau','_self','voyager-bread','#000000',NULL,9,'2021-12-23 10:23:27','2021-12-23 14:20:58',NULL,''),(36,3,'Mes reunions','/reunions','_self','voyager-calendar','#000000',NULL,10,'2021-12-23 10:27:33','2022-04-27 07:15:43',NULL,''),(37,3,'Mes projets','/projet','_self','voyager-book','#000000',NULL,11,'2021-12-23 10:29:02','2022-04-27 07:14:56',NULL,''),(38,3,'Mes publications','/publication','_self','voyager-external','#000000',NULL,12,'2021-12-23 10:30:02','2022-04-27 07:18:56',NULL,''),(39,3,'Mes offres','/offre','_self','voyager-check','#000000',NULL,13,'2021-12-23 10:32:52','2021-12-23 14:22:40',NULL,''),(40,2,'Reunions','/evenements/reunions','_self',NULL,'#000000',27,3,'2022-05-16 11:55:55','2022-05-16 11:56:02',NULL,'');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2021-09-08 11:02:38','2021-09-08 11:02:38'),(2,'site','2021-10-04 10:05:38','2021-10-04 10:05:38'),(3,'back','2021-12-23 10:21:40','2021-12-23 10:21:40');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_000000_add_voyager_user_fields',1),(4,'2016_01_01_000000_create_data_types_table',1),(5,'2016_05_19_173453_create_menu_table',1),(6,'2016_10_21_190000_create_roles_table',1),(7,'2016_10_21_190000_create_settings_table',1),(8,'2016_11_30_135954_create_permission_table',1),(9,'2016_11_30_141208_create_permission_role_table',1),(10,'2016_12_26_201236_data_types__add__server_side',1),(11,'2017_01_13_000000_add_route_to_menu_items_table',1),(12,'2017_01_14_005015_create_translations_table',1),(13,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(14,'2017_03_06_000000_add_controller_to_data_types_table',1),(15,'2017_04_21_000000_add_order_to_data_rows_table',1),(16,'2017_07_05_210000_add_policyname_to_data_types_table',1),(17,'2017_08_05_000000_add_group_to_settings_table',1),(18,'2017_11_26_013050_add_user_role_relationship',1),(19,'2017_11_26_015000_create_user_roles_table',1),(20,'2018_03_11_000000_add_user_settings',1),(21,'2018_03_14_000000_add_details_to_data_types_table',1),(22,'2018_03_16_000000_make_settings_value_nullable',1),(23,'2019_08_19_000000_create_failed_jobs_table',1),(24,'2019_12_14_000001_create_personal_access_tokens_table',1),(25,'2021_08_30_140150_create_typeevenements_table',1),(26,'2021_08_30_140552_create_membres_table',1),(27,'2021_08_30_141131_create_typecontacts_table',1),(28,'2021_08_30_141236_create_postes_table',1),(29,'2021_08_30_141416_create_publications_table',1),(30,'2021_08_30_154128_create_membre_postes_table',1),(31,'2021_08_30_154829_create_contacts_table',1),(32,'2021_08_30_155241_create_membre_publications_table',1),(33,'2021_08_30_155453_create_auteurs_table',1),(34,'2021_08_30_155808_create_evenements_table',1),(35,'2021_08_30_160248_create_evenement_membres_table',1),(36,'2016_01_01_000000_create_pages_table',2),(37,'2016_01_01_000000_create_posts_table',2),(38,'2016_02_15_204651_create_categories_table',2),(39,'2017_04_11_000000_alter_post_nullable_fields_table',2),(40,'2021_09_25_072115_create_offres_table',2),(41,'2021_09_25_072433_create_projets_table',2),(42,'2021_09_25_072732_create_partenaires_table',2),(43,'2021_09_25_074623_create_membre_projet_table',2),(44,'2021_09_26_153849_add_user_id_to_membres_table',2),(45,'2021_09_26_163440_create_taches_table',2),(46,'2021_09_28_162701_add_member_id_to_offres_table',3),(47,'2021_10_04_102448_create_sliders_table',4),(48,'2021_10_04_102654_create_sections_table',4),(49,'2021_10_04_104334_create_information_table',5),(50,'2021_10_04_115505_add_img_to_information_table',6),(51,'2021_10_04_143444_add_name_to_sections_table',6),(52,'2021_10_04_233512_add_role_to_evenement_membres_table',7),(53,'2022_04_29_102216_create_jobs_table',8),(54,'2021_09_28_144106_create_sliders_table',9),(56,'2022_05_13_091229_create_fichiers_table',10),(60,'2022_05_13_200420_create_compterendus_table',11),(62,'2022_05_13_200834_create_rubriques_table',12),(63,'2022_05_14_192623_add_justificatif_to_evenementmembre_table',13),(66,'2022_05_15_212708_add_ondelete_evenement_to_evenement_membre_table',14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offres`
--

DROP TABLE IF EXISTS `offres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('stage','emploi','memoire','these') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `membre_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `offres_titre_unique` (`titre`),
  KEY `offres_membre_id_foreign` (`membre_id`),
  CONSTRAINT `offres_membre_id_foreign` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offres`
--

LOCK TABLES `offres` WRITE;
/*!40000 ALTER TABLE `offres` DISABLE KEYS */;
INSERT INTO `offres` VALUES (2,'stage','admin de base se donnes','2021-10-07','2022-12-17','test',NULL,'2021-10-07 18:10:51','2022-03-02 11:36:05',1),(3,'stage','gestionnaire','2022-01-26','2022-12-26','gérer des stocks dans une entreprise',NULL,'2021-10-11 17:03:34','2022-03-02 11:37:15',1),(19,'stage','assistant comptable','2021-04-05','2022-12-21','L\'assistant comptable / l\'assistante comptable a pour mission les tâches de base en comptabilité notamment les travaux d\'enregistrement comptable. Toutefois ses missions peuvent être plus ou moins étendues selon la structure qui l\'emploie. Le travail en TPE et en cabinet comptable implique généralement plus de responsabilités et de polyvalence.',NULL,'2021-12-23 15:40:47','2022-03-02 11:39:54',1),(20,'emploi','auditeur informatique','2022-01-26','2022-12-24','Il aura pour mission d’analyser, de contrôler et d’optimiser les systèmes de l’entreprise tout en garantissant la qualité des informations transmises.',NULL,'2022-01-26 13:37:16','2022-03-02 11:35:01',1);
/*!40000 ALTER TABLE `offres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partenaires`
--

DROP TABLE IF EXISTS `partenaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partenaires` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `partenaires_titre_unique` (`titre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partenaires`
--

LOCK TABLES `partenaires` WRITE;
/*!40000 ALTER TABLE `partenaires` DISABLE KEYS */;
INSERT INTO `partenaires` VALUES (1,'ORANGE CI','a','partenaires/September2021/cQ5rifnN1pfpPognG3US.jpeg','2021-09-28 14:49:25','2021-09-28 14:49:25'),(2,'MTN CI','tr','partenaires/October2021/V85KYnteknf7QGSiMpVl.jpg','2021-10-07 18:02:29','2021-10-07 18:02:29'),(4,'LANDRINE','DEDE','partenaires/May2022/19F3uOB8zn7ridDRhWVt.png','2022-05-04 15:41:55','2022-05-04 15:41:55');
/*!40000 ALTER TABLE `partenaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2021-09-08 11:02:39','2021-09-08 11:02:39'),(2,'browse_bread',NULL,'2021-09-08 11:02:39','2021-09-08 11:02:39'),(3,'browse_database',NULL,'2021-09-08 11:02:39','2021-09-08 11:02:39'),(4,'browse_media',NULL,'2021-09-08 11:02:39','2021-09-08 11:02:39'),(5,'browse_compass',NULL,'2021-09-08 11:02:39','2021-09-08 11:02:39'),(6,'browse_menus','menus','2021-09-08 11:02:39','2021-09-08 11:02:39'),(7,'read_menus','menus','2021-09-08 11:02:39','2021-09-08 11:02:39'),(8,'edit_menus','menus','2021-09-08 11:02:39','2021-09-08 11:02:39'),(9,'add_menus','menus','2021-09-08 11:02:39','2021-09-08 11:02:39'),(10,'delete_menus','menus','2021-09-08 11:02:39','2021-09-08 11:02:39'),(11,'browse_roles','roles','2021-09-08 11:02:39','2021-09-08 11:02:39'),(12,'read_roles','roles','2021-09-08 11:02:39','2021-09-08 11:02:39'),(13,'edit_roles','roles','2021-09-08 11:02:39','2021-09-08 11:02:39'),(14,'add_roles','roles','2021-09-08 11:02:39','2021-09-08 11:02:39'),(15,'delete_roles','roles','2021-09-08 11:02:39','2021-09-08 11:02:39'),(16,'browse_users','users','2021-09-08 11:02:39','2021-09-08 11:02:39'),(17,'read_users','users','2021-09-08 11:02:39','2021-09-08 11:02:39'),(18,'edit_users','users','2021-09-08 11:02:39','2021-09-08 11:02:39'),(19,'add_users','users','2021-09-08 11:02:39','2021-09-08 11:02:39'),(20,'delete_users','users','2021-09-08 11:02:39','2021-09-08 11:02:39'),(21,'browse_settings','settings','2021-09-08 11:02:39','2021-09-08 11:02:39'),(22,'read_settings','settings','2021-09-08 11:02:39','2021-09-08 11:02:39'),(23,'edit_settings','settings','2021-09-08 11:02:39','2021-09-08 11:02:39'),(24,'add_settings','settings','2021-09-08 11:02:39','2021-09-08 11:02:39'),(25,'delete_settings','settings','2021-09-08 11:02:39','2021-09-08 11:02:39'),(26,'browse_typeevenements','typeevenements','2021-09-27 19:59:00','2021-09-27 19:59:00'),(27,'read_typeevenements','typeevenements','2021-09-27 19:59:00','2021-09-27 19:59:00'),(28,'edit_typeevenements','typeevenements','2021-09-27 19:59:00','2021-09-27 19:59:00'),(29,'add_typeevenements','typeevenements','2021-09-27 19:59:00','2021-09-27 19:59:00'),(30,'delete_typeevenements','typeevenements','2021-09-27 19:59:00','2021-09-27 19:59:00'),(31,'browse_evenements','evenements','2021-09-27 20:11:28','2021-09-27 20:11:28'),(32,'read_evenements','evenements','2021-09-27 20:11:28','2021-09-27 20:11:28'),(33,'edit_evenements','evenements','2021-09-27 20:11:28','2021-09-27 20:11:28'),(34,'add_evenements','evenements','2021-09-27 20:11:28','2021-09-27 20:11:28'),(35,'delete_evenements','evenements','2021-09-27 20:11:28','2021-09-27 20:11:28'),(36,'browse_membres','membres','2021-09-28 11:25:31','2021-09-28 11:25:31'),(37,'read_membres','membres','2021-09-28 11:25:31','2021-09-28 11:25:31'),(38,'edit_membres','membres','2021-09-28 11:25:31','2021-09-28 11:25:31'),(39,'add_membres','membres','2021-09-28 11:25:31','2021-09-28 11:25:31'),(40,'delete_membres','membres','2021-09-28 11:25:31','2021-09-28 11:25:31'),(41,'browse_postes','postes','2021-09-28 11:48:10','2021-09-28 11:48:10'),(42,'read_postes','postes','2021-09-28 11:48:10','2021-09-28 11:48:10'),(43,'edit_postes','postes','2021-09-28 11:48:10','2021-09-28 11:48:10'),(44,'add_postes','postes','2021-09-28 11:48:10','2021-09-28 11:48:10'),(45,'delete_postes','postes','2021-09-28 11:48:10','2021-09-28 11:48:10'),(46,'browse_partenaires','partenaires','2021-09-28 13:37:12','2021-09-28 13:37:12'),(47,'read_partenaires','partenaires','2021-09-28 13:37:12','2021-09-28 13:37:12'),(48,'edit_partenaires','partenaires','2021-09-28 13:37:13','2021-09-28 13:37:13'),(49,'add_partenaires','partenaires','2021-09-28 13:37:13','2021-09-28 13:37:13'),(50,'delete_partenaires','partenaires','2021-09-28 13:37:13','2021-09-28 13:37:13'),(51,'browse_typecontacts','typecontacts','2021-09-28 14:58:34','2021-09-28 14:58:34'),(52,'read_typecontacts','typecontacts','2021-09-28 14:58:34','2021-09-28 14:58:34'),(53,'edit_typecontacts','typecontacts','2021-09-28 14:58:34','2021-09-28 14:58:34'),(54,'add_typecontacts','typecontacts','2021-09-28 14:58:34','2021-09-28 14:58:34'),(55,'delete_typecontacts','typecontacts','2021-09-28 14:58:34','2021-09-28 14:58:34'),(56,'browse_publications','publications','2021-09-28 15:11:26','2021-09-28 15:11:26'),(57,'read_publications','publications','2021-09-28 15:11:26','2021-09-28 15:11:26'),(58,'edit_publications','publications','2021-09-28 15:11:26','2021-09-28 15:11:26'),(59,'add_publications','publications','2021-09-28 15:11:26','2021-09-28 15:11:26'),(60,'delete_publications','publications','2021-09-28 15:11:26','2021-09-28 15:11:26'),(61,'browse_projets','projets','2021-09-28 15:20:34','2021-09-28 15:20:34'),(62,'read_projets','projets','2021-09-28 15:20:34','2021-09-28 15:20:34'),(63,'edit_projets','projets','2021-09-28 15:20:34','2021-09-28 15:20:34'),(64,'add_projets','projets','2021-09-28 15:20:34','2021-09-28 15:20:34'),(65,'delete_projets','projets','2021-09-28 15:20:34','2021-09-28 15:20:34'),(66,'browse_offres','offres','2021-09-28 16:35:19','2021-09-28 16:35:19'),(67,'read_offres','offres','2021-09-28 16:35:19','2021-09-28 16:35:19'),(68,'edit_offres','offres','2021-09-28 16:35:19','2021-09-28 16:35:19'),(69,'add_offres','offres','2021-09-28 16:35:20','2021-09-28 16:35:20'),(70,'delete_offres','offres','2021-09-28 16:35:20','2021-09-28 16:35:20'),(71,'browse_sliders','sliders','2021-10-04 10:39:25','2021-10-04 10:39:25'),(72,'read_sliders','sliders','2021-10-04 10:39:25','2021-10-04 10:39:25'),(73,'edit_sliders','sliders','2021-10-04 10:39:25','2021-10-04 10:39:25'),(74,'add_sliders','sliders','2021-10-04 10:39:25','2021-10-04 10:39:25'),(75,'delete_sliders','sliders','2021-10-04 10:39:25','2021-10-04 10:39:25'),(76,'browse_sections','sections','2021-10-04 10:40:39','2021-10-04 10:40:39'),(77,'read_sections','sections','2021-10-04 10:40:39','2021-10-04 10:40:39'),(78,'edit_sections','sections','2021-10-04 10:40:39','2021-10-04 10:40:39'),(79,'add_sections','sections','2021-10-04 10:40:39','2021-10-04 10:40:39'),(80,'delete_sections','sections','2021-10-04 10:40:40','2021-10-04 10:40:40'),(81,'browse_information','information','2021-10-04 10:49:30','2021-10-04 10:49:30'),(82,'read_information','information','2021-10-04 10:49:30','2021-10-04 10:49:30'),(83,'edit_information','information','2021-10-04 10:49:30','2021-10-04 10:49:30'),(84,'add_information','information','2021-10-04 10:49:30','2021-10-04 10:49:30'),(85,'delete_information','information','2021-10-04 10:49:30','2021-10-04 10:49:30');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postes`
--

DROP TABLE IF EXISTS `postes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `postes_libelle_unique` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postes`
--

LOCK TABLES `postes` WRITE;
/*!40000 ALTER TABLE `postes` DISABLE KEYS */;
INSERT INTO `postes` VALUES (1,'DOCTEUR','2021-09-28 11:49:51','2021-09-28 11:49:51'),(2,'MASTER','2021-09-28 11:49:59','2021-09-28 11:49:59'),(3,'PROFESSEUR','2021-09-28 11:50:09','2021-09-28 11:50:09'),(4,'DOCTORANT','2021-09-28 11:55:53','2021-09-28 11:55:53');
/*!40000 ALTER TABLE `postes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projets`
--

DROP TABLE IF EXISTS `projets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `membre_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statut` enum('En projet','Terminé','En pause','') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projets_titre_unique` (`titre`),
  KEY `projets_membre_id_foreign` (`membre_id`),
  CONSTRAINT `projets_membre_id_foreign` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projets`
--

LOCK TABLES `projets` WRITE;
/*!40000 ALTER TABLE `projets` DISABLE KEYS */;
INSERT INTO `projets` VALUES (1,'le projet AERIA','2022-01-26','2022-01-26','Digitaliser toutes ses activités',1,'2021-09-28 15:29:54','2022-01-26 14:16:05','Terminé'),(4,'CONCEPTION D\'UN SITE POUR L\'UNA','2021-10-09','2022-12-27','un site pour faciliter les inscriptions',1,'2021-10-07 18:17:10','2022-03-02 11:53:55','Terminé'),(5,'construction des dortoires à l\'una','2022-01-26','2022-12-26','construction de  4 batiments',1,'2021-12-23 15:20:49','2022-03-02 11:55:50','Terminé');
/*!40000 ALTER TABLE `projets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `journal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_publication` int unsigned NOT NULL,
  `membre_id` bigint NOT NULL,
  `resume` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `publications_titre_unique` (`titre`),
  KEY `membre_id` (`membre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publications`
--

LOCK TABLES `publications` WRITE;
/*!40000 ALTER TABLE `publications` DISABLE KEYS */;
INSERT INTO `publications` VALUES (3,'intelligence artificielle','CNRS',2021,1,'Sous le terme intelligence artificielle (IA) on regroupe l’ensemble des “ théories et des techniques mises en œuvre en vue de réaliser des machines capables de simuler l\'intelligence.” Cette pratique permet à l’Homme de mettre un système informatique sur la résolution de problématiques complexes intégrant de la logique.','2021-12-23 15:29:49','2021-12-23 15:29:49'),(4,'optimisation du flux du transport','IEEE',2022,1,'nous voulons gerer la fluidité au niveau du transport','2022-01-26 13:49:29','2022-01-26 14:05:49');
/*!40000 ALTER TABLE `publications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2021-09-08 11:02:39','2021-09-08 11:02:39'),(2,'user','Normal User','2021-09-08 11:02:39','2021-09-08 11:02:39');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubriques`
--

DROP TABLE IF EXISTS `rubriques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rubriques` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `compterendu_id` bigint unsigned NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rubriques_compterendu_id_foreign` (`compterendu_id`),
  CONSTRAINT `rubriques_compterendu_id_foreign` FOREIGN KEY (`compterendu_id`) REFERENCES `compterendus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubriques`
--

LOCK TABLES `rubriques` WRITE;
/*!40000 ALTER TABLE `rubriques` DISABLE KEYS */;
INSERT INTO `rubriques` VALUES (16,13,'I.Information','LODIENJDU','2022-05-16 11:31:19','2022-05-16 11:31:19'),(17,13,'II.LLA DEEA','LLDIE','2022-05-16 11:31:32','2022-05-16 11:31:32'),(18,13,'II.VAIId','DLEJIE','2022-05-16 11:31:40','2022-05-16 11:31:40');
/*!40000 ALTER TABLE `rubriques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sections_title_unique` (`title`),
  UNIQUE KEY `sections_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,'A propos','<p>Un texte est une s&eacute;rie orale ou &eacute;crite de mots per&ccedil;us comme constituant un ensemble coh&eacute;rent, porteur de sens et utilisant les structures propres &agrave; une langue. Un texte n\'a pas de longueur d&eacute;termin&eacute;e sauf dans le cas de po&egrave;mes &agrave; forme fixe comme le sonnet ou le ha&iuml;ku.</p>','2021-10-04 12:13:08','2021-10-04 15:51:16','about'),(2,'DEKKDE','<p>KDEKDKEKE ddddddddddddddddddddddddddddddd</p>\r\n<p>&nbsp;</p>\r\n<p>dddddddddddddddddddddddddddd</p>\r\n<p>dddd</p>\r\n<p>d</p>\r\n<p>ddddd</p>','2022-05-03 16:19:11','2022-05-04 15:44:41','DKEEE');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','Site Title','','text',1,'Site'),(2,'site.description','Site Description','Site Description','','text',2,'Site'),(3,'site.logo','Site Logo','','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sliders_photo_unique` (`photo`),
  UNIQUE KEY `sliders_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (2,'sliders\\December2021\\ZSvgji4O0MxHtLIlikIF.jpg','Le portail officiel de L\'ERIA','2021-12-23 16:04:56','2022-02-17 10:01:57');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taches`
--

DROP TABLE IF EXISTS `taches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taches`
--

LOCK TABLES `taches` WRITE;
/*!40000 ALTER TABLE `taches` DISABLE KEYS */;
/*!40000 ALTER TABLE `taches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int unsigned NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typecontacts`
--

DROP TABLE IF EXISTS `typecontacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `typecontacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `typecontacts_intitule_unique` (`intitule`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typecontacts`
--

LOCK TABLES `typecontacts` WRITE;
/*!40000 ALTER TABLE `typecontacts` DISABLE KEYS */;
INSERT INTO `typecontacts` VALUES (1,'Email','2021-09-28 15:01:48','2021-09-28 15:01:48'),(2,'Téléphone','2021-09-28 15:02:05','2021-09-28 15:02:05'),(3,'Facebook','2021-09-28 15:02:39','2021-09-28 15:02:39'),(4,'Skype','2021-09-28 15:02:48','2021-09-28 15:02:48'),(5,'LinkedIn','2021-09-28 15:03:01','2021-09-28 15:03:01'),(6,'WHATSAP','2021-09-28 15:03:51','2021-09-28 15:03:51');
/*!40000 ALTER TABLE `typecontacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeevenements`
--

DROP TABLE IF EXISTS `typeevenements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `typeevenements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `typeevenements_libelle_unique` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeevenements`
--

LOCK TABLES `typeevenements` WRITE;
/*!40000 ALTER TABLE `typeevenements` DISABLE KEYS */;
INSERT INTO `typeevenements` VALUES (1,'REUNION','2021-09-27 20:05:06','2021-09-27 20:05:06'),(2,'SEMINAIRE','2021-09-27 20:05:16','2021-09-27 20:05:16');
/*!40000 ALTER TABLE `typeevenements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Landrine','landrineboatrin@gmail.com','users\\March2022\\GYgbWbOj6byTj1bCMx1a.jpg',NULL,'$2y$10$f5Fd9JIRZhpQTYYUNAGLDOk.lbpOI/WkBjl3Dxx8fnytmum9PIwvC',NULL,'{\"locale\":\"en\"}','2021-09-08 11:05:00','2022-03-03 08:24:32'),(3,2,'koffi','koffi@gmail.com','users/default.png',NULL,'$2y$10$kRorv3BR41q/L//S5MUPUOM72LMFf.CzRHpJxkmGgMCftg6uY7TzW',NULL,'{\"locale\":\"fr\"}','2021-10-07 10:37:43','2021-10-07 10:37:43'),(4,1,'zeze','sylvainzeze@gmail.com','users\\March2022\\lJDyY6DKng4fYIBkrt6h.jpg',NULL,'$2y$10$op1sAmBv3hgKy1vqLxc5EOvYoyRuoTDD9c4Mo6nu2/FVS0Uh.bP/C',NULL,'{\"locale\":\"fr\"}','2022-02-27 15:29:57','2022-03-03 08:33:07'),(5,1,'Tchimou','eulogetchimou@gmail.com','users\\March2022\\YzoET2rax4vs4OTDvdFw.jpg',NULL,'$2y$10$d8Kw6rroai9df5BjYCp8AOyPzFD78ovUgXWUUESUFeNKr65bJj2vi',NULL,'{\"locale\":\"fr\"}','2022-02-27 15:42:36','2022-03-03 08:23:24'),(7,1,'Edi','edihilaire@gmail.com','users\\March2022\\Cw5YdSoLdeNY3ouBtsbr.jpg',NULL,'$2y$10$BU2OeFLtxjMkJoAlyCxnpeFRqaikUwR.vzAaDXP5fXDE3ityjcFy2',NULL,'{\"locale\":\"fr\"}','2022-02-27 15:49:34','2022-03-03 08:22:28'),(9,1,'Toto','toto@toto.com','users/default.png',NULL,'$2y$10$k08Cd5Z.DHY8JfiWYtDMVOy4R.idUQ8SaKplko7u5azdOyvcdc3iK',NULL,'{\"locale\":\"fr\"}','2022-04-29 11:11:04','2022-04-29 11:11:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-16 14:20:17
