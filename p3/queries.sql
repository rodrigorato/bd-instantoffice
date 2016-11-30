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
SELECT -- users c/alugaveis fiscalizados por um so fiscal
from fiscaliza f, arrenda a