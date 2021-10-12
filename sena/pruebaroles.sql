-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: rolesusuarios
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `menuNombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `menuEstado` enum('true','false') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Personas','true'),(2,'Usuarios','true'),(3,'Perfiles','true'),(4,'Menu','true');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opcionesmenu`
--

DROP TABLE IF EXISTS `opcionesmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opcionesmenu` (
  `idOpcionMenu` int(11) NOT NULL AUTO_INCREMENT,
  `opcionMenuNombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `opcionMenuEnlace` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `opcionMenuEstado` enum('true','false') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'true',
  `idMenu` int(11) NOT NULL,
  PRIMARY KEY (`idOpcionMenu`),
  KEY `FK-idMenu-opcionesmenu_idx` (`idMenu`),
  CONSTRAINT `FK-idMenu-opcionesmenu` FOREIGN KEY (`idMenu`) REFERENCES `menus` (`idMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opcionesmenu`
--

LOCK TABLES `opcionesmenu` WRITE;
/*!40000 ALTER TABLE `opcionesmenu` DISABLE KEYS */;
/*!40000 ALTER TABLE `opcionesmenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `personaNombres` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personaApellidos` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personaGenero` enum('Femenino','Masculino') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personaDocumento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'Maria Antonieta d','De las Nieves ','Masculino',123),(2,'Ubaldo Matildo','Fillol Rodriguez','Masculino',12345),(4,'Maxilimiliano','Cortes Glindo','Masculino',51351511);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `rolNombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE KEY `rolNombre` (`rolNombre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (5,'Administrador 1'),(8,'Aprendiz'),(6,'Cliente'),(7,'Instructor');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolesmenu`
--

DROP TABLE IF EXISTS `rolesmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rolesmenu` (
  `idRolMenu` int(11) NOT NULL,
  `rolMenuEstado` enum('activo','Inactivo') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idMenu` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`idRolMenu`),
  KEY `fk_rolesxmenu_roles1_idx` (`idRol`),
  KEY `fk-idMenu-RolesMenu_idx` (`idMenu`),
  CONSTRAINT `fk-idMenu-RolesMenu` FOREIGN KEY (`idMenu`) REFERENCES `menus` (`idMenu`),
  CONSTRAINT `fk-idRol-RolesMenu` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolesmenu`
--

LOCK TABLES `rolesmenu` WRITE;
/*!40000 ALTER TABLE `rolesmenu` DISABLE KEYS */;
/*!40000 ALTER TABLE `rolesmenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioLogin` char(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuarioPassword` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuarioEstado` enum('Activo','Inactivo') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idPersonas` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `login` (`usuarioLogin`),
  UNIQUE KEY `usuarioLogin_2` (`usuarioLogin`),
  KEY `idPersonas` (`idPersonas`),
  KEY `usuarioLogin` (`usuarioLogin`),
  CONSTRAINT `fk-idPersona-usuarios` FOREIGN KEY (`idPersonas`) REFERENCES `personas` (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Maria sdssd','Maria123','Inactivo',1),(2,'Ubaldo','Ubaldo123','Activo',2),(3,'maxi','Maxi123','Activo',4),(6,'Maria','11323232','Activo',1),(12,'Maxi123','Maxi123','Activo',4);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariosroles`
--

DROP TABLE IF EXISTS `usuariosroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariosroles` (
  `idUsuarioRol` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioRolEstado` enum('true','false') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'true',
  `idUsuario` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`idUsuarioRol`),
  UNIQUE KEY `indx-unico-idrol-idusuario-usuarioroles` (`idUsuario`,`idRol`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idRol` (`idRol`),
  CONSTRAINT `usuariosroles_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  CONSTRAINT `usuariosroles_ibfk_2` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariosroles`
--

LOCK TABLES `usuariosroles` WRITE;
/*!40000 ALTER TABLE `usuariosroles` DISABLE KEYS */;
INSERT INTO `usuariosroles` VALUES (13,'true',2,5),(14,'true',2,7),(15,'true',3,5),(16,'true',3,7),(17,'true',12,5),(18,'true',12,7),(27,'true',6,8),(28,'true',6,6),(29,'true',6,5),(30,'true',2,8),(31,'true',2,6);
/*!40000 ALTER TABLE `usuariosroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariosxpersonas`
--

DROP TABLE IF EXISTS `usuariosxpersonas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariosxpersonas` (
  `idusuariosxPersonas` int(11) NOT NULL AUTO_INCREMENT,
  `usuariosxPersonasEstado` enum('true','false') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'true',
  `idPersona` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuariosxPersonas`),
  KEY `fk_usuariosxpersonas_personas1_idx` (`idPersona`),
  KEY `fk_usuariosxpersonas_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `fk_usuariosxpersonas_personas1` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuariosxpersonas_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariosxpersonas`
--

LOCK TABLES `usuariosxpersonas` WRITE;
/*!40000 ALTER TABLE `usuariosxpersonas` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuariosxpersonas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_usuariosroles`
--

DROP TABLE IF EXISTS `view_usuariosroles`;
/*!50001 DROP VIEW IF EXISTS `view_usuariosroles`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_usuariosroles` AS SELECT 
 1 AS `idUsuarioRol`,
 1 AS `usuarioRolEstado`,
 1 AS `idUsuario`,
 1 AS `idRol`,
 1 AS `usuarioLogin`,
 1 AS `usuarioEstado`,
 1 AS `rolNombre`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_usuariosroles`
--

/*!50001 DROP VIEW IF EXISTS `view_usuariosroles`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_usuariosroles` AS select `ur`.`idUsuarioRol` AS `idUsuarioRol`,`ur`.`usuarioRolEstado` AS `usuarioRolEstado`,`ur`.`idUsuario` AS `idUsuario`,`ur`.`idRol` AS `idRol`,`us`.`usuarioLogin` AS `usuarioLogin`,`us`.`usuarioEstado` AS `usuarioEstado`,`ro`.`rolNombre` AS `rolNombre` from ((`usuariosroles` `ur` join `usuarios` `us`) join `roles` `ro`) where `ur`.`idUsuario` = `us`.`idUsuario` and `ur`.`idRol` = `ro`.`idRol` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-22 16:54:55
