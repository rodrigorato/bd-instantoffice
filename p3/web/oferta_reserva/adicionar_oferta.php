<html>
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
    </body>
</html>