-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: typing
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_U` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_U`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Aroska','$2y$10$jl2zNXcuGs3NeuRSIN094.39UONphr.6pa1gcygQQt5UeybKlpT7O','Lucca Haj Mussi Chella Paranhos Silva','lucca.hmcps@gmail.com'),(2,'SAS','$2y$10$5UHO3uQbjutFTCpcPadQ5O7j3YofhALM3kJyOWlIs.RpIvBskTeHa','Teste2','sas@gmail.com'),(3,'sde','$2y$10$NEsAEOx9pX/fVpvGxg7cDu7hnqk2pkO2Gg/lsW1AOIzMjVCCCtkUG','asd','ed@gmail.com'),(4,'Sees','','kjhj','lucca.hmcps@mail.com'),(5,'re','','erre','sa@mail.com'),(6,'usur','$2y$10$y2bjj1sMGHX8N9weCS8SjePVtyQJ45vYrdYSWq9m5jIHo1pm3Kes6','fdasffdas','email@email.com'),(7,'fer','$2y$10$4lSAceBk.4/lF55PqkZVwOUSBSwdfBSrdo1GflyI8rH6BVOezViX.','Definitivo','sda'),(8,'ABC','$2y$10$PBBrVaFHqXbVsUjonrCs3ugKxs1C4VJ/zJ6sxOcpl7UstJAZglwPW','ABC','abc@abc.com'),(9,'regi','$2y$10$OQCubpR0Ul7GAOQOquu6yuFR8hD5RM6BPoTulUZ0zCZY/BCXp.EKG','regi','regi@regi.com'),(10,'sucesso','$2y$10$mzQdZAghc.eCcQRml8okQOQJRtMUb.k5Gqxw0FYqa3cIzVOJHlX8C','sucesso','sucesso@email.com'),(11,'teste','$2y$10$jIoR3UXrwGUW0aAJNfcDoO9NdYqkSW1rzFGLKPmUso2C8TC3ZDCji','teste','teste@teste.com'),(12,'p2','$2y$10$8Crb7WKF5anTdC6t6zJ6luvC7INcYWwuXM7f0Z102EPLBjbPMY02u','Ssas','sas@sas.com'),(13,'login','$2y$10$zWgbQCsXGap9dSxswxOF0.e.F4PhFBD2bzpdQOKaccIuSxKT9jrjW','login','log@in.com'),(14,'mf','$2y$10$lZtKk4HWf5MP5kDvvFz4Ye8S72jOiCEffxNPbCzWF53/ebh8H/2wy','djxdtykfduktyf','gvccgvcv@sfssdgf.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-27 21:56:19
