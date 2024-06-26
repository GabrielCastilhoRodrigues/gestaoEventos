-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projetoevento
-- ------------------------------------------------------
-- Server version	8.4.0

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
-- Table structure for table `alunosevento`
--

DROP TABLE IF EXISTS `alunosevento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alunosevento` (
  `alunoseventoid` smallint NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `ra` varchar(15) DEFAULT NULL,
  `codigoevento` varchar(12) NOT NULL,
  `codigoRegistroAluno` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`alunoseventoid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunosevento`
--

LOCK TABLES `alunosevento` WRITE;
/*!40000 ALTER TABLE `alunosevento` DISABLE KEYS */;
INSERT INTO `alunosevento` VALUES (1,'Gab','123','4287770',NULL),(2,'GABRIEL','123456','2132789',NULL),(3,'teste','123465798','2132789',NULL),(4,'Gabriel Castilho Rodrigues','16236110','1629522',NULL);
/*!40000 ALTER TABLE `alunosevento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargo` (
  `cargoid` smallint NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `nivel` tinyint NOT NULL,
  PRIMARY KEY (`cargoid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Admin','Adminstrador dos cadastros',1),(2,'Testee','realiza procedimentos de teste',1),(3,'Coordenador','Coordena as coisa',2);
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento` (
  `eventoid` smallint NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `dataevento` date DEFAULT NULL,
  `localevento` varchar(100) DEFAULT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaFim` time DEFAULT NULL,
  `codigoevento` varchar(12) DEFAULT NULL,
  `funcionarioid` smallint NOT NULL,
  `imagemevento` blob,
  `concluido` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`eventoid`),
  KEY `funcionarioid` (`funcionarioid`),
  CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`funcionarioid`) REFERENCES `funcionario` (`funcionarioid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (3,'Evento 1','2025-01-15','internet','10:00:00','15:00:00','4287770',10,NULL,1),(4,'Evento 2','2025-06-15','faculdade','09:00:00','10:00:00','2132789',10,NULL,1),(5,'Curso avançado de programação em JAVA','2024-06-15','Online - Meet','09:00:00','12:00:00','1560889',10,NULL,0),(6,'Hackatom','2024-06-15','Internet - Teams','10:00:00','18:00:00','1629522',10,NULL,1),(7,'Camp. LOL','2024-06-13','Einstein','17:00:00','22:00:00','1005040',10,NULL,0),(8,'Evento novo','2024-06-16','teasa','09:00:00','18:00:00','3976790',10,NULL,0),(10,'testee','2025-06-16','aaaaaaaaaaaa','10:00:00','11:00:00',NULL,12,NULL,0);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionario` (
  `funcionarioid` smallint NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(16) NOT NULL,
  `cargoid` smallint NOT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `nome_login` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`funcionarioid`),
  KEY `cargoid` (`cargoid`),
  CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`cargoid`) REFERENCES `cargo` (`cargoid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,'Admin','11111111111',1,'560c36b457111aa4684a4fab638dca72','admin',NULL),(10,'gabriel','123456',1,'202cb962ac59075b964b07152d234b70','gab','gab'),(11,'Wallace Felipe Bartolomeu','3421435',1,'202cb962ac59075b964b07152d234b70','wall','wall@'),(12,'gab2','12345679',3,'202cb962ac59075b964b07152d234b70','gab2','gab2'),(13,'a','a',1,'0cc175b9c0f1b6a831c399e269772661','a','a'),(14,'tese','44977585836',1,'202cb962ac59075b964b07152d234b70','teste','teste'),(15,'fadsdf','dfsa',1,'c538216caa7cd857a753c0648e923636','adsfdfs','asdffds'),(16,'asdfafds','fsadfdsa',1,'365ef4bd15656e23133437394b4c0231','sfadsdf','sdfaafds'),(17,'dafsfdas','asdfadfs',3,'68eee0308454ed1e4195554afc6568a7','afdsfda','asdfafds@mail.com'),(18,'afsdfds','44977585836',1,'25f9e794323b453885f5181f1b624d0b','asdfafds','asfdafsd@mail.com');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'projetoevento'
--

--
-- Dumping routines for database 'projetoevento'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-13 22:46:05
