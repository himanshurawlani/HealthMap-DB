create or replace trigger dist_frag
after insert on alert_main
for each row
begin
if :new.state='maharashtra' then
insert into alert_mah@link_to_vignesh
values(:new.state,:new.priority,:new.msgid,:new.message);
else
insert into alert_guj@link_to_himanshu
values(:new.state,:new.priority,:new.msgid,:new.message);
end if;
end;
/

create or replace trigger dist_hc_frag
after insert on hc_center_main
for each row
begin
if :new.center_loc='maharashtra' then
insert into hc_center_mah@link_to_vignesh
values(:new.center_id,:new.center_name,:new.center_loc,:new.center_type);
else
insert into hc_center_guj@link_to_himanshu
values(:new.center_id,:new.center_name,:new.center_loc,:new.center_type);
end if;
end;
/

create or replace trigger dist_patient_frag
after insert on patients_main
for each row
begin
if :new.patient_loc='maharashtra' then
insert into patients_mah@link_to_vignesh
values(:new.center_id,:new.patient_name,:new.patient_loc,:new.patient_age,:new.disease,:new.gender,:new.aadhar_no);
else
insert into patients_guj@link_to_himanshu
values(:new.center_id,:new.patient_name,:new.patient_loc,:new.patient_age,:new.disease,:new.gender,:new.aadhar_no);
end if;
end;
/

create or replace trigger del_frag
before delete on alert_main
for each row
begin
if :old.state='maharashtra' then
delete from alert_mah@link_to_vignesh
where msgid=:old.msgid;
else
delete from alert_guj@link_to_himanshu
where msgid=:old.msgid;
end if;
end;
/

create or replace trigger del_hc_frag
before delete on hc_center_main
for each row
begin
if :old.center_loc='maharashtra' then
delete from hc_center_mah@link_to_vignesh
where center_id=:old.center_id;
else
delete from hc_center_guj@link_to_himanshu
where center_id=:old.center_id;
end if;
end;
/

create or replace trigger del_patient_frag
before delete on patients_main
for each row
begin
if :old.patient_loc='maharashtra' then
delete from patients_mah@link_to_vignesh
where aadhar_no=:old.aadhar_no;
else
delete from patients_guj@link_to_himanshu
where aadhar_no=:old.aadhar_no;
end if;
end;
/