<html><title>ECT - Sistema Integrado de Chamados</title>

<style>

.pendente{
    color: red;
}
.resolvido{
    color: green;
}

.mdl-dialog__content{
    height: 100%;
}
</style>

<script>
    setTimeout(function() {
  location.reload();
}, 50000);
</script>



<?php

//$sql = "SELECT * FROM `chamados` WHERE `status` = 'Pendente'";
//$listarchamados = "SELECT * FROM `chamados`";


if(isset($_COOKIE['admin'])){
    if(isset($_GET['inicio']) == 1 ){
        $listarchamados = "SELECT * FROM `chamados`  ORDER BY `chamados`.`status` ASC";
    }
    if(isset($_GET['listar']) == 1 ){
        $listarchamados = "SELECT * FROM `chamados` WHERE `solicitacao` = '" . $_GET['listar'] . "'  ORDER BY `chamados`.`status` ASC";    
    }
}
if (isset($_COOKIE['usuario'])) {
    $listarchamados = "SELECT * FROM `chamados` WHERE `solicitacao` = '". $_COOKIE['usuario'] ."'  ORDER BY `chamados`.`status` ASC";
}
if (isset($_COOKIE['tecnico'])) {
    $listarchamados = "SELECT * FROM `chamados`  ORDER BY `chamados`.`status` ASC";
}


$result = $conn->query($listarchamados);

    echo " <table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">\n";
    echo "  <thead>\n";
    echo "    <tr>\n";
    echo "      <th class=\"mdl-data-table__cell--non-numeric\"> IDº CH</th>\n";
    echo "      <th class=\"mdl-data-table__cell--non-numeric\">NOME DO DISPOSITIVO</th>\n";
    echo "      <th class=\"mdl-data-table__cell--non-numeric\">USUARIO</th>\n";
    echo "      <th class=\"mdl-data-table__cell--non-numeric\">MOTIVO</th>\n";
    echo "      <th class=\"mdl-data-table__cell--non-numeric\">ABERTURA</th>\n";
    echo "      <th class=\"mdl-data-table__cell--non-numeric\">DESCRIÇÃO</th>\n";
    echo "      <th class=\"mdl-data-table__cell--non-numeric\">SITUAÇÃO</th>\n";

    echo "    </tr>\n";
    echo "  </thead>\n";
    echo "  <tbody>\n";
    echo "    <tr>\n";


if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "      <td class=\"mdl-data-table__cell--non-numeric\"><div class=\"material-icons mdl-badge mdl-badge--overlap\" data-badge=\"". $row["idchamado"] . "\">tag</div></td>\n";
//    echo "      <td class=\"mdl-data-table__cell--non-numeric\">". $row["numaquina"] . "</td>\n";
    echo "<td class=\"mdl-data-table__cell--non-numeric\"><button class=\"mdl-button mdl-js-button mdl-button--raised\"><b>". $row["numaquina"] . "</b></button></td>";
    echo "      <td class=\"mdl-data-table__cell--non-numeric\" style=\"text-transform: uppercase;\"><b>". $row["solicitacao"] . "</b></td>\n";
    echo "      <td class=\"mdl-data-table__cell--non-numeric\">". $row["problema"] . "</td>\n";
    echo "      <td class=\"mdl-data-table__cell--non-numeric\"><b>". $row["data"] . "</b></td>\n";




//  echo "      <td class=\"mdl-data-table__cell--non-numeric\">". $row["descricao"] . "</td>\n";
//  echo '<td><textarea disabled class="mdl-textfield__input caption" type="text" rows= "1" name="descricao" id="descricao" >'. $row["descricao"] .'</textarea></td>';


echo "<td><button onclick=\"myFunction". $row["idchamado"] . "()\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\">\n";
echo "  VER\n";
echo "</button>\n";
echo "<script>\n";
echo "function myFunction". $row["idchamado"] . "() {\n";
echo "  window.alert(\"". $row["descricao"] ."\");\n";
echo "}\n";
echo "</script>\n";
echo "</td>";



if (empty($row['status'] == 'Resolvido')){
        echo "<td class=\"status-tag mdl-data-table__cell--non-numeric\"><span class=\"mdl-chip\">\n";
        echo "    <span class=\"mdl-chip__text\"><b class=\"pendente\">". $row["status"] . "</b></span>\n";
        echo "</span></td>";
}
if (empty($row['status'] == 'Pendente')){
        echo "<td class=\"status-tag mdl-data-table__cell--non-numeric\"><span class=\"mdl-chip\">\n";
        echo "    <span class=\"mdl-chip__text\"><b class=\"resolvido\">". $row["status"] . "</b></span>\n";
        echo "</span></td>"; 
}



if (isset($_COOKIE['admin'])) {
        echo "<td><a class=\"taskbtn\" href=\"?resolvtask=". $row["idchamado"] . "\"><i class=\"material-icons taskbtn\">verified</i></a></td>";
        echo "<td><a class=\"taskbtn\" href=\"?returntask=". $row["idchamado"] . "\"><i class=\"material-icons taskbtn\">settings_backup_restore</i></a></td>";
        echo "<td><a class=\"taskbtn\" href=\"?deletetask=". $row["idchamado"] . "\"><i class=\"material-icons taskbtn\">delete</i></a></td>";
}
if (isset($_COOKIE['usuario'])){
        echo "<td><a class=\"taskbtn\" href=\"?resolvtask=". $row["idchamado"] . "\"><i class=\"material-icons taskbtn\">verified</i></a></td>";
}
if (isset($_COOKIE['tecnico'])){
        echo "<td><a class=\"taskbtn\" href=\"?resolvtask=". $row["idchamado"] . "\"><i class=\"material-icons taskbtn\">verified</i></a></td>";
        echo "<td><a class=\"taskbtn\" href=\"?returntask=". $row["idchamado"] . "\"><i class=\"material-icons taskbtn\">settings_backup_restore</i></a></td>"; 
}

    echo "    </tr>\n";
}
} else {
    echo "0 results";
}
    echo "   \n";
    echo "  </tbody>\n";
    echo "</table>";


$conn->close();
?>