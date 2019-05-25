<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Email para turma</title>
  <link rel="stylesheet" type"text/css"  media="print" />

  <style>
    .row{
      display: flex;
    }
    body{
      font-family: Verdana, sans-serif;
      font-color:black;    
    }
    ul{
      border: 1px solid #ccc!important;
      list-style-type: none;
      padding: 0;
      margin-bottom: 0;
      margin-right: 5px;
      width: 800px;
    
    }
    li{
      padding: 8px 16px;
      border-bottom: 1px solid #ddd;
    }
    h3{
      font-family: "Segoe UI", Arial, sans-serif;
      

    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <?php
    $cont = 0; 
    if($equipes):
      foreach($equipes as $key=>$e):
        if($cont == 0):
          echo '<div class="row">';
        endif;

      ?>
      
        <ul>
          <li><h3><?php echo $e->nome_equipe ?></h3></li>
          <?php
            if($integrantes_equipes[$key]):
              foreach($integrantes_equipes[$key] as $n=>$i):
              ?>
                <li><?php echo ($n+1).' '.$i->nome_aluno ?></li>
              <?php
              endforeach;
            endif;
            ?>
        </ul> 
      <?php
        $cont++;
        if($cont == 2):
          echo '</div>';
          $cont=0;
        endif;
      endforeach;
    endif;

     ?>
  </div>  
</body>
</html>
<?php 
  /**
  echo '<pre>';
  print_r($equipes);
  print_r($integrantes_equipes);
  echo '<br>';
  //print_r($integrantes);
  echo '</pre>';

  /**/

  /*

  if($integrantes):
   
    $this->table->set_heading('Aluno', 'Equipe'/*, 'Status'*);
    foreach($integrantes as $key=>$i):
     /*
      $options = null;

      foreach($equipes as $e):
         $options[$e->id_equipe] = $e->nome_equipe;
      endforeach;
      /**
      $this->table->add_row(
        $i->nome_aluno, $i->nome_equipe 
        
        /*form_dropdown($i->id_aluno, $options, $i->id_equipe, array('class'=>'form-control', 'id'=>'id_equipe'))
        /*,
          '<i id="aluno_equipe_'.$i->id_aluno.'_'.$i->id_equipe.'_" class="fas fa-check-circle" style="color: green;   font-size: 20px; margin-top: 8px;" title="Aluno cadastrado"></i>'*
      
      );
    endforeach;
    $template = array(
      'table_open'  => '<table  class="table table-striped">',
      'tbody_open' => '<tbody id="myTable">',
    );
    $this->table->set_template($template);
    echo $this->table->generate();
  else:
    ?>
    <div class="alert alert-info mt-5" role="alert">
      Sem Registros!
    </div>
    <?php
  endif;
?>      
*/