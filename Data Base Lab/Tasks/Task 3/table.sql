

create table customer( 
     id int primary key, 
     firstName varchar(15) not null,
     lastName varchar(15) not null,
     city varchar(30) not null,
     country varchar(15) not null,
     phone  varchar(15) not null
);

create table orders(
    id int primary key,
    orderdate date not null,
    ordernumber varchar(15) not null,
    customerid int not null,
    totalamount int not null,
    constraint foreign key(customerid) references customer(id)
);
