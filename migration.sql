drop database edusphere;
create database edusphere;
use edusphere;

create table users(
    user_id int unsigned primary key auto_increment,
    firstname varchar(100) not null ,
    lastname varchar(100) not null ,
    email varchar(100) not null unique ,
    password varchar(255) not null ,
    dob date not null ,
    gender varchar(100) not null ,
    role varchar(100),
    phone_number varchar(100) not null ,
    created_at timestamp not null ,
    updated_at timestamp,
    constraint CHK_role check ( role = 'student' OR  role = 'teacher' OR role = 'admin'),
    constraint CHK_gender check ( gender = 'male' OR gender = 'female' )
);

create table classes (
    class_id int unsigned primary key auto_increment,
    name varchar(200) not null unique ,
    coefficient int unsigned not null,
    teacher_id int unsigned not null,
    schedule varchar(255) not null ,
    created_at timestamp not null ,
    updated_at timestamp
);

alter table classes add constraint  FK_teacher_classes FOREIGN KEY  (teacher_id) references users(user_id) ON DELETE CASCADE ;

create table students_classes (
    class_id int unsigned not null,
    student_id int unsigned not null,
    PRIMARY KEY (class_id, student_id),
    CONSTRAINT FK_studentClassUser FOREIGN KEY (student_id) REFERENCES users (user_id),
    CONSTRAINT FK_studentClassClasses FOREIGN KEY (class_id) REFERENCES classes (class_id)
);

alter table students_classes add note int unsigned not null
alter table students_classes alter note set default 0;