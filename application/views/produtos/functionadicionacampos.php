<html>
<head>
<script type="text/javascript">
var qtdeCampos = 0;

function addCampos() {
var objPai = document.getElementById("campoPai");
//Criando o elemento DIV;
var objFilho = document.createElement("div");
//Definindo atributos ao objFilho:
objFilho.setAttribute("id","filho"+qtdeCampos);

//Inserindo o elemento no pai:
objPai.appendChild(objFilho);
//Escrevendo algo no filho recém-criado:
document.getElementById("filho"+qtdeCampos).innerHTML = "<input type='text' id='campo"+qtdeCampos+"' name='campo[]' value='Campo com id: "+qtdeCampos+"'> <input type='button' onclick='removerCampo("+qtdeCampos+")' value='Apagar campo'>";
qtdeCampos++;
}

function removerCampo(id) {
var objPai = document.getElementById("campoPai");
var objFilho = document.getElementById("filho"+id);

//Removendo o DIV com id específico do nó-pai:
var removido = objPai.removeChild(objFilho);
}
</script>
</head>
<body><center><br><h2>WebMaster.PT</h2<br>Inserindo Campos em Formulário Dinâmico<br><Br>
<form name="form1" action="formulario.php" method="POST">
<div id="campoPai"></div>
<input type="button" value="Adicionar campos" onclick="addCampos()">
<br><br><input type="submit" value="Enviar">
</form></center>
</body>
</html>



<!-- Formulário gerado de forma automática-->
<center><br><h2>WebMaster.PT</h2<br>Inserindo Campos em Formulário Dinâmico<br><Br></center>
<?php
if(isset($_POST["campo"])) {
    echo "<br><br>
    <b>Formulário:</b><br><br>

    <form name='form' method='POST' action='formulario_envia.php'>
    <table width='100%' border='0' cellspacing='0' cellpadding='5'>
    ";

    // Faz loop pelo array dos campos:
    foreach($_POST["campo"] as $campo) {
    $nome_arquivo = $campo;
    
    $nome_arquivo = str_replace('E','e',$nome_arquivo);
    $nome_arquivo = str_replace('í','i',$nome_arquivo);
    $nome_arquivo = str_replace('ç','c',$nome_arquivo);
    $nome_arquivo = str_replace('N','n',$nome_arquivo);

        echo "<tr><td>$campo</td> <td><input type='text' name='campo[$nome_arquivo]' size='40'></td></tr>";
    }
}else{
        echo "Você não adicionou dados em nenhum campo!";
}

echo "<tr><td colspan='2'><center><input type='submit' name='submit' value='enviar'></center></td></tr>
    </table></form>";

?>



<!-- Código fonte da página-->

<center><br><h2>WebMaster.PT</h2<br>Inserindo Campos em Formulário Dinâmico<br><Br></center>
<br><br>
    <b>Formulário:</b><br><br>

    <form name='form' method='POST' action='formulario_envia.php'>
    <table width='100%' border='0' cellspacing='0' cellpadding='5'>
    <tr><td>Nome</td> <td><input type='text' name='campo[nome]' size='40'></td></tr><tr><td>Endereço</td> <td><input type='text' name='campo[endereco]' size='40'></td></tr><tr><td>Telefone</td> <td><input type='text' name='campo[Telefone]' size='40'></td></tr><tr><td colspan='2'><center><input type='submit' name='submit' value='enviar'></center></td></tr>

    </table></form>