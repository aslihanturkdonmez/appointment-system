-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3308
-- Üretim Zamanı: 31 May 2020, 08:55:40
-- Sunucu sürümü: 5.7.28
-- PHP Sürümü: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `randevu_sistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktor`
--

DROP TABLE IF EXISTS `doktor`;
CREATE TABLE IF NOT EXISTS `doktor` (
  `kullanici_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `hitap` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kullanici_adi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `doktor`
--

INSERT INTO `doktor` (`kullanici_adi`, `sifre`, `cinsiyet`, `hitap`, `ad`) VALUES
('asliturk', '1234', 'kadın', 'Hanım', 'Aslı'),
('caner', '123', 'kadın', 'hanım', 'caner');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hasta`
--

DROP TABLE IF EXISTS `hasta`;
CREATE TABLE IF NOT EXISTS `hasta` (
  `hasta_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `tc_no` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `adres` text COLLATE utf8_turkish_ci NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `cinsiyet` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`hasta_id`),
  UNIQUE KEY `tc_no` (`tc_no`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hasta`
--

INSERT INTO `hasta` (`hasta_id`, `ad`, `soyad`, `tc_no`, `email`, `telefon`, `sifre`, `adres`, `dogum_tarihi`, `cinsiyet`) VALUES
(1, 'asli', 'turkdönmez', '97848910264', 'asliturkdonmez@hotmail.com', '123456', 'f6f2ea8f45d8a057c9566a33f99474da2e5c6a6604d736121650e2730c6fb0a3', 'ksk', '2020-01-01', 'Kadın');
-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

DROP TABLE IF EXISTS `randevu`;
CREATE TABLE IF NOT EXISTS `randevu` (
  `tarih` datetime NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci,
  `tc_no` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `alma_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `birim` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`tarih`),
  UNIQUE KEY `tarih` (`tarih`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`tarih`, `aciklama`, `tc_no`, `alma_tarihi`, `birim`) VALUES
('2020-05-01 10:00:00', '', '25964064332', '2020-05-30 18:24:41', 'Endodonti'),
('2020-05-20 11:00:00', '', '25973064040', '2020-05-30 01:20:50', 'Endodonti');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
