create trigger ver_dist
after insert on alerts
for each row
begin
insert into ver_u1@link_to_maharashtra
values(:new.message_id,:new.state_name,:new.message);
insert into ver_u2@link_to_gujrat
values(:new.message_id,:new.state_name,:new.priority);
end;
/

commit;