<?php

namespace Controllers;
use \Core\Controller;
use \Models\Alunos; 
use \Models\Cursos;
class BuscaController extends Controller{ 
    public function index(){
        $dados=array(
			'info'=>array(),
            'cursos'=>array(),
            'categorias'=>array(),
        );
        if(!empty($_GET['busca'])){
            $busca=$_GET['busca'];
            $dados['busca']=$busca;
            $categoria=$_GET['categoria'];
            $dados['categoria_ativa']=$categoria;
            if(isset($_SESSION['aluno']) && !empty($_SESSION['aluno'])){
                $alunos=new Alunos();
                $alunos->setAluno($_SESSION['aluno']);
                $dados['info']=$alunos;
            }
            $curso=new Cursos();
            $dados['categorias']=$curso->getCategorias();
            $dados['nome_categoria']=$curso->getNomeCategoria($categoria);
            $dados['cursos']=$curso->getCursoPesquisado($busca,intval($categoria));

            if(isset($_SESSION['aluno']) && !empty($_SESSION['aluno'])){
                $this->loadTemplate('busca',$dados);
            }else{
                $this->loadPrincipalTemplate('busca',$dados);
            }
        }else{
            header('Location:'.BASE);
        }
    } 
} 