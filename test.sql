declare
	name varchar(10);
Begin
	select table_name
	into name
	from user_tables; 
end;
/

/*

ddl
create table username.table_name(
);

dml
select * from table_name@link_name;
*/