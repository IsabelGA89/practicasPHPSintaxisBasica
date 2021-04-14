<?php
class BD_mysqli{
    /**
     * @var mysqli  conexión a la base de datos
     */
    private $con;

    /**
     * @var string estado descriptivo de la conxión
     */
    private $estado="";


    /**
     * @param array $datos datos para la conexión a bd (host, user, password bd)
     */

    public function __construct(array $datos){
        $this->con = $this->conectar($datos);
    }

    /**
     * @param array $datos datos para la conexión a bd (host, user, password bd)
     * @return mysqli conexión a la base de datos
     */

    public function conectar(array $datos){
        $h = $datos['host'];
        $u = $datos['user'];
        $p = $datos['password'];
        $bd = $datos['bd'];

        $con = new mysqli($h, $u, $p, $bd);
        if ($con->connect_errno!==0) {
            $this->estado .= "No se ha podido conectar a la base de datos<br />";
            $this->estado .= "Número de error $con->connect_errno<br />";
            $this->estado .= "Descripción del error $con->connect_error<br />";
        }

        else
            $this->estado = "Conectado correctamente";

        return  $con;

    }


    /**
     * @return string información de la conexión según la especificación del enuniciado
     */
    public function  estado_conexion(){
        $info = "<H4>Conexión realizada con Mis Pruebas</h4>";
        $info .= "Version usada en cliente <strong>{$this->con->client_version}</strong><br />";
        $info .= "Información del host  <strong>{$this->con->host_info}</strong><br />";
        $info .= "Versión del protocolo  <strong>{$this->con->protocol_version}</strong><br />";
        $info .= "Información del servidor  de BD <strong>{$this->con->server_info}</strong><br />";
        $info .= "Versión del servidor  BD <strong>{$this->con->server_version}</strong><br />";
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

    /**
     * @return bool llamamos al método  close de Mis Pruebas
     */
    public function cerrar()
    {
        // TODO: Implement __toString() method.
        return $this->con->close();
    }



}

?>
