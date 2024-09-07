<?php

require_once "Banco.php";

class Consumo
{
    
    private $quantidade;
    private $consumo;
    private $tempo_de_uso;

    private $id_usuario;
    private $tarifa;
    private $data;
    private $email_usuario;


    function __construct(){
        $this->banco = new Banco();
        $this->banco->conectar();
    }

    public function calculoConsumo($id_usuario, $sql){
        $sql .= " and Codigo_Usuario = '$id_usuario';";
        
        $resultado = $this->banco->executarSql($sql);
        
        return $resultado;
    }

    public function addTarifa(){
        $sql = "";
        $tarifa = $this->getTarifa();
        $data = $this->getData();
        $id_usuario = $this->getIdUsuario();

        $sql = "insert into Tarifa (Valor_Tarifa, Data_da_Tarifa, Codigo_Usuario) values ('$tarifa', '$data', '$id_usuario');";
        
        $this->banco->executarSql($sql);

        //header("location: home_perfil.html");
        return "<script>alert('Tarifa cadastrada!');location.href=\"home_tarifas.php\";</script>";
    }

    public function buscarTarifa($id_usuario){
        
        $sql = "select Valor_Tarifa from Tarifa where Data_da_Tarifa = (select MAX(Data_da_Tarifa) from Tarifa where Codigo_Usuario ='$id_usuario') and Codigo_Usuario ='$id_usuario';";

        $tarifa = $this->banco->executarSql($sql);
        
        while($linha=mysqli_fetch_array($tarifa)){
            $tariffa = $linha['Valor_Tarifa'];
        }

        return $tariffa;
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

    public function getTarifa(){
        return $this->tarifa;
    }

    public function getData(){
        return $this->data;
    }

    public function getEmailUsuario(){
        return $this->email_usuario;
    }

    public function getIdUsuario(){
        return $this->id_usuario;
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

    public function setTarifa($novovalor){
        $this->tarifa = $novovalor;
    }

    public function setData($novovalor){
        $this->data = $novovalor;
    }

    public function setEmailUsuario($novovalor){
        $this->email_usuario = $novovalor;
    }

    public function setIdUsuario($novovalor){
        $this->id_usuario = $novovalor;
    }
}

?>