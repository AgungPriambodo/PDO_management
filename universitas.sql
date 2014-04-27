-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2014 at 03:59 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `universitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `inisial` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `inisial`) VALUES
(1, '123910040013', 'Bagus Setyawan Orbit Prastyo', 'BS'),
(2, '123910040012', 'Ahmad Nurfaqih', 'AN'),
(3, '123910040011', 'Anggun Setya', 'AS'),
(4, '123910040010', 'Agung Priambodo', 'AP'),
(5, '123910040009', 'Hadi Sofyan', 'HS'),
(6, '123910040008', 'Agung Priyo Utomo', 'APU'),
(7, '123910040007', 'Danu Aribowo', 'DA'),
(8, '123910040006', 'Nanang Kurniawan', 'NK');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_makul` varchar(5) NOT NULL,
  `nama_makul` varchar(20) NOT NULL,
  `sks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_makul`, `nama_makul`, `sks`) VALUES
(1, 'KB1', 'Matematika', 3),
(3, 'KB2', 'Bahasa Indonesia', 4),
(5, 'KB3', 'Fisika', 4),
(6, 'KB4', 'IPS', 5),
(7, 'KB5', 'Sexsiologi', 4),
(8, 'KB6', 'PKN', 3);
