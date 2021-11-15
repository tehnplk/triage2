/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : triage

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-11-15 19:29:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for c_claim_fund
-- ----------------------------
DROP TABLE IF EXISTS `c_claim_fund`;
CREATE TABLE `c_claim_fund` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pcode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of c_claim_fund
-- ----------------------------
INSERT INTO `c_claim_fund` VALUES ('1', 'จ่ายเงินเอง โดยไม่มีสิทธิเบิกคืน', 'A1');
INSERT INTO `c_claim_fund` VALUES ('2', 'ใช้สิทธิเบิกหน่วยงานต้นสังกัด', 'A2');
INSERT INTO `c_claim_fund` VALUES ('3', 'สิทธิลดหย่อน ประเภท ก', 'A3');
INSERT INTO `c_claim_fund` VALUES ('4', 'สิทธิลดหย่อน ประเภท ข', 'A4');
INSERT INTO `c_claim_fund` VALUES ('5', 'สิทธิลดหย่อน ประเภท ค', 'A5');
INSERT INTO `c_claim_fund` VALUES ('6', 'สิทธิลดหย่อน ประเภท ง', 'A6');
INSERT INTO `c_claim_fund` VALUES ('7', 'ผู้ประกันตนตาม พรบ.ประกันสังคม', 'A7');
INSERT INTO `c_claim_fund` VALUES ('8', 'กองทุนเงินทดแทน', 'A8');
INSERT INTO `c_claim_fund` VALUES ('9', 'ประกันภัย ตาม พรบ.ผู้ประสบภัยจากรถ', 'A9');
INSERT INTO `c_claim_fund` VALUES ('10', 'เด็ก 0 - 12 ปี', 'AA');
INSERT INTO `c_claim_fund` VALUES ('11', 'บัตรผู้มีรายได้น้อย', 'AB');
INSERT INTO `c_claim_fund` VALUES ('12', 'บัตรนักเรียน', 'AC');
INSERT INTO `c_claim_fund` VALUES ('13', 'บัตรผู้พิการ', 'AD');
INSERT INTO `c_claim_fund` VALUES ('14', 'ทหารผ่านศึก', 'AE');
INSERT INTO `c_claim_fund` VALUES ('15', 'พระภิกษุ ผู้นำศาสนา', 'AF');
INSERT INTO `c_claim_fund` VALUES ('16', 'บัตรผู้สูงอายุ', 'AG');
INSERT INTO `c_claim_fund` VALUES ('17', 'บัตรชั่วคราว', 'AH');
INSERT INTO `c_claim_fund` VALUES ('18', 'บัตรสุขภาพ ประชาชนทั่วไป', 'AI');
INSERT INTO `c_claim_fund` VALUES ('19', 'บัตรสุขภาพ อสม.', 'AJ');
INSERT INTO `c_claim_fund` VALUES ('20', 'บัตรสุขภาพ ผู้นำชุมชน', 'AK');
INSERT INTO `c_claim_fund` VALUES ('21', 'บัตรประกันสุขภาพถ้วนหน้า (30 บาท)', 'UA');
INSERT INTO `c_claim_fund` VALUES ('22', 'บัตรประกันสุขภาพถ้วนหน้า (ทอง)', 'UB');
INSERT INTO `c_claim_fund` VALUES ('23', 'บัตรประกันสุขภาพถ้วนหน้า 30 บาท', 'UC');
INSERT INTO `c_claim_fund` VALUES ('24', 'แรงงานต่างด้าว', 'AL');
INSERT INTO `c_claim_fund` VALUES ('25', 'อปท.', 'L1');
