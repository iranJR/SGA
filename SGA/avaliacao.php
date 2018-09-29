<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 28/09/2018
 * Time: 20:18
 */

include_once "estrutura/Template.php";
require_once "dao/avaliacaoDAO.php";
require_once "classes/avaliacao.php";

$template = new Template();
$object = new avaliacaoDAO();

$template->header();
$template->sidebar();
$template->navbar();


// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $cursoIdCurso = (isset($_POST["cursoIdCurso"]) && $_POST["cursoIdCurso"] != null) ? $_POST["cursoIdCurso"] : "";
    $turmaIdTurma = (isset($_POST["turmaIdTurma"]) && $_POST["turmaIdTurma"] != null) ? $_POST["turmaIdTurma"] : "";
    $alunoIdAluno = (isset($_POST["alunoIdAluno"]) && $_POST["alunoIdAluno"] != null) ? $_POST["alunoIdAluno"] : "";
    $nota1 = (isset($_POST["nota1"]) && $_POST["nota1"] != null) ? $_POST["nota1"] : "";
    $nota2 = (isset($_POST["nota2"]) && $_POST["nota2"] != null) ? $_POST["nota2"] : "";
    $notaFinal = (isset($_POST["notaFinal"]) && $_POST["notaFinal"] != null) ? $_POST["notaFinal"] : "";
} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $cursoIdCurso = NULL;
    $turmaIdTurma = NULL;
    $alunoIdAluno = NULL;
    $nota1 = NULL;
    $nota2 = NULL;
    $notaFinal = NULL;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $avaliacao = new avaliacao($id, '', '', '', '', '', '');

    $resultado = $object->atualizar($avaliacao);
    $cursoIdCurso = $resultado->getCursoIdCurso();
    $turmaIdTurma = $resultado->getTurmaIdTurma();
    $alunoIdAluno = $resultado->getAlunoIdAluno();
    $nota1 = $resultado->getNota1();
    $nota2 = $resultado->getNota2();
    $notaFinal = $resultado->getNotaFinal();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $cursoIdCurso != "" && $turmaIdTurma != "" && $alunoIdAluno != "" && $nota1 != "" && $nota2 != "" && $notaFinal != "") {
    $avaliacao = new avaliacao($id, $cursoIdCurso, $turmaIdTurma, $alunoIdAluno, $nota1, $nota2, $notaFinal);
    $msg = $object->salvar($avaliacao);
    $id = null;
    $cursoIdCurso = null;
    $turmaIdTurma = null;
    $alunoIdAluno = null;
    $nota1 = null;
    $nota2 = null;
    $notaFinal = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $avaliacao = new avaliacao($id, '', '','','','','');
    $msg = $object->remover($avaliacao);
    $id = null;
}

?>

    <div class='content' xmlns="http://www.w3.org/1999/html">
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <h4 class='title'>Avaliações</h4>
                            <p class='category'>Lista de avaliações do sistema</p>

                        </div>
                        <div class='content table-responsive'>

                            <form action="?act=save&id=" method="POST" name="form1">
                                <hr>
                                <i class="ti-save"></i>
                                <input type="hidden" name="id" value="<?php
                                // Preenche o id no campo id com um valor "value"
                                echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                                ?>"/>
                                Curso:
                                <select name="cursoIdCurso">
                                    <?php
                                        require_once "dao/cursoDAO.php";
                                        $cur = new cursoDAO();
                                        $cur = $cur->buscarTodos();
                                        foreach ($cur as $c){
                                            echo "<option value='$c->idCurso'>$c->Nome</option>";
                                        }
                                    ?>
                                </select>
                                Turma:
                                <select name="turmaIdTurma">
                                    <?php
                                    require_once "dao/turmaDAO.php";
                                    $tur = new turmaDAO();
                                    $tur = $tur->buscarTodos();
                                    foreach ($tur as $t){
                                        echo "<option value='$t->idTurma'>$t->Nome</option>";
                                    }
                                    ?>
                                </select>
                                Aluno:
                                <select name="alunoIdAluno">
                                    <?php
                                    require_once "dao/alunoDAO.php";
                                    $alu = new alunoDAO();
                                    $alu = $alu->buscarTodos();
                                    foreach ($alu as $a){
                                        echo "<option value='$a->idAluno'>$a->Nome</option>";
                                    }
                                    ?>
                                </select>
                                Nota 1:
                                <input type="text" size="50" name="nota1" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($nota1) && ($nota1 != null || $nota1 != "")) ? $nota1 : '';
                                ?>"/>
                                Nota 2:
                                <input type="text" size="50" name="nota2" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($nota2) && ($nota2 != null || $nota2 != "")) ? $nota2 : '';
                                ?>"/>
                                Nota Final:
                                <input type="text" size="50" name="notaFinal" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($notaFinal) && ($notaFinal != null || $notaFinal != "")) ? $notaFinal : '';
                                ?>"/>
                                <input type="submit" VALUE="Cadastrar"/>
                                <hr>
                            </form>


                            <?php

                            echo (isset($msg) && ($msg != null || $msg != "")) ? $msg : '';

                            //chamada a paginação
                            $object->tabelapaginada();

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$template->footer();
?>