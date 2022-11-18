<?php    
	// unset cookies
  if(empty($_COOKIE['admin'])){ 
    setcookie($name, '',);
    ini_set("session. cookie_httponly", True); 
  }
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '',);
        setcookie($name, '', time()-01, '');
        setcookie('', null, -1, '');
    }
}

 ?>


<html>
   <title>ECT - Página de Login</title>
   <link rel="stylesheet" href="./css/main.css">
   <link rel="stylesheet" href="./css/material.min.css">
   <script src="./css/material.min.js"></script>
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="./css/color.css" />
   <script src="../css/jquery.min.js"></script>
   <!-- The drawer is always open in large screens. The header is always shown,
      even in small screens. -->
   <div class="mdl-layout mdl-js-layout 
      mdl-layout--fixed-header">
      <header class="mdl-layout__header">
         <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer">
               <img class=logo src="img/logo.png">
               <a class=logo-title>ECT - SISTEMA INTEGRADO DE CHAMADOS - v1.5a</a>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
               mdl-textfield--floating-label mdl-textfield--align-right">
            </div>
         </div>
      </header>
      <main class="mdl-layout__content">
         <br>
         <p></p>
         </b>
         <div class="page-content">
            <!-- Your content goes here -->
            <center>
               <form action="login.php" method="post">
                  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                     <thead>
                        <tr>
                           <th class="mdl-data-table__cell--non-numeric">USUARIO</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td >
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                 <input class="mdl-textfield__input" placeholder="Digite seu usuario:" type="text" id="usuario" name="login" required>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th class="mdl-data-table__cell--non-numeric">SENHA</th>
                        </tr>
                        <tr>
                           <td >
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                 <input class="mdl-textfield__input" placeholder="Digite sua senha:" type="password" id="senha" name="senha" required>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th ><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">ENTRAR</button></th>
                        </tr>
                     </tbody>
                  </table>
               </form>
            </center>
         </div>
      </main>
   </div>
   <footer class="footer mdl-mini-footer"></footer>
</html>