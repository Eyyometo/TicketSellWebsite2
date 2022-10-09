-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 11 Haz 2021, 13:36:53
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `php_final`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullanici_adi`, `sifre`) VALUES
(1, 'admin', 'andac0000'),
(2, 'admin', 'metin0000'),
(3, 'admin', 'fatima0000'),
(4, 'admin', 'hatice0000');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `id` int(11) NOT NULL,
  `siparis_kullanici` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adi_soyadi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunler` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `toplam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`id`, `siparis_kullanici`, `adi_soyadi`, `adres`, `telefon`, `email`, `urunler`, `toplam`) VALUES
(16, '1', 'Andaç Taşdemir', 'merter', '5385678213', 'andac_05@hotmail.com', 'a:11:{i:2;a:2:{s:2:\"id\";s:1:\"2\";s:4:\"adet\";s:1:\"1\";}i:6;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"adet\";s:1:\"2\";}i:5;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"adet\";s:1:\"1\";}i:8;a:2:{s:2:\"id\";s:1:\"8\";s:4:\"adet\";s:1:\"1\";}i:9;a:2:{s:2:\"id\";s:1:\"9\";s:4:\"adet\";s:1:\"1\";}i:10;a:2:{s:2:\"id\";s:2:\"10\";s:4:\"adet\";s:1:\"1\";}i:13;a:2:{s:2:\"id\";s:2:\"13\";s:4:\"adet\";s:1:\"1\";}i:20;a:2:{s:2:\"id\";s:2:\"20\";s:4:\"adet\";s:1:\"1\";}i:44;a:2:{s:2:\"id\";s:2:\"44\";s:4:\"adet\";s:1:\"1\";}i:50;a:2:{s:2:\"id\";s:2:\"50\";s:4:\"adet\";s:1:\"1\";}i:41;a:2:{s:2:\"id\";s:2:\"41\";s:4:\"adet\";s:1:\"1\";}}', '1006106218');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urun_adi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urun_fiyati` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urun_resmi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urun_adi`, `urun_fiyati`, `urun_resmi`) VALUES
(1, 'Tane Ekmek', '1', 'resimler/ekmek.png'),
(2, 'Kola', '3', 'resimler/cola.png'),
(3, 'Kilo Soğan', '4', 'resimler/so%C4%9Fan.jpg'),
(4, 'Kilo Meyve', '6', 'resimler/meyve.jpg'),
(5, 'Kilo Çikolata', '2', 'resimler/%C3%A7ikolata.jpg'),
(6, 'Tane Hamburger', '7', 'resimler/hamburger.png'),
(7, 'Tane Pasta', '10', 'resimler/pasta.png'),
(8, 'Araba', '50000', 'resimler/unnamed.png'),
(9, 'İPHONE 12 PRO 128 GB', '5000', 'resimler/iphone.png'),
(10, 'AİRPODS', '1000', 'resimler/airpods.png'),
(11, 'Litrelik yağ', '50', 'resimler/ya%C4%9F.png'),
(12, 'Pişmiş Pirzola', '15', 'resimler/pirzola.png'),
(13, 'Playstation 5', '200', 'resimler/ps5.jpeg'),
(14, 'Tane Pudra Şekeri', '35', 'resimler/pudra%20%C5%9Fekeri.png'),
(15, 'Airmax 720', '340', 'resimler/airmax.png'),
(16, 'Bebek bezi', '30', 'resimler/bez.jpg'),
(17, 'Maske', '11', 'resimler/maske.jpg'),
(18, 'Çeyrek Altın', '800', 'resimler/alt%C4%B1n.jpg'),
(19, 'İnstagram', '10000000', 'resimler/instagram.jpg'),
(20, 'Ferrari', '50000', 'resimler/ferrari.jpg'),
(21, 'Sahibinden Villa', '333000', 'resimler/villa.jpeg'),
(22, 'Yavuz Sultan Selim Köprüsü', '3000000', 'resimler/yavuzk%C3%B6pr%C3%BC.jpg'),
(41, 'Twitter', '5000000', 'resimler/twitter.png'),
(42, 'İpad pro 256 GB', '3000', 'resimler/ipad.jpg'),
(43, 'Altın Klozet', '40000', 'resimler/kolzet.jpg'),
(44, 'KRAL ALEX DE SOUZA', '999999999', 'resimler/alex.jpg'),
(45, 'Bitcoin', '316000000', 'resimler/bitcoin.png'),
(46, 'Dominik Adası', '2000000', 'resimler/ada.jpg'),
(47, 'Fenerbahçe Spor Kulübü', '1907000000', 'resimler/fb.png'),
(48, 'Space X Falcon Roket', '20000000', 'resimler/falcon.jpg'),
(49, 'Facebook', '80000000', 'resimler/face.jpg'),
(50, 'Ceza', '1000000', 'resimler/Rapstar.jpg'),
(51, 'Korsan Gemisi', '4000000', 'resimler/gemi.jpg'),
(52, 'Cristiano Ronaldo', '84000000', 'resimler/ronald%C4%B1.jpg'),
(53, 'ATATÜRK Havalimanı', '28000000', 'resimler/havaliman%C4%B1.jpg'),
(54, 'Gaming Notebook', '100', 'resimler/pc.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
