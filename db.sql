create database movie;
create table movies(
    movieid int(11) primary key auto_increament not null,
    movietitle varchar(255) not null,
    moviedescription varchar(255) not null,
    movieprice varchar(255) not null,
    movieimage varchar(255) not null
);

create table users (
    userid int(11) primary key auto_increament not null,
    username varchar(255) not null,
    useremail varchar(255) not null,
    userpassword varchar(255) not null,
    userstatus varchar(255) not null
);