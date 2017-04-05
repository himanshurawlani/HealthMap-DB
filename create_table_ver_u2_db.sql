/*creation of table ver_u2 (vertical user2)*/
create table ver_u2(
message_id number,
state_name varchar2(12),
priority number(2)
);

/*Adding primary key constraint to ver_u2*/
alter table ver_u2
add constraint pk_ver_u2 primary key(message_id);