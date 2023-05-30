-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table love-buddy-codeigniter.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.categories: ~2 rows (approximately)
INSERT INTO `categories` (`id`, `name`) VALUES
	(2, 'Seksual'),
	(4, 'Keluarga');

-- Dumping structure for table love-buddy-codeigniter.educations
CREATE TABLE IF NOT EXISTS `educations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.educations: ~1 rows (approximately)
INSERT INTO `educations` (`id`, `state`, `field`, `university`) VALUES
	(2, 'S2', 'Teknik Informatika', 'UNIGA'),
	(3, 'S3', 'Teknik Komputer', 'Harvard');

-- Dumping structure for table love-buddy-codeigniter.features
CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `session_count` int DEFAULT NULL,
  `price` decimal(10,0) unsigned DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.features: ~3 rows (approximately)
INSERT INTO `features` (`id`, `session_count`, `price`, `service`, `duration`) VALUES
	(1, 1, 75000, 'Chat/Voice Call', '1 Sesi 60 menit'),
	(2, 1, 100000, 'Chat/Voice Call/Video Call', '1 Sesi 60 menit'),
	(3, 1, 50000, 'Chat', '1 Sesi 60 menit');

-- Dumping structure for table love-buddy-codeigniter.feedbacks
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.feedbacks: ~0 rows (approximately)
INSERT INTO `feedbacks` (`id`, `email`, `name`, `telephone`, `message`) VALUES
	(3, 'muhafifudin66@gmail.com', 'Muhammad Afifudin', '083866678086', 'Software feedback testing\r\n');

-- Dumping structure for table love-buddy-codeigniter.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.payments: ~1 rows (approximately)
INSERT INTO `payments` (`id`, `image`, `name`, `number`, `admin`) VALUES
	(1, 'logo_bri_new.png', 'BRI Transfer', '997878686', 'Afifudin'),
	(3, 'Logo-BCA-PNG.png', 'BCA Transfer Bank', '45353453', 'Muhammad Arifudin');

-- Dumping structure for table love-buddy-codeigniter.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`) VALUES
	(1, 'Super Admin'),
	(2, 'Users');

-- Dumping structure for table love-buddy-codeigniter.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.services: ~2 rows (approximately)
INSERT INTO `services` (`id`, `name`, `media`, `icon`) VALUES
	(1, 'Voice Call', 'WA', '<i class="bi bi-telephone-inbound-fill"></i>'),
	(2, 'Video Call', 'Gmeet', '<i class="bi bi-person-video"></i>');

-- Dumping structure for table love-buddy-codeigniter.talents
CREATE TABLE IF NOT EXISTS `talents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `rating` decimal(20,6) DEFAULT '0.000000',
  `experience` int DEFAULT NULL,
  `cover` text,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `quote` text,
  `nip` varchar(50) DEFAULT NULL,
  `video` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.talents: ~1 rows (approximately)
INSERT INTO `talents` (`id`, `name`, `rating`, `experience`, `cover`, `summary`, `quote`, `nip`, `video`) VALUES
	(19, 'Sara Middleton2', 0.000000, 72, 'Screenshot_(16)2.png', 'Veronica Lodge (Nica) adalah seorang psikolog klinis lulusan Universitas Universitas Indonesia yang banyak membantu klien anak dan orangtua, remaja, hingga dewasa.', '“There is no health without mental health.”', 'SIPP: 08013-33/1330-12-1-2', 'MKJppZ18FYU');

-- Dumping structure for table love-buddy-codeigniter.talent_has_category
CREATE TABLE IF NOT EXISTS `talent_has_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_talent` bigint unsigned DEFAULT NULL,
  `id_category` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_talent_has_category_talents` (`id_talent`),
  KEY `FK_talent_has_category_categories` (`id_category`),
  CONSTRAINT `FK_talent_has_category_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_talent_has_category_talents` FOREIGN KEY (`id_talent`) REFERENCES `talents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.talent_has_category: ~2 rows (approximately)
INSERT INTO `talent_has_category` (`id`, `id_talent`, `id_category`) VALUES
	(23, 19, 2),
	(25, 19, 4);

-- Dumping structure for table love-buddy-codeigniter.talent_has_education
CREATE TABLE IF NOT EXISTS `talent_has_education` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_education` bigint unsigned DEFAULT NULL,
  `id_talent` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_talent_has_education_talents` (`id_talent`),
  KEY `FK_talent_has_education_educations` (`id_education`),
  CONSTRAINT `FK_talent_has_education_educations` FOREIGN KEY (`id_education`) REFERENCES `educations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_talent_has_education_talents` FOREIGN KEY (`id_talent`) REFERENCES `talents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.talent_has_education: ~2 rows (approximately)
INSERT INTO `talent_has_education` (`id`, `id_education`, `id_talent`) VALUES
	(17, 2, 19),
	(18, 3, 19);

-- Dumping structure for table love-buddy-codeigniter.talent_has_service
CREATE TABLE IF NOT EXISTS `talent_has_service` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_talent` bigint unsigned DEFAULT NULL,
  `id_service` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_talent_has_service_talents` (`id_talent`),
  KEY `FK_talent_has_service_services` (`id_service`),
  CONSTRAINT `FK_talent_has_service_services` FOREIGN KEY (`id_service`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_talent_has_service_talents` FOREIGN KEY (`id_talent`) REFERENCES `talents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.talent_has_service: ~2 rows (approximately)
INSERT INTO `talent_has_service` (`id`, `id_talent`, `id_service`) VALUES
	(18, 19, 1),
	(21, 19, 2);

-- Dumping structure for table love-buddy-codeigniter.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_role` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_roles` (`id_role`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table love-buddy-codeigniter.users: ~7 rows (approximately)
INSERT INTO `users` (`id`, `email`, `name`, `password`, `created_at`, `updated_at`, `id_role`) VALUES
	(4, 'muhafifudin66@gmail.com', 'Muhammad Afifudin', '$2y$10$ZvPVtsWFpViwG.wgji726Oy4mk5zt9.Ohns/2f0l5p0gcPpxt4/0G', '2023-05-15 07:01:32', '2023-05-15 07:01:32', 1),
	(5, 'noxep@mailinator.com', 'Gary Chaney', '$2y$10$GPipiAkOD2VRwG7Y1M2tYuR9Q.DKMyU0rDfZE3XeeOhn09lOtAzmu', '2023-05-15 04:35:55', '2023-05-15 04:35:55', 2),
	(6, 'bosoryz@mailinator.com', 'Clark Payne', '$2y$10$ph2y/bciECPTu8wkpF8VHuGp667ShF.oOk0364ljUMUQAv96OmC/K', '2023-05-15 04:39:01', '2023-05-15 04:39:01', 2),
	(7, 'oneholev@mailinator.com', 'Honorato Armstrong', '$2y$10$hhct6CfYSkxrhA64o7XlJuDVMAhpHCI8G4c9BsV7Zh3zeFbMpk3nm', '2023-05-15 08:03:38', '2023-05-15 08:03:38', 2),
	(8, 'vukobema@mailinator.com', 'Virginia Hendricks', '$2y$10$0j3lHVx4V0iGkoXms62/veGz1U92mO5Ri5uDPkow.DUzsna06vEJ6', '2023-05-15 04:41:02', '2023-05-15 04:41:02', 2),
	(9, 'xacuwinim@mailinator.com', 'OneFlorence Adkins', '$2y$10$KlkRxgG3JTX6PnHJWCjbZul5iRbzF7w9n.Ou1U/Dkg.M03iMX0ibi', '2023-05-15 08:04:40', '2023-05-15 08:04:40', 1),
	(10, 'gafyp@mailinator.com', 'Tara Cleveland', '$2y$10$mFuI6he1DMFBf4R0nNaSBuIe5fuVaNpo8oJBreAGp9JOedjJNEY4q', '2023-05-15 04:46:57', '2023-05-15 04:46:57', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
