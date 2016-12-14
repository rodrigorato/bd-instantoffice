delimiter //

drop procedure if exists buildtimedimension//

create procedure buildtimedimension ()
begin
	declare begin_time TIME;
	delete from tempo_dim;
	set begin_time = '00:00:00';
	while begin_time <= '23:59:00' do
		insert into tempo_dim(`tempo`,`hora`,`minuto`) 
			values (TIME(begin_time),HOUR(begin_time),MINUTE(begin_time));
		set begin_time = ADDTIME(begin_time, '0:1:0.0');
	end while;
end//
delimiter ;

delimiter //

drop procedure if exists builddatedimension//

create procedure builddatedimension ()
begin
	declare begin_date DATE;
	delete from data_dim;
	set begin_date = '2016-1-1';
	while begin_date <= '2017-12-31' do
		insert into data_dim(`data`,`dia`,`semana`,`mes`,`semestre`,`ano`) 
			values (DATE(begin_date),DAY(begin_date),WEEK(begin_date),MONTH(begin_date),IF(MONTH(begin_date) < 7, 1, 2),YEAR(begin_date));
		set begin_date = DATE_ADD(begin_date, INTERVAL 1 DAY);
	end while;
end//
delimiter ;


call buildtimedimension();

call builddatedimension();

INSERT INTO user_dim SELECT * from user;

insert into local_dim(`morada_codigo`,`edificio`,`espaco`,`posto`)
SELECT CONCAT(morada,codigo),morada,codigo_espaco,codigo
FROM posto;


insert into local_dim(`morada_codigo`,`edificio`,`espaco`)
SELECT CONCAT(morada,codigo),morada,codigo
FROM espaco;

INSERT INTO reserva_estrela(`numero`,`nif`,`duracao_dias`,`montante_pago`,`morada_codigo`,`data`,`tempo`)
SELECT numero,nif,datediff(data_fim,data_inicio),datediff(data_fim,data_inicio)*tarifa,
concat(morada,codigo),date(data),time_format(data, '%H:%i')
from aluga NATURAL JOIN oferta NATURAL join paga;