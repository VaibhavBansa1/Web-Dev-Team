create database college;
use college;
create table student(
	id varchar(15) primary key,
    password varchar(15) not null unique
);
create table faculty(
	id varchar(15) primary key,
    password varchar(15) not null unique
);
desc table student;

insert into student values('22BRACS05','poly807698');

SELECT id, password FROM student;