-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-04-07 16:30:31
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
(1, '舒跑', 20, '運動飲料\r\n	', '1.jpg', 1),
(2, '麥香奶茶', 10, '奶茶', '2.jpg', 0),
(3, '綠茶', 20, '茶裏王台式綠茶', '3.jpg', 0),
(4, '黑松沙士', 15, '', '4.jpeg', 0),
(5, '可口可樂', 29, '', '5.jpg', 0),
(6, '雪碧', 29, '', '6.jpg', 0),
(7, 'test', 0, '測試方塊\r\n	', '', 1),
(8, '養樂多', 10, '', '8.jpg', 0),
(9, '波蜜', 10, '果菜汁', '9.jpg', 0),
(10, 'Red_Bull', 69, '給你一對翅膀', '10.png', 0),
(11, '美錄', 20, 'Made by Malaysia', '11.jpg', 0),
(12, '芬達', 29, '', '12.png', 0),
(13, '紅茶', 10, '極品的麥香紅茶', '13.jpg', 1),
(14, '阿華田', 35, '巧克力風味飲', '14.jpg', 0),
(15, 'FIN', 20, '不含手', '15.jpg', 0),
(16, '梅子綠茶', 20, '', '', 1),
(17, '檸檬紅茶', 20, '', '', 1),
(18, '百香綠茶', 20, '', '', 1),
(19, '蘋果紅茶', 20, '', '', 1),
(20, '麥茶', 20, '', '', 1),
(21, '咖啡', 30, '', '', 1),
(22, '花生牛奶', 35, '', '', 0),
(23, '八寶粥', 30, '泰山八寶粥', '23.jpg', 0),
(24, 'QOO', 35, '', '24.jpg', 0);

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
  `order_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `order_form`
--

INSERT INTO `order_form` (`order_id`, `order_member_id`, `order_member_name`, `order_item_id`, `order_item_name`, `order_item_price`, `order_quantity`, `order_subtotal`, `order_total`, `order_time`, `order_status`) VALUES
(1, 2, '羅少呈', 22, '花生牛奶', 35, 3, 105, 105, '2018-01-16 17:11:01', 2),
(2, 9, '測試員', 1, '舒跑', 20, 1, 20, 20, '2018-01-17 04:21:31', 2),
(3, 9, '測試員', 2, '麥香奶茶', 10, 3, 30, 30, '2018-01-17 05:12:09', 2),
(4, 6, 'der', 1, '舒跑', 20, 3, 60, 60, '2018-01-17 05:16:06', 2),
(5, 6, 'der', 2, '麥香奶茶', 10, 2, 20, 20, '2018-01-17 05:13:45', 2),
(6, 6, 'der', 10, 'Red_Bull', 69, 2, 138, 138, '2018-01-17 05:23:32', 1),
(7, 6, 'der', 12, '芬達', 29, 3, 87, 87, '2018-01-17 10:50:45', 2),
(8, 1, '彭稟皓', 3, '綠茶', 20, 2, 40, 69, '2018-01-17 11:24:18', 2),
(8, 1, '彭稟皓', 5, '可口可樂', 29, 1, 29, 69, '2018-01-17 11:24:18', 2),
(9, 7, 'a99859985', 10, 'Red_Bull', 69, 2, 138, 208, '2018-01-17 11:24:45', 1),
(9, 7, 'a99859985', 22, '花生牛奶', 35, 2, 70, 208, '2018-01-17 11:24:45', 1),
(10, 6, 'der', 1, '舒跑', 20, 3, 60, 618, '2018-01-17 15:53:51', 2),
(10, 6, 'der', 4, '黑松沙士', 15, 5, 75, 618, '2018-01-17 15:53:52', 2),
(10, 6, 'der', 10, 'Red_Bull', 69, 7, 483, 618, '2018-01-17 15:53:52', 2),
(11, 3, '王尊鴻', 12, '芬達', 29, 2, 58, 93, '2018-01-17 16:04:34', 0),
(11, 3, '王尊鴻', 14, '阿華田', 35, 1, 35, 93, '2018-01-17 16:04:34', 0),
(12, 1, '彭稟皓', 23, '八寶粥', 30, 5, 150, 150, '2018-01-17 17:12:42', 0),
(13, 1, '彭稟皓', 1, '舒跑', 20, 1, 20, 40, '2018-01-17 19:40:23', 0),
(13, 1, '彭稟皓', 15, 'FIN', 20, 1, 20, 40, '2018-01-17 19:40:23', 0),
(14, 1, '彭稟皓', 5, '可口可樂', 29, 1, 29, 87, '2018-01-17 19:41:16', 0),
(14, 1, '彭稟皓', 6, '雪碧', 29, 1, 29, 87, '2018-01-17 19:41:16', 0),
(14, 1, '彭稟皓', 12, '芬達', 29, 1, 29, 87, '2018-01-17 19:41:16', 0),
(15, 1, '彭稟皓', 24, 'QOO', 35, 1, 35, 35, '2018-01-17 20:24:01', 0),
(16, 1, '彭稟皓', 2, '麥香奶茶', 10, 3, 30, 45, '2018-01-18 02:13:35', 0),
(16, 1, '彭稟皓', 4, '黑松沙士', 15, 1, 15, 45, '2018-01-18 02:13:35', 0);

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
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
