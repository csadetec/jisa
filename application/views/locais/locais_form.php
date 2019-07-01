<div class="card card-register">
  <div class="card-header">Dados do Local</div>
  <div class="card-body">
    <form method="post" action="<?php echo base_url($action) ?>">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="nome_local">Nome</label>
          <input type="text" name="nome_local" id="nome_local" class="form-control" placeholder="Nome do local" required="required" autofocus="autofocus" value="<?php  echo isset($_POST['nome_local'])?@$_POST['nome_local']:@$local->nome_local?>">
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block" > <?php echo $btn_value ?></button>
      <a href="<?php echo base_url("locais/listar") ?> " class="btn btn-secondary btn-block" >VOLTAR</a>  
    </form>
  </div>
  </div>
</div>
