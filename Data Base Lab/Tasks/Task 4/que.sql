1)select first_name,last_name from employees where salary = (select  max(salary) from employees);
2)select employee_id,first_name,last_name from employees where job_id in(select job_id from employees where job_id like '%clerk') and salary = (select  max(salary) from employees where job_id like '%clerk');
3)select first_name,last_name,salary from employees where job_id like '%man' and salary > (select max(salary) from employees where job_id like '%clerk');
4)select first_name,salary from employees where job_id = 'clerk' and salary > (select min(salary) from employees where job_id like '%man');
5)select first_name,last_name,salary from employees where  salary > (select salary from employees where last_name like '%Jones') or salary>(select salary from employees where last_name like '%Scott');
6)select first_name salary from employees where department_id = '100' and salary > (select avg(salary) from employees where department_id = '100' );
7)select first_name,last_name,salary from employees where department_id = '100' and salary = (select max(salary) from employees where department_id = '100' );
8)select first_name,job_id from employees where department_id = '20' and job_id like '%man';
9)select first_name, from employees where job_id like '%man' and salary =  (select max(salary) from employees where job_id like '%man');
10)select first_name, from employees where department_id = '20' and job_id in (select  job_id from employees where department_id = '30');
11)select first_name, from employees where job_id like 'AC%';
12)select first_name, from employees where salary > any (select max(salary) from employees where department_id = '30' or department_id = '20');
13) select first_name, from emp_details_view  where country_name = "Chicago";
14)select first_name,from employees where job_id like'%development' and employee_id in ( select employee_id from employees where department_id = 10);
15)select job_title from emp_details_view where salary > all(select max_salary from jobs where job_title like'%manager');
16)select department_id,max(salary) from employees group by department_id HAVING max(salary)>9000;
17)select first_name, from employees where department_id = 10 and salary > any(select salary from employees where department_id <> 10);
18)select * from employees where employee_id in (select employee_id from departments where location_id in(select location_id from locations where city = 'Munich'));
19)select first_name,department_name from departments d,employees e where d.department_id = e.department_id;
20)select max(salary) from employees where salary<(select max(salary) from employees);
21)select count(employee_id) from emp_details_view group by department_name having count(employee_id)<=2;
