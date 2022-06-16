SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `credentials` (
  `cnic` varchar(15) NOT NULL,
  `name` tinytext NOT NULL,
  `father_name` tinytext NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`cnic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `credentials` (`cnic`, `name`, `father_name`, `password`) VALUES
('34603-8562277-0', 'Anum', 'Aamir', 'Dell1234'),
('34603-8562277-1', 'Iffat', 'Aamir', 'Iffat123');
