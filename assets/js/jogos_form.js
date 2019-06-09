$(document).ready(function(){
  $("#div_3").hide();
  $("#div_4").hide();
  $("#div_5").hide();
  verifica_modalidade(); 

  $("#id_modalidade").change(verifica_modalidade);
  $("#id_modalidade").change(equipes_modalidade);

  function equipes_modalidade(){
    var modalidade = $("#id_modalidade option:selected").val();
    var hostname = window.location.hostname;
    var url = "http://" + hostname + "/jisa/equipes/listar_por_modalidade_json/" + modalidade;

      $.getJSON(url, function(result){
        if(result.length > 0){
          $("#id_equipe_1").empty();
          $("#id_equipe_2").empty();
          $("#id_equipe_3").empty();
          $("#id_equipe_4").empty();
          $("#id_equipe_5").empty();
          var option = ''
          +'<option value>SELECIONE</selecione>';
         
         // $("#id_equipe_1").append(option);

          $.each(result, function (i, field) {
            //console.log(field);
            option+= '<option value="'+field.id_equipe+'">'+field.nome_equipe+'</option>';
          });
          $("#id_equipe_1").append(option);
          $("#id_equipe_2").append(option);
          $("#id_equipe_3").append(option);
          $("#id_equipe_4").append(option);
          $("#id_equipe_5").append(option);
          
        }else{
          console.log('sem equipes');
         // alert('SEM EQUIPES PARA ESTÁ MODALIDADE');
         
          var option = ''
          +'<option value>'+'SEM EQUIPES PARA ESTÁ MODALIDADE'+'</option>';
          
          $("#id_equipe_1").empty();
          $("#id_equipe_1").append(option);

          $("#id_equipe_2").empty();
          $("#id_equipe_2").append(option);
          $("#id_equipe_3").empty();
          $("#id_equipe_3").append(option);
          $("#id_equipe_4").empty();
          $("#id_equipe_4").append(option);
          $("#id_equipe_5").empty();
          $("#id_equipe_5").append(option);
          /**/
        }
       
      });

  }

  function verifica_modalidade(){
    var modalidade = $("#id_modalidade option:selected").val();
    var hostname =  window.location.hostname;
    var url = "http://"+hostname+"/jisa/modalidades/listar_json/"+modalidade;
    var qtd_equipes;

    console.log(url);

    if(modalidade != ''){

      $.getJSON(url, function(result){
      
        qtd_equipes = result.qtd_equipes;
         console.log(qtd_equipes);  
        qtd_equipes = parseInt(qtd_equipes);

        if(qtd_equipes > 2){
          $("#div_3").show();
          $("#div_4").show();
          $("#div_5").show();
        }else{
          $("#div_3").hide();
          $("#div_4").hide();
          $("#div_5").hide();
        }

      });


    /**/
    }
  }
  /**/
});  