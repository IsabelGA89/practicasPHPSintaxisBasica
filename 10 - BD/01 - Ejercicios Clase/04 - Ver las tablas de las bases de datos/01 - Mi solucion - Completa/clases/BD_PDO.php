<?php

class BD_PDO
{

    private $con;

    private $estado="";


    public function __construct(array $datos)
    {
        $this->con=$this->conectar ($datos);
    }

    public function conectar(array $datos)
    {
        $h=$datos['host'];
        $u=$datos['user'];
        $p=$datos['password'];
        $bd=$datos['bd'];
        $dsn="mysql:host=$h;dbname=$bd";
        $opciones=[PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"];
        $opciones[PDO::ERRMODE_EXCEPTION]=true;
        $con=null; //Por si no se conecta que tenga un valor

        try {
            $con=new PDO($dsn, $u, $p, $opciones);
            $this->estado="Conectado correctamente";


        } catch (PDOException $ex) {
            //Si no se ha podido conectar genero información
            $this->estado.="No se ha podido conectar a la base de datos<br />";
            $this->estado.="Descripción de la excepción de conexión " . $ex->getMessage () . "<br />";
            $this->estado.="Descripción del error" . $ex->errorInfo . "<br />";
        }

        return $con;

    }

    public function estado_conexion()
    {
        if ($this->con != null) { //Si estoy conectado, informo de los datos
            $info="Version usada en cliente <strong>{$this->getAttribute(PDO::ATTR_CLIENT_VERSION)}</strong><br />";
            $info.="Estado de la conexión   <strong>{$this->getAttribute(PDO::ATTR_CONNECTION_STATUS)}</strong><br />";
            $info.="Información del servidor  de BD<strong>{$this->getAttribute(PDO::ATTR_SERVER_INFO)}</strong><br />";
            $info.="Versión del servidor  BD <strong>{$this->getAttribute(PDO::ATTR_CLIENT_VERSION)}</strong><br />";
        }
        else
            $info="No se ha podido concectar a la BD, revise parámetros de conexión";
        var_dump ($this);
        return $info;
    }

    public function __toString()
    {
// TODO: Implement __toString() method.
        return $this->estado;
    }

    public function get_data_bases()
    {
        $consulta=$this->con->query ("show databases");
        $rtdo=[];
        while (   $fila=$consulta->fetch (PDO::FETCH_NUM)) {
            $rtdo[]=$fila[0];
        }
        return $rtdo;
    }
    public function get_data_tables($bd = null)
    {
        if(isset($bd) && $bd != null){
            $consulta=$this->con->query ("show tables from $bd ");
        }else{
            $consulta=$this->con->query ("show tables");
        }
        $rtdo=[];
        while (   $fila=$consulta->fetch (PDO::FETCH_NUM)) {
            $rtdo[]=$fila[0];
        }
        return $rtdo;
    }

    public function cerrar()
    {
// TODO: Implement __toString() method.
        unset($this->con);
    }
}

?>
