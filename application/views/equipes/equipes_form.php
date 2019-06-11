<?php 
/**/
  echo '<pre>';
 // print_r($cursos);
 //  print_r($_POST);
  echo '</pre>';
  /**/
?>
<div class="card card-register mt-3">
  <div class="card-header">Dados da Equipe</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart($action, array('id'=>'form'));?>
          <div  class="form-row">
            <div class="form-group col-md-12">
              <label for="id_turma">Turma</label>
              <?php
              $options = null;
              $options[null] = 'SELECIONE';
               foreach($turmas as $t):
                $options[$t->id_turma] = $t->nome_turma;
              endforeach;           
              echo form_dropdown('id_turma', $options, @$_POST['id_turma']?@$_POST['id_turma']:@$equipe->id_turma, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_turma'));
              ?>
            </div> 
          </div>
          <div id="horarios" class="form-row">
            <div class="form-group col-md-6">
              <label for="id_modalidade">Modalidade</label>
              <?php
              $options = null;
              $options[null] = 'SELECIONE';
              foreach($modalidades as $m):
                $options[$m->id_modalidade] = $m->nome_modalidade;
              endforeach;
              echo form_dropdown('id_modalidade', $options, @$_POST['id_modalidade']?@$_POST['id_modalidade']:@$equipe->id_modalidade, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_modalidade'));
              ?>
            </div> 
            <div class="form-group col-md-6">
              <label for="id_genero">Gênero</label>
              <?php
              $options = null;
              $options[null] = 'SELECIONE';
              foreach($generos as $g):
                $options[$g->id_genero] = $g->nome_genero;
              endforeach;
              echo form_dropdown('id_genero', $options, @$_POST['id_genero']?@$_POST['id_genero']:@$equipe->id_genero, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_genero'));
              ?>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="nome_equipe">Nome da Equipe</label>
              <input type="text" name="nome_equipe" id="nome_equipe" class="form-control" placeholder="Equipe" required="required" value="<?php echo @$_POST['nome_equipe']?@$_POST['nome_equipe']:@$equipe->nome_equipe ?>" >
            </div>
          </div>
          
          
          <button type="submit" class="btn btn-primary btn-block"><?php echo $btn_value ?></button>
          <?php echo anchor('equipes/listar', 'TODAS EQUIPES', array('class'=>'btn btn-secondary btn-block')); ?>
        </form>  
      </div>
    </div>
  
  </div>
</div>
<script>
  $(document).ready(function(){
    $("#id_turma").change(script);
    $("#id_modalidade").change(script);
    $("#id_genero").change(script);

    function script(){
      var turma =  $("#id_turma option:selected").text();
      var modalidade =  $("#id_modalidade option:selected").text();
      var genero =  $("#id_genero option:selected").text();

      turma = str_null(turma);
      modalidade = str_null(modalidade);
      genero = str_null(genero);

      var nome_equipe = turma+' '+modalidade+' '+' '+genero;
      //console.log();
      $("#nome_equipe").val(nome_equipe);
    }


    function str_null(str){
      if(str == 'SELECIONE'){
        return '';
      }
      return str;
    }
   
  });
</script>