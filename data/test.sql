--创建数据库(要有权限)
create database if not exists `cms_demo` charset 'utf8mb4' collate 'utf8mb4_general_ci';
--创建用户并授权(单独创建一个用户管理这个数据库)
create user if not exists `admin123` @`localhost` identified by 'admin123';
grant all on cms_demo.* to `admin123` @`localhost`;
--删除用户 drop user `admin123`@`localhost`;
-- 切换数据库
use `cms_demo`;
--创建表
create table if not exists `cd_config`(
  `id` int(10) primary key auto_increment comment '逻辑主键',
  `name` varchar(50) not null default '' comment '配置名',
  `value` varchar(200) default '' comment '配置值'
) comment '配置表';
--
--
create table if not exists `cd_archives`(
  -- 主键和外键(外键在业务层)
  `aid` int(10) not null auto_increment comment '文章id',
  `typeid` int(10) not null default '0' comment '所属栏目id',
  -- 文章信息
  `title` varchar(200) default '' comment '标题',
  `description` varchar(200) default '' comment '描述',
  `keywords` varchar(200) default '' comment '关键字',
  `author` int(10) default '0' comment '作者id即uid',
  `litpic` varchar(250) default '' comment '缩略图url',
  -- 布尔状态
  `is_recom` tinyint(1) unsigned not null default '0' comment '是否推荐,1是,0否',
  `is_del` tinyint(1) unsigned not null default '0' comment '是否删除,1是,0否',
  `is_hidden` tinyint(1) unsigned not null default '0' comment '是否隐藏,1是,0否',
  `sort_order` int(10) default '0' comment '文章顺序',
  -- 时间
  `add_time` int(10) default '0' comment '新增时间',
  `update_time` int(10) default '0' comment '更新时间',
  -- 主键和索引
  primary key(`aid`),
  index `aid`(`typeid`)
) comment '文章主表';
--
--
create table if not exists `cd_article_content`(
  -- 主键和外键
  `id` int(10) not null auto_increment comment '逻辑主键',
  `aid` int(10) not null default '0' comment '文章aid',
  -- 内容
  `content` longtext comment '文章内容',
  -- 主键和索引
  primary key(`id`),
  index `conid`(`aid`)
) comment '文章从表';
--
--
create table if not exists `cd_arctype`(
  -- 主键
  `typeid` int(10) not null auto_increment comment '栏目id',
  -- 栏目信息
  `typename` varchar(50) default '' comment '栏目名称',
  `path` varchar(50) default '' comment '栏目路径,只可为英文,且保持唯一',
  `title` varchar(200) default '' comment '标题',
  `description` varchar(200) default '' comment '描述',
  `keywords` varchar(200) default '' comment '关键字',
  `litpic` varchar(250) default '' comment '缩略图url',
  `sort_order` int(10) default '0' comment '栏目顺序',
  -- 布尔状态
  `is_del` tinyint(1) unsigned not null default '0' comment '是否删除,1是,0否',
  `is_hidden` tinyint(1) unsigned not null default '0' comment '是否隐藏,1是,0否',
  -- 主键和唯一键
  primary key(`typeid`),
  unique `path` (`path`)
) comment '栏目表';
--
--
create table if not exists `cd_user`(
  `uid` int(10) not null auto_increment comment '用户uid',
  `name` varchar(50) not null default '' comment '用户名,用于登录',
  `password` varchar(32) not null default '' comment '密码',
  `pen_name` varchar(50) default '佚名' comment '笔名,用于显示作者',
  -- 布尔状态
  `is_del` tinyint(1) unsigned not null default '0' comment '是否删除,1是,0否',
  `is_hidden` tinyint(1) unsigned not null default '0' comment '是否隐藏,1是,0否',
  -- 设置主键和唯一键
  primary key(`uid`),
  unique(`name`)
) comment '用户表';
--
-- 插入测试数据
--
-- 创建用户
insert into `cd_user` (`name`, `password`, `pen_name`)
values('haha', 'aaaaaa', '小白'),
  ('eee', 'bbbbb', '小红'),
  ('cdfae', 'cccc', '小黑');
--
-- 创建配置字段
insert into `cd_config` (`name`, `value`)
values('g_title', 'cms小demo'),
  ('g_description', '我是一个cms小demo'),
  ('g_keywords', 'cms,php,demo'),
  (
    'g_logo',
    'https://img.0736tw.com/template/pc/skin/image/logo2.png'
  ),
  ('g_copyright', 'copyright 2015-2021 某某公司 版权所有'),
  ('g_recordnum', '湘ICP备12345678号');
--
-- 创建栏目
insert into `cd_arctype` (
    `typename`,
    `path`,
    `title`,
    `description`,
    `keywords`,
    `litpic`
  )
values(
    '娱乐资讯',
    'yulezixun',
    '娱乐资讯一网打尽',
    '描述娱乐资讯一网打尽娱乐资讯一网打尽',
    '关键词,娱乐资讯,一网打尽',
    'https://img.0736tw.com/uploads/allimg/20210107/1-21010G40G1X6.jpg'
  ),
  (
    '行业新闻',
    'hangyexinwen',
    '关注行业动态,看每日行业新闻',
    '关注行业动态,看每日行业新闻关注行业动态,看每日行业新闻',
    '关键词,行业,动态',
    'https://img.0736tw.com/uploads/allimg/20210107/1-21010G40G1X6.jpg'
  );
--
--创建文章
insert into `cd_archives`(
    `typeid`,
    `title`,
    `description`,
    `keywords`,
    `author`,
    `litpic`,
    `add_time`,
    `update_time`
  )
values(
    1,
    '小猪短租完成近3亿美元融资 发力安全与智能服务',
    '10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。',
    '关键词,小猪,一网打尽',
    1,
    'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',
    1611692233,
    1611692233
  ),
  (
    2,
    '小猪短租完成近3亿美元融资 发力安全与智能服务',
    '10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。',
    '关键词,小猪,一网打尽',
    2,
    'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',
    1611692133,
    1611692133
  ),
  (
    1,
    '小猪短租完成近3亿美元融资 发力安全与智能服务',
    '10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。',
    '关键词,小猪,一网打尽',
    1,
    'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',
    1611692133,
    1611692133
  ),
  (
    1,
    '小猪短租完成近3亿美元融资 发力安全与智能服务',
    '10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。',
    '关键词,小猪,一网打尽',
    1,
    'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',
    1611692233,
    1611692233
  ),
  (
    2,
    '小猪短租完成近3亿美元融资 发力安全与智能服务',
    '10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。',
    '关键词,小猪,一网打尽',
    2,
    'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',
    1611692133,
    1611692133
  );
-- 数据批量复制
-- 重置表 truncate table `cd_archives`;
insert into `cd_archives`(
    `typeid`,
    `title`,
    `description`,
    `keywords`,
    `author`,
    `litpic`,
    `add_time`,
    `update_time`
  )
select `typeid`,
  `title`,
  `description`,
  `keywords`,
  `author`,
  `litpic`,
  `add_time`,
  `update_time`
from `cd_archives`;
--
--文章内容
insert into `cd_article_content`(`aid`, `content`)
values(
    1,
    '<p style="margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei";"="">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style="margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei";="" text-align:="" center;"=""><img title="小猪短租完成近3亿美元融资 发力安全与智能服务(图1)" alt="小猪短租完成近3亿美元融资 发力安全与智能服务(图1)" src="/uploads/allimg/181011/0S9395160-0.png" style="max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;"></p>'
  ),
  (
    2,
    '<p style="margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei";"="">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style="margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei";="" text-align:="" center;"=""><img title="小猪短租完成近3亿美元融资 发力安全与智能服务(图1)" alt="小猪短租完成近3亿美元融资 发力安全与智能服务(图1)" src="/uploads/allimg/181011/0S9395160-0.png" style="max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;"></p>'
  );
-- 数据批量复制
-- 重置表 truncate table `cd_article_content`;
insert into `cd_article_content`(`content`)
select `content`
from `cd_article_content`;
-- 修改aid
update `cd_article_content` as con
set `aid` = con.id;

--备份sql数据库
-- 进入 mysql5.7.26/bin目录,命令行执行
-- mysqldump -uadmin123 -padmin123 --databases cms_demo > D:/cms_demo-backup1.sql

--还原数据库
-- 同上
-- mysql.exe -uadmin123 -padmin123 < D:/cms_demo-backup1.sql