-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2022 at 02:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courses_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_title` varchar(32) NOT NULL,
  `category_image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_image`) VALUES
(1, 'Web Development', 'category_web_development.png'),
(2, 'Data Science', 'category_data_science.png'),
(3, 'Mobile Development', 'category_mobile_development.png'),
(4, 'Game Development', 'category_game_development.png'),
(5, 'Database Design', 'category_database_design.png'),
(6, 'Software Development Tools', 'category_software_development_tools.png');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(32) NOT NULL,
  `technologies` varchar(128) NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `length_hours` double(3,1) NOT NULL,
  `price` double(4,2) NOT NULL,
  `upload_date` date NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `image`, `technologies`, `rating`, `length_hours`, `price`, `upload_date`, `instructor_id`, `category_id`) VALUES
(1, 'The Web Developer Bootcamp 2022', 'COMPLETELY REDONE - The only course you need to learn web development - HTML, CSS, JS, Node, and More!', '1_course.jpg', 'HTML, CSS, JavaScript, Node.js, MongoDB', '4.7', 63.5, 9.99, '2021-12-12', 1, 1),
(2, 'The Complete 2022 Web Development Bootcamp', 'Become a Full-Stack Web Developer with just ONE course. HTML, CSS, Javascript, Node, React, MongoDB, build real projects', '2_course.jpg', 'HTML, CSS, Bootstrap, JavaScript, Node.js, MongoDB, React.js', '4.7', 54.5, 13.99, '2021-12-21', 2, 1),
(3, 'The Complete Web Developer Course 2.0', 'Learn Web Development by building 25 websites and mobile apps using HTML, CSS, Javascript, PHP, Python, MySQL & more!', '3_course.jpg', 'HTML, CSS, JavaScript, jQuery, Bootstrap, Python, Wordpress, PHP, MySQL', '4.7', 30.0, 12.99, '2021-12-08', 3, 1),
(4, 'The Complete Web Developer in 2022: Zero to Mastery', 'Learn to code and become a Web Developer in 2022 with HTML, CSS, Javascript, React, Node.js, Machine Learning & more!', '4_course.jpg', 'HTML, CSS, Bootstrap, JavaScript, React.js, Node.js, Express.js', '4.5', 36.5, 15.99, '2021-12-11', 4, 1),
(5, 'Machine Learning A-Z: Hands-On Python & R In Data Science', 'Learn to create Machine Learning Algorithms in Python and R from two Data Science experts. Code templates included.', '5_course.jpg', 'Python, R, Regression, Classification, Clustering, Deep Learning, Artificial Neural Networks', '4.7', 44.0, 20.99, '2021-11-08', 5, 2),
(6, 'Python for Data Science and Machine Learning Bootcamp', 'Learn how to use NumPy, Pandas, Seaborn , Matplotlib , Plotly , Scikit-Learn , Machine Learning, Tensorflow , and more!', '6_course.jpg', 'Python, Pandas, NumPy, Plotly, Machine Learning', '4.6', 25.0, 25.99, '2021-09-14', 6, 2),
(7, 'The Data Science Course 2021: Complete Data Science Bootcamp', 'Complete Data Science Training: Mathematics, Statistics, Python, Advanced Statistics in Python, Machine & Deep Learning', '7_course.jpg', 'Python, NumPy, Pandas, Machine Learning, Deep Learning', '4.7', 29.5, 30.99, '2021-08-24', 7, 2),
(8, 'Data Science A-Z: Real-Life Data Science Exercises Included', 'Learn Data Science step by step through real Analytics examples. Data Mining, Modeling, Tableau Visualization and more!', '8_course.jpg', 'R, Machine Learning, SQL', '4.6', 21.0, 22.99, '2021-10-14', 5, 2),
(9, 'iOS & Swift - The Complete iOS App Development Bootcamp', 'From Beginner to iOS App Developer with Just One Course! Fully Updated with a Comprehensive Module Dedicated to SwiftUI!', '9_course.jpg', 'Xcode, Swift, JSON, Networking, Git, Github, iOS', '4.8', 59.5, 19.99, '2021-11-08', 2, 3),
(10, 'The Complete React Native + Hooks Course', 'Understand React Native with Hooks, Context, and React Navigation.', '10_course.jpg', 'React Native, API', '4.6', 38.0, 17.99, '2021-12-20', 8, 3),
(11, 'The Complete 2021 Flutter Development Bootcamp with Dart', 'Officially created in collaboration with the Google Flutter team.', '11_course.jpg', 'Flutter, iOS, Dart, Firebase', '4.6', 28.5, 22.99, '2021-05-10', 2, 3),
(12, 'The Complete Android N Developer Course', 'Learn Android App Development with Android 7 Nougat by building real apps including Uber, Whatsapp and Instagram!', '12_course.jpg', 'Android, Java, Android Studio', '4.3', 32.0, 13.99, '2021-05-29', 3, 3),
(13, 'Complete C# Unity Game Developer 2D', 'Learn Unity in C# & Code Your First Five 2D Video Games for Web, Mac & PC. The Tutorials Cover Tilemap', '13_course.jpg', 'C#, Unity, .NET, ', '4.7', 18.0, 9.99, '2021-06-14', 9, 4),
(14, 'Unreal Engine C++ Developer: Learn C++ and Make Video Games', 'Created in collaboration with Epic Games. Learn C++ from basics while making your first 4 video games in Unreal', '14_course.jpg', 'C++, Unreal Engine', '4.6', 35.0, 27.99, '2021-01-12', 10, 4),
(15, 'Complete C# Unity Game Developer 3D', 'Design & Develop Video Games. Learn C# in Unity Engine. Code Your first 3D Unity games for web, Mac & PC.', '15_course.jpg', 'C#, Unity, .NET', '4.7', 30.5, 12.99, '2021-04-19', 9, 4),
(16, 'The Ultimate Guide to Game Development with Unity (Official)', 'Created in partnership with Unity Technologies: learn C# by developing 2D & 3D games with this comprehensive guide', '16_course.jpg', 'C#, Unity', '4.5', 21.0, 19.99, '2021-09-16', 11, 4),
(17, 'The Ultimate MySQL Bootcamp: Go from SQL Beginner to Expert', 'Become an In-demand SQL Master by creating complex databases and building reports through real-world projects', '17_course.jpg', 'SQL, Node.js, MySQL', '4.6', 20.0, 9.99, '2021-07-25', 1, 5),
(18, 'The Complete Oracle SQL Certification Course', 'Dont Just Learn the SQL Language, Become Job-Ready and Launch Your Career as a Certified Oracle SQL Developer!', '18_course.jpg', 'SQL, Oracle', '4.6', 16.5, 13.99, '2021-11-02', 12, 5),
(19, 'SQL for Beginners: Learn SQL using MySQL and Database Design', 'Understand SQL using the MySQL database. Learn Database Design and Data Analysis with Normalization and Relationships', '19_course.jpg', 'SQL, MySQL', '4.5', 8.0, 11.99, '2021-05-15', 8, 5),
(20, 'MongoDB - The Complete Developers Guide 2022', 'Master MongoDB Development for Web & Mobile Apps. CRUD Operations, Indexes, Aggregation Framework - All about MongoDB!', '20_course.jpg', 'MongoDB', '4.7', 17.5, 18.99, '2021-11-16', 6, 5),
(21, 'Docker Mastery: with Kubernetes +Swarm from a Docker Captain', 'Build, test, deploy containers with the best mega-course on Docker, Kubernetes, Compose, Swarm and Registry using DevOps', '21_course.jpg', 'Docker, Kubernetes', '4.6', 19.0, 32.99, '2021-03-27', 13, 6),
(22, 'Docker and Kubernetes: The Complete Guide', 'Build, test, and deploy Docker applications with Kubernetes while learning production-style development workflows', '22_course.jpg', 'Docker, Github, AWS, Kubernetes', '4.6', 21.5, 11.99, '2021-12-24', 8, 6),
(23, 'Learn JIRA with real-world examples (+Confluence bonus)', 'Learn to work on, manage & administer agile projects with this comprehensive course on JIRA Software & Confluence', '23_course.jpg', 'JIRA', '4.6', 11.5, 16.99, '2021-09-01', 14, 6),
(24, 'The Ultimate Git Course - with Applications in Unreal Engine', 'Learn Git and GitHub, Version Control for Unreal Engine C++ Projects, and More!', '24_course.jpg', 'Git, Github, C++, Unreal Engine', '4.6', 6.5, 10.99, '2021-11-11', 15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `about` text DEFAULT NULL,
  `profile_picture` varchar(32) NOT NULL,
  `courses` int(11) DEFAULT NULL,
  `students` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `first_name`, `last_name`, `about`, `profile_picture`, `courses`, `students`) VALUES
(1, 'Colt', 'Steele', 'Developer and Bootcamp Instructor', '1_colt_steele.jpg', 17, 1144137),
(2, 'Angela', 'Yu', 'Developer and Lead Instructor', '2_angela_yu.jpg', 9, 1157739),
(3, 'Rob', 'Percival', 'Web Developer And Teacher', '3_rob_percival.jpg', 37, 2114430),
(4, 'Andrei', 'Neagoie', 'Founder of zerotomastery .io / Senior Software Developer', '4_andrei_neagoie.jpg', 21, 621898),
(5, 'Kirill', 'Eremenko', 'Data Scientist', '5_kirill_eremenko.jpg', 52, 1989226),
(6, 'Jose', 'Portilla', 'Head of Data Science, Pierian Data Inc.', '6_jose_portilla.jpg', 44, 2626247),
(7, '365', 'Careers', 'Creating opportunities for Business & Finance students', '7_365_careers.jpg', 78, 1693636),
(8, 'Stephen', 'Grider', 'Engineering Architect', '8_stephen_grider.jpg', 30, 949888),
(9, 'Rick', 'Davidson', 'Career Coach with 14+ years in the Video Game Industry', '9_rick_davidson.jpg', 20, 862288),
(10, 'Ben', 'Tristem', 'GameDev .tv Founder :: Entrepreneur :: Passionate Teacher', '10_ben_tristem.jpg', 14, 883622),
(11, 'Jonathan', 'Weinberger', 'Authorized Unity Instructor', '11_jonathan_weinberg.jpg', 9, 113964),
(12, 'Imtiaz', 'Ahmad', 'Senior Software Engineer & Trainer', '12_imtiaz_ahmad.jpg', 11, 328252),
(13, 'Bret', 'Fisher', 'Docker Captain and DevOps Sysadmin', '13_bret_fisher.jpg', 4, 268063),
(14, 'Kosh', 'Sarkar', 'Product Manager', '14_kosh_sarkar.jpg', 3, 100839),
(15, 'Stephen', 'Ulibarri', 'Engineer, Programmer, Game Developer, Author', '15_stephen_ulibarri.jpg', 5, 305043);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `country` varchar(32) NOT NULL,
  `postal_code` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `payment_method` varchar(32) NOT NULL,
  `total_price` double(6,2) NOT NULL,
  `total_length` double(6,2) NOT NULL,
  `order_status` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `country`, `postal_code`, `address`, `payment_method`, `total_price`, `total_length`, `order_status`, `created_at`) VALUES
(1, 'Matej', 'Bendik', 'matejbendik.mb@gmail.com', 'Slovakia', '05363', 'Spissky Hrusov 34', 'Card payment', 35.98, 91.00, 'confirmed', '2022-01-07 17:46:13'),
(2, 'Elon', 'Musk', 'elonmusk@tesla.com', 'USA', '12345', 'Wall street', 'Paypal', 11.99, 63.50, 'confirmed', '2022-01-07 17:52:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
