-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: blackclover
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Toyota',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(2,'Honda',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(3,'Ford',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(4,'Chevrolet',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(5,'Nissan',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(6,'BMW',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(7,'Mercedes-Benz',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(8,'Audi',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(9,'Hyundai',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(10,'Kia',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(11,'Suzuki',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(12,'Maruti',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(13,'Jaguar',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(14,'Land Rover',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(15,'Jeep',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(16,'Volvo',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(17,'Chevrolet',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(18,'Dodge',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(19,'Lexus',0,'2023-08-04 02:22:00','2023-08-04 02:22:00');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `brand_id` bigint(20) unsigned NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `mileage` double(10,2) NOT NULL,
  `color` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cars_category_id_foreign` (`category_id`),
  KEY `cars_brand_id_foreign` (`brand_id`),
  CONSTRAINT `cars_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `cars_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,2,9,'Corolla','LE',2020,18000.00,30000.50,'White','Gasoline','<p>This 2020 Corolla LE is a        well-maintained sedan that offers a comfortable and reliable driving experience. With only 30,000.5 miles on the odometer, this car has plenty of life left and is ready for its next adventure.</p><p>The exterior of the car is finished in a classic white color that is sure to turn heads. Under the hood, you will find a fuel-efficient gasoline engine that provides plenty of power while still being easy on your wallet at the pump.</p><p>Inside, the car is equipped with all the features you need for a comfortable ride, including air conditioning, power windows and locks, and a great sound system. Don\'t miss your chance to own this fantastic car at an unbeatable price of $18,000.00.</p>','corolla_le.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(2,1,7,'Civic','EX',2019,17000.00,25000.50,'Black','Gasoline','<p>This 2019 Civic EX is a sleek and stylish sedan that offers a smooth and comfortable ride. With only 25,000.5 miles on the odometer, this car is in excellent condition and ready to hit the road.</p><p>The black exterior of the car is sure to turn heads, while the fuel-efficient gasoline engine provides plenty of power without breaking the bank at the pump. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>Don\'t miss your chance to own this fantastic car at an unbeatable price of $17,000.00. Whether you\'re commuting to work or taking a road trip with friends, this Civic EX is the perfect car for all your driving needs.</p>','civic_ex.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(3,1,2,'Civic','Touring',2019,24000.00,30000.75,'Silver','Gasoline','<p>This 2019 Civic Touring is a stylish and feature-packed compact car that delivers an enjoyable driving experience. With 30,000.75 miles on the odometer, this car has been well-cared for and is ready to hit the road.</p><p>The silver exterior of the car exudes sophistication, and the gasoline engine provides a perfect balance of performance and efficiency. Inside, you\'ll find leather seats, a premium sound system, and advanced safety features for added peace of mind.</p><p>Priced at $24,000.00, this Civic Touring offers exceptional value for those seeking a modern and well-equipped compact car.</p>','civic_touring.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(4,3,12,'Accord','LX',2018,16000.00,40000.50,'Silver','Gasoline','<p>This 2018 Accord LX is a reliable and spacious sedan that offers a smooth and comfortable ride. With 40,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The silver exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $16,000.00, this Accord LX is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>','accord_lx.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(5,4,11,'Accord','LX',2018,16000.00,40000.50,'Silver','Gasoline','<p>This 2018 Accord LX is a reliable and spacious sedan that offers a smooth and comfortable ride. With 40,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The silver exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $16,000.00, this Accord LX is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>','accord_lx.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(6,3,11,'Accord','LX',2018,16000.00,40000.50,'Silver','Gasoline','<p>This 2018 Accord LX is a reliable and spacious sedan that offers a smooth and comfortable ride. With 40,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The silver exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $16,000.00, this Accord LX is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>','accord_lx.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(7,4,6,'CR-V','EX-L',2017,21000.00,50000.50,'Green','Gasoline','<p>This 2017 CR-V EX-L is a versatile and reliable SUV that offers a smooth and comfortable ride. With 50,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The green exterior of the car is both eye-catching and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $21,000.00, this CR-V EX-L is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with friends, this car has got you covered.</p>','crv_exl.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(8,4,4,'Pilot','EX-L',2016,22000.00,55000.50,'Gray','Gasoline','<p>This 2016 Pilot EX-L is a spacious and reliable SUV that offers a smooth and comfortable ride. With 55,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The gray exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $22,000.00, this Pilot EX-L is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>','pilot_exl.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(9,4,4,'Odyssey','EX-L',2015,23000.00,60000.50,'Gold','Gasoline','<p>This 2015 Odyssey EX-L is a spacious and reliable minivan that offers a smooth and comfortable ride. With 60,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The gold exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $23,000.00, this Odyssey EX-L is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>','odyssey_exl.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(10,1,1,'Highlander','XLE',2014,24000.00,65000.50,'Silver','Gasoline','<p>This 2014 Highlander XLE is a spacious and reliable SUV that offers a smooth and comfortable ride. With 65,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The silver exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $24,000.00, this Highlander XLE is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>','highlander_xle.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(11,2,9,'Sienna','XLE',2013,25000.00,70000.50,'Bronze','Gasoline','<p>This 2013 Sienna XLE is a spacious and reliable minivan that offers a smooth and comfortable ride. With 70,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The bronze exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $25,000.00, this Sienna XLE is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>','sienna_xle.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(12,1,5,'Sentra','SV',2017,15000.00,45000.25,'Blue','Gasoline','<p>This 2017 Nissan Sentra SV is a practical and fuel-efficient compact car that offers a comfortable ride. With 45,000.25 miles on the odometer, this car is in good condition and is perfect for daily commuting.</p><p>The blue exterior of the car looks refreshing, and the gasoline engine provides reliable performance with good fuel economy. The car features modern conveniences like a touchscreen infotainment system and a rearview camera for added convenience.</p><p>Priced at $15,000.00, this Sentra SV is an affordable and reliable choice for anyone looking for a dependable daily driver.</p>','nissan_sentra_sv.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(13,4,5,'Altima','SR',2019,20000.00,35000.75,'Red','Gasoline','<p>This 2019 Nissan Altima SR is a stylish and well-equipped midsize sedan that offers a balanced combination of performance and comfort. With 35,000.75 miles on the odometer, this car has been well-maintained and is ready for the road ahead.</p><p>The red exterior of the car adds a sporty touch, while the gasoline engine delivers a smooth and efficient ride. Inside, you\'ll find a spacious cabin with modern features like Apple CarPlay, Android Auto, and advanced safety technologies.</p><p>Priced at $20,000.00, this Altima SR is a great choice for those seeking a reliable and feature-rich sedan.</p>','nissan_altima_sr.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(14,4,6,'3 Series','330i',2018,25000.00,40000.50,'Black','Gasoline','<p>This 2018 BMW 3 Series 330i is a luxury sports sedan that delivers a thrilling driving experience. With 40,000.50 miles on the odometer, this car is in excellent condition and offers a perfect balance of performance and comfort.</p><p>The black exterior of the car exudes elegance, and the powerful gasoline engine provides responsive acceleration. Inside, you\'ll find a sophisticated interior with premium materials and cutting-edge technology.</p><p>Priced at $25,000.00, this 3 Series 330i is a great choice for those seeking a high-end sedan with dynamic driving capabilities.</p>','bmw_3_series_330i.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(15,1,6,'X5','xDrive40i',2020,40000.00,25000.25,'White','Gasoline','<p>This 2020 BMW X5 xDrive40i is a premium SUV that combines luxury with versatility. With 25,000.25 miles on the odometer, this SUV is in excellent condition and is capable of handling both city driving and off-road adventures.</p><p>The white exterior of the SUV looks sophisticated, and the powerful gasoline engine provides impressive performance. Inside, you\'ll find a spacious and comfortable cabin with advanced features and technology.</p><p>Priced at $40,000.00, this X5 xDrive40i is a great choice for those in need of a high-end SUV with a blend of luxury and practicality.</p>','bmw_x5_xdrive40i.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(16,1,13,'XE','P300 R-Dynamic',2019,35000.00,30000.75,'Silver','Gasoline','<p>This 2019 Jaguar XE P300 R-Dynamic is a luxurious and powerful sports sedan that offers an exhilarating driving experience. With 30,000.75 miles on the odometer, this car is in excellent condition and promises a thrilling ride.</p><p>The silver exterior of the car exudes elegance and sophistication, while the gasoline engine delivers impressive acceleration and handling. Inside, you\'ll find a refined interior with premium materials and advanced technology.</p><p>Priced at $35,000.00, this XE P300 R-Dynamic is a fantastic choice for those seeking a blend of luxury and performance in a sedan.</p>','jaguar_xe_p300_rdynamic.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(17,4,13,'F-PACE','S',2020,45000.00,20000.50,'Blue','Gasoline','<p>This 2020 Jaguar F-PACE S is a high-performance luxury SUV that delivers both power and sophistication. With 20,000.50 miles on the odometer, this SUV is in pristine condition and is ready to take on any adventure.</p><p>The blue exterior of the SUV looks stunning, and the powerful gasoline engine provides thrilling acceleration and driving dynamics. Inside, you\'ll find a spacious and plush interior with advanced features and infotainment.</p><p>Priced at $45,000.00, this F-PACE S is an excellent choice for those in need of a high-end SUV that excels in both performance and comfort.</p>','jaguar_fpace_s.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(18,1,14,'Range Rover Sport','HSE',2018,50000.00,35000.25,'Black','Gasoline','<p>This 2018 Land Rover Range Rover Sport HSE is a luxury SUV that combines style, performance, and off-road capabilities. With 35,000.25 miles on the odometer, this SUV is in excellent condition and is built to handle both urban roads and challenging terrains.</p><p>The black exterior of the SUV adds a touch of elegance, while the powerful gasoline engine provides exceptional performance and towing capacity. Inside, you\'ll find a spacious and opulent cabin with high-quality materials and advanced technology.</p><p>Priced at $50,000.00, this Range Rover Sport HSE is an outstanding choice for those seeking a premium SUV with unmatched versatility and luxury.</p>','landrover_range_rover_sport_hse.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(19,1,14,'Discovery','SE',2020,55000.00,25000.50,'White','Gasoline','<p>This 2020 Land Rover Discovery SE is a premium SUV that excels in both luxury and practicality. With 25,000.50 miles on the odometer, this SUV is in immaculate condition and is designed to accommodate your family adventures.</p><p>The white exterior of the SUV looks sophisticated, and the powerful gasoline engine provides excellent performance on and off the road. Inside, you\'ll find a well-appointed cabin with spacious seating and advanced safety features.</p><p>Priced at $55,000.00, this Discovery SE is an excellent choice for those in need of a versatile and high-end SUV for all their journeys.</p>','landrover_discovery_se.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(20,2,15,'Wrangler','Sport',2017,28000.00,40000.75,'Red','Gasoline','<p>This 2017 Jeep Wrangler Sport is a rugged and iconic off-road SUV that can conquer any terrain. With 40,000.75 miles on the odometer, this Wrangler is in great condition and is built for outdoor adventures.</p><p>The red exterior of the SUV adds a sense of excitement, while the powerful gasoline engine provides ample torque for off-road driving. Inside, you\'ll find a no-frills interior with durable materials that are easy to clean after a day in the wilderness.</p><p>Priced at $28,000.00, this Wrangler Sport is an excellent choice for those seeking a capable and adventurous SUV.</p>','jeep_wrangler_sport.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(21,2,15,'Grand Cherokee','Limited',2019,35000.00,30000.50,'Silver','Gasoline','<p>This 2019 Jeep Grand Cherokee Limited is a versatile and stylish SUV that provides a smooth and comfortable ride. With 30,000.50 miles on the odometer, this Grand Cherokee is in excellent condition and is perfect for daily commuting and family trips.</p><p>The silver exterior of the SUV looks sleek and modern, while the powerful gasoline engine delivers both efficiency and performance. Inside, you\'ll find a refined cabin with leather seats, a user-friendly infotainment system, and advanced safety features.</p><p>Priced at $35,000.00, this Grand Cherokee Limited is a fantastic choice for those seeking a well-rounded and reliable SUV.</p>','jeep_grand_cherokee_limited.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(22,1,16,'XC60','T5 Inscription',2018,32000.00,35000.25,'Black','Gasoline','<p>This 2018 Volvo XC60 T5 Inscription is a luxurious and safe SUV that offers a comfortable and elegant driving experience. With 35,000.25 miles on the odometer, this XC60 is in excellent condition and is equipped with top-notch safety features.</p><p>The black exterior of the SUV exudes sophistication, while the efficient gasoline engine provides a good balance of power and fuel economy. Inside, you\'ll find a well-designed cabin with premium materials and the latest technology.</p><p>Priced at $32,000.00, this XC60 T5 Inscription is a fantastic choice for those seeking a refined and safety-focused SUV.</p>','volvo_xc60_t5_inscription.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(23,4,16,'S90','T6 Momentum',2019,38000.00,30000.50,'White','Gasoline','<p>This 2019 Volvo S90 T6 Momentum is a sophisticated and comfortable luxury sedan that provides a smooth and enjoyable ride. With 30,000.50 miles on the odometer, this S90 is in excellent condition and offers an upscale driving experience.</p><p>The white exterior of the sedan looks elegant and modern, while the powerful gasoline engine provides responsive performance. Inside, you\'ll find a spacious and opulent cabin with premium features and a focus on driver comfort.</p><p>Priced at $38,000.00, this S90 T6 Momentum is an outstanding choice for those seeking a luxurious and well-appointed sedan.</p>','volvo_s90_t6_momentum.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(24,1,17,'Malibu','LT',2017,18000.00,40000.75,'Silver','Gasoline','<p>This 2017 Chevrolet Malibu LT is a practical and efficient midsize sedan that provides a comfortable and reliable ride. With 40,000.75 miles on the odometer, this Malibu is in good condition and is perfect for daily commuting.</p><p>The silver exterior of the sedan looks sleek and modern, while the gasoline engine delivers a good balance of power and fuel efficiency. Inside, you\'ll find a spacious and comfortable interior with user-friendly features.</p><p>Priced at $18,000.00, this Malibu LT is an excellent choice for those seeking a value-oriented and versatile sedan.</p>','chevrolet_malibu_lt.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(25,2,17,'Equinox','Premier',2019,22000.00,30000.50,'Black','Gasoline','<p>This 2019 Chevrolet Equinox Premier is a well-rounded and practical SUV that offers a smooth and comfortable driving experience. With 30,000.50 miles on the odometer, this Equinox is in excellent condition and is a reliable choice for family outings.</p><p>The black exterior of the SUV looks stylish, while the gasoline engine provides sufficient power and decent fuel efficiency. Inside, you\'ll find a spacious and well-designed cabin with modern amenities.</p><p>Priced at $22,000.00, this Equinox Premier is an outstanding choice for those seeking a dependable and feature-packed SUV.</p>','chevrolet_equinox_premier.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(26,1,10,'Optima','EX',2018,20000.00,35000.25,'White','Gasoline','<p>This 2018 Kia Optima EX is a reliable and well-equipped midsize sedan that offers a comfortable ride. With 35,000.25 miles on the odometer, this Optima is in good condition and is perfect for daily commuting.</p><p>The white exterior of the sedan looks elegant, while the gasoline engine provides a balance of performance and fuel efficiency. Inside, you\'ll find a spacious and modern interior with user-friendly features and comfortable seats.</p><p>Priced at $20,000.00, this Optima EX is an excellent choice for those seeking a practical and budget-friendly sedan.</p>','kia_optima_ex.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(27,2,10,'Sorento','SX',2019,28000.00,30000.50,'Black','Gasoline','<p>This 2019 Kia Sorento SX is a versatile and spacious SUV that provides a smooth and enjoyable ride. With 30,000.50 miles on the odometer, this Sorento is in great condition and is perfect for family adventures.</p><p>The black exterior of the SUV looks stylish, while the gasoline engine delivers ample power and decent fuel efficiency. Inside, you\'ll find a roomy and comfortable cabin with modern features and third-row seating.</p><p>Priced at $28,000.00, this Sorento SX is an excellent choice for those seeking a reliable and well-equipped SUV.</p>','kia_sorento_sx.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(28,1,3,'Fusion','SE',2017,18000.00,40000.75,'Silver','Gasoline','<p>This 2017 Ford Fusion SE is a practical and efficient midsize sedan that offers a comfortable ride. With 40,000.75 miles on the odometer, this Fusion is in good condition and is perfect for daily commuting.</p><p>The silver exterior of the sedan looks sleek and modern, while the gasoline engine delivers a good balance of power and fuel efficiency. Inside, you\'ll find a spacious and comfortable interior with user-friendly features.</p><p>Priced at $18,000.00, this Fusion SE is an excellent choice for those seeking a reliable and budget-friendly sedan.</p>','ford_fusion_se.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(29,2,3,'Escape','SEL',2019,22000.00,30000.50,'Black','Gasoline','<p>This 2019 Ford Escape SEL is a versatile and practical SUV that provides a smooth and enjoyable driving experience. With 30,000.50 miles on the odometer, this Escape is in excellent condition and is perfect for daily commuting and family trips.</p><p>The black exterior of the SUV looks stylish, while the gasoline engine provides sufficient power and decent fuel efficiency. Inside, you\'ll find a spacious and well-designed cabin with modern amenities and comfortable seating.</p><p>Priced at $22,000.00, this Escape SEL is an excellent choice for those seeking a reliable and feature-packed SUV.</p>','ford_escape_sel.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(30,4,9,'Elantra','SE',2017,15000.00,40000.75,'Silver','Gasoline','<p>This 2017 Hyundai Elantra SE is a practical and reliable compact sedan that offers a comfortable ride. With 40,000.75 miles on the odometer, this Elantra is in good condition and is perfect for daily commuting.</p><p>The silver exterior of the sedan looks modern and sleek, while the gasoline engine delivers a good balance of performance and fuel efficiency. Inside, you\'ll find a spacious and well-appointed interior with user-friendly features.</p><p>Priced at $15,000.00, this Elantra SE is an excellent choice for those seeking a budget-friendly and dependable sedan.</p>','hyundai_elantra_se.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(31,3,9,'Tucson','Limited',2019,25000.00,30000.50,'White','Gasoline','<p>This 2019 Hyundai Tucson Limited is a versatile and comfortable SUV that provides a smooth and enjoyable ride. With 30,000.50 miles on the odometer, this Tucson is in great condition and is perfect for family outings and road trips.</p><p>The white exterior of the SUV looks sophisticated, while the gasoline engine delivers both efficiency and performance. Inside, you\'ll find a spacious and well-designed cabin with modern amenities and a user-friendly infotainment system.</p><p>Priced at $25,000.00, this Tucson Limited is an excellent choice for those seeking a reliable and feature-packed SUV.</p>','hyundai_tucson_limited.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(32,4,18,'Charger','R/T',2017,28000.00,40000.75,'Black','Gasoline','<p>This 2017 Dodge Charger R/T is a powerful and stylish muscle car that offers an exhilarating driving experience. With 40,000.75 miles on the odometer, this Charger is in good condition and is sure to turn heads wherever you go.</p><p>The black exterior of the car exudes attitude and performance, while the robust gasoline engine delivers impressive acceleration and speed. Inside, you\'ll find a spacious and driver-oriented cabin with modern features and technology.</p><p>Priced at $28,000.00, this Charger R/T is an excellent choice for those seeking a blend of performance and style in a sedan.</p>','dodge_charger_rt.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(33,2,18,'Durango','GT',2019,32000.00,30000.50,'Silver','Gasoline','<p>This 2019 Dodge Durango GT is a spacious and powerful SUV that provides a comfortable and thrilling ride. With 30,000.50 miles on the odometer, this Durango is in excellent condition and is perfect for family adventures.</p><p>The silver exterior of the SUV looks modern and refined, while the gasoline engine provides ample power for towing and highway driving. Inside, you\'ll find a roomy and well-appointed cabin with advanced features and third-row seating.</p><p>Priced at $32,000.00, this Durango GT is an outstanding choice for those seeking a capable and well-equipped SUV.</p>','dodge_durango_gt.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(34,1,19,'ES 350','Base',2017,28000.00,40000.75,'Silver','Gasoline','<p>This 2017 Lexus ES 350 Base is a luxurious and comfortable sedan that offers a smooth and refined driving experience. With 40,000.75 miles on the odometer, this ES 350 is in excellent condition and is perfect for daily commuting and long drives.</p><p>The silver exterior of the sedan looks elegant and sophisticated, while the powerful gasoline engine delivers a quiet and smooth performance. Inside, you\'ll find a lavishly appointed cabin with high-quality materials and advanced technology.</p><p>Priced at $28,000.00, this ES 350 Base is an outstanding choice for those seeking a premium and reliable sedan with a focus on comfort and luxury.</p>','lexus_es_350_base.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(35,3,19,'RX 350','F Sport',2019,40000.00,30000.50,'Black','Gasoline','<p>This 2019 Lexus RX 350 F Sport is a luxurious and sporty SUV that provides a comfortable and thrilling ride. With 30,000.50 miles on the odometer, this RX 350 is in excellent condition and is perfect for both urban driving and road trips.</p><p>The black exterior of the SUV looks modern and sleek, while the powerful gasoline engine provides excellent performance and handling. Inside, you\'ll find a well-crafted and tech-savvy cabin with ample space and premium amenities.</p><p>Priced at $40,000.00, this RX 350 F Sport is an excellent choice for those seeking a high-end and dynamic SUV that stands out from the crowd.</p>','lexus_rx_350_f_sport.jpg',0,'2023-08-04 02:22:00','2023-08-04 02:22:00');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars_orders`
--

DROP TABLE IF EXISTS `cars_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` bigint(20) unsigned NOT NULL,
  `order_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cars_orders_car_id_foreign` (`car_id`),
  KEY `cars_orders_order_id_foreign` (`order_id`),
  CONSTRAINT `cars_orders_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  CONSTRAINT `cars_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars_orders`
--

LOCK TABLES `cars_orders` WRITE;
/*!40000 ALTER TABLE `cars_orders` DISABLE KEYS */;
INSERT INTO `cars_orders` VALUES (1,10,1,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(2,5,1,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(3,3,5,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(4,6,6,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(5,9,3,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(6,4,2,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(7,5,7,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(8,5,9,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(9,5,3,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(10,10,9,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(11,3,10,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(12,6,6,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(13,4,10,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(14,3,8,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(15,9,10,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(16,6,2,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(17,3,10,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(18,6,10,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(19,8,1,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(20,4,5,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(21,6,3,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(22,5,3,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(23,5,7,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(24,1,2,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(25,10,10,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(26,1,9,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(27,6,1,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(28,6,9,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(29,2,7,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(30,9,3,'2023-08-04 02:22:01','2023-08-04 02:22:01');
/*!40000 ALTER TABLE `cars_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Sedan',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(2,'SUV',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(3,'Truck',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(4,'Van',0,'2023-08-04 02:22:00','2023-08-04 02:22:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `promo_code` varchar(255) NOT NULL,
  `discount_percentage` decimal(5,2) NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `discounts_promo_code_unique` (`promo_code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
INSERT INTO `discounts` VALUES (1,'a1b2c3',1.23,0,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(2,'abcdef',2.23,0,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(3,'123456',3.23,0,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(4,'234567',2.50,0,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(5,'345678',2.60,0,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(6,'456789',2.73,0,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(7,'567890',5.00,0,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(8,'678901',4.80,0,0,'2023-08-04 02:22:01','2023-08-04 02:22:01');
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inquiries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL DEFAULT 'test subject',
  `description` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inquiries`
--

LOCK TABLES `inquiries` WRITE;
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;
INSERT INTO `inquiries` VALUES (1,'Admin','testuser@gmail.com','204 566 5455','test subject','This is my inquiry.',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(2,'Jane Doe','janedoe@example.com','123-456-7891','test subject','How many passengers can this car comfortably seat?',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(3,'Bob Smith','bobsmith@example.com','123-456-7892','test subject','What safety features does this car have?',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(4,'Alice Johnson','alicejohnson@example.com','123-456-7893','test subject','Is this car available in different colors or with custom options?',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(5,'Charlie Brown','charliebrown@example.com','123-456-7894','test subject','What is the warranty on this car?',0,'2023-08-04 02:22:00','2023-08-04 02:22:00');
/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (330,'2014_10_12_000000_create_users_table',1),(331,'2014_10_12_100000_create_password_reset_tokens_table',1),(332,'2014_10_12_100000_create_password_resets_table',1),(333,'2019_08_19_000000_create_failed_jobs_table',1),(334,'2019_12_14_000001_create_personal_access_tokens_table',1),(335,'2023_07_19_220100_create_categories_table',1),(336,'2023_07_19_220302_create_brands_table',1),(337,'2023_07_19_221110_create_inquiries_table',1),(338,'2023_07_19_222050_create_cars_table',1),(339,'2023_07_20_203013_create_orders_table',1),(340,'2023_07_20_203014_create_payments_table',1),(341,'2023_07_20_203805_create_logs_table',1),(342,'2023_07_21_160452_create_discounts_table',1),(343,'2023_07_21_160545_create_reviews_table',1),(344,'2023_07_25_150928_create_transactions_table',1),(345,'2023_07_28_015450_create_cars_orders_table',1),(346,'2023_08_01_211249_create_provinces_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province_state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `sub_total` decimal(9,2) NOT NULL,
  `shipping_cost` decimal(9,2) NOT NULL,
  `gst` decimal(9,2) NOT NULL,
  `pst` decimal(9,2) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `promote_discount` decimal(9,2) NOT NULL DEFAULT 0.00,
  `order_status` enum('Pending','Confirmed','Shipped','Delivered') NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,'Customer 1','123 Main Street','City 1','Province/State 1','Country 1','Postal Code 1',35.61,9.94,1.24,7.00,798.77,0.00,'Delivered',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(2,6,'Customer 2','456 Elm Avenue','City 2','Province/State 2','Country 2','Postal Code 2',93.23,7.79,9.52,6.89,682.59,0.00,'Delivered',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(3,5,'Customer 3','789 Oak Road','City 3','Province/State 3','Country 3','Postal Code 3',43.17,9.66,1.04,7.62,577.58,0.00,'Pending',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(4,3,'Customer 4','123 Main Street','City 4','Province/State 4','Country 4','Postal Code 4',11.07,9.22,9.96,8.52,527.44,0.00,'Delivered',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(5,6,'Customer 5','222 Pine Court','City 5','Province/State 5','Country 5','Postal Code 5',34.50,9.10,6.81,6.31,988.45,0.00,'Delivered',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(6,2,'Customer 6','222 Pine Court','City 6','Province/State 6','Country 6','Postal Code 6',78.12,1.39,8.63,1.99,593.66,0.00,'Confirmed',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(7,7,'Customer 7','456 Elm Avenue','City 7','Province/State 7','Country 7','Postal Code 7',41.82,5.94,6.41,5.60,770.30,0.00,'Shipped',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(8,4,'Customer 8','222 Pine Court','City 8','Province/State 8','Country 8','Postal Code 8',78.78,1.34,4.48,3.03,605.75,0.00,'Pending',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(9,7,'Customer 9','222 Pine Court','City 9','Province/State 9','Country 9','Postal Code 9',88.24,6.91,1.08,8.72,211.47,0.00,'Pending',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(10,9,'Customer 10','222 Pine Court','City 10','Province/State 10','Country 10','Postal Code 10',37.56,6.14,1.15,9.00,984.04,0.00,'Pending',0,'2023-08-04 02:22:00','2023-08-04 02:22:00');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
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
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `credit_card_info` varchar(255) NOT NULL,
  `payment_status` enum('Declined','Completed','Pending') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_order_id_foreign` (`order_id`),
  CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,1,'Credit Card Info for Order 1','Completed','2023-08-04 02:22:00','2023-08-04 02:22:00'),(2,2,'Credit Card Info for Order 2','Declined','2023-08-04 02:22:00','2023-08-04 02:22:00'),(3,3,'Credit Card Info for Order 3','Completed','2023-08-04 02:22:00','2023-08-04 02:22:00'),(4,4,'Credit Card Info for Order 4','Pending','2023-08-04 02:22:00','2023-08-04 02:22:00'),(5,5,'Credit Card Info for Order 5','Completed','2023-08-04 02:22:00','2023-08-04 02:22:00'),(6,6,'Credit Card Info for Order 6','Declined','2023-08-04 02:22:00','2023-08-04 02:22:00'),(7,7,'Credit Card Info for Order 7','Declined','2023-08-04 02:22:00','2023-08-04 02:22:00'),(8,8,'Credit Card Info for Order 8','Declined','2023-08-04 02:22:00','2023-08-04 02:22:00'),(9,9,'Credit Card Info for Order 9','Declined','2023-08-04 02:22:00','2023-08-04 02:22:00'),(10,10,'Credit Card Info for Order 10','Completed','2023-08-04 02:22:00','2023-08-04 02:22:00');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pst` double(10,5) NOT NULL DEFAULT 0.00000,
  `gst_hst` double(10,5) NOT NULL DEFAULT 0.00000,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (1,'Manitoba',7.00000,5.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(2,'Alberta',0.00000,5.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(3,'Yukon',0.00000,5.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(4,'Northwest Territories',0.00000,5.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(5,'Nunavut',0.00000,5.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(6,'Saskatchewan',6.00000,5.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(7,'British Columbia',7.00000,5.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(8,'Ontario',0.00000,13.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(9,'Quebec',9.97500,5.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(10,'New Brunswick',0.00000,15.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(11,'Nova Scotia',0.00000,15.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(12,'Prince Edward Island',0.00000,15.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(13,'Newfoundland and Labrador',0.00000,15.00000,0,'2023-08-04 02:22:01','2023-08-04 02:22:01');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `car_id` bigint(20) unsigned NOT NULL,
  `comment` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_car_id_foreign` (`car_id`),
  CONSTRAINT `reviews_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,5,6,'This is my comment ',0,'2023-08-04 02:22:00','2023-08-04 02:22:00'),(2,10,9,'This car is amazing! It has great fuel efficiency and a smooth ride.',0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(3,7,4,'I love this car! It has a spacious interior and plenty of storage space.',0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(4,7,2,'This car is perfect for long road trips. It has comfortable seats and a great sound system.',0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(5,1,10,'This car is very reliable and has excellent safety features. I feel safe driving it.',0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(6,10,5,'This car has a sleek design and handles well on the road. I love driving it!',0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(7,10,5,'This car has excellent acceleration and is very fun to drive. I highly recommend it!',0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(8,5,7,'This car is very practical and has a lot of storage space. It is perfect for families.',0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(9,7,9,'This car has great gas mileage and is very eco-friendly. I am very happy with my purchase.',0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(10,2,4,'This car is very comfortable and has a smooth ride. It is perfect for long road trips.',0,'2023-08-04 02:22:01','2023-08-04 02:22:01'),(11,2,9,'Best car',0,'2023-08-04 02:46:50','2023-08-04 02:46:50');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `transaction_response` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_order_id_foreign` (`order_id`),
  CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL DEFAULT 1,
  `postal_code` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Admin','Canada','123 Portage','Winnipeg',1,'r2a1c5','2042332222','admin@gmail.com','2023-08-04 02:22:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',1,0,'MqgI9jSbCG','2023-08-04 02:22:00','2023-08-04 02:22:00'),(2,'John','Doe','USA','123 Main St','New York',1,'10001','+1 (555) 123-4567','john.doe@example.com','2023-08-04 02:22:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',0,0,'lkocUW5tv1','2023-08-04 02:22:00','2023-08-04 02:22:00'),(3,'Jane','Smith','USA','456 Oak Ave','Los Angeles',1,'90001','+1 (555) 123-4567','jane.smith@example.com','2023-08-04 02:22:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',0,0,'jC7V78noZY','2023-08-04 02:22:00','2023-08-04 02:22:00'),(4,'Michael','Johnson','USA','789 Elm Rd','Chicago',1,'60601','+1 (555) 246-1357','michael.johnson@example.com','2023-08-04 02:22:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',0,0,'Hf82m9IuoL','2023-08-04 02:22:00','2023-08-04 02:22:00'),(5,'Emily','Williams','USA','101 Pine Ln','Chicago',1,'94101','+1 (555) 789-1234','emily.williams@example.com','2023-08-04 02:22:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',0,0,'fA7FwAhohQ','2023-08-04 02:22:00','2023-08-04 02:22:00'),(6,'Oliver','Smith','Canada','123 Main St','Toronto',1,'M5V 2T6','+1 (416) 123-4567','oliver.smith@example.com','2023-08-04 02:22:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',0,0,'KKgAnhd8zg','2023-08-04 02:22:00','2023-08-04 02:22:00'),(7,'Ava','Johnson','Canada','456 Queen St','Vancouver',1,'V6B 1G1','+1 (604) 123-4567','ava.johnson@example.com','2023-08-04 02:22:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',0,0,'mHnZ8c92hB','2023-08-04 02:22:00','2023-08-04 02:22:00'),(8,'Ethan','Brown','Canada','789 King St','Montreal',1,'H3C 1J9','+1 (514) 123-4567','ethan.brown@example.com','2023-08-04 02:22:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',0,0,'bpwpr8FlLL','2023-08-04 02:22:00','2023-08-04 02:22:00'),(9,'Sophia','Tremblay','Canada','321 Front St','Calgary',1,'T2P 5E9','+1 (403) 123-4567','sophia.tremblay@example.com','2023-08-04 02:22:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',0,0,'AajDSpdfHV','2023-08-04 02:22:00','2023-08-04 02:22:00'),(10,'Mia','Roy','Canada','654 Wellington St','Ottawa',1,'K1A 0A9','+1 (613) 123-4567','mia.roy@example.com','2023-08-04 02:22:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',0,0,'P1IOYKxTfF','2023-08-04 02:22:00','2023-08-04 02:22:00');
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

-- Dump completed on 2023-08-04 10:45:16
