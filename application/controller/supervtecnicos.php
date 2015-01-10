<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of professor
 *
 * @author Natchios
 */
class Supervtecnicos extends Controller{
    
   function __construct()
    {
        parent::__construct();
        
        
        
    }  
    
    function index()
    {   
//       $livroModel = $this->loadModel('LivroModel');
//       $livros = $livroModel->getAll();
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/professores/index.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function add()
    {   
//       $livroModel = $this->loadModel('LivroModel');
//       $livros = $livroModel->getAll();
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/professores/add.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function searchAjax()
    { 
       $supervtecnicoModel = $this->loadModel('SupervtecnicoModel');
       $superv_tecnicos = $supervtecnicoModel->searchAjax();
       	// put in bold the written text
       //print_r($alunos);
       foreach ($superv_tecnicos as $rs) {
            $superv_tecnico_nome = str_replace($_POST['superv_tecnico_nome'], '<b>'.$_POST['superv_tecnico_nome'].'</b>', $rs['nome']);
            $instituicao = str_replace($_POST['superv_tecnico_nome'], '<b>'.$_POST['superv_tecnico_nome'].'</b>', $rs['nome_instituicao']);
            //$matricula = str_replace($_POST['professor_nome_matricula'], '<b>'.$_POST['professor_nome_matricula'].'</b>', $rs['matricula']);
            // add new option
            echo '<a href="#"  class="list-group-item" onclick="set_item_superv_tec(\''.str_replace("'", "\'", $rs['nome']). "'" . ",'". $rs['id'] . '\')">'. $superv_tecnico_nome . ' - ' . $instituicao .'</a>';
       }
       
    }
}
