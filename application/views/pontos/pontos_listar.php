<input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group">

<div class="card mt-3"> 
  <?php if($turmas): ?>
  <ul id="myList" class="list-group list-group-flush">
    <?php foreach($turmas as $row): ?>
    <li class="list-group-item">
      <?php echo '<h5>'.$row->nome_turma.'</h5>' ?>
      Pontos:  <?php echo $row->pontos ?>
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>

