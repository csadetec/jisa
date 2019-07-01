<?php 
/**
  echo '<pre>';
  print_r($turma);
 //  print_r($_POST);
  echo '</pre>';
  /**/
?>
<div class="card card-register mt-3">
  <div class="card-header">Dados da Turma</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart($action, array('id'=>'form'));?>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nome_turma">Turma</label>
              <input type="text" name="nome_turma" id="nome_turma" class="form-control" placeholder="Nome do local" disabled="disabled" autofocus="autofocus" value="<?php  echo isset($_POST['nome_turma'])?@$_POST['nome_turma']:@$turma->nome_turma?>">
            </div>
            <div class="form-group col-md-6">
              <label for="pontos">Pontos</label>
              <input type="text" name="pontos" id="pontos" class="form-control" disabled="disabled" value="<?php echo @$_POST['pontos']?@$_POST['pontos']:@$turma->pontos ?>" >
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="pontos_diferenca">Diferença de Pontos</label>
              <input type="number" name="pontos_diferenca" id="pontos_diferenca" class="form-control" placeholder="Ex: -50 ou 200" required="required" value="<?php echo @$_POST['pontos_diferenca']?@$_POST['pontos_diferenca']:@$equipe->pontos_diferenca ?>" >
            </div>
          </div>
          
          
          <button type="submit" class="btn btn-primary btn-block"><?php echo $btn_value ?></button>
          <?php echo anchor('pontos/listar', 'CANCELAR', array('class'=>'btn btn-secondary btn-block')); ?>
        </form>  
      </div>
    </div>
  
  </div>
</div>
