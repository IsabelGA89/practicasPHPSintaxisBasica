<?php

class BD_mysqli
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

        $con=new mysqli($h, $u, $p, $bd);
        if ($con->connect_errno !== 0) {
            $this->estado.="No se ha podido conectar a la base de datos<br />";
            $this->estado.="Número de error $con->connect_errno<br />";
            $this->estado.="Descripción del error $con->connect_error<br />";
        } else
            $this->estado="Conectado correctamente";

        return $con;

    }

    public function estado_conexion()
    {
        $info="<H4>Conexión realizada con Mis Pruebas</h4>";
        $info.="Version usada en cliente <strong>{$this->con->client_version}</strong><br />";
        $info.="Información del host  <strong>{$this->con->host_info}</strong><br />";
        $info.="Versión del protocolo  <strong>{$this->con->protocol_version}</strong><br />";
        $info.="Información del servidor  de BD<strong>{$this->con->server_info}</strong><br />";
        $info.="Versión del servidor  BD <strong>{$this->con->server_version}</strong><br />";
        if (!$this->con->connect_errno)
            return $info;
        else
            return "No se ha podido concectar a la BD, revise parámetros de conexión";
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
        if($consulta)
            while (  $fila=$consulta->fetch_row ()) {
                $rtdo[]=$fila[0];
            }

        return $rtdo;
    }
    public function get_data_tables()
    {

        $consulta=$this->con->query ("show tables");
        $rtdo=[];
        if($consulta)
            while (  $fila=$consulta->fetch_row ()) {
                $rtdo[]=$fila[0];
            }

        return $rtdo;
    }



    public function cerrar()
    {
        // TODO: Implement __toString() method.
        return $this->con->close ();
    }


}

?>
