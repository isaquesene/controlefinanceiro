<?php
//conexão
include 'conectar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <title>App Financeiro</title>
</head>
<body>

  <!--<a id="button">
    <ion-icon name="chevron-up-outline"></ion-icon> &#x1F815;
  </a>-->
  <div id="progress">
    <span id="progress-value"><ion-icon name="chevron-up-outline"></ion-icon></span>
  </div>

  <!--Navbar Menu-->
  <header>
    <div class="logo">
      <img src="image/dolar.png" alt="">
      <a href="#"  class="header_logo">Financeiro</a>
    </div>
    <nav class="nav" id="nav-menu">
      <ion-icon name="close-outline" class="header_close" id="close-menu"></ion-icon>


      <ul class="nav_list">
        <li class="nav_item"><a href="lista.html" class="nav_link">Listas</a></li>
        <li class="nav_item"><a href="#" class="nav_link">Previsão</a></li>
      </ul>
    </nav>
    <ion-icon name="menu-outline" class="header_toggle" id="toggle-menu"></ion-icon>

  </header>

    <div class="table-container">
      <h1 class="heading"></h1>
      <button class="btn" id="abre">Add</button>
      <input type="text" class="inputsearch" id="myInput" placeholder="Pesquisar" onkeyup='tableSearch()'>
      <table class="table" id="financeiro">
          <thead>
              <tr>
                  <th>Descrição</th>
                  <th>Valor</th>
                  <th>Pagamento</th>
                  <th>Categoria</th>
                  <th>Data</th>
                  <th>Tipo</th>
                  <th>Ação</th>
              </tr>
          </thead>
    <tbody class="table">
      <?php
      @include 'conectar.php';

      $sql = "select * from financa";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <tr>
          <th><?php echo $row['descricao'] ?></th>
          <th><?php echo $row['valor'] ?></th>
          <th><?php echo $row['pagamento'] ?></th>
          <th><?php echo $row['categoria'] ?></th>
          <th><?php echo $row['dataent'] ?></th>
          <th><?php echo $row['ent_saida'] ?></th>

          <td>
            <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="bttn">Editar</i></a>
            <a href="deletar.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="bttn">Excluir</i></a>
          </td>
          </tr>
      <?php
        }
      ?>
    
    </tbody>
  </table>

      <!--Form Add-->
      <div class="modal-container add">
          <div class="modal">
            <form action="crud_financa.php" method="post">
              <input type="text" name="descricao" placeholder="Descrição">
              <input type="text" name="valor" placeholder="Valor"> 
              <input type="text" name="pagamento" placeholder="Pagamento">
              <input type="text" name="categoria" placeholder="Categoria">
              <input type="date" name="dataent"> 
              <div class="divType">
                <select id="type" name="ent_saida" value="ent_saida">
                  <option class="entrada">Entrada</option>
                  <option class="saida">Saída</option>
                </select>
              </div>
              <button  class="btnsalvar" value="submit">Salvar</button>
            </form>
          </div>
      </div>

      <!--SELECT EDIT-->
      <?php
      $id = $_GET['id_financa'];
      $sql = "select * from financa where id_financa = $id limit 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>

      <!--Form Edit-->
      <div class="modal-container editar">
          <div class="modal">
            <form action="">
              <input type="text" name="descricao" value="<?php echo $row['name'] ?>">
              <input type="text" name="valor" value="<?php echo $row['valor'] ?>"> 
              <input type="text" name="pagamento" value="<?php echo $row['pagamento'] ?>">
              <input type="text" name="categoria" value="<?php echo $row['categoria'] ?>">
              <input type="date" name="dataent" value="<?php echo $row['dataent'] ?>"> 
              <div class="divType">
                <select id="type" name="ent_saida" value="ent_saida">
                  <option class="entrada">Entrada</option>
                  <option class="saida">Saída</option>
                </select>
              </div>
              <button  class="btnsalvar" value="submit">Salvar</button>
              <button onclick="history.go(-1)" class="btnVoltar">Voltar</button>
            </form>
          </div>
      </div>
  </div>

  <section class="ends">
    <p>Desenvolvido por Isaque Sene © 2022</p>
  </section>

<!--<script>
   var btn = $('#button');

$(window).scroll(function(){
  if($(window).scrollTop() > 300){
    btn.addClass('show');
  }else{
    btn.removeClass('show');
  }
});

btn.on('click', function(e){
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
}); 
</script>-->

  <!--navbar script-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    
    <script src="js/script.js"></script>
    <script src="js/scroll.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-database.js"></script>

  <!--<script>
    // Your web app's Firebase configuration
    const firebaseConfig = {
      apiKey: "AIzaSyBt88WuddD5lW9whXSPtIjPjCx2zYQ6y1U",
      authDomain: "financeiro-317a4.firebaseapp.com",
      databaseURL: "https://financeiro-317a4-default-rtdb.firebaseio.com",
      projectId: "financeiro-317a4",
      storageBucket: "financeiro-317a4.appspot.com",
      messagingSenderId: "131072115589",
      appId: "1:131072115589:web:bcdcaae05fbb4f342abaec"
    };
  

    

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
  </script>-->
  <script src="js/main.js"></script>

</body>
</html>


 
   
