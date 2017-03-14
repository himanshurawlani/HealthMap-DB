CREATE TABLE alert_gujrat (
message_id int,
priority number(2) NOT NULL,
message varchar2(35) NOT NULL
);

ALTER TABLE alert_gujrat
ADD CONSTRAINT pk_alert_gujrat PRIMARY KEY (message_id);

/* Creating a sequence so as to AUTO INCREMENT the primary key field */
create sequence alert_gujrat_id
start with 1
maxvalue 9999
nocycle;

/* Setting up trigger to be called on every insertion */
CREATE OR REPLACE TRIGGER alert_gujrat_trigger
before insert on alert_gujrat
for each row
begin 
	Select alert_gujrat_id.nextval
	into :new.message_id
	from dual;
end;
/