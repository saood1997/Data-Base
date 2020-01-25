SELECT EVENTREQUEST.eventno,EVENTREQUEST.dateheld,COUNT(EVENTPLANLINE.planNo) FROM EVENTREQUEST,EVENTPLANLINE; 

select planno,eventno,workdate,activity from EVENTPLAN where workdate like '2013-12%' AND eventno in (SELECT eventno from EVENTREQUEST WHERE facno = (select facno FROM FACILITY WHERE facname = 'Basketball arena'));

select eventno,dateheld,status,estcost from EVENTREQUEST WHERE custno = (select custno from CUSTOMER WHERE contact = 'Mary Manager')and facno = (select facno from FACILITY WHERE facname = 'Basketball arena') and dateheld between '2013-10-1' and '2013-12-31';

select epl.PlanNo,LineNo,ResName,NumberFld,LocName,TimeStart,TimeEnd  from EVENTPLANLINE epl,RESOURCETBL rt,LOCATION l,EVENTPLAN ep,FACILITY f  where epl.ResNo = rt.ResNo  and l.LocNo = epl.LocNo  and ep.planno=epl.planno  and f.FacNo = l.FacNo   and FacName like 'Basket%'  and Activity like 'Operat%'  and WorkDate between '01-10-2013'  and '31-12-2013';



