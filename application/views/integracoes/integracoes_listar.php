<div class="row">
  <div class="col-md-5">
    <button class="btn btn-info mt-5 mb-5" onclick="window.location.reload()"><i  class="fas fa-sync"></i> ATUALIZAR</button>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <h4>GERAL</h4>
    <ul  id="listGeral" class="list-group" style="cursor: pointer;">
      <?php 
      if($jogos_no_equipes): 
        foreach($jogos_no_equipes as $e):
          ?>
          <li class="list-group-item justify-content-between align-items-center">
            <span><?php echo $e->nome_equipe ?></span>
            <i style="display: none"><?php echo $e->id_equipe ?></i>
            <i style="float: right; margin-top:6px" class="fas fa-plus"></i>
          </li>
          <?php 
        endforeach;
      endif;
      ?>
    </ul>
  </div>
  <div class="col-md-6">
    <h4 id="header_integrantes">EQUIPES</h4>
    <ul id="equipes_jogos" class="list-group">
      <?php 
      if($jogos_equipes): 
        foreach($jogos_equipes as $e):
          ?>
          <li title="Excluir" style="cursor: pointer;" class="list-group-item d-flex justify-content-between align-items-center">
            <span><?php echo $e->nome_equipe ?></span>
            <i style="display: none"><?php echo $e->id_equipe ?></i>
            <i style="float: right; margin-top:6px" class="fas fa-minus"></i>
         
          </li>
          <?php 
        endforeach;
      endif;
      ?>     
    </ul> 
  </div>  
  <p id="id_jogo" style="display: none;"><?php echo $id_jogo ?></p>
</div>
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#listGeral li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
    contar_integrantes();
    function contar_integrantes(){
      var count = $("#equipes_jogos li").length;
      $("#header_integrantes").text('EQUIPES '+count);
      
    }  
    
    $("#equipes_jogos li").click(function(){
     
      $(this).remove();
      var nome = $(this).find("span").text();
      var id_equipe = $(this).find("i:eq(0)").text();
      var id_jogo = $("#id_jogo").text();
      var obj = {id_jogo:id_jogo, id_equipe:id_equipe};
      $.ajax({
        type:"POST",
        url:"../deletar",
        data: obj,
        success: function(data){
          if(data == "success"){
            console.log("deletado");
            contar_integrantes();
          }else{
            console.log("erro ao cadastrar");
          }
        }
      });
    });
    $("#listGeral li").click(function(){
      $(this).remove();
      var nome = $(this).find("span").text();
      var id_equipe = $(this).find("i:eq(0)").text();
      var id_jogo = $("#id_jogo").text();
      var obj = {id_equipe:id_equipe, id_jogo:id_jogo};
      console.log(obj);
      $.ajax({
        type:"POST",
        url:"../adicionar",
        data: obj,
        success: function(data){
          if(data == "success"){
            console.log(nome+" - "+id_jogo);
            
            var html = '<li title="Atualize a página para retirar o Equipe" class="list-group-item d-flex justify-content-between align-items-center" >'
                +'<span>'+nome+'</span>'
                +'<i style="display: none">'+id_equipe+'</i>'
                +'<i style="float: right; margin-top:6px" class="fas fa-sync"></i>'
              //  +'';
                +'</li>';
                $("#equipes_jogos").append(html);
                contar_integrantes();
            /**/
          }else{
            console.log("erro ao cadastrar");
          }
        }
      });
      /**/
    });

  });
</script>
