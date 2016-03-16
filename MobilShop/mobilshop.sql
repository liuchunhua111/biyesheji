create database if not exists mobilshop;
use mobilshop;
--管理员表
drop table if exists admin;
create table admin(
id int auto_increment primary key,
username varchar(20) not null unique,
password char(32) not null,
email varchar(50) not null,
adminright varchar(50) not null
);

--分类表
drop table if exists mobil_cate;
create table mobil_cate( 
id smallint unsigned auto_increment primary key,
cName varchar(50)
);
--品牌表
drop table if exists mobil_brand;
create table mobil_brand(
id smallint unsigned primary key auto_increment,
bName varchar(50)
)
--商品表
drop table if exists mobil_pro;
create table mobil_pro(
id int unsigned auto_increment primary key,
pName varchar(50) not null unique,
pSn varchar(50) not null,
pNum int unsigned default 1,
iPrice decimal(10,2) not null,
sPrice decimal(10,2) not null,
pDesc text,
pImg varchar(50) not null,
pubTime int unsigned not null,
isShow tinyint(1) default 1,
isHot tinyint(1) default 1,
cId smallint unsigned not null
);
--用户表
drop table if exists mobil_user;
create table mobil_user(
id int unsigned auto_increment primary key,
username varchar(20) not null unique,
password char(32) not null,
sex enum('男','女','保密'),
face varchar(50) not null,
regTime int unsigned not null
);

--相册表
drop table if exists mobil_album;
create table mobil_album(
id int unsigned auto_increment primary key,
pid int unsigned not null,
albumpath varchar(50) not null
);





