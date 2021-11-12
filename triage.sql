/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : triage

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-11-12 15:57:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for drug
-- ----------------------------
DROP TABLE IF EXISTS `drug`;
CREATE TABLE `drug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoscode` varchar(255) DEFAULT '',
  `hosname` varchar(255) DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `patient_cid` varchar(13) DEFAULT NULL,
  `patient_fullname` varchar(255) DEFAULT NULL,
  `drug_date` date DEFAULT NULL,
  `drug_time` time DEFAULT NULL,
  `drug_id` varchar(255) DEFAULT '',
  `drug_name` varchar(255) DEFAULT '',
  `drug_amount` int(11) DEFAULT NULL,
  `drug_unit` varchar(255) DEFAULT '',
  `drug_usage` varchar(255) DEFAULT NULL,
  `drug_dispenser` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of drug
-- ----------------------------
INSERT INTO `drug` VALUES ('1', '07477', '', null, '4', '3650100810887', 'นายออออ หหปปผป', '2021-11-11', '22:28:08', '', 'sdsdsd', '30', 'เม็ด', '', '', null, null, null, null);
INSERT INTO `drug` VALUES ('3', '00051', '', null, '3', '3650100810887', 'นายอุเทน จาดยางโทน', '2021-11-11', '22:43:45', '', 'พารา', '20', 'เม็ด', '', '', null, null, null, null);

-- ----------------------------
-- Table structure for lab
-- ----------------------------
DROP TABLE IF EXISTS `lab`;
CREATE TABLE `lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoscode` varchar(255) DEFAULT '',
  `hosname` varchar(255) DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `patient_cid` varchar(13) DEFAULT NULL,
  `patient_fullname` varchar(255) DEFAULT NULL,
  `lab_date` date DEFAULT NULL,
  `lab_time` time DEFAULT NULL,
  `lab_place` varchar(255) DEFAULT NULL,
  `lab_kind` varchar(255) DEFAULT '',
  `lab_result` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx` (`patient_id`,`lab_date`,`lab_kind`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lab
-- ----------------------------
INSERT INTO `lab` VALUES ('4', '00051', '', '13', '3', '3650100810887', 'นายอุเทน จาดยางโทน', '2021-11-11', '22:55:25', '', 'ATK', 'Positive', null, null, null, null);
INSERT INTO `lab` VALUES ('5', '07477', '', '14', '4', '3650100810887', 'นายทดสอบ ระบบ', '2021-11-11', '23:15:30', '', 'PCR', 'Positive', '2021-11-11 23:16:43', '100', '2021-11-12 09:13:37', '100');

-- ----------------------------
-- Table structure for patient
-- ----------------------------
DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoscode` varchar(255) DEFAULT '',
  `hosname` varchar(255) DEFAULT NULL,
  `cid` varchar(13) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `bdate` varchar(2) DEFAULT '',
  `bmon` varchar(2) DEFAULT '',
  `byear` varchar(4) DEFAULT '',
  `birth` date DEFAULT NULL,
  `age_y` int(11) DEFAULT NULL,
  `age_m` int(11) DEFAULT NULL,
  `age_d` int(11) DEFAULT NULL,
  `marital` varchar(255) DEFAULT NULL,
  `nation` varchar(255) DEFAULT NULL,
  `family` varchar(255) DEFAULT '',
  `personal_disease` varchar(255) DEFAULT NULL,
  `addr_no` varchar(255) DEFAULT '',
  `addr_road` varchar(255) DEFAULT '',
  `addr_moo` varchar(255) DEFAULT '',
  `addr_tmb` varchar(255) DEFAULT '',
  `addr_amp` varchar(255) DEFAULT '',
  `addr_chw` varchar(255) DEFAULT '',
  `tel` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_cid_place` (`hoscode`,`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of patient
-- ----------------------------
INSERT INTO `patient` VALUES ('3', '00051', null, '3650100810887', 'นาย', 'อุเทน', 'จาดยางโทน', 'นายอุเทน จาดยางโทน', 'ชาย', '18', '04', '2523', '1980-04-18', '41', '6', '24', 'สมรส', '', '', '', '', '', '', '', '', '', '', null, null, null, null);
INSERT INTO `patient` VALUES ('4', '07477', null, '3650100810887', 'นาย', 'ทดสอบ', 'ระบบ', 'นายทดสอบ ระบบ', 'ชาย', '01', '01', '2500', '1957-01-01', '64', '10', '10', '', '', '', '', '', '', '', '', '', '', '', null, null, '2021-11-11 23:16:20', '100');

-- ----------------------------
-- Table structure for refer
-- ----------------------------
DROP TABLE IF EXISTS `refer`;
CREATE TABLE `refer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoscode` varchar(255) DEFAULT '',
  `hosname` varchar(255) DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `patient_cid` varchar(13) DEFAULT NULL,
  `patient_fullname` varchar(255) DEFAULT NULL,
  `refer_date` date DEFAULT NULL,
  `refer_time` time DEFAULT NULL,
  `refer_to` varchar(255) DEFAULT '',
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of refer
-- ----------------------------

-- ----------------------------
-- Table structure for risk
-- ----------------------------
DROP TABLE IF EXISTS `risk`;
CREATE TABLE `risk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoscode` varchar(255) DEFAULT '',
  `hosname` varchar(255) DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `patient_cid` varchar(13) DEFAULT NULL,
  `patient_fullname` varchar(255) DEFAULT NULL,
  `risk_date` date DEFAULT NULL,
  `risk_time` time DEFAULT NULL,
  `aging` varchar(255) DEFAULT '' COMMENT 'อายุมากกว่า 60ปี',
  `bmi` varchar(255) DEFAULT '' COMMENT 'bmiมากกว่า30 หรือน้ำหนักมากกว่า90',
  `dm` varchar(255) DEFAULT '' COMMENT 'โรคเบาหวานที่คุมไม่ได้',
  `copd` varchar(255) DEFAULT '' COMMENT 'COPD',
  `cirrhosis` varchar(255) DEFAULT '' COMMENT 'Cirrhosis',
  `stroke` varchar(255) DEFAULT '' COMMENT 'Stroke',
  `ihd` varchar(255) DEFAULT '' COMMENT 'IHD',
  `hiv` varchar(255) DEFAULT '' COMMENT 'HIV',
  `cancer` varchar(255) DEFAULT '' COMMENT 'CANCER',
  `suppress` varchar(255) DEFAULT '' COMMENT 'กินยากดภูมิคุ้มกัน',
  `preg` varchar(255) DEFAULT '' COMMENT 'กำลังตั้งครรภ์',
  `non_risk` varchar(255) DEFAULT NULL COMMENT 'ไม่มีความเสี่ยง',
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of risk
-- ----------------------------
INSERT INTO `risk` VALUES ('10', '00051', null, '13', '3', '3650100810887', 'นายอุเทน จาดยางโทน', '2021-11-11', '22:55:25', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', null, null, '2021-11-12 15:14:42', '100');
INSERT INTO `risk` VALUES ('11', '07477', null, '14', '4', '3650100810887', 'นายทดสอบ ระบบ', '2021-11-11', '23:15:30', '1', '1', '', '', '', '', '', '', '', '', '', null, '2021-11-11 23:16:43', '100', '2021-11-11 23:16:43', '100');

-- ----------------------------
-- Table structure for triage
-- ----------------------------
DROP TABLE IF EXISTS `triage`;
CREATE TABLE `triage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoscode` varchar(255) DEFAULT '',
  `hosname` varchar(255) DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `patient_cid` varchar(13) DEFAULT NULL,
  `patient_fullname` varchar(255) DEFAULT NULL,
  `patient_age` varchar(255) DEFAULT NULL,
  `patient_gender` varchar(255) DEFAULT NULL,
  `triage_date` date DEFAULT NULL,
  `triage_time` time DEFAULT NULL,
  `inscl_code` varchar(255) DEFAULT NULL,
  `claim_code` varchar(255) DEFAULT NULL,
  `spo2` varchar(255) DEFAULT '',
  `lab_date` date DEFAULT NULL,
  `lab_kind` varchar(255) DEFAULT NULL,
  `lab_result` varchar(255) DEFAULT '',
  `risk` varchar(255) DEFAULT '',
  `color` varchar(255) DEFAULT NULL,
  `refer_to` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of triage
-- ----------------------------

-- ----------------------------
-- Table structure for visit
-- ----------------------------
DROP TABLE IF EXISTS `visit`;
CREATE TABLE `visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoscode` varchar(255) DEFAULT '',
  `hosname` varchar(255) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `patient_cid` varchar(13) DEFAULT NULL,
  `patient_fullname` varchar(255) DEFAULT NULL,
  `age_y` int(11) DEFAULT NULL,
  `age_m` int(11) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `visit_time` time DEFAULT NULL,
  `bw` int(11) DEFAULT NULL,
  `bh` int(11) DEFAULT NULL,
  `bmi` decimal(11,1) DEFAULT NULL,
  `temperature` decimal(11,1) DEFAULT NULL,
  `spo2` int(11) DEFAULT NULL,
  `bps` int(11) DEFAULT NULL,
  `bpd` int(11) DEFAULT NULL,
  `pulse` int(11) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL COMMENT 'อาการ',
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx` (`hoscode`,`patient_id`,`visit_date`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of visit
-- ----------------------------
INSERT INTO `visit` VALUES ('13', '00051', null, '3', '3650100810887', 'นายอุเทน จาดยางโทน', '41', '6', '2021-11-11', '22:55:25', '92', '163', '34.6', '36.5', '98', '120', '80', '99', 'ไข้ ไอ', null, null, '2021-11-11 23:16:06', '100');
INSERT INTO `visit` VALUES ('14', '07477', null, '4', '3650100810887', 'นายทดสอบ ระบบ', '64', '10', '2021-11-11', '23:15:30', '90', '63', '226.8', '37.0', '96', null, null, null, '', '2021-11-11 23:16:43', '100', '2021-11-11 23:16:43', '100');

-- ----------------------------
-- Table structure for xray
-- ----------------------------
DROP TABLE IF EXISTS `xray`;
CREATE TABLE `xray` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoscode` varchar(255) DEFAULT '',
  `hosname` varchar(255) DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `patient_cid` varchar(13) DEFAULT NULL,
  `patient_fullname` varchar(255) DEFAULT NULL,
  `xray_date` date DEFAULT NULL,
  `xray_time` time DEFAULT NULL,
  `xray_type` varchar(255) DEFAULT '',
  `xray_result` varchar(255) DEFAULT '',
  `xray_cat` varchar(255) DEFAULT '',
  `covid19_pneumonia_cat` varchar(255) DEFAULT NULL,
  `conclusion` varchar(255) DEFAULT NULL,
  `comparison` varchar(255) DEFAULT NULL,
  `finding` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx` (`patient_id`,`xray_date`,`xray_result`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of xray
-- ----------------------------
INSERT INTO `xray` VALUES ('4', '00051', '', '13', '3', '3650100810887', 'นายอุเทน จาดยางโทน', '2021-11-11', '22:55:25', '', 'ATK', 'Positive', null, null, null, null, null, null, null, null, null);
INSERT INTO `xray` VALUES ('5', '07477', '', '14', '4', '3650100810887', 'นายทดสอบ ระบบ', '2021-11-11', '23:15:30', '', 'PCR', 'Positive', null, null, null, null, null, '2021-11-11 23:16:43', '100', '2021-11-12 09:13:37', '100');
