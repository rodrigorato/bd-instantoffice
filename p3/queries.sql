/************************
*		    Queries         *
*				Grupo 19				*
*************************/

-- Query #1
SELECT e.morada, e.codigo -- espaços c/postos nunca alugados
FROM espaco e, posto p
WHERE e.morada = p.morada AND
      e.codigo = p.codigo_espaco AND
      (p.morada, p.codigo)  NOT IN (SELECT morada, codigo FROM aluga)
GROUP BY e.morada, e.codigo;


-- Query #2
SELECT morada -- edificios com #reservas > avg(#reservas)
FROM aluga a
GROUP BY morada
HAVING count(*) >= (SELECT avg(r.num_reservas) as avg_num_reservas
                    FROM (SELECT COUNT(*) as num_reservas
                          FROM aluga a
                          GROUP BY morada) as r);

-- Query #3
SELECT DISTINCT u.* -- users c/alugaveis fiscalizados por um so fiscal
FROM fiscaliza f, arrenda a, user u
WHERE f.codigo = a.codigo
      AND a.morada = f.morada
      AND u.nif = a.nif
GROUP BY f.morada, f.codigo
HAVING COUNT(DISTINCT f.id) = 1;

-- Query #4
/*SELECT * -- montante pago p/espaco em 2016 (total ou p/postos)
FROM oferta o, espaco e
WHERE o.morada = e.morada
      AND o.codigo = e.codigo;

SELECT DISTINCT e.*, SUM(DATEDIFF(o.data_fim, o.data_inicio)*o.tarifa) as montante_pago_2016 -- montante por espaços pagos
FROM paga p, aluga a, espaco e, oferta o, estado est
WHERE p.numero = a.numero AND
      a.morada = e.morada AND
      a.codigo = e.codigo AND
      a.codigo = o.codigo AND
      a.morada = o.morada AND
      est.numero = p.numero AND
      est.estado = 'Aceite' AND
      YEAR(est.time_stamp) = 2016
GROUP BY a.morada, a.codigo
UNION
SELECT DISTINCT pos.morada, pos.codigo_espaco, SUM(DATEDIFF(o.data_fim, o.data_inicio)*o.tarifa) as montante_pago_2016 -- montante por postos pagos
FROM paga p, aluga a, posto pos, oferta o, estado est
WHERE p.numero = a.numero AND
      a.morada = pos.morada AND
      a.codigo = pos.codigo AND
      a.codigo = o.codigo AND
      a.morada = o.morada AND
      est.numero = p.numero AND
      est.estado = 'Aceite' AND
      YEAR(est.time_stamp) = 2016
GROUP BY pos.morada, pos.codigo_espaco;
*/
SELECT DISTINCT morada, codigo, SUM(DATEDIFF(data_fim, data_inicio)*tarifa) as montante_pago_2016 -- montante por espaços pagos
FROM paga NATURAL JOIN aluga NATURAL JOIN espaco NATURAL JOIN oferta NATURAL JOIN  estado
WHERE
      estado = 'Aceite' AND
      YEAR(time_stamp) = 2016
GROUP BY morada, codigo
UNION
SELECT DISTINCT morada, codigo_espaco, SUM(DATEDIFF(data_fim, data_inicio)*tarifa) as montante_pago_2016 -- montante por postos pagos
FROM paga NATURAL JOIN aluga NATURAL JOIN posto NATURAL JOIN oferta NATURAL JOIN  estado
WHERE
      estado = 'Aceite' AND
      YEAR(time_stamp) = 2016
GROUP BY morada, codigo_espaco;



