/************************
*	    Table Population	*
*		     Grupo 19		    *
*************************/


INSERT INTO reserva Values('314159');
INSERT INTO reserva Values('265358');
INSERT INTO reserva Values('979323');
INSERT INTO reserva Values('846264');
INSERT INTO reserva Values('338327');
INSERT INTO reserva Values('950288');
INSERT INTO reserva Values('419716');
INSERT INTO reserva Values('939937');
INSERT INTO reserva Values('510582');

INSERT INTO user VALUES('111111111', 'John Smith', '211111111');
INSERT INTO user VALUES('222222222', 'Muhammed Lee', '212222222');
INSERT INTO user VALUES('333333333', 'Barry Allen', '213333333');
INSERT INTO user VALUES('444444444', 'Jake Peralta', '214444444');
INSERT INTO user VALUES('555555555', 'Annalise Keating', '215555555');
INSERT INTO user VALUES('666666666', 'Robin Scherbatsky', '216666666');
INSERT INTO user VALUES('777777777', 'Hermione Granger', '217777777');
INSERT INTO user VALUES('888888888', 'James Moriarty', '218888888');
INSERT INTO user VALUES('999999999', 'Dirk Gently', '219999999');


INSERT INTO edificio VALUES('221B Baker Street');
INSERT INTO edificio VALUES('31 Spooner Street');
INSERT INTO edificio VALUES('42 Wallaby Way');
INSERT INTO edificio VALUES('742 Evergreen Terrace');
INSERT INTO edificio VALUES('4 Privet Drive');
INSERT INTO edificio VALUES('2311N Los Robles Avenue');
INSERT INTO edificio VALUES('12 Grove Street');
INSERT INTO edificio VALUES('12 Arbour Road');
INSERT INTO edificio VALUES('Wayne Mannor, 1007 Mountain Drive');


INSERT INTO alugavel VALUES('4 Privet Drive', '7', '4PrivetDrive_7.jpg');
INSERT INTO alugavel VALUES('4 Privet Drive', '1', '4PrivetDrive_1.jpg');
INSERT INTO alugavel VALUES('742 Evergreen Terrace', '1', '742EvergreenTerrace_1.jpg');
INSERT INTO alugavel VALUES('221B Baker Street', '22', '221BBakerStreet_22.jpg');
INSERT INTO alugavel VALUES('42 Wallaby Way', '98173', '42WallabyWay_98173.jpg');
INSERT INTO alugavel VALUES('2311N Los Robles Avenue', '127', '2311NLosRoblesAvenue_127.jpg');
INSERT INTO alugavel VALUES('2311N Los Robles Avenue', '816', '2311NLosRoblesAvenue_816.jpg');
INSERT INTO alugavel VALUES('2311N Los Robles Avenue', '89132', '2311NLosRoblesAvenue_89132.jpg');


INSERT INTO fiscal Values(1337, 'Aperture Science Inc.');
INSERT INTO fiscal Values(1998, 'Black Mesa Research Facility');
INSERT INTO fiscal Values(1921, 'Stark Industries');
INSERT INTO fiscal Values(8080, 'Monsters Inc.');
INSERT INTO fiscal Values(9822, 'Los Pollos Hermanos');


INSERT INTO arrenda VALUES('4 Privet Drive', '7', '111111111');
INSERT INTO arrenda VALUES('4 Privet Drive', '1', '999999999');
INSERT INTO arrenda VALUES('742 Evergreen Terrace', '1', '333333333');
INSERT INTO arrenda VALUES('221B Baker Street', '22', '444444444');
INSERT INTO arrenda VALUES('42 Wallaby Way', '98173', '999999999');
INSERT INTO arrenda VALUES('2311N Los Robles Avenue', '127', '333333333');


INSERT INTO fiscaliza VALUES(1337, '4 Privet Drive', '7');
INSERT INTO fiscaliza VALUES(8080, '4 Privet Drive', '1');
INSERT INTO fiscaliza VALUES(1337, '742 Evergreen Terrace', '1');
INSERT INTO fiscaliza VALUES(1921, '221B Baker Street', '22');
INSERT INTO fiscaliza VALUES(9822, '42 Wallaby Way', '98173');
INSERT INTO fiscaliza VALUES(8080, '2311N Los Robles Avenue', '127');


INSERT INTO espaco VALUES('4 Privet Drive', '7');
INSERT INTO espaco VALUES('221B Baker Street', '22');
INSERT INTO espaco VALUES('42 Wallaby Way', '98173');
INSERT INTO espaco VALUES('2311N Los Robles Avenue', '127');


INSERT INTO posto VALUES('2311N Los Robles Avenue', '89132', '127');
INSERT INTO posto VALUES('4 Privet Drive', '1', '7');
INSERT INTO posto VALUES('2311N Los Robles Avenue', '816', '127');


INSERT INTO oferta VALUES('742 Evergreen Terrace', '1', '1989-12-17', '1990-01-17', 486.52);
INSERT INTO oferta VALUES('221B Baker Street', '22', '1987-01-01', '1990-02-25', 500.00);
INSERT INTO oferta VALUES('42 Wallaby Way', '98173', '2003-05-30', '2003-10-30', 742.33);
INSERT INTO oferta VALUES('42 Wallaby Way', '98173', '2016-06-08', '2016-12-08', 133.37);
INSERT INTO oferta VALUES('42 Wallaby Way', '98173', '2014-02-28', '2016-02-28', 808.00);
INSERT INTO oferta VALUES('2311N Los Robles Avenue', '127', '2010-07-29', '2016-01-03', 1233.99);

INSERT INTO aluga VALUES('221B Baker Street', '22', '1987-01-01', '111111111', '314159');
INSERT INTO aluga VALUES('42 Wallaby Way', '98173', '2003-05-30', '111111111', '265358');
INSERT INTO aluga VALUES('42 Wallaby Way', '98173', '2016-06-08', '333333333', '979323');
INSERT INTO aluga VALUES('2311N Los Robles Avenue', '127', '2010-07-29', '666666666', '846264');


INSERT INTO paga VALUES('314159', '1987-01-02 00:00:00', 'BSC0D31');
INSERT INTO paga VALUES('265358', '2003-06-30 00:00:00', 'BSC0D32');
INSERT INTO paga VALUES('979323', '2016-07-08 00:00:00', 'BSC0D33');


-- 'YYYYMMDDHHMMSS' -> The format of a timestamp
INSERT INTO estado VALUES('314159', '1987-01-02-13-13-13', 'Pendente');
INSERT INTO estado VALUES('314159', '1987-01-02-13-33-37', 'Paga');
INSERT INTO estado VALUES('265358', '2003-06-30-04-08-15', 'Paga');
INSERT INTO estado VALUES('979323', '2016-07-08-16-23-42', 'Paga');
INSERT INTO estado VALUES('846264', '2016-09-08-11-22-33', 'Pendente');

