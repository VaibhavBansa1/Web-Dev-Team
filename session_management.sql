create database coders_cafe;
use coders_cafe;
create table members(
    id varchar(15) primary key,
    password varchar(15) not null
);
-- create table faculty(
-- 	id varchar(15) primary key,
--     password varchar(15) not null
-- );
-- desc table student;
-- insert into faculty values('xyz@gmail.com','xyz'),('xyx@gmail.com','xyx');
insert into members values('22BRACS01','poly807698'),('22BRACS02','poly807698'),('22BRACS04','poly807698'),('22BRACS05','poly807698'),('22BRACS06','poly807698'),('22BRACS07','poly807698'),('22BRACS03','poly807698'),('22BRACS08','poly807698');

-- SELECT * FROM  student limit 1,5;
-- SELECT * FROM  student ;
-- SELECT * FROM  faculty limit 0,5;

-- session management table

create table user_session(
    session_id varchar(11) not null primary,
    roll_no varchar(10),
    foreign key ()
);
