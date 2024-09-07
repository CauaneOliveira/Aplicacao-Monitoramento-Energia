<?php

require_once "Banco.php";
include "Consumo.php";

class Aparelho
{
    private $nomeAparelho;
    private $quantidade;
    private $consumo;
    private $tempo_de_uso;
    private $id_usuario;
    private $email_usuario;
    private $idap_busca;
    
    function __construct(){
        $this->banco = new Banco();
        $this->banco->conectar();
    }
    public function buscarAparelhoById($idAparelho){
        $sql = "";
        $id_usuario = $this->getUsuario();
 
        $sql = "select ID_Aparelho, Nome_Aparelho, Quantidade, Consumo, ROUND(Tempo_de_Uso, 2) as Tempo_de_Uso from Aparelhos where ID_Aparelho='$idAparelho'";
       // echo $sql;
        $result = $this->banco->executarSql($sql);
        
        return $result;
    }
    public function buscarAparelho(){
        $sql = "";
        $id_usuario = $this->getUsuario();
 
        $sql = "select ID_Aparelho, Nome_Aparelho, Quantidade, Consumo, ROUND(Tempo_de_Uso, 2) as Tempo_de_Uso from Aparelhos where Codigo_Usuario = '$id_usuario'";

        $result = $this->banco->executarSql($sql);
        
        return $result;
    }

    public function addAparelho(){
        $sql = "";
        $nomeAparelho = $this->getNomeAparelho();
        $quantidade = $this->getQuantidade();
        $consumo = $this->getConsumo();
        $tempo_de_uso = $this->getTempoUso();
        $id_usuario = $this->getUsuario();

        $sql = "insert into Aparelhos (Nome_Aparelho, Quantidade, Consumo, Tempo_de_Uso, Codigo_Usuario) values ('$nomeAparelho', '$quantidade', '$consumo', '$tempo_de_uso', '$id_usuario')";
        
        $this->banco->executarSql($sql);

        //header("location: home_perfil.html");
        return "<script>alert('Aparelho cadastrado!');location.href=\"home_cadastrar.php\";</script>";
    }

    public function editarAparelho(){
        $sql = "";
        $nomeAparelho = $this->getNomeAparelho();
        $quantidade = $this->getQuantidade();
        $consumo = $this->getConsumo();
        $tempo_de_uso = $this->getTempoUso();
        $idap_busca = $this->getIdApBusca();

        $sql = "update Aparelhos set Nome_Aparelho = '$nomeAparelho', Quantidade = '$quantidade', Consumo = '$consumo', Tempo_de_Uso = '$tempo_de_uso' where ID_Aparelho = '$idap_busca';";
        
        $this->banco->executarSql($sql);

        //header("location: home_perfil.html");
        return "<script>alert('Aparelho Editado!');location.href=\"home_aparelhos.php\";</script>";
    }

    public function excluirAparelho(){
        $sql = "";
        $idap_busca = $this->getIdApBusca();

        $sql = "delete from Aparelhos where ID_Aparelho = '$idap_busca'";
        
        $this->banco->executarSql($sql);

        //header("location: home_perfil.html");
        return "<script>alert('Aparelho Deletado!');location.href=\"home_aparelhos.php\";</script>";
    }

    public function getNomeAparelho(){
        return $this->nomeAparelho;
    }
    
    public function getQuantidade(){
        return $this->quantidade;
    }

    public function getConsumo(){
        return $this->consumo;
    }

    public function getTempoUso(){
        return $this->tempo_de_uso;
    }

    public function getUsuario(){
        return $this->id_usuario;
    }

    public function getEmailUsuario(){
        return $this->email_usuario;
    }
    
    public function getConsumoTotal(){
        return $this->consumo_total;
    }

    public function getIdApBusca(){
        return $this->idap_busca;
    }

    public function setNomeAparelho($novovalor){
        $this->nomeAparelho = $novovalor;
    }

    public function setQuantidade($novovalor){
        $this->quantidade = $novovalor;
    }
 
    public function setConsumo($novovalor){
        $this->consumo = $novovalor;
    }

    public function setTempoUso($novovalor){
        $this->tempo_de_uso = $novovalor;
    }

    public function setUsuario($novovalor){
        $this->id_usuario = $novovalor;
    }

    public function setEmailUsuario($novovalor){
        $this->email_usuario = $novovalor;
    }

    public function setConsumoTotal($novovalor){
        $this->consumo_total = $novovalor;
    }

    public function setIdApBusca($novovalor){
        $this->idap_busca = $novovalor;
    }
 
}
