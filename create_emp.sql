create table employee(
	id number(8) NOT NULL,
	fname varchar2(8),
	lname varchar2(8),
	post varchar2(8),
	salary number(7),
	gender varchar2(2)
);

alter table employee
add constraint pk_employee PRIMARY KEY (ID);

create sequence seq_emp_id
start with 1
maxvalue 9999
nocycle;