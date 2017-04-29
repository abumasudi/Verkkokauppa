-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29.04.2017 klo 16:16
-- Palvelimen versio: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abunkauppa`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `asiakkaan_tilaus`
--

CREATE TABLE `asiakkaan_tilaus` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `tuotteen_id` int(100) NOT NULL,
  `tuotteen_nimi` varchar(255) NOT NULL,
  `tuotteen_hinta` int(100) NOT NULL,
  `t_qty` int(100) NOT NULL,
  `tuotteen_status` varchar(100) NOT NULL,
  `tilaus_id` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Rakenne taululle `brandit`
--

CREATE TABLE `brandit` (
  `brand_id` int(100) NOT NULL,
  `brandin_nimi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `brandit`
--

INSERT INTO `brandit` (`brand_id`, `brandin_nimi`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Sony'),
(4, 'Nokia'),
(5, 'Windows'),
(6, 'Acer'),
(7, 'LG'),
(8, 'Nikon');

-- --------------------------------------------------------

--
-- Rakenne taululle `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `tuotteen_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `tuotteen_nimi` varchar(300) NOT NULL,
  `tuotteen_kuva` text NOT NULL,
  `qty` int(100) NOT NULL,
  `hinta` int(100) NOT NULL,
  `koko_summa` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `cart`
--

INSERT INTO `cart` (`id`, `tuotteen_id`, `ip_add`, `user_id`, `tuotteen_nimi`, `tuotteen_kuva`, `qty`, `hinta`, `koko_summa`) VALUES
(5, 9, '0', 1, 'Mac Pro', 'macpro.jpg', 2, 3500, 7000),
(6, 4, '0', 1, 'iPhone 7 128 GB', 'iphone7plus.jpg', 3, 899, 2697),
(12, 8, '0', 1, 'Mac Mini', 'macmini.jpg', 1, 899, 899),
(13, 7, '0', 1, 'MacBook Pro 13 Touch Bar ', 'macbookprotouch.jpg', 1, 1999, 1999);

-- --------------------------------------------------------

--
-- Rakenne taululle `kategoriat`
--

CREATE TABLE `kategoriat` (
  `kat_id` int(100) NOT NULL,
  `kat_nimi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Vedos taulusta `kategoriat`
--

INSERT INTO `kategoriat` (`kat_id`, `kat_nimi`) VALUES
(1, 'Puhelimet'),
(2, 'Tietokoneet'),
(3, 'TV ja ääni'),
(4, 'Kamerat'),
(5, 'Pelit'),
(6, 'Elokuvat');

-- --------------------------------------------------------

--
-- Rakenne taululle `maksettu_tilaus`
--

CREATE TABLE `maksettu_tilaus` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `tuotteen_id` int(100) NOT NULL,
  `maara` int(100) NOT NULL,
  `tilaus_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Rakenne taululle `tuotteet`
--

CREATE TABLE `tuotteet` (
  `tuotteen_id` int(100) NOT NULL,
  `tuotteen_kat` int(100) NOT NULL,
  `tuotteen_brand` int(100) NOT NULL,
  `tuotteen_nimi` varchar(300) NOT NULL,
  `tuotteen_hinta` int(100) NOT NULL,
  `tuotteen_kuvaus` text NOT NULL,
  `tuotteen_kuva` text NOT NULL,
  `tuotteen_avainsanat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `tuotteet`
--

INSERT INTO `tuotteet` (`tuotteen_id`, `tuotteen_kat`, `tuotteen_brand`, `tuotteen_nimi`, `tuotteen_hinta`, `tuotteen_kuvaus`, `tuotteen_kuva`, `tuotteen_avainsanat`) VALUES
(1, 1, 1, 'iPhone 5 SE', 299, 'Mahtavilla ominaisuuksilla varustettu iPhone SE -älypuhelin 4 tuuman Retina HD –näytöllä, iOS9-käyttöjärjestelmällä, nopealla A9-suorittimella ja 4K videotallennuksella.', 'iphonese.jpg', 'apple puhelimet elektroniikka iphone'),
(2, 1, 1, 'iPhone 6s 32 GB', 599, 'Apple iPhone 6s, jonka Retina HD-näytössä on ainutlaatuinen 3D Touch -tekniikka. Älypuhelimen huippunopea A9-prosessori ja iOS10 varmistavat saumattoman käyttökokemuksen.', 'iphone6s.jpg', 'apple matkapuhelimet elektroniikka iphone'),
(3, 1, 1, 'iPhone 7 32 GB', 699, 'iPhone 7 tarjoaa entistä paremman käyttökokemuksen. Puhelimessa on uudet edistykselliset kamerat, uskomaton suorituskyky, pitkä akunkesto ja roiskeenkestävä rakenne.', 'iphone7.jpg', 'apple matkapuhelimet elektroniikka iphone'),
(4, 1, 1, 'iPhone 7 128 GB', 899, 'iPhone 7 Plus tarjoaa entistä paremman käyttökokemuksen. Roiskeenkestävässä puhelimessa on edistyksellinen kaksois-kamera loistavalla kuvanlaadulla, tehokas A10 Fusion -siru ja pitkä akunkesto. ', 'iphone7plus.jpg', 'apple matkapuhelimet elektroniikka iphone'),
(5, 1, 1, 'iPhone 7 Plus 128 GB (PRODUCT)Red', 899, 'iPhone 7 tarjoaa entistä paremman käyttökokemuksen. Puhelimessa on uudet edistykselliset kamerat, uskomaton suorituskyky, pitkä akunkesto ja roiskeenkestävä rakenne. Nettitilaukset toimitetaan tilausjärjestyksessä saatavuuden mukaan.', 'iphone7red.jpg', 'apple matkapuhelimet elektroniikka iphone'),
(6, 1, 2, 'Samsung Galaxy S7 32GB', 599, 'Samsung Galaxy S7 -älypuhelimen virtaviivainen pölyn- ja vedenkestävä muotoilu, 12, megapikselin kamera sekä Android 6.0 Marshmallow:n nerokkaat ominaisuudet tekevät puhelimesta varman valinnan laatutietoiselle.', 'samsungs7.jpg', 'samsung matkapuhelimet elektroniikka'),
(7, 2, 1, 'MacBook Pro 13 Touch Bar ', 1999, 'Aiempaa ohuempi ja kevyempi MacBook Pro 13 on myös nopeampi ja tehokkaampi tarjoten uskomattoman suorituskyvyn työ- ja viihdekäyttöön. Touch Bar tekee laitteen käytöstä intuitiivista. Touch ID -tunnistin mahdollistaa salamannopeaan kirjautumiseen.', 'macbookprotouch.jpg', 'apple tietokoneet'),
(8, 2, 1, 'Mac Mini', 899, 'Mac mini, jossa OS X Yosemite -käyttöjärjestelmä, 4. sukupolven Intel Core i5 -prosessori, kaksi Thunderbolt-liitäntää ja nopea Wi-Fi -yhteys.', 'macmini.jpg', 'apple mac tietokoneet'),
(9, 2, 1, 'Mac Pro', 3500, 'Ainutlaatuinen muotoilu, tehokas prosessori ja viiveetön suorituskyky. Mac Pro takaa ammattitason tehokkuuden.', 'macpro.jpg', 'apple tietokoneet mac'),
(10, 2, 6, 'Acer Chromebook CB3-431 14', 399, 'Acer Chromebook CB3-431 kannettava kirkkaalla 14\" Full HD-näytöllä. Kannettavassa on käyttäjäystävällinen Chrome OS, pitkäkestoinen akku ja esiasennetut Google-sovellukset.', 'acerchromebook.jpg', 'acer tietokoneet chromebook'),
(11, 3, 3, 'Sony 75 4K UHD Smart TV', 8495, 'Sony KD-75ZD9 75\" Smart-TV, tuottaa kirkkaan ja värikylläisen kuvan 4K UHD-resoluutiolla. Televisiossa on kehittyneet kuvatekniikat ja Android TV -ominaisuus. Digivirittimet antenni- ja kaapeliverkolle.', 'sony4ksmart.jpg', 'sony tv 4k smart'),
(12, 3, 7, 'LG 77\" 4K UHD OLED Smart TV ', 20000, 'Äärimmäisen ohut LG Smart-TV, jonka 77\" OLED-paneeliin on yhdistetty läpinäkyvä lasilevy. Näyttävän näköisessä TV:ssä on 4K UHD -resoluutio ja huippuunsa hiottu kuvanlaatu suurella kontrastilla. Antenni-, kaapeli- ja satelliittiverkon digivirittimet.', 'lg4k77oled.jpg', 'LG televisio 4k oled smart wifi'),
(13, 4, 3, 'Sony CyberShot DSC-HX400V/B ultrazoom-kamera', 399, 'Korkealuokkainen Sony DSC-HX400VB ultrazoom-kamera, jossa on korkean resoluution kenno, uskomaton 50x zoom sekä älykkäitä langattomia ominaisuuksia.', 'sonycybershot.jpg', 'kamera sony video'),
(14, 4, 8, 'Nikon D5500 järjestelmäkamera + 18-55 mm AF-P DX VR', 749, 'Kevyt Nikon D5500 järjestelmäkamera 24.2 megapikselin DX-kennolla ja kääntyvällä kosketusnäytöllä. Loistava ISO-herkkyysalue takaa terävät kuvat.', 'nikonkamera.jpg', 'nikon kamera video ');

-- --------------------------------------------------------

--
-- Rakenne taululle `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `etunimi` varchar(300) NOT NULL,
  `sukunimi` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `puhelinnumero` varchar(10) NOT NULL,
  `osoite1` varchar(300) NOT NULL,
  `osoite2` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `user_info`
--

INSERT INTO `user_info` (`user_id`, `etunimi`, `sukunimi`, `email`, `password`, `puhelinnumero`, `osoite1`, `osoite2`) VALUES
(1, 'Abdoulla', 'Masudi', 'masudi@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9876543211', 'adassdfsg ', 'asdf ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asiakkaan_tilaus`
--
ALTER TABLE `asiakkaan_tilaus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brandit`
--
ALTER TABLE `brandit`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoriat`
--
ALTER TABLE `kategoriat`
  ADD PRIMARY KEY (`kat_id`);

--
-- Indexes for table `maksettu_tilaus`
--
ALTER TABLE `maksettu_tilaus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuotteet`
--
ALTER TABLE `tuotteet`
  ADD PRIMARY KEY (`tuotteen_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asiakkaan_tilaus`
--
ALTER TABLE `asiakkaan_tilaus`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brandit`
--
ALTER TABLE `brandit`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kategoriat`
--
ALTER TABLE `kategoriat`
  MODIFY `kat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `maksettu_tilaus`
--
ALTER TABLE `maksettu_tilaus`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tuotteet`
--
ALTER TABLE `tuotteet`
  MODIFY `tuotteen_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
