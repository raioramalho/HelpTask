<!-- <script>
    setTimeout(function () {
        location.reload();
    }, 10000);
   </script>
   Two Line List with secondary info and action -->
   <style>
    .demo-list-two {
    width: 300px;
    }
  </style>
  
<title> ECT - Gerênciar Usuários </title>

<form action="?adduser=" method="POST">
<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__supporting-text">
    <h4>Gerênciar Usuários</h4>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <input class="mdl-textfield__input" placeholder="Nome do usuario:" type="text" id="userlogin" name="userlogin" required>
    <input class="mdl-textfield__input" placeholder="Email do usuario:" type="text" id="usermail" name="usermail" required>
    <input class="mdl-textfield__input" placeholder="Senha do usuario:" type="password" id="usersenha" name="usersenha" required>
    <input class="mdl-textfield__input" placeholder="Setor de usuario:" type="text" id="usersetor" name="usersetor" required>
    <p> Setores: usuario, tecnico, administrativo </p>
  <div class="mdl-card__actions mdl-card--border">
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">ADICIONAR USUARIO</button>
  </div>
      
  </div>
</div>
</form>

  
<br>
  </br>

  <?php


$listarusuarios = "SELECT * FROM `usuario`";
$listresult = $conn->query($listarusuarios);

if ($listresult->num_rows > 0) {
    while($row = $listresult->fetch_assoc()) {        
        echo '<table class="mdl-data-table mdl-js-data-table">';
        echo '<tbody>';
        echo '<td class="mdl-data-table__cell--non-numeric">';
        //echo '' . $row['idusuario'] . '';
        echo "      <td class=\"mdl-data-table__cell--non-numeric\"><div class=\"material-icons mdl-badge mdl-badge--overlap\" data-badge=\"". $row["idusuario"] . "\">tag</div></td>\n";
        echo '</td>';
        echo '<td class="mdl-data-table__cell--non-numeric">';
        echo '<ul class="demo-list-two mdl-list">';
        echo '<li class="mdl-list__item mdl-list__item--two-line">';
        echo '<span class="mdl-list__item-primary-content">';
        echo '<i class="material-icons mdl-list__item-avatar">person</i>';
        echo '<span style=\'text-transform: uppercase;\'>' . $row['login'] . '</span>';

        $buscaqtd = "SELECT COUNT(*) FROM `chamados` WHERE `solicitacao` = '" . $row['login'] . "'";
        $qtdch = mysqli_query($con, $buscaqtd);
        $qtdchamados = mysqli_fetch_array($qtdch);
        echo '<span class="mdl-list__item-sub-title">(<b> ' . $qtdchamados[0] . ' </b>) Chamados</span>';

        echo '</span>';
        echo '</td>';
        echo '<td class="mdl-data-table__cell--non-numeric">';
        echo '<!-- Accent-colored raised button with ripple -->';
        echo '<a href="?listar=' . $row['login'] . '"><button name="solicitacao" id="solicitacao" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"> CHAMADOS </button></a>';
        echo '</td>';
        echo '<td class="mdl-data-table__cell--non-numeric">';
        echo '<a href="homeadmin.php?deleteuser=' . $row["idusuario"] . '"><button name="solicitacao" id="solicitacao" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"> DELETAR </button></a>';
        echo '</li>';
        echo '</td>';
        echo '</tbody>';
        echo '</table>';
    }
}
else{
        echo "0 results";
}

?>