<?php
include "./_conn.php";

$sql = "
drop database college;
create database college;
use college;
create table branches(
    id int not null primary key auto_increment,
    branch_name varchar(20) not null unique
);
create table clg_session(
    id int not null primary key auto_increment,
    session_name varchar(10) not null unique
);
create table gender(
    id char(1) primary key check(id IN ('M', 'F', 'O')),
    gender varchar(10) not null unique check(gender IN ('Male', 'Female', 'Other'))
);
create table users(
    id char(1) primary key check(id IN ('S', 'F')),
    user char(7) not null unique check(user IN ('Student', 'Faculty'))
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

insert into users values ('S','Student'),
                          ('F','Faculty');

select * from branches;
select * from clg_session;
select * from gender;
select * from users;

create table student (
    id varchar(15) primary key not null, -- roll no
    std_name varchar(50) not null check (length(std_name) > 0),
    guardian_name varchar(50) not null check (length(guardian_name) > 0),
    gmail varchar(50) not null unique check (length(gmail) > 10) , -- only gmail 🗿🗿
    phone_no varchar(10) not null unique,
    guardian_phone_no varchar(10) not null unique,
    dob date not null,
    gender_id char(1) not null check(gender_id IN ('M', 'F', 'O')),
    password varchar(20) not null check (length(password) >= 8),
    blood_grp varchar(3),
    address varchar(256) not null,
    branch_id int not null check (branch_id > 0), -- this student table will be the child of branch table
    session_id int not null check (session_id > 0), --  this session table will be the child of branch table
    user_id char(1) not null default 'S' check(user_id IN ('S')),
    foreign key (gender_id) references gender(id),
    foreign key (branch_id) references branches(id),
    foreign key (session_id) references clg_session(id),
    foreign key (user_id) references users(id)
);


insert into student 
values
('22BRACS01','student1','guardian1','student1@gmail.com','7894561231','7894561241','2006-01-03','M','password','B+','address blabla bla bla',1,2,'S'),
('22BRACS02','student2','guardian2','student2@gmail.com','7894561232','7894561242','2006-01-03','M','password','B+','address blabla bla bla',1,2,'S'),
('22BRACS03','student3','guardian3','student3@gmail.com','7894561233','7894561243','2006-01-03','M','password','B+','address blabla bla bla',1,1,'S'),
('22BRACS04','student4','guardian4','student4@gmail.com','7894561234','7894561244','2006-01-03','M','password','B+','address blabla bla bla',1,1,'S');

SELECT * FROM  student;


create table faculty(
    id varchar(15) primary key,
    faculty_name varchar(50) not null check (length(faculty_name) > 0),
    password varchar(20) not null check (length(password) >= 8),
    gmail varchar(50) not null unique check (length(gmail) > 10), -- only gmail 🗿🗿
    phone_no varchar(10) not null unique,
    alt_phone_no varchar(10) not null unique,
    gender_id char(1) not null check(gender_id IN ('M', 'F', 'O')),
    blood_grp varchar(3),
    address varchar(256) not null,
    dob date not null,
    branch_id int not null check (branch_id > 0), -- this student table will be the child of branch table
    user_id char(1) not null default 'F' check(user_id IN ('F')),
    foreign key (gender_id) references gender(id),
    foreign key (branch_id) references branches(id),
    foreign key (user_id) references users(id)
);

insert into faculty
values
('faculty1','name1','password','faculty1@gmail.com','9109863175','8109863175','M','B+','soonsan gali paresan mahola vord no.420','2000-01-01',1,'F'),
('faculty2','name2','password','faculty2@gmail.com','9109863132','9109863182','M','A-','soonsan gali paresan mahola vord no.421','2001-02-03',1,'F'),
('faculty3','name3','password','faculty3@gmail.com','8109864578','9109863155','F','B-','soonsan gali paresan mahola vord no.422','2001-05-12',1,'F'),
('faculty4','name4','password','faculty4@gmail.com','7380986311','6109863171','M','AB+','soonsan gali paresan mahola vord no.423','2000-03-22',1,'F'),
('faculty5','name5','password','faculty5@gmail.com','8099863179','8099863135','F','O+','soonsan gali paresan mahola vord no.424','2002-09-09',2,'F'),
('faculty6','name6','password','faculty6@gmail.com','8109863179','8109863135','F','O+','soonsan gali paresan mahola vord no.424','2002-09-09',2,'F'),
('faculty7','name7','password','faculty7@gmail.com','9009863145','8109863177','M','A+','soonsan gali paresan mahola vord no.426','2001-10-11',2,'F');

";


if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
} else {
    echo "Error executing queries: " . $conn->error;
}

$conn->close();


    // SELECT * FROM  faculty;
    
    // select * from student std
    //  inner join branches bra on  bra.id = std.branch_id 
    //  inner join clg_session cls on cls.id = std.session_id
    //  inner join gender g on g.id = std.gender_id
    //  inner join users on users.id = std.user_id;
    
    // SELECT std.id,
    //     std_name,
    //     guardian_name,
    //     gmail,
    //     phone_no,
    //     guardian_phone_no,
    //     dob,
    //     gender_id,
    //     password,
    //     blood_grp,
    //     address,
    //     branch_id,
    //     session_id,
    //     user_id from student std
    //         inner join branches bra on  bra.id = std.branch_id 
    //         inner join clg_session cls on cls.id = std.session_id
    //         inner join gender g on g.id = std.gender_id
    //         inner join users on users.id = std.user_id where session_id = '2';
    
    // SELECT std.id,
    //     std_name,
    //     guardian_name,
    //     gmail,
    //     phone_no,
    //     guardian_phone_no,
    //     dob,
    //     gender,
    //     password,
    //     blood_grp,
    //     address,
    //     branch_name,
    //     session_name
    //     from student std
    //         inner join branches bra on  bra.id = std.branch_id 
    //         inner join clg_session cls on cls.id = std.session_id
    //         inner join gender g on g.id = std.gender_id;
    
    
    // -- insert into clg_session values (4,'2024-2027');
    // select * from clg_session order by session_name desc limit 0 , 3 ;
    
    // select count(*)+1, branch_name from student std
    //  inner join branches bra on  bra.id = std.branch_id 
    //  inner join clg_session cls on cls.id = std.session_id
    //  inner join gender g on g.id = std.gender_id
    //  inner join users on users.id = std.user_id
    //  where cls.session_name = '2022-2025'
    //  group by branch_name;
    
    // select * from faculty fac
    //  inner join branches bra on  bra.id = fac.branch_id
    //  inner join gender g on g.id = fac.gender_id
    //  inner join users on users.id = fac.user_id;
    
    // select count(*), branch_name from faculty fac
    //  inner join branches bra on  bra.id = fac.branch_id
    //  inner join gender g on g.id = fac.gender_id
    //  inner join users on users.id = fac.user_id group by branch_name;
     
    //  select count(*), branch_id from student group by branch_id;
    
    // SELECT std.id, std_name, guardian_name, gmail, phone_no, guardian_phone_no, gender, blood_grp, branch_name, session_name from student std inner join branches bra on bra.id = std.branch_id inner join clg_session cls on cls.id = std.session_id inner join gender g on g.id = std.gender_id inner join users on users.id = std.user_id where session_id = 3 and branch_id = 1;
    
    // SELECT fac.id,
    //     faculty_name,
    //     gmail,
    //     phone_no,
    //     alt_phone_no,
    //     gender,
    //     blood_grp,
    //     branch_name from faculty fac
    //     inner join branches bra on  bra.id = fac.branch_id 
    //     inner join gender g on g.id = fac.gender_id;
