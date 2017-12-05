-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 06. Dez 2017 um 00:00
-- Server-Version: 5.6.35
-- PHP-Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `pixa`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder`
--

CREATE TABLE `bilder` (
  `bilderid` int(11) NOT NULL,
  `fotograf_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `beschrieb` varchar(500) NOT NULL,
  `kategorie` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bilder`
--

INSERT INTO `bilder` (`bilderid`, `fotograf_id`, `name`, `beschrieb`, `kategorie`, `link`, `datum`) VALUES
(7, 1, 'Fotografin', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et e', 'Portrait', 'img/foto.jpg', '2017-12-03 23:00:00'),
(8, 1, 'Landschaft', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. ', 'Natur', 'img/country_1.jpg', '2017-12-04 23:00:00'),
(9, 1, 'Bild 5', 'Lorem Ipsum dolor', 'Natur', 'img/Berg.jpg', '2017-12-05 12:32:13'),
(10, 1, 'Landschaft 2', 'sdlfhsdk skdjfhskdjfh sdkfhsdkjfh skdfhs fkjhsdf ', 'Natur', 'img/IMG_0017.jpg', '2017-12-05 14:57:51'),
(11, 1, 'Test 100', 'dkjf skdjfhhsd sdkf skdjf dweguirwt. cvxc saie xbvhx', 'Natur', 'img/IMG_0935.jpg', '2017-12-05 15:43:12'),
(12, 1, 'Tropf', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua', 'Macro', 'img/drip-351619_640.jpg', '2017-12-05 19:47:36'),
(13, 1, 'Blume', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua', 'Macro', 'img/flower-2197679_640.jpg', '2017-12-05 19:49:06'),
(14, 2, 'Frau', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua', 'Portrait', 'img/girl-2032802_640.jpg', '2017-12-05 19:52:23'),
(15, 2, 'Alter Mann', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua', 'Portrait', 'img/portrait-2870659_640.jpg', '2017-12-05 19:52:46'),
(16, 2, 'Trees', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua', 'Natur', 'img/trees-2920264_640.jpg', '2017-12-05 19:53:19'),
(17, 3, 'Malerei', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua', 'Kunst', 'img/woman-845850_640.jpg', '2017-12-05 19:55:57'),
(18, 3, 'Vogelchen', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua', 'Kunst', 'img/bird-2967114_640.jpg', '2017-12-05 19:56:30');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `interessen`
--

CREATE TABLE `interessen` (
  `id` int(11) NOT NULL,
  `fotograf_id` int(11) NOT NULL,
  `kategorie` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `wert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `interessen`
--

INSERT INTO `interessen` (`id`, `fotograf_id`, `kategorie`, `wert`) VALUES
(1, 4, 'Natur', 6),
(2, 4, 'Kunst', 9),
(4, 4, 'Portrait', 4),
(5, 4, 'Macro', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `benutzername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `benutzername`, `email`, `passwort`, `vorname`, `nachname`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test.test@test.com', '$2y$10$knhKRilgGYaLFdqfViynmO8NLYq73sDa4V5Qs/w/3rzsa3tFjTFFW', '', '', '2017-12-04 09:10:56', NULL),
(2, 'Henry Thoreau', 'gugus.hallo@gugus.ch', '$2y$10$oBx7L8Qa8dKVTAyDHs/MFOCWmqPOPrFuUcwhCEZkfIO04TiUeJrnG', '', '', '2017-12-05 19:50:08', NULL),
(3, 'Ein Fotograph', 'kunstkunst@kunst.ch', '$2y$10$lOFp70rOaQhgl/4.EKLL2ebZHzPNovZqUhOhSVxMTY1DyZB0kToR6', '', '', '2017-12-05 19:55:02', NULL),
(4, 'Fabio', 'fabio.kalbermatter@lernende.bfo-vs.ch', '$2y$10$ostxh/suA95HhyM4tNSXjubCND5op9vNpFiPeS0pMhvLfTujrQ1tS', '', '', '2017-12-05 21:09:44', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`bilderid`);

--
-- Indizes für die Tabelle `interessen`
--
ALTER TABLE `interessen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fotograf_id` (`fotograf_id`,`kategorie`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `bilderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT für Tabelle `interessen`
--
ALTER TABLE `interessen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
