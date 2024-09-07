<?php

class Banco{
    private $endereco = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $nomeBanco = "tcc";
    private $con;

    public function conectar(){
        $this->con = mysqli_connect($this->endereco,$this->usuario,$this->senha,$this->nomeBanco);
    }

    public function executarSql($sql){
        
        $resultado = mysqli_query($this->con,$sql);
        
        return $resultado;
    }

}

?>