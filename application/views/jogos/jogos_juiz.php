<?php 
/**
  echo '<pre>';
 // print_r($jogos_sem_juiz);
  //print_r($juiz_selecionado);
  print_r($juiz_selecionado);
  echo '</pre>;'
/**/
?>
<input class="form-control col-12 mt-4" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group">
<div class="row">
   <div class="col-lg-6  mt-3">
    <button class="btn btn-primary btn-block" onclick="window.location.reload()"><i  class="fas fa-sync"></i> ATUALIZAR</button>
  </div>
  <div class="col-lg-6  mt-3">
    <?php 
      $options = null;
      $options[NULL] =  'SELECIONE O JUIZ';
      foreach($juizes as $j):
        $options[$j->id_juiz] = $j->nome_juiz;
      endforeach;
      echo form_dropdown('id_juiz', $options, @$juiz_selecionado->id_juiz, array('class'=>'form-control', 'id'=>'id_juiz'));
    ?>
  </div>
 
</div>
<div class="row ">
  <div class="col-6 mt-4">
    <h5>JOGOS SEM JUÍZ</h5>
    <ul  id="lista_jogos_sem_juiz" class="list-group" style="cursor: pointer;" >
      <?php 
      if($jogos_sem_juiz): 
        foreach($jogos_sem_juiz as $j):
          ?>
          <li class="list-group-item justify-content-between align-items-center" title="ADIOCIONAR">
            <div class="row">
              <div class="col-2">
                <span style="display: none"><?php echo $j->id_jogo ?></span>
                <?php echo '<b>'.set_data($j->data).'<br>'.$j->horas_inicial.'</b>' ?>
              </div>
              <div class="col-3">
                <?php echo $j->nome_local ?>
              </div>
              <div class="col-7">
                <?php echo set_nome_equipe($j->nome_equipe_1, $j->nome_equipe_2, $j->nome_equipe_3, $j->nome_equipe_4, $j->nome_equipe_5)   ?>
              </div>
            </div>
           
            <i style="display: none"><?php echo $j->id_jogo ?></i>
            <!--
            <i style="float: right;"><?php echo rename_turma($j->turma); ?></i>
          -->
          </li>
          <?php 
        endforeach;
      endif;
      ?>
    </ul>
  </div><!-- col-6 -->
  <div class="col-6 mt-4">
    <h5 id="nome_juiz"></h5>
    <ul  id="lista_jogos_com_juiz" class="list-group" style="cursor: pointer;" >
      <?php 
      if($jogos_com_juiz): 
        foreach($jogos_com_juiz as $j):
          ?>
          <li class="list-group-item justify-content-between align-items-center" title="RETIRAR">
            <div class="row">
              <div class="col-2">
                <span style="display: none"><?php echo $j->id_jogo ?></span>
                <?php echo '<b>'.set_data($j->data).'<br>'.$j->horas_inicial.'</b>' ?>
              </div>
              <div class="col-3">
                <?php echo $j->nome_local ?>
              </div>
              <div class="col-7">
                <?php echo set_nome_equipe($j->nome_equipe_1, $j->nome_equipe_2, $j->nome_equipe_3, $j->nome_equipe_4, $j->nome_equipe_5)   ?>
              </div>
            </div>
           
            <i style="display: none"><?php echo $j->id_jogo ?></i>
       
          </li>
          <?php 
        endforeach;
      endif;
      ?>
      
    </ul>
  </div><!-- col-6 -->
</div> <!-- row -->
<script>
  $(document).ready(function(){

    var nome_juiz = $("#id_juiz option:selected").text();
    if(nome_juiz != "SELECIONE O JUIZ" ){
      $("#nome_juiz").text('JOGOS DO JUIZ | '+nome_juiz);
      //console.log(id_juiz+' / '+nome_juiz);
    }else{
      $("#nome_juiz").text('');
    }

    $("#lista_jogos_com_juiz li").click(function(){
      var id_jogo = $(this).find('span').text();
      var id_juiz = 0;
      var data_horas = $(this).find("b").html().trim();
      var local = $(this).find("div:eq(2)").text().trim(); 
      var equipes = $(this).find("div:eq(3)").html().trim();
      
      var obj  = {id_jogo:id_jogo, id_juiz:id_juiz};
      var resposta = confirm('Retirar jogo do juiz | '+nome_juiz);

      if(resposta == true){
        $(this).remove();
        $.ajax({
          type:"POST",
          url:"../juiz",
          data:obj,
          success:function(data){
            if(data == 'success'){
              console.log('jogo sem juiz');
              var html = ''
              +'<li class="list-group-item justify-content-between align-items-center" title="ADIOCIONAR">'
                +'<div class="row">'
                  +'<div class="col-1">'
                    +'<span style="display: none">'+id_jogo+'</span>'
                    +'<i class="fas fa-sync mt-1"></i>'
                  +'</div>'
                  +'<div class="col-2">'
                    +data_horas
                  +'</div>'
                  +'<div class="col-3">'
                    +local
                  +'</div>'
                  +'<div class="col-6">'
                    +equipes
                  +'</div>'
                +'</div>'
              +'</li>';
              $("#lista_jogos_sem_juiz").append(html);
            }else{
              console.log('erro ao retirar ao juiz');
            }
          }
        });
      }

    });

    $("#lista_jogos_sem_juiz li").click(function(){
      var id_jogo = $(this).find("span").text();
      var id_juiz = $("select#id_juiz").val();
      var data_horas = $(this).find("b").html().trim();
      var local = $(this).find("div:eq(2)").text().trim(); 
      var equipes = $(this).find("div:eq(3)").html().trim();

      var obj = {id_jogo:id_jogo, id_juiz:id_juiz};

      var txt = ''
        +'data: '+data_horas
        +'\nlocal: '+local
        +'\nequipes: '+equipes;

      console.log(txt);
      /**/
      if(id_juiz != ""){
        $(this).remove();
        $.ajax({
          type:"POST",
          url:"../juiz",
          data: obj,
          success: function(data){
            if(data == "success"){
              //console.log(obj);
              var html = ''
              +'<li class="list-group-item justify-content-between align-items-center" title="RETIRAR">'
                +'<div class="row">'
                  +'<div class="col-1">'
                    +'<span style="display: none">'+id_jogo+'</span>'
                    +'<i class="fas fa-sync mt-1"></i>'
                  +'</div>'
                  +'<div class="col-2">'
                    +data_horas
                  +'</div>'
                  +'<div class="col-3">'
                    +local
                  +'</div>'
                  +'<div class="col-6">'
                    +equipes
                  +'</div>'
                +'</div>'
              +'</li>';
              $("#lista_jogos_com_juiz").append(html);

            }else{
              console.log('falha ao atualizar');
            }
          }
        });
      }
      /**/

    });



    $("select#id_juiz").change(function(){
      var id_juiz = $(this).val();
      var nome_juiz = $("#id_juiz option:selected").text();
      if(id_juiz != ''){
        $("#nome_juiz").text('JOGOS DO JUIZ | '+nome_juiz);
        //console.log(id_juiz+' / '+nome_juiz);
        window.location.href = '../juiz/'+id_juiz;
      }else{
        window.location.href = '../juiz/0';
      }
    
    });
  
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#lista_jogos_sem_juiz li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
        
  });

</script>
