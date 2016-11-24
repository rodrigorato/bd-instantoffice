/************************
*	Table Population	*
*		Grupo 19		*
*************************/


INSERT INTO Reserva Values(314159);
INSERT INTO Reserva Values(265358);
INSERT INTO Reserva Values(979323);
INSERT INTO Reserva Values(846264);
INSERT INTO Reserva Values(338327);
INSERT INTO Reserva Values(950288);
INSERT INTO Reserva Values(419716);
INSERT INTO Reserva Values(939937);
INSERT INTO Reserva Values(510582);

INSERT INTO User VALUES(111111, 'John Smith', 211111111);
INSERT INTO User VALUES(222222, 'Muhammed Lee', 212222222);
INSERT INTO User VALUES(333333, 'Barry Allen', 213333333);
INSERT INTO User VALUES(444444, 'Jake Peralta', 214444444);
INSERT INTO User VALUES(555555, 'Annalise Keating', 215555555);
INSERT INTO User VALUES(666666, 'Robin Scherbatsky', 216666666);
INSERT INTO User VALUES(777777, 'Hermione Granger', 217777777);
INSERT INTO User VALUES(888888, 'James Moriarty', 218888888);
INSERT INTO User VALUES(999999, 'Dirk Gently', 219999999);


INSERT INTO Edificio VALUES('221B Baker Street');
INSERT INTO Edificio VALUES('31 Spooner Street');
INSERT INTO Edificio VALUES('42 Wallaby Way');
INSERT INTO Edificio VALUES('742 Evergreen Terrace');
INSERT INTO Edificio VALUES('4 Privet Drive');
INSERT INTO Edificio VALUES('2311N Los Robles Avenue');
INSERT INTO Edificio VALUES('12 Grove Street');
INSERT INTO Edificio VALUES('12 Arbour Road');
INSERT INTO Edificio VALUES('Wayne Mannor, 1007 Mountain Drive');


INSERT INTO Alugavel VALUES('4 Privet Drive', 7, '4PrivetDrive_7.jpg');
INSERT INTO Alugavel VALUES('4 Privet Drive', 1, '4PrivetDrive_1.jpg');
INSERT INTO Alugavel VALUES('742 Evergreen Terrace', 1, '742EvergreenTerrace_1.jpg');
INSERT INTO Alugavel VALUES('221B Baker Street', 22, '221BBakerStreet_22.jpg');
INSERT INTO Alugavel VALUES('42 Wallaby Way', 98173, '42WallabyWay_98173.jpg');
INSERT INTO Alugavel VALUES('2311N Los Robles Avenue', 127, '2311NLosRoblesAvenue_127.jpg');
INSERT INTO Alugavel VALUES('2311N Los Robles Avenue', 816, '2311NLosRoblesAvenue_816.jpg');
INSERT INTO Alugavel VALUES('2311N Los Robles Avenue', 89132, '2311NLosRoblesAvenue_89132.jpg');


INSERT INTO Fiscal Values(1337, 'Aperture Science Inc.');
INSERT INTO Fiscal Values(1998, 'Black Mesa Research Facility');
INSERT INTO Fiscal Values(1921, 'Stark Industries');
INSERT INTO Fiscal Values(8080, 'Monsters Inc.');
INSERT INTO Fiscal Values(9822, 'Los Pollos Hermanos');


INSERT INTO Arrenda VALUES('4 Privet Drive', 7, 111111);
INSERT INTO Arrenda VALUES('4 Privet Drive', 1, 999999);
INSERT INTO Arrenda VALUES('742 Evergreen Terrace', 1, 333333);
INSERT INTO Arrenda VALUES('221B Baker Street', 22, 444444);
INSERT INTO Arrenda VALUES('42 Wallaby Way', 98173, 999999);
INSERT INTO Arrenda VALUES('2311N Los Robles Avenue', 127, 333333);


INSERT INTO Fiscaliza VALUES(1337, '4 Privet Drive', 7);
INSERT INTO Fiscaliza VALUES(8080, '4 Privet Drive', 1);
INSERT INTO Fiscaliza VALUES(1337, '742 Evergreen Terrace', 1);
INSERT INTO Fiscaliza VALUES(1921, '221B Baker Street', 22);
INSERT INTO Fiscaliza VALUES(9822, '42 Wallaby Way', 98173);
INSERT INTO Fiscaliza VALUES(8080, '2311N Los Robles Avenue', 127);


INSERT INTO Espaco VALUES('4 Privet Drive', 7);
INSERT INTO Espaco VALUES('221B Baker Street', 22);
INSERT INTO Espaco VALUES('42 Wallaby Way', 98173);
INSERT INTO Espaco VALUES('2311N Los Robles Avenue', 127);


INSERT INTO Posto VALUES('2311N Los Robles Avenue', 89132, 127);
INSERT INTO Posto VALUES('4 Privet Drive', 1, 7);
INSERT INTO Posto VALUES('2311N Los Robles Avenue', 816, 127);


INSERT INTO Oferta VALUES('742 Evergreen Terrace', 1, '1989-12-17', '1990-01-17', 486.52);
INSERT INTO Oferta VALUES('221B Baker Street', 22, '1987-01-01', '1990-02-25', 500.00);
INSERT INTO Oferta VALUES('42 Wallaby Way', 98173, '2003-05-30', '2003-10-30', 742.33);
INSERT INTO Oferta VALUES('42 Wallaby Way', 98173, '2016-06-08', '2016-12-08', 133.37);
INSERT INTO Oferta VALUES('42 Wallaby Way', 98173, '2014-02-28', '2016-02-28', 808.00);
INSERT INTO Oferta VALUES('2311N Los Robles Avenue', 127, '2010-07-29', '2016-01-03', 1233.99);


INSERT INTO Aluga VALUES('221B Baker Street', 22, '1987-01-01', 111111, 314159);
INSERT INTO Aluga VALUES('42 Wallaby Way', 98173, '2003-05-30', 111111, 265358);
INSERT INTO Aluga VALUES('42 Wallaby Way', 98173, '2016-06-08', 333333, 979323);
INSERT INTO Aluga VALUES('2311N Los Robles Avenue', 127, '2010-07-29', 666666, 846264);


INSERT INTO Paga VALUES(314159, '1987-01-02', 'BSC0D31');
INSERT INTO Paga VALUES(265358, '2003-06-30', 'BSC0D32');
INSERT INTO Paga VALUES(979323, '2016-07-08', 'BSC0D33');


-- 'YYYYMMDDHHMMSS' -> The format of a timestamp
INSERT INTO Estado VALUES(314159, '1987-01-02-13-13-13', 'Pendente');
INSERT INTO Estado VALUES(314159, '1987-01-02-13-33-37', 'Paga');
INSERT INTO Estado VALUES(265358, '2003-06-30-04-08-15', 'Paga');
INSERT INTO Estado VALUES(979323, '2016-07-08-16-23-42', 'Paga');
INSERT INTO Estado VALUES(846264, '2016-09-08-11-22-33', 'Pendente');

