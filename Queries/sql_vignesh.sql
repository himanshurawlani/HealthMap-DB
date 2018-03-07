 create table alert_mah(
 state varchar2(15),
 priority int,
 msgid int,
 message varchar2(20)
 );

alter table alert_mah
add constraint alert_pk_cons
primary key (msgid);

create table hc_center_mah(
center_id int,
center_name varchar2(20),
center_loc varchar2(15),
center_type varchar2(10)
);

alter table hc_center_mah
add constraint hc_pk_cons
primary key (center_id);

create table patients_mah(
center_id int,
patient_name varchar2(20),
patient_loc varchar2(15),
patient_age int,
disease varchar2(15),
gender varchar2(6),
aadhar_no int
);

alter table patients_mah
add constraint patients_pk_cons
primary key(aadhar_no);

create view alert_mah_view as
select state,priority,msgid,message
from alert_mah;

create view hc_center_mah_view as
select center_id,center_name,center_loc,center_type
from hc_center_mah;

create view patients_mah_view as
select center_id,patient_name,patient_loc,patient_age,disease,gender,aadhar_no
from patients_mah;