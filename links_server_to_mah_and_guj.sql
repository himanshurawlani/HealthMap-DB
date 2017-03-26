/* Link from Server (Healthmap_DB) to maharashtra */
create public database link link_to_maharashtra 
connect to maharashtra identified by maharashtra using 'Oracle_1';

/* Link from Server (Healthmap_DB) to gujrat */
create public database link link_to_gujrat 
connect to gujrat identified by gujrat using 'Oracle_1';

/* Trigger to distribute the data insered in Healthmap_DB to respective DDB */
CREATE OR REPLACE TRIGGER distributer
AFTER INSERT OR UPDATE ON alerts
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

/* Trigger to maintain data consistency on deletion */
CREATE OR REPLACE TRIGGER deleter
BEFORE DELETE ON alerts
FOR EACH ROW
BEGIN
	if :old.state_name='gujrat' then
		delete from alert_gujrat@link_to_gujrat
		where message_id=:old.message_id;
	else
		delete from alert_maharashtra@link_to_maharashtra
		where message_id=:old.message_id;
	end if;
END;
/
