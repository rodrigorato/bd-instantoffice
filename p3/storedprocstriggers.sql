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
        DECLARE data_inicio_cur, data_fim_cur DATE;
        DECLARE done INT DEFAULT FALSE;
        DECLARE resultset_cursor CURSOR FOR
              (SELECT data_inicio, data_fim FROM oferta
               WHERE morada = new.morada
               AND codigo = new.codigo);
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE ;

        OPEN resultset_cursor;
        Ofertas_loop: LOOP
            FETCH resultset_cursor into data_inicio_cur, data_fim_cur;
            IF done THEN
                LEAVE Ofertas_loop;
            END IF;
            IF GREATEST(new.data_inicio, data_inicio_cur) <= LEAST(new.data_fim, data_fim_cur) THEN
              CALL ERR_OVERLAPPEDDATES_TRIGGER; -- Calling non existing function because there are no exceptions.
            END IF;
        END LOOP;
        CLOSE resultset_cursor;
    END //
DELIMITER ;

-- Trigger testing statements
-- Should fail after our populate.sql -- INSERT INTO oferta VALUES('2311N Los Robles Avenue', '127', '2009-07-29', '2013-01-03', 1233.99);
-- Fim Trigger 1



-- Trigger 2

DROP TRIGGER IF EXISTS estadoPaga;
DELIMITER //
CREATE TRIGGER estadoPaga BEFORE INSERT ON paga
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

-- Trigger testing statements
-- Should fail after teacher's populate.sql -- INSERT into paga values('2016-12', '2015-01-01 00:00:00', 'Paga');
-- Fim Trigger 2
