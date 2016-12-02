/************************
*		Queries         *
*		Grupo 19		*
*************************/

-- Query #1 -- espaços c/postos nunca alugados
SELECT e.morada, e.codigo
FROM espaco e, posto p
WHERE e.morada = p.morada AND
      e.codigo = p.codigo_espaco AND
      (p.morada, p.codigo)  NOT IN (SELECT morada, codigo FROM aluga)
GROUP BY e.morada, e.codigo;


-- Query #2 -- edificios com #reservas > avg(#reservas)
SELECT morada
FROM aluga a
GROUP BY morada
HAVING count(*) >= (SELECT avg(r.num_reservas) as avg_num_reservas
                    FROM (SELECT COUNT(*) as num_reservas
                          FROM aluga a
                          GROUP BY morada) as r);


-- Query #3 -- users c/alugaveis fiscalizados por um so fiscal
SELECT DISTINCT u.*
FROM fiscaliza f, arrenda a, user u
WHERE f.codigo = a.codigo
      AND a.morada = f.morada
      AND u.nif = a.nif
GROUP BY u.nif
HAVING COUNT(DISTINCT f.id) = 1;


-- Query #4 -- montante pago p/espaco em 2016 (total ou p/postos)
SELECT DISTINCT morada, codigo,
                SUM(DATEDIFF(data_fim, data_inicio)*tarifa) as montante_pago_2016 -- montante por espaços pagos
FROM paga NATURAL JOIN aluga NATURAL JOIN espaco NATURAL JOIN oferta NATURAL JOIN  estado
WHERE
      estado = 'Aceite' AND
      YEAR(time_stamp) = 2016
GROUP BY morada, codigo
UNION
SELECT DISTINCT morada, codigo_espaco,
                SUM(DATEDIFF(data_fim, data_inicio)*tarifa) as montante_pago_2016 -- montante por postos pagos
FROM paga NATURAL JOIN aluga NATURAL JOIN posto NATURAL JOIN oferta NATURAL JOIN  estado
WHERE
      estado = 'Aceite' AND
      YEAR(time_stamp) = 2016
GROUP BY morada, codigo_espaco;


-- Query #5 -- espacos com postos todos alugados
SELECT morada, codigo_espaco as codigo
FROM posto p NATURAL JOIN oferta o NATURAL JOIN estado e NATURAL JOIN aluga a
WHERE estado = 'Aceite'
GROUP BY codigo_espaco
HAVING COUNT(codigo) = (SELECT count(p2.codigo)
                        FROM posto p2
                        WHERE p2.codigo_espaco = p.codigo_espaco AND
                              p2.morada = p.morada
                        GROUP BY p2.codigo_espaco);
