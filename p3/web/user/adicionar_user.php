<html>
<head>
    <title>BD 2016/2017 - InstantOffice</title>
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
        <h3>Adicionar User</h3>
        <form action="inserir_user.php" method="post">
            <p>NIF: <input type="number" min="0" name="nif"/></p>
            <p>Nome: <input type="text" name="name"/></p>
            <p>Telefone: <input type="text" name="phone"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>