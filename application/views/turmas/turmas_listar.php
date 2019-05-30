<input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group"> 
<div class="card mt-3"> 
  <?php if($turmas): ?>
  <ul id="myList" class="list-group list-group-flush">
    <?php foreach($turmas as $row): ?>
    <li class="list-group-item">
      <div class="row">
        <div class="col-md-9">
          <?php echo '<h5>'.$row->nome_turma.'</h5>' ?>
          Curso:  <?php echo $row->nome_curso ?>
        </div>
        <div class="col-md-2 mt-2" style="float:rigth">
          <?php echo  anchor('turmas/editar/'.$row->id_turma, '<i class="fas fa-edit"></i>', array('title'=>'Editar Turma', 'class'=>'btn btn-primary', 'style'=>'border-radius:50%; float:right;' )); ?>
        </div>
        <div class="col-md-1 mt-2"> 
          <?php echo  anchor('equipes/listar_por_turma/'.$row->id_turma, '<i class="fas fa-eye"></i>', array('title'=>'Visualizar Equipes', 'class'=>'btn btn-primary', 'style'=>'border-radius:50%;  float:right;')); ?>
        </div>
      </div>
    
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>
 