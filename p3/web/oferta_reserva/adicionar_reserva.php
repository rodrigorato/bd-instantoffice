<html>
<head>
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8">
    <style type="text/css">
        body
        {
            font-family: Verdana, Geneva, sans-serif;   
        }
        h1,h2,h3,table
        {
            text-align: center;
        }
        .menu
        {
            text-align: center;
        }
    </style>
</head>
    <body>
        <h3>Reservar Oferta</h3>
        <form action="inserir_reserva.php" method="post">
            <p>Morada: <input type="text" name="morada"/></p>
            <p>Código: <input type="text" name="code"/></p>
            <p>Data de Início: <input type="date" name="start_date"/></p>
            <p>NIF: <input type="number" min="0" name="nif"/></p>
            <p>Numero de Reserva: <input type="text" name="number"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>