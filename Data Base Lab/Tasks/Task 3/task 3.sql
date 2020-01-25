Q1)
select country,count(id) from customer group by country having count(id) > 10;
select country,count(id) from customer where country <> 'USA' group by country having count(id) >= 9 order by count(id);
select c.id from customer c,orders o group by c.id having avg(ordernumber) between 1000 and 1200;
select count(id),city,country from customer group by city,country;
select sum(id),orderdate from orders group by orderdate;
select count(id) from orders group by customerid;




Q2)
1)select dept_id,count(*),sum(salary) from employee group by dept_id; 
2)select dept_id,count(emp_id),manager_id from employee group by dept_id,manager_id;
3)select job_id,avg(salary) from employee group by job_id;

5)select job_id,avg(salary) from employee group by job_id;
6)select count(emp_id),manager_id from employee group by manager_id order by count(emp_id);
7)select count(manager_id),dept_id from employee group by dept_id;
8) select dept_id,count(emp_id) from employee group by dept_id having count(emp_id) > 3;



Q4)
1)select o.order_id,o.customer_name,o.order_date from orders o,products p,order_detail d where o.order_id = d.order_id and d.p_id = p.p_id and p_name = 'Flagyl';
2)select o.order_id,o.customer_name,o.order_date from orders o,products p,order_detail d where o.order_id = d.order_id and d.p_id = p.p_id and customer_name = 'javed iqbal';
3)select s_id,count(*) from products group by s_id having s_id = (select s_id from suppliers where s_name = 'Munir Brothers');
4)Delete from products where p_name = 'Avil' and type = 'Syrup';
5)select s_name,p_name from products p,suppliers s where city = 'Peshawar' and p.s_id = s.s_id group by p_name,s_name;
6)select count(p_id) from products p,suppliers s where p.s_id = s.s_id and s_name = 'Sanofi Aventis';



Q5)
1)SELECT CUS_LNAME,INV_NUMBER,INV_DATE,CUS_BALANCE FROM CUSTOMER C LEFT OUTER JOIN INVOICE I ON C.CUS_CODE = I.CUS_CODE;
2)SELECT CUS_LNAME,INV_NUMBER,INV_DATE FROM CUSTOMER C,INVOICE I WHERE C.CUS_CODE=I.CUS_CODE;
3)SELECT CUS_LNAME,I.INV_NUMBER,INV_DATE,P_DESCRIPT FROM CUSTOMER C,INVOICE I,LINE L,PRODUCT P  WHERE C.CUS_CODE = I.CUS_CODE AND I.INV_NUMBER = L.INV_NUMBER AND P.P_CODE = L.P_CODE;
4)SELECT I.INV_NUMBER,INV_DATE,P_DESCRIPT FROM CUSTOMER C,INVOICE I,LINE L,PRODUCT P  WHERE C.CUS_CODE = I.CUS_CODE AND I.INV_NUMBER = L.INV_NUMBER AND P.P_CODE = L.P_CODE;
