DROP DATABASE IF EXISTS pic;

CREATE DATABASE pic;
use pic;


CREATE TABLE users (
  name varchar(30) NOT NULL,
  email varchar(30) NOT NULL,
  pass varchar(30) Not NULL,
  constraint PRIMARY KEY (name)
);

create table pic(
  name varchar(30) not null,
  pic  varchar(30) not null,
  constraint PRIMARY KEY (name,pic),
  constraint foreign key(name) references users(name)
);


