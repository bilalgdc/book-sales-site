-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Şub 2022, 14:02:36
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `databaseproject`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adress`
--

CREATE TABLE `adress` (
  `id` int(10) UNSIGNED NOT NULL,
  `musteriid` int(11) NOT NULL,
  `il` varchar(255) NOT NULL,
  `ilce` varchar(255) NOT NULL,
  `postaKodu` varchar(6) NOT NULL,
  `acikAdres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `adress`
--

INSERT INTO `adress` (`id`, `musteriid`, `il`, `ilce`, `postaKodu`, `acikAdres`) VALUES
(1, 25, 'İstanbul', 'Esenyurt', '34510', 'asd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basket`
--

CREATE TABLE `basket` (
  `basketid` int(10) UNSIGNED NOT NULL,
  `musteriid` int(11) NOT NULL,
  `kitapid` int(11) NOT NULL,
  `kitapadet` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `kitapAdi` varchar(255) NOT NULL,
  `kitapTuru` varchar(255) NOT NULL,
  `kitapKonusu` varchar(255) NOT NULL,
  `yayinEviId` int(11) NOT NULL,
  `kitapYazarId` int(11) NOT NULL,
  `kitapbTarih` int(11) NOT NULL DEFAULT 0,
  `kitapResim` varchar(255) NOT NULL,
  `Fiyat` float NOT NULL DEFAULT 0,
  `Aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `books`
--

INSERT INTO `books` (`id`, `kitapAdi`, `kitapTuru`, `kitapKonusu`, `yayinEviId`, `kitapYazarId`, `kitapbTarih`, `kitapResim`, `Fiyat`, `Aktif`) VALUES
(1, 'Daha Adil Bir Dünya Mümkün', '|20|', 'Daha Adil Bir Dünya', 3, 5, 2021, 'dahaadildunya.jpg', 30.25, 1),
(2, 'Charlienin çikolata fabrikası', '|1|,|2|', 'çikolatacı Willy Wonka\'nın çikolata fabrikası içinde Küçük Charlie Bucket\'ın maceralarını anlatıyor.', 5, 5, 1964, 'charlie.jpg', 49.99, 1),
(17, 'Metro 2033', '|2|', 'moskovada hayatta kalma buzul çagı', 2, 1, 2005, 'metro2033.jpg', 28.99, 1),
(42, 'Dedemin Bakkalı', '|1|,|4|', ' büyüklere çocukların gözünden kendilerini görme imkânı verirken; küçüklere büyüklerin dünyasının ipuçlarını veriyor.', 2, 1, 2016, 'c84bc39c784d618d9eb374e45d7c0d84.jpg', 34.99, 1),
(43, 'Metro 2035', '|1|,|2|,|3|', 'Moskova Hayatta Kalma', 5, 7, 2016, 'ca3dc48705dc0e367728b1cefcb43d3a.jpg', 35.97, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `booktype`
--

CREATE TABLE `booktype` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `booktype`
--

INSERT INTO `booktype` (`id`, `type`) VALUES
(1, 'Hikaye'),
(2, 'Roman'),
(3, 'Edebiyat'),
(4, 'DünyaKlasikleri'),
(5, 'Din'),
(6, 'Tarih'),
(7, 'Felsefe'),
(8, 'Ekonomi'),
(9, 'Sağlık'),
(10, 'Çocuk'),
(11, 'Bilgisayar'),
(12, 'Hobi'),
(13, 'Aşk'),
(14, 'Eğitim'),
(15, 'KişiselGelişim'),
(16, 'Spor'),
(17, 'YabancıDil'),
(18, 'Sınavlar'),
(19, 'Test'),
(20, 'Politika'),
(25, 'Diğer'),
(26, 'Konu Anlatımı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `publisher`
--

CREATE TABLE `publisher` (
  `yid` int(10) UNSIGNED NOT NULL,
  `yAdi` varchar(255) NOT NULL,
  `yAdres` text NOT NULL,
  `yTel` varchar(15) NOT NULL,
  `yEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `publisher`
--

INSERT INTO `publisher` (`yid`, `yAdi`, `yAdres`, `yTel`, `yEmail`) VALUES
(2, 'Turkuvaz', ' Barbaros Bulvarı No:153 Cam Han Balmumcu-Beşiktaş 34349 İSTANBUL', '0212 354 30 00', 'info@turkuvazkitap.com.tr'),
(3, 'baskı', 'incirtepe istanbul ', '0212 354 30 12', 'asd@gmail.com'),
(5, 'ay ışıgı', 'esenyurt istanbul', '0542 254 63 94', 'ayisigi@kirtasiye.com'),
(9, 'Flora Kitap', 'Üsküdar İstanbul', '0216 553 12 74', 'florakitap@gmail.com'),
(11, 'serhat kitabevi', 'esenyurt istanbul', '0212 620 12 02', 'serhatkitabevi@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sales`
--

CREATE TABLE `sales` (
  `salesid` int(10) UNSIGNED NOT NULL,
  `musteriid` int(11) NOT NULL,
  `toplamfiyat` float NOT NULL,
  `satistarihi` datetime NOT NULL,
  `satisDurumu` int(11) NOT NULL DEFAULT 0,
  `kargo` varchar(255) NOT NULL,
  `kargoNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sales`
--

INSERT INTO `sales` (`salesid`, `musteriid`, `toplamfiyat`, `satistarihi`, `satisDurumu`, `kargo`, `kargoNo`) VALUES
(20, 25, 80.24, '2022-02-01 23:20:15', 3, 'enestdm', '54545'),
(21, 20, 63.98, '2022-02-02 23:20:32', 0, '', ''),
(22, 23, 49.99, '2022-02-03 23:20:35', 2, '', ''),
(23, 25, 30.25, '2022-02-04 23:20:38', 3, 'Yurtiçi', '123321123321'),
(24, 25, 49.99, '2022-02-05 23:20:42', 4, 'aras', '321123321123'),
(25, 25, 28.99, '2022-02-06 23:20:45', 5, 'DHL', '221332112332'),
(26, 25, 34.99, '2022-02-07 23:20:48', 6, '', ''),
(28, 25, 180.19, '2022-02-08 23:20:54', 7, '', ''),
(29, 25, 34.99, '2022-02-09 23:20:57', 1, '', ''),
(30, 25, 35.97, '2022-02-10 23:21:00', 0, '', ''),
(31, 25, 49.99, '2022-02-11 23:21:04', 0, '', ''),
(33, 25, 30.25, '2022-02-12 23:21:08', 0, '', ''),
(34, 25, 30.25, '2022-02-13 23:21:12', 0, '', ''),
(35, 25, 119.74, '2022-02-14 23:21:16', 0, '', ''),
(36, 25, 30.25, '2022-02-15 23:21:19', 0, '', ''),
(37, 25, 30.25, '2022-02-16 23:03:59', 0, '', ''),
(38, 25, 28.99, '2022-02-17 00:00:00', 0, '', ''),
(41, 27, 34.99, '2022-02-17 23:49:46', 0, '', ''),
(42, 25, 49.99, '2022-02-18 14:53:54', 0, '', ''),
(43, 25, 28.99, '2022-02-18 14:57:15', 0, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `salesdetail`
--

CREATE TABLE `salesdetail` (
  `salesdid` int(10) UNSIGNED NOT NULL,
  `salesid` int(11) NOT NULL,
  `kitapid` int(11) NOT NULL,
  `kitapadet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `salesdetail`
--

INSERT INTO `salesdetail` (`salesdid`, `salesid`, `kitapid`, `kitapadet`) VALUES
(44, 20, 1, 1),
(45, 20, 2, 1),
(46, 21, 17, 1),
(47, 21, 42, 1),
(48, 22, 2, 1),
(49, 23, 1, 1),
(50, 24, 2, 1),
(51, 25, 17, 1),
(52, 26, 42, 1),
(54, 28, 1, 1),
(55, 28, 17, 1),
(56, 28, 42, 1),
(57, 28, 2, 1),
(58, 28, 43, 1),
(59, 29, 42, 1),
(60, 30, 43, 1),
(61, 31, 2, 1),
(62, 33, 1, 1),
(63, 34, 1, 1),
(64, 35, 17, 1),
(65, 35, 1, 3),
(66, 36, 1, 1),
(67, 37, 1, 1),
(68, 38, 17, 1),
(71, 41, 42, 1),
(72, 42, 2, 1),
(73, 43, 17, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `SiteName` varchar(50) NOT NULL,
  `SiteTitle` varchar(60) NOT NULL,
  `SiteDescription` varchar(255) NOT NULL,
  `SiteKeywords` varchar(255) NOT NULL,
  `SiteCopyright` varchar(255) NOT NULL,
  `SiteLogo` varchar(30) NOT NULL,
  `SiteEmail` varchar(50) NOT NULL,
  `SiteEmailPassword` varchar(50) NOT NULL,
  `SiteAgreement` text NOT NULL,
  `SiteLink` varchar(255) NOT NULL,
  `SiteInimg` varchar(255) NOT NULL,
  `SiteUpimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `SiteName`, `SiteTitle`, `SiteDescription`, `SiteKeywords`, `SiteCopyright`, `SiteLogo`, `SiteEmail`, `SiteEmailPassword`, `SiteAgreement`, `SiteLink`, `SiteInimg`, `SiteUpimg`) VALUES
(1, 'Bilal Project', 'Cousin Book', 'sitedescription', 'book,panel', 'sitecopyright', 'logo.png', 'root@localhost.com', '12345', 'bütün koşulları kabul etmiş olursunun', 'http://localhost/proje', '13740327f190d8a145b176f0c2cd3498.jpg', 'da1b035c2d1f83ba6389a0320bf0cb3d.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Sex` varchar(6) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Active` tinyint(1) NOT NULL DEFAULT 0,
  `Customer` tinyint(1) NOT NULL DEFAULT 0,
  `RegisterDate` datetime NOT NULL,
  `RegisterIp` varchar(20) NOT NULL,
  `actcode` int(5) NOT NULL,
  `Bakiye` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `Name`, `Surname`, `Email`, `Password`, `Sex`, `Status`, `Active`, `Customer`, `RegisterDate`, `RegisterIp`, `actcode`, `Bakiye`) VALUES
(13, 'bilal', 'gidici', 'bilalgidici@outlook.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 1, 1, 0, '2022-01-30 23:22:25', '::1', 6006, 0),
(17, 'yelda', 'ansız', 'yelda@gmail.com', '91a43f3358e24faf844d39959616f3c1', 'not', 0, 1, 0, '2022-02-01 23:22:37', '::1', 2084, 0),
(19, 'ceyda', 'cansız', 'ceyda@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Female', 0, 1, 0, '2022-02-04 23:22:47', '::1', 5785, 0),
(20, 'enes', 'taşdemir', 'enestasdemir.tr@hotmail.com', 'c3cdbe10cc8ae980d3587012adc5258f', 'Male', 0, 0, 1, '2022-02-06 23:22:53', '::1', 4466, 76.64),
(23, 'ezgi', 'şensoy', 'ezgi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Female', 0, 0, 1, '2022-02-12 23:22:55', '::1', 2763, 0.01),
(25, 'ahmet', 'şanssız', 'ahmet@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 0, 0, 1, '2022-02-13 23:23:00', '::1', 4072, 12.54),
(27, 'zeynep', 'kart', 'zeynep@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Female', 0, 0, 1, '2022-02-17 23:45:14', '::1', 3121, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `writers`
--

CREATE TABLE `writers` (
  `id` int(10) UNSIGNED NOT NULL,
  `yazarAdi` varchar(255) NOT NULL,
  `yazarSoyadi` varchar(255) NOT NULL,
  `yazarBilgisi` text NOT NULL,
  `yazarEmail` varchar(255) NOT NULL,
  `yazaril` varchar(255) NOT NULL,
  `yazardTarih` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `writers`
--

INSERT INTO `writers` (`id`, `yazarAdi`, `yazarSoyadi`, `yazarBilgisi`, `yazarEmail`, `yazaril`, `yazardTarih`) VALUES
(1, 'Bilal ', 'Gidici', 'Bilal Gidici, Türk yazar ve şair. Edebî kişilikli toplumcu gerçekçi bir yazar', 'bilalgidici@outlook.com', 'Istanbul', '30.01.2001'),
(5, 'enes', 'taşdemir', 'gereksiz bir insandır dünyaya pek yararı yoktur.', 'enestasdemir.tr@hotmail.com', 'istanbul', '2001'),
(7, 'ahmet', 'yesevi', 'ahmet yesevi  şair yazar.', 'ahmetyesevi@hotmail.com', 'istanbul', '1965'),
(8, 'yaşar', 'kemal', 'Kemal Sadık Gökçeli veya bilinen adıyla Yaşar Kemal, Kürt asıllı Türk romancı, senarist, öykücü ve aktivisttir.', 'yasarkemal@gmail.com', 'İstanbul', '1923'),
(10, 'cemal', 'süreyya', 'Türk şiirinde modernist bir hareket olan İkinci Yeni şiirinin öncü şairlerinden biridir', 'cemalsureyya@gmial.com', 'erzincan', '1931');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basketid`);

--
-- Tablo için indeksler `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `booktype`
--
ALTER TABLE `booktype`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`yid`);

--
-- Tablo için indeksler `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`);

--
-- Tablo için indeksler `salesdetail`
--
ALTER TABLE `salesdetail`
  ADD PRIMARY KEY (`salesdid`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Tablo için indeksler `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adress`
--
ALTER TABLE `adress`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `basket`
--
ALTER TABLE `basket`
  MODIFY `basketid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- Tablo için AUTO_INCREMENT değeri `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `booktype`
--
ALTER TABLE `booktype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `publisher`
--
ALTER TABLE `publisher`
  MODIFY `yid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `sales`
--
ALTER TABLE `sales`
  MODIFY `salesid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `salesdetail`
--
ALTER TABLE `salesdetail`
  MODIFY `salesdid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
