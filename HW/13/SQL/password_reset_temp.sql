/*
 Navicat Premium Data Transfer

 Source Server         : forget_password
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : pasrest

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 28/05/2022 13:28:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for password_reset_temp
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_temp`;
CREATE TABLE `password_reset_temp`  (
  `email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `key` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
