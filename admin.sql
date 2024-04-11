create database admin_info;
create table admin (
	id varchar(15) primary key,
	admin_name varchar(50) not null check (length(admin_name) > 0),
	password varchar(20) not null check (length(password) >= 8),
	gmail varchar(50) not null check (length(gmail) > 10) unique, -- only gmail 🗿🗿
	phone_no varchar(16) not null unique,
	alt_phone_no varchar(16) not null unique,
	gender_id char(1) not null check(gender_id IN ('M', 'F', 'O')),
	blood_grp varchar(3),
	address varchar(256) not null,
	dob date not null,
	branch_id int not null check (branch_id > 0), -- this student table will be the child of branch table
	user_id char(1) not null check(user_id IN ('F')) default 'F',
	foreign key (gender_id) references gender(id),
	-- foreign key (branch_id) references branches(id),
	foreign key (user_id) references users(id)
);


-- two type of admin top admin that can remove admin 
-- and other can just see and add new admin 