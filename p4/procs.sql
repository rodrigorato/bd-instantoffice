delimiter //

drop procedure if exists buildtimedimension//

create procedure buildtimedimension ()
begin
	declare begin_time TIME;
	delete from tempo_dim;
	set begin_time = '00:00'
	while begin_time < '23:59' do
		insert into tempo_dim('tempo','hora','minuto') values (TIME(begin_time),HOUR())