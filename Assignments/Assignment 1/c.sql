insert into FACILITY (facno,facname) values ('F104','Swimming Pool');
INSERT INTO LOCATION (locno,facno,locname) values ('L107','F104','Door');
INSERT INTO LOCATION (locno,facno,locname) values ('L108','F104','Locker Room');
update LOCATION SET locname = 'Gate' where locname = 'Door';
Delete from LOCATION where locname = 'Locker Room';

