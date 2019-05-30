
<input class="form-control " type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group">
<?php 
  /*
  echo '<pre>';
  print_r($jogos[0]);
  echo '</pre>';
  /** */
?>
<div class="card mt-3"> 
  <?php if($jogos): ?>
  <ul id="myList" class="list-group list-group-flush">
    <?php foreach($jogos as $row): ?>
    <li class="list-group-item">
      <div class="row">
        <div class="col-lg-3">
          <b>DATA: </b><?php echo set_data($row->data) ?><br>
          <b>LOCAL: </b><?php echo $row->nome_local ?><br>
          <b>JUÍZ: </b><?php echo $row->nome_juiz ?>
         
        </div>
        <div class="col-lg-6 mt-2">
          <?php echo '<i>'.set_nome_equipe($row->nome_equipe_1, $row->nome_equipe_2, $row->nome_equipe_3, $row->nome_equipe_4, $row->nome_equipe_5).'</i>' ?>         
        </div>
        <div class="col-lg-2 mt-2"> 
          <?php
            $id_perfil = $this->session->userdata('id_perfil');
            if($id_perfil == '1' or $id_perfil == '3'):
              echo  anchor('jogos/visualizar/'.$row->id_jogo, '<i class="fas fa-eye"></i>', array('title'=>'Visualizar Equipes', 'class'=>'btn btn-primary', 'style'=>'border-radius:50%;  float:right;')); 
            endif;
          ?>
        </div>
        <div class="col-lg-1 mt-2" style="float:rigth">
          <?php echo  anchor('jogos/editar/'.$row->id_jogo, '<i class="fas fa-edit"></i>', array('title'=>'Editar Turma', 'class'=>'btn btn-primary', 'style'=>'border-radius:50%; float:right;' )); ?>
        </div>
      
      </div>    
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>
 

