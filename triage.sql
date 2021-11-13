/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : triage

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-11-13 16:06:36
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of drug
-- ----------------------------
INSERT INTO `drug` VALUES ('1', '07477', '', null, '4', '3650100810887', 'นายออออ หหปปผป', '2021-11-11', '22:28:08', '', 'sdsdsd', '30', 'เม็ด', '', '', null, null, null, null);
INSERT INTO `drug` VALUES ('3', '00051', '', null, '3', '3650100810887', 'นายอุเทน จาดยางโทน', '2021-11-11', '22:43:45', '', 'พารา', '20', 'เม็ด', '', '', null, null, null, null);
INSERT INTO `drug` VALUES ('4', '07477', '', null, '4', '3650100810887', 'นายทดสอบ ระบบ', '2021-11-12', '16:47:26', '', 'ffffffffffff', '40', 'เม็ด', '', '', '2021-11-12 16:47:37', '100', '2021-11-12 16:47:37', '100');

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
  `doi` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx` (`patient_id`,`lab_date`,`lab_kind`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lab
-- ----------------------------
INSERT INTO `lab` VALUES ('5', '07477', '', '14', '4', '3650100810887', 'นายทดสอบ ระบบ', '2021-11-11', '23:15:30', '', 'PCR', 'Positive', null, '2021-11-11 23:16:43', '100', '2021-11-12 09:13:37', '100');
INSERT INTO `lab` VALUES ('9', '00051', '', '18', '3', '3650100810887', 'นายอุเทน จาดยางโทน', '2021-11-09', '15:35:05', '', '', 'PCR-Positive', '5', '2021-11-13 15:39:16', null, '2021-11-13 16:06:13', null);

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
INSERT INTO `patient` VALUES ('4', '07477', null, '3650100810887', 'นาย', 'ทดสอบ', 'ระบบ', 'นายทดสอบ ระบบ', 'ชาย', '01', '01', '2500', '1957-01-01', '64', '10', '11', '', '', '', '', '', '', '', '', '', '', '', null, null, '2021-11-11 23:16:20', '100');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of refer
-- ----------------------------
INSERT INTO `refer` VALUES ('6', '', '', null, '3', '', '', '2021-11-13', '13:30:35', 'ddddd', null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of risk
-- ----------------------------
INSERT INTO `risk` VALUES ('11', '07477', null, '14', '4', '3650100810887', 'นายทดสอบ ระบบ', '2021-11-11', '23:15:30', '1', '1', '', '', '', '', '', '', '', '', '', null, '2021-11-11 23:16:43', '100', '2021-11-11 23:16:43', '100');
INSERT INTO `risk` VALUES ('15', '00051', null, '18', '3', '3650100810887', 'นายอุเทน จาดยางโทน', '2021-11-13', '15:35:05', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2021-11-13 15:39:16', null, '2021-11-13 15:41:49', null);

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
  `doi` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `family` varchar(255) DEFAULT NULL,
  `refer_to` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of triage
-- ----------------------------
INSERT INTO `triage` VALUES ('3', '', null, '18', '3', null, null, null, null, '2021-11-13', '15:35:05', null, null, '95', null, null, 'PCR-Positive', '', '5', null, null, null, '2021-11-13 15:39:16', null, '2021-11-13 16:06:13', null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoscode` varchar(255) DEFAULT NULL,
  `hosname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password2` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `cid` varchar(13) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `onestop` varchar(255) DEFAULT NULL,
  `last` varchar(255) DEFAULT NULL,
  `last_session` varchar(255) DEFAULT NULL,
  `last_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `idx_username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '99788', null, 'vacc', '112233', null, null, null, 'vac', '', '', '', '2021-11-08 13:27:49', 'h0cs15aa7gr4794jtpkbtjprik', '110.77.172.237');
INSERT INTO `user` VALUES ('2', '99788', null, 'admin', '11223344', null, null, null, 'adm', '', 'งาน Admin', '', '2021-11-08 13:09:28', '1h9kj4ardpqft332if9beevpcr', '110.77.172.237');
INSERT INTO `user` VALUES ('3', '99788', null, 'regis', '112233', null, null, null, 'vac', '', '', '', '2021-09-03 11:32:09', null, null);
INSERT INTO `user` VALUES ('4', '99788', null, 'rxrx', '112233', null, null, null, 'rxx', '', 'งานเภสัชกรรม', '', '2021-11-05 10:30:38', 'ua9ss9404vl0h2dopgdhk73g2e', '182.53.170.43');
INSERT INTO `user` VALUES ('5', '99788', null, 'sasa', '112233', null, null, null, 'saa', '', 'Sa Sa', 'yes', '2021-11-12 17:01:43', 'h59loadp3m480v8e74k4p16mq3', '::1');
INSERT INTO `user` VALUES ('6', '11251', null, 'sa', '112233', null, null, null, 'saa', null, null, null, '2021-09-03 11:09:58', null, null);
INSERT INTO `user` VALUES ('21', '99788', null, '201', '12345', null, null, null, 'vac', '', 'นายตุลย์  สุขะตุงคะ', 'no', '2021-11-08 13:06:40', 'qaruo9sg69l720p08cje4lengc', '110.77.172.237');
INSERT INTO `user` VALUES ('22', '99788', null, '202', '12345', null, null, null, 'vac', '', 'นางจรีย์ภัสร์  วัฒนกุลชัย', 'no', '2021-11-08 07:53:21', 'rdj24gk9tfv9hn1g2ir8na3p53', '110.77.172.237');
INSERT INTO `user` VALUES ('23', '99788', null, '203', '12345', null, null, null, 'vac', '', 'นางสาวปานประดับ  ปานเกิด', 'yes', '2021-11-08 07:48:28', '49it16vms1hh0snlog7ik10n98', '110.77.172.237');
INSERT INTO `user` VALUES ('24', '99788', null, '204', '12345', null, null, null, 'vac', '', 'นางสาวอินทิรา  เทศกุล', 'yes', '2021-11-08 08:04:50', '7dendbdcj97tdfeht89qi32i7v', '110.77.172.237');
INSERT INTO `user` VALUES ('25', '99788', null, '205', '12345', null, null, null, 'vac', '', 'นางสัญชวัล  ผูกพานิช', 'yes', '2021-11-08 08:07:37', 'navuc51t97m9jqvnepm91ersk6', '110.77.172.237');
INSERT INTO `user` VALUES ('26', '99788', null, '206', '12345', null, null, null, 'vac', '', 'นางธิดารัตน์  ทัพภวิมล', 'no', '2021-10-30 18:32:08', 'jcmhi84o1dqq69hhjnuip5v81b', '119.76.14.43');
INSERT INTO `user` VALUES ('27', '99788', null, '207', '12345', null, null, null, 'vac', '', 'นางสาวฆนรส  จ่างคำ', 'yes', '2021-10-25 07:57:11', '556u8j2fkvckodkpdp7cfj0hap', '110.77.177.217');
INSERT INTO `user` VALUES ('28', '99788', null, '208', '12345', null, null, null, 'vac', '', 'นางระพีพรรณ วัฒนากร', 'yes', '2021-11-08 07:56:50', 'aoj442b5dtav6fv7krth2b7bcm', '110.77.172.237');
INSERT INTO `user` VALUES ('29', '99788', null, '209', '12345', null, null, null, 'vac', '', 'นายอรรณพ  ทองด้วง  ', 'yes', '2021-09-24 17:11:38', 'jpl3uec4fne1r0ehpvess5f66c', '159.192.188.101');
INSERT INTO `user` VALUES ('30', '99788', null, '210', '12345', null, null, null, 'vac', '', 'นายปิยวุฒิ  มากมี', 'no', '2021-10-25 14:15:53', '2igms0ff9tglj50btk16p7eajl', '110.77.177.217');
INSERT INTO `user` VALUES ('31', '99788', null, '211', '12345', null, null, null, 'vac', '', 'นายณัฐสันต์  ศรีจันทร์งาม', 'yes', '2021-10-20 11:50:41', 't0i6h3tsdaoborleupmda5dcnq', '159.192.208.27');
INSERT INTO `user` VALUES ('32', '99788', null, '212', '12345', null, null, null, 'vac', '', 'นายสิทธิชัย  พัดเถื่อน', 'yes', '2021-11-08 12:29:44', 'ihd54dfrsou9bn3a46ad5hu89r', '110.77.172.237');
INSERT INTO `user` VALUES ('33', '99788', null, '213', '12345', null, null, null, 'vac', '', 'นายนพดล  คำพุฒ', 'yes', '2021-10-25 08:26:29', '9p0tfcsap4k80d5jrlhdaumbpi', '110.77.177.217');
INSERT INTO `user` VALUES ('34', '99788', null, '214', '123456', null, null, null, 'vac', '', 'นายสันติ  แก้วชูเชิด', 'yes', null, null, null);
INSERT INTO `user` VALUES ('35', '99788', null, '215', '12345', null, null, null, 'vac', '', 'นายศุภณัฐ  พรหมมณี', 'yes', '2021-11-01 08:02:20', 'su89n32eaugr4os8po7numdotk', '110.77.176.35');
INSERT INTO `user` VALUES ('36', '99788', null, '216', '12345', null, null, null, 'vac', '', 'นายรัชต์พล  รัสมี', 'yes', '2021-11-04 15:32:25', '3pmg0motvmrpsklt7v74gbrcs2', '192.168.200.2');
INSERT INTO `user` VALUES ('37', '99788', null, '217', '12345', null, null, null, 'vac', '', 'นางสาวกัลยา  มากพิณ', 'yes', '2021-11-01 07:51:15', 'oobp7v4h0foq1a3e6vprk8lvp9', '110.77.176.35');
INSERT INTO `user` VALUES ('38', '99788', null, '218', '12345', null, null, null, 'vac', '', 'นางนภาพันธุ์  สมศรี', 'yes', '2021-11-01 07:48:39', 'jgm525simregtbbgq11u251ofi', '110.77.176.35');
INSERT INTO `user` VALUES ('39', '99788', null, '219', '12345', null, null, null, 'vac', '', 'นางจันทร์ทิพย์ ประเสริฐศรี ', 'yes', '2021-10-26 14:39:12', 'bi6sasuictggo638rhjdnvcddm', '110.77.172.148');
INSERT INTO `user` VALUES ('40', '99788', null, '220', '12345', null, null, null, 'vac', '', 'นางสาววิชญาภรณ์  วงศ์วิชญ์', 'yes', '2021-11-01 07:43:19', '7h51m5t6lrv8ua1v65cel791in', '110.77.176.35');
INSERT INTO `user` VALUES ('41', '99788', null, '221', '12345', null, null, null, 'vac', '', 'นางสาวสุวพัชร อินสอน ', 'no', '2021-11-01 07:56:14', 'po8aiq3qjruoe115i5jahehkp8', '110.77.176.35');
INSERT INTO `user` VALUES ('42', '99788', null, '222', '12345', null, null, null, 'vac', '', 'นางสาวหทัยขวัญ ศโรภาส', 'no', '2021-11-01 12:36:13', '00v9tf887j27i8kc0v74f7juqo', '110.77.176.35');
INSERT INTO `user` VALUES ('43', '99788', null, '223', '12345', null, null, null, 'vac', '', 'นายพิสัยสิษฐ์ เสือแขม ', 'no', '2021-11-01 12:37:39', 'vi7bhj5m7er30rnsdfbn82lbtp', '110.77.176.35');
INSERT INTO `user` VALUES ('44', '99788', null, '224', '12345', null, null, null, 'vac', '', 'นางสาวสุทธิรัตน์  พะโพ', 'yes', '2021-10-15 07:28:30', '24ta24p2phms4kfq93rlqqpo7k', '159.192.189.70');
INSERT INTO `user` VALUES ('45', '99788', null, '601', '12345', null, null, null, 'vac', '', 'นางสาวกนกกาญจน์  อินศรี', 'yes', '2021-11-01 12:53:22', 't655fjdsvs738drambvpqirfvl', '110.77.176.35');
INSERT INTO `user` VALUES ('46', '99788', null, '602', '12345', null, null, null, 'vac', '', 'นางสาวกรณ์วิกา  พราหมชม', 'yes', '2021-10-11 08:29:02', '4dnui5arb6a1jh5rnostehu5o0', '159.192.207.244');
INSERT INTO `user` VALUES ('47', '99788', null, '603', '12345', null, null, null, 'vac', '', 'นางสาวธนาภรณ์  วงศ์ชรินรัตน์', 'yes', '2021-11-08 07:48:56', 'ufh0ms8pjr56n18qtvbhm0ps0h', '110.77.172.237');
INSERT INTO `user` VALUES ('48', '99788', null, '604', '12345', null, null, null, 'vac', '', 'นางสุรีพร  ทิวะทรัพย์', 'yes', '2021-11-08 08:31:01', '94l4b6amc9qup2ht34ijb42m42', '110.77.172.237');
INSERT INTO `user` VALUES ('49', '99788', null, '605', '12345', null, null, null, 'vac', '', 'นางศิริวรรณ  ภู่สามสาย', 'yes', '2021-11-01 07:53:23', 'qguj3jus9n44qe5rntsaccoml4', '110.77.176.35');
INSERT INTO `user` VALUES ('50', '99788', null, '606', '12345', null, null, null, 'vac', '', 'นางอาพันชนก  วัฒนกุลชัย', 'yes', '2021-11-01 07:59:53', '275cm6c0q96icld6qabl7h0uhp', '110.77.176.35');
INSERT INTO `user` VALUES ('51', '99788', null, '607', '12345', null, null, null, 'vac', '', 'นางสาวสุวิตา  สนทิม', 'yes', '2021-10-05 09:20:53', 'nvr0rh90912o9iul8787ph1852', '119.42.101.75');
INSERT INTO `user` VALUES ('52', '99788', null, '608', '12345', null, null, null, 'vac', '', 'นางสาววันเพ็ญ  โพธิ์ดง', 'yes', '2021-11-01 07:48:31', '4gb52ohot3kq886rejs7j1ctdf', '110.77.176.35');
INSERT INTO `user` VALUES ('53', '99788', null, '99788', '112233', null, null, null, 'saa', '', 'สสจ.พล', 'yes', '2021-09-25 08:54:12', '1315k4uhv1j6a029qqdlku7ftc', '182.232.245.64');
INSERT INTO `user` VALUES ('54', '99788', null, '801', '12345', null, null, null, 'vac', '', 'รพ.สต.วัดพริก', 'no', '2021-10-15 08:10:56', 'ffd52k7304nrftqnjr1brn4ptn', '159.192.189.70');
INSERT INTO `user` VALUES ('55', '99788', null, '666', '12345', null, null, null, 'vac', '', 'ONEsTOP', 'yes', '2021-09-28 12:49:39', '6inmsbj8k10g2fefttah93g89c', '61.7.130.155');
INSERT INTO `user` VALUES ('56', '99788', null, 'plk005', '12345', null, null, null, 'vac', '', 'ฝ่ายส่งเสริม', 'no', '2021-11-01 14:38:49', '1976oadehn8laeph3geq3pdjh9', '61.19.22.22');
INSERT INTO `user` VALUES ('57', '99788', null, '802', '12345', null, null, null, 'vac', '', 'รพ.สต.บ้านเสาหิน', 'no', '2021-09-24 08:09:11', '1sgktb1qotski16gevefobona2', '110.77.175.29');
INSERT INTO `user` VALUES ('58', '99788', null, '803', '12345', null, null, null, 'vac', '', 'รพ.สต.บ้านกร่าง', 'no', '2021-09-24 08:09:18', 'trkifnm24h5vol0j4oiup5u6kg', '110.77.175.29');
INSERT INTO `user` VALUES ('60', '99788', null, '701', '12345', null, null, null, 'vac', '', '', 'no', '2021-10-11 13:14:32', '3ja1jfnuki80hfftjhm7jcjhcd', '159.192.207.244');
INSERT INTO `user` VALUES ('61', '99788', null, 'test', 'test', null, null, null, 'vac', '', 'Test', 'yes', '2021-10-30 07:29:25', 'knsjdme3elsb2tehdef6dsstga', '119.76.14.43');
INSERT INTO `user` VALUES ('62', '99788', null, 'muey', '12345', null, null, null, 'vac', '', 'เจ้ม้วย', 'no', '2021-10-18 08:47:49', 'qs24ahr65dgn76vkbl37ailbv8', '159.192.188.62');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of visit
-- ----------------------------
INSERT INTO `visit` VALUES ('14', '07477', null, '4', '3650100810887', 'นายทดสอบ ระบบ', '64', '10', '2021-11-11', '23:15:30', '90', '63', '226.8', '37.0', '96', null, null, null, '', '2021-11-11 23:16:43', '100', '2021-11-11 23:16:43', '100');
INSERT INTO `visit` VALUES ('18', '00051', null, '3', '3650100810887', 'นายอุเทน จาดยางโทน', '41', '6', '2021-11-13', '15:35:05', '98', '168', '34.7', null, '95', null, null, null, '', '2021-11-13 15:39:16', null, '2021-11-13 15:39:16', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of xray
-- ----------------------------
INSERT INTO `xray` VALUES ('7', '', '', null, '4', '', '', '2021-11-12', '16:45:35', '', '', '', '', '', '', '', null, '2021-11-12 16:46:42', '100', '2021-11-12 16:46:49', '100');
INSERT INTO `xray` VALUES ('8', '', '', null, '3', '', '', '2021-11-13', '12:53:08', '', '', '', 'Negative', '', 'None', '', null, '2021-11-13 12:53:11', null, '2021-11-13 12:53:40', null);
