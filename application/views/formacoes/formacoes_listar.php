<?php 
/**
  echo '<pre>';
  print_r($equipe);
  echo '</pre>';
  /**/
?>
<input class="form-control col-12" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group">
<div class="row mt-2">
  <div class="col-12">
    <?php echo $equipes_por_turma ?>
  </div>
  
</div>
<div class="row">
  <div class="col-6  mt-3">
    <button class="btn btn-primary btn-block " onclick="window.location.reload()"><i  class="fas fa-sync"></i> ATUALIZAR</button>
  
  </div>
  <div class="col-6  mt-3">
      <?php 
      $options = null;
      $options[NULL] =  '<i  class="fas fa-check-circle" style="font-size: 20px; margin-top: 8px;"></i> IR NA EQUIPE';
      foreach($equipes as $e):
        $options[$e->id_equipe] = $e->nome_equipe;
      endforeach;
      echo form_dropdown('id_equipe_redirect', $options, $equipe->id_equipe, array('class'=>'form-control', 'id'=>'id_equipe_redirect'));
    ?>
  </div>
  
</div>

<div class="row mt-4">
  <div class="col-6">
    <h4>GERAL</h4>
    <ul  id="listGeral" class="list-group" style="cursor: pointer;" >
      <?php 
      if($alunos): 
        foreach($alunos as $a):
          ?>
          <li class="list-group-item justify-content-between align-items-center" title="ADIOCIONAR">
            <i style="display:none" class="fas fa-plus mt-1"></i>
            <span><?php echo $a->nome_aluno ?></span>
            <i style="display: none"><?php echo $a->id_aluno ?></i>
            <i style="float: right;"><?php echo rename_turma($a->turma); ?></i>
          </li>
          <?php 
        endforeach;
      endif;
      ?>
    </ul>
  </div>
  <div class="col-6">
    <h4 id="header_integrantes">EQUIPE</h4>
    <ul id="alunos_equipe" class="list-group">
      <?php 
      if($alunos_equipe): 
        foreach($alunos_equipe as $a):
          ?>
          <li title="Excluir" style="cursor: pointer;" class="list-group-item  justify-content-between align-items-center">
            <i style="display:none" class="fas fa-minus mr-2"></i>
            <span><?php echo $a->nome_aluno ?></span>
            <i style="display: none"><?php echo $a->id_aluno ?></i>
            <i style="float: right;"><?php echo rename_turma($a->turma); ?></i>
         
          </li>
          <?php 
        endforeach;
      endif;
      ?>     
    </ul> 
  </div>  
  <p id="id_equipe" style="display: none;"><?php echo $equipe->id_equipe ?></p>
  <p id="qtd_integrantes" style="display: none;"><?php echo $equipe->qtd_integrantes ?></p>
</div>
<script src="<?php echo base_url("./assets/js/formacoes_listar.js?18052019") ?> "></script>
