drop database college;
create database college;
use college;
create table student(
	id varchar(15) primary key not null, -- roll no
	std_name varchar(50) not null check (length(std_name) > 0),
	guardian_name varchar(50) not null check (length(guardian_name) > 0),
	gmail varchar(50) not null check (length(gmail) > 10) unique, -- only gmail 🗿🗿
	phone_no varchar(16) not null unique,
	guardian_phone_no varchar(16) not null unique,
	dob date not null,
	gender varchar(10) CHECK (gender IN ('Male', 'Female', 'Other')),
	password varchar(20) not null check (length(password) >= 8),
	blood_grp varchar(3),
	address varchar(256) not null,
	branch_id int not null check (branch_id > 0), -- this student table will be the child of branch table
	session_id int not null check (session_id > 0), --  this session table will be the child of branch table
	foreign key (branch_id) references branches(id),
	foreign key (session_id) references clg_session(id)
);
create table faculty(
	id varchar(15) primary key,
	faculty_name varchar(50) not null check (length(faculty_name) > 0),
	password varchar(20) not null check (length(password) >= 8),
	gmail varchar(50) not null check (length(gmail) > 10) unique, -- only gmail 🗿🗿
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

insert into branches values(1 ,'C.S.E'),
						   (2, 'I.T'),
						   (3, 'E.E');

insert into clg_session values(1 ,'2021-2024'),
							  (2 ,'2022-2025'),
							  (3 ,'2023-2026');

insert into student(
	id, std_name, guardian_name,gmail,phone_no,
	guardian_phone_no, dob, gender, password, blood_grp,
	address, branch_id, session_id
) 
values('22BRACS01','student1','guardian1','student1@gmail.com','+91 789 456 1231','+91 789 456 1231','2006-01-03','Male',"password",'B+','address blabla bla bla',1,2),
	  ('22BRACS02','student2','guardian2','student2@gmail.com','+91 789 456 1232','+91 789 456 1232','2006-01-03','Male',"password",'B+','address blabla bla bla',1,2),
	  ('22BRACS03','student3','guardian3','student3@gmail.com','+91 789 456 1233','+91 789 456 1233','2006-01-03','Male',"password",'B+','address blabla bla bla',1,1),
	  ('22BRACS04','student4','guardian4','student4@gmail.com','+91 789 456 1234','+91 789 456 1234','2006-01-03','Male',"password",'B+','address blabla bla bla',1,1)
	  ;

SELECT * FROM  student;
SELECT * FROM  student ;
SELECT * FROM  faculty limit 0,5;

select * from student std
 inner join branches bra on  bra.id = std.branch_id 
 inner join clg_session cls on cls.id = std.session_id