SELECT edificio, espaco, posto, dia, mes, AVG(montante_pago)
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY morada_codigo, data
UNION
SELECT edificio, espaco, posto, null, null, AVG(montante_pago) as AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY (morada_codigo)
UNION
SELECT null,null, null, dia, mes, AVG(montante_pago) as AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY (data)
UNION
SELECT null, null, null, null, null, AVG(montante_pago) as AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim;


