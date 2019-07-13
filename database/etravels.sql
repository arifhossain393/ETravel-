-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 08:36 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etravels`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `user_name`, `email`, `bio`, `password`, `user_type`) VALUES
(1, 'Taslima Akter Eti', 'admin', 'taslima@gmail.com', 'Admin Profile.', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(3, 'Taslima Akter', 'taslima', 'parasbhatia08@gmail.com', 'This is Administor Profile.', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `blog_img` varchar(255) NOT NULL,
  `pub_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `catid`, `title`, `description`, `blog_img`, `pub_date`, `author_name`) VALUES
(2, 2, 'The Sun Is Underappreciated', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam efficitur egestas risus. Sed eros augue, tempor et faucibus eu, cursus ac lacus. Ut sodales semper ante, at malesuada neque vestibulum Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam efficitur egestas risus. Sed eros augue, tempor et faucibus eu, cursus ac lacus. Ut sodales semper ante, at malesuada neque vestibulum Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam efficitur egestas risus. Sed eros augue, tempor et faucibus eu, cursus ac lacus. Ut sodales semper ante, at malesuada neque vestibulum Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam efficitur egestas risus. Sed eros augue, tempor et faucibus eu, cursus ac lacus. Ut sodales semper ante, at malesuada neque vestibulum</p>\r\n', 'upload/6a593d6c3a.jpg', '2018-03-28 18:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `pacId` int(11) NOT NULL,
  `pacName` varchar(50) NOT NULL,
  `pacPrice` int(50) NOT NULL,
  `bookDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `usrId`, `pacId`, `pacName`, `pacPrice`, `bookDate`) VALUES
(6, 1, 2, 'Nepal Once Is Not Enough With Airfare', 19190, '2018-05-09 18:00:00'),
(7, 6, 2, 'Nepal Once Is Not Enough With Airfare', 19190, '2018-05-09 18:00:00'),
(8, 6, 4, 'Bhutan Happiness Is A Place', 15990, '2018-05-09 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cat_name`) VALUES
(1, 'Bandarban Tour'),
(2, 'Daily Tours'),
(3, 'abroad tour');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `subject`, `message`, `status`, `date`) VALUES
(2, 'Arif Hossain Sarker', 'arif.hossainsust@gmail.com', 'Tour', 'Tour', 0, '2018-03-28 16:31:47'),
(3, 'Kazi Rabbi', 'kazirabbi@gmail.com', 'Tour', 'hello,', 0, '2018-03-28 19:05:03'),
(4, 'Taslima Akter', 'taslima23@gmail.com', 'Tour', 'I interest', 0, '2018-03-29 08:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom_package`
--

CREATE TABLE `tbl_custom_package` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `trans_type` varchar(150) NOT NULL,
  `travel_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profession` varchar(255) NOT NULL,
  `visit_country` varchar(255) NOT NULL,
  `pre_visit` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_custom_package`
--

INSERT INTO `tbl_custom_package` (`id`, `name`, `email`, `phone`, `trans_type`, `travel_date`, `profession`, `visit_country`, `pre_visit`, `bio`) VALUES
(1, 'Arif Hossain Sarker', 'arif@gmail.com', '01671961393', 'Bus', '2018-03-25 09:50:41', 'student', 'Nepal', 'India', 'hi'),
(3, 'Taslima Akter Eti', 'taslimaeti@gmail.com', '01835961741', 'Air', '2018-03-25 09:50:55', 'student', 'Nepal', 'India', 'hi'),
(6, 'Musa Bintay', 'musa@gmail.com', '01835961741', 'Train', '2018-04-01 18:00:00', 'student', 'Sajek', 'khulna', 'test'),
(7, 'Musa Bintay', 'musa@gmail.com', '01835961741', 'Train', '2018-04-01 18:00:00', 'student', 'Sajek', 'khulna', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destination`
--

CREATE TABLE `tbl_destination` (
  `id` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `place_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_destination`
--

INSERT INTO `tbl_destination` (`id`, `place`, `place_img`) VALUES
(1, 'Sundarban', 'upload/9f342b3f33.jpg'),
(2, 'Sajek', 'upload/5b21fc1b9f.jpg'),
(3, 'Rangamati', 'upload/ab1c649423.jpg'),
(4, 'Nepal', 'upload/3f27366c29.jpg'),
(5, 'Butan', 'upload/304c6e8a94.jpg'),
(6, 'Safari Park', 'upload/0277d0d563.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `pacid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gallery_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `pacid`, `name`, `gallery_image`) VALUES
(5, 2, 'sajek', 'upload/3d96757e44.jpg'),
(6, 2, 'nepal', 'upload/2c56a63bf0.jpg'),
(7, 2, 'nepal', 'upload/de6a4ebcc7.jpg'),
(8, 4, 'bhutan', 'upload/4c83bde02b.jpg'),
(9, 4, 'bhutan', 'upload/1c74cf2ccf.jpg'),
(10, 5, 'eid vacation', 'upload/714b32cb08.jpg'),
(11, 6, 'safari park', 'upload/2d0c0cf9b9.jpg'),
(12, 5, 'eid', 'upload/c581b93e0a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_type` varchar(255) NOT NULL,
  `hotel_img` varchar(255) NOT NULL,
  `hotel_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`id`, `hotel_name`, `hotel_type`, `hotel_img`, `hotel_address`) VALUES
(5, 'Javale Noor Hotel', 'Three Star', 'upload/e36a228be0.jpg', 'Dhaka, Uttara'),
(6, 'Hotel Arts', 'Five Star', 'upload/0f4999cb4a.jpg', 'Chaksibari Marg, Thamel, Kathmandu 44600, Nepal'),
(7, 'Paro - Based Camp', 'Five Star', 'upload/baf01ca974.jpg', 'Thimphu - Amodhara');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `pacId` int(11) NOT NULL,
  `pacName` varchar(50) NOT NULL,
  `pacPrice` float(10,2) NOT NULL,
  `bookDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `usrId`, `pacId`, `pacName`, `pacPrice`, `bookDate`) VALUES
(7, 4, 2, 'Nepal Once Is Not Enough With Airfare', 19765.70, '2018-05-09 18:00:00'),
(8, 4, 2, 'Nepal Once Is Not Enough With Airfare', 19765.70, '2018-05-04 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `id` int(11) NOT NULL,
  `desid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `hotelid` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `pac_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(255) NOT NULL,
  `itinerary` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pac_type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`id`, `desid`, `catid`, `hotelid`, `transid`, `pac_title`, `description`, `duration`, `itinerary`, `price`, `image`, `quantity`, `pac_type`) VALUES
(2, 1, 1, 5, 2, 'Nepal Once Is Not Enough With Airfare to the world', '<h2>Product Description</h2>\r\n\r\n<p>Mattis interdum nunc massa. Velit. Nonummy penatibus luctus. Aliquam. Massa aptent senectus elementum taciti.Id sodales morbi felis eu mus auctor ullamcorper. Litora. In nostra tempus, habitant. Nam tristique.</p>\r\n\r\n<p>Felis venenatis metus placerat taciti malesuada ultricies bibendum nunc hymenaeos orci erat mollis pretium ligula ligulamus pellentesque urna. Sagittis bibendum justo congue facilisi. Aliquam potenti sagittis etiam facilisis vehicula. Id.</p>\r\n', '3 days 2 night', '<p style=\"text-align:left\"><strong>Day 1 : Arrive Kathmandu Airport&ndash;Transfer to Kathmandu Hotel</strong><br />\r\nWelcome at Kathmandu International airport by our representative who will take you to the hotel by our own private car. Check-in at hotel and stay at Kathmandu hotel.</p>\r\n\r\n<p style=\"text-align:left\"><strong>Day 2 : Kathmanduto To Nagarkot Transfer - Nagarkot Stay</strong><br />\r\nBreakfast at hotel. Transfer to Nagarkot and . Check-in at Nagarkot hotel. Overnight stay at Nagarkot hotel.</p>\r\n\r\n<p style=\"text-align:left\"><strong>Day 3 :Nagarkot Stay</strong><br />\r\nFree day at Nagarkot.Overnight stay at Nagarkot hotel.</p>\r\n\r\n<p style=\"text-align:left\"><strong>Day 4 :Nagarkot Hotel to Kathmandu Transfer- Kathmandu Stay</strong><br />\r\nBreakfast at Nagarkot hotel after which we will start for Kathmandu. Visit Bhaktipur on the way. Lunch on the way at a highway restaurant. After we reach the Kathmandu hotel you have the rest of the day free. Overnight stay at Kathmandu hotel.</p>\r\n\r\n<p style=\"text-align:left\"><strong>Day 5 :Kathmandu Sightseeing- Depart Back to Dhaka</strong><br />\r\nBreakfast at hotel. Sightseeing in Kathmandu which includes Kathmandu Swyambhunath and Patan Durbar square. After the brief tour we will drop you off at the airport for your return flight to Dhaka.</p>\r\n', 19195, 'upload/0254bce395.', 1, 2),
(4, 5, 3, 6, 3, 'Bhutan Happiness Is A Place', '<p><strong>Inclusion</strong></p>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>Return airfare</li>\r\n	<li>2 Nights accommodation at Paro with Breakfast.</li>\r\n	<li>1Night Accommodation at Thimphu with Breakfast</li>\r\n	<li>Double sharing Room.</li>\r\n	<li>Meal - Breakfast.</li>\r\n	<li>Land Transportation byair conditioned Carduring the entire trip.</li>\r\n	<li>Sightseeing in all mentioned place at itinerary.</li>\r\n	<li>Services oflocal English speaking tour guideduring the sightseeing.</li>\r\n	<li>All applicable taxes and service charges.</li>\r\n</ul>\r\n\r\n<p><strong>Exclusion</strong></p>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>Tips.</li>\r\n	<li>Excess baggage charges</li>\r\n	<li>Drinks</li>\r\n	<li>Cigarettes</li>\r\n	<li>Laundry</li>\r\n	<li>Telephone calls and any personal expenses</li>\r\n	<li>Anything which is not mention in the inclusion</li>\r\n</ul>\r\n', '6 days 5 night', '<p style=\"text-align:left\"><strong>Day1 Bhutan Airport&ndash;Hotel Thimphu</strong><br />\r\nThe flight into the Himalayas reveals scenic and breathtaking views of Himalayan Mountains. Landing in the Paro Valley, surrounded by 4000 meter high mountains stretching across the west of Bhutan, enables you to have a visible landing which is indispensable and makes your day an unforgettable one. Our Bhutanese representative will welcome you on arrival and drive to Thimphu (2350m) it takes 1.5hours through Paachuriver and Wangchu is arid and has mainly scrub as vegetation. The countryside from Chuzom to Thimphu is less forested than what you have been seeing so far and the valley are narrow except for two sections where it widens into gentle slopes, terraced rice field and lovely strand of conifer trees. Evening TashichhoDzong&ndash; Means Fortress of Glorious Religion. ZhabdrungNgawangNamgyel built it in 1641. It houses the secretariat building, the throne room and the office of the king, and the central monk body. Overnight at Thimphu.</p>\r\n\r\n<p style=\"text-align:left\"><strong>Day2 Thimphu - Paro Sightseeing- Stay at Paro</strong><br />\r\nAfter breakfast, visit to Memorial Chorten: This particular chorten was constructed in 1974 as a memorial for the third King of the country, King JigmeDorjiWangchuck, who is widely regarded as the father of modern Bhutan. Mini Zoo &ndash; Here you can just see one animal that is Bhutan&rsquo;s national animal &ndash; The Takin, Buddha Point, The view point is also the perfect place to take in some truly breathtaking views of the entire city of Thimphu and after lunch drive to Paro and visit ParoRinpungDzong, which was built by the founding father of Bhutan, ShabdrungNgawangNamgyel in 1646. Today, this fortress houses the Administrative seat of the district of Paro and the district Monk Body with about 200 monks. The central tower (Utse) of the fortress is one of the most beautiful in Bhutan with its superb woodwork. Overnight stay at PARO</p>\r\n\r\n<p style=\"text-align:left\"><strong>Day3 Paro Sightseeing- Stay at Paro</strong></p>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>After breakfast drives to&nbsp;<strong>Dochu-la pass (3,088m).&nbsp;</strong>The clear day offers the most spectacular view over the highest peaks of the Himalayas,</li>\r\n	<li><strong>Drukwangyalchorten</strong>(Temple) at Dochu la,</li>\r\n	<li>En-route stops at Lobesa and takes a short hike to&nbsp;<strong>Chimi Lhakhang</strong>. It&rsquo;s widely believed that childless couples are usually blessed with a child very soon, if they pray at this temple.</li>\r\n	<li><strong>Punakha Dzong</strong>, built in 1637, consider as second oldest dzong in the country. It is built in between two rivers, Female River and Male River. Evening freely scroll around town. Night stay paro</li>\r\n</ul>\r\n\r\n<p style=\"text-align:left\">Or</p>\r\n\r\n<p style=\"text-align:left\">Hike to the famous Taktsang Monastery (Tiger`s nest): This is Bhutan`s most recognizable cultural icon perched 800m/2640ft up a seemingly sheer cliff. Although it was tragically and mysteriously consumed by fire in April 1998 it has now been restored to its former glory and RimpungDzong. Overnight stay at Paro Hotel. This is Bhutan`s most recognizable cultural icon perched 800m/2640ft up a seemingly sheer cliff. Although it was tragically and mysteriously consumed by fire in April 1998 it has now been restored to its former glory and RimpungDzong. RimpungDzong means fortress in the heap of jewels. Zhabdrung, who till today is deeply revered by the Bhutanese people as a dynamical political and spiritual leader, built it in 1644. Especially from the other side of the river very nice pictures can be taken of the majestic ParoDzong with Ta Dzong at the background. Evening walk around Paro. Overnight stay at Paro Hotel.</p>\r\n\r\n<p style=\"text-align:left\">&nbsp;</p>\r\n\r\n<p style=\"text-align:left\"><strong>Day4 Paro-Departure Transfer to Dhaka</strong><br />\r\nOur driver will pick you up in plenty of time to drop you at the airport for your flight.We recommend you depart for the airport four hours before an international flight and three hoursprior to a domestic one.</p>\r\n', 15990, 'upload/fb6fbb4e06.jpg', 1, 0),
(5, 1, 1, 5, 2, 'eid vacation', '<p>it will give the best our team</p>\r\n', '5 Days 4 Night', '<p>inhjbnjnb</p>\r\n', 6000, 'upload/7ed36c9ff4.jpg', 2, 1),
(6, 6, 2, 5, 2, 'Safari Park Tour', '<p>Mattis interdum nunc massa. Velit. Nonummy penatibus luctus. Aliquam. Massa aptent senectus elementum taciti.Id sodales morbi felis eu mus auctor ullamcorper. Litora. In nostra tempus, habitant. Nam tristique.</p>\r\n\r\n<p>Felis venenatis metus placerat taciti malesuada ultricies bibendum nunc hymenaeos orci erat mollis pretium ligula ligulamus pellentesque urna. Sagittis bibendum justo congue facilisi. Aliquam potenti sagittis etiam facilisis vehicula. Id.</p>\r\n', '1 days', '<p>Mattis interdum nunc massa. Velit. Nonummy penatibus luctus. Aliquam. Massa aptent senectus elementum taciti.Id sodales morbi felis eu mus auctor ullamcorper. Litora. In nostra tempus, habitant. Nam tristique.</p>\r\n\r\n<p>Felis venenatis metus placerat taciti malesuada ultricies bibendum nunc hymenaeos orci erat mollis pretium ligula ligulamus pellentesque urna. Sagittis bibendum justo congue facilisi. Aliquam potenti sagittis etiam facilisis vehicula. Id.</p>\r\n', 1500, 'upload/6477c43df3.jpg', 1, 2),
(7, 2, 2, 6, 3, 'hello', '<p>hello</p>\r\n', '2', '<p>hello</p>\r\n', 100, 'upload/b50e22f9a0.jpg', 3, 0),
(9, 1, 1, 5, 2, 'jol kabbor golpo', '<p>hi</p>\r\n', '1 days', '<p>hello</p>\r\n', 800, 'upload/8b30b37c51.jpg', 1, 1),
(10, 1, 2, 5, 2, 'Special package', '<p>hello</p>\r\n', '1 days', '<p>world</p>\r\n', 800, 'upload/6fd54ac344.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transport`
--

CREATE TABLE `tbl_transport` (
  `id` int(11) NOT NULL,
  `transport_type` varchar(255) NOT NULL,
  `transport_name` varchar(255) NOT NULL,
  `transport_class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transport`
--

INSERT INTO `tbl_transport` (`id`, `transport_type`, `transport_name`, `transport_class`) VALUES
(2, 'Bus', 'Hanif', 'Economy Class'),
(3, 'Air', 'Bangladesh Airlines', 'Business Class');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `companyName` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `zip` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `email`, `phone`, `password`, `companyName`, `address`, `zip`, `city`) VALUES
(1, 'arif hossain', 'arif', 'arif@gmail.com', '01671961393', 'd41d8cd98f00b204e9800998ecf8427e', 'Travel Group', 'uttara', '1230', 'Dhaka'),
(2, 'Arif Hossain Sarker', 'arif', 'arif.hossainsust@gmail.com', '01671961393', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', ''),
(3, 'musa bintay', 'musa', 'musa@gmail.com', '01671961393', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', ''),
(4, 'Musa Hossain', 'musa', 'musa@gmail.com', '01671961393', '202cb962ac59075b964b07152d234b70', 'BD Travel', 'Uttara, Dhaka', '1230', 'Dhaka'),
(5, 'Taslima Akter Eti', 'eti', 'taslimaeti@gmail.com', '016719876432', '202cb962ac59075b964b07152d234b70', '', '', '', ''),
(8, 'Taslima Akter Eti', 'eti', 'taslima233@gmail.com', '01836961741', '202cb962ac59075b964b07152d234b70', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_custom_package`
--
ALTER TABLE `tbl_custom_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_destination`
--
ALTER TABLE `tbl_destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transport`
--
ALTER TABLE `tbl_transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_custom_package`
--
ALTER TABLE `tbl_custom_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_destination`
--
ALTER TABLE `tbl_destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_transport`
--
ALTER TABLE `tbl_transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
