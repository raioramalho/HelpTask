<html>
    <title>ECT - Abertura de chamados</title>


    <?php 
    if(isset($_COOKIE['admin'])){
      $solicitacao = $_COOKIE['admin'];
  }
  if (isset($_COOKIE['usuario'])) {
    $solicitacao = $_COOKIE['usuario'];
  }
  if (isset($_COOKIE['tecnico'])) {
    $solicitacao = $_COOKIE['tecnico'];
  }

    ?>


            
    <!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 652px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 276px;
  
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>



<form action="?enviar=" method="POST">
   <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
      <thead>
         <tr>
            <th class="mdl-data-table__cell--non-numeric">NUMERO DE MAQUINA</th>
            <th class="mdl-data-table__cell--non-numeric">USUARIO</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td class="mdl-data-table__cell--non-numeric">
               <div class="mdl-textfield mdl-js-textfield">
                  <input class="mdl-textfield__input " value=" " type="text" name="numaquina" id="numaquina">
                  <?php // echo "". $host_name ."";?>
                  
               </div>
            </td>
            <td class="mdl-data-table__cell--non-numeric">
               <div class="mdl-textfield mdl-js-textfield">
                  <input class="mdl-textfield__input" value="<?php echo "". $solicitacao ."";?>" type="text" name="solicitacao" id="solicitacao">
                  
               </div>
            </td>
         </tr>
         <tr>
            <th class="mdl-data-table__cell--non-numeric">MOTIVO</th>
            <th class="mdl-data-table__cell--non-numeric">DESCRIÇÃO</th>
         </tr>
         <tr>
            <td class="mdl-data-table__cell--non-numeric">
               <div class="mdl-textfield mdl-js-textfield">
                  <input class="mdl-textfield__input" value=" " type="text" name="problema" id="problema">
                  
               </div>
            </td>
            <td class="mdl-data-table__cell--non-numeric">
               <div class="mdl-textfield mdl-js-textfield">
                  <textarea class="mdl-textfield__input" value=" " type="text" rows= "3" name="descricao" id="descricao"></textarea>
                  <label class="mdl-textfield__label" for="sample1"><b>Dê uma descrição ao seu chamado:</b></label>
               </div>
            </td>
         </tr>
         <tr>
            <td class="mdl-data-table__cell--non-numeric">
            </td>
            <td>
               <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">Enviar</button>
            </td>
         </tr>
      </tbody>
   </table>
</form>




</html>