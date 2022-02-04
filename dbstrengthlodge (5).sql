-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 01:13 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbstrengthlodge`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `id` int(11) NOT NULL,
  `brandname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrand`
--

INSERT INTO `tblbrand` (`id`, `brandname`) VALUES
(1, 'Optimal Nutrition'),
(2, 'Muscletech'),
(3, 'Gaspari'),
(4, 'MuscleBlaze'),
(5, 'BPI Sports'),
(6, 'My Protein');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `size` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `adddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `catname`) VALUES
(1, 'PROTEIN'),
(2, 'WORKOUT ESSENTIALS'),
(3, 'PRE/POST WORKOUT'),
(4, 'GAINER');

-- --------------------------------------------------------

--
-- Table structure for table `tblgoal`
--

CREATE TABLE `tblgoal` (
  `id` int(10) NOT NULL,
  `goalname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgoal`
--

INSERT INTO `tblgoal` (`id`, `goalname`) VALUES
(1, 'Build Muscle'),
(2, 'Lose Weight'),
(3, 'General Health'),
(4, 'Improve Workout');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `orderstatus` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `paymentmethod` varchar(250) NOT NULL,
  `orderdate` date NOT NULL,
  `price` varchar(255) NOT NULL,
  `ordernumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `uid`, `pid`, `orderstatus`, `size`, `qty`, `paymentmethod`, `orderdate`, `price`, `ordernumber`) VALUES
(1, 12, 1, 'Ordered', ' 10lb', 1, 'COD', '2021-12-06', '30', '1638833389-878'),
(2, 12, 2, 'Ordered', '4lb', 2, 'COD', '2021-12-06', '60', '1638833547-439'),
(3, 12, 1, 'Ordered', '4lb', 1, 'COD', '2021-12-06', '30', '1638836067-255'),
(5, 28, 2, 'Ordered', ' 10lb', 1, 'COD', '2021-12-09', '30', '1639069264-36'),
(6, 29, 1, 'Ordered', ' 6lb', 2, 'COD', '2021-12-09', '60', '1639071094-410');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(11) NOT NULL,
  `pcid` int(11) NOT NULL,
  `pscid` int(11) NOT NULL,
  `producttitle` varchar(150) NOT NULL,
  `productdescription` text NOT NULL,
  `productprice` float NOT NULL,
  `productofferprice` float NOT NULL,
  `producttotalunits` int(11) NOT NULL,
  `productprimaryimage` varchar(200) NOT NULL,
  `productimage1` varchar(200) NOT NULL,
  `productimage2` varchar(200) NOT NULL,
  `productimage3` varchar(200) NOT NULL,
  `psid` int(11) NOT NULL,
  `productquantities` varchar(100) NOT NULL,
  `brandid` int(11) NOT NULL,
  `goalid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `pcid`, `pscid`, `producttitle`, `productdescription`, `productprice`, `productofferprice`, `producttotalunits`, `productprimaryimage`, `productimage1`, `productimage2`, `productimage3`, `psid`, `productquantities`, `brandid`, `goalid`) VALUES
(1, 1, 60, 'Optimal Nutrition', '100 percent of protein from whey\r\nA complete protein derived from cows milk\r\nUltra filtered and easy-to-mix powder from worlds number 1 seller of protein\r\nContains 22 grams of whey protein with just 1 gram of sugar and 1 gram of fat\r\nON Whey is a great addition to your healthy, balanced diet', 55, 30, 22, '1531910261-723551njFvsFc1L.jpg', '1531822546-757371dUrGZeHWL._SL1422_.jpg', '1531822546-267351njFvsFc1L.jpg', '1531822546-604871FINeTqRXL._SL1500_.jpg', 11, '4,2,4,7,5', 1, 1),
(2, 1, 60, 'MuscleBlaze Whey Gold Protein, 2 kg Rich Milk Chocolate', 'musleblaze', 32, 30, 26, '1531910300-497351njFvsFc1L.jpg', '1531822639-189871xRj4hHTCL._SL1500_.jpg', '1531822639-186671uwsaKUd1L._SL1085_.jpg', '1531822639-443771yCpQJX25L._SL1500_.jpg', 11, '4,5,5,7,5', 0, 1),
(4, 1, 60, 'Ultimate Nutrition Prostar 100% Whey Protein - 5.28 lbs', 'Whey protein also boosts the bodies immune system by acting as an antioxidant\r\nIdeal for both muscle building & fat loss\r\nDecreases recovery times and repairs muscle faster than other proteins\r\nOver 6 grams of BCAAs\r\nNote:The product has perforations on the inner seal. This is from the a design feature from the manufacturer, and is not tampered\r\n\r\n', 54, 37, 20, '1531910347-434351njFvsFc1L.jpg', '1531823477-341171dUrGZeHWL._SL1422_.jpg', '1531823477-378971EJKMVZmaL._SL1500_.jpg', '1531823477-247271FINeTqRXL._SL1500_.jpg', 11, '0', 0, 1),
(5, 1, 60, 'Muscle Pharm Combat 100% Whey ', 'Muscle Pharm Combat 100% Whey 5 lbs is an ultra-filtered low carb high protein supplement that consists of 25g of protein per serving\r\nIt is free of gluten and does not contain any artificial dye or colour\r\nThe protein contained in Muscle Pharm Combat 100% Whey is sourced from Whey Protein Isolate and Whey Protein Concentrate', 63, 46, 20, '1531910393-81351njFvsFc1L.jpg', '1531823591-408071dUrGZeHWL._SL1422_.jpg', '1531823591-357371EJKMVZmaL._SL1500_.jpg', '1531823591-469371FINeTqRXL._SL1500_.jpg', 11, '0', 0, 0),
(6, 1, 60, 'Dymatize Nutrition Elite Whey Protein Powder ', 'One 5 pound jar of chocolate flavored whey protein supplement\r\nProvides ideal ratio of essential and non-essential amino acids in their most easily assimilated form\r\n22 grams of protein per serving, 3.5 grams of glutamine and glutamine precursors, 5 grams of BCAAs, low in carbs and aspartame free\r\nMixes instantly, 63 servings per jar\r\nManufactured in one of Dymatizes state-of-the-art plants\r\nOne 5-pound jar of chocolate flavored whey protein supplement\r\nProvides ideal ratio of essential and non-essential amino acids in their most easily assimilated form', 69, 66, 40, '1531910438-692651njFvsFc1L.jpg', '1531823810-304071dUrGZeHWL._SL1422_.jpg', '1531823810-95371EJKMVZmaL._SL1500_.jpg', '1531823810-934371FINeTqRXL._SL1500_.jpg', 11, '0', 0, 0),
(7, 1, 60, 'GAT Whey Protein ', 'Accelerate fat metabolism and feed.\r\nLow in carbohydrates.\r\nThe high-quality protein source delivers amazing rich thickness and taste with each dessert-like flavour', 87, 49, 20, '1531910471-888751njFvsFc1L.jpg', '1531823912-949671dUrGZeHWL._SL1422_.jpg', '1531823912-411371EJKMVZmaL._SL1500_.jpg', '1531823912-695471FINeTqRXL._SL1500_.jpg', 11, '0', 0, 0),
(9, 1, 60, 'MuscleTech Premium Whey Protein Plus - 5 lbs(Deluxe Chocolate)', 'Builds lean muscle\r\nIncreases strength to help enhance performance in athletes\r\nAccelerates muscle recovery after exercise\r\nHigh protein, low fat - 20g of premium protein, 1g of fat, 0g trans fat and 0g aspartame per scoop.', 60, 39, 30, '1532525727-709371Cv+yrq3aL._SL1500_.jpg', '1532525727-437281cSlKWBUaL._SL1200_.jpg', '1532525727-796381IVaMDQiAL._SL1200_.jpg', '1531826860-2862', 11, '0', 0, 0),
(10, 1, 60, 'MyProtein Impact Whey Protein - 250 g (Chocolate Smooth)', 'Key benefits over 80 percent protein per serving contributes to the growth and maintenance of muscle\r\nContains over 2g of leucine per serving grade a ranking on lab door product\r\nIt is made-up of 100 percent premium grade whey protein concentrate and has 20g of protein per serving (80 percent)', 79, 71, 16, '1532526375-615551Ba2OD177L._SL1002_.jpg', '1532526375-898151Ba2OD177L._SL1002_.jpg', '1531826883-2400', '1531826883-6261', 11, '0', 0, 0),
(11, 1, 60, 'BPI Sports Whey HD - 1.9 kg (Chocolate Cookie)', 'BPI whey HD', 74, 43, 20, '1532526530-666681yZokJJVSL._SL1500_.jpg', '1532526530-796881az0583XoL._SL1500_.jpg', '1532526530-112991anc3TC3GL._SL1500_.jpg', '1532526530-462751JmhZUH+cL.jpg', 11, '20,0,0', 0, 0),
(12, 2, 65, 'Scivation Xtend BCAA 30 Servings - 384 g (Watermelon)', 'Glutamine to promote muscle intracellular branched chain amino acids metabolism\r\nIntra-workout catalyst\r\nResearch validated 2:1:1 ration of the branched chain amino acids', 29, 19, 20, '1532471358-4609517Yq+NC9DL.jpg', '1532471358-220671qCalSqL7L._SL1000_.jpg', '1532471358-63371rDB52vHgL._SL1500_.jpg', '1532471358-6615313lCNfa6XL.jpg', 12, '20', 0, 0),
(13, 2, 65, 'MusclePharm BCAA 3:1:2 Energy - 225g (Blue Raspberry)', 'Supports lean mass growth\r\nReduces muscle breakdown\r\nIncreases protein synthesis\r\nNutritional supplement provider of the ultimate fighting\r\nDietary supplement', 19, 15, 20, '1532471847-5550519w4SKHQXL.jpg', '1532471847-593981Y2LTuNuZL._SL1500_.jpg', '1532471847-562881N81DeL95L._SL1500_.jpg', '1532471847-287171xq8AD-YFL._SL1500_.jpg', 12, '0,20', 0, 0),
(14, 2, 65, 'Ultimate Nutrition 100% Crystalline BCAA 12000-457.6 g (Pink Lemonade)', 'Increase endurance\r\nLengthen the time to fatigue and improve performance\r\n100 percent crystalline', 24, 22, 20, '1532472242-654071qCalSqL7L._SL1000_.jpg', '1532472242-31871rDB52vHgL._SL1500_.jpg', '1532472242-977471xq8AD-YFL._SL1500_.jpg', '1532472242-9687', 12, '0,0,20', 0, 0),
(15, 3, 70, 'GAT Nitraflex - 30 Servings (Blue Raspberry)', 'Ideal for pre-contest prep and lean muscle physique.*\r\nClinically-studied cfb + vasoactive compounds*\r\nHyperaemia and testosterone enhancing powder', 34, 27, 20, '1532488115-4562gat_nitraflex.png', '1532487687-258181mt-XA-NkL._SL1500_.jpg', '1532487687-246581C7H7ghj+L._SL1500_.jpg', '1532487687-271371h-g0SP7tL._SL1050_.jpg', 7, '0', 0, 0),
(16, 3, 70, 'MusclePharm Assault Sport Pre-Workout Powder - 30 Servings (Fruit Punch)', 'Increased muscular endurance and strength\r\nIntense, focused energy and improved energy expenditure\r\nDelays muscle fatigue, fights muscle degradation', 49, 18, 20, '1532488013-27981eT1+nPlEL._SL1500_.jpg', '1532488013-464391d7W1Y2xYL._SL1500_.jpg', '1532488013-7003919wMgM80vL._SL1500_.jpg', '1532488013-842281r7ueuRQsL._SL1500_.jpg', 7, '0,,0,20,0', 0, 0),
(17, 3, 70, 'Bpi Sports 1.M.R. Ultra-Concentrated Pre-Workout Powder, Apple Pear, 60 Servings', 'Ultra concentrated Pre-Workout\r\nLegendary Performance\r\nIncreased Strength', 24, 22, 20, '1532488299-931451JwatL12GL.jpg', '1532488299-825751lBSwIxcFL.jpg', '1532488299-2377', '1532488299-138', 7, '0,20,0,0,0', 5, 4),
(18, 4, 75, 'Optimum Nutrition (ON) Serious Mass Weight Gainer Powder - 6 lbs, 2.72 kg (Chocolate)', 'Adding Calories Has Never Been This Easy or Tasted So Good\r\n1,250 Calories\r\n50 Grams of Blended Protein\r\nOver 250 Grams of Carbohydrates with NO ADDED SUGAR\r\nCreatine, Glutamine and Glutamic Acid\r\n25 Vitamins and Essential Minerals', 33, 30, 20, '1532488584-304281gbxeYOVmL._SL1500_.jpg', '1532488584-135491KbYJ7sYWL._SL1500_.jpg', '1532488584-414791FI5Z3tt5L._SL1500_.jpg', '1532488584-121181SHOtBN5HL._SL1500_.jpg', 11, '0,20,0', 1, 0),
(19, 4, 75, 'MuscleTech MASS-TECH EXTREME 2000 - Triple Chocolate Brownie - 6lbs', 'Designed For The Hardgainer\r\nBuild Mass And Strength\r\nSubjects Gained 5 Times The Mass In 8 Weeks', 37, 35, 20, '1532488822-591561NuAca+1yL.jpg', '1532488822-174491mSr47N5QL._SL1500_.jpg', '1532488822-759191lBQIaTdJL._SL1500_.jpg', '1532488822-287391EBVzjckOL._SL1500_.jpg', 11, '0,20,0', 2, 1),
(20, 7, 82, 'BPI Sports Best BCAA Stack', 'Best BCAA W/Energy - 25 Servings\r\nBest BCAAâ„¢ w/ Energy is an all-in-one muscle building and recovery formula with an added kick of energy to help increase performance and focus. *\r\n\r\nPromote Lean Muscle!*\r\nIncrease Energy and Focus!*\r\nBoost Performance and Endurance!*\r\nBest BCAA - 30 Servings\r\nRevolutionary Peptide Linked Branch Chained Aminos!*\r\n\r\nProven 2:1:1 BCAA Ratio!*\r\n10 Delicious Flavors To Choose From!*\r\nPeptide Linked To Promote Efficient Metabolization!\r\n\r\nBest BCAA Shredded - 25 Servings\r\nLean Muscle Recovery Formula!*\r\n\r\nSupports Nitric Oxide Synthase!*\r\nL-Citrulline + Oligopeptides!*\r\nHelps Burn Fat For Fuel!*', 64, 43, 20, '1532531221-7716bestbcaa_stack.jpg', '1532531221-651best_bcaa_shredded-wi-sm_1.jpg', '1532531221-5494best_bcaa_w_energy-sc_2.jpg', '1532531221-3531bestbcaa_gf_6_5_1_3.jpg', 1, '0', 0, 0),
(21, 7, 82, 'Universal Nutrition Animal Gym Stack', 'Animal Pak - 44 Paks\r\nThe #1 selling training pak in the world for 23 years solid. Since 1984, more competitive bodybuilders have cut their teeth on the Animal Pak than any other bodybuilding supplement in history. Why? Simple. Animal Pak gets the job done. It works. First time. Last time. Every time.*\r\nAnimal Stak - 21 Paks\r\nOptimizing your bodys levels of naturally occurring anabolic hormones - hormones like testosterone, growth hormone (GH) and IGF-1 - can make a huge difference when it comes to making the gains you want and tapping into the anabolic advantage. These hormones are secreted during a hard resistance training session. Muscle rebuilding essentially takes place due to these important hormonal secretions that arise with balls to the wall training. When you have a hard training session, this however, also results in a rise in unwanted catabolic hormones such as cortisol. What we want to do is increase the output and functionality of the main hormones involved in resistance training and the ways in which to increase their anabolic output, but also limit the role of catabolic hormones. Thats what we designed Animal Stak to do - to work naturally with your body to enhance the function of testosterone, growth hormone (GH) and IGF-1.*\r\nJuiced Aminos - 30 Servings\r\nThe all-new Animal Juiced Aminos is a powerful amino acid stack that is targeted and strategically enhanced for strength training athletes. What does it contain? Each jacked-up scoop of Juiced Aminos is loaded with instantized branch chained amino acids (BCAA), essential amino acids (EAA), in addition to performance and recovery aminos and key patented aminos.*', 72, 66, 20, '1532531577-6626animal-gym-stack.jpg', '1532531577-2136animalpak.jpg', '1532531577-4819animalstak_1.jpg', '1532531577-5276juiced-aminos.jpg', 1, '0', 0, 0),
(22, 7, 82, 'Kaged Muscle Swole Workout Stack', 'Pre-Kaged, 20 Servings\r\nIts time to turn up your workout intensity, increase performance, KRUSH overtraining syndrome, and supercharge your adrenaline. Discover the high-performance power of this revolutionary new formula from Kaged Muscle supplements!*\r\n\r\nSupports Hydration, Energy, Focus, Endurance and Strength!*\r\nBoost Energy with Organic Caffeine!*\r\nBanned Substance Free!\r\nIn-Kaged, 20 Servings\r\nEach serving of In-Kaged contains over 14g of premium ingredients that your will feel from the first dose! 5g of fermented BCAAs, 3g of PURE L-Citrulline, 1.6g of Carnosyn Beta-Alanine, and other hydrating and energizing ingredients have been specially chosen to create a delicious, efficacious intra-workout formula!*\r\n\r\n5g of fermented BCAAs\r\nOrganic caffeine for natural energy boost*\r\nBSCG certified drug-free\r\nRe-Kaged, 20 Servings\r\nRe-Kaged is a game-changing anabolic protein that you cant live without if you are serious about adding size and strength. Supercharge your muscles with our lightening fast delivery of BCAAs, EAAs, CAAs, and NAAs from Non-GMO Whey Protein Isolate for maximum post-workout recovery.*\r\n\r\nContains Patented BetaPower and Creatine HCl\r\nNon-GMO with Natural Flavors!\r\nSourced From Whey Protein Isolate!', 73, 69, 20, '1532531830-2214kaged-swole-stack.jpg', '1532531830-3178inkaged_wm_1.jpg', '1532531830-2006km_product-re-kaged-sm_1.png', '1532531830-6217pre-kaged_crisp.jpg', 1, '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsizechart`
--

CREATE TABLE `tblsizechart` (
  `id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsizechart`
--

INSERT INTO `tblsizechart` (`id`, `size`) VALUES
(1, 'No Size'),
(7, '200 gm,240 gm,300 gm,345 gm,500 gm'),
(11, '4lb, 6lb, 10lb'),
(12, '384 gm, 225 gm, 457 gm');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `subcatname` varchar(200) NOT NULL,
  `sizeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`id`, `catid`, `subcatname`, `sizeid`) VALUES
(60, 1, 'WHEY PROTEIN', 11),
(61, 1, 'PROTEIN BLENDS', 6),
(62, 1, 'CASEIN PROTEIN', 6),
(65, 2, 'BCAA', 12),
(66, 2, 'MULTI VITAMINS', 9),
(67, 2, 'FAT BURNERS', 9),
(69, 3, 'CREATINE', 7),
(70, 3, 'PRE WORK OUT', 7),
(71, 3, 'NITRIC OXIDE', 9),
(74, 4, 'WEIGHT GAINERS', 6),
(75, 4, 'MASS GAINERS', 11),
(82, 7, 'Crazy Deals', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribe`
--

CREATE TABLE `tblsubscribe` (
  `id` int(11) NOT NULL,
  `subemail` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribe`
--

INSERT INTO `tblsubscribe` (`id`, `subemail`, `status`) VALUES
(18, 'singh234sd4@gmail.com', 'Subscribed'),
(19, 'manmeetsingh2259@gmail.com', 'Subscribed'),
(20, 'manmeetsingh2259@gmail.com', 'Subscribed');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `userfname` varchar(255) NOT NULL,
  `userlname` varchar(50) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `userphone` varchar(255) NOT NULL,
  `useraddress` varchar(250) NOT NULL,
  `userpincode` varchar(250) NOT NULL,
  `usercity` varchar(250) NOT NULL,
  `userstate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `userfname`, `userlname`, `useremail`, `userpassword`, `userphone`, `useraddress`, `userpincode`, `usercity`, `userstate`) VALUES
(12, 'Manmeet', 'Singh', 'manmeet@gmail.com', 'manmeet', '5146632259', '5601, rue beurling, verdun, Apartment no. 7', 'h4h1b8', 'montreal', 'Quebec'),
(28, 'jaskaran', 'lehal', 'jaskaran@gmail.com', 'jaskaran', '5146632297', 'montreal', 'h4h163', 'montreal', 'Quebec'),
(29, 'manpreet', 'sINGH', 'manpreet@gmail.com', 'manpreet', '5146632270', 'montreal', 'gee242', 'montreal', 'Quebec');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgoal`
--
ALTER TABLE `tblgoal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsizechart`
--
ALTER TABLE `tblsizechart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribe`
--
ALTER TABLE `tblsubscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `useremail` (`useremail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbrand`
--
ALTER TABLE `tblbrand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblgoal`
--
ALTER TABLE `tblgoal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblsizechart`
--
ALTER TABLE `tblsizechart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tblsubscribe`
--
ALTER TABLE `tblsubscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
