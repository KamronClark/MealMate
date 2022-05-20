-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2022 at 08:06 PM
-- Server version: 8.0.26
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kclark`
--

-- --------------------------------------------------------

--
-- Table structure for table `mm_post`
--

CREATE TABLE `mm_post` (
  `id` int NOT NULL,
  `title` varchar(180) NOT NULL,
  `ingredients` text NOT NULL,
  `prep_time` int NOT NULL,
  `cook_time` int NOT NULL,
  `servings` int NOT NULL,
  `tools` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `recipe_steps` text NOT NULL,
  `categories` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `calories` int NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author_id` int NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mm_post`
--

INSERT INTO `mm_post` (`id`, `title`, `ingredients`, `prep_time`, `cook_time`, `servings`, `tools`, `recipe_steps`, `categories`, `calories`, `image`, `date_posted`, `author_id`, `is_approved`, `is_deleted`) VALUES
(1, 'Chipotle Veggie Burritos', '<ul><li>1 bunch cilantro, chopped</li><li>1 clove garlic</li><li>1/2 teaspoon chipotle chile powder, plus more to taste</li><li>Kosher salt</li><li>1 cup white rice</li><li>1 15-ounce can black bean soup (preferably spicy)</li><li>1 10-ounce package frozen chopped spinach, thawed and squeezed dry</li><li>2 cups frozen corn (preferably fire-roasted), thawed</li><li>1 large tomato, diced</li><li>Juice of 1 lime</li><li>4 burrito-size flour tortillas</li><li>2 cups shredded pepper jack cheese (about 8 ounces)</li></ul>', 10, 20, 4, '<ul><li>Blender</li><li>Saucepan</li><li>Skillet</li><li>Microwave</li></ul>', '<h1>Step 1 -</h1><p><br></p><p>Puree all but 3 tablespoons cilantro with 2 cups water, the garlic, Chile powder and 3/4 teaspoon salt in a blender until smooth. Transfer to a medium saucepan along with the rice and bring to a boil. Reduce the heat to low; cover and cook until the liquid is absorbed, about 18 minutes. Uncover, stir and let cool 5 minutes.</p><p><br></p><h1>Step 2 -</h1><p><br></p><p>Meanwhile, bring the black bean soup to a simmer in a small saucepan over medium-high heat and cook until the liquid is slightly reduced, about 3 minutes. Stir in the spinach and return to a simmer. Remove from the heat and cover to keep warm.</p><p><br></p><h1>Step 3 -</h1><p><br></p><p>Toss the corn, tomato, lime juice, the reserved 3 tablespoons cilantro, 1/2 teaspoon salt, and Chile powder to taste in a large bowl.</p><p><br></p><h1>Step 4 -</h1><p><br></p><p>Warm the tortillas in a dry skillet or in the microwave. Divide the rice, bean mixture and cheese among the tortillas; top with some of the corn salsa. Fold up the bottoms of the tortillas, then fold in the sides and roll up. Serve with the remaining corn salsa.</p><p><br></p>', 'Lunch, Basic, Easy Cleanup, Vegetarian', 950, 'ChipotleVeggieBurritos.jpeg', '2022-05-18 08:32:07', 1, 1, 0),
(2, 'test', '<p>testtesttesttesttest</p>', 50, 50, 6, '<p>testtesttesttesttest</p>', '<p>testtesttesttest</p>', 'Vegetarian', 500, '', '2022-05-18 13:02:13', 1, 0, 1),
(3, 'test2', '<p>aaaaaaaaaaaaaaaaaa</p>', 60, 70, 17, '<p>dszfszdfzsfszdfsdz</p>', '<h1>Step 1 -</h1><p><br></p><p>Puree all but 3 tablespoons cilantro with 2 cups water, the garlic, Chile powder and 3/4 teaspoon salt in a blender until smooth. Transfer to a medium saucepan along with the rice and bring to a boil. Reduce the heat to low; cover and cook until the liquid is absorbed, about 18 minutes. Uncover, stir and let cool 5 minutes.</p><p><br></p><h1>Step 2 -</h1><p><br></p><p>Meanwhile, bring the black bean soup to a simmer in a small saucepan over medium-high heat and cook until the liquid is slightly reduced, about 3 minutes. Stir in the spinach and return to a simmer. Remove from the heat and cover to keep warm.</p><p><br></p><h1>Step 3 -</h1><p><br></p><p>Toss the corn, tomato, lime juice, the reserved 3 tablespoons cilantro, 1/2 teaspoon salt, and Chile powder to taste in a large bowl.</p><p><br></p><h1>Step 4 -</h1><p><br></p><p>Warm the tortillas in a dry skillet or in the microwave. Divide the rice, bean mixture and cheese among the tortillas; top with some of the corn salsa. Fold up the bottoms of the tortillas, then fold in the sides and roll up. Serve with the remaining corn salsa.</p><p><br></p>', 'Dessert', 3000, '', '2022-05-18 14:54:38', 1, 0, 1),
(4, 'The Best Chocolate Mousse', '<ul><li>1 3/4 cups cold heavy cream</li><li>1 large egg</li><li>2 large egg yolks</li><li>1/4 cup granulated sugar</li><li>1 teaspoon instant espresso powder</li><li>1 teaspoon vanilla extract</li><li>1/2 teaspoon kosher salt</li><li>4 ounces good-quality bittersweet chocolate, chopped</li><li>4 ounces good-quality semisweet chocolate, chopped</li></ul><p><br></p>', 30, 45, 4, '<ul><li>Heatproof bowl</li><li>Whisk</li><li>Saucepan</li><li>Rubber Spatula</li></ul>', '<h1>Step 1 - </h1><p><br></p><p>Whip 1 cup of the heavy cream to soft peaks in a medium bowl (see Cook\'s Note). Set aside.</p><p><br></p><h1>Step 2 - </h1><p><br></p><p>Add the egg, egg yolks, sugar, espresso powder, vanilla extract, salt and 1 tablespoon water to a medium heatproof bowl and whisk to combine. Set the bowl over a medium saucepan of gently simmering water (do not allow the bowl to touch the water). Whisk constantly until the mixture is pale, hot to the touch and has almost doubled in volume, about 4 to 6 minutes, scraping down the sides of the bowl occasionally with a rubber spatula, if necessary. Remove from the heat and continue whisking until cooled, about 2 minutes.</p><p><br></p><h1>Step 3 - </h1><p><br></p><p>Put the chopped chocolate in a medium heatproof bowl and set over the saucepan of gently simmering water (do not allow the bowl to touch the water). Stir occasionally with a rubber spatula until the chocolate is melted and smooth. Remove from the heat and gently stir for about 3 minutes to cool slightly.</p><p><br></p><h1>Step 4 - </h1><p><br></p><p>Whisk the egg mixture into the melted chocolate in 3 additions until combined. (The mixture may get very thick.) Using a rubber spatula, gently fold the whipped cream into the chocolate mixture in 3 additions until it is fully incorporated. It is important that the chocolate mixture is not warm to ensure that it combines smoothly with the whipped cream without seizing up.</p><p><br></p><h1>Step 5 - </h1><p><br></p><p>Divide the chocolate mousse among four 4-ounce ramekins and chill until firm, about 1 hour.</p><p><br></p><h1>Step 6 - </h1><p><br></p><p>Whip the remaining 3/4 cup cold heavy cream to stiff peaks. Top each chocolate mousse with whipped cream and serve. (For a softer texture, allow the ramekins to sit at room temperature while you whip the cream.)</p><p><br></p>', 'Dessert, Intermediate', 600, 'TheBestChocolateMousse.jpeg', '2022-05-18 16:10:41', 1, 1, 0),
(5, 'aDadad', '<p>asdadaefASEFsEF</p>', 44, 44, 44, '<p>fsefsefsEFsefsef</p>', '<p>44444444444444444444</p>', 'Breakfast, Lunch, Dinner, Dessert, Basic, Intermediate, Easy Cleanup, Diet', 444, '', '2022-05-18 17:40:25', 1, 0, 1),
(6, 'ccccccccccccccc', '<p>cccccccccccccccccccccc</p>', 66, 77, 22, '<p>ccccccccccccccccccccc</p>', '<p>7777777777777</p>', 'Breakfast, Lunch, Dinner', 777, '', '2022-05-18 17:51:27', 1, 0, 1),
(7, 'bbbbbbbbbbbbbbb', '<p>bbbbbbbbbbbbbbbbbbb</p>', 99, 99, 9, '<p>bbbbbbbbbbbbbbbbbb</p>', '<p>bbbbbbbbbbbbbbbbbbbb</p>', 'Dinner, Dessert, Intermediate, Easy Cleanup', 999, '', '2022-05-18 17:54:48', 1, 0, 1),
(8, 'Ratatouille', '<p><strong>VEGGIES</strong></p><ul><li>2&nbsp;eggplants</li><li>6&nbsp;roma tomatoes</li><li>2&nbsp;yellow squashes</li><li>2&nbsp;zucchinis</li></ul><p><strong>SAUCE</strong></p><ul><li>2 tablespoons&nbsp;olive oil</li><li>1&nbsp;onion, diced</li><li>4 cloves&nbsp;garlic, minced</li><li>1&nbsp;red bell pepper, diced</li><li>1&nbsp;yellow bell pepper, diced</li><li>salt, to taste</li><li>pepper, to taste</li><li>28 oz&nbsp;can of crushed tomatoes</li><li>2 tablespoons&nbsp;chopped fresh basil, from 8-10 leaves</li></ul><p><strong>HERB SEASONING</strong></p><ul><li>2 tablespoons&nbsp;chopped fresh basil, from 8-10 leaves</li><li>1 teaspoon&nbsp;garlic, minced</li><li>2 tablespoons&nbsp;Chopped fresh parsley</li><li>2 teaspoons&nbsp;fresh thyme</li><li>salt, to taste</li><li>pepper, to taste</li><li>4 tablespoons&nbsp;olive oil</li></ul><p><br></p>', 20, 70, 8, '<ul><li>Pan</li><li>Spatula</li><li>Microwave</li></ul>', '<h1>Step 1 - </h1><p><br></p><h3>Preheat the oven for 375˚F (190˚C).</h3><p><br></p><h1>Step 2 - </h1><p><br></p><h3>Slice the eggplant, tomatoes, squash, and zucchini into approximately ¹⁄₁₆-inch (1-mm) rounds, then set aside.</h3><p><br></p><h1>Step 3 - </h1><h3><br></h3><h3>Make the sauce: Heat the olive oil in a 12-inch (30-cm) oven-safe pan over medium-high heat. Sauté the onion, garlic, and bell peppers until soft, about 10 minutes. Season with salt and pepper, then add the crushed tomatoes. Stir until the ingredients are fully incorporated. Remove from heat, then add the basil. Stir once more, then smooth the surface of the sauce with a spatula.</h3><p><br></p><h1>Step 4 - </h1><p><br></p><h3>Arrange the sliced veggies in alternating patterns, (for example, eggplant, tomato, squash, zucchini) on top of the sauce from the outer edge to the middle of the pan. Season with salt and pepper.</h3><p><br></p><h1>Step 5 - </h1><p><br></p><h3>Make the herb seasoning: In a small bowl, mix together the basil, garlic, parsley, thyme, salt, pepper, and olive oil. Spoon the herb seasoning over the vegetables.</h3><p><br></p><h1>Step 6 - </h1><h3><br></h3><h3>Cover the pan with foil and bake for 40 minutes. Uncover, then bake for another 20 minutes, until the vegetables are softened.</h3><p><br></p><h1>Step 7 - </h1><p><br></p><h3>Serve while hot as a main dish or side. The ratatouille is also excellent the next day--cover with foil and reheat in a 350˚F (180˚C) oven for 15 minutes, or simply microwave to desired temperature.</h3><p><br></p><h1>Step 8 - </h1><p><br></p><h3>Enjoy!</h3><p><br></p>', 'Dinner, Intermediate, Diet', 230, 'ratatouille.jpg', '2022-05-19 01:45:32', 8, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_post`
--
ALTER TABLE `mm_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mmpost_mmuser` (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mm_post`
--
ALTER TABLE `mm_post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mm_post`
--
ALTER TABLE `mm_post`
  ADD CONSTRAINT `FK_mmpost_mmuser` FOREIGN KEY (`author_id`) REFERENCES `mm_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
