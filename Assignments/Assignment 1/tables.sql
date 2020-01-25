DROP DATABASE IF EXISTS SPORTS;
CREATE DATABASE SPORTS;
USE SPORTS;


CREATE TABLE CUSTOMER(
    custno varchar(5) primary key,
    custname varchar(20) not null,
    address varchar(30) not null,
    Internal char not null,
    contact varchar(15) not null,
    phone int not null,
    city varchar(30) not null,
    state varchar(25) not null,
    zip varchar(6) not null);


CREATE TABLE EMPLOYEE(
    EMPNO varchar(4) primary key,
    EMPNAME varchar(20) not null,
    DEPARTMENT varchar(30) not null,
    EMAIL varchar(40) not null,
    PHONE varchar(7) not null);


CREATE TABLE FACILITY(
    facno varchar(10) primary key,
    facname varchar(20) not null);


CREATE TABLE LOCATION( 
    locno varchar(10) primary key,
    facno varchar(10) not null, 
    locname varchar(25) not null, 
    constraint foreign key(facno) references FACILITY(facno));

CREATE TABLE RESOURCETBL( 
    resno varchar(10) primary key, 
    resname varchar(30) not null, 
    rate varchar(10) not null,
    CONSTRAINT CHECK (rate>0)
);

CREATE TABLE EVENTREQUEST(
    eventno varchar(10) primary key,
    dateheld varchar(30) not null,
    datereq varchar(30) not null,
    facno varchar(10) not null,
    custno varchar(5) not null,
    dateauth varchar(30),
    status varchar(10) not null,
    estcost varchar(10) not null,

    estaudience int not null,
    budno varchar(20),
    constraint foreign key(facno) references FACILITY(facno),
    constraint foreign key(custno) references CUSTOMER(custno),
    CONSTRAINT CHECK (status in('Pending','Denied', 'Approved')),
    CONSTRAINT CHECK (estaudience>0)
);

create table EVENTPLAN(
    planno varchar(10) primary key,
    eventno varchar(10) not null,
    workdate varchar(35) not null,
    notes varchar(30),
    activity varchar(40) not null,
    empno varchar(4),
    constraint foreign key(empno) references EMPLOYEE(empno));
    
create table EVENTPLANLINE(
    PlanNo varchar(10) not null,
    LineNo int not null,
    TimeStart varchar(40) not null,
    TimeEnd varchar(40) not null,
    NumberFld int not null,
    LocNo varchar(10) not null,
    ResNo varchar(10) not null,
    constraint PK_EVENTPLANLINE primary key(PlanNo,LineNo),
    constraint foreign key(LocNo) references LOCATION(locno),
    constraint foreign key(ResNo) references RESOURCETBL(resno));


