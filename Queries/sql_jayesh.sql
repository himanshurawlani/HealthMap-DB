create table users(
 username varchar2(20),
 password varchar2(20)
 );

insert into users values('jayesh','abc');
insert into users values('himanshu','abc');
insert into users values('vignesh','abc');

create table alert_main(
   state varchar2(15),
   priority int,
   msgid int,
   message varchar2(20)
   );

 alter table alert_main
 add constraint alert_pk_cons
 primary key (msgid);

 create table hc_center_main(
 center_id int,
 center_name varchar2(20),
 center_loc varchar2(15),
 center_type varchar2(10)
 );

 alter table hc_center_main
 add constraint hc_pk_cons
 primary key (center_id);

create table patients_main(
center_id int,
patient_name varchar2(20),
patient_loc varchar2(15),
patient_age int,
disease varchar2(15),
gender varchar2(6),
aadhar_no int
);

alter table patients_main
add constraint patients_pk_cons
primary key(aadhar_no);

