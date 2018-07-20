CREATE DATABASE  IF NOT EXISTS `eder_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `eder_db`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: eder_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.26-MariaDB

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
-- Table structure for table `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calificacion` (
  `idcalificacion` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `detalle` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idcalificacion`,`users_id`),
  KEY `fk_calificacion_users1_idx` (`users_id`),
  CONSTRAINT `fk_calificacion_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion`
--

LOCK TABLES `calificacion` WRITE;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `calificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `idcomentario` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idcomentario`,`users_id`),
  KEY `fk_comentario_users1_idx` (`users_id`),
  CONSTRAINT `fk_comentario_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (1,10,'hola','2018-07-17'),(2,10,NULL,'2018-07-19');
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracion` (
  `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `titulo1` varchar(250) DEFAULT NULL,
  `titulo2` varchar(250) DEFAULT NULL,
  `somos` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idconfiguracion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT INTO `configuracion` VALUES (4,'METODOLOGÍA APLICABLE PARA PROYECTOS DE IMPLEMENTACIÓN TECNOLÓGICA','METODOLOGÍA EDER','En esta parte se llena una pequeña información de quien es el encargado de la pagina, algo asi como un objetivo para que el cliente sepa maso. esto es editable');
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`iddocumento`,`users_id`),
  KEY `fk_documento_users1_idx` (`users_id`),
  CONSTRAINT `fk_documento_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foro`
--

DROP TABLE IF EXISTS `foro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foro` (
  `idforo` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `tema` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado_del` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idforo`,`users_id`),
  KEY `fk_foro_users1_idx` (`users_id`),
  CONSTRAINT `fk_foro_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foro`
--

LOCK TABLES `foro` WRITE;
/*!40000 ALTER TABLE `foro` DISABLE KEYS */;
INSERT INTO `foro` VALUES (1,10,'sdjfklsdjfl','2010-12-12',NULL);
/*!40000 ALTER TABLE `foro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informacion_eder`
--

DROP TABLE IF EXISTS `informacion_eder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informacion_eder` (
  `idinformacion_eder` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `detalle` varchar(10000) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado_del` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idinformacion_eder`,`users_id`),
  KEY `fk_informacion_eder_users1_idx` (`users_id`),
  CONSTRAINT `fk_informacion_eder_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informacion_eder`
--

LOCK TABLES `informacion_eder` WRITE;
/*!40000 ALTER TABLE `informacion_eder` DISABLE KEYS */;
INSERT INTO `informacion_eder` VALUES (94,10,'Primer Contenido','<p style=\"margin-bottom: 20px; font-family: Raleway, Arial, Helvetica, sans-serif;\">La metodología EDER es un diseño para soluciones de infraestructura aplicable a proyectos de implementación tecnológica, se la ha identificado con el acrónimo EDER por las siglas de las fases que la conforman: Estudio, Diseño, Ejecución y Revisión.</p><h3>ESTUDIO</h3><p style=\"margin-bottom: 20px; font-family: Raleway, Arial, Helvetica, sans-serif; text-align: justify;\">Una infraestructura tecnológica tiene como objetivo satisfacer las necesidades de negocio de una organización, de tal forma que los procesos se vuelvan más eficientes, facilitando las comunicaciones y el intercambio de información. En esta etapa se plantean dos actividades.</p><div style=\"font-family: Raleway, Arial, Helvetica, sans-serif; padding-left: 16.5px;\"><h4>ANÁLISIS DE LA ORGANIZACIÓN</h4><p style=\"margin-bottom: 20px; text-align: justify;\">El trabajo comienza analizando todos los componentes de la organización, así como los requisitos que les permitan alcanzar los objetivos organizacionales, ya que la infraestructura es siempre parte de un sistema mayor.</p><h4>ANÁLISIS DE LOS REQUISITOS</h4><p style=\"margin-bottom: 20px; text-align: justify;\">Se centra e intensifica especialmente los aspectos de servicio de comunicación, soporte a la información, servicios de procesamiento de datos, entre otros.</p></div>',0,'2018-07-20','A'),(95,11,'Segundo contenido','<h3>DISEÑO</h3><p style=\"margin-bottom: 20px; font-family: Raleway, Arial, Helvetica, sans-serif;\">Traduce los requisitos en una representación técnica de la infraestructura a implantarse, considerando la calidad (normas, estándares, entre otros) requerida antes que comience la ejecución. Se debe estipular una arquitectura que sea robusta pero flexible, de tal forma que permita cambios en el futuro. Se detallarán claramente l as características de los componentes de hardware y software que se integrarán. Será necesario determinar en esta etapa un cronograma de trabajo que contemple desde la ejecución hasta el proceso de pruebas respectivas.</p><h3>EJECUCIÓN</h3><p style=\"margin-bottom: 20px; font-family: Raleway, Arial, Helvetica, sans-serif;\">Se desarrolla partiendo del diseño de la solución. Se debe implementar en base a la arquitectura proyectada en la fase anterior, integrando los diferentes componentes de hardware y software, y siguiendo estándares de calidad de acuerdo a los componentes y actividades planificadas.</p><h3>REVISIÓN</h3><p style=\"margin-bottom: 20px; font-family: Raleway, Arial, Helvetica, sans-serif;\">Para Morales y Cedeño (2017) la revisión es una fase que también comprende dos actividades, cuya finalidad es verificar el correcto funcionamiento de la solución de infraestructura tecnológica desarrollada, tanto en ambiente no productivo, como en producción. Las actividades son.</p><div style=\"font-family: Raleway, Arial, Helvetica, sans-serif; padding-left: 16.5px;\"><h4>PRUEBAS EN FRÍO</h4><p style=\"margin-bottom: 20px;\">Son verificaciones de acuerdo a diferentes tipos de pruebas planificadas para comprobar la integración de cada uno de los diferentes componentes como parte de la solución propuesta.</p><h4>PRUEBAS EN CALIENTE</h4><p style=\"margin-bottom: 20px;\">Son verificaciones basadas en métricas que se planifican para verificar el correcto funcionamiento de la solución en ambiente de producción. Se establece de antemano un periodo de tiempo prudencial que permitirá corregir errores (de darse) y finalizar con la aceptación a satisfacción del cliente.&nbsp;<br><br>El análisis general, permite determinar que la propuesta de la metodología EDER, proporciona procesos claros y pertinentes en la aplicación de proyectos de infraestructura tecnológica, siendo en los procesos “estudio” y “revisión” un poco más exigente para la culminación exitosa de la propuesta. El alto porcentaje obtenido en la etapa de ejecución, muestra que la mayoría de propuestas enfoca o centran su realización en el desarrollo del trabajo, EDER como alternativa, determina la importancia en establecer de manera clara el estudio de la investigación, antes de su ejecución que, de acuerdo a los autores, propende al aseguramiento del éxito de todo proyecto de investigación tecnológica.</p></div>',0,'2018-07-15','A'),(98,10,'Prueba de las listas','<hr id=\"null\"><blockquote style=\"text-align: center;\"><div style=\"text-align: left;\"><ol><li>Esta es parte de la infomación de la pagina jajajajajajaja<br></li><li>Segunda parte de la lista de prueba<br></li><li>Tercera parte de la lista de prueba<br></li><li>esta es otra partecita también<br></li><li>la cosa es la siguiente jajajajaj no se que mas ponerle a esa vaina loca<br></li></ol></div></blockquote><hr id=\"null\"><span style=\"font-family: tahoma, sans-serif; color: rgb(11, 83, 148); font-size: large;\">Esto es otro lado de la pagina que quiero que se muestre</span><div><div><hr id=\"null\"><div><ul style=\"margin-top:0cm\" type=\"disc\">\n <li class=\"MsoNormal\" style=\"color:black;margin-bottom:0cm;margin-bottom:.0001pt;\n     line-height:normal;mso-list:l0 level1 lfo1\"><span lang=\"ES-VE\" style=\"font-size: small;\">Gerente de\n     Proyecto: Responsable de identificación, priorización y seguimiento de\n     riesgos, proponer acciones para afrontar los riesgos identificados. <o:p></o:p></span></li>\n <li class=\"MsoNormal\" style=\"color:black;margin-bottom:0cm;margin-bottom:.0001pt;\n     line-height:normal;mso-list:l0 level1 lfo1\"><span lang=\"ES-VE\" style=\"font-size: small;\">Jefe de Producto:\n     Aprobar acciones propuestas para mitigar los riesgos. Aprobar el\n     presupuesto para Riesgos de Gestión. <o:p></o:p></span></li>\n <li class=\"MsoNormal\" style=\"color:black;margin-bottom:0cm;margin-bottom:.0001pt;\n     line-height:normal;mso-list:l0 level1 lfo1\"><span lang=\"ES-VE\"><span style=\"font-size: small;\">Equipo de Trabajo:\n     Responsable asesoramiento de riesgos, identificación de los riesgos.</span><o:p></o:p></span></li>\n</ul></div></div></div>',0,'2018-07-20','A'),(99,10,'Titulo 3','<hr id=\"null\"><blockquote style=\"text-align: center;\"><div style=\"text-align: left;\"><ul><li><span style=\"font-style: normal; font-family: verdana, sans-serif;\">fasdadfadf<br></span></li><li><span style=\"font-style: normal; font-family: verdana, sans-serif;\">fadsadsfadfda<br></span></li><li><span style=\"font-style: normal; font-family: verdana, sans-serif;\">fadsfadfasdfadsf<br></span></li><li><span style=\"font-style: normal; font-family: verdana, sans-serif;\">asdfadfadfasdfasdf<br></span></li><li><span style=\"font-style: normal; font-family: verdana, sans-serif;\">adsadfasdfadfadfadf<br></span></li><li><span style=\"font-style: normal; font-family: verdana, sans-serif;\">fasasdfadsfadfadf<br></span></li><li><span style=\"font-style: normal; font-family: verdana, sans-serif;\">dfdsfadsfadfadf<br></span></li><li><span style=\"font-style: normal; font-family: verdana, sans-serif;\">adfasdaddfa</span><br></li><li><span style=\"font-style: normal; font-family: verdana, sans-serif;\">cristhian es una peraa</span></li></ul></div></blockquote>',0,'2018-07-20','A');
/*!40000 ALTER TABLE `informacion_eder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(150) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `institucion` varchar(200) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Holger','Vidal',NULL,'M','ESTA ES LA INSTITUCIÓN','AQ','2018-07-04'),(2,'bbb','bbb','bbb','M','bb','bb','2014-02-02'),(3,'nnnn','nnn','nnn','M','nnn','nnnn','2011-12-12'),(4,'holger','vidal','333333','M','esto es la institucion','ES','2018-12-31'),(5,'HOLGER','VIDAL','123','M','ESPAM MFL','US','2018-07-18'),(6,'Adrian','Vidal','12121212','M','ESPAM MFL','ES','2018-07-24'),(7,'holgervidalnosequemaspornerleaesto','lodemasescincidencia','121212','M','sdfsadfasdf','ES','2018-07-19'),(8,'Holger Adrian','Vidal Falcones','1315139484','M','espam','ES','2017-12-31'),(9,'sdfasdf','adsfasdf','asdfadf','M','asdfasdf','ES','2018-07-12'),(10,'Holger Andres','Vidal Loor','1315136789','F','xzczxc','DZ','2018-07-19'),(11,'asdASDAS','DFADF','retert','M','ertert','ES','2018-07-11'),(13,'asdasdas','asdasd',NULL,'M','asdasd','ES','2018-07-13'),(14,'ggggggg','gggggggg','ggg','F','sdfsdf','ES','2018-07-19'),(15,'Holger Adrian','Vidal Falcones',NULL,'M','ESPAM','ES','2018-07-03'),(16,'safsdf','adfadf',NULL,'M',NULL,'ES',NULL),(17,'safsdf','adfadf',NULL,'M',NULL,'ES',NULL);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta` (
  `idrespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `idforo` int(11) NOT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado_del` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrespuesta`,`users_id`,`idforo`),
  KEY `fk_respuesta_foro1_idx` (`idforo`),
  KEY `fk_respuesta_users1_idx` (`users_id`),
  CONSTRAINT `fk_respuesta_foro1` FOREIGN KEY (`idforo`) REFERENCES `foro` (`idforo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_respuesta_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta_comentario`
--

DROP TABLE IF EXISTS `respuesta_comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta_comentario` (
  `idrespuesta_comentario` int(11) NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  `idcomentario` int(11) NOT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idrespuesta_comentario`,`users_id`,`idcomentario`),
  KEY `fk_respuesta_comentario_comentario1_idx` (`idcomentario`),
  KEY `fk_respuesta_comentario_users1_idx` (`users_id`),
  CONSTRAINT `fk_respuesta_comentario_comentario1` FOREIGN KEY (`idcomentario`) REFERENCES `comentario` (`idcomentario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_respuesta_comentario_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta_comentario`
--

LOCK TABLES `respuesta_comentario` WRITE;
/*!40000 ALTER TABLE `respuesta_comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta_comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `idtipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Administrador'),(2,'Usuario');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idtipo_usuario` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fecha_confirmacion` date DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`idtipo_usuario`,`idpersona`),
  KEY `fk_users_tipo_usuario1_idx` (`idtipo_usuario`),
  KEY `fk_users_persona1_idx` (`idpersona`),
  CONSTRAINT `fk_users_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_tipo_usuario1` FOREIGN KEY (`idtipo_usuario`) REFERENCES `tipo_usuario` (`idtipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10,1,1,NULL,NULL,'avatar/2.png','HolgerVidal','holgervidal91@gmail.com','$2y$10$VOo5bP7NnDv9sC7EonDe2u79V6SSECVX8B3/d6Zo6uPBVYgKxZ9tG','eEujObnArbWZhd7DTNdUtWtdE2VSccHIxIsh39DbyZVrSKxF2G3yH56mk8R5','2018-07-15 05:30:36','2018-07-21 00:17:38'),(11,1,1,NULL,NULL,'avatar/1.png','AdrianVidal','adrian@gmail.com','$2y$10$PpGaRuDMj6Ubgep6OXCCcuiPCDH9CziSpi9RAnFIEnlZEeRuwwtiS','gzvXrmGAqxB53MegLUDiNrCwPLwGNrCBwLyD2KNpfFMpw08QCACqoXDX3BW0','2018-07-15 05:31:27','2018-07-15 05:31:27'),(12,2,1,NULL,NULL,'avatar/1.png','holgervidalnosequemaspornerleaestolodemasescincidencia','aaaa@gmail.com','$2y$10$LlPwlv9r/ZdW7SBALK7lR.5bx/GLQ/5kdgZFDx3VdbHqp7jAy.iu.','LUJIHK8SSer7l6VZxxKrIbxLfyKp587jtG67Dl1lCxs8UBWmvC3rP3W8A9i1','2018-07-15 06:17:33','2018-07-15 06:17:33'),(13,2,1,NULL,NULL,'avatar/1.png','HolgerVidal','holgervidal91@hotmail.com','$2y$10$v1ce/n7P3abTIQJvDUVr1OUu3tt4OmZrO.3eClmeOAfOVmXybxjN6','NpasJpkoQKdL5Owqe65pHcAZLma2K0MR3Hpahx2yfkQsBHYKmf0BBwl3Bcfu','2018-07-16 20:08:48','2018-07-16 20:08:48'),(14,2,1,NULL,NULL,'avatar/1.png','sdfasdfadsfasdf','xx@gmail.com','$2y$10$TLZGxfaIIYRpvYNMNgEFUO2UPg8rKgfX75BmCfTbZAuIA6qKEE1b.','g87rNlM4aJAtCWzBVOStPHTA3E3AkNA2mgJTfVMZbglRekshJOshNkx9Zu24','2018-07-17 03:50:08','2018-07-17 03:50:08'),(15,2,1,NULL,NULL,'avatar/1.png','zxcxczzxczxc','ss@gmail.com','$2y$10$3GHj9AETa3rr2yusxi45a.ZHoGM8THFaYfH9WrYSnDEE/.LFxpAxm','mYWPBpB2ByR8Tsfz2vg4dcPsU1zTG4XXBFhY7T4CPgCzSUXVKPX9aBnE9OME','2018-07-17 03:51:15','2018-07-17 03:51:15'),(16,2,1,NULL,NULL,'avatar/1.png','asdASDASDFADF','hh@gmail.com','$2y$10$H3sotpxSvrfE8BwbYOPb0eBb15fO6R6XNslrgGh5nGe01De8G4XG2','avr8wnb1UyvyCw40L5jDUdrknYCJt1FBkLqiTPjR0rv2sqcbNHDmbYQSAv10','2018-07-17 08:54:54','2018-07-17 08:54:54'),(17,2,1,NULL,NULL,'avatar/1.png','sdfsdfdsfsdsdfdfsdf','sadf@gmail.com','$2y$10$kfwfLmTdCAm6qvZj.lZ9yO3qGA2.lvRs90y/hIXTxGN1AqMWTz2tW','wGz2fiPxvXU0l9YBHupFZQQvwBNINtEHmqntC25PmOG4HbWyZKzFnaUp8G4d','2018-07-17 09:13:01','2018-07-17 09:13:01'),(18,2,1,NULL,NULL,'avatar/0.png','asdasdasasdasd','fff@gamil.com','$2y$10$L5VEmoNEztqCgFP3ZMeQ5OWuiDeTdvFOgZMRcnjSMEConLBJwo4ee','dvw2WQVJMzl3ed1k1l8eTf3WjOnQNdRNOtG9rU2cm0nwq7IEbcrUuL4N7106','2018-07-19 20:25:23','2018-07-19 20:25:23'),(19,2,1,NULL,NULL,'avatar/0.png','ggggggggggggggg','ffff@gmail.com','$2y$10$4R6AwDgdLoqkEI1fevVPlu1/vJgLx3Ba6StEmdbSQ9klRNAY4rmKG','TS8gkSJoDSyCrMOZeg0nniwsPTqi2gTAWGrTSLrrlYe1nInKWi4F2GTOlPvQ','2018-07-19 20:28:43','2018-07-19 20:28:43'),(20,2,15,NULL,NULL,'avatar/1.png','HolgerVidal','julio@gmail.com','$2y$10$of5uPGTw/wm.5B/3FMxY1OWu3.mQyIh4twEoI6wsJQuxoW/08rD72','Cj54fN4XH57v9NohZ0xiAlL6Yp2lYoBUTJgbE0PehhbaTyY1swA3Yc7zZKMj','2018-07-19 23:44:08','2018-07-20 00:19:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visita`
--

DROP TABLE IF EXISTS `visita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visita` (
  `idvisita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`idvisita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visita`
--

LOCK TABLES `visita` WRITE;
/*!40000 ALTER TABLE `visita` DISABLE KEYS */;
/*!40000 ALTER TABLE `visita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voto`
--

DROP TABLE IF EXISTS `voto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voto` (
  `idvoto` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `idrespuesta` int(11) NOT NULL,
  `detalle` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idvoto`,`users_id`,`idrespuesta`),
  KEY `fk_voto_respuesta1_idx` (`idrespuesta`),
  KEY `fk_voto_users1_idx` (`users_id`),
  CONSTRAINT `fk_voto_respuesta1` FOREIGN KEY (`idrespuesta`) REFERENCES `respuesta` (`idrespuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_voto_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voto`
--

LOCK TABLES `voto` WRITE;
/*!40000 ALTER TABLE `voto` DISABLE KEYS */;
/*!40000 ALTER TABLE `voto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-20 17:25:49
