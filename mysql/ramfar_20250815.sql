-- MariaDB dump 10.19  Distrib 10.11.8-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ramfar
-- ------------------------------------------------------
-- Server version	10.11.8-MariaDB-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `coment` varchar(1000) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` VALUES
(1,'2012-08-04 16:42:21',' Andres','andreshelou@gmail.com','Hola','B'),
(2,'2012-08-04 16:52:33',' asd','asdhotm@ail.vom','as','B'),
(3,'2012-08-13 00:55:14',' Guillermo Coerezza','coerezzaguillermo@yahoo.com.ar','Hola tengo un consultorio radiologico dental en un departamento chico de 2 ambientes en Belgrano.recepcion/sala de espera, sala de rayos y sala de revelado. Necesito obtener algunas fotografias profesionales ( para la pagina web y para un folleto) del consultorio. La idea de poder hacer esta sesion ','B'),
(4,'2012-08-13 22:40:38',' Melisa','melisaxxi@hotmail.com','Hola! Quisiera saber cuál es el costo de un book profesional? ofrecen el servicio de peinado y maquillaje?\r\n\r\nAguardo tu respuesta!\r\n\r\nGracias,\r\n\r\nMelisa.','B'),
(5,'2012-08-13 22:53:28',' hola','andreshelou@gmail.com','njdjd','B'),
(6,'2012-08-14 20:46:08',' nadia','nadiavillacorta@hotmail.com','yo busco y no lo encuentro en google y siempre es importante para el escuela jajja nunca lo encuento jajjaj\r\n','B'),
(7,'2012-11-29 18:47:20',' Danila','daniela89@hotmail.com','Cual es el precio del book?','B'),
(8,'2013-03-26 14:39:07',' eve','denis722@hotmail.com','hola me pueden cotizar un book por favor, gracias.','B'),
(9,'2013-04-04 01:14:27',' carlos herzberg','carlosherzberg@yahoo.com.ar','Hola  : nos  vimos en  la muestra de  pasaje  865,  \" pintar con  luz \" es  una metafora  que  los  que trabajamos  con  vidrio  usamos  mucho.  me gustaron  mucho  3  fotos  de  tu  pagina:  paisaje  con  rio,  amanecer o  atardecer ,  rrrelampago,  perdon  si  los titulos  son  inexactos, te  invito  a que  mires mi pagina  y  me  critiques  saludos.       www.carlosherzberg@yahoo.com.ar','B'),
(10,'2013-05-21 17:32:22',' Laura','laura.peredman@yahoo.com.ar','Hola, como estan?\r\nMe interesaría saber presupuesto para un book de fotos en estudio o exterior y que incluye.\r\nSoy acrtiz recien llegada a Buenos Aires y necesito un porfolio profesional para mandar a castineras y agencias.\r\nAguardo a su respuesta.\r\nMuchas gracias,saludos\r\nLaura Peredman\r\n','B'),
(11,'2014-05-09 00:12:41',' HOLA','HOLA@GMAIL.COM','HOLA','B'),
(12,'2014-07-29 22:09:38',' yftf','jkjhy@gmail.com','yughui','B'),
(13,'2015-06-24 16:23:40',' Andres','andreshelou@gmail.com','Hola','B'),
(14,'2015-06-24 16:32:03',' Andres','andreshelou@gmail.com','Hola','B'),
(15,'2018-06-01 14:39:04',' Evelyn Ramírez Farf','Veoteveo@hotmail.com','Hola consulta','B'),
(16,'2019-04-05 15:21:47',' Gjhhjj','Fghjhg@hjhgk.com','Fjogfjhhkjh','B'),
(17,'2020-02-13 05:29:19',' Rubén Everts','rudaverts93@gmail.com','Saludos. Mi nombre es Rubén Everts y vengo de Venezuela. Tengo 27 años y cuento con más de 7 años de experiencia en el rubro de la fotografía y 3 en producción audiovisual. Si están interesados enviarme un correo para mandarles mi portafolio y CV. Saludos','N'),
(18,'2024-03-22 17:47:19',' Eve','Denis722@hotmail.com ','Hola busco trabajo?','N'),
(19,'2024-05-11 08:28:20',' TimothySkirl','djstimothy45@gmail.com','Hola, \r\n \r\nServidor de mÃºsica privado 0DAY MP3/FLAC https://0daymusic.org \r\n \r\nALGUNOS DETALLES SOBRE LA CUENTA PREMIUM: \r\n* MÃ©todo de pago del revendedor: AltCoins, Webmoney, Perfect Money. \r\n* Elija el mÃ©todo de pago: BitCoin, Transferencia bancaria, Western Union. \r\n* Capacidad del servidor: 347 TB MP3, FLAC, LIVESETS, Videos Musicales. \r\n* Soporte: FTP, FTPS (Protocolo seguro de transferencia de archivos), SFTP y HTTP, HTTPS. \r\n* Plazo de entrega de la cuenta: 1 a 48 horas. \r\n*MÃ¡s 15 aÃ±os De Archivos. \r\n* Velocidad general del servidor: 1 Gb/s. \r\n* FÃ¡cil de usar: la mayorÃ­a de los gÃ©neros estÃ¡n ordenados por dÃ­as.','N'),
(20,'2024-07-19 13:08:09',' Martin ','rmartinpamio@gmail.com','Hola buen dÃ­a, querÃ­a saber si hacen fotos carnet 3x3 entrega inmediata? Desde ya muchas gracias ','N'),
(21,'2024-08-02 16:09:26',' Cristian Ariel Sosa','cristianarielsosa@outlook.com','Buenas tardes, espero se encuentren bien! QuerÃ­a saber si realizan tomas de fotos personalizadas para subir a distintas redes sociales. Te dejo mi nÃºmero de celu: 1161226499.\r\nAguardo su comentarios! Saludos!','N'),
(22,'2024-11-10 12:29:20',' ','','','N');
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `Type` varchar(40) DEFAULT NULL,
  `size` mediumtext DEFAULT NULL,
  `content` longblob NOT NULL,
  `cliente` varchar(20) DEFAULT NULL,
  `coment` varchar(256) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`file_id`),
  KEY `file_id` (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=540 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES
(477,'PlenarioFUVA2023.Baja.zip','application/x-zip-compressed','27300362','upload/','34','Plenario FUVA 2023 Redes','2023-11-17 01:40:32','N'),
(504,'IeSeVeColaciÃ³n2024.Baja.zip','application/x-zip-compressed','30159572','upload/','26','Acto de ColaciÃ³n IeSeVe 2024 Redes','2024-11-29 02:37:17','Y'),
(506,'IeSeVeColaciÃ³n2024.Alta.zip','application/x-zip-compressed','725953944','upload/','26','Acto de ColaciÃ³n IeSeVe 2024 Alta','2024-11-29 04:05:01','Y'),
(507,'IeSeVeColaciÃ³n2024.Alta1.zip','application/x-zip-compressed','725954226','upload/','34','Acto de ColaciÃ³n IeSeVe 2024 Alta','2024-11-29 13:46:12','N'),
(508,'InauguraciÃ³nTemp-LaReja2024-25.Redes.zip','application/x-zip-compressed','116979124','upload/','26','InauraciÃ³n Temporada La Reja 2024-25-Redes','2024-12-01 20:54:00','Y'),
(511,'InauguraciÃ³nTemp-LaReja2024-25.Alta-2.zip','application/x-zip-compressed','680587336','upload/','26','2Â° InauguraciÃ³n Temporada La Reja 2024-25-Alta','2024-12-01 23:23:06','Y'),
(512,'InauguraciÃ³nTemp-LaReja2024-25.Alta-3.zip','application/x-zip-compressed','488890167','upload/','26','3Â° InauguraciÃ³n Temporada La Reja 2024-25-Alta','2024-12-01 23:32:20','Y'),
(513,'InauguraciÃ³nTemp-LaReja2024-25.Alta-4.zip','application/x-zip-compressed','293805040','upload/','26','4Â° InauguraciÃ³n Temporada La Reja 2024-25-Alta','2024-12-02 00:36:48','Y'),
(514,'InauguraciÃ³nTemp-LaReja2024-25.Redes.zip','application/x-zip-compressed','116979124','upload/','34','InauguraciÃ³n Temporada La Reja 2024-25-Redes','2024-12-02 02:08:06','Y'),
(539,'AA_AH.pdf','application/pdf','3273418','upload/','1','Prueba_01','2025-01-14 14:03:41',NULL);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logins` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`login_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logins`
--

LOCK TABLES `logins` WRITE;
/*!40000 ALTER TABLE `logins` DISABLE KEYS */;
INSERT INTO `logins` VALUES
(1,1,'2024-12-21 20:45:39'),
(2,19,'2024-12-21 20:46:26'),
(7,1,'2024-12-21 21:53:24'),
(8,1,'2024-12-22 00:17:19'),
(9,1,'2024-12-22 14:48:00'),
(10,1,'2024-12-22 16:56:30'),
(11,19,'2024-12-22 18:16:54'),
(12,1,'2024-12-22 21:16:13'),
(13,1,'2024-12-23 17:42:38'),
(14,1,'2024-12-26 19:33:16'),
(15,1,'2024-12-26 21:33:48'),
(17,1,'2024-12-26 21:53:50'),
(18,1,'2024-12-27 14:59:45'),
(19,1,'2024-12-27 16:23:06'),
(20,1,'2024-12-27 17:15:35'),
(21,1,'2024-12-27 18:00:12'),
(22,1,'2024-12-27 18:03:16'),
(23,19,'2024-12-27 20:51:34'),
(24,1,'2024-12-27 20:52:49'),
(25,1,'2024-12-28 15:17:28'),
(26,1,'2024-12-28 15:55:56'),
(27,1,'2024-12-28 17:25:01'),
(28,19,'2024-12-28 17:27:05'),
(29,1,'2024-12-28 17:27:14'),
(30,1,'2024-12-28 17:29:16'),
(31,1,'2025-01-05 19:39:08'),
(32,1,'2025-01-07 19:24:07'),
(33,1,'2025-01-07 19:26:52'),
(34,19,'2025-01-14 13:11:29'),
(35,1,'2025-01-14 13:33:54'),
(36,19,'2025-01-14 13:35:01'),
(37,1,'2025-01-14 13:59:49'),
(38,19,'2025-01-14 14:00:51'),
(39,1,'2025-01-14 14:02:56'),
(40,19,'2025-01-14 14:04:15'),
(41,19,'2025-01-14 14:42:11'),
(42,54,'2025-01-14 14:42:27'),
(43,1,'2025-01-14 14:42:55'),
(44,1,'2025-01-14 21:40:51'),
(45,19,'2025-01-14 22:36:13'),
(46,54,'2025-01-14 22:49:13'),
(47,1,'2025-01-14 22:49:32'),
(48,1,'2025-01-15 20:37:27'),
(49,1,'2025-02-06 23:06:02'),
(50,1,'2025-02-12 21:49:48'),
(51,1,'2025-02-19 13:39:19'),
(52,1,'2025-02-27 14:27:52'),
(53,1,'2025-06-09 22:16:36'),
(54,1,'2025-07-11 22:09:20'),
(55,1,'2025-08-15 14:26:57'),
(56,1,'2025-08-15 15:15:42');
/*!40000 ALTER TABLE `logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_files`
--

DROP TABLE IF EXISTS `user_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_files` (
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `assigned_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`,`file_id`),
  KEY `file_id` (`file_id`),
  CONSTRAINT `user_files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `user_files_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_files`
--

LOCK TABLES `user_files` WRITE;
/*!40000 ALTER TABLE `user_files` DISABLE KEYS */;
INSERT INTO `user_files` VALUES
(1,477,'2024-12-27 19:19:43'),
(13,477,'2024-12-27 19:19:43'),
(14,477,'2024-12-27 19:19:43'),
(15,477,'2024-12-27 19:19:43'),
(15,512,'2024-12-27 20:50:48'),
(17,477,'2024-12-27 19:19:43'),
(19,477,'2024-12-27 19:19:43'),
(19,504,'2025-01-14 13:34:39'),
(19,506,'2025-01-14 13:34:46'),
(19,507,'2025-01-14 14:00:37'),
(19,508,'2025-01-14 13:34:52'),
(19,539,'2025-01-14 14:04:02'),
(20,477,'2024-12-27 19:19:43'),
(23,477,'2024-12-27 19:19:43'),
(26,477,'2024-12-27 19:19:43'),
(29,477,'2024-12-27 19:19:43'),
(29,512,'2024-12-27 20:50:48');
/*!40000 ALTER TABLE `user_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `passwd` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin` varchar(3) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Evelyn','Ramirez Farfan','ramfar','253cd295ff12d19fbfe908a2262f1106','ramfarfotografia@gmail.com','2012-08-04 16:35:48','ADM',NULL),
(13,'Crónica Sindical','Crónica Sindical','Crónicasindical','393c31b394496799fe768a03861649f8','evitaracingyperon@hotmail.com','2012-08-30 00:06:14',NULL,NULL),
(14,'Turismo','AVVA','ploteosavva','59c8ef0fe43d02c23e80228f263bea99','mbouzasqviajantesvendedores.org.','2012-09-14 12:37:34',NULL,NULL),
(15,'eve','ramfar','eve','f144f74409e11e3d77b71f9c05987757','denis722@hotmail.com','2012-09-15 22:21:23',NULL,NULL),
(17,'Prensa','FUVA','fuva','4abcabcc92a3f6a41dda734da73b048d','srodrigrez@redsocialfuva.org.ar','2012-12-10 12:34:54',NULL,NULL),
(19,'chicoca','chicoca','chicoca','4038b5446fbc206dae98f3f22e9dd917','chicoca','2013-06-19 13:13:37',NULL,NULL),
(20,'Material Prensa','Diarios y Revistas','m_benozzi','56fd1008985972c5aef45458bfdb2ef2','mbenozzi@agea.com.ar','2013-10-02 03:37:59',NULL,NULL),
(21,'Guillermo','Garcia Caliendo','g_garcia.caliendo','12ebf3ad62dd6c79a4be6a9ec43b01cd','garciaguillermo887@gmail.com','2013-10-02 03:43:10',NULL,NULL),
(23,'Nicolás','Barabasqui','nico.barabasqui','12e79d4b51470f32941b0c16820a9ccb','nicolas.barabasqui@icbc.com.ar','2013-10-16 12:58:30',NULL,NULL),
(26,'AVVA','FUVA','AVVA/FUVA','c7f5febae8d0f297db5cbc19287fa389','srodriguez@redsocialfuva.org.ar','2014-08-15 17:52:15',NULL,NULL),
(28,'Daniela','Lisanti','dany.lisanti','869467b5ac03a2125123a7e85c0c221b','lisantidaniela@gmail.com','2015-07-17 03:04:35',NULL,NULL),
(29,'Carolina','Suarez','carosua','a178e5c2de0bbffd3ae24901672c3aaa','carolsua@gmail.com','2015-08-06 01:27:00',NULL,NULL),
(30,'Gremiales','AVVA','gremiales.avva','1b8b84a112d6829771f5725fdc6c8574','jdonda@viajantesvendedores.org.a','2015-10-29 04:19:52',NULL,NULL),
(33,'Campañas','Publicitarios','Campañas','efe09c16947746a907ef07e24185f59a','Campañas@hotmail.com','2017-04-10 14:34:35',NULL,NULL),
(34,'IeSeVe','Prensa','IeSeVe','0096d8c0744582098d50a08d9626d008','larzamendiacultura@hotmail.com','2018-08-11 02:07:01',NULL,NULL),
(35,'Gabriela','Mariela','DichoaMano','02a3eb1327a46c35695abfc40e5c5ed0','dichoamano@gmail.com','2019-06-14 22:35:49',NULL,NULL),
(36,'Publicitaria','Productos','Mago','a2cbcc02ccf73d91dccda54659db7655','ramfarfotografia@gmail.com','2021-11-12 14:37:21',NULL,NULL),
(37,'Agustin','Ponti','Racing','52d0115044c4a9e9f0d980dadc2ac2c9','arponti32gmail.com','2021-11-26 21:30:06',NULL,NULL),
(38,'Lucho','Cejas','LCejas','c1597d7fcc1e353ab7d6cc4c14e651eb','ccarrascal@redsocialfuva.org.ar','2022-04-12 02:32:00',NULL,NULL),
(39,'DRONE','VANT','M_DRONE','98cc7a40c50eb0acab9cff483f40a4fa','ramfarfotografia@gmail.com','2022-09-07 14:25:50',NULL,NULL),
(40,'Material','Crudo','Coberturas','ae4f3ffe5f83dfd8d5fcceb23459cc96','ramfarfotografia@gmail.com','2023-01-31 15:31:35',NULL,NULL),
(41,'Material','Folklore','Folklore','e5e60051d4ad2a59490a9984d10679b1','ramfarfotografia@gmail.com','2023-06-06 01:27:19',NULL,NULL),
(42,'Cobertura','RamFarf','Cobertura','bd719aaa1ea88a020b44e1ea1e028784','ramfarfotografia@gmail.com','2024-06-24 03:32:04',NULL,NULL),
(54,'andrees','andres','andres','faf275e309153a52dfbd3f7744995852','andres@gmail.com','2024-12-27 15:38:31',NULL,NULL);
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

-- Dump completed on 2025-08-15 16:10:11
