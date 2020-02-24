-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2020 at 06:46 AM
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
-- Database: `boffbakery`
--
CREATE DATABASE IF NOT EXISTS `boffbakery` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `boffbakery`;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `recipe_name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `author_id`, `recipe_name`, `description`, `ingredients`, `instructions`, `create_date`, `last_updated`, `image_id`) VALUES
(1, 1, 'Oma\'s Triangle Cookies', 'Chocolate covered almond cake cookie.', '12 ounces almond paste\r\n1 ½ cups (3 sticks) butter, softened\r\n1 cup granulated sugar\r\n4 eggs, separated\r\n1 teaspoon almond extract\r\n2 cups sifted all-purpose flour\r\n½ teaspoon salt\r\n10 drops green food coloring\r\n8 drops  red food coloring\r\n1 jar (12 ounces) apricot preserves\r\nE-Z Melt chocolate (as needed)', '1) Grease three 13x9x2 inch pans; line with aluminum foil; grease foil.\r\n2) Break up almond paste in large bowl with a fork.\r\n3) Add butter, sugar, egg yolks and almond extract.\r\n4) Beat with electric mixer until light and fluffy 5 minutes. \r\n5) Mix in Almond paste + sugar\r\n6) Add softened butter\r\n7) Add eggs and almond extract with fork.\r\n8) Beat in flour and salt. \r\n9) Beat egg whites until complete.\r\n10) Remove 1 ½ cups batter: spread evenly into a prepared pan.\r\n11) Remove another 1 ½ cups batter and add the green food coloring; spread evenly into second prepared pan.\r\n12) Add red food coloring to remaining 1 ½ cups batter and spread into the last prepared pan. \r\n13)Bake in a moderate oven (350 degrees) 15 minutes, or just until edges are golden brown. (Note: Cakes will be ¼ inch thick.)\r\n14) Butter a pan, then line it with tin foil, then butter the tin foil for 3 pans\r\n15) Bake 2 pans in middle of oven, then bake the 3rd\r\n16) Remove cakes from pans immediately onto large wire racks. Cool thoroughly. \r\n17) Heat apricot preserves; strain.\r\n18) Spread ½ of the warm preserves over green layer to edges; slide yellow layer on top; spread with remaining apricot preserves; slide pink layer, right side up onto yellow layer.\r\n19) Cover with plastic wrap; weigh down with a large wooden cutting board or heavy plate. Place in refrigerator overnight. \r\n20) Melt chocolate over hot water in a small cup. Spread to edges of cake; let dry 30 minutes. Trim edges off cake.\r\n21) Cut into 1-inch rectangle pieces. Separate each bar.\r\n22) Take bar to edge of counter, cut on the diagonal corner to corner, then flip so the triangles are sitting back to back, repeat with remaining bars. \r\n23) Meanwhile melt chocolate on a double boiler.\r\n24) Get 1 large piece of aluminum foil, paint melted chocolate onto top of foil roughly same size as bottom of bar.\r\n25) Take triangle apart, paint inside edge of one side with chocolate (the seam that holds the two sides together), then put the triangle back together.\r\n26) Place triangle bar on top of the chocolate painted foil, then paint melted chocolate onto remaining sides and edges of bars. \r\n27) Repeat with several more bars on the same sheet of foil. Allow chocolate to set.\r\n\r\n\r\nEach bar can be cut into ~8-9 slices. 8 bars total = 64-72 cookies per batch. \r\n\r\n134g pre chocolate - 166g with chocolate = 32g chocolate on one bar ', '2020-02-17 04:47:05', '2020-02-24 05:41:20', 2),
(2, 1, 'Oma\'s Potato Salad', 'A wonderful, traditional German potato salad', '7 small-medium red potatoes\r\n½ white/yellow onion\r\n1 heaping tsp Maggi brand Klare Huhner-Bullion (chicken bullion?)\r\n¼ cup water heated to boiling\r\nRed wine vinegar', '1) Boil potatoes until fork tender.\r\n2) Carefully remove skins with a knife + finger, holding the potato with a fork.\r\n3) Add bullion and heat water.\r\n4) Add salt and pepper, who knows how much.\r\n5) When water is boiling, add 3 tbs of vegetable oil and 2 tbs of red wine vinegar.\r\n6) Dump rest of water into it.\r\n7) Add another mountain of salt and pepper to taste.', '2020-02-17 04:48:38', '2020-02-24 05:41:20', 3),
(3, 1, 'Coconut Acorns', 'A coconut macaroon treat for the holidays!', '¾ cup granulated sugar\r\n3 tablespoons light corn syrup\r\n¾ cupful egg whites\r\nAbout 2 cupfuls of macaroon coconut\r\n¼ cup sifted all-purpose flour', '1) Combine above ingredients in a 2-quart saucepan and beat until moist.\r\n2) Cook over over a moderate flame until quite hot, at about 150F.\r\n3) Remove from stove, add ¾ teaspoon vanilla and ¼ teaspoon salt.\r\n4) Let mixture stand in refrigerator until cold.\r\n5) Pick up about 1 tablespoon at a time and shape to simulate acorns.\r\n6) If mixture is sticky, dip hands in cool water, shake off surplus water and form acorns.\r\n7) Bake on brown or white paper (on a baking sheet) at 400F for about 15 minutes or until very lightly colored, but not too dark.', '2020-02-17 04:50:49', '2020-02-24 05:41:20', 4),
(4, 2, 'Christmas Butter Circle Cookies', 'A Christmas tradition. The flavors of butter and jam to perfection.', '½ pound soft butter (1 cup)\r\nYolks of 2 medium-sized eggs\r\n1 teaspoon vanilla\r\nAbout 2 ¼ cups sifted all-purpose flour \r\n⅔ cup granulated sugar', 'Cream butter thoroughly. Gradually add sifted sugar and egg yolks, one at a time. Ad flavoring and last, sifted flour, a little at a time, using only enough to form a dough that will go through a damp canvas bag and No. 3 star tin tube. Beat well. Put into canvas bag and squeeze at once into desired shapes. Decorate with glazed red cherries, citron, nuts, and so forth, or with green and red maraschino cherries. This dough may also be put through a cooky press. Bake at 350F for about 20 minutes, or until golden brown. Put on upper rack toward end of baking. Loosen from pans while hot. Be sure to test dough after adding 2 ¼ cups of sifted flour. If too soft, add a little more flour. If cooky mixtures are too stiff to go through a bag and a tube at any time, add a little milk or cream. A teaspoonful at a time, until it is of proper consistency. Do not have bag more than half filled and do not allow dough to stand more than necessary after it is mixed. Have bag damp. Makes about 50 to 60 cookies.', '2020-02-17 04:52:58', '2020-02-24 05:43:31', 5),
(5, 2, 'Cranberry Sauce', 'A simple cranberry sauce. Credit to Elise Bauer at simplyrecipes.com.', '1 cup (200 g) sugar\r\n1 cup (250 mL) water\r\n4 cups (12 oz package) fresh or frozen cranberries\r\nOptional Pecans, orange zest, raisins, currants, blueberries, cinnamon, nutmeg, allspice.', '1) Rinse cranberries: Place the cranberries in a colander and rinse them. Pick out and discard any damaged or bruised cranberries.\r\n\r\n2) Boil water with sugar: Put the water and sugar in a medium saucepan on high heat and bring to a boil. Stir to dissolve the sugar.\r\n\r\n3) Add cranberries, cook until they burst: Add the cranberries to the pot and return to a boil. Lower the heat and simmer for 10 minutes or until most of the cranberries have burst.\r\n\r\n4) Stir in mix-ins if using: Once the cranberries have burst you can leave the cranberry sauce as is, or dress it up with other ingredients. We like to mix in a half a cup of chopped pecans a pinch or two of orange zest.\r\n\r\nSome people like adding raisins or currants, or even blueberries for added sweetness. You can also add holiday spices such as cinnamon, nutmeg, or allspice. If adding spices, start with a pinch of each and add more to your taste.\r\n\r\n5) Let cool: Remove the pot from heat. Let cool completely at room temperature, then transfer to a bowl to chill in the refrigerator. Note that the cranberry sauce will continue to thicken as it cools.', '2020-02-17 04:55:18', '2020-02-24 05:43:26', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `hashed_pass` varchar(60) NOT NULL,
  `email` varchar(320) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hashed_pass`, `email`, `create_date`, `last_updated`) VALUES
(1, 'Guest', '$2y$10$mChC/ySln4qVZl0cSCXvqub2UsOP6C/MqYmehOKWv5UgrGDfWE5Zu', 'guest@example.com', '2020-02-17 02:22:38', '2020-02-24 05:40:41'),
(2, 'Michael', '$2y$10$MbnUzGf/.lo8vfFGR8OkYO911tggftgb08IOPY2EZ6VePCGEHrq1i', 'mwaboff@gmail.com', '2020-02-24 05:43:02', '2020-02-24 05:43:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
