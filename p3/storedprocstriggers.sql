/************************
*   Stored Procedures   *
*      & triggers       *
*       Grupo 19		*
*************************/

-- Trigger 1
DROP TRIGGER IF EXISTS overlappedDates;
DELIMITER //
CREATE TRIGGER overlappedDates BEFORE INSERT ON oferta
    FOR EACH ROW
    BEGIN
        IF EXISTS(SELECT *
                  FROM oferta
                  WHERE morada = new.morada AND
                        codigo = new.codigo AND
                        ((new.data_inicio BETWEEN data_inicio AND data_fim) OR
                         (new.data_fim BETWEEN data_inicio AND data_fim))) THEN

            CALL ERR_OVERLAPPEDDATES_TRIGGER;
        END IF;
    END //
DELIMITER ;

-- Trigger testing statements
/*
-- these should work(with the populate.sql given by the teachers):
insert into oferta values ('IST', 'Central', '2016-03-01', '2016-03-30', 19.99);
insert into oferta values ('IST', 'Central', '2015-01-01', '2015-01-31', 19.99);
-- these should fail(with the populate.sql given by the teachers):
insert into oferta values ('IST', 'Central', '2016-01-05', '2016-01-10', 19.99);
insert into oferta values ('IST', 'Central', '2015-12-01', '2016-01-20', 19.99);
insert into oferta values ('IST', 'Central', '2016-01-20', '2016-12-30', 19.99);
*/

-- Fim Trigger 1



-- Trigger 2.1
DROP TRIGGER IF EXISTS estadoPaga1;
DELIMITER //
CREATE TRIGGER estadoPaga1 BEFORE INSERT ON paga
    FOR EACH ROW
    BEGIN
      	SET @estado_maxtimestamp = (SELECT MAX(time_stamp)
                                    FROM estado
                                    WHERE numero = new.numero);

        IF @estado_maxtimestamp > new.data THEN
            CALL ERR_ESTADOPAGA_TRIGGER; -- Calling non existing function because there are no exceptions.
        END IF;
            -- ELSE adicionar ao estado??
    END //
DELIMITER ;

-- Trigger 2.2
DROP TRIGGER IF EXISTS estadoPaga2;
DELIMITER //
CREATE TRIGGER estadoPaga2 BEFORE INSERT ON estado
    FOR EACH ROW
    BEGIN
    	SET @paga_data = (SELECT data
    	                  FROM paga
    	                  WHERE numero = new.numero);

    	IF ((!(@paga_data IS NULL)) AND (@paga_data < new.time_stamp)) THEN
    			  CALL ERR_ESTADOPAGA_TRIGGER;
    	END IF;
    END //
DELIMITER ;


-- Trigger testing statements
/*
-- should work:
INSERT INTO reserva VALUES('2016-14');
insert into estado values('2016-14','2016-01-01 00:00:00','Aceite');
insert into estado values('2016-1','2014-01-01 00:00:00','Pendente');
insert into paga values('2016-12','2016-01-02 00:00:00','Dinheiro');

-- should fail:
INSERT into paga values('2016-5', '2015-01-01 00:00:00', 'Paypal');
Insert into estado values ('2016-1', '2017-01-01 00:00:00', 'Aceite');
*/

-- Should fail after teacher's populate.sql -- INSERT into paga values('2016-12', '2015-01-01 00:00:00', 'Paga');
-- Insert into estado values ('2016-01', '2017-01-01 00:00:00', 'Aceite');
-- Fim Trigger 2


