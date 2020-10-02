-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 05:16 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerceproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `admin_email` varchar(128) NOT NULL,
  `admin_name` varchar(128) NOT NULL,
  `admin_password` varchar(128) NOT NULL,
  `admin_phone` varchar(128) NOT NULL,
  `admin_img` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_name`, `admin_password`, `admin_phone`, `admin_img`) VALUES
(18, 's@gmail.com', 'saleh jehad', 'saleh1010', '078636336', 'aj9O5bQ_700bwp.webp');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(100) NOT NULL,
  `cat_name` varchar(128) NOT NULL,
  `cat_img` varchar(128) NOT NULL,
  `cat_status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`, `cat_status`) VALUES
(23, 'Women', 'womens-necklace.jpg', 'active'),
(24, 'Men', 'professional-man-portrait.jpg', 'active'),
(25, 'unique', 'man-on-bike.jpg', 'active'),
(26, 'Jewellery', 'white-faced-watch.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(100) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `msg` varchar(128) NOT NULL,
  `cDate` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_email` varchar(128) NOT NULL,
  `customer_password` varchar(128) NOT NULL,
  `customer_phone` varchar(128) NOT NULL,
  `customer_address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `customer_address`) VALUES
(4, 'soleh', 'soleh@gmail.com', 'soleh', '0798888888', 'Amman'),
(5, 'Swelleh', 'Swelleh@gmail.com', 'Swelleh', '0779999999', 'Irbid');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `payment_id` int(100) NOT NULL,
  `order_date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `customer_id`, `payment_id`, `order_date`) VALUES
(13, 4, 1, '2020-09-29 10:44'),
(14, 5, 1, '2020-09-29 11:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_det_id` int(100) NOT NULL,
  `orders_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `price` varchar(128) NOT NULL,
  `quantity` varchar(128) NOT NULL,
  `size` varchar(128) NOT NULL,
  `color` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_det_id`, `orders_id`, `product_id`, `price`, `quantity`, `size`, `color`) VALUES
(17, 13, 18, '299', '1', 'ml', 'blue'),
(18, 13, 30, '110', '2', 'm', 'yellow'),
(19, 14, 25, '380', '1', 'xl', 'red'),
(20, 14, 22, '75', '2', 'xl', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(100) NOT NULL,
  `payment_type` varchar(128) NOT NULL,
  `payment_name` varchar(128) NOT NULL,
  `security_code` varchar(3) NOT NULL,
  `payment_num` varchar(128) NOT NULL,
  `payment_exp` varchar(128) NOT NULL,
  `allowed` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_type`, `payment_name`, `security_code`, `payment_num`, `payment_exp`, `allowed`) VALUES
(1, 'visa', 'saleh', '111', '111111', '12/12/2050', 'allowed'),
(2, 'mastercard', 'Salameh', '222', '222222', '22/1/2222', 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `sub_cat_id` int(100) NOT NULL,
  `vendor_id` int(100) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `product_desc` varchar(128) NOT NULL,
  `product_price` varchar(128) NOT NULL,
  `product_discount` varchar(128) NOT NULL,
  `product_quantity` varchar(128) NOT NULL,
  `product_status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cat_id`, `sub_cat_id`, `vendor_id`, `product_name`, `product_desc`, `product_price`, `product_discount`, `product_quantity`, `product_status`) VALUES
(9, 23, 10, 3, 'Cool T-shirt', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '25', '20', '25', 'active'),
(10, 23, 10, 3, 'Lovely T-shirt', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '35', '35', '50', 'active'),
(11, 23, 10, 3, 'Everyday T-shirt', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '10', '8', '100', 'active'),
(12, 23, 10, 3, 'Great T-shirt', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '25', '25', '50', 'active'),
(13, 23, 11, 3, 'Soft Dress', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '75', '55', '10', 'active'),
(14, 23, 11, 3, 'Summer Dress', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '35', '35', '5', 'active'),
(15, 24, 12, 4, 'Everyday T-shirt', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '15', '15', '100', 'active'),
(16, 24, 12, 4, 'Cool T-shirt', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '35', '29', '50', 'active'),
(17, 24, 13, 4, 'Cool Suit', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '150', '150', '10', 'active'),
(18, 24, 13, 4, 'VIP Suit', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '350', '299', '5', 'active'),
(19, 24, 14, 4, 'Formal is the new Informal', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '50', '50', '15', 'active'),
(20, 24, 14, 4, 'Formal Clean Cut', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '75', '60', '15', 'active'),
(21, 25, 15, 5, 'This Season Best Of', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '90', '75', '13', 'active'),
(22, 25, 15, 5, 'New Trend', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '80', '75', '10', 'active'),
(23, 25, 15, 5, 'Cool Trendy Trend', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '100', '100', '15', 'active'),
(24, 25, 16, 5, 'Get Married Now', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '290', '290', '5', 'active'),
(25, 25, 16, 5, 'Shine and Rise', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '500', '380', '4', 'active'),
(26, 26, 17, 3, 'Get Shiny', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '65', '55', '15', 'active'),
(27, 26, 17, 3, 'Be Pretty', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '95', '80', '10', 'active'),
(28, 26, 18, 3, 'Circle Of Happeness', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '150', '150', '10', 'active'),
(29, 26, 18, 3, 'Love Yourself', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '200', '150', '5', 'active'),
(30, 26, 19, 3, 'Dress Timelessly', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '120', '110', '10', 'active'),
(31, 26, 19, 3, 'Catch The Moments', 'Made with love from love and more love, to suite all of your needs and to meet your expectations .', '230', '230', '10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pro_images`
--

CREATE TABLE `pro_images` (
  `pro_images_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `img1` varchar(128) NOT NULL,
  `img2` varchar(128) NOT NULL,
  `img3` varchar(128) NOT NULL,
  `img4` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pro_images`
--

INSERT INTO `pro_images` (`pro_images_id`, `product_id`, `img1`, `img2`, `img3`, `img4`) VALUES
(32, 9, '1601409027.fun-at-carnival.jpg', '1601409027.young-woman-holding-sunglasses.jpg', '1601409027.young-woman-riding-swings-at-fair.jpg', '1601409027.young-woman-smiling-on-swing-ride.jpg'),
(33, 10, '1601409284.model-poses-casually-on-ride.jpg', '1601409284.smiles-at-the-carnival.jpg', '1601409284.summer-fashion-woman.jpg', '1601409284.young-hip-woman-at-carnival.jpg'),
(34, 11, '1601409642.simple-red-t-shirt.jpg', '1601409642.striped-fashion-shirt.jpg', '1601409642.striped-t-shirt.jpg', '1601409642.white-tee-with-pocket.jpg'),
(35, 12, '1601409693.bold-summer-outfit.jpg', '1601409693.fashionable-woman-in-stripes.jpg', '1601409693.stylish-young-woman-posing.jpg', '1601409693.woman-looking-down.jpg'),
(36, 13, '1601409836.fashion-model-poses-with-scarf.jpg', '1601409836.model-in-red-with-heart-detail.jpg', '1601409836.model-poses-in-red-pansuit.jpg', '1601409836.red-on-red-fashion.jpg'),
(37, 14, '1601409894.boho-top-sleeve-detail.jpg', '1601409894.lace-edge-detail-summer-dress.jpg', '1601409894.summer-fashion-top-lace.jpg', '1601409894.womens-boho-dress.jpg'),
(38, 15, '1601409970.cobalt-blue-t-shirt.jpg', '1601409970.green-t-shirt.jpg', '1601409970.purple-t-shirt.jpg', '1601409970.simple-beige-mens-shirt.jpg'),
(39, 16, '1601410056.back-of-mens-white-shirt.jpg', '1601410056.blank-colored-t-shirts.jpg', '1601410056.rack-of-tshirts.jpg', '1601410056.white-tshirt-template.jpg'),
(40, 17, '1601410101.man-pointing-at-you.jpg', '1601410101.mens-business-fashion.jpg', '1601410101.stylish-man-in-bow-tie.jpg', '1601410101.tie-clip.jpg'),
(41, 18, '1601410149.business-man-checks-mobile.jpg', '1601410149.mens-suit-in-the-city.jpg', '1601410149.single-breasted-mens-suit-on-model.jpg', '1601410149.three-piece-suit.jpg'),
(42, 19, '1601410213.mans-portrait-above.jpg', '1601410213.professional-man-office.jpg', '1601410213.professional-man-on-pink.jpg', '1601410213.professional-man-portrait.jpg'),
(43, 20, '1601410292.autumn-fashion-on-man-with-glasses.jpg', '1601410292.casual-sweater-and-jeans-mens-fashion.jpg', '1601410292.man-wearing-bluetooth-headphones.jpg', '1601410292.mens-denim-fashion.jpg'),
(44, 21, '1601410902.man-on-bike.jpg', '1601410902.man-posing-with-bike.jpg', '1601410902.mens-fashion-and-bike.jpg', '1601410902.stylish-man-outdoors.jpg'),
(45, 22, '1601410992.man-relaxes-and-smiles.jpg', '1601410992.man-sitting-in-city.jpg', '1601410992.man-with-hands-together.jpg', '1601410992.young-man-in-bright-fashion.jpg'),
(46, 23, '1601411002.makeup-and-jewelry.jpg', '1601411002.mens-watch-and-ring.jpg', '1601411002.white-faced-watch.jpg', '1601411002.wrist-watch-on-driving-arm.jpg'),
(47, 24, '1601411117.beaded-detail-on-wedding-dress.jpg', '1601411117.beautiful-wedding-bouquet-and-bride.jpg', '1601411117.bridal-fashion-model-in-modern-wedding-gown.jpg', '1601411117.wedding-gown-and-smiling-bride.jpg'),
(48, 25, '1601411127.pexels-daniel-moises-magulado-1500881.jpg', '1601411127.pexels-trung-nguyen-1603884.jpg', '1601411127.pexels-wesner-rodrigues-3204420.jpg', '1601411127.pexels-милана-кушнирович-3739003.jpg'),
(49, 26, '1601411509.anchor-bracelet-gold.jpg', '1601411509.moon-friendship-bracelet.jpg', '1601411509.sun-friendship-bracelet.jpg', '1601411509.white-lace-choker-product-photo.jpg'),
(50, 27, '1601411522.anchor-bracelet-for-men.jpg', '1601411522.anchor-bracelet-mens.jpg', '1601411522.hipster-man.jpg', '1601411522.mens-anchor-bracelet.jpg'),
(51, 28, '1601411540.necklace-detail.jpg', '1601411540.origami-crane-necklace-gold.jpg', '1601411540.silver-origami-necklace.jpg', '1601411540.womens-necklace-set.jpg'),
(52, 29, '1601411556.dreamcatcher-pendant-necklace.jpg', '1601411556.elegant-woman.jpg', '1601411556.womens-gold-necklace.jpg', '1601411556.young-professional.jpg'),
(53, 30, '1601411665.classic-quartz-wrist-watch.jpg', '1601411665.grooms-prep-kit-for-wedding.jpg', '1601411665.modern-time-pieces.jpg', '1601411665.wrist-watches.jpg'),
(54, 31, '1601411674.marble-fashion-wristwatch.jpg', '1601411674.modern-bamboo-wristwatch.jpg', '1601411674.watches-in-black-white.jpg', '1601411674.wood-leather-watches.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(100) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `subcat_name` varchar(128) NOT NULL,
  `sub_cat_img` varchar(128) NOT NULL,
  `sub_cat_status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `cat_id`, `subcat_name`, `sub_cat_img`, `sub_cat_status`) VALUES
(10, 23, 'T-shirts', 'striped-fashion-shirt.jpg', 'active'),
(11, 23, 'Dresses', 'fashion-model-poses-with-scarf.jpg', 'active'),
(12, 24, 'T-shirts', 'white-tshirt-template.jpg', 'active'),
(13, 24, 'Suits', 'single-breasted-mens-suit-on-model.jpg', 'active'),
(14, 24, 'Formal', 'mens-denim-fashion.jpg', 'active'),
(15, 25, 'Men Fashion', 'man-relaxes-and-smiles.jpg', 'active'),
(16, 25, 'Wedding Dresses', 'pexels-daniel-moises-magulado-1500881.jpg', 'active'),
(17, 26, 'Bracelet', 'anchor-bracelet-gold.jpg', 'active'),
(18, 26, 'Neckles', 'gemstone-jewelry.jpg', 'active'),
(19, 26, 'Watches', 'makeup-and-jewelry.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(100) NOT NULL,
  `vendor_name` varchar(128) NOT NULL,
  `vendor_email` varchar(128) NOT NULL,
  `vendor_pass` varchar(128) NOT NULL,
  `vendor_phone` varchar(128) NOT NULL,
  `vendor_company` varchar(128) NOT NULL,
  `vendor_status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_email`, `vendor_pass`, `vendor_phone`, `vendor_company`, `vendor_status`) VALUES
(3, 'Saleh Jehad', 'salehjehad@gmail.com', 'salehjehad', '0788888888', 'FashionTM', 'active'),
(4, 'Salameh', 'Salameh@gmail.com', 'Salameh', '0799999999', 'BestFabrics', 'active'),
(5, 'Anas', 'Anas@gmail.com', 'Anas', '0777777777', 'SmoothSilk', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_det_id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `sub_cat_id` (`sub_cat_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `pro_images`
--
ALTER TABLE `pro_images`
  ADD PRIMARY KEY (`pro_images_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_det_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pro_images`
--
ALTER TABLE `pro_images`
  MODIFY `pro_images_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_category` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `pro_images`
--
ALTER TABLE `pro_images`
  ADD CONSTRAINT `pro_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
