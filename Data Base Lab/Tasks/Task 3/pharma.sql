DROP DATABASE IF EXISTS pharma;
CREATE DATABASE IF NOT EXISTS pharma;
USE pharma;

SELECT 'CREATING DATABASE STRUCTURE' as 'INFO';

 set storage_engine = InnoDB;
-- set storage_engine = MyISAM;
-- set storage_engine = Falcon;
-- set storage_engine = PBXT;
-- set storage_engine = Maria;

select CONCAT('storage engine: ', @@storage_engine) as INFO;

DROP TABLE IF EXISTS suppliers,
                     products,
                     orders,
                     order_detail;


create table suppliers(
s_id char(3),
s_name varchar(30) not null,
contact varchar(12) not null unique,
city varchar(10) not null,
constraint supplier_pk primary key(s_id));

create table products(
p_id char(4),
p_name varchar(10) not null,
units numeric(3) not null,
unit_price numeric(2) not null,
type varchar(10) not null,
s_id char(3),
constraint product_pk primary key(p_id),
constraint product_fk foreign key(s_id) references suppliers(s_id) on delete cascade on update cascade);

create table orders(
order_id char(2),
customer_name varchar(30) not null,
order_date date not null,
constraint order_pk primary key(order_id));

create table order_detail(
p_id char(4),
order_id char(2),
unit_purchased numeric(2) not null,
constraint order_detail_pk primary key(p_id, order_id),
constraint order_detail_p_fk foreign key(p_id) references products(p_id) on delete cascade on update cascade,
constraint order_detail_o_fk foreign key(order_id) references orders(order_id) on delete cascade on update cascade);

insert into suppliers values('320','Munir Brothers','0321-1234567','Karachi');
insert into suppliers values('312','Alliance Pharmaceuticals','0313-7654321','Peshawar');
insert into suppliers values('478','Abbot Pharmaceuticals','0300-9876543','Lahore');
insert into suppliers values('657','Sanofi Aventis','0333-5632476','Islamabad');
insert into suppliers values('987','Ferozsons laboratories','0301-1934257','Peshawar');

insert into products values('1005','Ponstan',100,15,'Tablets','312');
insert into products values('1421','Brufen',25,35,'Syrup','657');
insert into products values('3215','Avil',122,26,'Syrup','478');
insert into products values('1215', 'Flagyl', 42, 30, 'Tablets','987');
insert into products values('7513', 'Avil', 140, 20, 'Injection', '478');
insert into products values('1216', 'Flagyl', 10, 35, 'Syrup', '987');
insert into products values('1007', 'Disprin', 98, 15, 'Tablets', '320');

insert into orders values('22', 'Waleed Ali', '2014-11-25');
insert into orders values('23', 'Azhar Akbar', '2014-12-02');
insert into orders values('24', 'Shahzeb Khan', '2014-05-12');
insert into orders values('25', 'Javed Iqbal', '2014-01-15');
insert into orders values('26', 'Tariq Khan', '2014-06-23');

insert into order_detail(unit_purchased, p_id, order_id) values(5,'1007', '22');
insert into order_detail(unit_purchased, p_id, order_id) values(1,'1216', '22');
insert into order_detail(unit_purchased, p_id, order_id) values(4,'1005', '22');
insert into order_detail(unit_purchased, p_id, order_id) values(1,'1421', '23');
insert into order_detail(unit_purchased, p_id, order_id) values(1,'1005', '23');
insert into order_detail(unit_purchased, p_id, order_id) values(2,'3215', '23');
insert into order_detail(unit_purchased, p_id, order_id) values(3,'7513', '23');
insert into order_detail(unit_purchased, p_id, order_id) values(2,'1421', '24');
insert into order_detail(unit_purchased, p_id, order_id) values(1,'1215', '24');
insert into order_detail(unit_purchased, p_id, order_id) values(5,'1005', '25');
insert into order_detail(unit_purchased, p_id, order_id) values(1,'1215', '26');
insert into order_detail(unit_purchased, p_id, order_id) values(3,'1421', '26');

