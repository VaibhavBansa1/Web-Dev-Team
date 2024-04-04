drop database college;
create database college;
use college;
create table branches(
	id int not null primary key,
	branch_name varchar(20) not null unique
);
create table clg_session(
	id int not null primary key,
	session_name varchar(10) not null unique
);
create table gender(
    id char(1) primary key check(id IN ('M', 'F', 'O')),
    gender varchar(10) not null unique check(gender IN ('Male', 'Female', 'Other'))
);
-- create table session_manage(
-- 	id char(25) primary key not null ,
-- 	user varchar(7), -- type of user
-- 	u_id varchar(15)
-- );
insert into branches values (1 ,'C.S.E'),
						    (2, 'I.T'),
						    (3, 'E.E');

insert into clg_session values (1 ,'2021-2024'),
							   (2 ,'2022-2025'),
							   (3 ,'2023-2026');

insert into gender values ('M','Male'),
						  ('F','Female'),
						  ('O','Other');

select * from branches;
select * from clg_session;
select * from gender;
-- select * from session_manage;
-- create table std_photo();
-- create table faculty_photo();

create table student (
	id varchar(15) primary key not null, -- roll no
	std_name varchar(50) not null check (length(std_name) > 0),
	guardian_name varchar(50) not null check (length(guardian_name) > 0),
	gmail varchar(50) not null check (length(gmail) > 10) unique, -- only gmail 🗿🗿
	phone_no varchar(16) not null unique,
	guardian_phone_no varchar(16) not null unique,
	dob date not null,
	password varchar(20) not null check (length(password) >= 8),
	blood_grp varchar(3),
	address varchar(256) not null,
	gender_id char(1) not null check(gender_id IN ('M', 'F', 'O')),
	branch_id int not null check (branch_id > 0), -- this student table will be the child of branch table
	session_id int not null check (session_id > 0), --  this session table will be the child of branch table
	foreign key (gender_id) references gender(id),
	foreign key (branch_id) references branches(id),
	foreign key (session_id) references clg_session(id)
);

insert into student(
	id, std_name, guardian_name,gmail,phone_no,
	guardian_phone_no, dob, gender_id, password, blood_grp,
	address, branch_id, session_id
) 
values
('22BRACS01','student1','guardian1','student1@gmail.com','+91 789 456 1231','+91 789 456 1231','2006-01-03','M',"password",'B+','address blabla bla bla',1,2),
('22BRACS02','student2','guardian2','student2@gmail.com','+91 789 456 1232','+91 789 456 1232','2006-01-03','M',"password",'B+','address blabla bla bla',1,2),
('22BRACS03','student3','guardian3','student3@gmail.com','+91 789 456 1233','+91 789 456 1233','2006-01-03','M',"password",'B+','address blabla bla bla',1,1),
('22BRACS04','student4','guardian4','student4@gmail.com','+91 789 456 1234','+91 789 456 1234','2006-01-03','M',"password",'B+','address blabla bla bla',1,1);

SELECT * FROM  student;


create table faculty(
	id varchar(15) primary key,
	faculty_name varchar(50) not null check (length(faculty_name) > 0),
	password varchar(20) not null check (length(password) >= 8),
	gmail varchar(50) not null check (length(gmail) > 10) unique, -- only gmail 🗿🗿
	phone_no varchar(16) not null unique,
	alt_phone_no varchar(16) not null unique,
	gender_id char(1) not null check(gender_id IN ('M', 'F', 'O')),
	blood_grp varchar(3),
	address varchar(256) not null,
	dob date not null,
	branch_id int not null check (branch_id > 0), -- this student table will be the child of branch table
	foreign key (gender_id) references gender(id),
	foreign key (branch_id) references branches(id)
);

insert into faculty
values
('faculty1','name1','password','faculty1@gmail.com','9109863175','8109863175','M','B+','soonsan gali paresan mahola vord no.420','2000-01-01',1),
('faculty2','name2','password','faculty2@gmail.com','9109863132','9109863182','M','A-','soonsan gali paresan mahola vord no.421','2001-02-03',1),
('faculty3','name3','password','faculty3@gmail.com','8109864578','9109863155','F','B-','soonsan gali paresan mahola vord no.422','2001-05-12',1),
('faculty4','name4','password','faculty4@gmail.com','7380986311','6109863171','M','AB+','soonsan gali paresan mahola vord no.423','2000-03-22',1),
('faculty5','name5','password','faculty5@gmail.com','8099863179','8099863135','F','O+','soonsan gali paresan mahola vord no.424','2002-09-09',2),
('faculty6','name6','password','faculty6@gmail.com','8109863179','8109863135','F','O+','soonsan gali paresan mahola vord no.424','2002-09-09',2),
('faculty7','name7','password','faculty7@gmail.com','9009863145','8109863177','M','A+','soonsan gali paresan mahola vord no.426','2001-10-11',2);

SELECT * FROM  faculty;


SELECT * FROM  faculty limit 0,5;

select * from student std
 inner join branches bra on  bra.id = std.branch_id 
 inner join clg_session cls on cls.id = std.session_id
 inner join gender g on g.id = std.gender_id;

select * from faculty fac
 inner join branches bra on  bra.id = fac.branch_id
 inner join gender g on g.id = fac.gender_id