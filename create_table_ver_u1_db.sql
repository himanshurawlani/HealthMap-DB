/*Creation of user ver_u1 (Vertical user1) */
create table ver_u1(
message_id number,
state_name varchar2(12),
message varchar2(35)
);

/*Setting primary key*/
alter table ver_u1
add constraint pk_ver_u1 primary key(message_id);