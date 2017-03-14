CREATE TABLE alert_maharashtra (
message_id int,
priority number(2) NOT NULL,
message varchar2(35) NOT NULL
);

ALTER TABLE alert_maharashtra
ADD CONSTRAINT pk_alert_maharashtra PRIMARY KEY (message_id);

/* Creating a sequence so as to AUTO INCREMENT the primary key field */
create sequence alert_maharashtra_id
start with 1
maxvalue 9999
nocycle;

/* Setting up trigger to be called on every insertion */
CREATE OR REPLACE TRIGGER alert_maharashtra_trigger
before insert on alert_maharashtra
for each row
begin 
	Select alert_maharashtra_id.nextval
	into :new.message_id
	from dual;
end;
/