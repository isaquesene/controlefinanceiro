<?php
 
 include 'conectar.php';

//CURD 
if(isset($_POST['send'])){
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $pagamento = $_POST['pagamento'];
    $categoria = $_POST['categoria'];
    $dataent = $_POST['dataent'];
    $ent_saida = $_POST['ent_saida'];


    $request = "insert into financa(descricao, valor, pagamento, categoria, dataent, ent_saida) values 
    ('$descricao','$valor','$pagamento','$categoria','$dataent','$ent_saida')";


    mysqli_query($conn, $request);

    echo 'Sucesso!';
    //header('location:statuscrud.php');
}else{
    echo '';
}
?>