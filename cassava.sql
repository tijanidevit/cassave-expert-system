-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 11:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cassava`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(90) NOT NULL,
  `password` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date_added`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-04-02 23:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(140) NOT NULL,
  `symptoms` text NOT NULL,
  `causes` text NOT NULL,
  `prevention` text NOT NULL,
  `cure` text NOT NULL,
  `comments` text NOT NULL,
  `stats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`disease_id`, `disease_name`, `symptoms`, `causes`, `prevention`, `cure`, `comments`, `stats`) VALUES
(2, 'Cassava Mosaic Disease (CMD)', 'The symptoms of CMD occur as characteristic leaf\r\nmosaic patterns that affect discrete areas and they\r\nare determined at an early stage of leaf development\r\nThe chlorotic areas fail to expand fully so that\r\nstresses set up by unequal expansion of the lamina\r\ncause malformation and distortion. Severely affected\r\nleaves are reduced in size, misshapen and twisted,\r\nwith yellow areas separated by areas of normal green\r\ncolour. The plants are stunted and the young leaves\r\nabsciss (Storey and Nichols, 1938; 1951).\r\nPlant with stunted growth due\r\nto CMD\r\nThe leaf chlorosis may be pale yellow or nearly white, or just discernibly paler than\r\nnormal. The chlorotic areas are usually clearly demarcated and vary in size from the\r\nwhole leaflet to small flecks or spots. Leaflets may show a uniform mosaic pattern or\r\nthe pattern is localised to a few areas which are often at the bases of the leaflets.\r\nRoots 7 (1) Special Issue December 2000\r\n2\r\nDistortion, reduction in leaflet size and general growth retardation, appear to be\r\nsecondary effects associated with symptom severity.\r\nSymptoms vary from leaf to leaf, shoot to\r\nshoot and plant to plant, even for the\r\nsame variety and virus strain in the same\r\nlocality. Variation in symptoms may be\r\ndue to differences in virus strain, the\r\nsensitivity of the host, plant age and\r\nenvironmental factors such as soil\r\nfertility, soil moisture availability,\r\nradiation and temperature. Cool\r\ntemperatures usually enhance symptom\r\nexpression, while warm temperatures\r\nrestrict it.\r\nLeaves affected by cassava mosaic\r\ndisease Some leaves situated between affected\r\nones may seem normal and give the\r\nappearance of recovery. This behaviour depends on the ambient temperature and\r\nhost-plant resistance. However, symptoms may recur on recovered plants when\r\nenvironmental conditions favour symptom expression. The first few leaves produced by\r\nan infected cutting are sometimes symptomless and are followed by severely affected\r\nleaves. There is a tendency for symptom severity to diminish as plants age, especially\r\nin resistant varieties. Symptoms tend to reappear on the axillary growth after the shoot\r\ntips are removed and this procedure is sometimes adopted to enhance symptom\r\nexpression in screening for resistance.\r\nCassava green mite (Mononychellus tanajoa Bondar) is found in most cassava-growing\r\nareas of Africa and symptoms may be confused with or mask those of both CMD and\r\nCBSD (see Fig.1d.). A feature that facilitates a distinction between mite and virus\r\ndamage is that the symptoms caused by mites are similar on each leaflet of the same\r\nleaf and on each side of the midrib. The symptoms of mosaic usually differ on the\r\ndifferent leaflets and either side of the midrib.', 'When CMD was first described, the causal agent was assumed to be a virus, in the absence of any visible pathogen. This view was consistent with the results of early studies showing that the disease was transmitted by a whitefly vector, now known to be Bemisia tabaci. However, proof of the viral aetiology was not obtained until the 1970s and 1980s, when sap inoculations to herbaceous hosts were successful and virus isolates obtained in this way were purified and characterised. After initial uncertainty, the isolates were shown to cause CMD, Koch’s postulates were fulfilled and the various isolates from Africa and India were regarded as strains of a single virus of the geminivirus group and designated African cassava mosaic virus.', 'The basic approach to controlling CMD should be to select stem cuttings for\r\npropagation from symptomless mother plants. This is seldom done and inadvertently,\r\nmuch use is made of infected planting material. However, there is considerable\r\nevidence of the advantages to be gained from a more discriminating approach to the\r\nselection of planting material (Thresh et al., 1998b). Selection is easy and can be very\r\neffective if the parent plants are growing vigorously and express conspicuous\r\nRoots 7 (1) Special Issue December 2000 symptoms when infected. Difficulties arise if the plants are resistant and express\r\ninconspicuous symptoms, or if the leaves absciss or are damaged following drought or\r\npest attack. Problems can also arise if leaves are discoloured and distorted, due to the\r\neffects of zinc or other mineral deficiency.\r\nIt has long been recognised that some varieties are resistant to CMD and sustain little\r\nor no damage when infected. Such varieties have been widely used as a means of\r\ncontrol. However, they are not always available or may not have all the other\r\nfavourable attributes required by farmers. This explains why susceptible varieties are\r\nstill widely grown, especially in areas where CMD is not a prevalent or serious problem\r\nand there are no compelling reasons for adopting virus-resistant varieties.\r\nLittle use is made of insecticides to control the whitefly vector and such measures are\r\ninappropriate for a widely grown subsistence crop. Only limited attention has been\r\ngiven to other possible control measures such as the use of intercrops, crop disposition\r\nor the manipulation of planting date to decrease the risk of infection (Thresh and OtimNape, 1994). Such measures merit consideration in the current search for integrated\r\nmeans of control that seek to make the most effective use of phytosanitation and\r\nresistant varieties (Hillocks, 1997).', 'Use of CMD-resistant cultivars\r\nThe Root and Tuber Improvement Programme (RTIP), which\r\nfalls within ZARI, has developed and released cassava cultivars\r\nthat outperform the local cultivars by using breeding materials\r\nfrom the IITA. Initially, RTIP focused on the identification of the\r\nbest local cultivars and on the cleaning and distribution of planting materials. In 1993, it released three cultivars, Bangweulu,\r\nKapumba and Nalumino (Table 2; Haggblade and Nyembe\r\n2008), which have higher yields (22–31 t/ha). However, despite\r\nbeing considered disease resistant (Soenarjo 1992), these cultivars are susceptible to CMD (Tembo 2016). In 2000, following\r\nthe release of the best-performing local cultivars (Bangweulu,\r\nKapumba and Nalumino), four high-yield cultivars, Chila\r\n', 'CMD was first described in 1894 in what is now Tanzania. The disease was later reported in many other countries of East, West and Central Africa. It is now known to\r\noccur in all the cassava-growing countries of Africa and the adjacent islands and also, in India and Sri Lanka. A report of the disease in Indonesia in 1931, has not been\r\nconfirmed and the mosaic disease of cassava in South America is caused by a different virus.\r\nThere are great differences between regions in the overall prevalence of CMD and in the severity of the losses caused. The available information from surveys and yield loss assessments is summarised by Thresh et al. (1997), who on plausible assumptions,estimate the losses in Africa to be 15–24%. This is equivalent to 15–28 million tonnes,\r\ncompared with the FAO production estimates for 1997 of 84 million tonnes.\r\n', 0),
(7, 'Cassava bacterial blight', ' Initially, damage by cassava bacterial blight appears as water-soaked\r\ndead spots (lesions). The lesions occur between leaf veins and are most evident on the\r\nlower surfaces of the leaves (Figure 7). The lesions are small, not completely round in shape,\r\nand have a few angles at their edges. These\r\nangular lesions later join together into larger\r\npatches killing the leaf blade as they enlarge.\r\nThe leaf blade turns brown with the watersoaked area at the leading edge of the brown\r\npatch. This damage symptom is known as leaf\r\nblighting (Figure 8). Severely blighted leaves\r\nwilt (Figure 9), die, and fall causing defoliation\r\nand shoot tip die-back (Figure 10) or complete death of the shoot. Leaf blighting starts\r\nfrom the leaf blade and moves towards the\r\npetiole. The petiole retains a horizontal position before leaf fall (Figure 9). This is unlike\r\ncassava anthracnose-damaged leaves whose\r\npetioles droop before leaf fall (Figure 12).\r\nDrops of brownish gum may occur on the\r\nleaves, petioles, and stems of plants infected\r\nwith cassava bacteria blight.\r\nThe damage symptoms of cassava bacteria\r\nblight are more evident in the wet than in the\r\ndry season. The disease is more severe in\r\nyoung plants than in older ones.', ' The main sources of the\r\nbacterium which causes cassava bacterial\r\nblight are cassava plants with the disease. The\r\nbacterium enters cassava plants through\r\nwounds and scratches on the stems andleaves. It multiplies and occurs in large numbers in the leaves and stems. Cassava bacterial\r\nblight is therefore spread by planting stem\r\ncuttings from plants with the disease symptoms. Dead cassava stems and leaves with the\r\nbacterium also serve as sources of the disease\r\nif they are not destroyed after root harvest.\r\nThe disease is spread naturally by raindrops\r\nwhich splash the bacterium from infected\r\nplants to healthy plants. Insects, for example,\r\ngrasshoppers become contaminated with the\r\nbacterium and spread it to healthy cassava\r\nplants. Farm tools that are used to cut infected cassava plants should be cleaned after\r\nuse to prevent the bacterium on them from\r\nspreading to other plants.', 'Application of the modern techniques of DNA manipulation and study, coupled with\r\nan increased interest in CMD in Africa, has resulted in much new information on the\r\ncharacter and diversity of CMGs affecting cassava in Africa. Arguably, the most important\r\nbreakthroughs came from studies at the Scottish Crop Research Institute (SCRI) on\r\nmaterial collected from Uganda, which showed fi rst that a novel virus had risen through\r\na recombination event between ACMV and EACMV (Zhou et al. 1997), and that mixed\r\nvirus infections were both frequent and resulted in a synergistic interaction (Harrison\r\net al. 1997). The novel virus, designated the Uganda variant (UgV) (Zhou et al. 1997)\r\nor EACMV-UG (Deng et al. 1997) was associated with the epidemic of severe CMD in\r\nUganda, and showed a large portion of the DNA coding for the ACMV coat protein gene\r\nspliced into an otherwise EACMV-like DNA-A. Consequently, earlier serological tests\r\nerroneously recognized the virus as ACMV. This fi nding stimulated much additional\r\ndetailed study of CMGs across Africa, with the result that recombination in both DNAA and DNA-B was found to be a common phenomenon within EACMVs (Zhou', 'Application of the modern techniques of DNA manipulation and study, coupled with\r\nan increased interest in CMD in Africa, has resulted in much new information on the\r\ncharacter and diversity of CMGs affecting cassava in Africa. Arguably, the most important\r\nbreakthroughs came from studies at the Scottish Crop Research Institute (SCRI) on\r\nmaterial collected from Uganda, which showed fi rst that a novel virus had risen through\r\na recombination event between ACMV and EACMV (Zhou et al. 1997), and that mixed\r\nvirus infections were both frequent and resulted in a synergistic interaction (Harrison\r\net al. 1997). The novel virus, designated the Uganda variant (UgV) (Zhou et al. 1997)\r\nor EACMV-UG (Deng et al. 1997) was associated with the epidemic of severe CMD in\r\nUganda, and showed a large portion of the DNA coding for the ACMV coat protein gene\r\nspliced into an otherwise EACMV-like DNA-A. Consequently, earlier serological tests\r\nerroneously recognized the virus as ACMV. This fi nding stimulated much additional\r\ndetailed study of CMGs across Africa, with the result that recombination in both DNAA and DNA-B was found to be a common phenomenon within EACMVs (Zhou', 'Application of the modern techniques of DNA manipulation and study, coupled with\r\nan increased interest in CMD in Africa, has resulted in much new information on the\r\ncharacter and diversity of CMGs affecting cassava in Africa. Arguably, the most important\r\nbreakthroughs came from studies at the Scottish Crop Research Institute (SCRI) on\r\nmaterial collected from Uganda, which showed fi rst that a novel virus had risen through\r\na recombination event between ACMV and EACMV (Zhou et al. 1997), and that mixed\r\nvirus infections were both frequent and resulted in a synergistic interaction (Harrison\r\net al. 1997). The novel virus, designated the Uganda variant (UgV) (Zhou et al. 1997)\r\nor EACMV-UG (Deng et al. 1997) was associated with the epidemic of severe CMD in\r\nUganda, and showed a large portion of the DNA coding for the ACMV coat protein gene\r\nspliced into an otherwise EACMV-like DNA-A. Consequently, earlier serological tests\r\nerroneously recognized the virus as ACMV. This fi nding stimulated much additional\r\ndetailed study of CMGs across Africa, with the result that recombination in both DNAA and DNA-B was found to be a common phenomenon within EACMVs (Zhou', 0),
(8, 'CASSAVA BROWN STREAK', 'All parts of the cassava plant may show symptoms of CBSV infection but the aspects\r\nof the syndrome that are manifest and to what degree, depend on environmental\r\nconditions, the growth stage of the crop relative to the time of infection and the\r\nsensitivity of the cultivar. Cassava mosaic and CBSD both cause chlorotic leaf mottle,\r\nalthough the symptoms of the two diseases are quite distinct when they occur\r\nseparately. Leaf symptoms of CBSD may be absent on infected plants under certain\r\nundefined environmental conditions, especially on new growth sprouting after droughtinduced defoliation. Nichols (1950) distinguished two types of foliar symptoms\r\nassociated with CBSD: \r\no Leaf symptoms (Type 1) – chlorosis appears first along the margins of the\r\nsecondary veins later affect tertiary veins and may develop into chlorotic blotches.\r\nLeaf infected with CBSD\r\nshowing chlorosis around the\r\nveins\r\nCBSD foliar\r\nsymptoms\r\no Leaf symptoms (Type 2) – chlorosis not clearly associated with the veins but in\r\nroughly circular patches between the main veins. In advanced stages of disease, much\r\nof the lamina may be affected. Diseased leaves remain attached to the plant for several\r\nweeks. During very hot weather, symptoms do not appear on newly formed foliage.\r\nThe presence of stem symptoms also seems to be variable and may differ with cultivar.\r\nThey are usually present in the advanced stages of the disease and often indicate the\r\npresence of root symptoms.\r\nStem necrosis on stems of plants\r\ninfected with CBSD\r\no Stem symptoms – are not consistently\r\nassociated with CBSD, except in the more\r\nsensitive varieties. On young green stem\r\ntissues, purple/brown lesions may be\r\nobserved on the exterior surface which are\r\nseen to have penetrated into the cortex on\r\nstripping off the outer bark. Necrotic\r\nlesions in the leaf scars appear after\r\nleaves have shed due to normal\r\nsenescence. In severe infections, these\r\nlesions develop to kill the dormant axillary\r\nbuds. Once axillary buds are killed, a\r\ngeneral shrinkage of the node occurs and\r\ndeath of the internodal tissue follows, so that the branch dies from the tip downwards,\r\nto cause ‘die back’.\r\nRoots 7 (1) Special Issue December 2000\r\n5\r\no Root symptoms – are characteristic of CBSD\r\nin some cultivars and are the most destructive\r\nCassava tuber infected with CBSD \r\ncomponent of the syndrome. Root symptoms usually develop after foliar symptoms and\r\nthe period between infection and onset of root necrosis seems to be cultivardependent. Some cultivars have been identified in which root necrosis does not\r\ndevelop until more than 8 months after planting an infected cutting, despite the earlier\r\npresence of clear foliar symptoms (Hillocks et al., 1996). In the most sensitive cultivars\r\nwhere planting material has been derived from infected stock, root necrosis can\r\nbecome apparent from 5 months after planting (R. Hillocks and M. Raya, unpublished).\r\nRoot symptoms are variable on the outside of the root and may appear as radial\r\nconstrictions and/or pits and fissures in the surface bark. Tissue surrounding the pits is\r\nstained brown or black. Below the pits, the cortex is necrotic. The internal symptoms\r\nconsist of a yellow/brown, corky necrosis of the starch-bearing tissue, sometimes with\r\nblue/black streaks. The lesions seem to remain discrete, although in sensitive varieties,\r\nalmost the whole of the starch storage tissue may be affected. Decay and soft rot\r\nensue only in the advanced stages of infection and when secondary organisms invade.\r\nSometimes, the roots appear healthy on the outside with no obvious constrictions or\r\nsize reduction, but when cut open, they are found to be necrotic. ', 'Since CBSD was first described, the causal agent was assumed to be a virus, in the\r\nabsence of a visible pathogen. This seemed to be confirmed when the disease was\r\nsap-transmitted to a range of herbaceous indicator hosts by Lister (1959) and in later\r\nexperiments of Bock and Guthrie (1976). Virus particles were then detected by electron\r\nmicroscopy in leaf samples showing typical CBSD symptoms that were sent to the UK.\r\nThe particles were elongate, flexuous filaments 650–690 nm long (Lennon et al., 1986)\r\nthat contained ‘pin-wheel’ inclusions, typical of potyviruses (Harrison et al., 1995). The\r\nexact aetiology of the disease remained a matter of speculation until recent work at\r\nBristol University in the UK, where the coat protein gene of CBSV was cloned and\r\nsequenced. The virus has now been shown to be an Ipomovirus, a whitefly-transmitted\r\npotyvirus (G. Foster, unpublished report). The provisional taxonomy of CBSV would be\r\nas follows: Phylum: RNA virus; Class: 1 (Picornia-like viruses); Order: 2; Family:\r\nPotyviridae: Genus: Ipomovirus (Type member: sweet potato mild mottle virus);\r\nspecies: CBSV. ', 'As with CMGs, the basic approach to control for CBSD is to select planting material\r\nfrom symptomless mother plants. The health of the stock needs to be maintained by\r\ncontinued selection and roguing of any infected individuals which appear at sprouting.\r\nThe success of this approach depends on the amount of disease in surrounding\r\ncassava and the rate of spread. The mechanism of spread is unknown for CBSV and\r\nthe value of virus-free planting material cannot yet be predicted. However, this may be\r\nworthwhile for areas of low disease pressure with little or no disease spread. For areas\r\nof high disease pressure on the coast of Tanzania and Mozambique for instance,\r\nrelease of virus-free planting material needs to be combined with deployment of\r\ncultivars which exhibit some form of resistance. Local cultivars such as ‘Nanchinyaya’\r\nin southern Tanzania which seem to be tolerant of infection and are slow to develop\r\nroot necrosis, could be used. Surveys conducted in Tanzania have indicated that there\r\nare other cultivars with varying degrees of resistance to infection with, or tolerance to,\r\nCBSV. ', 'As with CMGs, the basic approach to control for CBSD is to select planting material\r\nfrom symptomless mother plants. The health of the stock needs to be maintained by\r\ncontinued selection and roguing of any infected individuals which appear at sprouting.\r\nThe success of this approach depends on the amount of disease in surrounding\r\ncassava and the rate of spread. The mechanism of spread is unknown for CBSV and\r\nthe value of virus-free planting material cannot yet be predicted. However, this may be\r\nworthwhile for areas of low disease pressure with little or no disease spread. For areas\r\nof high disease pressure on the coast of Tanzania and Mozambique for instance,\r\nrelease of virus-free planting material needs to be combined with deployment of\r\ncultivars which exhibit some form of resistance. Local cultivars such as ‘Nanchinyaya’\r\nin southern Tanzania which seem to be tolerant of infection and are slow to develop\r\nroot necrosis, could be used. Surveys conducted in Tanzania have indicated that there\r\nare other cultivars with varying degrees of resistance to infection with, or tolerance to,\r\nCBSV. ', 'CBSD was first described by Storey (1936) who recorded it in the foothills of the\r\nUsumbara Mountains of Tanganyika (now Tanzania). Nichols (1950) later reported that\r\nthe disease was endemic in all East African coastal cassava growing areas, from the\r\nnorth-east border of Kenya to Mozambique and was widespread at lower altitudes in\r\nNyasaland (now Malawi). More recent surveys have confirmed this distribution in\r\nTanzania and Malawi (Hillocks et al., 1996, 1998; Legg and Raya, 1998; Sweetmore,\r\n1994). Surveys conducted in 1999 revealed that the disease was widespread in\r\nMozambique in the two Provinces of Zambesia and Nampula that were assessed (R.\r\nHillocks, J.M. Thresh, J. Tomas and R. Xavier, unpublished report). In southern\r\nTanzania, CBSD is common at altitudes below 300 m, less common between 300 m\r\nand 700 m and rare at altitudes above 700 m, where natural spread does not seem to\r\noccur. ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `symptom_id` int(11) NOT NULL,
  `symptom_type` int(11) NOT NULL,
  `disease` int(11) NOT NULL,
  `symptom` varchar(80) NOT NULL,
  `symptom_image` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`symptom_id`, `symptom_type`, `disease`, `symptom`, `symptom_image`) VALUES
(14, 3, 8, 'Brown Leaf Spot', '6221-Brown-leaf-spot.png'),
(15, 3, 2, 'Shrinked Leaf', '4947-cmd2.jpg'),
(16, 2, 7, 'Rotten Stem', '8776-cassava-bacteria-blight.jpg'),
(17, 1, 7, 'Rotten Root', '9145-4603437627_36d8c1aa12_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `symptom_types`
--

CREATE TABLE `symptom_types` (
  `symptom_type_id` int(11) NOT NULL,
  `symptom_type` varchar(40) NOT NULL,
  `type_image` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `symptom_types`
--

INSERT INTO `symptom_types` (`symptom_type_id`, `symptom_type`, `type_image`) VALUES
(1, 'Root', 'root.jpg'),
(2, 'Stem', 'stem.jpg'),
(3, 'Leaf', 'leaf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `password`) VALUES
(1, 'Tijani Mustapha Adekunle', 'thenewxpat@gmail.com', 'b2049cc17de839742b787a64cad834a4'),
(2, 'Mustapha Tijani', 'thenewxpa@gmail.com', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symptom_id`);

--
-- Indexes for table `symptom_types`
--
ALTER TABLE `symptom_types`
  ADD PRIMARY KEY (`symptom_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `symptom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `symptom_types`
--
ALTER TABLE `symptom_types`
  MODIFY `symptom_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
