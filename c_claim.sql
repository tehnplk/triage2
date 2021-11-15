/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : triage

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-11-15 19:38:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for c_claim
-- ----------------------------
DROP TABLE IF EXISTS `c_claim`;
CREATE TABLE `c_claim` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of c_claim
-- ----------------------------
INSERT INTO `c_claim` VALUES ('1', 'A1', 'จ่ายเงินเอง โดยไม่มีสิทธิเบิกคืน');
INSERT INTO `c_claim` VALUES ('2', 'A2', 'ใช้สิทธิเบิกหน่วยงานต้นสังกัด');
INSERT INTO `c_claim` VALUES ('3', 'A3', 'สิทธิลดหย่อน ประเภท ก');
INSERT INTO `c_claim` VALUES ('4', 'A4', 'สิทธิลดหย่อน ประเภท ข');
INSERT INTO `c_claim` VALUES ('5', 'A5', 'สิทธิลดหย่อน ประเภท ค');
INSERT INTO `c_claim` VALUES ('6', 'A6', 'สิทธิลดหย่อน ประเภท ง');
INSERT INTO `c_claim` VALUES ('7', 'A7', 'ผู้ประกันตนตาม พรบ.ประกันสังคม');
INSERT INTO `c_claim` VALUES ('8', 'A8', 'กองทุนเงินทดแทน');
INSERT INTO `c_claim` VALUES ('9', 'A9', 'ประกันภัย ตาม พรบ.ผู้ประสบภัยจากรถ');
INSERT INTO `c_claim` VALUES ('10', 'AA', 'เด็ก 0 - 12 ปี');
INSERT INTO `c_claim` VALUES ('11', 'AB', 'บัตรผู้มีรายได้น้อย');
INSERT INTO `c_claim` VALUES ('12', 'AC', 'บัตรนักเรียน');
INSERT INTO `c_claim` VALUES ('13', 'AD', 'บัตรผู้พิการ');
INSERT INTO `c_claim` VALUES ('14', 'AE', 'ทหารผ่านศึก');
INSERT INTO `c_claim` VALUES ('15', 'AF', 'พระภิกษุ ผู้นำศาสนา');
INSERT INTO `c_claim` VALUES ('16', 'AG', 'บัตรผู้สูงอายุ');
INSERT INTO `c_claim` VALUES ('17', 'AH', 'บัตรชั่วคราว');
INSERT INTO `c_claim` VALUES ('18', 'AI', 'บัตรสุขภาพ ประชาชนทั่วไป');
INSERT INTO `c_claim` VALUES ('19', 'AJ', 'บัตรสุขภาพ อสม.');
INSERT INTO `c_claim` VALUES ('20', 'AK', 'บัตรสุขภาพ ผู้นำชุมชน');
INSERT INTO `c_claim` VALUES ('21', 'UA', 'บัตรประกันสุขภาพถ้วนหน้า (30 บาท)');
INSERT INTO `c_claim` VALUES ('22', 'UB', 'บัตรประกันสุขภาพถ้วนหน้า (ทอง)');
INSERT INTO `c_claim` VALUES ('23', 'UC', 'บัตรประกันสุขภาพถ้วนหน้า 30 บาท');
INSERT INTO `c_claim` VALUES ('24', 'AL', 'แรงงานต่างด้าว');
INSERT INTO `c_claim` VALUES ('25', 'L1', 'อปท.');
