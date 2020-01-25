INSERT INTO departments(dept_no,dept_name) values(202,'cs');
INSERT INTO departments(dept_no,dept_name) values(205,'EE');
INSERT INTO employees(emp_no,birth_DATE,first_name,last_name,gender,hire_date) values(101,'1997-02-7','saood','rahman','M','2019-02-19');
INSERT INTO employees(emp_no,birth_DATE,first_name,last_name,gender,hire_date) values(389,'1957-02-7','ali','khan','M','2019-01-19');
INSERT INTO dept_emp(emp_no,dept_no,from_date,to_date) values(101,202,'1997-02-7','2019-01-19');
INSERT INTO salaries(emp_no,salary,from_date,to_date) values(101,50000,'1997-02-7','2019-01-19');
INSERT INTO salaries(emp_no,salary,from_date,to_date) values(389,100000,'1997-02-7','2019-01-09');
INSERT INTO titles(emp_no,title,from_date,to_date) values(101,'HR Manager','1997-02-11','2017-01-12');
update departments set dept_name = 'BBA' where dept_no = '202';
update salaries set salary = 56000 where emp_no = '101';
update titles set title = 'lab Instructor' where emp_no = '101';
update employees set hire_date = '2000-03-11' where emp_no = '101';
delete from titles where emp_no = '101';
delete from salaries where salary<60000;



