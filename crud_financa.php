<?php
 
 include 'conectar.php';

//CURD 
if(isset($_POST['send'])){
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $pagamento = $_POST['pagamento'];
    $categoria = $_POST['categoria'];
    $dataent = $_POST['dataent'];
    $ent_sainda = $_POST['ent_sainda'];


    $request = "insert into financa(descricao, valor, pagamento, categoria, dataent, ent_sainda) values 
    ('$descricao','$valor','$pagamento','$categoria','$dataent','$ent_sainda')";


    mysqli_query($conn, $request);

    echo 'Sucesso!';
    //header('location:statuscrud.php');
}else{
    echo '';
}
?>