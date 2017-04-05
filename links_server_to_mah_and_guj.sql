/* Link from Server (Healthmap_DB) to maharashtra 
 * Create in Healthmap_DB user
 */
create public database link link_to_maharashtra 
connect to maharashtra identified by main using 'XE';

/* Link from Server (Healthmap_DB) to gujrat */
create public database link link_to_gujrat 
connect to gujrat identified by main using 'XE';

/* Trigger to distribute the data insered in Healthmap_DB to respective DDB */
CREATE OR REPLACE TRIGGER distributer
AFTER INSERT ON alerts
FOR EACH ROW
BEGIN
	if :new.state_name='gujrat' then
		insert into alert_gujrat@link_to_gujrat
		values (:new.message_id,:new.priority,:new.message);
	else
		insert into alert_maharashtra@link_to_maharashtra
		values (:new.message_id,:new.priority,:new.message);
	end if;
END;
/

/* Errors

SQL> select * from alert_gujrat@link_to_gujrat;
select * from alert_gujrat@link_to_gujrat
                           *
ERROR at line 1:
ORA-12154: TNS:could not resolve the connect identifier specified

*/