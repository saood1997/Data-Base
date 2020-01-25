SELECT DISTINCT city,state,zip from CUSTOMER;
SELECT EMPNAME,DEPARTMENT,PHONE,EMAIL FROM EMPLOYEE WHERE PHONE LIKE '3-%';
SELECT * from RESOURCETBL where rate between 10 and 20 order by rate;
SELECT eventno,dateauth,status FROM EVENTREQUEST WHERE status in('Approved','Denied') and dateauth like '2013-07%';
SELECT locno,locname from LOCATION WHERE facno = (
				select facno from FACILITY 
					WHERE facname = 'Basketball arena'
				);

SELECT planNo,count(planNo),sum(NumberFld) from EVENTPLANLINE GROUP BY planNo;
