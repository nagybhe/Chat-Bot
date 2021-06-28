<?php
// conectando ao banco de dados
$conn = mysqli_connect("localhost", "root", "", "bot") or die("Erro de BD!");

// recebendo mensagem do usuário por meio de ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

// verificando a consulta do usuário para a consulta do banco de dados
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// se a consulta do usuário corresponder à consulta do banco de dados, mostraremos a resposta, caso contrário, ir para a instrução else
if (mysqli_num_rows($run_query) > 0) {
    // buscar reprodução do banco de dados de acordo com a consulta do usuário
    $fetch_data = mysqli_fetch_assoc($run_query);
    // armazenar replay em uma variável que enviaremos para ajax
    $replay = $fetch_data['Resposta'];
    echo $replay;
} else {
    echo "Desculpe, não consigo entender você!";
}
