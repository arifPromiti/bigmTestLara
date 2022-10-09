/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : bigmtest

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 10/10/2022 01:19:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for applicants
-- ----------------------------
DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `upazila_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bangla` smallint(6) NOT NULL,
  `english` smallint(6) NOT NULL,
  `french` smallint(6) NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `training` smallint(6) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of applicants
-- ----------------------------
INSERT INTO `applicants` VALUES (2, 'Arif', 'arif@gmail.com', 1, 1, 1, 'sfdasd', 1, 1, 0, 'image/202210091449123651750_116396066932428_5770670344290051975_n.jpg', 'cv/202210091449Arif_Ahmmad_CV.pdf', 0, '2022-10-09 14:49:39', '2022-10-09 19:15:15');

-- ----------------------------
-- Table structure for boards
-- ----------------------------
DROP TABLE IF EXISTS `boards`;
CREATE TABLE `boards`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `board_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of boards
-- ----------------------------
INSERT INTO `boards` VALUES (1, 'Dhaka', NULL, NULL);
INSERT INTO `boards` VALUES (2, 'Rajshahi', NULL, NULL);
INSERT INTO `boards` VALUES (3, 'Cumilla', NULL, NULL);
INSERT INTO `boards` VALUES (4, 'Sylhet', NULL, NULL);
INSERT INTO `boards` VALUES (5, 'Chattogram', NULL, NULL);
INSERT INTO `boards` VALUES (6, 'Jessore', NULL, NULL);
INSERT INTO `boards` VALUES (7, 'Barisal', NULL, NULL);
INSERT INTO `boards` VALUES (8, 'Dinajpur', NULL, NULL);
INSERT INTO `boards` VALUES (9, 'Madrasah', NULL, NULL);

-- ----------------------------
-- Table structure for districts
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of districts
-- ----------------------------
INSERT INTO `districts` VALUES (1, 1, 'Dhaka', NULL, NULL);
INSERT INTO `districts` VALUES (2, 1, 'Gazipur', NULL, NULL);
INSERT INTO `districts` VALUES (3, 2, 'Sirajgonj', NULL, NULL);
INSERT INTO `districts` VALUES (4, 2, 'Rajshahi', NULL, NULL);
INSERT INTO `districts` VALUES (5, 7, 'Dinajpur', NULL, NULL);
INSERT INTO `districts` VALUES (6, 7, 'Rangpur', NULL, NULL);
INSERT INTO `districts` VALUES (7, 3, 'Sylhet', NULL, NULL);
INSERT INTO `districts` VALUES (8, 5, 'Khulna', NULL, NULL);
INSERT INTO `districts` VALUES (9, 4, 'Chattogram', NULL, NULL);
INSERT INTO `districts` VALUES (10, 4, 'coxs bazar', NULL, NULL);
INSERT INTO `districts` VALUES (11, 6, 'Barisal', NULL, NULL);

-- ----------------------------
-- Table structure for divisions
-- ----------------------------
DROP TABLE IF EXISTS `divisions`;
CREATE TABLE `divisions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of divisions
-- ----------------------------
INSERT INTO `divisions` VALUES (1, 'Dhaka', NULL, NULL);
INSERT INTO `divisions` VALUES (2, 'Rajshahi', NULL, NULL);
INSERT INTO `divisions` VALUES (3, 'Sylhet', NULL, NULL);
INSERT INTO `divisions` VALUES (4, 'Chattogram', NULL, NULL);
INSERT INTO `divisions` VALUES (5, 'Khulna', NULL, NULL);
INSERT INTO `divisions` VALUES (6, 'Barisal', NULL, NULL);
INSERT INTO `divisions` VALUES (7, 'Rangpur', NULL, NULL);

-- ----------------------------
-- Table structure for education
-- ----------------------------
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `institute` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `board_id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of education
-- ----------------------------
INSERT INTO `education` VALUES (1, 2, 2, 'Suboj kanon high school', 2, '3.20', '2022-10-09 14:49:39', '2022-10-09 14:49:39');
INSERT INTO `education` VALUES (2, 2, 1, 'Islamia Collage', 2, '3.50', '2022-10-09 14:49:39', '2022-10-09 14:49:39');
INSERT INTO `education` VALUES (3, 2, 3, 'IBAIS University', 1, '3.20', '2022-10-09 14:49:39', '2022-10-09 14:49:39');

-- ----------------------------
-- Table structure for exams
-- ----------------------------
DROP TABLE IF EXISTS `exams`;
CREATE TABLE `exams`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of exams
-- ----------------------------
INSERT INTO `exams` VALUES (1, 'HSC', NULL, NULL);
INSERT INTO `exams` VALUES (2, 'SSC', NULL, NULL);
INSERT INTO `exams` VALUES (3, 'BSc', NULL, NULL);
INSERT INTO `exams` VALUES (4, 'MSc', NULL, NULL);
INSERT INTO `exams` VALUES (5, 'Alim', NULL, NULL);
INSERT INTO `exams` VALUES (6, 'Dakhil', NULL, NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_08_24_045652_create_games_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_08_24_045921_create_players_table', 1);
INSERT INTO `migrations` VALUES (8, '2022_08_24_045955_create_game_histories_table', 1);
INSERT INTO `migrations` VALUES (9, '2022_10_08_054949_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_10_08_183038_create_applicants_table', 2);
INSERT INTO `migrations` VALUES (11, '2022_10_08_183120_create_education_table', 2);
INSERT INTO `migrations` VALUES (12, '2022_10_08_183148_create_trainings_table', 2);
INSERT INTO `migrations` VALUES (13, '2022_10_08_191512_create_divisions_table', 2);
INSERT INTO `migrations` VALUES (14, '2022_10_08_191539_create_districts_table', 2);
INSERT INTO `migrations` VALUES (15, '2022_10_08_191609_create_upazillas_table', 2);
INSERT INTO `migrations` VALUES (16, '2022_10_08_191735_create_exams_table', 2);
INSERT INTO `migrations` VALUES (17, '2022_10_08_191759_create_boards_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id`) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('2VdRVmpJQIfKHyu0Dtr6R8fH91aiPUaZDNrnTbRT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2t2RmpxTnhGa1NYcEdCa2hJQkVOcGVValB4Z281MzI5WHc2b3JCcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3QvYmlnbVRlc3RMYXJhL3B1YmxpYy9pbmRleC5waHAiO319', 1665343033);

-- ----------------------------
-- Table structure for trainings
-- ----------------------------
DROP TABLE IF EXISTS `trainings`;
CREATE TABLE `trainings`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `applicant_id` bigint(20) NOT NULL,
  `trainingName` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainingDetails` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for upazillas
-- ----------------------------
DROP TABLE IF EXISTS `upazillas`;
CREATE TABLE `upazillas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `upazilla_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of upazillas
-- ----------------------------
INSERT INTO `upazillas` VALUES (1, 1, 'Airport Thana', NULL, NULL);
INSERT INTO `upazillas` VALUES (2, 2, 'Gazipur Shadar', NULL, NULL);
INSERT INTO `upazillas` VALUES (3, 3, 'Sirajgonj Shadar', NULL, NULL);
INSERT INTO `upazillas` VALUES (4, 4, 'Poba', NULL, NULL);
INSERT INTO `upazillas` VALUES (5, 5, 'Dinajpur Shadar', NULL, NULL);
INSERT INTO `upazillas` VALUES (6, 6, 'Rangpur Shadar', NULL, NULL);
INSERT INTO `upazillas` VALUES (7, 7, 'Sylhet Shadar', NULL, NULL);
INSERT INTO `upazillas` VALUES (8, 8, 'Khulna Shadar', NULL, NULL);
INSERT INTO `upazillas` VALUES (9, 9, 'Anwara', NULL, NULL);
INSERT INTO `upazillas` VALUES (10, 10, 'coxs bazar Shadar', NULL, NULL);
INSERT INTO `upazillas` VALUES (11, 11, 'Barisal Shadar', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_confirmed_at` timestamp(0) NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@admin.com', NULL, '$2y$10$fpwTwrPj24.Q4.ylPlYuDuC7s2shcin6kERSRG4tjIMFSxdgT2zoC', '12345678', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-09 15:12:28', '2022-10-09 15:12:28');

SET FOREIGN_KEY_CHECKS = 1;
