-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 04:38 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `add1` varchar(255) NOT NULL,
  `add2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `paymode` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `cpassword`) VALUES
(1, 'Admin', 'admin@1234', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(3, 'Mi'),
(2, 'Apple'),
(4, 'Samsung'),
(5, 'Vivo'),
(6, 'Oppo'),
(7, 'HP'),
(8, 'Lenovo'),
(9, 'Realme'),
(10, 'Asus'),
(11, 'Micromax'),
(12, 'Sandisk'),
(13, 'Ubon'),
(14, 'JBL'),
(15, 'Sony'),
(16, 'Boat'),
(18, 'DELL');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `product` varchar(255) NOT NULL,
  `date` varchar(256) NOT NULL,
  `time` time NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `product`, `date`, `time`, `quantity`) VALUES
(2, 'k44p6u46hnslsin76pi5vbgjcs', '', '01/28/2022', '16:59:00', '1'),
(5, 's5r8k5j9dieiqc9fo7ln6sp93i', '9', '01/28/2022', '22:01:00', '2'),
(4, 's5r8k5j9dieiqc9fo7ln6sp93i', '2', '01/28/2022', '21:53:00', '1'),
(6, 's8igqdkf7jv2snr5cvcp2d645l', '2', '01/28/2022', '22:04:00', '1'),
(7, 'ib48pfpklelp2v9or542ohmrg4', '9', '01/28/2022', '23:59:00', '1'),
(8, '7eor1hcs132seigj4tuobm4oil', '7', '01/29/2022', '11:18:00', '3'),
(9, '7g70ba1orto1eb6gidaejh78q3', '2', '01/29/2022', '11:46:00', '2'),
(10, 'esncemgetsm28mi9rl0ful6e05', '2', '01/29/2022', '11:47:00', '1'),
(11, 'esncemgetsm28mi9rl0ful6e05', '3', '01/29/2022', '11:48:00', '1'),
(12, 'esncemgetsm28mi9rl0ful6e05', '6', '01/29/2022', '11:48:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'BIKASH DAS', 'bikashdasok@gmail.com', '7008275352', 'Hello  How are You');

-- --------------------------------------------------------

--
-- Table structure for table `dboy`
--

CREATE TABLE `dboy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dboy`
--

INSERT INTO `dboy` (`id`, `name`, `phone`, `email`, `password`, `location`, `image`) VALUES
(3, 'Bikash', '703283228', 'admin@1234', 'admin', 'Cuttack', 'Original-Material-5A-Best-Quality-Wireless-Earphone-for-iPhone.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `otp` varchar(256) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`id`, `email`, `user_id`, `otp`, `date`) VALUES
(1, 'bikashdasok@gmail.com', '2', '788344', '2022-02-02 12:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `offerproductname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `product_id`, `offerproductname`, `price`, `image`) VALUES
(3, '4', 'Earphone', '129', '790359794_Wired-Earphone.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `deliveryboy` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `delivery_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`id`, `order_id`, `user_id`, `session_id`, `payment_status`, `order_status`, `transaction_id`, `payment_type`, `date`, `time`, `totalprice`, `deliveryboy`, `otp`, `delivery_date`) VALUES
(1, 'BS58785', '2', 's5r8k5j9dieiqc9fo7ln6sp93i', 'success', 'cancel', '105875344', 'COD', '01/28/2022', '22:01:00', '31179', '', '', 0),
(2, 'BS75480', '2', 'ib48pfpklelp2v9or542ohmrg4', 'success', 'Delivered', '857634305', 'COD', '01/28/2022', '23:59:00', '590', '3', '', 1),
(3, 'BS92451', '2', '7eor1hcs132seigj4tuobm4oil', 'success', 'ordered', '1814750876', 'COD', '01/29/2022', '11:19:00', '56970', '', '', 0),
(4, 'BS54636', '2', 'esncemgetsm28mi9rl0ful6e05', 'success', 'cancel', '447570182', 'COD', '01/29/2022', '11:48:00', '87118', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pcategory`
--

CREATE TABLE `pcategory` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcategory`
--

INSERT INTO `pcategory` (`id`, `title`, `image`) VALUES
(10, 'Mobile', 'download.jfif'),
(2, 'Tablet', 'tablet1.jpg'),
(3, 'Laptop', 'laptop1.jpg'),
(5, 'Pendrive', 'pendrive.jpg'),
(7, 'Earphone', 'earphone1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `image`, `category`, `brand`, `status`) VALUES
(2, 'Samsung Tablet', '8\' inch super amoled screen', '29999', '644365388_dseifert_201107_4280_0002.0.jpg', '2', '4', 'Yes'),
(3, 'Ubon Earphone', 'Best Bass', '129', '783298835_Wired-Earphone.jpg', '7', '13', 'Yes'),
(4, 'ibud', 'Quality Sound', '59999', '1884396783_Original-Material-5A-Best-Quality-Wireless-Earphone-for-iPhone.jpg', '7', '2', 'Yes'),
(5, 'Vivo S3', 'ultimate power', '9490', '1438633367_LP_PCP_2Split_VivoAd_7Dec_pmgqzc.png', '10', '5', 'Yes'),
(6, 'Lenovo Ideapad', 'Thin and Light Laptop  (14 inch, Natural Silver, 1.41 kg, With MS Office)', '56990', '1229306638_Lenovo-82FG00BQIN-Laptops-491946562-i-1-1200Wx1200H.jfif', '3', '8', 'Yes'),
(7, 'POCO x3 Pro', '\r\nFor fast computing on the move, impressive photos, and all-day-long, uninterrupted performance, the POCO X3 Pro is the right device for you. This smartphone features the Qualcomm Snapdragon 860 for smooth function, 16.94-cm (6.67) FHD+ Display for clear visuals, and a 5160 mAh Battery to ensure that your smartphone does not run out of battery quickly.\r\n', '18990', '478393744_iPhone_Xs_79_0.jfif', '10', '3', 'Yes'),
(8, 'HP Pavillion', 'Ryzen 5 Hexa Core 5600H - (8 GB/512 GB SSD/Windows 10 Home/4 GB Graphics/NVIDIA GeForce GTX 1650/144 Hz) 15-ec2004AX Gaming Laptop  (15.6 inch, Shadow Black, 1.98 kg)', '59990', '2118285597_images.jfif', '3', '7', 'Yes'),
(9, 'Sandisk Pendrive', '32GB', '590', '1432408400_61DjwgS4cbL._SX679_.jpg', '5', '12', 'Yes'),
(10, 'Hp Pendrive', '32GB', '479', '110172455_61aflcZgumL._SL1400_.jpg', '5', '7', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `prod` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL,
  `flat` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `email`, `phone`, `password`, `confirmPassword`, `flat`, `area`, `landmark`, `city`, `state`, `pin`) VALUES
(3, '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Bikash Das', 'bikashdasok@gmail.com', '7008275352', 'bikash', 'bikash', '213/F ', 'CDA Sector-7', 'Near Police Station', 'Cuttack', 'Odisha', '753014');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dboy`
--
ALTER TABLE `dboy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcategory`
--
ALTER TABLE `pcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dboy`
--
ALTER TABLE `dboy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pcategory`
--
ALTER TABLE `pcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
