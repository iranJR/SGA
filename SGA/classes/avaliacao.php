<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 28/09/2018
 * Time: 19:54
 */

class avaliacao
{
    private $idAvaliacao;
    private $cursoIdCurso;
    private $turmaIdTurma;
    private $alunoIdAluno;
    private $nota1;
    private $nota2;
    private $notaFinal;

    /**
     * avaliacao constructor.
     * @param $idAvaliacao
     * @param $cursoIdCurso
     * @param $turmaIdTurma
     * @param $alunoIdAluno
     * @param $nota1
     * @param $nota2
     * @param $notaFinal
     */
    public function __construct($idAvaliacao, $cursoIdCurso, $turmaIdTurma, $alunoIdAluno, $nota1, $nota2, $notaFinal)
    {
        $this->idAvaliacao = $idAvaliacao;
        $this->cursoIdCurso = $cursoIdCurso;
        $this->turmaIdTurma = $turmaIdTurma;
        $this->alunoIdAluno = $alunoIdAluno;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->notaFinal = $notaFinal;
    }

    /**
     * @return mixed
     */
    public function getIdAvaliacao()
    {
        return $this->idAvaliacao;
    }

    /**
     * @param mixed $idAvaliacao
     */
    public function setIdAvaliacao($idAvaliacao): void
    {
        $this->idAvaliacao = $idAvaliacao;
    }

    /**
     * @return mixed
     */
    public function getCursoIdCurso()
    {
        return $this->cursoIdCurso;
    }

    /**
     * @param mixed $cursoIdCurso
     */
    public function setCursoIdCurso($cursoIdCurso): void
    {
        $this->cursoIdCurso = $cursoIdCurso;
    }

    /**
     * @return mixed
     */
    public function getTurmaIdTurma()
    {
        return $this->turmaIdTurma;
    }

    /**
     * @param mixed $turmaIdTurma
     */
    public function setTurmaIdTurma($turmaIdTurma): void
    {
        $this->turmaIdTurma = $turmaIdTurma;
    }

    /**
     * @return mixed
     */
    public function getAlunoIdAluno()
    {
        return $this->alunoIdAluno;
    }

    /**
     * @param mixed $alunoIdAluno
     */
    public function setAlunoIdAluno($alunoIdAluno): void
    {
        $this->alunoIdAluno = $alunoIdAluno;
    }

    /**
     * @return mixed
     */
    public function getNota1()
    {
        return $this->nota1;
    }

    /**
     * @param mixed $nota1
     */
    public function setNota1($nota1): void
    {
        $this->nota1 = $nota1;
    }

    /**
     * @return mixed
     */
    public function getNota2()
    {
        return $this->nota2;
    }

    /**
     * @param mixed $nota2
     */
    public function setNota2($nota2): void
    {
        $this->nota2 = $nota2;
    }

    /**
     * @return mixed
     */
    public function getNotaFinal()
    {
        return $this->notaFinal;
    }

    /**
     * @param mixed $notaFinal
     */
    public function setNotaFinal($notaFinal): void
    {
        $this->notaFinal = $notaFinal;
    }



}