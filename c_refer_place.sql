/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : triage

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-11-15 10:55:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for c_refer_place
-- ----------------------------
DROP TABLE IF EXISTS `c_refer_place`;
CREATE TABLE `c_refer_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of c_refer_place
-- ----------------------------
INSERT INTO `c_refer_place` VALUES ('1', 'รพ.พุทธชินราช(ราชภัฏทะเลแก้ว)');
INSERT INTO `c_refer_place` VALUES ('2', 'รพ.พุทธชินราช(บึงแก่งใหญ่)');
INSERT INTO `c_refer_place` VALUES ('3', 'ศูนย์อนามัยที่-2');
INSERT INTO `c_refer_place` VALUES ('4', 'รพ.จิตเวชพิษณุโลก');
