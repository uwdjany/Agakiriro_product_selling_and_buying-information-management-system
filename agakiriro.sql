-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 04:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agakiriro`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Message_id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `readState` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_id`, `Email`, `Subject`, `content`, `readState`) VALUES
(16, 'hugues@gmail.com', 'hello', 'paci i want to buy a freezer. what can I do?', 'Read'),
(17, 'kevin@gmail.com', 'hi', 'how are you doing sir I want buy a bed. ', 'Read'),
(18, 'vincent@gmail.com', 'hello', 'comment ca va', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Item_id` int(11) NOT NULL,
  `Item_type` varchar(50) NOT NULL,
  `Owner_names` varchar(50) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `Telephone` varchar(16) NOT NULL,
  `Item_cost` int(11) NOT NULL,
  `Item_photo` varchar(255) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Item_id`, `Item_type`, `Owner_names`, `E_mail`, `Telephone`, `Item_cost`, `Item_photo`, `User_id`, `Status`) VALUES
(1, 'Generator', 'djanat amini', 'amini@gmail.com', '0786510564', 15000, '../images_agakiriro/item_img/loncin-lc8000d-as-generator.jpg', 11, 'Confirmed'),
(2, 'Generator', 'djanat amini', 'amini@gmail.com', '0786510564', 200, '../images_agakiriro/item_img/950W-Portable-Gasoline-Generator.jpg', 11, 'Confirmed'),
(3, 'bed', 'djanat amini', 'amini@gmail.com', '0786510564', 250000, '../images_agakiriro/item_img/wooden-box-bed-500x500.jpeg', 11, 'Appending'),
(4, 'Cupboard', 'djanat amini', 'amini@gmail.com', '0786510564', 300, '../images_agakiriro/item_img/5d8e265fb88ac36fad3a01df10fd5da4.jpg', 11, 'Confirmed'),
(5, 'Arm_Chair', 'djanat amini', 'amini@gmail.com', '0786510564', 8000000, '../images_agakiriro/item_img/9c1582241612069fcb95e02bea88c136.jpg', 11, 'Confirmed'),
(6, 'Freezer', 'dorcas Pogo', 'dorcas@gmail.com', '0786493544', 20000, '../images_agakiriro/item_img/616qyqpa0wL._SL1200_.jpg', 10, 'Confirmed'),
(7, 'Television', 'dorcas Pogo', 'dorcas@gmail.com', '0786493544', 53646354, '../images_agakiriro/item_img/32-inch-led-tv-500x500.jpg', 10, 'Confirmed'),
(8, 'Freezer', 'dorcas Pogo', 'dorcas@gmail.com', '0786493544', 676345, '../images_agakiriro/item_img/deep-freezer-500x500.jpg', 10, 'Confirmed'),
(9, 'Dors', 'dorcas Pogo', 'dorcas@gmail.com', '0786493544', 65234, '../images_agakiriro/item_img/depositphotos_86150216-stock-illustration-old-retro-wooden-furniture-wardrobe.jpg', 10, 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `Purchase_id` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `Item_type` varchar(50) NOT NULL,
  `Item_cost` int(11) NOT NULL,
  `Owner_Email` varchar(50) NOT NULL,
  `Owner_Telephone` varchar(50) NOT NULL,
  `Buyer_id` int(11) NOT NULL,
  `Buyer_names` varchar(50) NOT NULL,
  `Buyer_E_mail` varchar(50) NOT NULL,
  `Buyer_Telephone` varchar(16) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `Buy_date` date NOT NULL,
  `Item_photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`Purchase_id`, `Item_id`, `Item_type`, `Item_cost`, `Owner_Email`, `Owner_Telephone`, `Buyer_id`, `Buyer_names`, `Buyer_E_mail`, `Buyer_Telephone`, `payment_type`, `Buy_date`, `Item_photo`) VALUES
(29, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-07', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(31, 2, 'Generator', 200, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-07', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f393530572d506f727461626c652d4761736f6c696e652d47656e657261746f722e6a7067),
(32, 4, 'Cupboard', 300, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-07', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f35643865323635666238386163333666616433613031646631306664356461342e6a7067),
(33, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(45, 4, 'Cupboard', 300, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MTN', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f35643865323635666238386163333666616433613031646631306664356461342e6a7067),
(46, 4, 'Cupboard', 300, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MTN', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f35643865323635666238386163333666616433613031646631306664356461342e6a7067),
(48, 4, 'Cupboard', 300, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MTN', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f35643865323635666238386163333666616433613031646631306664356461342e6a7067),
(49, 5, 'Arm_Chair', 8000000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f39633135383232343136313230363966636239356530326265613838633133362e6a7067),
(50, 5, 'Arm_Chair', 8000000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f39633135383232343136313230363966636239356530326265613838633133362e6a7067),
(51, 4, 'Cupboard', 300, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MTN', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f35643865323635666238386163333666616433613031646631306664356461342e6a7067),
(52, 6, 'Freezer', 20000, 'dorcas@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MTN', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f363136717971706130774c2e5f534c313230305f2e6a7067),
(53, 4, 'Cupboard', 300, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f35643865323635666238386163333666616433613031646631306664356461342e6a7067),
(54, 2, 'Generator', 200, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f393530572d506f727461626c652d4761736f6c696e652d47656e657261746f722e6a7067),
(55, 6, 'Freezer', 20000, 'dorcas@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f363136717971706130774c2e5f534c313230305f2e6a7067),
(56, 6, 'Freezer', 20000, 'dorcas@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f363136717971706130774c2e5f534c313230305f2e6a7067),
(57, 4, 'Cupboard', 300, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MTN', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f35643865323635666238386163333666616433613031646631306664356461342e6a7067),
(58, 6, 'Freezer', 20000, 'dorcas@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MTN', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f363136717971706130774c2e5f534c313230305f2e6a7067),
(59, 9, 'Dors', 65234, 'dorcas@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MTN', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6465706f73697470686f746f735f38363135303231362d73746f636b2d696c6c757374726174696f6e2d6f6c642d726574726f2d776f6f64656e2d6675726e69747572652d77617264726f62652e6a7067),
(60, 9, 'Dors', 65234, 'dorcas@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6465706f73697470686f746f735f38363135303231362d73746f636b2d696c6c757374726174696f6e2d6f6c642d726574726f2d776f6f64656e2d6675726e69747572652d77617264726f62652e6a7067),
(61, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(62, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(63, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(64, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(65, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(66, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(67, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(68, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(69, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(70, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(71, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(72, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(73, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(74, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(75, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067),
(76, 1, 'Generator', 15000, 'amini@gmail.com', '', 11, 'djanat_amini', 'amini@gmail.com', '0786510564', 'MOBILE MONEY', '2021-08-08', 0x2e2e2f696d616765735f6167616b697269726f2f6974656d5f696d672f6c6f6e63696e2d6c6338303030642d61732d67656e657261746f722e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE `users_account` (
  `User_id` int(11) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `National_id` varchar(16) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `Telephone` varchar(16) NOT NULL,
  `Birth_date` date NOT NULL,
  `Staff_type` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Photo` blob NOT NULL,
  `Registered_date` date NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`User_id`, `First_name`, `Last_name`, `Gender`, `Country`, `National_id`, `E_mail`, `Telephone`, `Birth_date`, `Staff_type`, `Address`, `Username`, `Password`, `Photo`, `Registered_date`, `Status`) VALUES
(9, 'justine', 'kiki', 'Female', 'Rwandan', '9655685657489645', 'idr@gmail.com', '876745745545454', '2021-07-01', 'Customer', 'kigali', 'Username', '123', '', '2021-07-17', ''),
(10, 'dorcas', 'Pogo', 'Female', 'Rwandan', '153412341273123', 'dorcas@gmail.com', '0786493544', '2000-12-12', 'Staff', 'gisenyi', 'dorcas', 'doro', 0x2e2e2f696d616765735f6167616b697269726f2f75736572735f696d672f373165584242596a496d4c2e5f41435f53533435305f2e6a7067, '2021-07-19', ''),
(11, 'djanat', 'amini', 'Female', 'Rwandan', '1234512361452362', 'amini@gmail.com', '0786510564', '2000-11-11', 'Manager', 'gisenyi', 'djanat', '4321', 0x2e2e2f696d616765735f6167616b697269726f2f75736572735f696d672f6172746f6e38332e6a7067, '2021-07-19', ''),
(12, 'kevin', 'ndengeyimana', 'Male', 'Rwandan', '2413252342345263', 'kevin@gmail.com', '0789645123', '2000-07-12', 'Customer', 'Gisenyi', 'kevin', '1234', '', '2021-08-04', ''),
(15, 'amani', 'sauda', 'Female', 'DRC', '123456789009876', 'asdd@gmail.com', '1234567890', '2000-08-06', 'Customer', 'asdaasdd', 'amani', '1234', '', '2021-08-06', ''),
(16, 'helleo', 'jhxjks', 'Male', 'Rwandan', '2131256312341367', 'sr@gmail.com', '678234', '2000-08-10', 'Customer', 'gisenyi', 'hello', '1234', '', '2021-08-10', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Message_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Item_id`),
  ADD KEY `FK_user1` (`User_id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`Purchase_id`),
  ADD KEY `fk_item` (`Item_id`),
  ADD KEY `fk_usr` (`Buyer_id`);

--
-- Indexes for table `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `Purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users_account`
--
ALTER TABLE `users_account`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_user1` FOREIGN KEY (`User_id`) REFERENCES `users_account` (`User_id`);

--
-- Constraints for table `purchased`
--
ALTER TABLE `purchased`
  ADD CONSTRAINT `fk_item` FOREIGN KEY (`Item_id`) REFERENCES `products` (`Item_id`),
  ADD CONSTRAINT `fk_usr` FOREIGN KEY (`Buyer_id`) REFERENCES `users_account` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
