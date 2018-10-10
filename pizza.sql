-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-05-28 19:13:52
-- 伺服器版本: 10.1.26-MariaDB
-- PHP 版本： 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `pizza`
--

-- --------------------------------------------------------

--
-- 資料表結構 `item`
--

CREATE TABLE `item` (
  `item_id` int(10) NOT NULL,
  `item_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `item_price` int(10) NOT NULL,
  `item_info` varchar(100) COLLATE utf8_bin NOT NULL,
  `item_img` varchar(10) COLLATE utf8_bin NOT NULL,
  `item_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_info`, `item_img`, `item_status`) VALUES
(1, '夏威夷', 300, '鳳梨、火腿', '1.jpg', 0),
(2, '燻雞蘑菇', 350, '燻雞絲、玉米、蘑菇、洋蔥', '2.jpg', 0),
(3, '蔬菜蘑菇', 300, '青花菜、鮑魚菇、蘑菇、紅椒、BBQ素醬', '3.jpg', 0),
(4, '海陸大餐', 400, 'BBQ烤肉醬、魷魚、青花菜、甜紅椒、韓國烤肉片', '4.jpg', 0),
(5, '鐵板牛柳', 450, '牛肉、青椒、洋蔥、蘑菇、黑胡椒醬', '5.jpg', 0),
(6, '豪華海鮮', 400, '鮮蝦、蟹味絲、魷魚、青豆', '6.jpg', 0),
(7, '超級總匯', 500, '義大利肉腸、美式臘腸、豬肉、牛肉、蘑菇、火腿、洋蔥、青椒、黑橄欖', '7.jpg', 0),
(8, '章魚燒', 400, '章魚、魷魚、甜不辣、青椒、海苔、洋蔥、美乃滋、照燒醬、芝麻、柴魚', '8.jpg', 0),
(9, '法式海鮮', 450, '法蘭西海鮮白醬、鮮蝦、蟹肉棒、洋蔥、巴西里葉、鮑魚菇', '9.jpg', 0),
(10, '壽喜燒', 500, '雪花牛肉、壽喜醬、蛋絲、杏鮑菇、洋蔥絲、紅椒丁、洋香菜葉', '10.jpg', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL,
  `account` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 NOT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `sex` varchar(2) COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='會員資料';

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`id`, `account`, `password`, `name`, `sex`, `phone`, `address`, `email`, `status`) VALUES
(1, 'Ben', '99859985', '彭稟皓', '男', '0939966115', '新竹市經國路二段173號4樓', 'a9985998522@gmail.com', 0),
(2, 'iam8787', '12345', '羅少呈', '男', '0912345678', '天龍國屈臣市過馬路666號', 'omg87@gmail.com', 0),
(3, 'iamyellow', '696969', '王尊鴻', '男', '0987654321', '苗栗國雞排鄉8787號', 'WTF@gmail.com', 0),
(4, 'labaoshan', '81000', '郭俊佑', '男', '0952775277', '舊北市紅燈區看個路69號', 'ilovemoney@gmail.com', 0),
(5, '555', '555445', '5554546', '男', '4564564564', '', '', 0),
(6, 'GG', 'inin', 'der', '女', '0955660668', '', '', 0),
(7, 'a99859985', 'a99859985', 'a99859985', '男', '0999859985', '9985998', '99859985', 0),
(8, 'b99859985', 'b99859985', 'b99859985', '女', '0988748874', '', '', 0),
(9, 'test', 'test', '測試員', '女', 'test', 'test', 'test', 0),
(10, 'iam9453', 'iam9453', '阿鬆', '女', '0994539453', '中華民國', 'iam9453@gmail.com', 0),
(11, 'Bang', 'bangbang', '大BANG哥', '男', '09BANGBANG', '湖南省北京路33段5弄30樓', 'bang123@gmail.com', 0),
(12, 'zxc456', 'zxc456', '孔乙己', '男', '0912312312', '', '', 0),
(13, 'zxc123', 'zxc123', '孔甲己', '男', '0912312312', '', '', 1),
(14, 'qwe123', 'qwe123', '孔方兄', '男', '0988888888', '大清帝國走錯時代', '', 1),
(15, '123qwe', '123ewq', '找不到', '男', '0911111111', '員林街', 'comegetme@wtf.com.tw', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `order_form`
--

CREATE TABLE `order_form` (
  `order_id` int(10) NOT NULL,
  `order_member_id` int(10) NOT NULL,
  `order_member_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `order_item_id` int(10) NOT NULL,
  `order_item_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `order_item_price` int(10) NOT NULL,
  `order_quantity` int(10) NOT NULL,
  `order_subtotal` int(10) NOT NULL,
  `order_total` int(10) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` int(2) NOT NULL,
  `order_kind` int(2) NOT NULL,
  `order_cheese` int(2) NOT NULL,
  `order_note` varchar(200) COLLATE utf8_bin NOT NULL,
  `order_way` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `order_form`
--

INSERT INTO `order_form` (`order_id`, `order_member_id`, `order_member_name`, `order_item_id`, `order_item_name`, `order_item_price`, `order_quantity`, `order_subtotal`, `order_total`, `order_time`, `order_status`, `order_kind`, `order_cheese`, `order_note`, `order_way`) VALUES
(1, 9, '測試員', 1, '夏威夷', 300, 2, 760, 1740, '2018-04-08 15:38:50', 2, 0, 1, '加辣', 0),
(1, 9, '測試員', 4, '海陸大餐', 400, 1, 400, 1740, '2018-04-08 15:38:50', 2, 1, 0, '加辣', 0),
(1, 9, '測試員', 7, '超級總匯', 500, 1, 580, 1740, '2018-04-08 15:38:50', 2, 2, 0, '加辣', 0),
(2, 9, '測試員', 1, '夏威夷', 300, 1, 460, 910, '2018-04-08 15:42:13', 3, 2, 1, '不要切不要加醬', 1),
(2, 9, '測試員', 9, '法式海鮮', 450, 1, 450, 910, '2018-04-08 15:42:13', 3, 0, 0, '不要切不要加醬', 1),
(3, 7, 'a99859985', 8, '章魚燒', 400, 1, 560, 560, '2018-04-08 16:09:57', 0, 2, 1, '', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_form`
--
ALTER TABLE `order_form`
  ADD PRIMARY KEY (`order_id`,`order_member_id`,`order_item_id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `order_member_id` (`order_member_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `order_form`
--
ALTER TABLE `order_form`
  ADD CONSTRAINT `order_form_ibfk_1` FOREIGN KEY (`order_item_id`) REFERENCES `item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_form_ibfk_2` FOREIGN KEY (`order_member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
