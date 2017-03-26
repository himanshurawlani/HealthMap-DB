CREATE TABLE alert_maharashtra (
message_id int,
priority number(2) NOT NULL,
message varchar2(35) NOT NULL
);

ALTER TABLE alert_maharashtra
ADD CONSTRAINT pk_alert_maharashtra PRIMARY KEY (message_id);
