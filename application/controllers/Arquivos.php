<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Arquivos extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->helper(array('download','file', 'excel_helper'));
        $this->load->model(array('alunos_model', 'jogos_model', 'formacoes_model'));
        verifica_login();
        verifica_admin();
        
    }




    public function index() {


    }
    

    public function cadastrar(){
        

        $config['upload_path']          = './assets/planilhas/uploads/';
        $config['allowed_types']        = 'xlsx|xls|XLSX|XLS';
        $config['max_size']             = 0;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']           = true;


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')):
            $error = array('error' => $this->upload->display_errors());
            set_msg($error['error'], 'danger');
        else:
            $data = array('upload_data' => $this->upload->data());
            set_msg('Upload com Sucesso!','success');
            redirect('arquivos/atualizar/'.$data['upload_data']['file_name']);
   
        endif;
        //endif;

        $data['titulo'] = 'Arquivos - Uploads';
        $data['bread1'] = 'Arquivos';
        $data['bread2'] = 'Uploads';
        $data['page'] = 'arquivos/arquivos_form';
        $data['action'] = 'arquivos/cadastrar/';
        $data['btn_value'] = 'SALVAR';
      

        $this->load->view('load', $data, FALSE);

    }

    public function atualizar($arquivo='')
    {
        $full_path = './assets/planilhas/uploads/'.$arquivo;
        $excelReader = PHPExcel_IOFactory::createReaderForFile($full_path);
        
        @$excelObj = $excelReader->load($full_path);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();

        //pegar titulos das colunas
        $letras = range('A','Z');
        
        foreach($letras as $key=>$l):           
            if($worksheet->getCell($l.'1')->getValue()):
                $titulo[$key] = $worksheet->getCell($l.'1')->getValue();
                 $titulo[$key] = renomear_titulo($titulo[$key]);
            endif;
        endforeach;

        //filtrar titulos
          
        foreach($titulo as $key=>$t):
            
            if($t == 'unset'):
                unset($titulo[$key]);   
                unset($letras[$key]);          
            endif;
            
        endforeach;

        //pegar outras linhas de cada coluna
        
        $cont_aluno = 1;
       // $alunos = 'SEM ALUNOS';
        for ($row = 2; $row <= $lastRow; $row++):

            if($worksheet->getCell('A'.$row)->getValue() != null):
                foreach($titulo as $key=>$t):
                    $alunos[$cont_aluno][$t] =  $worksheet->getCell($letras[$key].$row)->getValue();
                endforeach;
                $cont_aluno++;

            endif;
        endfor;
        /*
        echo '<pre>';
        print_r($alunos);
        echo '</pre>';
        /**/
        
        if(!$this->formacoes_model->truncate()):
            set_msg('Não foi possível deletar os Jogos', 'danger');
        elseif(!$this->jogos_model->truncate()):
            set_msg('Não foi possível deletar as formações das equipes', 'danger');
        elseif(!$this->alunos_model->truncate()):
            set_msg('Não foi possível deletar os Alunos', 'danger');
        else:
            
            foreach($alunos as $key=>$a):
                # code...
               
                if($this->alunos_model->insert($a) == false):
                    echo "Falha ao cadastrar";
                    break;
                elseif(sizeof($alunos) == $key):
                   set_msg("Banco de alunos Atualizado com Sucesso","success");
                   redirect('jogos/listar');
                endif;
            endforeach;    
            
        endif;
        /**/
            

    }


}
