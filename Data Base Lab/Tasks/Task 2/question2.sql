
DROP DATABASE IF EXISTS pharma;
CREATE DATABASE IF NOT EXISTS pharma;
use pharma;

CREATE TABLE suppliers(
     s_id int primary key,
     s_name varchar(15) not null,
     contact char(15) not null,
     city varchar(40) not null);

CREATE TABLE orders(
    order_id int primary key,
    customer_name varchar(15) not null,
    order_date char(15));

CREATE TABLE product(
    p_id int primary key,
    p_name varchar(10) not null,
    units int not null,
    unit_price int not null,
    type varchar(30) not null,
    s_id int not null,
    constraint foreign key(s_id) references suppliers(s_id));

CREATE TABLE order_detail(
    p_id int ,
    order_id varchar(10),
    units_purchased int not null, 
    PRIMARY KEY (p_id,order_id)
);

INSERT INTO suppliers(s_id,s_name,contact,city) values(320,'Munir Brothers','0321-1234567','Karachi');
INSERT INTO suppliers(s_id,s_name,contact,city) values(312,'Alliance Pharmaceuticals','0313-7654321','Peshawar');
INSERT INTO suppliers(s_id,s_name,contact,city) values(478,'Abbot Pharmaceuticals','0300-9876543','Lahore');
INSERT INTO suppliers(s_id,s_name,contact,city) values(657,'Sanofi Aventis','0333-5632476','Islambad');
INSERT INTO suppliers(s_id,s_name,contact,city) values(987,'Ferozsons laboratories','0301-1934257','Peshawar');


INSERT INTO orders(order_id,customer_name,order_date) values(22,'waleed ali','11/25/2014');
INSERT INTO orders(order_id,customer_name,order_date) values(23,'azhar akbar','12/02/2014');
INSERT INTO orders(order_id,customer_name,order_date) values(24,'shahzeb khan','12/05/2014');
INSERT INTO orders(order_id,customer_name,order_date) values(25,'javed iqbal','01/15/2015');
INSERT INTO orders(order_id,customer_name,order_date) values(26,'tariq khan','06/23/2015');

INSERT INTO product(p_id,p_name,units,unit_price,type,s_id) values(1005,'Ponstan',100,15,'Tables',312);
INSERT INTO product(p_id,p_name,units,unit_price,type,s_id) values(1421,'Brufen',25,35,'Syrup',657);
INSERT INTO product(p_id,p_name,units,unit_price,type,s_id) values(3215,'Avil',122,26,'Syrup',478);
INSERT INTO product(p_id,p_name,units,unit_price,type,s_id) values(1215,'Flagyl',42,30,'Tables',987);
INSERT INTO product(p_id,p_name,units,unit_price,type,s_id) values(7513,'Avil',140,20,'Injection',478);
INSERT INTO product(p_id,p_name,units,unit_price,type,s_id) values(1216,'Flagyl',10,35,'Syrup',987);
INSERT INTO product(p_id,p_name,units,unit_price,type,s_id) values(1007,'Disprin',98,15,'Tablets',320);

INSERT INTO order_detail(p_id,order_id,units_purchased) values(1007,'22',5);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(1216,'22',1);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(1005,'22',4);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(1421,'23',1);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(1005,'23',1);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(3215,'23',2);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(7513,'23',3);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(1421,'24',2);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(1215,'24',1);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(1005,'25',5);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(1215,'26',1);
INSERT INTO order_detail(p_id,order_id,units_purchased) values(1421,'26',3);

update suppliers set s_name = 'Muneer Brothers' where s_name  = 'Munir Brothers';
delete from orders where order_id = 22;-- No,it does not affect order_detail table because there is no link between these two tables if there is link between these two tables then there is effect on order_detail table
update product set unit_price = 40 where type = 'Tablets';
delete from product where type = 'Syrup' and p_name = 'Avil';-- No,it does not affect order_detail table because there is no link between these two tables if there is link between these two tables then there is effect on order_detail table.

delete from ptoduct;
delete from order_detail;
delete from orders;
delete from suppliers;

drop table product;
drop table oder_detail;
drop table orders;
drop table suppliers;














