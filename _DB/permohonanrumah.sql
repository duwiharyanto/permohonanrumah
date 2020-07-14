/*
 Navicat Premium Data Transfer

 Source Server         : PHP7.2
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : unjani_permohonanrumah

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 14/07/2020 10:51:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bulan
-- ----------------------------
DROP TABLE IF EXISTS `bulan`;
CREATE TABLE `bulan`  (
  `bulan_id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bulan_value` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`bulan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bulan
-- ----------------------------
INSERT INTO `bulan` VALUES (1, 'JANUARI', '1', '2020-07-13 19:16:41');
INSERT INTO `bulan` VALUES (2, 'FEBRUARI', '2', '2020-07-13 19:16:47');
INSERT INTO `bulan` VALUES (3, 'MARET', '3', '2020-07-13 19:16:52');
INSERT INTO `bulan` VALUES (4, 'APRIL', '4', '2020-07-13 19:16:58');
INSERT INTO `bulan` VALUES (5, 'MEI', '5', '2020-07-13 19:17:01');
INSERT INTO `bulan` VALUES (6, 'JUNI', '6', '2020-07-13 19:17:04');
INSERT INTO `bulan` VALUES (7, 'JULI', '7', '2020-07-13 19:17:08');
INSERT INTO `bulan` VALUES (8, 'AGUSTUS', '8', '2020-07-13 19:17:11');
INSERT INTO `bulan` VALUES (9, 'SEPTEMBER', '9', '2020-07-13 19:17:16');
INSERT INTO `bulan` VALUES (10, 'OKTOBER', '10', '2020-07-13 19:17:23');
INSERT INTO `bulan` VALUES (11, 'NOVEMBER', '11', '2020-07-13 19:17:27');
INSERT INTO `bulan` VALUES (12, 'DESEMBER', '12', '2020-07-13 19:17:30');

-- ----------------------------
-- Table structure for kawasan
-- ----------------------------
DROP TABLE IF EXISTS `kawasan`;
CREATE TABLE `kawasan`  (
  `kawasan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kawasan_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`kawasan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kawasan
-- ----------------------------
INSERT INTO `kawasan` VALUES (1, 'Dataran Banjir', '2020-07-12 20:17:36');
INSERT INTO `kawasan` VALUES (2, 'KEK', '2020-07-12 20:17:43');
INSERT INTO `kawasan` VALUES (3, 'Perbatasan', '2020-07-12 20:17:51');
INSERT INTO `kawasan` VALUES (4, 'Kumuh', '2020-07-12 20:17:59');
INSERT INTO `kawasan` VALUES (5, 'Rawan Bencana', '2020-07-12 20:18:10');
INSERT INTO `kawasan` VALUES (6, 'KSPN', '2020-07-12 20:18:20');
INSERT INTO `kawasan` VALUES (7, 'Pesisir Nelayan', '2020-07-12 20:18:35');
INSERT INTO `kawasan` VALUES (8, 'Pulau-pulau Kecil', '2020-07-12 20:18:52');
INSERT INTO `kawasan` VALUES (9, 'Transmigrasi', '2020-07-12 20:19:10');
INSERT INTO `kawasan` VALUES (10, 'Pemukiman', '2020-07-12 20:19:24');
INSERT INTO `kawasan` VALUES (11, 'Daerah Tertinggal', '2020-07-12 20:19:42');
INSERT INTO `kawasan` VALUES (12, 'Dekat Jalur Berbahaya(Rel, Lereng, Sutet)', '2020-07-12 20:20:13');

-- ----------------------------
-- Table structure for kepemilikanrumah
-- ----------------------------
DROP TABLE IF EXISTS `kepemilikanrumah`;
CREATE TABLE `kepemilikanrumah`  (
  `kepemilikanrumah_id` int(11) NOT NULL AUTO_INCREMENT,
  `kepemilikanrumah_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`kepemilikanrumah_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kepemilikanrumah
-- ----------------------------
INSERT INTO `kepemilikanrumah` VALUES (1, 'Milik Sendiri', '2020-07-12 20:14:34');
INSERT INTO `kepemilikanrumah` VALUES (2, 'Bukan Milik Sendiri', '2020-07-12 20:14:37');
INSERT INTO `kepemilikanrumah` VALUES (3, 'Kontrak/Sewa', '2020-07-12 20:16:18');

-- ----------------------------
-- Table structure for kepemilikantanah
-- ----------------------------
DROP TABLE IF EXISTS `kepemilikantanah`;
CREATE TABLE `kepemilikantanah`  (
  `kepemilikantanah_id` int(11) NOT NULL AUTO_INCREMENT,
  `kepemilikantanah_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`kepemilikantanah_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kepemilikantanah
-- ----------------------------
INSERT INTO `kepemilikantanah` VALUES (1, 'Milik Sendiri', '2020-07-12 20:15:37');
INSERT INTO `kepemilikantanah` VALUES (2, 'Bukan Milik Sendiri', '2020-07-12 20:15:54');
INSERT INTO `kepemilikantanah` VALUES (3, 'Tanah Negara', '2020-07-12 20:16:03');

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level`  (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level_status` bit(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `level_dashboard` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`level_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES (1, 'Administrator', b'1', '2020-02-17 04:22:59', 'dashboard/dashboard');
INSERT INTO `level` VALUES (2, 'Operator', b'1', '2020-07-13 19:28:52', 'Dashboard/dashboard');
INSERT INTO `level` VALUES (3, 'pemohon', b'1', '2020-07-13 19:29:03', 'Notulen/index');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_iduser` int(11) NULL DEFAULT NULL,
  `log_aksi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `log_level` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 507 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES (3, 34, 'login', '2020-01-02 10:40:04', '1');
INSERT INTO `log` VALUES (21, 4, 'login', '2020-01-02 13:07:42', '1');
INSERT INTO `log` VALUES (22, 4, 'logout', '2020-01-02 13:07:55', '3');
INSERT INTO `log` VALUES (26, 1, 'logout', '2020-01-02 13:08:25', '3');
INSERT INTO `log` VALUES (27, 29, 'login', '2020-01-02 13:08:28', '1');
INSERT INTO `log` VALUES (28, 1, 'password salah', '2020-01-02 13:12:54', '3');
INSERT INTO `log` VALUES (29, 1, 'login', '2020-01-02 13:13:03', '1');
INSERT INTO `log` VALUES (30, 1, 'login', '2020-01-03 10:06:13', '1');
INSERT INTO `log` VALUES (32, 1, 'login', '2020-01-03 10:45:31', '1');
INSERT INTO `log` VALUES (33, 1, 'logout', '2020-01-03 10:48:28', '3');
INSERT INTO `log` VALUES (34, 1, 'login', '2020-01-03 11:06:01', '1');
INSERT INTO `log` VALUES (35, 1, 'logout', '2020-01-03 11:08:25', '3');
INSERT INTO `log` VALUES (36, 1, 'login', '2020-01-03 11:08:28', '1');
INSERT INTO `log` VALUES (37, 1, 'logout', '2020-01-03 11:08:37', '3');
INSERT INTO `log` VALUES (38, 1, 'login', '2020-01-03 11:08:48', '1');
INSERT INTO `log` VALUES (40, 1, 'login', '2020-01-03 11:10:15', '1');
INSERT INTO `log` VALUES (41, 1, 'logout', '2020-01-03 11:14:44', '3');
INSERT INTO `log` VALUES (42, 1, 'login', '2020-01-03 11:17:12', '1');
INSERT INTO `log` VALUES (43, 1, 'logout', '2020-01-03 11:18:20', '3');
INSERT INTO `log` VALUES (44, 1, 'login', '2020-01-03 13:13:46', '1');
INSERT INTO `log` VALUES (45, 1, 'logout', '2020-01-03 13:16:43', '3');
INSERT INTO `log` VALUES (46, 1, 'login', '2020-01-06 12:44:51', '1');
INSERT INTO `log` VALUES (47, 1, 'logout', '2020-01-07 03:22:39', '3');
INSERT INTO `log` VALUES (48, 1, 'login', '2020-01-07 03:22:45', '1');
INSERT INTO `log` VALUES (49, 1, 'login', '2020-01-08 01:18:02', '1');
INSERT INTO `log` VALUES (50, 1, 'login', '2020-01-09 20:39:02', '1');
INSERT INTO `log` VALUES (51, 1, 'login', '2020-01-10 17:45:11', '1');
INSERT INTO `log` VALUES (52, 1, 'logout', '2020-01-10 17:54:19', '3');
INSERT INTO `log` VALUES (53, 1, 'login', '2020-01-14 17:49:03', '1');
INSERT INTO `log` VALUES (54, 1, 'logout', '2020-01-14 18:05:20', '3');
INSERT INTO `log` VALUES (55, 1, 'login', '2020-01-14 18:09:09', '1');
INSERT INTO `log` VALUES (56, 1, 'logout', '2020-01-14 18:10:13', '3');
INSERT INTO `log` VALUES (57, 1, 'login', '2020-01-14 18:28:23', '1');
INSERT INTO `log` VALUES (58, 1, 'logout', '2020-01-14 18:53:38', '3');
INSERT INTO `log` VALUES (59, 1, 'login', '2020-01-20 20:21:25', '1');
INSERT INTO `log` VALUES (60, 1, 'login', '2020-01-24 17:46:31', '1');
INSERT INTO `log` VALUES (61, 1, 'login', '2020-02-01 16:11:33', '1');
INSERT INTO `log` VALUES (62, 1, 'logout', '2020-02-01 16:36:46', '3');
INSERT INTO `log` VALUES (63, 1, 'login', '2020-02-01 16:36:50', '1');
INSERT INTO `log` VALUES (64, 1, 'logout', '2020-02-01 18:11:06', '3');
INSERT INTO `log` VALUES (65, 1, 'login', '2020-02-01 18:11:16', '1');
INSERT INTO `log` VALUES (66, 1, 'logout', '2020-02-01 18:11:37', '3');
INSERT INTO `log` VALUES (67, 29, 'password salah', '2020-02-01 18:11:40', '3');
INSERT INTO `log` VALUES (68, 29, 'login', '2020-02-01 18:11:44', '1');
INSERT INTO `log` VALUES (69, 1, 'login', '2020-02-05 20:15:29', '1');
INSERT INTO `log` VALUES (70, 1, 'logout', '2020-02-05 20:16:05', '3');
INSERT INTO `log` VALUES (71, 29, 'password salah', '2020-02-05 20:16:08', '3');
INSERT INTO `log` VALUES (72, 29, 'login', '2020-02-05 20:16:12', '1');
INSERT INTO `log` VALUES (73, 1, 'login', '2020-02-06 18:46:40', '1');
INSERT INTO `log` VALUES (74, 1, 'login', '2020-02-06 23:08:37', '1');
INSERT INTO `log` VALUES (75, 1, 'login', '2020-02-07 15:43:09', '1');
INSERT INTO `log` VALUES (76, 1, 'logout', '2020-02-07 17:15:44', '3');
INSERT INTO `log` VALUES (77, 37, 'login', '2020-02-07 17:15:52', '1');
INSERT INTO `log` VALUES (78, 37, 'logout', '2020-02-07 17:33:55', '3');
INSERT INTO `log` VALUES (79, 37, 'login', '2020-02-07 17:34:01', '1');
INSERT INTO `log` VALUES (80, 37, 'logout', '2020-02-07 17:35:37', '3');
INSERT INTO `log` VALUES (81, 37, 'login', '2020-02-07 17:35:42', '1');
INSERT INTO `log` VALUES (82, NULL, 'logout', '2020-02-07 22:55:57', '3');
INSERT INTO `log` VALUES (83, 1, 'login', '2020-02-07 23:28:01', '1');
INSERT INTO `log` VALUES (84, 1, 'logout', '2020-02-07 23:28:07', '3');
INSERT INTO `log` VALUES (85, 37, 'login', '2020-02-07 23:28:13', '1');
INSERT INTO `log` VALUES (86, 37, 'login', '2020-02-10 16:54:57', '1');
INSERT INTO `log` VALUES (87, 37, 'logout', '2020-02-10 17:12:24', '3');
INSERT INTO `log` VALUES (88, 37, 'login', '2020-02-10 17:12:31', '1');
INSERT INTO `log` VALUES (89, 37, 'login', '2020-02-11 17:32:28', '1');
INSERT INTO `log` VALUES (90, 37, 'logout', '2020-02-11 18:44:40', '3');
INSERT INTO `log` VALUES (91, 37, 'login', '2020-02-11 19:58:19', '1');
INSERT INTO `log` VALUES (92, 37, 'logout', '2020-02-11 20:07:18', '3');
INSERT INTO `log` VALUES (93, 1, 'login', '2020-02-11 23:10:34', '1');
INSERT INTO `log` VALUES (94, 1, 'logout', '2020-02-11 23:13:29', '3');
INSERT INTO `log` VALUES (95, 1, 'login', '2020-02-11 23:13:41', '1');
INSERT INTO `log` VALUES (96, 1, 'logout', '2020-02-11 23:15:17', '3');
INSERT INTO `log` VALUES (97, 1, 'login', '2020-02-15 15:22:06', '1');
INSERT INTO `log` VALUES (98, 1, 'logout', '2020-02-15 16:07:30', '3');
INSERT INTO `log` VALUES (99, 37, 'login', '2020-02-15 16:10:27', '1');
INSERT INTO `log` VALUES (100, 37, 'logout', '2020-02-15 16:10:32', '3');
INSERT INTO `log` VALUES (101, 1, 'login', '2020-02-15 16:10:35', '1');
INSERT INTO `log` VALUES (102, 1, 'logout', '2020-02-15 16:19:29', '3');
INSERT INTO `log` VALUES (103, 37, 'login', '2020-02-15 16:19:35', '1');
INSERT INTO `log` VALUES (104, 37, 'logout', '2020-02-15 16:21:37', '3');
INSERT INTO `log` VALUES (105, 1, 'login', '2020-02-15 16:21:40', '1');
INSERT INTO `log` VALUES (106, 1, 'logout', '2020-02-15 16:22:49', '3');
INSERT INTO `log` VALUES (107, 1, 'login', '2020-02-15 16:22:52', '1');
INSERT INTO `log` VALUES (108, 1, 'login', '2020-02-15 17:17:29', '1');
INSERT INTO `log` VALUES (109, 1, 'logout', '2020-02-15 17:24:03', '3');
INSERT INTO `log` VALUES (110, 1, 'login', '2020-02-15 17:24:06', '1');
INSERT INTO `log` VALUES (111, 1, 'logout', '2020-02-15 17:27:17', '3');
INSERT INTO `log` VALUES (112, 1, 'login', '2020-02-15 17:27:20', '1');
INSERT INTO `log` VALUES (113, 1, 'logout', '2020-02-15 17:28:06', '3');
INSERT INTO `log` VALUES (114, 37, 'login', '2020-02-15 17:28:15', '1');
INSERT INTO `log` VALUES (115, 37, 'logout', '2020-02-15 17:28:43', '3');
INSERT INTO `log` VALUES (116, 37, 'login', '2020-02-15 17:28:51', '1');
INSERT INTO `log` VALUES (117, 37, 'logout', '2020-02-15 17:29:27', '3');
INSERT INTO `log` VALUES (118, 1, 'login', '2020-02-15 17:29:30', '1');
INSERT INTO `log` VALUES (119, 1, 'logout', '2020-02-15 17:31:54', '3');
INSERT INTO `log` VALUES (120, 1, 'login', '2020-02-15 17:31:59', '1');
INSERT INTO `log` VALUES (121, 1, 'logout', '2020-02-15 17:33:42', '3');
INSERT INTO `log` VALUES (122, 1, 'login', '2020-02-15 17:33:52', '1');
INSERT INTO `log` VALUES (123, 1, 'logout', '2020-02-15 17:39:27', '3');
INSERT INTO `log` VALUES (124, 36, 'login', '2020-02-15 17:39:35', '1');
INSERT INTO `log` VALUES (125, 36, 'logout', '2020-02-15 17:39:44', '3');
INSERT INTO `log` VALUES (126, 1, 'login', '2020-02-15 17:39:49', '1');
INSERT INTO `log` VALUES (127, 36, 'login', '2020-02-15 18:21:09', '1');
INSERT INTO `log` VALUES (128, 1, 'login', '2020-02-15 19:45:36', '1');
INSERT INTO `log` VALUES (129, 1, 'logout', '2020-02-15 22:13:59', '3');
INSERT INTO `log` VALUES (130, 1, 'login', '2020-02-15 22:39:09', '1');
INSERT INTO `log` VALUES (131, 1, 'logout', '2020-02-16 00:02:04', '3');
INSERT INTO `log` VALUES (132, 1, 'login', '2020-02-16 02:36:05', '1');
INSERT INTO `log` VALUES (133, 1, 'login', '2020-02-17 01:53:35', '1');
INSERT INTO `log` VALUES (134, 1, 'logout', '2020-02-17 04:20:43', '3');
INSERT INTO `log` VALUES (135, 1, 'login', '2020-02-17 04:20:46', '1');
INSERT INTO `log` VALUES (136, 1, 'logout', '2020-02-17 04:21:14', '3');
INSERT INTO `log` VALUES (137, 1, 'login', '2020-02-17 04:21:18', '1');
INSERT INTO `log` VALUES (138, 1, 'logout', '2020-02-17 04:22:10', '3');
INSERT INTO `log` VALUES (139, 1, 'login', '2020-02-17 04:22:14', '1');
INSERT INTO `log` VALUES (140, 1, 'logout', '2020-02-17 04:22:39', '3');
INSERT INTO `log` VALUES (141, 1, 'login', '2020-02-17 04:22:43', '1');
INSERT INTO `log` VALUES (142, 1, 'logout', '2020-02-17 04:23:03', '3');
INSERT INTO `log` VALUES (143, 1, 'login', '2020-02-17 04:23:07', '1');
INSERT INTO `log` VALUES (144, 1, 'login', '2020-02-17 22:42:39', '1');
INSERT INTO `log` VALUES (145, 1, 'login', '2020-02-18 18:41:17', '1');
INSERT INTO `log` VALUES (146, 1, 'login', '2020-02-19 15:35:16', '1');
INSERT INTO `log` VALUES (147, 1, 'login', '2020-02-19 18:02:02', '1');
INSERT INTO `log` VALUES (148, 1, 'login', '2020-02-19 22:37:54', '1');
INSERT INTO `log` VALUES (149, 1, 'logout', '2020-02-19 23:24:59', '3');
INSERT INTO `log` VALUES (150, 1, 'login', '2020-02-19 23:34:19', '1');
INSERT INTO `log` VALUES (151, 1, 'logout', '2020-02-20 00:00:36', '3');
INSERT INTO `log` VALUES (152, 1, 'login', '2020-02-20 15:13:06', '1');
INSERT INTO `log` VALUES (153, 1, 'login', '2020-02-25 20:56:36', '1');
INSERT INTO `log` VALUES (154, 1, 'password salah', '2020-02-26 17:27:11', '3');
INSERT INTO `log` VALUES (155, 1, 'login', '2020-02-26 17:27:15', '1');
INSERT INTO `log` VALUES (156, 1, 'login', '2020-02-27 18:02:42', '1');
INSERT INTO `log` VALUES (157, 1, 'login', '2020-02-27 22:33:44', '1');
INSERT INTO `log` VALUES (158, 1, 'login', '2020-02-29 17:11:49', '1');
INSERT INTO `log` VALUES (159, 1, 'login', '2020-02-29 21:06:33', '1');
INSERT INTO `log` VALUES (160, 1, 'login', '2020-02-29 21:25:14', '1');
INSERT INTO `log` VALUES (161, 1, 'login', '2020-02-29 23:14:54', '1');
INSERT INTO `log` VALUES (162, 1, 'login', '2020-03-02 18:40:30', '1');
INSERT INTO `log` VALUES (163, 1, 'logout', '2020-03-02 18:40:42', '3');
INSERT INTO `log` VALUES (164, 1, 'login', '2020-03-02 18:43:24', '1');
INSERT INTO `log` VALUES (165, 1, 'logout', '2020-03-02 18:43:29', '3');
INSERT INTO `log` VALUES (166, 1, 'login', '2020-03-03 23:03:12', '1');
INSERT INTO `log` VALUES (167, 1, 'login', '2020-03-04 22:49:08', '1');
INSERT INTO `log` VALUES (168, 1, 'logout', '2020-03-04 23:47:26', '3');
INSERT INTO `log` VALUES (169, 1, 'login', '2020-03-05 23:57:42', '1');
INSERT INTO `log` VALUES (170, 1, 'login', '2020-03-09 17:34:08', '1');
INSERT INTO `log` VALUES (171, 1, 'login', '2020-03-09 22:45:42', '1');
INSERT INTO `log` VALUES (172, 1, 'login', '2020-03-10 16:49:51', '1');
INSERT INTO `log` VALUES (173, 1, 'login', '2020-03-10 23:05:27', '1');
INSERT INTO `log` VALUES (174, 1, 'logout', '2020-03-10 23:44:11', '3');
INSERT INTO `log` VALUES (175, 1, 'login', '2020-03-11 14:44:12', '1');
INSERT INTO `log` VALUES (176, 1, 'logout', '2020-03-11 16:29:25', '3');
INSERT INTO `log` VALUES (177, 1, 'login', '2020-03-11 23:09:12', '1');
INSERT INTO `log` VALUES (178, 1, 'login', '2020-03-14 17:42:31', '1');
INSERT INTO `log` VALUES (179, 1, 'login', '2020-03-14 17:44:21', '1');
INSERT INTO `log` VALUES (180, 1, 'login', '2020-03-16 22:00:19', '1');
INSERT INTO `log` VALUES (181, 1, 'login', '2020-03-17 14:56:49', '1');
INSERT INTO `log` VALUES (182, 1, 'logout', '2020-03-17 18:54:37', '3');
INSERT INTO `log` VALUES (183, 1, 'login', '2020-03-17 18:55:35', '1');
INSERT INTO `log` VALUES (184, 1, 'logout', '2020-03-17 18:57:30', '3');
INSERT INTO `log` VALUES (185, 1, 'login', '2020-03-17 19:55:04', '1');
INSERT INTO `log` VALUES (186, 1, 'login', '2020-03-18 18:27:10', '1');
INSERT INTO `log` VALUES (187, 1, 'logout', '2020-03-18 18:31:27', '3');
INSERT INTO `log` VALUES (188, 1, 'login', '2020-03-18 22:36:28', '1');
INSERT INTO `log` VALUES (189, 1, 'logout', '2020-03-18 23:00:51', '3');
INSERT INTO `log` VALUES (190, 1, 'login', '2020-03-18 23:06:25', '1');
INSERT INTO `log` VALUES (191, 1, 'logout', '2020-03-18 23:06:36', '3');
INSERT INTO `log` VALUES (192, 1, 'login', '2020-03-18 23:17:00', '1');
INSERT INTO `log` VALUES (193, 1, 'login', '2020-03-19 15:56:29', '1');
INSERT INTO `log` VALUES (194, 1, 'login', '2020-03-19 18:06:57', '1');
INSERT INTO `log` VALUES (195, 1, 'logout', '2020-03-19 18:48:11', '3');
INSERT INTO `log` VALUES (196, 1, 'login', '2020-03-19 19:49:47', '1');
INSERT INTO `log` VALUES (197, 1, 'login', '2020-03-23 20:50:38', '1');
INSERT INTO `log` VALUES (198, 1, 'logout', '2020-03-23 20:51:08', '3');
INSERT INTO `log` VALUES (199, 1, 'login', '2020-03-23 20:51:12', '1');
INSERT INTO `log` VALUES (200, 1, 'logout', '2020-03-23 21:06:06', '3');
INSERT INTO `log` VALUES (201, 1, 'login', '2020-03-23 21:09:00', '1');
INSERT INTO `log` VALUES (202, 1, 'logout', '2020-03-23 21:09:03', '3');
INSERT INTO `log` VALUES (203, 1, 'login', '2020-03-23 21:09:08', '1');
INSERT INTO `log` VALUES (204, 1, 'logout', '2020-03-23 21:09:18', '3');
INSERT INTO `log` VALUES (205, 1, 'login', '2020-03-23 21:09:35', '1');
INSERT INTO `log` VALUES (206, 1, 'logout', '2020-03-23 21:09:44', '3');
INSERT INTO `log` VALUES (207, 1, 'login', '2020-03-23 21:11:57', '1');
INSERT INTO `log` VALUES (208, 1, 'logout', '2020-03-23 21:12:16', '3');
INSERT INTO `log` VALUES (209, 1, 'login', '2020-03-23 21:15:48', '1');
INSERT INTO `log` VALUES (210, 1, 'logout', '2020-03-23 21:23:01', '3');
INSERT INTO `log` VALUES (211, 1, 'login', '2020-03-23 21:23:05', '1');
INSERT INTO `log` VALUES (212, 1, 'logout', '2020-03-23 21:25:48', '3');
INSERT INTO `log` VALUES (213, 1, 'login', '2020-03-23 21:25:52', '1');
INSERT INTO `log` VALUES (214, 1, 'login', '2020-03-24 03:56:14', '1');
INSERT INTO `log` VALUES (215, 1, 'logout', '2020-03-24 05:23:32', '3');
INSERT INTO `log` VALUES (216, 1, 'login', '2020-03-26 00:11:19', '1');
INSERT INTO `log` VALUES (217, 1, 'logout', '2020-03-26 00:48:36', '3');
INSERT INTO `log` VALUES (222, 1, 'login', '2020-03-26 04:05:39', '1');
INSERT INTO `log` VALUES (230, NULL, 'logout', '2020-03-28 03:02:26', '3');
INSERT INTO `log` VALUES (233, 37, 'login', '2020-03-28 04:52:00', '1');
INSERT INTO `log` VALUES (234, 37, 'logout', '2020-03-28 04:56:14', '3');
INSERT INTO `log` VALUES (237, 1, 'login', '2020-05-02 17:56:25', '1');
INSERT INTO `log` VALUES (241, 1, 'logout', '2020-05-02 18:00:56', '3');
INSERT INTO `log` VALUES (244, 1, 'login', '2020-05-02 18:08:17', '1');
INSERT INTO `log` VALUES (245, 1, 'logout', '2020-05-02 18:11:34', '3');
INSERT INTO `log` VALUES (246, 1, 'login', '2020-05-02 18:11:39', '1');
INSERT INTO `log` VALUES (247, 1, 'logout', '2020-05-02 19:02:13', '3');
INSERT INTO `log` VALUES (251, 1, 'login', '2020-05-03 18:37:57', '1');
INSERT INTO `log` VALUES (252, 1, 'logout', '2020-05-03 18:38:11', '3');
INSERT INTO `log` VALUES (254, 1, 'login', '2020-05-08 18:37:05', '1');
INSERT INTO `log` VALUES (255, 1, 'logout', '2020-05-08 19:27:50', '3');
INSERT INTO `log` VALUES (256, 1, 'login', '2020-05-08 19:27:54', '1');
INSERT INTO `log` VALUES (257, 1, 'logout', '2020-05-08 19:44:34', '3');
INSERT INTO `log` VALUES (258, 1, 'login', '2020-05-08 19:49:02', '1');
INSERT INTO `log` VALUES (259, 1, 'logout', '2020-05-08 19:50:38', '3');
INSERT INTO `log` VALUES (260, 1, 'login', '2020-05-08 19:54:00', '1');
INSERT INTO `log` VALUES (261, 1, 'logout', '2020-05-08 19:54:10', '3');
INSERT INTO `log` VALUES (262, 1, 'login', '2020-05-08 19:54:28', '1');
INSERT INTO `log` VALUES (263, 1, 'logout', '2020-05-08 19:59:51', '3');
INSERT INTO `log` VALUES (264, 1, 'login', '2020-05-08 20:01:07', '1');
INSERT INTO `log` VALUES (265, 1, 'login', '2020-05-17 01:57:54', '1');
INSERT INTO `log` VALUES (266, 1, 'logout', '2020-05-17 06:11:12', '3');
INSERT INTO `log` VALUES (267, 1, 'login', '2020-05-17 17:05:49', '1');
INSERT INTO `log` VALUES (268, 1, 'login', '2020-05-21 19:12:55', '1');
INSERT INTO `log` VALUES (269, 1, 'logout', '2020-05-21 20:14:50', '3');
INSERT INTO `log` VALUES (270, 29, 'login', '2020-05-21 20:14:53', '1');
INSERT INTO `log` VALUES (271, 29, 'logout', '2020-05-21 20:15:42', '3');
INSERT INTO `log` VALUES (272, 1, 'login', '2020-05-21 20:16:00', '1');
INSERT INTO `log` VALUES (273, 1, 'logout', '2020-05-21 20:16:45', '3');
INSERT INTO `log` VALUES (274, 29, 'login', '2020-05-21 20:16:53', '1');
INSERT INTO `log` VALUES (275, 29, 'logout', '2020-05-21 20:23:54', '3');
INSERT INTO `log` VALUES (276, 29, 'login', '2020-05-21 20:24:01', '1');
INSERT INTO `log` VALUES (277, 29, 'logout', '2020-05-21 20:24:14', '3');
INSERT INTO `log` VALUES (278, 1, 'login', '2020-05-21 20:24:19', '1');
INSERT INTO `log` VALUES (279, 1, 'logout', '2020-05-21 20:24:41', '3');
INSERT INTO `log` VALUES (280, 12, 'login', '2020-05-21 20:24:44', '1');
INSERT INTO `log` VALUES (281, 12, 'logout', '2020-05-21 20:25:05', '3');
INSERT INTO `log` VALUES (282, 1, 'login', '2020-05-21 20:25:18', '1');
INSERT INTO `log` VALUES (283, 1, 'logout', '2020-05-21 21:10:38', '3');
INSERT INTO `log` VALUES (284, 1, 'login', '2020-05-21 21:10:49', '1');
INSERT INTO `log` VALUES (285, 1, 'logout', '2020-05-21 21:12:59', '3');
INSERT INTO `log` VALUES (286, 29, 'login', '2020-05-21 21:13:07', '1');
INSERT INTO `log` VALUES (287, 29, 'logout', '2020-05-21 21:13:50', '3');
INSERT INTO `log` VALUES (288, 1, 'login', '2020-05-21 21:13:53', '1');
INSERT INTO `log` VALUES (289, 1, 'logout', '2020-05-21 21:14:15', '3');
INSERT INTO `log` VALUES (290, 1, 'login', '2020-05-21 21:14:18', '1');
INSERT INTO `log` VALUES (291, 1, 'logout', '2020-05-21 21:14:37', '3');
INSERT INTO `log` VALUES (292, 29, 'login', '2020-05-21 21:15:41', '1');
INSERT INTO `log` VALUES (293, 29, 'logout', '2020-05-21 21:15:58', '3');
INSERT INTO `log` VALUES (294, 29, 'login', '2020-05-21 21:16:02', '1');
INSERT INTO `log` VALUES (295, 1, 'login', '2020-05-22 02:27:27', '1');
INSERT INTO `log` VALUES (296, 1, 'logout', '2020-05-22 04:47:15', '3');
INSERT INTO `log` VALUES (297, 1, 'login', '2020-05-22 04:47:26', '1');
INSERT INTO `log` VALUES (298, 1, 'login', '2020-05-29 03:38:29', '1');
INSERT INTO `log` VALUES (299, 1, 'logout', '2020-05-29 03:47:46', '3');
INSERT INTO `log` VALUES (300, 1, 'login', '2020-05-29 03:47:52', '1');
INSERT INTO `log` VALUES (301, 1, 'login', '2020-05-30 15:03:03', '1');
INSERT INTO `log` VALUES (302, 1, 'logout', '2020-05-30 16:59:25', '3');
INSERT INTO `log` VALUES (303, 1, 'login', '2020-05-30 17:19:23', '1');
INSERT INTO `log` VALUES (304, 1, 'login', '2020-05-31 00:25:29', '1');
INSERT INTO `log` VALUES (305, 1, 'logout', '2020-05-31 00:36:52', '3');
INSERT INTO `log` VALUES (306, 1, 'login', '2020-05-31 00:36:55', '1');
INSERT INTO `log` VALUES (307, 1, 'logout', '2020-05-31 00:39:43', '3');
INSERT INTO `log` VALUES (308, 1, 'login', '2020-05-31 00:39:46', '1');
INSERT INTO `log` VALUES (309, 1, 'login', '2020-05-31 00:40:00', '1');
INSERT INTO `log` VALUES (310, 1, 'logout', '2020-05-31 00:40:34', '3');
INSERT INTO `log` VALUES (311, 1, 'login', '2020-05-31 00:40:36', '1');
INSERT INTO `log` VALUES (312, 1, 'logout', '2020-05-31 00:41:00', '3');
INSERT INTO `log` VALUES (313, 1, 'login', '2020-05-31 00:41:20', '1');
INSERT INTO `log` VALUES (314, 1, 'logout', '2020-05-31 00:42:01', '3');
INSERT INTO `log` VALUES (315, 1, 'login', '2020-05-31 00:42:04', '1');
INSERT INTO `log` VALUES (316, 1, 'logout', '2020-05-31 00:42:29', '3');
INSERT INTO `log` VALUES (317, 1, 'login', '2020-05-31 00:42:31', '1');
INSERT INTO `log` VALUES (318, 1, 'login', '2020-05-31 00:42:46', '1');
INSERT INTO `log` VALUES (319, 1, 'login', '2020-05-31 00:43:08', '1');
INSERT INTO `log` VALUES (320, 1, 'logout', '2020-05-31 00:43:13', '3');
INSERT INTO `log` VALUES (321, 1, 'login', '2020-05-31 00:43:16', '1');
INSERT INTO `log` VALUES (322, 1, 'logout', '2020-05-31 00:43:19', '3');
INSERT INTO `log` VALUES (323, 1, 'login', '2020-05-31 00:43:49', '1');
INSERT INTO `log` VALUES (324, 1, 'logout', '2020-05-31 00:45:33', '3');
INSERT INTO `log` VALUES (325, 1, 'login', '2020-05-31 00:45:35', '1');
INSERT INTO `log` VALUES (326, 1, 'logout', '2020-05-31 00:45:39', '3');
INSERT INTO `log` VALUES (327, 1, 'login', '2020-05-31 00:46:01', '1');
INSERT INTO `log` VALUES (328, 1, 'logout', '2020-05-31 00:46:06', '3');
INSERT INTO `log` VALUES (329, 1, 'login', '2020-05-31 00:46:21', '1');
INSERT INTO `log` VALUES (330, 1, 'login', '2020-05-31 15:51:07', '1');
INSERT INTO `log` VALUES (331, 1, 'logout', '2020-05-31 16:21:55', '3');
INSERT INTO `log` VALUES (332, 1, 'login', '2020-05-31 16:29:14', '1');
INSERT INTO `log` VALUES (333, 1, 'logout', '2020-05-31 16:32:14', '3');
INSERT INTO `log` VALUES (334, 1, 'login', '2020-05-31 16:32:39', '1');
INSERT INTO `log` VALUES (335, 1, 'logout', '2020-05-31 16:44:58', '3');
INSERT INTO `log` VALUES (336, 29, 'login', '2020-05-31 16:45:07', '1');
INSERT INTO `log` VALUES (337, 29, 'logout', '2020-05-31 16:45:39', '3');
INSERT INTO `log` VALUES (338, 1, 'login', '2020-05-31 16:45:42', '1');
INSERT INTO `log` VALUES (339, 1, 'login', '2020-06-05 20:56:31', '1');
INSERT INTO `log` VALUES (340, 1, 'login', '2020-06-06 08:42:15', '1');
INSERT INTO `log` VALUES (341, 1, 'logout', '2020-06-06 08:52:25', '3');
INSERT INTO `log` VALUES (342, 1, 'login', '2020-06-06 08:54:12', '1');
INSERT INTO `log` VALUES (343, 1, 'logout', '2020-06-06 10:01:44', '3');
INSERT INTO `log` VALUES (344, 1, 'login', '2020-06-06 19:51:28', '1');
INSERT INTO `log` VALUES (345, 1, 'logout', '2020-06-06 19:53:17', '3');
INSERT INTO `log` VALUES (346, 1, 'login', '2020-06-06 20:11:47', '1');
INSERT INTO `log` VALUES (347, 1, 'logout', '2020-06-06 22:31:45', '3');
INSERT INTO `log` VALUES (348, 37, 'login', '2020-06-06 22:31:54', '1');
INSERT INTO `log` VALUES (349, 37, 'logout', '2020-06-06 22:32:17', '3');
INSERT INTO `log` VALUES (350, 1, 'login', '2020-06-06 22:32:20', '1');
INSERT INTO `log` VALUES (351, 1, 'logout', '2020-06-06 22:33:26', '3');
INSERT INTO `log` VALUES (352, 37, 'login', '2020-06-06 22:33:29', '1');
INSERT INTO `log` VALUES (353, 37, 'logout', '2020-06-06 22:41:18', '3');
INSERT INTO `log` VALUES (354, 1, 'login', '2020-06-06 22:41:24', '1');
INSERT INTO `log` VALUES (355, 37, 'login', '2020-06-06 22:42:44', '1');
INSERT INTO `log` VALUES (356, 37, 'logout', '2020-06-06 22:47:27', '3');
INSERT INTO `log` VALUES (357, 1, 'login', '2020-06-08 06:23:49', '1');
INSERT INTO `log` VALUES (358, 37, 'login', '2020-06-08 10:32:12', '1');
INSERT INTO `log` VALUES (359, 37, 'logout', '2020-06-08 10:33:43', '3');
INSERT INTO `log` VALUES (360, 1, 'login', '2020-06-08 10:33:47', '1');
INSERT INTO `log` VALUES (361, 37, 'login', '2020-06-08 10:34:21', '1');
INSERT INTO `log` VALUES (362, 1, 'logout', '2020-06-08 10:36:41', '3');
INSERT INTO `log` VALUES (363, 37, 'login', '2020-06-08 10:56:38', '1');
INSERT INTO `log` VALUES (364, 37, 'logout', '2020-06-08 11:14:54', '3');
INSERT INTO `log` VALUES (365, 1, 'login', '2020-06-08 13:07:10', '1');
INSERT INTO `log` VALUES (366, 37, 'login', '2020-06-08 14:33:33', '1');
INSERT INTO `log` VALUES (367, 37, 'logout', '2020-06-08 14:35:15', '3');
INSERT INTO `log` VALUES (368, 37, 'logout', '2020-06-08 14:46:33', '3');
INSERT INTO `log` VALUES (369, 37, 'login', '2020-06-08 14:47:16', '1');
INSERT INTO `log` VALUES (370, 37, 'logout', '2020-06-08 14:47:52', '3');
INSERT INTO `log` VALUES (371, 37, 'login', '2020-06-08 15:19:43', '1');
INSERT INTO `log` VALUES (372, 37, 'login', '2020-06-09 08:22:38', '1');
INSERT INTO `log` VALUES (373, 37, 'logout', '2020-06-09 08:28:43', '3');
INSERT INTO `log` VALUES (374, 37, 'login', '2020-06-09 08:38:29', '1');
INSERT INTO `log` VALUES (375, 37, 'login', '2020-06-09 08:45:37', '1');
INSERT INTO `log` VALUES (376, 37, 'logout', '2020-06-09 08:45:47', '3');
INSERT INTO `log` VALUES (377, 37, 'login', '2020-06-09 08:46:44', '1');
INSERT INTO `log` VALUES (378, 37, 'logout', '2020-06-09 08:47:47', '3');
INSERT INTO `log` VALUES (379, 37, 'login', '2020-06-09 13:33:26', '1');
INSERT INTO `log` VALUES (380, 37, 'logout', '2020-06-09 13:36:38', '3');
INSERT INTO `log` VALUES (381, 37, 'login', '2020-06-09 13:36:39', '1');
INSERT INTO `log` VALUES (382, 1, 'login', '2020-06-09 13:37:04', '1');
INSERT INTO `log` VALUES (383, 1, 'logout', '2020-06-09 13:38:25', '3');
INSERT INTO `log` VALUES (384, 1, 'login', '2020-06-09 13:38:29', '1');
INSERT INTO `log` VALUES (385, 37, 'logout', '2020-06-09 13:40:34', '3');
INSERT INTO `log` VALUES (386, 37, 'login', '2020-06-09 13:42:00', '1');
INSERT INTO `log` VALUES (387, 1, 'logout', '2020-06-09 13:42:18', '3');
INSERT INTO `log` VALUES (388, 37, 'login', '2020-06-09 14:04:43', '1');
INSERT INTO `log` VALUES (389, 1, 'login', '2020-06-09 16:14:30', '1');
INSERT INTO `log` VALUES (390, 1, 'logout', '2020-06-09 16:18:55', '3');
INSERT INTO `log` VALUES (391, 1, 'login', '2020-06-09 16:19:01', '1');
INSERT INTO `log` VALUES (392, 1, 'logout', '2020-06-09 18:05:34', '3');
INSERT INTO `log` VALUES (393, 1, 'login', '2020-06-09 18:07:29', '1');
INSERT INTO `log` VALUES (394, 1, 'logout', '2020-06-09 18:07:49', '3');
INSERT INTO `log` VALUES (395, 1, 'login', '2020-06-09 18:10:12', '1');
INSERT INTO `log` VALUES (396, 1, 'login', '2020-06-09 18:22:05', '1');
INSERT INTO `log` VALUES (397, 1, 'logout', '2020-06-09 18:23:01', '3');
INSERT INTO `log` VALUES (398, 1, 'login', '2020-06-09 18:23:07', '1');
INSERT INTO `log` VALUES (399, 1, 'login', '2020-06-09 18:26:19', '1');
INSERT INTO `log` VALUES (400, 1, 'logout', '2020-06-09 18:49:20', '3');
INSERT INTO `log` VALUES (401, 1, 'logout', '2020-06-09 19:54:03', '3');
INSERT INTO `log` VALUES (402, 37, 'login', '2020-06-09 19:54:07', '1');
INSERT INTO `log` VALUES (403, 37, 'logout', '2020-06-09 20:32:07', '3');
INSERT INTO `log` VALUES (404, 1, 'login', '2020-06-10 08:04:26', '1');
INSERT INTO `log` VALUES (405, 1, 'logout', '2020-06-10 08:32:23', '3');
INSERT INTO `log` VALUES (406, 37, 'login', '2020-06-10 09:00:17', '1');
INSERT INTO `log` VALUES (407, 1, 'login', '2020-06-11 08:10:36', '1');
INSERT INTO `log` VALUES (408, 1, 'logout', '2020-06-11 08:12:31', '3');
INSERT INTO `log` VALUES (409, 1, 'login', '2020-06-11 11:11:29', '1');
INSERT INTO `log` VALUES (410, 1, 'logout', '2020-06-11 11:11:52', '3');
INSERT INTO `log` VALUES (411, 1, 'login', '2020-06-11 11:11:55', '1');
INSERT INTO `log` VALUES (412, 1, 'logout', '2020-06-11 11:11:57', '3');
INSERT INTO `log` VALUES (413, 37, 'login', '2020-06-11 13:07:26', '1');
INSERT INTO `log` VALUES (414, 1, 'login', '2020-06-11 13:41:30', '1');
INSERT INTO `log` VALUES (415, 1, 'logout', '2020-06-11 13:42:11', '3');
INSERT INTO `log` VALUES (416, 1, 'login', '2020-06-11 13:52:57', '1');
INSERT INTO `log` VALUES (417, 1, 'logout', '2020-06-11 13:53:11', '3');
INSERT INTO `log` VALUES (418, 1, 'login', '2020-06-12 08:57:21', '1');
INSERT INTO `log` VALUES (419, 1, 'login', '2020-06-12 09:12:32', '1');
INSERT INTO `log` VALUES (420, 1, 'logout', '2020-06-12 13:48:16', '3');
INSERT INTO `log` VALUES (421, 1, 'login', '2020-06-12 14:08:46', '1');
INSERT INTO `log` VALUES (422, 1, 'login', '2020-06-12 15:04:13', '1');
INSERT INTO `log` VALUES (423, 37, 'login', '2020-06-22 09:09:45', '1');
INSERT INTO `log` VALUES (424, 1, 'login', '2020-06-23 10:02:42', '1');
INSERT INTO `log` VALUES (425, 1, 'logout', '2020-06-23 10:03:50', '3');
INSERT INTO `log` VALUES (426, 1, 'login', '2020-06-23 10:13:42', '1');
INSERT INTO `log` VALUES (427, 1, 'logout', '2020-06-23 10:47:56', '3');
INSERT INTO `log` VALUES (428, 37, 'login', '2020-06-23 10:47:59', '1');
INSERT INTO `log` VALUES (429, 37, 'logout', '2020-06-23 10:49:50', '3');
INSERT INTO `log` VALUES (430, 1, 'login', '2020-06-23 11:04:09', '1');
INSERT INTO `log` VALUES (431, 1, 'logout', '2020-06-23 11:05:37', '3');
INSERT INTO `log` VALUES (432, 37, 'login', '2020-06-30 13:53:38', '1');
INSERT INTO `log` VALUES (433, 1, 'login', '2020-07-01 13:34:04', '1');
INSERT INTO `log` VALUES (434, 1, 'logout', '2020-07-01 13:44:40', '3');
INSERT INTO `log` VALUES (435, 1, 'login', '2020-07-01 13:53:09', '1');
INSERT INTO `log` VALUES (436, 1, 'logout', '2020-07-01 14:34:08', '3');
INSERT INTO `log` VALUES (437, 1, 'login', '2020-07-01 14:34:10', '1');
INSERT INTO `log` VALUES (438, 1, 'logout', '2020-07-01 14:34:53', '3');
INSERT INTO `log` VALUES (439, 37, 'login', '2020-07-01 14:34:57', '1');
INSERT INTO `log` VALUES (440, 37, 'logout', '2020-07-01 14:42:19', '3');
INSERT INTO `log` VALUES (441, 1, 'login', '2020-07-01 14:42:22', '1');
INSERT INTO `log` VALUES (442, 1, 'logout', '2020-07-01 14:42:43', '3');
INSERT INTO `log` VALUES (443, 1, 'login', '2020-07-01 14:42:47', '1');
INSERT INTO `log` VALUES (444, 1, 'login', '2020-07-01 14:46:32', '1');
INSERT INTO `log` VALUES (445, 1, 'logout', '2020-07-01 14:55:41', '3');
INSERT INTO `log` VALUES (446, 37, 'login', '2020-07-01 14:55:46', '1');
INSERT INTO `log` VALUES (447, 37, 'logout', '2020-07-01 14:58:01', '3');
INSERT INTO `log` VALUES (448, 1, 'login', '2020-07-01 14:58:03', '1');
INSERT INTO `log` VALUES (449, 1, 'logout', '2020-07-01 15:03:16', '3');
INSERT INTO `log` VALUES (450, 37, 'login', '2020-07-06 09:06:47', '1');
INSERT INTO `log` VALUES (451, 37, 'login', '2020-07-06 15:22:57', '1');
INSERT INTO `log` VALUES (452, 1, 'login', '2020-07-08 10:13:15', '1');
INSERT INTO `log` VALUES (453, 1, 'login', '2020-07-08 14:35:39', '1');
INSERT INTO `log` VALUES (454, 1, 'logout', '2020-07-08 14:49:19', '3');
INSERT INTO `log` VALUES (455, 1, 'login', '2020-07-08 14:49:24', '1');
INSERT INTO `log` VALUES (456, 1, 'login', '2020-07-08 16:01:37', '1');
INSERT INTO `log` VALUES (457, 1, 'logout', '2020-07-08 16:04:07', '3');
INSERT INTO `log` VALUES (458, 1, 'login', '2020-07-08 16:04:12', '1');
INSERT INTO `log` VALUES (459, 1, 'login', '2020-07-09 17:20:11', '1');
INSERT INTO `log` VALUES (460, 1, 'logout', '2020-07-09 17:20:23', '3');
INSERT INTO `log` VALUES (461, 1, 'login', '2020-07-09 17:26:14', '1');
INSERT INTO `log` VALUES (462, 1, 'logout', '2020-07-09 17:26:35', '3');
INSERT INTO `log` VALUES (463, 1, 'login', '2020-07-09 17:26:42', '1');
INSERT INTO `log` VALUES (464, 1, 'logout', '2020-07-09 18:10:39', '3');
INSERT INTO `log` VALUES (465, 1, 'login', '2020-07-09 18:39:54', '1');
INSERT INTO `log` VALUES (466, 1, 'logout', '2020-07-09 19:08:22', '3');
INSERT INTO `log` VALUES (467, 1, 'login', '2020-07-09 19:08:27', '1');
INSERT INTO `log` VALUES (468, 1, 'login', '2020-07-12 18:27:15', '1');
INSERT INTO `log` VALUES (469, 1, 'login', '2020-07-13 07:06:54', '1');
INSERT INTO `log` VALUES (470, 1, 'logout', '2020-07-13 09:01:16', '3');
INSERT INTO `log` VALUES (471, 1, 'login', '2020-07-13 17:19:40', '1');
INSERT INTO `log` VALUES (472, 1, 'logout', '2020-07-13 19:31:47', '3');
INSERT INTO `log` VALUES (473, 38, 'login', '2020-07-13 19:31:51', '1');
INSERT INTO `log` VALUES (474, 38, 'logout', '2020-07-13 19:32:35', '3');
INSERT INTO `log` VALUES (475, 1, 'login', '2020-07-13 19:32:43', '1');
INSERT INTO `log` VALUES (476, 1, 'logout', '2020-07-13 19:33:40', '3');
INSERT INTO `log` VALUES (477, 38, 'login', '2020-07-13 19:33:44', '1');
INSERT INTO `log` VALUES (478, 38, 'logout', '2020-07-13 19:37:30', '3');
INSERT INTO `log` VALUES (479, 38, 'login', '2020-07-13 19:37:34', '1');
INSERT INTO `log` VALUES (480, 38, 'logout', '2020-07-13 19:38:09', '3');
INSERT INTO `log` VALUES (481, 1, 'login', '2020-07-13 19:38:16', '1');
INSERT INTO `log` VALUES (482, 1, 'logout', '2020-07-13 19:43:12', '3');
INSERT INTO `log` VALUES (483, 1, 'login', '2020-07-13 19:56:27', '1');
INSERT INTO `log` VALUES (484, 1, 'logout', '2020-07-13 19:56:47', '3');
INSERT INTO `log` VALUES (485, 1, 'login', '2020-07-13 20:12:16', '1');
INSERT INTO `log` VALUES (486, 1, 'logout', '2020-07-13 20:12:21', '3');
INSERT INTO `log` VALUES (487, 1, 'login', '2020-07-13 20:17:02', '1');
INSERT INTO `log` VALUES (488, 1, 'logout', '2020-07-13 20:18:10', '3');
INSERT INTO `log` VALUES (489, 1, 'login', '2020-07-13 20:29:53', '1');
INSERT INTO `log` VALUES (490, 1, 'logout', '2020-07-13 20:32:07', '3');
INSERT INTO `log` VALUES (491, 1, 'logout', '2020-07-13 20:39:07', '3');
INSERT INTO `log` VALUES (492, 1, 'logout', '2020-07-13 20:47:28', '3');
INSERT INTO `log` VALUES (493, 1, 'logout', '2020-07-13 21:01:24', '3');
INSERT INTO `log` VALUES (494, 38, 'login', '2020-07-13 21:01:29', '1');
INSERT INTO `log` VALUES (495, 38, 'logout', '2020-07-13 21:01:42', '3');
INSERT INTO `log` VALUES (496, 1, 'login', '2020-07-13 21:01:47', '1');
INSERT INTO `log` VALUES (497, 1, 'logout', '2020-07-13 21:03:46', '3');
INSERT INTO `log` VALUES (498, 1, 'logout', '2020-07-13 21:04:45', '3');
INSERT INTO `log` VALUES (499, 38, 'login', '2020-07-13 21:04:48', '1');
INSERT INTO `log` VALUES (500, 38, 'logout', '2020-07-13 21:05:02', '3');
INSERT INTO `log` VALUES (501, 1, 'login', '2020-07-14 09:33:38', '1');
INSERT INTO `log` VALUES (502, 1, 'logout', '2020-07-14 09:34:22', '3');
INSERT INTO `log` VALUES (503, 3, 'logout', '2020-07-14 10:10:34', '3');
INSERT INTO `log` VALUES (504, NULL, NULL, '2020-07-14 10:15:25', NULL);
INSERT INTO `log` VALUES (505, 38, 'login', '2020-07-14 10:28:55', '1');
INSERT INTO `log` VALUES (506, 38, 'logout', '2020-07-14 10:50:07', '3');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_ikon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_is_mainmenu` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_akses_level` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_urutan` int(5) NULL DEFAULT NULL,
  `menu_status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_akses` int(2) NULL DEFAULT NULL,
  `menu_baru` int(2) NULL DEFAULT NULL,
  `menu_label` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 197 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (168, 'setting', 'fas fa-cogs', '0', 'Setting', '1', 96, '1', 1, NULL, 'setting');
INSERT INTO `menu` VALUES (169, 'dashboard', 'fas fa-fire', '0', 'Dashboard', '1,2,3', 1, '1', 1, NULL, 'dashboard');
INSERT INTO `menu` VALUES (170, 'hak_akses', 'fas fa-fire', '168', 'Hakakses', '1', 1, '1', 1, NULL, 'hak akses');
INSERT INTO `menu` VALUES (171, 'log', 'fas fa-file', '0', 'Log', '1', 99, '1', 1, NULL, 'log sistem');
INSERT INTO `menu` VALUES (172, 'sistem', 'fas fa-file', '168', 'Sistem', '1', 1, '1', 1, NULL, 'sistem');
INSERT INTO `menu` VALUES (173, 'level', 'fas fa-file', '168', 'Level', '1', 2, '1', 1, NULL, 'level user');
INSERT INTO `menu` VALUES (174, 'user', 'fas fa-user-cog', '168', 'User', '1', 3, '1', 1, NULL, 'user');
INSERT INTO `menu` VALUES (175, 'backup', 'fas fa-file', '168', 'Backup', '1', 4, '1', 1, NULL, 'backup');
INSERT INTO `menu` VALUES (176, 'profil', 'fas fa-user-cog', '0', 'Profil', '1,2', 97, '1', 1, NULL, 'profil user');
INSERT INTO `menu` VALUES (177, 'laporan', 'fas fa-print', '0', 'Laporan', '1,2', 98, '1', 1, NULL, 'laporan');
INSERT INTO `menu` VALUES (178, 'lap_log', 'fas fa-print', '177', 'Laporan/Log', '1', 1, '1', 1, NULL, 'laporan log');
INSERT INTO `menu` VALUES (179, 'lap_user', 'fas fa-print', '177', 'Laporan/User', '1', 2, '1', 1, NULL, 'laporan user');
INSERT INTO `menu` VALUES (180, 'filemanager', 'fas fa-print', '168', 'Filemanager', '1', 5, '1', 1, NULL, 'file manager');
INSERT INTO `menu` VALUES (191, 'permohonan', 'fas fa-home', '0', 'Permohonan', '1,2,3', 4, '1', 1, NULL, 'permohonan bantuan');
INSERT INTO `menu` VALUES (192, 'lap_permohonan', 'fas fa-print', '177', 'Laporan/Permohonan', '1,2', 3, '1', 1, NULL, 'laporan permohonan');
INSERT INTO `menu` VALUES (193, 'pemohon', 'fas fa-users', '0', 'Pemohon', '1,2,3', 3, '1', 1, NULL, 'pemohon');
INSERT INTO `menu` VALUES (194, 'master', 'fas fa-folder-open', '0', 'Master', '1,2', 2, '1', 1, NULL, 'master data');
INSERT INTO `menu` VALUES (195, 'pendidikan', 'fas fa-users', '194', 'Master/Pendidikan', '1,2', 1, '1', 1, NULL, 'pendidikan');
INSERT INTO `menu` VALUES (196, 'pekerjaan', 'fas fa-users', '194', 'Master/Pekerjaan', '1,2', 2, '1', 1, NULL, 'pekerjaan');

-- ----------------------------
-- Table structure for pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `pekerjaan`;
CREATE TABLE `pekerjaan`  (
  `pekerjaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pekerjaan_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`pekerjaan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pekerjaan
-- ----------------------------
INSERT INTO `pekerjaan` VALUES (1, 'PNS', '2020-07-09 18:51:48');
INSERT INTO `pekerjaan` VALUES (2, 'TNI/POLRI', '2020-07-09 18:53:52');
INSERT INTO `pekerjaan` VALUES (3, 'BUMN/D', '2020-07-09 18:54:06');
INSERT INTO `pekerjaan` VALUES (4, 'PENSIUNAN', '2020-07-09 18:54:24');
INSERT INTO `pekerjaan` VALUES (5, 'PRAMUWISMA', '2020-07-09 18:54:37');
INSERT INTO `pekerjaan` VALUES (6, 'OJEK/SOPIR', '2020-07-09 18:54:47');
INSERT INTO `pekerjaan` VALUES (7, 'HONORER', '2020-07-09 18:54:58');
INSERT INTO `pekerjaan` VALUES (9, 'KARYAWAN', '2020-07-09 19:09:39');

-- ----------------------------
-- Table structure for pemohon
-- ----------------------------
DROP TABLE IF EXISTS `pemohon`;
CREATE TABLE `pemohon`  (
  `pemohon_id` int(11) NOT NULL AUTO_INCREMENT,
  `pemohon_nik` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pemohon_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pemohon_notlp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pemohon_tgllahir` date NULL DEFAULT NULL,
  `pemohon_pendidikanid` int(11) NULL DEFAULT NULL,
  `pemohon_jeniskelamin` binary(1) NULL DEFAULT NULL,
  `pemohon_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pemohon_pekerjaanid` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`pemohon_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemohon
-- ----------------------------
INSERT INTO `pemohon` VALUES (1, '11111', 'Duwi Haryanto', '085725818424', '1995-03-07', 5, 0x31, 'Pedak Wijirejo Pandak Bantul', 9, '2020-07-12 20:08:58');
INSERT INTO `pemohon` VALUES (2, '124124141414141241', 'Revandra Elzio Arsyad', '0856767767876', '1986-07-13', 5, 0x31, 'Bantul', 1, '2020-07-13 07:24:45');
INSERT INTO `pemohon` VALUES (3, '22222', 'Nanas', '085725818424', '1991-07-14', 3, 0x30, 'Bantul', 5, '2020-07-14 09:59:29');
INSERT INTO `pemohon` VALUES (5, '33333', 'gudel', '085725818424', '2020-07-14', 2, 0x31, 'sleman', 7, '2020-07-14 10:25:48');

-- ----------------------------
-- Table structure for pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan`  (
  `pendidikan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`pendidikan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pendidikan
-- ----------------------------
INSERT INTO `pendidikan` VALUES (1, 'SD/SEDERAJAT', '2020-07-09 19:05:15');
INSERT INTO `pendidikan` VALUES (2, 'SMP/SEDERAJAT', '2020-07-09 19:05:29');
INSERT INTO `pendidikan` VALUES (3, 'SMA/SEDERAJAT', '2020-07-09 19:05:36');
INSERT INTO `pendidikan` VALUES (4, 'D1/D2/D3', '2020-07-09 19:05:56');
INSERT INTO `pendidikan` VALUES (5, 'D4/S1', '2020-07-09 19:10:43');
INSERT INTO `pendidikan` VALUES (6, 'TIDAK PUNYA IJAZAH', '2020-07-09 19:04:48');

-- ----------------------------
-- Table structure for permohonan
-- ----------------------------
DROP TABLE IF EXISTS `permohonan`;
CREATE TABLE `permohonan`  (
  `permohonan_id` int(11) NOT NULL AUTO_INCREMENT,
  `permohonan_pemohonid` int(11) NULL DEFAULT NULL,
  `permohonan_kepemilikantanahid` int(11) NULL DEFAULT NULL,
  `permohonan_kepemilikanrumahid` int(11) NULL DEFAULT NULL,
  `permohonan_asetrumah` bit(1) NULL DEFAULT NULL,
  `permohonan_asettanah` bit(1) NULL DEFAULT NULL,
  `permohonan_bantuansebelumnya` int(1) NULL DEFAULT NULL,
  `permohonan_kawasanrumahid` int(11) NULL DEFAULT NULL,
  `permohonan_aproval` int(1) NULL DEFAULT NULL,
  `permohonan_fotorumah` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `permohonan_catatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`permohonan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permohonan
-- ----------------------------
INSERT INTO `permohonan` VALUES (1, 1, 2, 1, b'1', b'0', 0, 7, 0, '421a151dccf6fc5510fd152a79d0603c.png', '2020-07-12 07:24:00', NULL);
INSERT INTO `permohonan` VALUES (3, 2, 1, 1, b'1', b'1', 0, 10, 0, '421a151dccf6fc5510fd152a79d0603b.png', '2020-06-10 08:25:40', NULL);
INSERT INTO `permohonan` VALUES (4, 3, 1, 1, b'0', b'0', 0, 10, 1, '847d850013591efe4a05201c4aee9604.png', '2020-07-14 10:06:35', NULL);
INSERT INTO `permohonan` VALUES (5, 5, 1, 1, b'0', b'0', 0, 11, 1, '7320d3657bb8b4221072afe5d36e7534.png', '2020-07-14 10:27:11', 'silahkan datang ke kantor pada jam kerja untuk proses selanjutnya');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_namasistem` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `setting_namatempat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `setting_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `setting_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `setting_notlp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `setting_logo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `setting_tagline` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `setting_namapemilik` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`setting_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (1, 'RTLH', 'Array Motion', 'Jl.bantul Km 10', 'haryanto.duwi@gmail.com', '085725818424', '3663fdabf683f180798ed04287b0c189.png', 'RTLH SLEMAN', 'Duwi haryantoo');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_level` int(5) NULL DEFAULT NULL,
  `user_terdaftar` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `user_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_status` bit(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `user_foto` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `user_dashboard` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '55b8fc9d106b1124cdd1ea3cbf98bd6e', 'Administrator', 1, '2018-09-29 00:00:00', 'Admin@gmail.com', b'1', '2020-05-01 21:21:52', '42c47f96f8b16e06bd0457c52cd2825e.jpg', 'Dashboard');
INSERT INTO `user` VALUES (37, 'mutu', '374beb0c5da1e3912d391b64705da2a1', 'mutu', 13, '2020-06-06 22:31:40', 'mutu@rsuii.co.id', b'1', '2020-06-06 22:31:40', 'e0e9a7a5c0fb8e62a2af1c5fe74f57a3.jpg', 'Kuisioner');
INSERT INTO `user` VALUES (38, 'rizal', '150fb021c56c33f82eef99253eb36ee1', 'rizal', 2, '2020-07-13 19:29:40', 'rizal@gmail.com', b'1', '2020-07-13 19:29:40', '5804d7dbb2ab8ce1bb8589f67051ac28.jpg', 'Dashboard');
INSERT INTO `user` VALUES (39, 'developer', '5e8edd851d2fdfbd7415232c67367cc3', 'developer', 1, '2020-07-13 19:33:33', 'dev@gmail.com', b'1', '2020-07-13 19:33:33', NULL, 'Dashboard');

SET FOREIGN_KEY_CHECKS = 1;
