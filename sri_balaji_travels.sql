-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 08, 2025 at 11:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sri_balaji_travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(1, 'About Our Travel Agency', 'We are a leading travel agency providing Tirupati tour packages from Chennai with top-notch facilities and comfortable journeys. Our mission is to make your pilgrimage smooth and memorable.', 'about.jpg', '2025-08-08 05:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `slug`, `created_at`) VALUES
(1, 'Top Things to Know Before Visiting Tirupati', 'Plan your darshan experience better with tips on timings, dress code, laddus, and more.', 'tirupati-temple.jpg', 'top-things-to-know-before-visiting-tirupati', '2025-08-08 08:52:41'),
(2, 'Padmavathi Temple - Hidden Gem in Tirupati', 'Discover the spiritual beauty of Alamelumanga Temple often missed by travelers.', 'padmavathi-temple.jpg', 'padmavathi-temple-hidden-gem-in-tirupati', '2025-08-08 08:52:41'),
(3, 'Travel in Comfort: Our AC Bus Journey', 'Know how we ensure comfort and safety in your Tirupati trip from Chennai.', 'ac-bus-journey.jpg', 'travel-in-comfort-our-ac-bus-journey', '2025-08-08 08:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `pickup_point` varchar(255) NOT NULL,
  `travel_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `passengers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `package_name`, `pickup_point`, `travel_date`, `created_at`, `passengers`) VALUES
(1, 'y', 'y@gmail.com', '1112345678', 'One Day & Special Darshan Tirupati Package', 'Chrompet', '2024-02-06', '2025-08-07 15:53:36', 2),
(2, 'y', 'y@gmail.com', '1112345678', 'One Day & Special Darshan Tirupati Package', 'Velachery', '2023-02-15', '2025-08-07 15:54:13', 2),
(3, 'y', 'y@gmail.com', '1112345678', 'One Day & Special Darshan Tirupati Package', 'Velachery', '2023-02-15', '2025-08-07 16:01:26', 2),
(4, 'y', 'y@gmail.com', '1112345678', 'One Day & Special Darshan Tirupati Package', 'Velachery', '2023-02-15', '2025-08-07 16:01:30', 2),
(5, 't', 't@gmail.com', '1112345679', 'One Day & Special Darshan Tirupati Package', 'Velachery', '2023-02-15', '2025-08-07 16:02:00', 2),
(6, 't', 't@gmail.com', '1112345679', 'One Day & Special Darshan Tirupati Package', 'Velachery', '2023-02-15', '2025-08-07 16:10:10', 2),
(7, 'y', 'y@gmail.com', '1112345678', 'One Day & Special Darshan Tirupati Package', 'Guindy', '2024-02-29', '2025-08-07 16:10:55', 3);

-- --------------------------------------------------------

--
-- Table structure for table `book_online`
--

CREATE TABLE `book_online` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `program_details` text DEFAULT NULL,
  `boarding_points` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `dress_code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_online`
--

INSERT INTO `book_online` (`id`, `title`, `description`, `program_details`, `boarding_points`, `notes`, `dress_code`) VALUES
(1, 'One Day & Special Darshan Tirupati Package', 'Experience a spiritual journey from Chennai to Tirupati with full assistance and comfort.', '04:30 A.M. - We depart from Chennai.\n08:30 A.M. - Proceed towards Tirumala (For ₹300 Seeghra Darshan Tickets).\n10:00 A.M. - Entry to the temple and have a Quick Darshan.\n12:30 P.M. - Return for Lunch at Tirupathi.\n01:30 P.M. - Darshan at Padmavathi Temple (Alamelumanga Temple).\n03:00 P.M. - Departure for Chennai.\n08:00 P.M. - Arrival back in Chennai.', 'Velachery, Chrompet, Guindy, T-Nagar, Koyembedu & Poonamallee KFC', 'Our driver will guide for Tonsure & other Facilities.\nA/C will not be operated while climbing up the Tirumala hills.\nFor Extra Laddu, contact our support person while booking confirmation itself.\nProgramme timings may change depending on the darshan time.\nPickup/Drop will be at nearby main locations within Chennai city limits.\nDarshan time may vary depending upon TTD crowd.\nPlease bring your ID proof copy without fail during darshan time.', 'Gents: Dhoti, Shirt/Kurtha, Pyjama\nLadies: Sarees or Chudidars with Dupatta');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `working_hours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `company_name`, `phone`, `email`, `address`, `working_hours`) VALUES
(1, 'Sri Balaji Travels', '+91 9876543210', 'sribalajitravels@example.com', 'No. 45, T-Nagar Main Road, Chennai, Tamil Nadu, India', 'Monday to Sunday – 7:00 AM to 10:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `icon`, `title`, `description`) VALUES
(1, 'fas fa-bus', 'Comfortable Transport', 'Travel in style and comfort with our luxury buses and cabs.'),
(2, 'fas fa-hotel', 'Premium Stays', 'Enjoy top-rated hotels with the best amenities for a relaxing trip.'),
(3, 'fas fa-utensils', 'Delicious Meals', 'Savor local and continental dishes during your journey.'),
(4, 'fas fa-map-marked-alt', 'Guided Tours', 'Explore with experienced tour guides for an unforgettable experience.'),
(5, 'fas fa-headset', '24/7 Support', 'We are here for you at any hour during your trip.');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'JYOTI', 'jy@gmail.com', 'hii', '2025-08-08 09:43:45'),
(2, 'JYOTI', 'jy@gmail.com', 'hii', '2025-08-08 09:44:58'),
(3, 'JYOTI', 'jy@gmail.com', 'hii', '2025-08-08 09:47:49'),
(4, 'JYOTI', 'jy@gmail.com', 'hii', '2025-08-08 09:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `name`, `email`, `created_at`) VALUES
(1, NULL, 'y@gmail.com', '2025-08-08 07:59:47'),
(2, 'JYOTI', 'jy@gmail.com', '2025-08-08 08:08:19'),
(3, 't', 't@gmail.com', '2025-08-08 08:12:38'),
(4, 'r', 'r@gmail.com', '2025-08-08 08:29:35'),
(5, 's', 'shi@gamil.com', '2025-08-08 08:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `description`, `price`, `image`, `created_at`) VALUES
(1, 'Tirupati Balaji Darshan', '1-Day trip including darshan and lunch.', 1999.00, 'tirupati1.jpg', '2025-08-07 10:05:11'),
(2, '2 Days Package', '2-day trip with hotel stay, sightseeing and darshan.', 3599.00, 'tirupati2.jpg', '2025-08-07 10:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `created_at`) VALUES
(1, 'About Us', 'about-us', 'We are Sri Balaji Travels, dedicated to Tirupati darshan packages.', '2025-08-07 10:03:40'),
(2, 'Contact Us', 'contact', 'You can contact us via the form below.', '2025-08-07 10:03:40'),
(11, 'Home', 'home', 'Experience the best of travel with Sri Balaji Travels.', '2025-08-07 10:28:42'),
(12, 'Tirupati Packages', 'tirupati-packages', 'Explore our curated Tirupati packages.', '2025-08-07 10:28:42'),
(13, 'Book Online', 'book-online', 'Easily book your travel online.', '2025-08-07 10:28:42'),
(14, 'Blog', 'blog', 'Read travel tips and customer stories.', '2025-08-07 10:28:42'),
(15, 'Newsletter', 'newsletter', 'Subscribe to our newsletter for the latest updates.', '2025-08-07 10:28:42'),
(16, 'Feedback', 'feedback', 'We value your feedback.', '2025-08-07 10:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` int(1) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `message`, `image`, `rating`) VALUES
(1, 'jyoti', 'amazing❤', '', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_online`
--
ALTER TABLE `book_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book_online`
--
ALTER TABLE `book_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
