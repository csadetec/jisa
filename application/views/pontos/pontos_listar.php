<input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group">
<?php 
/**
  echo '<pre>';
  print_r($turmas);
  echo '</pre>';
  /**/ 
?>
<div class="card mt-3"> 
  <?php if($turmas): ?>
  
  <ul id="myList" class="list-group list-group-flush">
    <?php foreach($turmas as $row): ?>
    <li class="list-group-item">
      <?php echo '<h5>'.$row->nome_turma.'</h5>' ?>
      Pontos:  <?php echo $row->pontos ?>
       <?php echo  anchor('pontos/editar/'.$row->id_turma, '<i class="fas fa-edit"></i>', array('title'=>'Editar pontos da Turma', 'class'=>'btn btn-primary', 'style'=>'border-radius:50%;  float:right;')); ?>
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>
<div class="card mt-3"> 
  <?php if($equipes): ?>
  <ul id="myList" class="list-group list-group-flush">
    <?php foreach($equipes as $row): ?>
    <li class="list-group-item">
      <?php echo '<h5>'.$row->nome_equipe.'</h5>' ?>
      Pontos:  <?php echo $row->pontos ?>
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>
