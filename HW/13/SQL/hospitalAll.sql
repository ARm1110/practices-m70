/*
 Navicat Premium Data Transfer

 Source Server         : forget_password
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : hospital

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 22/05/2022 17:00:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for appointment
-- ----------------------------
DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `users_id` int NULL DEFAULT NULL,
  `doctor_id` int NULL DEFAULT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creat_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `statuse` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `doctor_id`(`doctor_id` ASC) USING BTREE,
  INDEX `users_id`(`users_id` ASC) USING BTREE,
  CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of appointment
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_section
-- ----------------------------
DROP TABLE IF EXISTS `clinic_section`;
CREATE TABLE `clinic_section`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `statuse` tinyint(1) NULL DEFAULT NULL,
  `creat_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `management_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `management_id`(`management_id` ASC) USING BTREE,
  CONSTRAINT `clinic_section_ibfk_1` FOREIGN KEY (`management_id`) REFERENCES `management` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clinic_section
-- ----------------------------
INSERT INTO `clinic_section` VALUES (1, 'General', 1, '2022-05-21 16:28:30', 1);
INSERT INTO `clinic_section` VALUES (2, 'endoscopy', 1, '2022-05-21 22:47:06', 1);
INSERT INTO `clinic_section` VALUES (3, 'Nursing and Midwifery', 1, '2022-05-21 22:47:40', 1);
INSERT INTO `clinic_section` VALUES (4, 'Children', 1, '2022-05-21 22:48:11', 1);

-- ----------------------------
-- Table structure for doctor
-- ----------------------------
DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `statuse` tinyint(1) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creat_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `profile_id` int NULL DEFAULT NULL,
  `clinic_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `clinic_id`(`clinic_id` ASC) USING BTREE,
  INDEX `doctor_ibfk_2`(`profile_id` ASC) USING BTREE,
  CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic_section` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `doctor_profile` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctor
-- ----------------------------
INSERT INTO `doctor` VALUES (1, 'Maud', 'Nikaniki', 1, 'Maud.Nikaniki@gmail.com', '1312e213123e13', '2022-05-21 16:36:28', 1, 1);
INSERT INTO `doctor` VALUES (2, 'Nonnah', 'Giule', 1, 'Nonnah.Giule@gmail.com', '1312e213123e13', '2022-05-21 22:50:31', 2, 3);
INSERT INTO `doctor` VALUES (3, 'Linet', 'Suzetta', 1, 'Linet.Suzetta@gmail.com', '21321424142414', '2022-05-21 22:50:34', 3, 2);
INSERT INTO `doctor` VALUES (4, 'loy', 'falter', 1, 'loySuzetta@gmail.com', '21321424142414', '2022-05-21 22:59:15', 4, 1);

-- ----------------------------
-- Table structure for doctor_profile
-- ----------------------------
DROP TABLE IF EXISTS `doctor_profile`;
CREATE TABLE `doctor_profile`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `zip_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `url_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ed_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `amount_visit` int NULL DEFAULT NULL,
  `phone_number` int NULL DEFAULT NULL,
  `madia_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctor_profile
-- ----------------------------
INSERT INTO `doctor_profile` VALUES (1, '231', '/ddf/ssff', 'Master', 20000, 91321312, 'tm/dd');
INSERT INTO `doctor_profile` VALUES (2, '232', '/ddf/ssff', 'pro', 20000, 913123213, 'tm/dd');
INSERT INTO `doctor_profile` VALUES (3, '236', '/ddf/ssff', 'pro plus', 3500, 324324, 'tm/dd');
INSERT INTO `doctor_profile` VALUES (4, '231', '/ddf/ssff', 'pro plus iv', 7800, 24234324, 'tm/dd');

-- ----------------------------
-- Table structure for hospital
-- ----------------------------
DROP TABLE IF EXISTS `hospital`;
CREATE TABLE `hospital`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hospital
-- ----------------------------

-- ----------------------------
-- Table structure for management
-- ----------------------------
DROP TABLE IF EXISTS `management`;
CREATE TABLE `management`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `statuse` tinyint(1) NULL DEFAULT NULL,
  `hospital_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `hospital_id`(`hospital_id` ASC) USING BTREE,
  CONSTRAINT `management_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of management
-- ----------------------------
INSERT INTO `management` VALUES (1, 'Glynnis', 'Burnside', 'Glynnis.Burnside@gmail.com', '123451344', 1, NULL);

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment`  (
  `Payment_id` int NOT NULL AUTO_INCREMENT,
  `transaction_amount` int NOT NULL,
  `statuse` tinyint(1) NULL DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`Payment_id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payment
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `statuse` tinyint(1) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creat_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Table structure for worktime
-- ----------------------------
DROP TABLE IF EXISTS `worktime`;
CREATE TABLE `worktime`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `start_worktime` time NOT NULL,
  `end_worktime` time NOT NULL,
  `week_days` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `doctor_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `doctor_id`(`doctor_id` ASC) USING BTREE,
  CONSTRAINT `worktime_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of worktime
-- ----------------------------
INSERT INTO `worktime` VALUES (1, '08:00:00', '12:00:00', 'Saturday', 1);
INSERT INTO `worktime` VALUES (2, '08:00:00', '12:00:00', 'Monday', 1);
INSERT INTO `worktime` VALUES (3, '08:00:00', '12:00:00', 'Sunday', 2);
INSERT INTO `worktime` VALUES (4, '08:00:00', '12:00:00', 'Wednesday', 2);

SET FOREIGN_KEY_CHECKS = 1;
