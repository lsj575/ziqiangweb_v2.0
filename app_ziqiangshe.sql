-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-08-03 14:54:18
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app_ziqiangshe`
--
CREATE DATABASE IF NOT EXISTS `app_ziqiangshe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `app_ziqiangshe`;

-- --------------------------------------------------------

--
-- 表的结构 `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `authorid` int(11) DEFAULT NULL,
  `tag` varchar(80) DEFAULT NULL COMMENT '标签',
  `summary` text,
  `content` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pageview` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='博客表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `blog`
--

INSERT INTO `blog` (`id`, `title`, `authorid`, `tag`, `summary`, `content`, `created`, `pageview`) VALUES
(1, 'xzf', 1, '杂谈', '这是一篇测试的博客', '<p>good nice<img src="http://img.baidu.com/hi/jx2/j_0001.gif"/></p>', '2017-08-09 17:22:17', 1),
(4, 'UM使用', 1, '技术', 'UM的使用测试', '<p>UM感觉还是不错的<img src="http://ziqiangshe-ziqiangshe.stor.sinaapp.com/img/15006896112177.jpg" style="width: 145px; height: 138px;"/></p><p>图片缩小了</p>', '2017-07-22 03:22:59', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sign`
--

CREATE TABLE IF NOT EXISTS `sign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `sex` tinyint(1) DEFAULT '0' COMMENT '0-未知1-男2-女',
  `dept` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `qq` int(30) DEFAULT NULL,
  `tel` int(30) DEFAULT NULL,
  `dorm` varchar(30) DEFAULT NULL COMMENT '宿舍',
  `status` tinyint(1) DEFAULT '0' COMMENT '0-待审核1-通过2-忽略',
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `sign`
--

INSERT INTO `sign` (`id`, `name`, `sex`, `dept`, `class`, `created`, `qq`, `tel`, `dorm`, `status`, `content`) VALUES
(1, 'xzzf', 1, '服务队', '12', '2017-08-05 09:01:17', 12, 121, '121', 1, '12'),
(2, 'wdqdqdq', 0, '服务队', '12', '2017-08-05 12:40:00', 12, 12, '11', 2, '121'),
(3, '123', 1, '服务队', 'm1231', '2017-08-05 15:07:21', 1231, 1231, '1231', 0, '123'),
(4, '123', 1, '宣传部', 'm1231', '2017-08-05 15:07:21', 1231, 1231, '1231', 0, '123');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `realname` varchar(20) DEFAULT NULL,
  `introduce` text COMMENT '介绍',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-未知1-男2-女',
  `class` varchar(40) DEFAULT NULL,
  `qq` int(20) DEFAULT NULL,
  `tel` int(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `session` tinyint(11) unsigned DEFAULT NULL COMMENT '届数',
  `position` varchar(50) DEFAULT NULL COMMENT '职务',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(20) NOT NULL DEFAULT '0' COMMENT '0-访客1-管理2-超级管理',
  `status` char(20) CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '0-上架1-下架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='社员表' AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `realname`, `introduce`, `sex`, `class`, `qq`, `tel`, `email`, `session`, `position`, `created`, `role`, `status`) VALUES
(1, 'xzfff', 'wqZMQtV37/w8I', '谢泽丰', '简介：\r\n\r\n   大一主要参加的比赛有武汉市内各大高校的ACM竞赛以及华为精英赛。最近参加的是理工黄页以及自强社的网站开发。掌握的编程语言是C、C++、Html5+CSS3、PHP（个人比较喜欢C++和PHP，C++的博大精深，支持多种编程方式，其中的STL更是好玩。PHP语言入门容易，功能强大，在编写脚本与后台的时候十分好用）感觉要学好一门语言或技术需要多写代码多调试，个人觉得技术学习最需要的是兴趣和愿意付出的时间。\r\n\r\n寄语：\r\n\r\n   这一届的新生很多都开始提前学习，也有很多巨巨出现。但是小白也不要灰心（我大一时候也是纯小白）不要好高骛远，学习需要一步一个脚印，学技术更是如此。另外，不要把计算机专业和外面的培训机构相提并论，最后希望你们能加入服务队与我们一起交流。\r\n\r\n', 1, 'zy1502', 0, 0, '', 15, '服务队队长', '2017-07-17 17:09:43', '2', '0'),
(2, 'lsj575', 'wq.9Mwm0rBUGI', '龙思杰', NULL, 1, NULL, NULL, NULL, NULL, 16, '服务队队长', '2017-08-04 02:06:18', '2', '0'),
(4, '', '', '骆代鹏', '感触：好一点，再好一点\r\n\r\n   自强君最吸引人的地方不仅是他的人格魅力，而且是和小伙伴们一起努力干活的那种感觉。当时自强社情况不是太好，出于责任心，我们想出一个个点子慢慢来改变现状。还记得大二上学期几乎天天熬夜，只为无愧于心，无愧于前辈们的托付。\r\n\r\n寄语：\r\n\r\n   作为计算机学院的宝宝们，应该抛开传统思维，用互联网思维来思考问题我们对自己的要求。尝试着去做产品，发展成学院内的互联网技术团队，这是一幅美好的画面，当然需要不只一年不只一代人来实现。但是梦想还是要有的，万一实现了呢？', 1, NULL, NULL, NULL, NULL, 12, '自强副社', '2017-08-04 02:38:55', '0', '0'),
(5, '', '', '廖星', '简介：\r\n\r\n   廖星大大是义工服务队的创始人，最喜欢的语言是PHP，最擅长的是前端开发。曾经在中国大学生计算机设计大赛中取得全国二等奖的名次，参加过掌上理工大的开发，现任Token技术部总监。2015年暑假在阿里巴巴集团实习，担任淘宝电影的前端工程师。\r\n\r\n寄语：\r\n\r\n   专业课程是学好计算机的必备知识，同时也要多加实践。', 1, NULL, NULL, NULL, NULL, 12, '服务队队长', '2017-08-04 02:40:49', '0', '0'),
(6, '', '', '张浩浩', '简介：\r\n\r\n   人生苦短，我用python，至于学什么语言好，我的建议是需要什么学什么。因为对于一个项目来说，没有最好的语言，只有最合适的语言。同时我觉得学好一门语言要做到ABC（always be coding），空余时间可以多参加国创，多在项目中锻炼自己，提高自己的代码能力，了解这种创新项目的流程，学会自己写申报书。\r\n寄语：\r\n\r\n   大学不长，要对得起自己。碰到什么机会多去试试，除了专业技能还有一些软实力也很重要。祝学弟学妹们能有一个精彩的大学生活。', 1, NULL, NULL, NULL, NULL, 12, '义工服务队', '2017-08-04 02:40:49', '0', '0'),
(7, '', '', '张泰然', '简介：\r\n\r\n   张泰然学长是第一届义工队的副队长，现在比较擅长的是基于.NET的C#语言来开发ASP.NET网站。曾经担任过Token团队技术部里的服务器端开发工程师，参与过经纬网的新闻经纬网站的服务器的开发。\r\n寄语：\r\n\r\n   如果想学好一门语言，就要学习上的耐心以及坚持不懈的努力钻研，还要掌握这门语言或技术上的细节之处，多看一些其他人的博客。同时也希望新生们能多花一些时间进行技术上的学习，至少掌握一门主力语言或技术，希望你们能早日找到自己的兴趣所在，通过兴趣提高自己的技术水平。', 1, NULL, NULL, NULL, NULL, 12, '服务队副队', '2017-08-04 02:44:08', '0', '0'),
(8, '', '', '高文昌', '简介：\r\n\r\n   掌握的技术：前端，并没有特别喜欢的编程语言，对我来说都是工具；最近用的比较多的是JavaScript，原因是因为前端需要吧。\r\n\r\n\r\n寄语：\r\n\r\n   个人觉得学好一门语言的精华在于coding，如果自己不coding的话，看再多的书也没用。', 1, NULL, NULL, NULL, NULL, 13, '义工服务队', '2017-08-04 02:46:57', '0', '0'),
(9, '', '', '梁爽', '感触：爱你千千万万遍\r\n\r\n   自强君总是爱心满满，尽自己所能去帮助他人。同时自强社是个有情有爱的小组织，也是个团结友爱的大家庭。各部门之间关系紧密，平时的互动和交流也比较频繁，这使得各部门间亲如一家人。\r\n   刚入大学时懵懂无知，在自强社的一群优秀前辈的带领下，我们看待事物的角度、自己的思想都有了不同的变化。当面对需要帮助的人时会毫不犹豫地去帮助他人。在自强君身边两年，认识了很多了的人，收获到很多友情。\r\n\r\n寄语：\r\n\r\n   思想上更深刻，做事态度更端正，在与人打交道时时刻刻学会换位思考，更乐观、更积极地面对生活。爱上自强君，改变看得见！Bingo，没错，就是这样！\r\n', 0, NULL, NULL, NULL, NULL, 13, '自强社长', '2017-08-04 02:46:57', '0', '0'),
(10, '', '', '卢双', '感触：带我忙碌带我飞\r\n\r\n   还记得大一军训老社长进教室宣传时，我就爱上了自强君。自强君真的非常自强。他教会每一个新成员如何更好的处理学习和社团之间的关系。作为四大社团中最为“忙碌”的组织，我大自强最大的吸引力在于其强大的锻炼人的能力以及以“家”为核心的情怀。\r\n   四大社团中，自强的活动总是最多的，所以让每一位想要得到锻炼的同学都能得到应有的锻炼，在不经意间能力得到提升。也许这样的变化你轻易不会发现，但当你有一天开始承担更多责任，进入更大的天地时，你会发现，相比于其他人，你能更好的融入集体，与人交流，也能更快的完成繁杂的任务，紧张但不失条理，迅速而不失质量。\r\n\r\n寄语：\r\n\r\n   自强社作为一个和谐的大家庭，总是能在节日里为你送上祝福，生日时为你送去温暖，这份情谊，是你用辛勤的汗水和与伙伴们朝昔相处的时间换来的。可以说，这种家的温暖，是你在其他社团里无法体验的真情。', 1, NULL, NULL, NULL, NULL, 13, '自强副社', '2017-08-04 02:48:49', '0', '0'),
(11, '', '', '张玉斌', '感触：学习新知，收获快乐\r\n\r\n   在自强君身边的两年，我学到了很多东西。\r\n   第一，要是有想法，自己可以大胆提出来和大家讨论，在通过之前，一定要给出一个较为详细的方案，然后和大家讨论之后再确定一些细节问题，才能最后确定一个方案。\r\n   第二，细节决定成败，或许我们点子很好，而且准备充分，但是活动的一些细节没有注意到，比如人员的座位安排，先后顺序，物资的摆放，这些简单而又容易让别人忽视的问题，没有注意到的话，我们整个活动会给人一种很乱很糟糕的感觉，所以细节很重要\r\n   第三，做事情要明确自己的目标和效果，然后从结果出发，再去指定计划，这样才能达到最好的效果。\r\n寄语：\r\n\r\n   我认为，自强君最吸引人的地方，就是引导我们，让我们带着一颗感恩的心去看世界，通过服务于他人，从被帮助人的笑容中，获得属于我们自己的快乐。永远不要低估，我们的所作所为会产生多大的能量。', 1, NULL, NULL, NULL, NULL, 13, '宣传部部长', '2017-08-04 02:48:49', '0', '0'),
(12, '', '', '李文坦', '简介：\r\n\r\n   掌握的语言是C++，Java，易语言和Flash语言，自我感觉如果要学好一门语言或技术需要自制力要好，并且肯花出时间敲代码。最近正在参与开发的项目是为参加计算机设计大赛而做的cocos2d-x的3D和2D混合游戏项目和为课程结题需要而做的web前台项目。\r\n寄语：\r\n\r\n   合理选择社团，切记参加太多，因为很多社团里并不能得到锻炼，建议只加入一个社团并认真做好这个社团里的事情，精益求精才能有成效。', 1, NULL, NULL, NULL, NULL, 13, '义工服务队', '2017-08-04 02:50:32', '0', '0'),
(13, '', '', '刘雨培', '简介：\r\n\r\n   最近在腾讯实习。最喜欢的编程语言是C++，可上可下，不强制GC，无unsafe，而且语义残废度低于目前主流语言，且是静态类型，社区繁荣。个人觉得如果要学好一门语言，最需要的是时间。\r\n\r\n\r\n寄语：\r\n\r\n   认真打好基础，别沉迷于前端、移动APP这些破烂玩意。。。（小编不禁觉得背后一阵寒意，QAQ）', 1, NULL, NULL, NULL, NULL, 13, '义工服务队', '2017-08-04 02:50:32', '0', '0'),
(14, '', '', '邵威', '简介：\r\n\r\n   参与了小挑战杯，参与了益行游戏：行界·零的开发，与益行人科技教育有限公司签了一年的游戏开发，掌握的编程语言是C++和C#（因为要用到这两种语言，配合VS环境用起来特别舒服）。感觉要学好一门语言所需要的是不停的思考，看书，写代码。\r\n\r\n寄语：\r\n\r\n   加入义工服务队绝对是会收获很多的，好好编程，好玩:)\r\n', 1, NULL, NULL, NULL, NULL, 13, '义工服务队', '2017-08-04 02:53:28', '0', '0'),
(15, '', '', '李统旭', '简介：\r\n   擅长的编程语言是C，C++，C#（开发界面比较常用C#，而C++和C我觉得很有趣，非常好玩）最近参与的项目是学校方面安排的，一般是参与后台。个人觉得学好一门语言付出的肯定是时间，经验和知识都是在不断的编码中成长的。\r\n\r\n\r\n寄语：\r\n\r\n   义工服务队的氛围需要有人带动，也需要你去积极参与，当然你能收获的绝对超出你的想象。', 1, NULL, NULL, NULL, NULL, 13, '义工服务队', '2017-08-04 02:53:28', '0', '0'),
(16, '', '', '金笑天', '简介：\r\n\r\n   收获有ASC16 铜，ACM 铜。最近参加的项目是莫少聪巨巨那边的项目，一个是动作语义识别，一个是云定位。现在参与的项目开发是在跟着教程做游戏（其实是自己在玩U3D）。计算机方面掌握的比较好的是硬件方面和C、C++。感觉要学好一门语言要付出时间，巨大的练习量，还要深入项目中来学习。\r\n\r\n寄语：\r\n\r\n   加油咯，要努力超越上一届学长，而不是跟着他们走。\r\n\r\n', 1, NULL, NULL, NULL, NULL, 14, '服务队队长', '2017-08-04 02:54:31', '0', '0'),
(17, '', '', '陈亚辉', '感触：时光堆叠，融入骨血\r\n\r\n   我来过，我经历过。在自强君的身边，我收获过。\r\n   首先是前所未有的自信。在与自强君共度两年多的时间里，已经可以很自然的去讲话，组织活动。其次是学会了如何去做事情和承担责任，如何调节自己的状态，分配自己的时间。丝丝缕缕的记忆都是无形的价值，它带给我的改变溶入血液。而我也见证了自强君在一年中的成长，新旧交替，互助前行，这份感动历久弥新。\r\n\r\n寄语：\r\n\r\n   “让别人提起计算机学院就会想到计算机自强社”。', 1, NULL, NULL, NULL, NULL, 12, '自强社长', '2017-08-04 02:38:55', '0', '0'),
(18, 'test', 'wqZMQtV37/w8I', '测试', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-05 17:19:06', '0', '0'),
(19, '123', 'wqZMQtV37/w8I', '123', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-05 17:24:22', '0', '0'),
(20, '22333', 'wqZMQtV37/w8I', 'emmm', NULL, 1, NULL, NULL, NULL, NULL, NULL, '服务队成员', '2017-08-05 17:29:56', '0', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
