-- --------------------------------------------------------
-- Host:                         srv102.niagahoster.com
-- Server version:               10.6.16-MariaDB-cll-lve - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for u1003591_kesiswaan
CREATE DATABASE IF NOT EXISTS `u1003591_kesiswaan` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `u1003591_kesiswaan`;

-- Dumping structure for table u1003591_kesiswaan.data_hasil_form_kegiatan
CREATE TABLE IF NOT EXISTS `data_hasil_form_kegiatan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kegiatan_uks_has_peserta_id` bigint(20) unsigned NOT NULL,
  `form_id` bigint(20) unsigned NOT NULL,
  `data_input_id` bigint(20) unsigned NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `data_hasil_form_kegiatan_kegiatan_uks_has_peserta_id_foreign` (`kegiatan_uks_has_peserta_id`),
  KEY `data_hasil_form_kegiatan_form_id_foreign` (`form_id`),
  KEY `data_hasil_form_kegiatan_data_input_id_foreign` (`data_input_id`),
  CONSTRAINT `data_hasil_form_kegiatan_data_input_id_foreign` FOREIGN KEY (`data_input_id`) REFERENCES `data_input_form` (`id`),
  CONSTRAINT `data_hasil_form_kegiatan_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `master_form` (`id`),
  CONSTRAINT `data_hasil_form_kegiatan_kegiatan_uks_has_peserta_id_foreign` FOREIGN KEY (`kegiatan_uks_has_peserta_id`) REFERENCES `kegiatan_uks_has_peserta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.data_input_form
CREATE TABLE IF NOT EXISTS `data_input_form` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` bigint(20) unsigned NOT NULL,
  `nama_input` varchar(255) NOT NULL,
  `name_component` varchar(255) DEFAULT NULL,
  `label_input` varchar(255) DEFAULT NULL,
  `type_input` enum('select','text','number','date','checkbox') DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `data_input_form_form_id_foreign` (`form_id`),
  CONSTRAINT `data_input_form_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `master_form` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=412 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.data_kesehatan
CREATE TABLE IF NOT EXISTS `data_kesehatan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `periode_id` bigint(20) unsigned NOT NULL,
  `dokter_id` bigint(20) unsigned DEFAULT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `kode` text NOT NULL,
  `foto` text DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `status_persetujuan` enum('R','N','A','P') NOT NULL DEFAULT 'N',
  `status_saat_ini_id` bigint(20) unsigned NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`) USING HASH,
  KEY `data_kesehatan_periode_id_foreign` (`periode_id`),
  KEY `data_kesehatan_status_saat_ini_id_foreign` (`status_saat_ini_id`),
  KEY `data_kesehatan_dokter_id_foreign` (`dokter_id`),
  CONSTRAINT `data_kesehatan_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `master_dokter` (`id`),
  CONSTRAINT `data_kesehatan_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `master_periode` (`id`),
  CONSTRAINT `data_kesehatan_status_saat_ini_id_foreign` FOREIGN KEY (`status_saat_ini_id`) REFERENCES `master_status_kesehatan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.data_persetujuan_kesehatan
CREATE TABLE IF NOT EXISTS `data_persetujuan_kesehatan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `data_kesehatan_id` bigint(20) unsigned NOT NULL,
  `pesan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_1` (`data_kesehatan_id`),
  CONSTRAINT `data_persetujuan_kesehatan_data_kesehatan_id_foreign` FOREIGN KEY (`data_kesehatan_id`) REFERENCES `data_kesehatan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.kegiatan_uks
CREATE TABLE IF NOT EXISTS `kegiatan_uks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenjang` text NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('selesai','berlangsung','mendatang') NOT NULL DEFAULT 'mendatang',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.kegiatan_uks_has_form
CREATE TABLE IF NOT EXISTS `kegiatan_uks_has_form` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kegiatan_uks_id` bigint(20) unsigned NOT NULL,
  `form_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kegiatan_uks_has_form_kegiatan_uks_id_foreign` (`kegiatan_uks_id`),
  KEY `kegiatan_uks_has_form_form_id_foreign` (`form_id`),
  CONSTRAINT `kegiatan_uks_has_form_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `master_form` (`id`),
  CONSTRAINT `kegiatan_uks_has_form_kegiatan_uks_id_foreign` FOREIGN KEY (`kegiatan_uks_id`) REFERENCES `kegiatan_uks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.kegiatan_uks_has_peserta
CREATE TABLE IF NOT EXISTS `kegiatan_uks_has_peserta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kegiatan_uks_id` bigint(20) unsigned NOT NULL,
  `nis` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenjang` varchar(100) NOT NULL,
  `status` enum('selesai','belum') NOT NULL DEFAULT 'belum',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kegiatan_uks_has_peserta_kegiatan_uks_id_foreign` (`kegiatan_uks_id`),
  CONSTRAINT `kegiatan_uks_has_peserta_kegiatan_uks_id_foreign` FOREIGN KEY (`kegiatan_uks_id`) REFERENCES `kegiatan_uks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_aspek_pelanggaran
CREATE TABLE IF NOT EXISTS `master_aspek_pelanggaran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `aspek` varchar(255) NOT NULL,
  `jenjang` enum('ps','sd','smp','sma') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_dokter
CREATE TABLE IF NOT EXISTS `master_dokter` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenjang_id` bigint(20) unsigned NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `foto` (`foto`),
  KEY `master_dokter_jenjang_id_foreign` (`jenjang_id`),
  CONSTRAINT `master_dokter_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `master_jenjang` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_form
CREATE TABLE IF NOT EXISTS `master_form` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenjang_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `name_form` text NOT NULL,
  `name_file` text NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_by` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `master_form_nama_form_unique` (`name_form`,`jenjang_id`,`role_id`,`name_file`) USING HASH,
  KEY `master_form_jenjang_id_foreign` (`jenjang_id`),
  KEY `master_form_role_id_foreign` (`role_id`),
  KEY `master_form_created_by_foreign` (`created_by`),
  KEY `master_form_updated_by_foreign` (`updated_by`),
  CONSTRAINT `master_form_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `master_form_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `master_jenjang` (`id`),
  CONSTRAINT `master_form_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `master_form_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_house
CREATE TABLE IF NOT EXISTS `master_house` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `periode_id` bigint(20) unsigned NOT NULL,
  `jenjang_id` bigint(20) unsigned NOT NULL,
  `nama_house` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `master_house_periode_id_foreign` (`periode_id`),
  KEY `master_house_jenjang_id_foreign` (`jenjang_id`),
  CONSTRAINT `master_house_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `master_jenjang` (`id`),
  CONSTRAINT `master_house_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `master_periode` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_image
CREATE TABLE IF NOT EXISTS `master_image` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_gambar` varchar(255) NOT NULL,
  `url_gambar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`nama_gambar`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_jenjang
CREATE TABLE IF NOT EXISTS `master_jenjang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenjang_code` varchar(255) NOT NULL,
  `jenjang_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `master_jenjang_kode_unique` (`jenjang_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_pelanggaran
CREATE TABLE IF NOT EXISTS `master_pelanggaran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `aspek_pelanggaran_id` bigint(20) unsigned NOT NULL,
  `indikator` text NOT NULL,
  `jumlah_pengurangan` int(11) NOT NULL,
  `satuan_pengurangan` enum('point','pulsa') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `master_pelanggaran_aspek_pelanggaran_id_foreign` (`aspek_pelanggaran_id`),
  CONSTRAINT `master_pelanggaran_aspek_pelanggaran_id_foreign` FOREIGN KEY (`aspek_pelanggaran_id`) REFERENCES `master_aspek_pelanggaran` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_periode
CREATE TABLE IF NOT EXISTS `master_periode` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` bigint(20) unsigned NOT NULL,
  `semester_id` bigint(20) unsigned NOT NULL,
  `jenjang_id` bigint(20) unsigned NOT NULL,
  `penilaian` enum('Akhir','Tengah') NOT NULL DEFAULT 'Akhir',
  `status` enum('active','nonactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tahun_ajaran_id` (`tahun_ajaran_id`,`semester_id`,`jenjang_id`,`penilaian`),
  KEY `master_periode_semester_id_foreign` (`semester_id`),
  KEY `master_periode_jenjang_id_foreign` (`jenjang_id`),
  CONSTRAINT `master_periode_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `master_jenjang` (`id`),
  CONSTRAINT `master_periode_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `master_semester` (`id`),
  CONSTRAINT `master_periode_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `master_tahun_ajaran` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_semester
CREATE TABLE IF NOT EXISTS `master_semester` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `semester_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `master_semester_semester_unique` (`semester_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_status_kesehatan
CREATE TABLE IF NOT EXISTS `master_status_kesehatan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_tahun_ajaran
CREATE TABLE IF NOT EXISTS `master_tahun_ajaran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_mulai` varchar(255) NOT NULL,
  `tahun_berakhir` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `master_tahun_ajaran_tahun_mulai_unique` (`tahun_mulai`),
  UNIQUE KEY `master_tahun_ajaran_tahun_berakhir_unique` (`tahun_berakhir`),
  UNIQUE KEY `master_tahun_ajaran_tahun_ajaran_unique` (`tahun_ajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.master_whatsapp
CREATE TABLE IF NOT EXISTS `master_whatsapp` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenjang_id` bigint(20) unsigned NOT NULL,
  `nomor_wa` text NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jenjang` (`jenjang_id`),
  CONSTRAINT `master_whatsapp_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `master_jenjang` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.password_data_kesehatan
CREATE TABLE IF NOT EXISTS `password_data_kesehatan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `data_kesehatan_id` bigint(20) unsigned NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `password_data_kesehatan_data_kesehatan_id_unique` (`data_kesehatan_id`),
  CONSTRAINT `password_data_kesehatan_data_kesehatan_id_foreign` FOREIGN KEY (`data_kesehatan_id`) REFERENCES `data_kesehatan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.pengunjung_uks
CREATE TABLE IF NOT EXISTS `pengunjung_uks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `tanggal_kunjungan` datetime NOT NULL,
  `catatan_tambahan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keperluan` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.pengunjung_uks_pegawai
CREATE TABLE IF NOT EXISTS `pengunjung_uks_pegawai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_kunjungan` datetime NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keperluan` text DEFAULT NULL,
  `catatan_tambahan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.riwayat_status_kesehatan
CREATE TABLE IF NOT EXISTS `riwayat_status_kesehatan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `data_kesehatan_id` bigint(20) unsigned NOT NULL,
  `master_status_kesehatan_id` bigint(20) unsigned NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `riwayat_status_kesehatan_data_kesehatan_id_foreign` (`data_kesehatan_id`),
  KEY `riwayat_status_kesehatan_master_status_kesehatan_id_foreign` (`master_status_kesehatan_id`),
  CONSTRAINT `riwayat_status_kesehatan_data_kesehatan_id_foreign` FOREIGN KEY (`data_kesehatan_id`) REFERENCES `data_kesehatan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `riwayat_status_kesehatan_master_status_kesehatan_id_foreign` FOREIGN KEY (`master_status_kesehatan_id`) REFERENCES `master_status_kesehatan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pegawai_sdm` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token_google` text DEFAULT NULL,
  `status` enum('active','nonactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index 2` (`nip`),
  UNIQUE KEY `id_pegawai_sdm` (`id_pegawai_sdm`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.user_jenjang
CREATE TABLE IF NOT EXISTS `user_jenjang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `jenjang_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_jenjang_user_id_foreign` (`user_id`),
  KEY `user_jenjang_jenjang_id_foreign` (`jenjang_id`),
  CONSTRAINT `user_jenjang_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `master_jenjang` (`id`),
  CONSTRAINT `user_jenjang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u1003591_kesiswaan.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_role_user_id_foreign` (`user_id`),
  KEY `user_role_role_id_foreign` (`role_id`),
  CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
