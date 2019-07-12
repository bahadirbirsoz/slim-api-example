/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50720
Source Host           : localhost:3306
Source Database       : insider

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2019-07-12 12:16:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `kullanici`
-- ----------------------------
DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE `kullanici` (
  `kullanici_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `sifre` varchar(64) DEFAULT NULL,
  `isim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kullanici
-- ----------------------------
INSERT INTO `kullanici` VALUES ('1', 'test@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Test Kullanıcı');
INSERT INTO `kullanici` VALUES ('2', 'ornek@ornek.com', '96b9b706df25e215288cb80c8405d28bca5ced7d', 'Örnek Kullanıcı');

-- ----------------------------
-- Table structure for `players`
-- ----------------------------
DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of players
-- ----------------------------
INSERT INTO `players` VALUES ('1', null, 'Muhammed', '52', null, null);
INSERT INTO `players` VALUES ('2', null, null, null, '2019-06-14 09:58:24', '2019-06-14 09:58:24');
INSERT INTO `players` VALUES ('3', null, 'Üçüncü', null, '2019-06-14 10:01:24', '2019-06-21 08:19:25');
INSERT INTO `players` VALUES ('6', null, 'firmino', null, '2019-06-14 10:03:18', '2019-06-14 10:03:18');

-- ----------------------------
-- Table structure for `teamdata`
-- ----------------------------
DROP TABLE IF EXISTS `teamdata`;
CREATE TABLE `teamdata` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(11) DEFAULT NULL,
  `team_flama` varchar(255) DEFAULT NULL,
  `primary_color` varchar(255) DEFAULT NULL,
  `secondery_color` varchar(255) DEFAULT NULL,
  `stadium` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teamdata
-- ----------------------------

-- ----------------------------
-- Table structure for `teams`
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team` varchar(255) DEFAULT NULL,
  `strength` tinyint(3) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES ('1', 'Arsenal', '85', null, '2019-06-21 11:13:01');
INSERT INTO `teams` VALUES ('2', 'Machester United', '90', null, null);
INSERT INTO `teams` VALUES ('3', 'Liverpool', '80', null, null);
INSERT INTO `teams` VALUES ('7', 'Everton', null, '2019-06-14 09:30:27', '2019-06-21 11:10:46');
INSERT INTO `teams` VALUES ('8', 'Southampton', null, '2019-06-14 09:30:44', '2019-06-21 11:11:00');
INSERT INTO `teams` VALUES ('11', 'Chelsea', null, '2019-06-21 11:24:32', '2019-06-21 11:24:32');

-- ----------------------------
-- Table structure for `tokens`
-- ----------------------------
DROP TABLE IF EXISTS `tokens`;
CREATE TABLE `tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tokens
-- ----------------------------
INSERT INTO `tokens` VALUES ('1', '1', null, '2019-07-12 09:02:57', '2019-07-12 09:02:57');
INSERT INTO `tokens` VALUES ('2', '1', null, '2019-07-12 09:03:22', '2019-07-12 09:03:22');
INSERT INTO `tokens` VALUES ('3', '1', null, '2019-07-12 09:03:57', '2019-07-12 09:03:57');
INSERT INTO `tokens` VALUES ('4', '1', null, '2019-07-12 09:03:58', '2019-07-12 09:03:58');
INSERT INTO `tokens` VALUES ('5', '1', '5d284d18e70aa', '2019-07-12 09:04:24', '2019-07-12 09:04:24');
INSERT INTO `tokens` VALUES ('6', '1', '18b7df5decaa9a80b3cda1a472c665b323c6ccef', '2019-07-12 09:04:48', '2019-07-12 09:04:48');
INSERT INTO `tokens` VALUES ('7', '1', '67a39f4a6e30c104fe2e58f642fb2452cd7b57c0', '2019-07-12 09:08:00', '2019-07-12 09:08:00');
INSERT INTO `tokens` VALUES ('8', '1', '7e1efc7ec8196757da2c072aa42eedbc220b14cb', '2019-07-12 09:15:35', '2019-07-12 09:15:35');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'bahadir', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', null, null);
