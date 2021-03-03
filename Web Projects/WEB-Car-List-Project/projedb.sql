

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE TABLE `araclar` (
  `id` int(20) UNSIGNED NOT NULL,
  `markaid` int(20) NOT NULL,
  `markaadi` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `modelid` int(20) NOT NULL,
  `modeladi` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `yil` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `km` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `renk` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `motorhacmi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `maxhiz` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `fotograf` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `agirlik` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tekersayisi` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `vites` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sunroof` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;



INSERT INTO `araclar` (`id`, `markaid`, `markaadi`, `modelid`, `modeladi`, `yil`, `km`, `renk`, `motorhacmi`, `maxhiz`, `fotograf`, `agirlik`, `tekersayisi`, `vites`, `sunroof`) VALUES
(12, 1, 'Alfa Romeo', 1, 'Giulietta', '2020', '13000', 'Beyaz', '1300', '320', 'denise-bossarte-8rEJiVQk1Vw-unsplash.jpg', '5000', '4', '5', 'Yok'),
(13, 2, 'Audi', 4, 'A4', '2019', '46000', 'Mavi', '5000', '360', 'denise-bossarte-8rEJiVQk1Vw-unsplash.jpg', '6000', '4', '6', 'Var'),
(14, 1, 'Alfa Romeo', 3, 'Spider', '1989', '150000', 'Gri', '5000', '180', 'denise-bossarte-8rEJiVQk1Vw-unsplash.jpg', '6000', '4', '4', 'Yok'),
(15, 3, 'BMW', 12, '430i xDrive Gran Coupe', '2020', '0', 'Kırmızı', '8000', '400', 'denise-bossarte-8rEJiVQk1Vw-unsplash.jpg', '6000', '4', '6', 'Var'),
(16, 3, 'BMW', 10, '428i', '2020', '5000', 'Mavi', '5000', '320', 'denise-bossarte-8rEJiVQk1Vw-unsplash.jpg', '4000', '4', '6', 'Yok'),
(17, 2, 'Audi', 8, 'A8', '2019', '100', 'Beyaz', '3200', '340', 'denise-bossarte-8rEJiVQk1Vw-unsplash.jpg', '3000', '4', '6', 'Var'),
(18, 2, 'Audi', 7, 'A7', '2018', '60000', 'Siyah', '4000', '260', 'denise-bossarte-8rEJiVQk1Vw-unsplash.jpg', '2500', '4', '7', 'Yok');



CREATE TABLE `markalar` (
  `id` int(20) UNSIGNED NOT NULL,
  `marka` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;



INSERT INTO `markalar` (`id`, `marka`) VALUES
(1, 'Alfa Romeo'),
(2, 'Audi'),
(3, 'BMW'),
(4, 'Ford'),
(5, 'Honda'),
(6, 'Lamborghini'),
(7, 'Mercedes - Benz'),
(8, 'Nissan'),
(9, 'Opel'),
(10, 'Tesla'),
(11, 'Volkswagen'),
(12, 'Volvo');



CREATE TABLE `modeller` (
  `id` int(20) UNSIGNED NOT NULL,
  `markaid` int(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;



INSERT INTO `modeller` (`id`, `markaid`, `model`) VALUES
(1, 1, 'Giulietta'),
(2, 1, 'Brera'),
(3, 1, 'Spider'),
(4, 2, 'A4'),
(5, 2, 'A5'),
(6, 2, 'A6'),
(7, 2, 'A7'),
(8, 2, 'A8'),
(9, 3, '420d Gran Coupe'),
(10, 3, '428i'),
(11, 3, '430i xDrive'),
(12, 3, '430i xDrive Gran Coupe'),
(13, 4, 'Fiesta'),
(14, 4, 'Focus'),
(15, 4, 'Grand C-Max'),
(16, 4, 'Mustang'),
(17, 4, 'S-Max');


CREATE TABLE `uyeler` (
  `id` int(20) UNSIGNED NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aktivasyon` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aktif` varchar(255) COLLATE utf8_turkish_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;



INSERT INTO `uyeler` (`id`, `adi`, `soyadi`, `eposta`, `sifre`, `aktivasyon`, `aktif`) VALUES
(43, 'Fernando', 'Muslera', 'ornek@mailadresi.com', '123456', '534582', '1');


ALTER TABLE `araclar`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `markalar`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `modeller`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `araclar`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;


ALTER TABLE `markalar`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `modeller`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;


ALTER TABLE `uyeler`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
