/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MariaDB
 Source Server Version : 100109
 Source Host           : 127.0.0.1:3306
 Source Schema         : db_hotel

 Target Server Type    : MariaDB
 Target Server Version : 100109
 File Encoding         : 65001

 Date: 25/08/2021 11:44:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ballroom
-- ----------------------------
DROP TABLE IF EXISTS `ballroom`;
CREATE TABLE `ballroom`  (
  `id_ballroom` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ballroom` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kapasitas` int(11) NULL DEFAULT NULL,
  `harga` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_ballroom`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ballroom
-- ----------------------------
INSERT INTO `ballroom` VALUES (1, 'Ballroom 1', 'ruangan ini memiliki kapasitas 100 orang dengan fasilitas...', 100, '1000000', 0);

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking`  (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) NULL DEFAULT NULL,
  `id_ballroom` int(11) NULL DEFAULT NULL,
  `tgl_booking` date NULL DEFAULT NULL,
  `tgl_event` date NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `deposit` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total_bayar` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_booking`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES (2, 2108, 1, '2021-08-16', '2021-08-23', 'test', '100000', NULL, 1);
INSERT INTO `booking` VALUES (3, 2108, 1, '2021-08-16', '2021-08-24', 'test', '100000', NULL, 1);

-- ----------------------------
-- Table structure for booking_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `booking_transaksi`;
CREATE TABLE `booking_transaksi`  (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_booking` int(11) NULL DEFAULT NULL,
  `nama_transaksi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of booking_transaksi
-- ----------------------------
INSERT INTO `booking_transaksi` VALUES (2, 1, 'Tambahan Kursi', '150000');
INSERT INTO `booking_transaksi` VALUES (3, 3, 'Tambahan Kursi', '150000');
INSERT INTO `booking_transaksi` VALUES (4, 3, 'Tambahan Makanan', '3000000');

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id_pelanggan` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_ktp` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(39) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `no_telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES ('2108-0001', '3601341608910002', 'Dede', 'sasasas asjaksjkasa sajskajskas asjaksja sajskajs asjkasja jsaksjas jskajskas', '1993-08-01', '08777111111', '2021-08-16', 0);
INSERT INTO `pelanggan` VALUES ('2108-0002', NULL, 'rudi', NULL, NULL, '08777111111', '2021-08-25', 0);

-- ----------------------------
-- Table structure for pengaturan
-- ----------------------------
DROP TABLE IF EXISTS `pengaturan`;
CREATE TABLE `pengaturan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `no_telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fax` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `facebook` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `twitter` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `instagram` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `text_header` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `text_header_small` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi_hotel` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `deskripsi_ruang_meeting` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengaturan
-- ----------------------------
INSERT INTO `pengaturan` VALUES (1, 'Healing Center, 176 W Street name, New York, NY 10014, US', '(+71) 987 65', '(+71) 987 65', 'teras_meeting@gmail.com', 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', 'Teras Meeting', 'It is a long established fact that a reader will b', ' <h4>A best place to enjoy your life</h4>\r\n                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered </p>', '<strong>$405</strong>\r\n                                <h5>luxury rooms</h5>\r\n                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (1, 'htdocs', 'E:\\htdocs\\');

-- ----------------------------
-- Table structure for tbl_hak_akses
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hak_akses`;
CREATE TABLE `tbl_hak_akses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_hak_akses
-- ----------------------------
INSERT INTO `tbl_hak_akses` VALUES (1, 1, 4);
INSERT INTO `tbl_hak_akses` VALUES (2, 1, 5);
INSERT INTO `tbl_hak_akses` VALUES (3, 1, 2);
INSERT INTO `tbl_hak_akses` VALUES (4, 1, 3);
INSERT INTO `tbl_hak_akses` VALUES (5, 1, 6);
INSERT INTO `tbl_hak_akses` VALUES (6, 1, 7);
INSERT INTO `tbl_hak_akses` VALUES (7, 1, 8);
INSERT INTO `tbl_hak_akses` VALUES (8, 3, 9);
INSERT INTO `tbl_hak_akses` VALUES (10, 3, 10);
INSERT INTO `tbl_hak_akses` VALUES (11, 1, 11);
INSERT INTO `tbl_hak_akses` VALUES (12, 1, 12);
INSERT INTO `tbl_hak_akses` VALUES (13, 1, 13);
INSERT INTO `tbl_hak_akses` VALUES (14, 1, 14);
INSERT INTO `tbl_hak_akses` VALUES (15, 1, 15);
INSERT INTO `tbl_hak_akses` VALUES (16, 1, 16);
INSERT INTO `tbl_hak_akses` VALUES (17, 1, 17);
INSERT INTO `tbl_hak_akses` VALUES (19, 1, 18);
INSERT INTO `tbl_hak_akses` VALUES (20, 1, 22);
INSERT INTO `tbl_hak_akses` VALUES (21, 1, 21);
INSERT INTO `tbl_hak_akses` VALUES (22, 1, 20);
INSERT INTO `tbl_hak_akses` VALUES (23, 1, 19);
INSERT INTO `tbl_hak_akses` VALUES (24, 1, 23);
INSERT INTO `tbl_hak_akses` VALUES (25, 1, 24);
INSERT INTO `tbl_hak_akses` VALUES (26, 1, 25);
INSERT INTO `tbl_hak_akses` VALUES (27, 1, 26);
INSERT INTO `tbl_hak_akses` VALUES (28, 1, 27);
INSERT INTO `tbl_hak_akses` VALUES (29, 1, 28);
INSERT INTO `tbl_hak_akses` VALUES (30, 3, 23);
INSERT INTO `tbl_hak_akses` VALUES (31, 3, 25);
INSERT INTO `tbl_hak_akses` VALUES (32, 3, 26);
INSERT INTO `tbl_hak_akses` VALUES (33, 4, 27);
INSERT INTO `tbl_hak_akses` VALUES (34, 2, 6);
INSERT INTO `tbl_hak_akses` VALUES (36, 2, 23);
INSERT INTO `tbl_hak_akses` VALUES (37, 2, 24);
INSERT INTO `tbl_hak_akses` VALUES (38, 2, 25);
INSERT INTO `tbl_hak_akses` VALUES (39, 2, 26);
INSERT INTO `tbl_hak_akses` VALUES (40, 2, 27);
INSERT INTO `tbl_hak_akses` VALUES (41, 2, 28);
INSERT INTO `tbl_hak_akses` VALUES (42, 1, 29);
INSERT INTO `tbl_hak_akses` VALUES (43, 2, 29);
INSERT INTO `tbl_hak_akses` VALUES (44, 3, 29);
INSERT INTO `tbl_hak_akses` VALUES (45, 4, 29);
INSERT INTO `tbl_hak_akses` VALUES (46, 4, 23);

-- ----------------------------
-- Table structure for tbl_menu
-- ----------------------------
DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE `tbl_menu`  (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'y=yes,n=no',
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_menu
-- ----------------------------
INSERT INTO `tbl_menu` VALUES (2, 'Administration', '#', 'fa fa-gears', 0, 'y');
INSERT INTO `tbl_menu` VALUES (3, 'Kelola Menu', 'kelolamenu', 'fa fa-server', 2, 'y');
INSERT INTO `tbl_menu` VALUES (4, 'Kelola User', 'user', 'fa fa-user', 2, 'y');
INSERT INTO `tbl_menu` VALUES (5, 'Level Pengguna', 'userlevel', 'fa fa-users', 2, 'y');
INSERT INTO `tbl_menu` VALUES (6, 'Pelanggan', 'Pelanggan', 'fa fa-users', 0, 'y');
INSERT INTO `tbl_menu` VALUES (23, 'Profil', 'Profil', 'fa fa-gear', 0, 'n');
INSERT INTO `tbl_menu` VALUES (24, 'Ballroom', 'Ballroom', 'fa fa-table', 0, 'y');
INSERT INTO `tbl_menu` VALUES (25, 'Jadwal', 'Jadwal', 'fa fa-table', 0, 'y');
INSERT INTO `tbl_menu` VALUES (26, 'Booking', 'Booking', 'fa fa-table', 0, 'y');
INSERT INTO `tbl_menu` VALUES (27, 'Laporan', 'Laporan', 'fa fa-table', 0, 'y');
INSERT INTO `tbl_menu` VALUES (28, 'Pengaturan', 'Pengaturan', 'fa fa-gears', 0, 'y');

-- ----------------------------
-- Table structure for tbl_pengunjung
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pengunjung`;
CREATE TABLE `tbl_pengunjung`  (
  `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengunjung_tanggal` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `pengunjung_ip` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pengunjung_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_pengunjung
-- ----------------------------
INSERT INTO `tbl_pengunjung` VALUES (1, '2019-02-13 21:18:16', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (2, '2019-02-14 09:42:02', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (3, '2019-02-15 19:30:47', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (4, '2019-02-16 08:54:25', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (5, '2019-02-17 13:17:49', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (6, '2019-02-26 11:18:51', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (7, '2019-02-28 19:46:48', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (8, '2019-03-01 11:17:56', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (9, '2019-03-04 18:44:25', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (10, '2019-03-05 08:10:43', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (11, '2019-03-06 19:34:53', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (12, '2019-03-07 18:07:09', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (13, '2019-03-08 08:45:03', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (14, '2019-03-09 11:12:10', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (15, '2019-03-11 09:25:00', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (16, '2019-03-13 14:52:31', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (17, '2021-08-15 23:09:53', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (18, '2021-08-16 00:10:03', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (19, '2021-08-21 03:15:14', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (20, '2021-08-22 18:07:50', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (21, '2021-08-23 12:24:51', '::1', 'Chrome');
INSERT INTO `tbl_pengunjung` VALUES (22, '2021-08-25 02:18:50', '::1', 'Chrome');

-- ----------------------------
-- Table structure for tbl_setting
-- ----------------------------
DROP TABLE IF EXISTS `tbl_setting`;
CREATE TABLE `tbl_setting`  (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `value` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_setting
-- ----------------------------
INSERT INTO `tbl_setting` VALUES (1, 'Tampil Menu', 'ya');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_users` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `full_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `images` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `aturan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `terakhir_masuk` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_users`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('2108-0001', 'Dede', 'dede', 'dede@gmail.com', '08777111111', 'sha256:1000:c5Eq/3J9gbGs6Hh/PPEF2s4sI9rLGDUl:WVer/ZljStpeBkZhTVpt7izWr5vgpJIs', '', 3, 'y', 'user', '2021-08-25 11:29:37 AM', 'pending');
INSERT INTO `tbl_user` VALUES ('2108-0002', 'rudi', 'rudi', 'rudi@gmail.com', '08777111111', 'sha256:1000:M5pNPzXkAO4KAJH/BAtXCUQ4t6RpqL0U:+Fbc5Qt4pG6o07lAntpRslTNf1UwjxoQ', '', 3, 'y', 'user', '2021-08-25 11:30:21 AM', 'pending');
INSERT INTO `tbl_user` VALUES ('admin', 'admin', 'admin', 'admin@gmail.com', NULL, 'sha256:1000:7RyMB5SoB6tfKC/YJw/An3vpW6XOTq4K:BkUvA1v02NgKX7UQ0la74qUeI1l0QrA+', '', 2, 'y', 'admin', '2021-08-21 07:29:15 PM', 'approved');
INSERT INTO `tbl_user` VALUES ('pimpinan', 'pimpinan', 'pimpinan', 'pimpinann@gmail.com', NULL, 'sha256:1000:7RyMB5SoB6tfKC/YJw/An3vpW6XOTq4K:BkUvA1v02NgKX7UQ0la74qUeI1l0QrA+', '', 4, 'y', 'admin', '2021-08-21 07:52:41 PM', 'approved');
INSERT INTO `tbl_user` VALUES ('superadmin', 'superadmin', 'superadmin', 'superadmin@gmail.com', NULL, 'sha256:1000:7RyMB5SoB6tfKC/YJw/An3vpW6XOTq4K:BkUvA1v02NgKX7UQ0la74qUeI1l0QrA+', '', 1, 'y', 'admin', '2021-08-21 03:39:02 PM', 'approved');

-- ----------------------------
-- Table structure for tbl_user_level
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_level`;
CREATE TABLE `tbl_user_level`  (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_user_level
-- ----------------------------
INSERT INTO `tbl_user_level` VALUES (1, 'Super Admin');
INSERT INTO `tbl_user_level` VALUES (2, 'Admin');
INSERT INTO `tbl_user_level` VALUES (3, 'Pelanggan');
INSERT INTO `tbl_user_level` VALUES (4, 'Pimpinan');

-- ----------------------------
-- Table structure for tokens
-- ----------------------------
DROP TABLE IF EXISTS `tokens`;
CREATE TABLE `tokens`  (
  `id` int(11) NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created` date NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tokens
-- ----------------------------
INSERT INTO `tokens` VALUES (0, 'e8b9ad2a14cf2adf4961b937768eac', '1903-00001', '2019-03-13');
INSERT INTO `tokens` VALUES (0, '3c3d8c51a3443faf1909eeb0aac353', '1903-00002', '2019-03-19');
INSERT INTO `tokens` VALUES (0, '82b753bd0bb81487e4ce008707e9b1', '1903-00002', '2019-03-19');
INSERT INTO `tokens` VALUES (0, '35fb07b47817017f2a95fde0675725', '1903-00002', '2019-03-19');
INSERT INTO `tokens` VALUES (0, '66cd855a8572c9647109e3f27f01a4', '1903-00002', '2019-03-27');

SET FOREIGN_KEY_CHECKS = 1;
