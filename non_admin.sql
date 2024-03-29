drop database college;
create database college;
use college;
create table student(
	id varchar(15) primary key not null, -- roll no
	std_name varchar(50) not null check (length() > 0),
	guardian_name varchar(50) not null check (length() > 0),
	gmail varchar(50) not null check (length() > 10) unique, -- only gmail 🗿🗿
	phone_no varchar(16) not null unique,
	guardian_phone_no varchar(16) not null unique,
	dob date not null,
	gender varchar(10) CHECK (gender IN ('Male', 'Female', 'Other')),
	password varchar(20) not null check (length() >= 8),
	blood_grp varchar(3),
	address varchar(256) not null,
	branch_id int not null check (branch_id > 0), -- this student table will be the child of branch table
	session_id int not null check (session_id > 0), --  this session table will be the child of branch table
	foreign key (branch_id) references branches(id),
	foreign key (session_id) references clg_session(id)
);
create table faculty(
	id varchar(15) primary key,
	faculty_name varchar(50) not null check (length() > 0),
	password varchar(20) not null check (length() >= 8),
	gmail varchar(50) not null check (length() > 10) unique, -- only gmail 🗿🗿
	phone_no varchar(16) not null unique,
	alt_phone_no varchar(16) not null unique,
	gender varchar(10) CHECK (gender IN ('Male', 'Female', 'Other')),
	blood_grp varchar(3),
	address varchar(256) not null,
	dob date not null,
	branch_id int not null check (branch_id > 0), -- this student table will be the child of branch table
	foreign key (branch_id) references branches(id)
);
create table branches(
	id int not null primary key,
	branch_name varchar(20) not null unique
);
create table clg_session(
	id int not null primary key,
	session_name varchar(10) not null unique
);
-- create table std_photo();
-- create table faculty_photo();

desc table student;
insert into faculty values('xyz@gmail.com','xyz'),('xyx@gmail.com','xyx');
insert into student values('22BRACS01','poly807698'),('22BRACS02','poly807698'),('22BRACS04','poly807698'),('22BRACS05','poly807698'),('22BRACS06','poly807698'),('22BRACS07','poly807698'),('22BRACS03','poly807698'),('22BRACS08','poly807698');

SELECT * FROM  student limit 1,5;
SELECT * FROM  student ;
SELECT * FROM  faculty limit 0,5;