SELECT morada_codigo, data, AVG(montante_pago) as AVG_MONTANTE_PAGO
FROM reserva_estrela
GROUP BY CUBE(morada_codigo, data);
