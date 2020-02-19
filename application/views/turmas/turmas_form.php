<?php 
/*
  echo '<pre>';
  print_r($turma);
  echo '</pre>';
  /**/
?>
<div class="card card-register mt-5 ">
  <div class="card-header">Dados da Turma</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart($action, array('id'=>'form'));?>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="nome_turma">Turma</label>
              <input type="text" name="nome_turma" id="nome_turma" class="form-control" placeholder="Nome da Turma" required="required" autofocus="autofocus" value="<?php echo @$_POST['nome_turma']?@$_POST['nome_turma']:@$turma->nome_turma ?>" >
            </div>
          </div>
          <div id="horarios" class="form-row">
            <div class="form-group col-md-12">
              <label for="id_curso">Curso</label>
              <?php
              $options = null;
              $options[null] = 'SELECIONE';
              foreach($cursos as $c):
                $options[$c->id_curso] = $c->nome_curso;
              endforeach;
              echo form_dropdown('id_curso', $options, @$_POST['id_curso']?@$_POST['id_curso']:@$turma->id_curso, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_curso'));
              ?>
            </div> 
          </div>
          

          <button type="submit" class="btn btn-primary btn-block"><?php echo $btn_value ?></button>
              
          <?php echo anchor('turmas/listar/', 'VOLTAR', array('class'=>'btn btn-secondary btn-block')); ?>
        </form>  
      </div>
    </div>
  
  </div>
</div>
