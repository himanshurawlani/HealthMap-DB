create table alert_guj(
state varchar2(15),
priority int,
msgid int,
message varchar2(20)
);

alter table alert_guj
add constraint alert_pk_cons
primary key (msgid);

create table hc_center_guj(
center_id int,
center_name varchar2(20),
center_loc varchar2(15),
center_type varchar2(10)
);

alter table hc_center_guj
add constraint hc_pk_cons
primary key (center_id);

create table patients_guj(
center_id int,
patient_name varchar2(20),
patient_loc varchar2(15),
patient_age int,
disease varchar2(15),
gender varchar2(6),
aadhar_no int
);

alter table patients_guj
add constraint patients_pk_cons
primary key(aadhar_no);

create view alert_guj_view as
select state,priority,msgid,message
from alert_guj;

create view hc_center_guj_view as
select center_id,center_name,center_loc,center_type
from hc_center_guj;

create view patients_guj_view as
select center_id,patient_name,patient_loc,patient_age,disease,gender,aadhar_no
from patients_guj;