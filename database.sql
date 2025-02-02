-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 fév. 2025 à 11:42
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `food-order`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `full_name`, `username`, `password`) VALUES
(5, 'TAIBI ZAHR EDDINE', 'AA', '0cc175b9c0f1b6a831c399e269772661'),
(25, 'zeze', 'aaa', '21232f297a57a5a743894a0e4a801fc3'),
(27, 'admin', 'admin', '47bce5c74f589f4867dbd57e9ca9f808'),
(28, 'Calibri Light', 'sese', '0b4e7a0e5fe84ad35fb5f95b9ceeac79'),
(38, 'ii', 'oo', 'e47ca7a09cf6781e29634502345930a7'),
(39, 'aa', 'aa', '4124bc0a9335c27f086f24ba207a4912');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_cashier`
--

CREATE TABLE `tbl_cashier` (
  `id_cashier` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tbl_cashier`
--

INSERT INTO `tbl_cashier` (`id_cashier`, `full_name`, `username`, `password`) VALUES
(4, 'cashier', 'cashier', '6ac2470ed8ccf204fd5ff89b32a355cf'),
(5, 'cash', 'cash', '93585797569d208d914078d513c8c55a'),
(8, 'ff', 'uu', '6277e2a7446059985dc9bcf0a4ac1a8f');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_chef`
--

CREATE TABLE `tbl_chef` (
  `id_chef` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tbl_chef`
--

INSERT INTO `tbl_chef` (`id_chef`, `username`, `password`, `full_name`) VALUES
(1, 'chef', 'cbb4581ba3ada1ddef9b431eef2660ce', 'chef'),
(2, 'chito', '2bbaed970301fa08618e1e88c9807edd', 'chito'),
(3, 'ch', 'd88fc6edf21ea464d35ff76288b84103', 'ch'),
(4, 'ff', '633de4b0c14ca52ea2432a3c8a5c4c31', 'ff'),
(5, 'ddss', '3691308f2a4c2f6983f2880d32e29c84', 'dd'),
(6, 'q', '7694f4a66316e53c8cdd9d9954bd611d', 'z');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id_food` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tbl_food`
--

INSERT INTO `tbl_food` (`id_food`, `title`, `description`, `price`, `image_name`, `featured`, `active`) VALUES
(17, 'Burger', 'Normal burger with meat and cheese.', '121', 'Food-Name-4177.jpg', 'Yes', 'Yes'),
(18, 'bigo', 'A sandwich from the frigo.', '200', 'Food-Name-5439.jpg', 'Yes', 'Yes'),
(19, 'Double meat Burger', 'A burger with double meat.', '300', 'Food-Name-8534.jpg', 'Yes', 'Yes'),
(20, 'Double Double', 'Double chees, Double burger', '222', 'Food-Name-3219.jpg', 'Yes', 'Yes'),
(21, 'pizza', 'Good food with pizza hood', '400', 'Food-Name-6478.jpeg', 'Yes', 'Yes'),
(22, 'Mistyrious bonderious', 'Nobody knows', '506', 'Food-Name-2148.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `number` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `total`, `number`, `created_at`, `status`) VALUES
(1, '422.00', '5', '2024-04-24 20:14:25', 'pending'),
(2, '1767.00', '1', '2024-04-28 16:14:26', 'pending'),
(3, '1518.00', '1', '2024-04-28 16:42:24', 'pending'),
(4, '5564.00', '1', '2024-04-28 16:48:47', 'pending'),
(5, '4224.00', '7', '2024-04-28 18:08:35', 'pending'),
(6, '2282.00', '8', '2024-04-28 18:10:32', 'pending'),
(7, '4315.00', '', '2024-04-28 18:31:41', 'pending'),
(8, '2000.00', '2', '2024-04-28 18:43:42', 'pending'),
(9, '2786.00', '6', '2024-04-29 11:33:52', 'pending'),
(10, '1408.00', '2', '2024-04-30 13:45:25', 'pending'),
(49, '8380.00', '2', '2024-05-16 20:11:14', 'ready'),
(50, '863.00', '2', '2024-05-18 13:12:07', 'ready'),
(51, '326.00', '3', '2024-05-18 13:13:07', 'ready'),
(52, '704.00', '3', '2024-05-26 18:36:15', 'ready'),
(53, '1567.00', '6', '2024-05-26 19:17:34', 'ready'),
(54, '1567.00', '2', '2024-05-26 21:31:48', 'ready'),
(55, '1052.00', '3', '2024-05-26 21:32:02', 'ready'),
(56, '704.00', '2', '2024-05-29 09:31:02', 'ready'),
(57, '348.00', '3', '2024-05-29 09:32:06', 'ready'),
(58, '1589.00', '7', '2024-05-29 09:43:33', 'ready'),
(59, '1915.00', '2', '2024-05-29 13:45:59', 'ready'),
(60, '3134.00', '3', '2024-05-29 13:47:06', 'ready'),
(61, '2112.00', '3', '2024-05-30 16:27:16', 'ready'),
(62, '6586.00', '2', '2024-05-30 16:27:47', 'ready'),
(63, '1728.00', '1', '2024-06-01 15:24:00', 'ready'),
(64, '1000.00', '2', '2024-06-02 16:24:09', 'ready'),
(65, '400.00', '3', '2024-06-02 16:29:50', 'ready'),
(66, '900.00', '7', '2024-06-02 18:17:22', 'ready'),
(67, '1400.00', '7', '2024-06-02 21:05:41', 'ready'),
(68, '300.00', '1', '2024-06-03 04:12:19', 'ready'),
(69, '400.00', '3', '2024-06-03 04:12:27', 'ready'),
(70, '200.00', '2', '2024-06-03 04:14:49', 'ready'),
(71, '422.00', '5', '2024-06-03 04:15:27', 'ready'),
(72, '100.00', '7', '2024-06-03 04:15:56', 'ready'),
(73, '300.00', '2', '2024-06-03 05:47:57', 'ready'),
(74, '1170.00', '2', '2024-06-03 08:34:12', 'ready'),
(75, '1022.00', '2', '2024-06-03 08:37:09', 'ready'),
(76, '422.00', '1', '2024-06-03 08:37:58', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id_order_items` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `food` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id_order_items`, `order_id`, `food`, `price`, `qty`) VALUES
(1, 1, 'pizza', '200.00', 2),
(2, 1, 'burger', '22.00', 1),
(3, 2, 'pizza', '200.00', 1),
(4, 2, 'Ut molestias nisi oc', '863.00', 1),
(5, 2, 'Quas dolorem sunt co', '704.00', 1),
(6, 3, 'pizza', '200.00', 4),
(7, 3, 'burger', '22.00', 3),
(8, 3, 'Consectetur eiusmod', '326.00', 2),
(9, 4, 'Quas dolorem sunt co', '704.00', 3),
(10, 4, 'Ut molestias nisi oc', '863.00', 4),
(80, 49, 'Quas dolorem sunt co', '704.00', 7),
(81, 49, 'Ut molestias nisi oc', '863.00', 4),
(82, 50, 'Ut molestias nisi oc', '863.00', 1),
(83, 51, 'Consectetur eiusmod', '326.00', 1),
(84, 52, 'Quas dolorem sunt co', '704.00', 1),
(85, 53, 'Quas dolorem sunt co', '704.00', 1),
(86, 53, 'Ut molestias nisi oc', '863.00', 1),
(87, 54, 'Quas dolorem sunt co', '704.00', 1),
(88, 54, 'Ut molestias nisi oc', '863.00', 1),
(89, 55, 'Quas dolorem sunt co', '704.00', 1),
(90, 55, 'Consectetur eiusmod', '326.00', 1),
(91, 55, 'burger', '22.00', 1),
(92, 56, 'Quas dolorem sunt co', '704.00', 1),
(93, 57, 'Consectetur eiusmod', '326.00', 1),
(94, 57, 'burger', '22.00', 1),
(95, 58, 'Quas dolorem sunt co', '704.00', 1),
(96, 58, 'Ut molestias nisi oc', '863.00', 1),
(97, 58, 'burger', '22.00', 1),
(98, 59, 'Quas dolorem sunt co', '704.00', 1),
(99, 59, 'Consectetur eiusmod', '326.00', 1),
(100, 59, 'burger', '22.00', 1),
(101, 59, 'Ut molestias nisi oc', '863.00', 1),
(102, 60, 'Quas dolorem sunt co', '704.00', 2),
(103, 60, 'Ut molestias nisi oc', '863.00', 2),
(104, 61, 'Quas dolorem sunt co', '704.00', 3),
(105, 62, 'Quas dolorem sunt co', '704.00', 2),
(106, 62, 'Ut molestias nisi oc', '863.00', 6),
(107, 63, 'Burger', '100.00', 1),
(108, 63, 'bigo', '200.00', 1),
(109, 63, 'Double Double', '222.00', 1),
(110, 63, 'Double meat Burger', '300.00', 1),
(111, 63, 'pizza', '400.00', 1),
(112, 63, 'Mistyrious bonderious', '506.00', 1),
(113, 64, 'Burger', '100.00', 1),
(114, 64, 'bigo', '200.00', 1),
(115, 64, 'Double meat Burger', '300.00', 1),
(116, 64, 'pizza', '400.00', 1),
(117, 65, 'Burger', '100.00', 1),
(118, 65, 'Double meat Burger', '300.00', 1),
(119, 66, 'Double meat Burger', '300.00', 1),
(120, 66, 'Burger', '100.00', 2),
(121, 66, 'pizza', '400.00', 1),
(122, 67, 'pizza', '400.00', 2),
(123, 67, 'Double meat Burger', '300.00', 1),
(124, 67, 'Burger', '100.00', 1),
(125, 67, 'bigo', '200.00', 1),
(126, 68, 'Burger', '100.00', 1),
(127, 68, 'bigo', '200.00', 1),
(128, 69, 'Burger', '100.00', 4),
(129, 70, 'bigo', '200.00', 1),
(130, 71, 'Burger', '100.00', 2),
(131, 71, 'Double Double', '222.00', 1),
(132, 72, 'Burger', '100.00', 1),
(133, 73, 'Burger', '100.00', 3),
(134, 74, 'Burger', '121.00', 6),
(135, 74, 'Double Double', '222.00', 2),
(136, 75, 'bigo', '200.00', 4),
(137, 75, 'Double Double', '222.00', 1),
(138, 76, 'bigo', '200.00', 1),
(139, 76, 'Double Double', '222.00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_serveur`
--

CREATE TABLE `tbl_serveur` (
  `id_serveur` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tbl_serveur`
--

INSERT INTO `tbl_serveur` (`id_serveur`, `full_name`, `username`, `password`) VALUES
(1, 'Calibri Light', 'a', 'ad57484016654da87125db86f4227ea3'),
(4, 'Franklin Gothic Medium', 'aaaa', 'e47ca7a09cf6781e29634502345930a7'),
(7, 'Orson Petersen', 'mokejicic', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(10, 'ff', 'gg', '633de4b0c14ca52ea2432a3c8a5c4c31'),
(11, 'waiter', 'waiter', 'f64cff138020a2060a9817272f563b3c');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_table`
--

CREATE TABLE `tbl_table` (
  `id_table` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `status` enum('occupied','available') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tbl_table`
--

INSERT INTO `tbl_table` (`id_table`, `number`, `status`) VALUES
(2, 1, 'occupied'),
(3, 2, 'available'),
(4, 3, 'available'),
(5, 4, 'available'),
(6, 5, 'available'),
(8, 6, 'available'),
(9, 7, 'available'),
(10, 8, 'available'),
(15, 0, 'available'),
(16, 0, 'available'),
(17, 0, 'available');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `tbl_cashier`
--
ALTER TABLE `tbl_cashier`
  ADD PRIMARY KEY (`id_cashier`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `tbl_chef`
--
ALTER TABLE `tbl_chef`
  ADD PRIMARY KEY (`id_chef`);

--
-- Index pour la table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id_food`);

--
-- Index pour la table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Index pour la table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id_order_items`),
  ADD KEY `order_id` (`order_id`);

--
-- Index pour la table `tbl_serveur`
--
ALTER TABLE `tbl_serveur`
  ADD PRIMARY KEY (`id_serveur`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `tbl_table`
--
ALTER TABLE `tbl_table`
  ADD PRIMARY KEY (`id_table`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `tbl_cashier`
--
ALTER TABLE `tbl_cashier`
  MODIFY `id_cashier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tbl_chef`
--
ALTER TABLE `tbl_chef`
  MODIFY `id_chef` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id_food` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id_order_items` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT pour la table `tbl_serveur`
--
ALTER TABLE `tbl_serveur`
  MODIFY `id_serveur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tbl_table`
--
ALTER TABLE `tbl_table`
  MODIFY `id_table` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD CONSTRAINT `tbl_order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id_order`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
