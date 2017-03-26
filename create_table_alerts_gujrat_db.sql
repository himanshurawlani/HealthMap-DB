CREATE TABLE alert_gujrat (
message_id int,
priority number(2) NOT NULL,
message varchar2(35) NOT NULL
);

ALTER TABLE alert_gujrat
ADD CONSTRAINT pk_alert_gujrat PRIMARY KEY (message_id);
