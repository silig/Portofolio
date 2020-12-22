/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : good

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 16/06/2020 15:57:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activation_users
-- ----------------------------
DROP TABLE IF EXISTS `activation_users`;
CREATE TABLE `activation_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of activation_users
-- ----------------------------
INSERT INTO `activation_users` VALUES (1, 7, 'YXBxku9NcJorDbcKbdFMm4WuQyw2fTbze7VddKup', '2020-06-02 23:20:12', '2020-06-02 23:20:12');
INSERT INTO `activation_users` VALUES (2, 8, 'ZyUgC21HkkosmAl3mkqHOs7i4WJs7bO7oC5eci0D', '2020-06-03 03:55:19', '2020-06-03 03:55:19');
INSERT INTO `activation_users` VALUES (3, 9, 'OelHH5W3NAV3lygffGK8F5Ar21RIiNrYqSG84pqF', '2020-06-03 03:57:35', '2020-06-03 03:57:35');
INSERT INTO `activation_users` VALUES (4, 10, 'BjGz2Y9NEdNfVWvzSpNgZ96eIL380T5XB5YTNwKb', '2020-06-03 04:01:33', '2020-06-03 04:01:33');
INSERT INTO `activation_users` VALUES (5, 11, 'XIvsA3Gt9SW8e4E2HviMoJyux3IXmnn46vcuAVuQ', '2020-06-03 04:10:14', '2020-06-03 04:10:14');
INSERT INTO `activation_users` VALUES (6, 12, 'JFzsex5K7FgrFqNDta3k8IWsm91Hvr8NJnYDvpzI', '2020-06-09 00:47:54', '2020-06-09 00:47:54');
INSERT INTO `activation_users` VALUES (7, 13, 'HIKBbPURrs0D4y00UZuHNzKZxXCboGqnur0xhNMP', '2020-06-09 00:50:14', '2020-06-09 00:50:14');
INSERT INTO `activation_users` VALUES (8, 14, 'V03PRRbMGfKEI9SZpGgVO1KKvSZQQXgo0kkXfxLL', '2020-06-09 00:53:21', '2020-06-09 00:53:21');
INSERT INTO `activation_users` VALUES (9, 15, 'Q69X0uiWPcQZks9o0pKAWoTXam0XuEHPqMORCCCc', '2020-06-09 01:18:15', '2020-06-09 01:18:15');
INSERT INTO `activation_users` VALUES (10, 16, 'PfcYMRj6c5HN8zdNH1w02DRKi8wq1eMUdOG090H6', '2020-06-09 15:21:33', '2020-06-09 15:21:33');
INSERT INTO `activation_users` VALUES (11, 17, 'ukrT14Ha01axq9rigNjb5igHUDautWL8yIx5nb7s', '2020-06-09 15:23:22', '2020-06-09 15:23:22');
INSERT INTO `activation_users` VALUES (12, 18, 'zvzbUyl1LggFogVOqOMKLIcxae35sbxjOvYvYNfI', '2020-06-12 02:05:46', '2020-06-12 02:05:46');
INSERT INTO `activation_users` VALUES (13, 19, '0euPSzjvK1jvgg0pwPY1ZZzKJz5YRdnklNvoyZQb', '2020-06-12 02:13:25', '2020-06-12 02:13:25');
INSERT INTO `activation_users` VALUES (14, 20, 'oPYZdL5KHHkas4UAGFq5qwAGTaXqTK695sLNon2Z', '2020-06-12 02:15:25', '2020-06-12 02:15:25');
INSERT INTO `activation_users` VALUES (15, 21, 'WpAlb3ZlxchaMCBn4LnCPakhw0ZiJGqK4TfJuaEQ', '2020-06-12 02:18:25', '2020-06-12 02:18:25');
INSERT INTO `activation_users` VALUES (16, 22, '6IqzN60P0DDa3G9ML2TKpcVQHJSWGcOLBFLCGuaC', '2020-06-12 02:25:24', '2020-06-12 02:25:24');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Setting', '#', 'fa fa-cog', 0, 1, '2020-06-02 13:16:10', '2020-06-02 13:16:10');
INSERT INTO `menus` VALUES (2, 'Users', '/users', NULL, 1, 2, '2020-06-02 13:16:10', '2020-06-02 13:16:10');
INSERT INTO `menus` VALUES (3, 'Roles', '/roles', NULL, 1, 3, '2020-06-02 13:16:10', '2020-06-02 13:16:10');
INSERT INTO `menus` VALUES (4, 'Permissions', '/permissions', NULL, 1, 4, '2020-06-02 13:16:10', '2020-06-02 13:16:10');
INSERT INTO `menus` VALUES (5, 'Menus', '/menus', NULL, 1, 4, '2020-06-02 13:16:10', '2020-06-02 13:16:10');
INSERT INTO `menus` VALUES (6, 'Pencarian', '/search', 'fa fa-search', 0, 5, '2020-06-02 13:40:55', '2020-06-13 17:20:14');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_01_09_053403_create_roles_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_01_09_053514_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_01_09_053623_create_menus_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_01_09_061115_create_role_permission_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('tes@gmail.com', '$2y$10$v/2Sjg3tx8LpVOh6V6qgn.6vkY3fZwdyJius5H9/HoAn/jTJdERia', '2020-06-10 03:30:40');
INSERT INTO `password_resets` VALUES ('tes1@gmail.com', '$2y$10$OOiyT7EUl5UIj9mds/vv1e9f83esxhAXLP/uvgIsa8WKddv6.F6fG', '2020-06-10 03:59:23');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'view-users', 'view users', 2, '2020-06-02 13:16:10', '2020-06-02 13:16:10');
INSERT INTO `permissions` VALUES (2, 'create-users', 'create users', 2, '2020-06-02 13:16:10', '2020-06-02 13:16:10');
INSERT INTO `permissions` VALUES (3, 'edit-users', 'edit users', 2, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (4, 'delete-users', 'delete users', 2, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (5, 'view-roles', 'view roles', 3, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (6, 'create-roles', 'create roles', 3, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (7, 'edit-roles', 'edit roles', 3, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (8, 'delete-roles', 'delete roles', 3, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (9, 'view-permissions', 'view permissions', 4, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (10, 'create-permissions', 'create permissions', 4, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (11, 'edit-permissions', 'edit permissions', 4, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (12, 'delete-permissions', 'delete permissions', 4, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (13, 'view-menus', 'view menus', 5, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (14, 'create-menus', 'create menus', 5, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (15, 'edit-menus', 'edit menus', 5, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (16, 'delete-menus', 'delete menus', 5, '2020-06-02 13:16:11', '2020-06-02 13:16:11');
INSERT INTO `permissions` VALUES (17, 'cari-data', 'cari data', 6, '2020-06-13 17:22:17', '2020-06-13 17:22:17');

-- ----------------------------
-- Table structure for role_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_permission
-- ----------------------------
INSERT INTO `role_permission` VALUES (5, 2, 17, NULL, NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', '2020-06-02 13:16:10', '2020-06-02 13:16:10');
INSERT INTO `roles` VALUES (2, 'user', '2020-06-02 23:05:24', '2020-06-02 23:05:24');

-- ----------------------------
-- Table structure for tb_bahasa
-- ----------------------------
DROP TABLE IF EXISTS `tb_bahasa`;
CREATE TABLE `tb_bahasa`  (
  `id` int(11) NOT NULL,
  `profil_id` int(11) NULL DEFAULT NULL,
  `bahasa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_bahasa
-- ----------------------------
INSERT INTO `tb_bahasa` VALUES (1, 1, 'inggris', '2020-06-13 23:01:35', '2020-06-13 23:01:40');
INSERT INTO `tb_bahasa` VALUES (2, 1, 'jepang', '2020-06-13 23:01:55', '2020-06-13 23:01:58');

-- ----------------------------
-- Table structure for tb_hobi
-- ----------------------------
DROP TABLE IF EXISTS `tb_hobi`;
CREATE TABLE `tb_hobi`  (
  `id` int(11) NOT NULL,
  `profil_id` int(255) NULL DEFAULT NULL,
  `nama_hobi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_hobi
-- ----------------------------

-- ----------------------------
-- Table structure for tb_pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pendidikan`;
CREATE TABLE `tb_pendidikan`  (
  `id` int(11) NOT NULL,
  `profil_id` int(255) NULL DEFAULT NULL,
  `tahun_mulai` int(4) NULL DEFAULT NULL,
  `tahun_selesai` int(4) NULL DEFAULT NULL,
  `institusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pendidikan
-- ----------------------------
INSERT INTO `tb_pendidikan` VALUES (1, 1, 1990, 1991, 'tk jomblo', 'bocil', '2020-06-15 22:46:14', '2020-06-15 22:46:17');

-- ----------------------------
-- Table structure for tb_pengalaman
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengalaman`;
CREATE TABLE `tb_pengalaman`  (
  `id` int(11) NOT NULL,
  `profil_id` int(11) NULL DEFAULT NULL,
  `pengalaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penjelasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pengalaman
-- ----------------------------

-- ----------------------------
-- Table structure for tb_prestasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_prestasi`;
CREATE TABLE `tb_prestasi`  (
  `id` int(11) NOT NULL,
  `profil_id` int(255) NULL DEFAULT NULL,
  `prestasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_prestasi
-- ----------------------------

-- ----------------------------
-- Table structure for tb_profil
-- ----------------------------
DROP TABLE IF EXISTS `tb_profil`;
CREATE TABLE `tb_profil`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nim` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `phone` int(255) NULL DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tentang` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `alamat` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  FULLTEXT INDEX `alamat`(`alamat`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_profil
-- ----------------------------
INSERT INTO `tb_profil` VALUES (1, 21, 'Farida Nur Nuzulia', 'Islam', '2001102212', 'PWK', 'Temanggung', '1989-02-28', 2147483647, 'perempuan', NULL, 'temanggung', NULL, '2020-06-12 02:18:25', '2020-06-12 02:18:25');
INSERT INTO `tb_profil` VALUES (2, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 02:25:24', '2020-06-12 02:25:24');

-- ----------------------------
-- Table structure for tb_skill
-- ----------------------------
DROP TABLE IF EXISTS `tb_skill`;
CREATE TABLE `tb_skill`  (
  `id` int(11) NOT NULL,
  `profil_id` int(255) NULL DEFAULT NULL,
  `skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_skill
-- ----------------------------

-- ----------------------------
-- Table structure for tb_sosmed
-- ----------------------------
DROP TABLE IF EXISTS `tb_sosmed`;
CREATE TABLE `tb_sosmed`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_id` int(255) NULL DEFAULT NULL,
  `sosial_media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_sosmed
-- ----------------------------
INSERT INTO `tb_sosmed` VALUES (1, 1, 'facebook', 'https://facebook.com/farida', '2020-06-15 23:26:55', '2020-06-15 23:26:57');
INSERT INTO `tb_sosmed` VALUES (2, 1, 'linkedin', 'https://linkedin.com/farida', '2020-06-15 23:27:17', '2020-06-15 23:27:20');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `user_access` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `active` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Superadmin', 'super@admin.com', NULL, '$2y$10$a8PWOfwfgTp.gBtWVqQoSOg8QOstOzgUxr8wH0OzlyL231qR1kFH2', NULL, '123456789', 1, 'admin', 'yes', '2020-06-02 13:16:10', '2020-06-02 13:16:10');
INSERT INTO `users` VALUES (12, 'ramaji', 'tes@gmail.com', NULL, '$2y$10$R7UNjyPipLyq2p0usDAWHu8RyAsx0yfjGrLxcEloFHSfgW6FqMCk.', 'v7gZt7yFdBGJEBnxXKXaWBKeQuZcyY3ubR2iR9w6fAzqLyHNDDK7SFzgxJT3', NULL, 2, 'user', 'yes', '2020-06-09 00:47:54', '2020-06-09 00:47:54');
INSERT INTO `users` VALUES (13, 'ramaji', 'tes1@gmail.com', NULL, '$2y$10$ItHYrrjiB8lBCRSrJdSALeF2qYoLmHokWlnZrY7qL4EhUGlfOoHPi', NULL, NULL, 2, 'user', 'no', '2020-06-09 00:50:14', '2020-06-09 00:50:14');
INSERT INTO `users` VALUES (14, 'gilis aryo sembodo', 'tes2@gmail.com', '2020-06-09 00:56:11', '$2y$10$gI6ckELB8M2ZHM/Z6IsZRu5MCBXfmVIsNr4JZ0vjAuQYQw7PJuB5S', NULL, NULL, 2, 'user', 'yes', '2020-06-09 00:53:21', '2020-06-09 00:56:11');
INSERT INTO `users` VALUES (15, 'mardian', 'susu@gmail.com', '2020-06-09 01:19:46', '$2y$10$XiIE7nUnf.IWF1a0IwFgV.JnwemyA/txXoRHxJKRkV3m4i.G.67Ju', 'GQijibLgiprg2ekMhMZhPepVIQOD0Py6W0zuKD5Ch7cQ0cdXFgOqY7CIfR8f', NULL, 2, 'user', 'yes', '2020-06-09 01:18:15', '2020-06-10 04:02:38');
INSERT INTO `users` VALUES (21, 'Farida Nuzulia', 'farida@gmail.com', '2020-06-12 02:19:15', '$2y$10$ECCeQY9zZB13FSm5iAYsI.Oj7DqVi2Anyp7Mj8baZFf/FlkKbh74q', NULL, NULL, 2, 'user', 'yes', '2020-06-12 02:18:25', '2020-06-12 02:19:15');
INSERT INTO `users` VALUES (22, 'mona martinasari', 'mona@gmail.com', '2020-06-12 02:26:50', '$2y$10$bBxKPwlTfHtiCBPvvFRUSeUpImNCc4GMkNpq0BQZHSxn2dANPaWdS', NULL, NULL, 2, 'user', 'yes', '2020-06-12 02:25:24', '2020-06-12 02:26:50');

SET FOREIGN_KEY_CHECKS = 1;
