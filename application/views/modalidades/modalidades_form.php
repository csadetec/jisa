<div class="card card-register mt-4">
  <div class="card-header">Dados da Modalidade</div>
  <div class="card-body">
    <form method="post" action="<?php echo base_url($action) ?>">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="nome_modalidade">Nome</label>
          <input type="text" name="nome_modalidade" id="nome_modalidade" class="form-control" placeholder="Nome da Modalidade" required="required" autofocus="autofocus" value="<?php  echo isset($_POST['nome_modalidade'])?@$_POST['nome_modalidade']:@$modalidade->nome_modalidade?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="qtd_equipes">Quantidade de Equipes por Jogo</label>
          <input type="number" min="2" max="6" name="qtd_equipes" id="qtd_equipes" class="form-control" placeholder="" required="required" autofocus="autofocus" value="<?php  echo isset($_POST['qtd_equipes'])?@$_POST['qtd_equipes']:@$modalidade->qtd_equipes?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="qtd_integrantes">Quantidade de integrantes</label>
          <input type="number" min="1" name="qtd_integrantes" id="qtd_integrantes" class="form-control" placeholder="" required="required" autofocus="autofocus" value="<?php  echo isset($_POST['qtd_integrantes'])?@$_POST['qtd_integrantes']:@$modalidade->qtd_integrantes?>">
        </div>
      </div>

      <button type="submit" class="btn btn-primary btn-block" > <?php echo $btn_value ?></button>
          
      <?php echo anchor('modalidades/listar/', 'VOLTAR', array('class'=>'btn btn-secondary btn-block')); ?>
    </form>
  </div>
  </div>
</div>
