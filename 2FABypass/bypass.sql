-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Şub 2024, 21:14:52
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bypass`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `attempts_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `attempts`
--

INSERT INTO `attempts` (`id`, `attempts_number`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blacklist`
--

CREATE TABLE `blacklist` (
  `id` int(11) NOT NULL,
  `ip_number` varchar(20) NOT NULL,
  `visit_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blacklist`
--

INSERT INTO `blacklist` (`id`, `ip_number`, `visit_count`) VALUES
(5, '343443', 2),
(19, '127.0.0.1', 2),
(20, '127.0.0.1', 2),
(33, '::1', 3),
(34, '::1', 3),
(35, '::1', 3),
(36, '::1', 3),
(37, '::1', 3),
(38, '::1', 3),
(39, '::1', 3),
(40, '::1', 3),
(41, '::1', 3),
(42, '127.0.0.1', 3),
(43, '127.0.0.1', 3),
(44, '127.0.0.1', 3),
(45, '127.0.0.1', 3),
(46, '127.0.0.1', 3),
(47, '127.0.0.1', 3),
(48, '127.0.0.1', 3),
(49, '127.0.0.1', 3),
(50, '127.0.0.1', 3),
(51, '127.0.0.1', 3),
(52, '127.0.0.1', 3),
(53, '127.0.0.1', 3),
(54, '127.0.0.1', 3),
(55, '127.0.0.1', 3),
(56, '127.0.0.1', 3),
(57, '127.0.0.1', 3),
(58, '127.0.0.1', 3),
(59, '127.0.0.1', 3),
(60, '127.0.0.1', 3),
(61, '127.0.0.1', 3),
(62, '127.0.0.1', 3),
(63, '127.0.0.1', 3),
(64, '127.0.0.1', 3),
(65, '127.0.0.1', 3),
(66, '127.0.0.1', 3),
(67, '127.0.0.1', 3),
(68, '127.0.0.1', 3),
(69, '127.0.0.1', 3),
(70, '127.0.0.1', 3),
(71, '127.0.0.1', 3),
(72, '127.0.0.1', 3),
(73, '127.0.0.1', 3),
(74, '127.0.0.1', 3),
(75, '127.0.0.1', 3),
(76, '127.0.0.1', 3),
(77, '127.0.0.1', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'victim@gmail.com', 'victim', '$2y$10$TTMTaC2yZmMXsTMK18oBG.VP96iQnazL9usT4DBOXER6zXCR4sIq6'),
(2, 'unknown@gmail.com', 'unknown', '$2y$10$APgJj6RRPqo8ddw.YKgONeYuDPPVsq2oIZ/lBYFcUkzQ2HPREgG3m');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
