CREATE TABLE alerts (
message_id int,
state_name varchar2(12) NOT NULL,
priority number(2) NOT NULL,
message varchar2(35) NOT NULL
);

ALTER TABLE alerts
ADD CONSTRAINT pk_alerts PRIMARY KEY (message_id);

/* Creating a sequence so as to AUTO INCREMENT the primary key field */
create sequence alerts_id
start with 1
maxvalue 9999
nocycle;

/* Setting up trigger to be called on every insertion */
CREATE OR REPLACE TRIGGER alerts_trigger
before insert on alerts
for each row
begin 
	Select alerts_id.nextval
	into :new.message_id
	from dual;
end;
/

/* Dropping a sequence */
select sequence_name from user_sequences;
drop sequence sequence_name;
