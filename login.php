<?php
    session_start();
    // Conexão
    include_once 'php_action/db_connect.php';
    if(isset($_POST['acao'])){
        $usuario = $_POST['usuario'];
        //$senha = $_POST['senha'];
        $senha = '123456';
        
 
                                 
                        
        //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
        //$result_usuario = "SELECT * FROM tb_usuarios WHERE usuario = '$usuario' && senha = '$senha' LIMIT 1";
        $result_usuario = "SELECT * FROM tab_usuarios WHERE usuario = '$usuario' LIMIT 1";
        $resultado_usuario = mysqli_query($connect, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){       
            //var_dump($_POST);
            //die();
            //$info = $sql->fetch();
            if(password_verify($senha, $resultado['senha'])){
                $_SESSION['login'] = true;
                $_SESSION['id'] = $resultado['id'];
                $_SESSION['usuario'] = $resultado['usuario'];
                $_SESSION['nome_completo_usuario'] = $resultado['nome_completo_usuario'];
                $_SESSION['primeiro_nome_usuario'] = $resultado['primeiro_nome_usuario'];
                $_SESSION['foto_usuario_link'] = $resultado['foto_usuario_link'];
                header("Location: main.php");
                die();
            }else{
                //Erro
                echo '<div class="box_erro_login"><p><i class="fas fa-exclamation-circle"></i> Usuário ou senha incorretos!</p></div>';
            }
        }else{
            //Erro
            echo '<div class="box_erro_login"><p><i class="fas fa-exclamation-circle"></i> Usuário não encontrado.</p></div>';
        }
    }
   

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ConsignUp | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST">
              <h1>Entrar</h1>
              <div>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required="" />
              </div>
              <div>
                <input type="password" name="senha" class="form-control" placeholder="Senha" required="" />
              </div>
              <div>
                <input type="submit" value="Entrar" name="acao">
              </div>
              <div>
                <!--<a class="btn btn-default submit" href="main.php">Log in</a>-->
                <a class="reset_pass" href="#">Esqueceu sua senha?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->

                <div class="clearfix"></div>
                <br />

                <div>
                  <!--<h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>-->
                  <h1><i class="fa fa-cube"></i> ConsignUp</h1>
                  <p>©2016 Todos os direitos reservados. ConsignUp Este é um tema Bootstrap. Termos de Privacidade</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> ConsignApha!</h1>
                  <p>©2016 Todos os direitos reservados. ConsignUp é um template Bootstrap 3. Termos de Privacidade</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>


