<?php echo form_open('equipes/turma_email/'.$equipes[0]->id_turma, array('style'=>'display:none'));/**/ ?>
<!--<form action="#">-->
  <div class="row" id="form" style="display: nome">
    <div class="form-group col-9">
      <input type="email" id="email" name="email" class="form-control" required="required" placeholder="Digite o email aqui ....">
      <input type="hidden" id="id_turma" value="<?php echo $equipes[0]->id_turma ?>" >
    </div>
    <div class="form-group col-3">
      <button id="btn_enviar_email" class="btn btn-primary btn-block"><i class="far fa-paper-plane"></i></button> 
    </div>
  </div>
</form>

<input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group">
<div class="row mb-2">
  <div class="col-6  mt-3">
    <button id="enviar_email" class="btn btn-primary btn-block" >
      <i class="far fa-envelope"></i> ENVIAR EMAIL</button>
  </div>
  <div class="col-6  mt-3">
    <?php 
      $options = null;
      $options[null] =  'IR NA EQUIPE';
      foreach($equipes as $e):
        $options[$e->id_equipe] = $e->nome_equipe;
      endforeach;
      echo form_dropdown('id_equipe_redirect', $options, $options[null], array('class'=>'form-control', 'id'=>'id_equipe_redirect'));
    ?>
  </div>
</div>
<?php 
  if($integrantes):
   
    $this->table->set_heading('Aluno', 'Equipe'/*, 'Status'*/);
    foreach($integrantes as $key=>$i):
      $this->table->add_row(
        $i->nome_aluno, $i->nome_equipe 
      );
    endforeach;
    $template = array(
      'table_open'  => '<table  class="table table-striped">',
      'tbody_open' => '<tbody id="myTable">',
    );
    $this->table->set_template($template);
    echo $this->table->generate();
  else:
    ?>
    <div class="alert alert-info mt-5" role="alert">
      Sem Registros!
    </div>
    <?php
  endif;
?>      
<script>

  $(document).ready(function(){

    $("#btn_enviar_email").click(function(){
      var email = $("#email").val();
      var id_turma = $("#id_turma").val();
      var txt ="Email: "+email+"\nid_turma: "+id_turma;
      var obj ={email:email};
      if(email != ''){
        $.ajax({
          type:"POST",
          url: "../turma_email/"+id_turma,
          data: obj,
          beforeSend:function(){
            $("#btn_enviar_email").html('<i class="fas fa-sync"></i>').attr("disabled","disabled"); 
          },
          success: function(data){
            if(data == "success"){
              alert("Email Enviado com Sucesso");
              window.location.reload();


              console.log("Email Enviado com Sucesso");
            }else{
              alert("ERROR AO ENVIAR EMAIL !!!!");
              window.location.reload();
              }
          }


        });

       
        console.log(txt);
      }
  /**/    
    });

    $("#enviar_email").click(function(){
      $("#alert").hide();
      $("#enviar_email").hide();
      $("#myInput").hide();
      $("form").show();
    });

    $("select#id_equipe_redirect").change(function(){
      var id_equipe = $(this).val();
      if(id_equipe != ""){
         window.location.href = '../../formacoes/adicionar/'+id_equipe;
      }   
      console.log(id_equipe);
    });
  });
</script>
