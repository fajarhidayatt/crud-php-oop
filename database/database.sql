/*
 Navicat Premium Data Transfer

 Source Server         : myLocal
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : database

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 12/04/2021 09:06:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `Nim` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Nama_Mhs` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Tgl_Lahir` date NOT NULL,
  `Alamat` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Jenis_Kelamin` enum('Laki-laki','Perempuan') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Nim`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('2003040001', 'Diana Saputri', '1999-02-27', 'Jl. Ahmad Yani No.20 Banjarnegara', 'Perempuan');
INSERT INTO `mahasiswa` VALUES ('2003040002', 'Siska Dewi', '2000-01-06', 'Perumahan Pondok Gede Purworejo', 'Perempuan');
INSERT INTO `mahasiswa` VALUES ('2003040003', 'Rendi Dwi Sakti', '2000-05-10', 'Jl. Agung Gamalang Sari No. 07 Magelang', 'Laki-laki');

SET FOREIGN_KEY_CHECKS = 1;
