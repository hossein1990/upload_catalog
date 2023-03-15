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

-- Dumping structure for table catalog.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf32;

-- Dumping data for table catalog.brands: ~12 rows (approximately)
DELETE FROM `brands`;
INSERT INTO `brands` (`id`, `name`) VALUES
	(173, 'FabDecor'),
	(174, 'Entity Apparel'),
	(175, 'Spark Collective'),
	(176, 'Enigma Clothes'),
	(177, 'Temptation'),
	(178, 'Legacy Apparel'),
	(179, 'Fusion Fashion'),
	(180, 'Zigzag Clothing'),
	(181, 'Vintage Home'),
	(182, 'Oasis'),
	(183, 'Monolith'),
	(184, 'Legacy Collective');

-- Dumping structure for table catalog.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- Dumping data for table catalog.categories: ~18 rows (approximately)
DELETE FROM `categories`;

-- Dumping structure for table catalog.colors
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf32;

-- Dumping data for table catalog.colors: ~17 rows (approximately)
DELETE FROM `colors`;

-- Dumping structure for table catalog.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_id` bigint DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `retail_price` double DEFAULT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `color_id` bigint DEFAULT NULL,
  `color_family_id` bigint DEFAULT NULL,
  `size_id` bigint DEFAULT NULL,
  `size_family_id` bigint DEFAULT NULL,
  `occassion` varchar(50) DEFAULT NULL,
  `season` varchar(50) DEFAULT NULL,
  `rating_avg` varchar(5) DEFAULT NULL,
  `rating_count` varchar(5) DEFAULT NULL,
  `active` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_items_colors_2` (`color_id`),
  KEY `FK_items_colors` (`color_family_id`),
  KEY `FK_items_sizes` (`size_id`),
  KEY `FK_items_sizes_2` (`size_family_id`),
  CONSTRAINT `FK_items_colors` FOREIGN KEY (`color_family_id`) REFERENCES `colors` (`id`),
  CONSTRAINT `FK_items_colors_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  CONSTRAINT `FK_items_sizes` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  CONSTRAINT `FK_items_sizes_2` FOREIGN KEY (`size_family_id`) REFERENCES `sizes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf32;

-- Dumping data for table catalog.items: ~40 rows (approximately)
DELETE FROM `items`;

-- Dumping structure for table catalog.itmes_warehouses
CREATE TABLE IF NOT EXISTS `itmes_warehouses` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `warehouses_id` bigint DEFAULT NULL,
  `items_id` bigint DEFAULT NULL,
  `inventory_count` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_itmes_warehouses_warehouses` (`warehouses_id`),
  KEY `FK_itmes_warehouses_items` (`items_id`),
  CONSTRAINT `FK_itmes_warehouses_items` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_itmes_warehouses_warehouses` FOREIGN KEY (`warehouses_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=613 DEFAULT CHARSET=utf32;

-- Dumping data for table catalog.itmes_warehouses: ~0 rows (approximately)
DELETE FROM `itmes_warehouses`;

-- Dumping structure for table catalog.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_id` bigint DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `search_keywords` text,
  `brand_id` bigint unsigned DEFAULT NULL,
  `nr` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id` (`product_id`),
  KEY `FK_products_brands` (`brand_id`),
  KEY `FK_products_categories` (`category_id`),
  CONSTRAINT `FK_products_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `FK_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf32;

-- Dumping data for table catalog.products: ~20 rows (approximately)
DELETE FROM `products`;

-- Dumping structure for table catalog.sizes
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf32;

-- Dumping data for table catalog.sizes: ~0 rows (approximately)
DELETE FROM `sizes`;

-- Dumping structure for table catalog.warehouses
CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

-- Dumping data for table catalog.warehouses: ~0 rows (approximately)
DELETE FROM `warehouses`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
