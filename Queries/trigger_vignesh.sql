create or replace trigger ins_vignesh
instead of insert on alert_mah_view
for each row
begin
insert into alert_main@link_to_jayesh1
values(:new.state,:new.priority,:new.msgid,:new.message);
end;
/

create or replace trigger ins_vignesh_hc
instead of insert on hc_center_mah_view
for each row
begin
insert into hc_center_main@link_to_jayesh1
values(:new.center_id,:new.center_name,:new.center_loc,:new.center_type);
end;
/

create or replace trigger ins_vignesh_patients
instead of insert on patients_mah_view
for each row
begin
insert into patients_main@link_to_jayesh1
values(:new.center_id,:new.patient_name,:new.patient_loc,:new.patient_age,:new.disease,:new.gender,:new.aadhar_no);
end;
/

create or replace trigger del_vignesh
instead of delete on alert_mah_view
for each row
begin
delete from alert_main@link_to_jayesh1
where msgid=:old.msgid;
end;
/

create or replace trigger del_vignesh_hc
instead of delete on hc_center_mah_view
for each row
begin
delete from hc_center_main@link_to_jayesh1
where center_id=:old.center_id;
end;
/

create or replace trigger del_vignesh_patients
instead of delete on patients_mah_view
for each row
begin
delete from patients_main@link_to_jayesh1
where aadhar_no=:old.aadhar_no;
end;
/