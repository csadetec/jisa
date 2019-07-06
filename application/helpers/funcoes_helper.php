<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$aviso = null;


function rename_turma($turma){
    if($turma == 'M3CAM')return 'M3A';
    if($turma == 'M3CBM')return 'M3B';
    if($turma == 'M2CAM')return 'M2A';
    if($turma == 'M2CBM')return 'M2A';
    if($turma == 'M2CCM')return 'M2C';
   
    if($turma == 'M1CAM')return 'M1A';
    if($turma == 'M1CBM')return 'M1B';
    if($turma == 'M1CCM')return 'M1C';

    if($turma == 'F9CAM')return 'F9A';
    if($turma == 'F9CBM')return 'F9B';
    if($turma == 'F9CCM')return 'F9C';
    if($turma == 'F9CDM')return 'F9D';

    if($turma == 'F8CAM')return 'F8A'; 
    if($turma == 'F8CBM')return 'F8B'; 
    if($turma == 'F8CCM')return 'F8C'; 
    if($turma == 'F8CDM')return 'F8D'; 

    if($turma == 'F7CAM')return 'F7A';
    if($turma == 'F7CBM')return 'F7B';
    if($turma == 'F7CCM')return 'F7C';
    if($turma == 'F7CDM')return 'F7D';

    if($turma == 'F6CAM')return 'F6A';
    if($turma == 'F6CBM')return 'F6B';
    if($turma == 'F6CCM')return 'F6C';
    if($turma == 'F6CDT')return 'F6D';
    if($turma == 'F6CET')return 'F6E';

    if($turma == 'F5CAM')return 'F5A';
    if($turma == 'F5CBM')return 'F5B';
    if($turma == 'F5CCM')return 'F5C';
    if($turma == 'F5CDT')return 'F5D';
    if($turma == 'F5CET')return 'F5E';

    if($turma == 'F4CAM')return 'F4A';
    if($turma == 'F4CBM')return 'F4B';
    if($turma == 'F4CCM')return 'F4C';
    if($turma == 'F4CDT')return 'F4D';
    if($turma == 'F4CET')return 'F4E';
    if($turma == 'F4CFT')return 'F4F';

    if($turma == 'F3CAM')return 'F3A';
    if($turma == 'F3CBM')return 'F3B';
    if($turma == 'F3CCM')return 'F3C';
    if($turma == 'F3CDT')return 'F3D';
    if($turma == 'F3CET')return 'F3E';
    if($turma == 'F3CFT')return 'F3F';

    if($turma == 'F2CAM')return 'F2A';
    if($turma == 'F2CBM')return 'F2B';
    if($turma == 'F2CCT')return 'F2C';
    if($turma == 'F2CDT')return 'F2D';
    if($turma == 'F2CET')return 'F2E';
    if($turma == 'F2CFT')return 'F2F';

    if($turma == 'F2CAM')return 'F2A';
    if($turma == 'F2CBM')return 'F2B';
    if($turma == 'F2CCT')return 'F2C';
    if($turma == 'F2CDT')return 'F2D';
    if($turma == 'F2CET')return 'F2E';
    if($turma == 'F2CFT')return 'F2F';

    if($turma == 'F1CAM')return 'F1A';
    if($turma == 'F1CBM')return 'F1B';
    if($turma == 'F1CCT')return 'F1C';
    if($turma == 'F1CDT')return 'F1D';
    if($turma == 'F1CET')return 'F1E';
    if($turma == 'F1CFT')return 'F1F';

    return '-';

}

/**/
function set_label($obs, $pontos){
    if($obs and $pontos){

        return '! '.$pontos ;
    }elseif($pontos){
         return '<i class="fas fa-eye"></i> '.$pontos;
    }

    return '<i class="fas fa-eye"></i>';
}
function set_title($obs){
    if($obs){
        return  $obs;
    }

    return 'Visualizar Jogo';
}
/**/
function set_equipe_pontos($e, $p){
    if($e != '' and $p !='0'){
        return $e.': '.'<strong>'.$p.'</strong>'.'<br>';
    }elseif($e != ''){
        return $e.'<br>';
    }
    return '';
}
function set_nome_equipe($e1, $e2, $e3, $e4, $e5){
    $equipe = array($e1, $e2, $e3, $e4, $e5);
    $texto = null;
  
    foreach($equipe as $key=>$e):
        if($e):
            $texto .= $e.'<br>';
        //$texto .= $e.'<br>';
       
        endif;
    endforeach;
    $number  = strrpos($texto, '<br>');
    $texto = substr_replace($texto, '', $number);
    /*
    echo '<pre>';
    var_dump($texto);
    echo '</pre>';
    */
    return $texto;
    //print_r($texto);
   
}
function set_pontos($e1, $e2, $e3, $e4, $e5){
    $equipe = array($e1, $e2, $e3, $e4, $e5);
    $texto = null;
  
    foreach($equipe as $key=>$e):
        if($e):
            $texto .= $e.'-';
        //$texto .= $e.'<br>';
       
        endif;
    endforeach;
    $number  = strrpos($texto, '-');
    $texto = substr_replace($texto, '', $number);
    /*
    echo '<pre>';
    var_dump($texto);
    echo '</pre>';
    */
    return $texto;
    //print_r($texto);
   
}

function strclear($string){
    $search = array('á','é', 'ê', 'ú','ç','ã', 'í', 'ô');
    $replace= array('Á','É', 'Ê','U','Ç', 'Ã', 'Í', 'Ô');
    $string = str_replace($search, $replace, $string);
        $string = strtolower($string);

    return $string;
}


function set_data($data=''){
    if($data != "0000-00-00"):
        $data = strtotime($data);
        return date('d/m',$data);
    endif;
    return "";
}
if (!function_exists('set_msg')):

    function set_msg($aviso = null, $class = null) {
        //seta uma mensagem via session para ser lida posteriormente
        $CI = & get_instance();


        $CI->session->set_userdata('aviso', $aviso);
        $CI->session->set_userdata('class', 'alert alert-' . $class);
    }

endif;

if (!function_exists('get_msg')):

    //retorna uma mensagem definida pela função set_msg
    function get_msg($destroy = true) {
        $CI = & get_instance();

        $retorno = $CI->session->userdata();
        if ($destroy):
            $CI->session->unset_userdata('aviso');
            $CI->session->unset_userdata('class');

        endif;
        return $retorno;
    }

endif;


function verifica_login() {
    $CI = & get_instance();

    if ($CI->session->userdata('logged') != TRUE):
      //  set_msg('Acesso Restrito! Faça Login para continuar. ', 'warning');
        redirect('login');
    endif;
}



function verifica_admin() {
    $CI = & get_instance();
    $id_perfil = $CI->session->userdata('id_perfil');
    # 2 - juiz
    # 3 - coordenador
    # 4 - alunos

    if($id_perfil == 2 or $id_perfil == 3):
        redirect('locais/listar');
    elseif($id_perfil == 4):
        redirect('jogos/turmas');
    endif;
}

function verifica_admin_coordenador(){
    $CI = & get_instance();
    $id_perfil = $CI->session->userdata('id_perfil');
    # 2 - juiz
    # 4 - alunos

    if($id_perfil == 2):
        redirect('jogos/listar_juiz/'.$CI->session->userdata('id_usuario'));
    elseif($id_perfil == 4):
        redirect('jogos/turmas');
    endif;
}
function verifica_admin_coordenador_juiz(){
    $CI = & get_instance();
    $id_perfil = $CI->session->userdata('id_perfil');
    
    #4 - aluno

    if($id_perfil == 4):
        redirect('jogos/turmas');
    endif;
}




function limpar($string){
    $table = array(
        '/'=>'', '('=>'',')'=>'',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
    $string = preg_replace('/[,;:`´^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    $string = strtolower($string);
    $string = str_replace(" ","_",$string);
    $string  = str_replace("---", "-", $string);
    $string  = str_replace("ç", "c", $string);
    return $string;
}

    //renomes os titulos
        function renomear_titulos($t){
            switch ($t) {
                case 'R.A.':
                    # code...
                    return 'ra';
                    break;
                case 'Aluno':
                    # code...
                    return  'nome_aluno';
                    break;
                case 'Turma':
                    # code...
                    return  'turma';
                    break;
                case 'Aluno':
                    # code...
                    return  'nome_aluno';
                    break;
                case 'Situação de matrícula':
                    # code...
                    return  'situacao_matricula';
                    break;
                case 'E-mail':
                    # code...
                    return 'email';
                    break;      
                
                default:
                    return 'error';
                    break;
            }

        }
    