-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: clothes_shop
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('lv:v3.8.1:file:01772ed1-laravel.log:ecf8427e:chunk:0','a:206:{i:1711776301;a:1:{s:5:\"ERROR\";a:1:{i:0;i:0;}}i:1711788515;a:1:{s:5:\"ERROR\";a:1:{i:1;i:26086;}}i:1711788517;a:1:{s:5:\"ERROR\";a:1:{i:2;i:26492;}}i:1711788523;a:1:{s:5:\"ERROR\";a:1:{i:3;i:26866;}}i:1711788618;a:1:{s:5:\"ERROR\";a:1:{i:4;i:27240;}}i:1711793147;a:1:{s:5:\"ERROR\";a:1:{i:5;i:27646;}}i:1711793933;a:1:{s:5:\"ERROR\";a:2:{i:6;i:43560;i:7;i:46127;}}i:1711793934;a:1:{s:5:\"ERROR\";a:3:{i:8;i:48694;i:9;i:51261;i:10;i:53828;}}i:1711793935;a:1:{s:5:\"ERROR\";a:3:{i:11;i:56395;i:12;i:58962;i:13;i:61529;}}i:1711793936;a:1:{s:5:\"ERROR\";a:1:{i:14;i:64096;}}i:1711795632;a:1:{s:5:\"ERROR\";a:1:{i:15;i:66663;}}i:1711795675;a:1:{s:5:\"ERROR\";a:1:{i:16;i:74030;}}i:1711795721;a:1:{s:5:\"ERROR\";a:1:{i:17;i:74499;}}i:1711795748;a:1:{s:5:\"ERROR\";a:1:{i:18;i:74968;}}i:1711795813;a:1:{s:5:\"ERROR\";a:1:{i:19;i:75439;}}i:1711795862;a:1:{s:5:\"ERROR\";a:1:{i:20;i:75908;}}i:1711795903;a:1:{s:5:\"ERROR\";a:1:{i:21;i:76377;}}i:1711795943;a:1:{s:5:\"ERROR\";a:1:{i:22;i:76846;}}i:1711796152;a:1:{s:5:\"ERROR\";a:1:{i:23;i:88158;}}i:1711796531;a:1:{s:5:\"ERROR\";a:1:{i:24;i:99490;}}i:1711818058;a:1:{s:5:\"ERROR\";a:1:{i:25;i:125576;}}i:1711818059;a:1:{s:5:\"ERROR\";a:3:{i:26;i:161865;i:27;i:175728;i:28;i:212017;}}i:1711818193;a:1:{s:5:\"ERROR\";a:1:{i:29;i:225880;}}i:1711818194;a:1:{s:5:\"ERROR\";a:3:{i:30;i:262169;i:31;i:276032;i:32;i:312321;}}i:1711818703;a:1:{s:5:\"ERROR\";a:1:{i:33;i:326184;}}i:1711818787;a:1:{s:5:\"ERROR\";a:1:{i:34;i:336676;}}i:1711818867;a:1:{s:5:\"ERROR\";a:1:{i:35;i:347168;}}i:1711818892;a:1:{s:5:\"ERROR\";a:1:{i:36;i:357660;}}i:1711818894;a:1:{s:5:\"ERROR\";a:1:{i:37;i:368152;}}i:1711818905;a:1:{s:5:\"ERROR\";a:1:{i:38;i:378644;}}i:1711818912;a:1:{s:5:\"ERROR\";a:1:{i:39;i:389136;}}i:1711820134;a:1:{s:5:\"ERROR\";a:1:{i:40;i:399628;}}i:1711820144;a:1:{s:5:\"ERROR\";a:1:{i:41;i:410098;}}i:1711820146;a:1:{s:5:\"ERROR\";a:1:{i:42;i:420568;}}i:1711820151;a:1:{s:5:\"ERROR\";a:1:{i:43;i:431038;}}i:1711820155;a:1:{s:5:\"ERROR\";a:1:{i:44;i:441508;}}i:1711820156;a:1:{s:5:\"ERROR\";a:1:{i:45;i:451978;}}i:1711820165;a:1:{s:5:\"ERROR\";a:1:{i:46;i:462448;}}i:1711820167;a:1:{s:5:\"ERROR\";a:1:{i:47;i:472918;}}i:1711820169;a:1:{s:5:\"ERROR\";a:1:{i:48;i:483388;}}i:1711820203;a:1:{s:5:\"ERROR\";a:1:{i:49;i:493858;}}i:1711820259;a:1:{s:5:\"ERROR\";a:1:{i:50;i:504328;}}i:1711820316;a:1:{s:5:\"ERROR\";a:1:{i:51;i:514798;}}i:1711820593;a:1:{s:5:\"ERROR\";a:1:{i:52;i:525268;}}i:1711820601;a:1:{s:5:\"ERROR\";a:1:{i:53;i:535738;}}i:1711820716;a:1:{s:5:\"ERROR\";a:1:{i:54;i:546208;}}i:1711820718;a:1:{s:5:\"ERROR\";a:1:{i:55;i:556678;}}i:1711820754;a:1:{s:5:\"ERROR\";a:1:{i:56;i:567148;}}i:1711820932;a:1:{s:5:\"ERROR\";a:1:{i:57;i:577618;}}i:1711825074;a:1:{s:5:\"ERROR\";a:1:{i:58;i:588104;}}i:1711825076;a:1:{s:5:\"ERROR\";a:1:{i:59;i:620200;}}i:1711853704;a:1:{s:5:\"ERROR\";a:1:{i:60;i:652296;}}i:1711859108;a:1:{s:5:\"ERROR\";a:1:{i:61;i:682928;}}i:1711859597;a:1:{s:5:\"ERROR\";a:1:{i:62;i:693404;}}i:1711859605;a:1:{s:5:\"ERROR\";a:1:{i:63;i:693886;}}i:1711859619;a:1:{s:5:\"ERROR\";a:1:{i:64;i:694368;}}i:1711859625;a:1:{s:5:\"ERROR\";a:1:{i:65;i:726437;}}i:1711859628;a:1:{s:5:\"ERROR\";a:1:{i:66;i:755922;}}i:1711860085;a:1:{s:5:\"ERROR\";a:1:{i:67;i:756404;}}i:1711866048;a:1:{s:5:\"ERROR\";a:1:{i:68;i:786820;}}i:1711868484;a:1:{s:5:\"ERROR\";a:1:{i:69;i:812906;}}i:1711868487;a:1:{s:5:\"ERROR\";a:1:{i:70;i:838143;}}i:1711868494;a:1:{s:5:\"ERROR\";a:1:{i:71;i:863403;}}i:1711868548;a:1:{s:5:\"ERROR\";a:1:{i:72;i:888663;}}i:1712151877;a:1:{s:5:\"ERROR\";a:1:{i:73;i:913923;}}i:1712151878;a:1:{s:5:\"ERROR\";a:2:{i:74;i:939183;i:75;i:964443;}}i:1712764115;a:1:{s:5:\"ERROR\";a:1:{i:76;i:989703;}}i:1712766775;a:1:{s:5:\"ERROR\";a:1:{i:77;i:1015789;}}i:1712766781;a:1:{s:5:\"ERROR\";a:1:{i:78;i:1047867;}}i:1712766787;a:1:{s:5:\"ERROR\";a:1:{i:79;i:1079945;}}i:1712766819;a:1:{s:5:\"ERROR\";a:1:{i:80;i:1112023;}}i:1712766837;a:1:{s:5:\"ERROR\";a:1:{i:81;i:1144101;}}i:1712766844;a:1:{s:5:\"ERROR\";a:1:{i:82;i:1176179;}}i:1712767024;a:1:{s:5:\"ERROR\";a:1:{i:83;i:1208257;}}i:1712767036;a:1:{s:5:\"ERROR\";a:1:{i:84;i:1240335;}}i:1712767037;a:1:{s:5:\"ERROR\";a:1:{i:85;i:1272413;}}i:1712767052;a:1:{s:5:\"ERROR\";a:1:{i:86;i:1304491;}}i:1712767082;a:1:{s:5:\"ERROR\";a:1:{i:87;i:1336569;}}i:1712767085;a:1:{s:5:\"ERROR\";a:1:{i:88;i:1368647;}}i:1712767121;a:1:{s:5:\"ERROR\";a:1:{i:89;i:1400725;}}i:1712767123;a:1:{s:5:\"ERROR\";a:1:{i:90;i:1432803;}}i:1712767124;a:1:{s:5:\"ERROR\";a:3:{i:91;i:1464881;i:92;i:1496959;i:93;i:1529037;}}i:1712767129;a:1:{s:5:\"ERROR\";a:1:{i:94;i:1561115;}}i:1712767131;a:1:{s:5:\"ERROR\";a:1:{i:95;i:1593193;}}i:1712853331;a:1:{s:5:\"ERROR\";a:1:{i:96;i:1625271;}}i:1712853333;a:1:{s:5:\"ERROR\";a:1:{i:97;i:1650512;}}i:1712853339;a:1:{s:5:\"ERROR\";a:1:{i:98;i:1675773;}}i:1712935454;a:1:{s:5:\"ERROR\";a:1:{i:99;i:1701927;}}i:1712935767;a:1:{s:5:\"ERROR\";a:1:{i:100;i:1728013;}}i:1712935774;a:1:{s:5:\"ERROR\";a:2:{i:101;i:1758709;i:102;i:1789405;}}i:1712935991;a:1:{s:5:\"ERROR\";a:1:{i:103;i:1820101;}}i:1712935992;a:1:{s:5:\"ERROR\";a:2:{i:104;i:1850797;i:105;i:1881493;}}i:1712936024;a:1:{s:5:\"ERROR\";a:1:{i:106;i:1912189;}}i:1712936027;a:1:{s:5:\"ERROR\";a:1:{i:107;i:1942885;}}i:1712936045;a:1:{s:5:\"ERROR\";a:1:{i:108;i:1973581;}}i:1712936054;a:1:{s:5:\"ERROR\";a:1:{i:109;i:2004277;}}i:1712936067;a:1:{s:5:\"ERROR\";a:1:{i:110;i:2034979;}}i:1712936068;a:1:{s:5:\"ERROR\";a:2:{i:111;i:2065677;i:112;i:2096375;}}i:1712936075;a:1:{s:5:\"ERROR\";a:1:{i:113;i:2127073;}}i:1712936078;a:1:{s:5:\"ERROR\";a:2:{i:114;i:2157774;i:115;i:2188475;}}i:1712936092;a:1:{s:5:\"ERROR\";a:1:{i:116;i:2219176;}}i:1712936298;a:1:{s:5:\"ERROR\";a:1:{i:117;i:2249877;}}i:1712936299;a:1:{s:5:\"ERROR\";a:2:{i:118;i:2280570;i:119;i:2311263;}}i:1712936300;a:1:{s:5:\"ERROR\";a:1:{i:120;i:2341956;}}i:1713362039;a:1:{s:5:\"ERROR\";a:1:{i:121;i:2372649;}}i:1713362044;a:1:{s:5:\"ERROR\";a:1:{i:122;i:2378238;}}i:1713362052;a:1:{s:5:\"ERROR\";a:1:{i:123;i:2383827;}}i:1713362073;a:1:{s:5:\"ERROR\";a:2:{i:124;i:2389416;i:125;i:2395005;}}i:1713362133;a:1:{s:5:\"ERROR\";a:2:{i:126;i:2400594;i:127;i:2406183;}}i:1713362193;a:1:{s:5:\"ERROR\";a:1:{i:128;i:2411772;}}i:1713362253;a:1:{s:5:\"ERROR\";a:2:{i:129;i:2417361;i:130;i:2422950;}}i:1713362313;a:1:{s:5:\"ERROR\";a:2:{i:131;i:2428539;i:132;i:2434128;}}i:1713362357;a:1:{s:5:\"ERROR\";a:1:{i:133;i:2439717;}}i:1713362362;a:1:{s:5:\"ERROR\";a:1:{i:134;i:2445981;}}i:1713872449;a:1:{s:5:\"ERROR\";a:1:{i:135;i:2452245;}}i:1713892599;a:1:{s:5:\"ERROR\";a:1:{i:136;i:2453499;}}i:1713892769;a:1:{s:5:\"ERROR\";a:1:{i:137;i:2482954;}}i:1713892895;a:1:{s:5:\"ERROR\";a:1:{i:138;i:2513571;}}i:1713892901;a:1:{s:5:\"ERROR\";a:2:{i:139;i:2542971;i:140;i:2572371;}}i:1713892964;a:1:{s:5:\"ERROR\";a:1:{i:141;i:2601771;}}i:1713892966;a:1:{s:5:\"ERROR\";a:1:{i:142;i:2631309;}}i:1713892975;a:1:{s:5:\"ERROR\";a:1:{i:143;i:2660847;}}i:1713892986;a:1:{s:5:\"ERROR\";a:1:{i:144;i:2690385;}}i:1713894870;a:1:{s:5:\"ERROR\";a:1:{i:145;i:2719923;}}i:1713894874;a:1:{s:5:\"ERROR\";a:1:{i:146;i:2745163;}}i:1713899189;a:1:{s:5:\"ERROR\";a:1:{i:147;i:2771322;}}i:1713899191;a:1:{s:5:\"ERROR\";a:1:{i:148;i:2800789;}}i:1713899192;a:1:{s:5:\"ERROR\";a:2:{i:149;i:2830256;i:150;i:2859723;}}i:1713899223;a:1:{s:5:\"ERROR\";a:2:{i:151;i:2889190;i:152;i:2918590;}}i:1713899255;a:1:{s:5:\"ERROR\";a:1:{i:153;i:2947990;}}i:1713899258;a:1:{s:5:\"ERROR\";a:1:{i:154;i:2977390;}}i:1713899320;a:1:{s:5:\"ERROR\";a:1:{i:155;i:3008950;}}i:1713899332;a:1:{s:5:\"ERROR\";a:1:{i:156;i:3040510;}}i:1713899341;a:1:{s:5:\"ERROR\";a:1:{i:157;i:3072070;}}i:1713899416;a:1:{s:5:\"ERROR\";a:1:{i:158;i:3103630;}}i:1713899431;a:1:{s:5:\"ERROR\";a:1:{i:159;i:3135190;}}i:1713899434;a:1:{s:5:\"ERROR\";a:1:{i:160;i:3164593;}}i:1713899435;a:1:{s:5:\"ERROR\";a:2:{i:161;i:3196153;i:162;i:3227713;}}i:1713899436;a:1:{s:5:\"ERROR\";a:1:{i:163;i:3259273;}}i:1713899450;a:1:{s:5:\"ERROR\";a:1:{i:164;i:3290833;}}i:1713899451;a:1:{s:5:\"ERROR\";a:2:{i:165;i:3320423;i:166;i:3350013;}}i:1713899461;a:1:{s:5:\"ERROR\";a:1:{i:167;i:3379603;}}i:1713899467;a:1:{s:5:\"ERROR\";a:1:{i:168;i:3411163;}}i:1713899531;a:1:{s:5:\"ERROR\";a:1:{i:169;i:3442723;}}i:1713899532;a:1:{s:5:\"ERROR\";a:2:{i:170;i:3474283;i:171;i:3505843;}}i:1714756104;a:1:{s:5:\"ERROR\";a:1:{i:172;i:3537403;}}i:1714756265;a:1:{s:5:\"ERROR\";a:1:{i:173;i:3542473;}}i:1714756394;a:1:{s:5:\"ERROR\";a:1:{i:174;i:3547543;}}i:1714756500;a:1:{s:5:\"ERROR\";a:1:{i:175;i:3552613;}}i:1714756549;a:1:{s:5:\"ERROR\";a:1:{i:176;i:3557683;}}i:1714756619;a:1:{s:5:\"ERROR\";a:1:{i:177;i:3562753;}}i:1714756853;a:1:{s:5:\"ERROR\";a:1:{i:178;i:3567823;}}i:1714761318;a:1:{s:5:\"ERROR\";a:1:{i:179;i:3572893;}}i:1714761478;a:1:{s:5:\"ERROR\";a:1:{i:180;i:3588896;}}i:1714761534;a:1:{s:5:\"ERROR\";a:1:{i:181;i:3604984;}}i:1714761645;a:1:{s:5:\"ERROR\";a:1:{i:182;i:3620987;}}i:1714761730;a:1:{s:5:\"ERROR\";a:1:{i:183;i:3636990;}}i:1714761856;a:1:{s:5:\"ERROR\";a:1:{i:184;i:3652991;}}i:1714762075;a:1:{s:5:\"ERROR\";a:1:{i:185;i:3668994;}}i:1714762086;a:1:{s:5:\"ERROR\";a:1:{i:186;i:3685088;}}i:1714762299;a:1:{s:5:\"ERROR\";a:1:{i:187;i:3701091;}}i:1714806515;a:1:{s:5:\"ERROR\";a:1:{i:188;i:3717161;}}i:1714806641;a:1:{s:5:\"ERROR\";a:1:{i:189;i:3725779;}}i:1714807403;a:1:{s:5:\"ERROR\";a:1:{i:190;i:3734397;}}i:1714807691;a:1:{s:5:\"ERROR\";a:1:{i:191;i:3739038;}}i:1714808221;a:1:{s:5:\"ERROR\";a:1:{i:192;i:3743679;}}i:1714812400;a:1:{s:5:\"ERROR\";a:1:{i:193;i:3748351;}}i:1714812777;a:1:{s:5:\"ERROR\";a:1:{i:194;i:3752992;}}i:1714814417;a:1:{s:5:\"ERROR\";a:1:{i:195;i:3757633;}}i:1714815424;a:1:{s:5:\"ERROR\";a:1:{i:196;i:3762274;}}i:1714815428;a:1:{s:5:\"ERROR\";a:1:{i:197;i:3769826;}}i:1714815438;a:1:{s:5:\"ERROR\";a:1:{i:198;i:3777378;}}i:1714815488;a:1:{s:5:\"ERROR\";a:2:{i:199;i:3784930;i:200;i:3792482;}}i:1714815505;a:1:{s:5:\"ERROR\";a:1:{i:201;i:3800034;}}i:1714815548;a:1:{s:5:\"ERROR\";a:2:{i:202;i:3807605;i:203;i:3815176;}}i:1714815588;a:1:{s:5:\"ERROR\";a:1:{i:204;i:3822747;}}i:1714815597;a:1:{s:5:\"ERROR\";a:1:{i:205;i:3828349;}}i:1714815608;a:1:{s:5:\"ERROR\";a:2:{i:206;i:3835920;i:207;i:3843491;}}i:1714815611;a:1:{s:5:\"ERROR\";a:1:{i:208;i:3851062;}}i:1714815635;a:1:{s:5:\"ERROR\";a:1:{i:209;i:3858633;}}i:1714815643;a:1:{s:5:\"ERROR\";a:1:{i:210;i:3864239;}}i:1714815650;a:1:{s:5:\"ERROR\";a:1:{i:211;i:3869861;}}i:1714815665;a:1:{s:5:\"ERROR\";a:1:{i:212;i:3875467;}}i:1714815668;a:1:{s:5:\"ERROR\";a:2:{i:213;i:3883038;i:214;i:3890609;}}i:1714815700;a:1:{s:5:\"ERROR\";a:1:{i:215;i:3898180;}}i:1714815717;a:1:{s:5:\"ERROR\";a:1:{i:216;i:3906205;}}i:1714815725;a:1:{s:5:\"ERROR\";a:1:{i:217;i:3914230;}}i:1714815728;a:1:{s:5:\"ERROR\";a:2:{i:218;i:3922255;i:219;i:3930280;}}i:1714815773;a:1:{s:5:\"ERROR\";a:1:{i:220;i:3938305;}}i:1714815786;a:1:{s:5:\"ERROR\";a:1:{i:221;i:3946330;}}i:1714815788;a:1:{s:5:\"ERROR\";a:2:{i:222;i:3954355;i:223;i:3962380;}}i:1714815793;a:1:{s:5:\"ERROR\";a:1:{i:224;i:3970405;}}i:1714815809;a:1:{s:5:\"ERROR\";a:1:{i:225;i:3978430;}}i:1714815848;a:1:{s:5:\"ERROR\";a:1:{i:226;i:3986455;}}i:1714815904;a:1:{s:5:\"ERROR\";a:1:{i:227;i:3994480;}}i:1714815906;a:1:{s:5:\"ERROR\";a:1:{i:228;i:4002505;}}i:1714815908;a:1:{s:5:\"ERROR\";a:2:{i:229;i:4010530;i:230;i:4018555;}}i:1714815944;a:1:{s:5:\"ERROR\";a:1:{i:231;i:4026580;}}i:1714821216;a:1:{s:5:\"ERROR\";a:1:{i:232;i:4034605;}}i:1714821288;a:1:{s:5:\"ERROR\";a:1:{i:233;i:4060819;}}i:1714821531;a:1:{s:4:\"INFO\";a:1:{i:234;i:4085895;}}i:1714821565;a:1:{s:4:\"INFO\";a:1:{i:235;i:4099298;}}i:1714821737;a:1:{s:4:\"INFO\";a:1:{i:236;i:4112701;}}i:1714821952;a:1:{s:4:\"INFO\";a:1:{i:237;i:4126104;}}i:1714821963;a:1:{s:4:\"INFO\";a:1:{i:238;i:4139507;}}i:1714821989;a:1:{s:4:\"INFO\";a:1:{i:239;i:4152910;}}}',1715426792),('lv:v3.8.1:file:01772ed1-laravel.log:ecf8427e:metadata','a:9:{s:5:\"query\";N;s:10:\"identifier\";s:8:\"ecf8427e\";s:26:\"last_scanned_file_position\";i:4166313;s:18:\"last_scanned_index\";i:240;s:24:\"next_log_index_to_create\";i:240;s:14:\"max_chunk_size\";i:50000;s:19:\"current_chunk_index\";i:0;s:17:\"chunk_definitions\";a:0:{}s:24:\"current_chunk_definition\";a:5:{s:5:\"index\";i:0;s:4:\"size\";i:240;s:18:\"earliest_timestamp\";i:1711776301;s:16:\"latest_timestamp\";i:1714821989;s:12:\"level_counts\";a:2:{s:5:\"ERROR\";i:234;s:4:\"INFO\";i:6;}}}',1715426792),('lv:v3.8.1:file:01772ed1-laravel.log:metadata','a:8:{s:4:\"type\";s:7:\"laravel\";s:4:\"name\";s:11:\"laravel.log\";s:4:\"path\";s:89:\"C:\\Users\\Nhan Nub\\Desktop\\Code\\PHP\\Web Developement\\clothes_shop\\storage\\logs\\laravel.log\";s:4:\"size\";i:4166313;s:18:\"earliest_timestamp\";i:1711776301;s:16:\"latest_timestamp\";i:1714821989;s:26:\"last_scanned_file_position\";i:4166313;s:15:\"related_indices\";a:1:{s:8:\"ecf8427e\";a:2:{s:5:\"query\";N;s:26:\"last_scanned_file_position\";i:4166313;}}}',1715426792);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_03_29_172454_add_two_factor_columns_to_users_table',1),(5,'2024_03_29_172510_create_personal_access_tokens_table',1),(6,'2024_03_30_094041_update_users_table',2),(7,'2024_05_03_162115_create_cache_table',0),(8,'2024_05_03_162115_create_cache_locks_table',0),(9,'2024_05_03_162115_create_cart_item_table',0),(10,'2024_05_03_162115_create_failed_jobs_table',0),(11,'2024_05_03_162115_create_job_batches_table',0),(12,'2024_05_03_162115_create_jobs_table',0),(13,'2024_05_03_162115_create_order_details_table',0),(14,'2024_05_03_162115_create_orders_table',0),(15,'2024_05_03_162115_create_password_reset_tokens_table',0),(16,'2024_05_03_162115_create_payment_details_table',0),(17,'2024_05_03_162115_create_personal_access_tokens_table',0),(18,'2024_05_03_162115_create_product_table',0),(19,'2024_05_03_162115_create_product_category_table',0),(20,'2024_05_03_162115_create_product_variants_table',0),(21,'2024_05_03_162115_create_sessions_table',0),(22,'2024_05_03_162115_create_user_address_table',0),(23,'2024_05_03_162115_create_user_roles_table',0),(24,'2024_05_03_162115_create_users_table',0),(25,'2024_05_03_162118_add_foreign_keys_to_cart_item_table',0),(26,'2024_05_03_162118_add_foreign_keys_to_order_details_table',0),(27,'2024_05_03_162118_add_foreign_keys_to_orders_table',0),(28,'2024_05_03_162118_add_foreign_keys_to_payment_details_table',0),(29,'2024_05_03_162118_add_foreign_keys_to_product_table',0),(30,'2024_05_03_162118_add_foreign_keys_to_product_variants_table',0),(31,'2024_05_03_162118_add_foreign_keys_to_user_address_table',0),(32,'2024_05_03_165914_create_cache_table',0),(33,'2024_05_03_165914_create_cache_locks_table',0),(34,'2024_05_03_165914_create_cart_item_table',0),(35,'2024_05_03_165914_create_failed_jobs_table',0),(36,'2024_05_03_165914_create_job_batches_table',0),(37,'2024_05_03_165914_create_jobs_table',0),(38,'2024_05_03_165914_create_order_details_table',0),(39,'2024_05_03_165914_create_orders_table',0),(40,'2024_05_03_165914_create_password_reset_tokens_table',0),(41,'2024_05_03_165914_create_payment_details_table',0),(42,'2024_05_03_165914_create_personal_access_tokens_table',0),(43,'2024_05_03_165914_create_product_table',0),(44,'2024_05_03_165914_create_product_category_table',0),(45,'2024_05_03_165914_create_product_variants_table',0),(46,'2024_05_03_165914_create_sessions_table',0),(47,'2024_05_03_165914_create_user_address_table',0),(48,'2024_05_03_165914_create_user_roles_table',0),(49,'2024_05_03_165914_create_users_table',0),(50,'2024_05_03_165917_add_foreign_keys_to_cart_item_table',0),(51,'2024_05_03_165917_add_foreign_keys_to_order_details_table',0),(52,'2024_05_03_165917_add_foreign_keys_to_orders_table',0),(53,'2024_05_03_165917_add_foreign_keys_to_payment_details_table',0),(54,'2024_05_03_165917_add_foreign_keys_to_product_table',0),(55,'2024_05_03_165917_add_foreign_keys_to_product_variants_table',0),(56,'2024_05_03_165917_add_foreign_keys_to_user_address_table',0),(57,'2024_05_03_174304_create_cache_table',0),(58,'2024_05_03_174304_create_cache_locks_table',0),(59,'2024_05_03_174304_create_cart_item_table',0),(60,'2024_05_03_174304_create_failed_jobs_table',0),(61,'2024_05_03_174304_create_job_batches_table',0),(62,'2024_05_03_174304_create_jobs_table',0),(63,'2024_05_03_174304_create_order_details_table',0),(64,'2024_05_03_174304_create_orders_table',0),(65,'2024_05_03_174304_create_password_reset_tokens_table',0),(66,'2024_05_03_174304_create_payment_details_table',0),(67,'2024_05_03_174304_create_personal_access_tokens_table',0),(68,'2024_05_03_174304_create_product_table',0),(69,'2024_05_03_174304_create_product_category_table',0),(70,'2024_05_03_174304_create_product_variants_table',0),(71,'2024_05_03_174304_create_sessions_table',0),(72,'2024_05_03_174304_create_user_address_table',0),(73,'2024_05_03_174304_create_user_roles_table',0),(74,'2024_05_03_174304_create_users_table',0),(75,'2024_05_03_174307_add_foreign_keys_to_cart_item_table',0),(76,'2024_05_03_174307_add_foreign_keys_to_order_details_table',0),(77,'2024_05_03_174307_add_foreign_keys_to_orders_table',0),(78,'2024_05_03_174307_add_foreign_keys_to_payment_details_table',0),(79,'2024_05_03_174307_add_foreign_keys_to_product_table',0),(80,'2024_05_03_174307_add_foreign_keys_to_product_variants_table',0),(81,'2024_05_03_174307_add_foreign_keys_to_user_address_table',0),(82,'2024_05_03_174307_add_foreign_keys_to_users_table',0),(83,'2024_05_03_174816_create_cache_table',0),(84,'2024_05_03_174816_create_cache_locks_table',0),(85,'2024_05_03_174816_create_cart_item_table',0),(86,'2024_05_03_174816_create_failed_jobs_table',0),(87,'2024_05_03_174816_create_job_batches_table',0),(88,'2024_05_03_174816_create_jobs_table',0),(89,'2024_05_03_174816_create_order_details_table',0),(90,'2024_05_03_174816_create_orders_table',0),(91,'2024_05_03_174816_create_password_reset_tokens_table',0),(92,'2024_05_03_174816_create_payment_details_table',0),(93,'2024_05_03_174816_create_personal_access_tokens_table',0),(94,'2024_05_03_174816_create_product_table',0),(95,'2024_05_03_174816_create_product_category_table',0),(96,'2024_05_03_174816_create_product_variants_table',0),(97,'2024_05_03_174816_create_sessions_table',0),(98,'2024_05_03_174816_create_user_address_table',0),(99,'2024_05_03_174816_create_user_roles_table',0),(100,'2024_05_03_174816_create_users_table',0),(101,'2024_05_03_174819_add_foreign_keys_to_cart_item_table',0),(102,'2024_05_03_174819_add_foreign_keys_to_order_details_table',0),(103,'2024_05_03_174819_add_foreign_keys_to_orders_table',0),(104,'2024_05_03_174819_add_foreign_keys_to_payment_details_table',0),(105,'2024_05_03_174819_add_foreign_keys_to_product_table',0),(106,'2024_05_03_174819_add_foreign_keys_to_product_variants_table',0),(107,'2024_05_03_174819_add_foreign_keys_to_user_address_table',0),(108,'2024_05_03_174819_add_foreign_keys_to_users_table',0),(109,'2024_05_03_185056_create_products_table',0),(110,'2024_05_03_185059_add_foreign_keys_to_products_table',0),(111,'2024_05_03_183230_create_product_images_table',3),(112,'2024_05_04_043456_create_clothes_shop_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_variant_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_variant_id` (`product_variant_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

--
-- Table structure for table `payment_details`
--

DROP TABLE IF EXISTS `payment_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_details`
--

/*!40000 ALTER TABLE `payment_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_details` ENABLE KEYS */;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parent_id` (`parent_id`),
  CONSTRAINT `fk_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `product_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Men',NULL,'2024-05-03 18:03:11','2024-05-03 19:51:42',NULL,NULL),(2,'Women',NULL,'2024-05-03 18:03:11','2024-05-03 20:55:10',NULL,NULL),(6,'T-Shirt','Comfortable and casual wear.','2024-05-03 19:59:14','2024-05-03 19:59:14',NULL,1),(7,'Handbag','Elegant and stylish handbags for any occasion.','2024-05-03 19:59:14','2024-05-03 19:59:14',NULL,1),(8,'Jacket','Durable outerwear for all seasons.','2024-05-03 19:59:14','2024-05-03 19:59:14',NULL,1),(9,'Watch','Precision timepieces for timeless elegance.','2024-05-03 19:59:14','2024-05-03 19:59:14',NULL,1),(10,'Hat','Trendy hats to complement any outfit.','2024-05-03 19:59:14','2024-05-03 19:59:14',NULL,1),(11,'T-Shirt','Comfortable and casual wear.','2024-05-03 20:00:33','2024-05-03 20:00:33',NULL,2),(12,'Handbag','Elegant and stylish handbags for any occasion.','2024-05-03 20:00:33','2024-05-03 20:00:33',NULL,2),(13,'Jacket','Durable outerwear for all seasons.','2024-05-03 20:00:33','2024-05-03 20:00:33',NULL,2),(14,'Watch','Precision timepieces for timeless elegance.','2024-05-03 20:00:33','2024-05-03 20:00:33',NULL,2),(15,'Hat','Trendy hats to complement any outfit.','2024-05-03 20:00:33','2024-05-03 20:00:33',NULL,2);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;

--
-- Table structure for table `product_colors`
--

DROP TABLE IF EXISTS `product_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_colors`
--

/*!40000 ALTER TABLE `product_colors` DISABLE KEYS */;
INSERT INTO `product_colors` VALUES (1,'black'),(2,'white'),(3,'gray'),(4,'beige'),(5,'brown');
/*!40000 ALTER TABLE `product_colors` ENABLE KEYS */;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,13,'storage/products/women/t_shirts/8_ball_tee_1.jpg','2024-05-03 20:32:25','2024-05-03 20:32:25'),(2,13,'storage/products/women/t_shirts/8_ball_tee_2.jpg','2024-05-03 20:32:25','2024-05-03 20:32:25'),(3,13,'storage/products/women/t_shirts/8_ball_tee_3.jpg','2024-05-03 20:32:25','2024-05-03 20:32:25'),(4,13,'storage/products/women/t_shirts/8_ball_tee_4.jpg','2024-05-03 20:32:25','2024-05-03 20:32:25'),(5,14,'storage/products/women/t_shirts/street_grafity_1.jpg','2024-05-03 20:32:25','2024-05-03 20:32:25'),(6,14,'storage/products/women/t_shirts/street_grafity_2.jpg','2024-05-03 20:32:25','2024-05-03 20:32:25'),(7,14,'storage/products/women/t_shirts/street_grafity_3.jpg','2024-05-03 20:32:25','2024-05-03 20:32:25'),(8,14,'storage/products/women/t_shirts/street_grafity_4.jpg','2024-05-03 20:32:25','2024-05-03 20:32:25'),(9,9,'storage/products/women/handbags/hearteu_bag_1.jpg','2024-05-03 20:32:27','2024-05-03 20:32:27'),(10,9,'storage/products/women/handbags/hearteu_bag_2.jpg','2024-05-03 20:32:27','2024-05-03 20:32:27'),(11,9,'storage/products/women/handbags/hearteu_bag_3.jpg','2024-05-03 20:32:27','2024-05-03 20:32:27'),(12,9,'storage/products/women/handbags/hearteu_bag_4.jpg','2024-05-03 20:32:27','2024-05-03 20:32:27'),(13,8,'storage/products/women/watches/luna_elegance_watch_1.jpg','2024-05-03 20:32:30','2024-05-03 20:32:30'),(14,8,'storage/products/women/watches/luna_elegance_watch_2.jpg','2024-05-03 20:32:30','2024-05-03 20:32:30'),(15,8,'storage/products/women/watches/luna_elegance_watch_3.jpg','2024-05-03 20:32:30','2024-05-03 20:32:30'),(16,8,'storage/products/women/watches/luna_elegance_watch_4.jpg','2024-05-03 20:32:30','2024-05-03 20:32:30'),(17,11,'storage/products/women/hats/losangeless_cap_1.jpg','2024-05-03 20:32:31','2024-05-03 20:32:31'),(18,11,'storage/products/women/hats/losangeless_cap_2.jpg','2024-05-03 20:32:31','2024-05-03 20:32:31'),(19,11,'storage/products/women/hats/losangeless_cap_3.jpg','2024-05-03 20:32:31','2024-05-03 20:32:31'),(20,11,'storage/products/women/hats/losangeless_cap_4.jpg','2024-05-03 20:32:31','2024-05-03 20:32:31'),(21,10,'storage/products/women/jackets/baddie_jacket_1.jpg','2024-05-03 20:34:45','2024-05-03 20:34:45'),(22,10,'storage/products/women/jackets/baddie_jacket_2.jpg','2024-05-03 20:34:45','2024-05-03 20:34:45'),(23,10,'storage/products/women/jackets/baddie_jacket_3.jpg','2024-05-03 20:34:45','2024-05-03 20:34:45'),(24,10,'storage/products/women/jackets/baddie_jacket_4.jpg','2024-05-03 20:34:45','2024-05-03 20:34:45'),(25,12,'storage/products/women/jackets/fluffy_fox_fur_jacket_1.jpg','2024-05-03 20:34:46','2024-05-03 20:34:46'),(26,12,'storage/products/women/jackets/fluffy_fox_fur_jacket_2.jpg','2024-05-03 20:34:46','2024-05-03 20:34:46'),(27,12,'storage/products/women/jackets/fluffy_fox_fur_jacket_3.jpg','2024-05-03 20:34:46','2024-05-03 20:34:46'),(28,12,'storage/products/women/jackets/fluffy_fox_fur_jacket_4.jpg','2024-05-03 20:34:46','2024-05-03 20:34:46'),(29,1,'storage/products/men/t_shirts/tee_dont_loose_your_head_1.jpg','2024-05-03 20:42:24','2024-05-03 20:42:24'),(30,1,'storage/products/men/t_shirts/tee_dont_loose_your_head_2.jpg','2024-05-03 20:42:24','2024-05-03 20:42:24'),(31,1,'storage/products/men/t_shirts/tee_dont_loose_your_head_3.jpg','2024-05-03 20:42:24','2024-05-03 20:42:24'),(32,1,'storage/products/men/t_shirts/tee_dont_loose_your_head_4.jpg','2024-05-03 20:42:24','2024-05-03 20:42:24'),(33,2,'storage/products/men/t_shirts/tee_vault_tec_1.jpg','2024-05-03 20:42:24','2024-05-03 20:42:24'),(34,2,'storage/products/men/t_shirts/tee_vault_tec_2.jpg','2024-05-03 20:42:24','2024-05-03 20:42:24'),(35,2,'storage/products/men/t_shirts/tee_vault_tec_3.jpg','2024-05-03 20:42:24','2024-05-03 20:42:24'),(36,2,'storage/products/men/t_shirts/tee_vault_tec_4.jpg','2024-05-03 20:42:24','2024-05-03 20:42:24'),(37,4,'storage/products/men/watches/serenity_timepiece_watch_1.jpg','2024-05-03 20:44:35','2024-05-03 20:44:35'),(38,4,'storage/products/men/watches/serenity_timepiece_watch_2.jpg','2024-05-03 20:44:35','2024-05-03 20:44:35'),(39,4,'storage/products/men/watches/serenity_timepiece_watch_3.jpg','2024-05-03 20:44:35','2024-05-03 20:44:35'),(40,4,'storage/products/men/watches/serenity_timepiece_watch_4.jpg','2024-05-03 20:44:35','2024-05-03 20:44:35'),(41,3,'storage/products/men/handbags/basic_leather_bag_1.jpg','2024-05-03 20:46:06','2024-05-03 20:46:06'),(42,3,'storage/products/men/handbags/basic_leather_bag_2.jpg','2024-05-03 20:46:06','2024-05-03 20:46:06'),(43,3,'storage/products/men/handbags/basic_leather_bag_3.jpg','2024-05-03 20:46:06','2024-05-03 20:46:06'),(44,3,'storage/products/men/handbags/basic_leather_bag_4.jpg','2024-05-03 20:46:06','2024-05-03 20:46:06'),(45,7,'storage/products/men/hats/denim_beanie_1.jpg','2024-05-03 20:48:02','2024-05-03 20:48:02'),(46,7,'storage/products/men/hats/denim_beanie_2.jpg','2024-05-03 20:48:02','2024-05-03 20:48:02'),(47,7,'storage/products/men/hats/denim_beanie_3.jpg','2024-05-03 20:48:02','2024-05-03 20:48:02'),(48,7,'storage/products/men/hats/denim_beanie_4.jpg','2024-05-03 20:48:02','2024-05-03 20:48:02'),(49,5,'storage/products/men/jackets/denim_jacket_1.jpg','2024-05-03 20:50:04','2024-05-03 20:50:04'),(50,5,'storage/products/men/jackets/denim_jacket_2.jpg','2024-05-03 20:50:04','2024-05-03 20:50:04'),(51,5,'storage/products/men/jackets/denim_jacket_3.jpg','2024-05-03 20:50:04','2024-05-03 20:50:04'),(52,5,'storage/products/men/jackets/denim_jacket_4.jpg','2024-05-03 20:50:04','2024-05-03 20:50:04'),(53,6,'storage/products/men/jackets/shadow_denim_jacket_1.jpg','2024-05-03 20:50:04','2024-05-03 20:50:04'),(54,6,'storage/products/men/jackets/shadow_denim_jacket_2.jpg','2024-05-03 20:50:04','2024-05-03 20:50:04'),(55,6,'storage/products/men/jackets/shadow_denim_jacket_3.jpg','2024-05-03 20:50:04','2024-05-03 20:50:04'),(56,6,'storage/products/men/jackets/shadow_denim_jacket_4.jpg','2024-05-03 20:50:04','2024-05-03 20:50:04');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;

--
-- Table structure for table `product_sizes`
--

DROP TABLE IF EXISTS `product_sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size_description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sizes`
--

/*!40000 ALTER TABLE `product_sizes` DISABLE KEYS */;
INSERT INTO `product_sizes` VALUES (1,'S'),(2,'M'),(3,'L'),(4,'XL');
/*!40000 ALTER TABLE `product_sizes` ENABLE KEYS */;

--
-- Table structure for table `product_variants`
--

DROP TABLE IF EXISTS `product_variants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `product_id_idx` (`product_id`),
  KEY `size_id_idx` (`size_id`),
  KEY `color_id_idx` (`color_id`),
  CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_variants_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `product_sizes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `product_variants_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_variants`
--

/*!40000 ALTER TABLE `product_variants` DISABLE KEYS */;
INSERT INTO `product_variants` VALUES (1,1,1,1,0),(2,1,1,2,0),(3,1,1,3,0),(4,1,1,4,0),(5,1,1,5,0),(6,1,2,1,0),(7,1,2,2,0),(8,1,2,3,0),(9,1,2,4,0),(10,1,2,5,0),(11,1,3,1,0),(12,1,3,2,0),(13,1,3,3,0),(14,1,3,4,0),(15,1,3,5,0),(16,1,4,1,0),(17,1,4,2,0),(18,1,4,3,0),(19,1,4,4,0),(20,1,4,5,0),(21,2,1,1,0),(22,2,1,2,0),(23,2,1,3,0),(24,2,1,4,0),(25,2,1,5,0),(26,2,2,1,0),(27,2,2,2,0),(28,2,2,3,0),(29,2,2,4,0),(30,2,2,5,0),(31,2,3,1,0),(32,2,3,2,0),(33,2,3,3,0),(34,2,3,4,0),(35,2,3,5,0),(36,2,4,1,0),(37,2,4,2,0),(38,2,4,3,0),(39,2,4,4,0),(40,2,4,5,0),(41,13,1,1,0),(42,13,1,2,0),(43,13,1,3,0),(44,13,1,4,0),(45,13,1,5,0),(46,13,2,1,0),(47,13,2,2,0),(48,13,2,3,0),(49,13,2,4,0),(50,13,2,5,0),(51,13,3,1,0),(52,13,3,2,0),(53,13,3,3,0),(54,13,3,4,0),(55,13,3,5,0),(56,13,4,1,0),(57,13,4,2,0),(58,13,4,3,0),(59,13,4,4,0),(60,13,4,5,0),(61,14,1,1,0),(62,14,1,2,0),(63,14,1,3,0),(64,14,1,4,0),(65,14,1,5,0),(66,14,2,1,0),(67,14,2,2,0),(68,14,2,3,0),(69,14,2,4,0),(70,14,2,5,0),(71,14,3,1,0),(72,14,3,2,0),(73,14,3,3,0),(74,14,3,4,0),(75,14,3,5,0),(76,14,4,1,0),(77,14,4,2,0),(78,14,4,3,0),(79,14,4,4,0),(80,14,4,5,0),(81,7,NULL,1,0),(82,7,NULL,2,0),(83,7,NULL,3,0),(84,7,NULL,4,0),(85,7,NULL,5,0),(86,11,NULL,1,0),(87,11,NULL,2,0),(88,11,NULL,3,0),(89,11,NULL,4,0),(90,11,NULL,5,0);
/*!40000 ALTER TABLE `product_variants` ENABLE KEYS */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Don\'t Loose Your Head Tee','A stylish and comfortable men\'s t-shirt with a unique print.',6,19.99,'2024-05-03 20:08:03','2024-05-04 11:28:59',NULL),(2,'Vault Tec Tee','Perfect for everyday wear, this t-shirt offers both comfort and style.',6,19.99,'2024-05-03 20:08:03','2024-05-04 11:28:59',NULL),(3,'Basic Leather Bag','A durable and stylish leather handbag perfect for any occasion.',7,49.99,'2024-05-03 20:10:08','2024-05-03 20:10:08',NULL),(4,'Serenity Timepiece Watch','An elegant and precise watch for timeless style.',9,120.00,'2024-05-03 20:11:15','2024-05-03 20:11:15',NULL),(5,'Denim Jacket','A classic denim jacket perfect for casual outings.',8,39.99,'2024-05-03 20:13:17','2024-05-03 20:13:17',NULL),(6,'Shadow Denim Jacket','A trendy denim jacket with a unique shadow wash effect.',8,49.99,'2024-05-03 20:13:17','2024-05-03 20:13:17',NULL),(7,'Denim Beanie','A stylish denim beanie perfect for any season.',10,15.00,'2024-05-03 20:14:51','2024-05-03 20:23:41',NULL),(8,'Luna Elegance Watch','A sophisticated timepiece to enhance your daily style.',14,149.99,'2024-05-03 20:20:15','2024-05-03 20:23:42',NULL),(9,'Hearteu Bag','The perfect blend of elegance and practicality in a stylish bag.',12,80.00,'2024-05-03 20:20:15','2024-05-03 20:23:41',NULL),(10,'Baddie Jacket','Edge and style meet in this essential jacket for every wardrobe.',13,89.99,'2024-05-03 20:20:15','2024-05-03 20:23:41',NULL),(11,'Losangeless Cap','Cap off your look with this trendy and functional headwear.',15,30.00,'2024-05-03 20:20:15','2024-05-03 20:20:15',NULL),(12,'Fluffy Fox Fur Jacket','Ultimate luxury and warmth in a fluffy fox fur jacket.',13,99.99,'2024-05-03 20:20:15','2024-05-03 20:23:41',NULL),(13,'8 Ball Tee','A bold graphic tee featuring an eye-catching 8-ball design.',11,29.99,'2024-05-03 20:20:47','2024-05-03 20:20:47',NULL),(14,'Street Graffiti Tee','Urban-inspired T-shirt with a vibrant street graffiti design.',11,29.99,'2024-05-03 20:20:47','2024-05-03 20:20:47',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('oYpexDwM00zV58sJ2lMWeF5o5DZbhB54wn9Jl86r',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoicnZlRU91QmxyTDZWNlh4TFhNbU54SXpWbUhHb2VxV1FMWjdVRTNraiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2ctdmlld2VyP2ZpbGU9MDE3NzJlZDEtbGFyYXZlbC5sb2ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjMxOiJsb2ctdmlld2VyOnNob3J0ZXItc3RhY2stdHJhY2VzIjtiOjA7fQ==',1714821993);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

--
-- Table structure for table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(12) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_addresses`
--

/*!40000 ALTER TABLE `user_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_addresses` ENABLE KEYS */;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_ibfk_1` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Dumping routines for database 'clothes_shop'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-04 18:29:11
