<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
</head>
<body>
	<br />Fomulario de contato<br />
        <form id="form1" action="dao.php" method="post" name="form1">
            <h1>Fomulário de contato</h1>
 
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" />
 
            <label for="email">E-mail</label>           
            <input id="email" type="text" name="email" />
 
            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" cols="45" name="mensagem" rows="5"></textarea>
            <input id="button" type="submit" name="button" value="Enviar" />
        </form>
        
</body>
</html>