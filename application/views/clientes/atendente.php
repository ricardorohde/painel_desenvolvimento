<?php
// Recebe os dados e guarda-os em variáveis
$nome = $_POST['nome'];

echo "Seu nome é $nome";
?>

<form id="formulario" name="formulario" method="post" action="clientes">
<input id="nome" name="nome" type="text" />
<br />
<input id="btnenviar" name="btnenviar" type="submit" value="Enviar Dados" />
</form>
