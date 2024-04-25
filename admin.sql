drop database if exists admin_info;
create database admin_info;
use admin_info;
create table admin (
	id varchar(15) primary key,
	admin_name varchar(50) not null check (length(admin_name) > 0),
	password varchar(20) not null check (length(password) >= 8),
	gmail varchar(50) not null check (length(gmail) > 10) unique, -- only gmail 🗿🗿
	phone_no varchar(10) not null unique,
	alt_phone_no varchar(10) not null unique,
	gender varchar(6) not null check(gender IN ('Male', 'Female', 'Other')),
	blood_grp varchar(3),
	address varchar(256) not null,
	dob date not null,
	user_type char(9) not null check(user_type IN ('sup_admin', 'admin'))
);

insert into admin
values
('admin1','Vaibhav','password','vaibhav@gmail.com','9109863175','8109863175','Male','B+','soonsan gali paresan mahola vord no.420','2000-01-01','sup_admin'),
('admin2','Sivam','password','sivam@gmail.com','9109863132','9109863182','Male','A-','soonsan gali paresan mahola vord no.421','2001-02-03','sup_admin'),
('admin3','Keshav','password','keshav3@gmail.com','8109864578','9109863155','Male','B-','soonsan gali paresan mahola vord no.422','2001-05-12','sup_admin');


-- two type of admin top admin that can remove admin 
-- and other can just see and add new admin 