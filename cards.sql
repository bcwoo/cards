create database cards;

create table card (
	card_id integer primary key auto_increment,
	year varchar(4),
	brand varchar(100),
	name varchar(100),
	jpg_front longblob,
	jpg_back longblob
);