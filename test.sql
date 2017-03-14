declare
	name varchar(10);
Begin
	select table_name
	into name
	from user_tables; 
end;
/