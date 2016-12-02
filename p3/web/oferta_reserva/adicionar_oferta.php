<html>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
        <h3>Adicionar Oferta</h3>
        <form action="inserir_oferta.php" method="post">
            <p>Morada: <input type="text" name="morada"/></p>
            <p>Código: <input type="text" name="code"/></p>
            <p>Data de Início: <input type="date" name="start_date"/></p>
            <p>Data de Fim: <input type="date" name="end_date"/></p>
            <p>Tarifa: <input type="number" min="0" name="tarifa"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
        <div style="text-align:center;"><a href="gerir_oferta_reserva.php">Voltar</a></div>
    </body>
</html>