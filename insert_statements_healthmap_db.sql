
insert into alerts
values (1,'maharashtra',6,'Air borne disease');
	
insert into alerts
values (1,'maharashtra',6,'Water borne disease');

insert into alerts
values (1,'maharashtra',6,'Swine Flu');
	
insert into alerts
values (1,'gujrat',6,'Typhoid');

delete from alerts
where state_name='maharashtra' and message_id=1;

/* Don't forget to commit */
commit;