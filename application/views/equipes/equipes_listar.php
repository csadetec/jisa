<?php echo anchor('equipes/cadastrar', '<i class="fas fa-plus"></i> Cadastrar Equipe', array('style'=>'float:right; margin-bottom:10px;', 'class'=>'btn btn-success')); ?>
<input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group"> 
<div class="card mt-3"> 
  <?php if($equipes):
  /*
    echo '<pre>';
    print_r($equipes);
    echo '</pre>';
    /** */
    ?>
  <ul id="myList" class="list-group list-group-flush">
    <?php foreach($equipes as $row): ?>
    <li class="list-group-item">
      <div class="row">
        <div class="col-6 col-lg-3">
          <?php echo  anchor('equipes/editar/'.$row->id_equipe, $row->nome_equipe, array('title'=>'Editar Equipe', 'class'=>'btn btn-outline-primary btn-block mt-2 mb-2')); ?>
          <b>Turma:</b> <?php echo $row->nome_turma ?><br>
          <b>QTD: </b><?php echo $row->qtd ?>

        </div>
       <div class="col-6 col-lg-9 mt-3" style="float:right"> 
          <?php echo  anchor('equipes/editar/'.$row->id_equipe, '<i class="fas fa-edit"></i>', array('title'=>'Editar Equipe', 'class'=>'btn btn-primary', 'style'=>'border-radius:50%;  float:right; margin-left:10px')); ?> 
          <?php echo  anchor('formacoes/adicionar/'.$row->id_equipe, '<i class="fas fa-user-plus"></i>', array('title'=>'Adicionar alunos', 'class'=>'btn btn-primary', 'style'=>'border-radius:50%;  float:right;')); ?>
        </div>
      </div>
    
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>
 
