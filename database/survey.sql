-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Des 2024 pada 11.15
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanswer`
--

CREATE TABLE `tanswer` (
  `Id` int(11) NOT NULL,
  `descriptionId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `companyId` varchar(50) NOT NULL,
  `jawaban` varchar(1) NOT NULL,
  `jawabanA` int(11) NOT NULL,
  `jawabanB` int(11) NOT NULL,
  `jawabanC` int(11) NOT NULL,
  `jawabanD` int(11) NOT NULL,
  `jawabanE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanswer`
--

INSERT INTO `tanswer` (`Id`, `descriptionId`, `groupId`, `companyId`, `jawaban`, `jawabanA`, `jawabanB`, `jawabanC`, `jawabanD`, `jawabanE`) VALUES
(204, 46, 15, '20241218 110846', 'A', 1, 0, 0, 0, 0),
(205, 47, 15, '20241218 110846', 'A', 1, 0, 0, 0, 0),
(206, 48, 15, '20241218 110846', 'A', 1, 0, 0, 0, 0),
(207, 49, 16, '20241218 110846', 'A', 1, 0, 0, 0, 0),
(208, 50, 16, '20241218 110846', 'A', 1, 0, 0, 0, 0),
(209, 51, 16, '20241218 110846', 'A', 1, 0, 0, 0, 0),
(210, 52, 17, '20241218 110846', 'A', 1, 0, 0, 0, 0),
(211, 53, 17, '20241218 110846', 'A', 1, 0, 0, 0, 0),
(212, 54, 17, '20241218 110846', 'A', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tcompany`
--

CREATE TABLE `tcompany` (
  `companyId` varchar(50) NOT NULL,
  `companyName` varchar(30) NOT NULL,
  `companyAddress` text NOT NULL,
  `companyPhoneHp` varchar(30) NOT NULL,
  `dateSurvey` varchar(30) NOT NULL,
  `suggestion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tcompany`
--

INSERT INTO `tcompany` (`companyId`, `companyName`, `companyAddress`, `companyPhoneHp`, `dateSurvey`, `suggestion`) VALUES
('20241218 110846', 'Hanafi', 'Tarandam', '082165443678', '2024-12-18', 'Udah bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tdescription`
--

CREATE TABLE `tdescription` (
  `descriptionId` int(11) NOT NULL,
  `description` text NOT NULL,
  `groupId` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `ModifiedUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tdescription`
--

INSERT INTO `tdescription` (`descriptionId`, `description`, `groupId`, `CreatedDate`, `CreatedUser`, `ModifiedDate`, `ModifiedUser`) VALUES
(46, 'Seberapa puas Anda dengan layanan yang diberikan oleh apotek kami?', 15, '2024-12-18 11:05:56', 1, '0000-00-00 00:00:00', 0),
(47, 'Apakah staf kami ramah dan membantu saat melayani Anda?', 15, '2024-12-18 11:06:03', 1, '0000-00-00 00:00:00', 0),
(48, 'Apakah waktu tunggu untuk mendapatkan obat sesuai dengan harapan Anda?', 15, '2024-12-18 11:06:09', 1, '0000-00-00 00:00:00', 0),
(49, 'Apakah lokasi apotek kami mudah diakses dari tempat tinggal Anda?', 16, '2024-12-18 11:06:24', 1, '0000-00-00 00:00:00', 0),
(50, 'Apakah Anda merasa tata letak di dalam apotek memudahkan pencarian produk?', 16, '2024-12-18 11:06:33', 1, '0000-00-00 00:00:00', 0),
(51, 'Apakah jam operasional apotek sudah sesuai dengan kebutuhan Anda?\r\n', 16, '2024-12-18 11:06:44', 1, '0000-00-00 00:00:00', 0),
(52, 'Apakah Anda merasa informasi yang diberikan apoteker tentang penggunaan obat jelas dan mudah dipahami?', 17, '2024-12-18 11:07:01', 1, '0000-00-00 00:00:00', 0),
(53, 'Apakah apotek kami menyediakan semua obat atau produk kesehatan yang Anda butuhkan?', 17, '2024-12-18 11:07:10', 1, '0000-00-00 00:00:00', 0),
(54, 'Apakah harga produk di apotek kami sesuai dengan kualitas dan pelayanan yang diberikan?\r\n', 17, '2024-12-18 11:07:18', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tgroup`
--

CREATE TABLE `tgroup` (
  `groupId` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `ModifiedUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tgroup`
--

INSERT INTO `tgroup` (`groupId`, `groupName`, `CreatedDate`, `CreatedUser`, `ModifiedDate`, `ModifiedUser`) VALUES
(15, 'Kepuasan Pelanggan', '2024-12-18 11:05:45', 1, '0000-00-00 00:00:00', 0),
(16, 'Kemudahan dan Kenyamanan', '2024-12-18 11:06:16', 1, '0000-00-00 00:00:00', 0),
(17, 'Kualitas Pelayanan', '2024-12-18 11:06:51', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tuser`
--

CREATE TABLE `tuser` (
  `userId` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tuser`
--

INSERT INTO `tuser` (`userId`, `username`, `password`, `fullname`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin@gmail.com', 'Super'),
(5, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'Tes', 'tes@gmail.com', 'Biasa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tanswer`
--
ALTER TABLE `tanswer`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `descriptionId` (`descriptionId`),
  ADD KEY `groupId` (`groupId`),
  ADD KEY `groupId_2` (`groupId`),
  ADD KEY `companyId` (`companyId`),
  ADD KEY `groupId_3` (`groupId`),
  ADD KEY `companyId_2` (`companyId`);

--
-- Indexes for table `tcompany`
--
ALTER TABLE `tcompany`
  ADD PRIMARY KEY (`companyId`);

--
-- Indexes for table `tdescription`
--
ALTER TABLE `tdescription`
  ADD PRIMARY KEY (`descriptionId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `tgroup`
--
ALTER TABLE `tgroup`
  ADD PRIMARY KEY (`groupId`),
  ADD KEY `CreatedUser` (`CreatedUser`,`ModifiedUser`),
  ADD KEY `CreatedUser_2` (`CreatedUser`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tanswer`
--
ALTER TABLE `tanswer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;
--
-- AUTO_INCREMENT for table `tdescription`
--
ALTER TABLE `tdescription`
  MODIFY `descriptionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tgroup`
--
ALTER TABLE `tgroup`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tanswer`
--
ALTER TABLE `tanswer`
  ADD CONSTRAINT `tanswer_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `tcompany` (`companyId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanswer_ibfk_3` FOREIGN KEY (`groupId`) REFERENCES `tgroup` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanswer_ibfk_4` FOREIGN KEY (`descriptionId`) REFERENCES `tdescription` (`descriptionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tdescription`
--
ALTER TABLE `tdescription`
  ADD CONSTRAINT `tdescription_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `tgroup` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
