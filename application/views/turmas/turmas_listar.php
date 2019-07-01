<?php echo anchor('turmas/cadastrar', '<i class="fas fa-plus"></i> Cadastrar Turma', array('style'=>'float:right; margin-bottom:10px;', 'class'=>'btn btn-success')); ?>
<input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group"> 

<div class="card mt-3"> 
  <?php if($turmas): ?>
  <ul id="myList" class="list-group list-group-flush">
    <?php foreach($turmas as $row): ?>
    <li class="list-group-item">
      <div class="row">
        <div class="col-6 col-lg-3">
          <?php echo  anchor('turmas/editar/'.$row->id_turma,$row->nome_turma, array('title'=>'Editar Turma', 'class'=>'btn btn-outline-primary btn-block mb-2')); ?>
         <b>Curso:</b> <?php echo $row->nome_curso ?>
        </div>
       <div class="col-6 col-lg-9 mt-3" style="float:right"> 
          <?php echo  anchor('turmas/editar/'.$row->id_turma, '<i class="fas fa-edit"></i>', array('title'=>'Visualizar Equipes', 'class'=>'btn btn-primary', 'style'=>'border-radius:50%;  float:right; margin-left:10px')); ?> 
          <?php echo  anchor('equipes/listar_por_turma/'.$row->id_turma, '<i class="fas fa-eye"></i>', array('title'=>'Visualizar Equipes', 'class'=>'btn btn-primary', 'style'=>'border-radius:50%;  float:right;')); ?>
        </div>
      </div>
    
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>
 