create table reserva_estrela(
    numero varchar(255) not null unique,
    montante_pago numeric(19,4) not null,
    duracao_dias int not null,

    nif varchar(9) not null,
    morada_codigo varchar(510) not null,
    tempo time,	not null
    data date, not null
    foreign key(nif) references user(nif),
    foreign key(morada_codigo) references local_dime(morada_codigo),
    foreign key(tempo) references tempo_dim(tempo),
    foreign key(data) references data_dim(data)
    primary key(numero, nif, morada_codigo, tempo, data));


create table tempo_dim(
	tempo time not null,
	hora int not null,
	minuto int not null,

	primary key(tempo)
);

create table data_dim(
	data date not null,
	dia int not null,
	semana int not null,
	mes int not null,
	semestre int not null,
	ano int not null,
	primary key(data);
);

create table local_dim(
	morada_codigo varchar(510) not null,
	edificio varchar(255) not null,
	espaco varchar(255) not null,
	posto varchar (255),
	primary key(morada_codigo)
);

create table user_dim(--not sure if necessary
	nif varchar(9) not null,
	primary key(nif)
);
