<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aluno
 *
 * @author Natchios
 */
class Alunos extends Controller {

    public $name = 'alunos';
            
    function __construct() {
        parent::__construct();
    }

    function view($id) 
    {
        $alunoModel = $this->loadModel('AlunoModel');
        $aluno = $alunoModel->get($id);

        require 'application/views/_templates/header.php';
        require 'application/views/alunos/view.php';
        require 'application/views/_templates/footer.php';
    }

    function index() 
    {
        $AlunoModel = $this->loadModel('AlunoModel');
        $alunos = $AlunoModel->getAll();
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

        require 'application/views/_templates/header.php';
        require 'application/views/alunos/index.php';
        require 'application/views/_templates/footer.php';
        //var_dump($_GET); die;
    }

    function add() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $alunoModel = $this->loadModel('AlunoModel');
            //print_r($_POST);die;
            if ($alunoModel->add($_POST)) {
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                header('Location: ' . URL . $this->name);
                exit;
            } else {
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }

        $CursoModel = $this->loadModel('CursoModel');
        $cursos = $CursoModel->getAll();

        require 'application/views/_templates/header.php';
        require 'application/views/alunos/add.php';
        require 'application/views/_templates/footer.php';
        //var_dump($_GET); die;
    }

    function edit($id) 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $alunoModel = $this->loadModel('AlunoModel');
            //print_r($_POST);die;
            if ($alunoModel->edit($_POST)) {
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                header('Location: ' . URL . $this->name . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $_POST['id']);
                exit;
            } else {
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }

        $AlunoModel = $this->loadModel('AlunoModel');
        $aluno = $AlunoModel->get($id);

        $CursoModel = $this->loadModel('CursoModel');
        $cursos = $CursoModel->getAll();

        require 'application/views/_templates/header.php';
        require 'application/views/alunos/edit.php';
        require 'application/views/_templates/footer.php';
        //var_dump($_GET); die;
    }

    function delete($id = null) 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $alunoModel = $this->loadModel('AlunoModel');

            if ($alunoModel->delete($id)) {
                $this->setflash('Deletado com sucesso', array('class' => 'alert alert-success'));
                header('Location: ' . URL . $this->name);
                exit;
            } else {
                $this->setflash('Erro ao excluir', array('class' => 'alert alert-error'));
                header('Location: ' . URL . $this->name);
            }
        }
    }

    function searchAjax() 
    {
        $AlunoModel = $this->loadModel('AlunoModel');
        $alunos = $AlunoModel->searchAjax();
        // put in bold the written text
        //print_r($alunos);
        foreach ($alunos as $rs) {
            $aluno_nome = str_replace($_POST['aluno'], '<b>' . $_POST['aluno'] . '</b>', $rs['nome']);
            $matricula = str_replace($_POST['aluno'], '<b>' . $_POST['aluno'] . '</b>', $rs['matricula']);
            // add new option
            echo '<a href="#" class="list-group-item" onclick="set_item_aluno(\'' . str_replace("'", "\'", $rs['nome']) . "'" . ",'" . $rs['id'] . '\')">' . $matricula . ' - ' . $aluno_nome . '</a>';
        }
    }

}
