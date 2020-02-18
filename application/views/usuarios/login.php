<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>JISA - LOGIN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url('./assets/css/style.css?20190705') ?> ">   
</head>

<body id="login" >

  <div class="container">

    <?php
  
  if ($msg = get_msg()):
      ?>
      <div class = "<?php echo @$msg['class'] ?>" role = "alert">
        <?php echo @$msg['aviso']; ?>
      </div>
      <?php
    endif;
    /** */
    ?>
    <!-- justify-content-lg-center row align-items-center -->
    <div class="row justify-content-lg-center" id="login">
      <div class="col-lg-6 align-self-center">
        <div class="card card-register">
          <div class="card-header">LOGIN DO USUÁRIO 2020</div>
          <div class="card-body">
            <?php echo form_open('usuarios/login') ?>
              <div class="form-group">
                <input type="text" name="usuario" id="usuario" class="form-control form-control-lg" placeholder="Usuário" required="required" value="<?php echo @$_POST['usuario'] ?>">
              </div>
              <div class="form-group">
                <input type="password" name="senha" id="senha" class="form-control form-control-lg" placeholder="Senha" required="required">
              </div>
              <input type="submit" class="btn btn-primary btn-block btn-block" value="ENTRAR">          
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    //openFullscreen()
    //document.getElementById("login").addEventListener('click', openFullScreen)
    //document.dot.addEventListener(onload, openFullscreen)
    document.querySelector('html').addEventListener('click', function(){
      if(screen.width
       < 900){
        openFullScreen()
      }
    })

   
    function openFullScreen() {
      var elem = document.documentElement;
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.mozRequestFullScreen) { /* Firefox */
        elem.mozRequestFullScreen();
      } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) { /* IE/Edge */
        elem.msRequestFullscreen();
      }
    }
  </script>
</body>

</html>
