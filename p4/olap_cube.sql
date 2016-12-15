SELECT  espaco, posto, dia, mes, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY espaco, posto, data
UNION
SELECT  espaco, posto, dia, NULL, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY espaco,posto, dia
UNION
SELECT  espaco, posto, NULL, mes, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY espaco, posto, mes
UNION
SELECT  espaco, NULL, dia, mes, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY espaco, data
UNION
SELECT  NULL, posto, dia, mes, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
WHERE posto IS NOT NULL
GROUP BY  posto, data
UNION
SELECT  espaco, posto, NULL, NULL, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY espaco, posto
UNION
SELECT NULL, NULL, dia, mes, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY (data)
UNION
SELECT  espaco, NULL, dia, NULL, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY espaco, dia
UNION
SELECT  espaco, NULL, NULL, mes, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY espaco, mes
UNION
SELECT  NULL, posto, NULL, mes, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
WHERE posto IS NOT NULL
GROUP BY  posto, mes
UNION
SELECT  NULL, posto, dia, NULL, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
WHERE posto IS NOT NULL
GROUP BY  posto, dia
UNION
SELECT  espaco, NULL, NULL, NULL, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY espaco
UNION
SELECT  NULL, posto, NULL, NULL, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
WHERE posto IS NOT NULL
GROUP BY posto

UNION
SELECT NULL, NULL, NULL, mes, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY mes
UNION
SELECT NULL, NULL, dia, NULL, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim
GROUP BY dia
UNION
SELECT NULL, NULL, NULL, NULL, AVG(montante_pago) AS AVG_MONTANTE_PAGO
FROM reserva_estrela NATURAL JOIN data_dim NATURAL JOIN local_dim;