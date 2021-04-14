<?php

class BD
{
    public $con;
    private $msj_error = NULL;
    private $msj_info = NULL;
    private $database;
    private $user;
    private $pass;
    private $host;

    //Constructores
    public function __construct(array $datos)
    {
        $this->con = $this->conectar($datos);
    }
    public function conectar(array $datos)
    {
        $host = $datos['host'];
        $user = $datos['user'];
        $password = $datos['password'];
        $bd = $datos['bd'];
        $dsn = "mysql:host=$host;dbname=$bd";
        $opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
        $opciones[PDO::ERRMODE_EXCEPTION] = true;
        $con = null;

        try {
            $con = new PDO($dsn, $user, $password, $opciones);
            $this->msj_info = "Conectado correctamente";
        } catch (PDOException $ex) {
            //Si no se ha podido conectar genero información
            $this->msj_error .= "No se ha podido conectar a la base de datos<br />";
            $this->msj_error .= "Descripción de la excepción de conexión " . $ex->getMessage() . "<br />";
           /* $this->msj_error .= "Descripción del error " . $ex->errorInfo . "<br />";*/
        }

        return $con;

    }

    //Informativos - manejo de errores - metodos tostring
    public function estado_conexion()
    {
        if ($this->con != null) { //Si estoy conectado, informo de los datos
            $info = "Version usada en cliente <strong>{$this->getAttribute(PDO::ATTR_CLIENT_VERSION)}</strong><br />";
            $info .= "Estado de la conexión   <strong>{$this->getAttribute(PDO::ATTR_CONNECTION_STATUS)}</strong><br />";
            $info .= "Información del servidor  de BD<strong>{$this->getAttribute(PDO::ATTR_SERVER_INFO)}</strong><br />";
            $info .= "Versión del servidor  BD <strong>{$this->getAttribute(PDO::ATTR_CLIENT_VERSION)}</strong><br />";
        } else
            $info = "No se ha podido concectar a la BD, revise parámetros de conexión";
        var_dump($this);
        return $info;
    }
    public function get_error_message()
    {
        return $this->msj_error;
    }
    public function get_info_message(){
        return $this->msj_info;
    }
    public function __toString()
    {
        $html = "";
        $html .= "<h3>Visualizando la conexión a la BD</h3>";
        $html .= "<h4>host: ".$this->host." user : $this->user pass: $this->pass</h4>";
        $html .= "<hr/>";
        return $html;
    }
    public function version(){
        return $this->con->getAttribute(PDO::ATTR_SERVER_VERSION);
    }

    //De Gestion
    public function verBasesDatos() {
        try {
            $conexion = new PDO("mysql:host=" . $this->host, $this->user, $this->pass);
            $sentencia = $conexion->prepare("show databases");
            $sentencia->execute();
            while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                $filas[] = $fila;
            }
            return $filas;
        } catch (Exception $ex) {
            die("Error conectando a la base de datos " . $ex->getMessage());
        }
    }
   /* public function mostrarTablas() {
        $filas = [];
        $resultado = $this->con->prepare("show full tables");
        $resultado->execute();
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $filas[] = $fila;
        }
        return $filas;
    }*/
    public function comprobar_conexion(){
        $this->msj_error = NULL;
           //Si no estoy conectado, me conecto
           if ($this->con == NULL) {
               $data_conection = $_SESSION['conexion'];
               $this->conectar($data_conection);
           }
    }

    /**
     * Retorna un array con los campos de una tabla
     */
    public function campos($tabla): array
    {
        $arr_nombres_campos = [];
        // FETCH_ASSOC
        $stmt = $this->con->prepare("SELECT * FROM $tabla");
        // Especificamos el fetch mode antes de llamar a fetch()
        // PDO::FETCH_ASSOC: devuelve un array indexado cuyos keys son el nombre de las columnas.
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Ejecutamos
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach ($result as $columna => $contenido) {
            array_push($arr_nombres_campos, $columna);
        }
        return $arr_nombres_campos;
    }
    public function contenido($tabla)
    {

        $this->comprobar_conexion();

       /* $arr_campos = $this->campos($tabla);*/

        try {
            // FETCH_ASSOC
            $stmt = $this->con->prepare("SELECT * FROM $tabla");
            // Ejecutamos
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $exception) {
            $this->msj_error .= 'Error ejecutando consulta' . $exception->getMessage();
            die();
        }

        return $resultado;
    }
    public function get_data_bases()
    {
        $consulta = $this->con->query("show databases");
        $rtdo = [];
        while ($fila = $consulta->fetch(PDO::FETCH_NUM)) {
            $rtdo[] = $fila[0];
        }
        return $rtdo;
    }
    public function get_data_tables($bd = null)
    {
        if ($bd != null) {
            $consulta = $this->con->query("show tables from $bd ");
        } else {
            $consulta = $this->con->query("show tables");
        }
        $rtdo = [];
        while ($fila = $consulta->fetch(PDO::FETCH_NUM)) {
            $rtdo[] = $fila[0];
        }
        if ($rtdo != "") {
            $this->msj_info = "Se han obtenido las tablas correctamente.";
        } else {
            $this->msj_error = "Error obteniendo las tablas.";
        }

        return $rtdo;
    }
    public function get_table_content($nombre_tabla)
    {
        $prepared = "select * from $nombre_tabla ";

        $consulta = $this->con->query($prepared);

        $rtdo = [];
        while ($fila = $consulta->fetch(PDO::FETCH_NUM)) {
            $rtdo[] = $fila[0];
        }
        return $rtdo;
    }

    //Relacionadas con la vista - Plantillas
    //Pinta las bd
    public function print_data_bases()
    {
        $html = "";
        $data = $this->get_data_bases();

        if ($data != "") {
            /*  $html .= '<fieldset id="radios_bd">';
              $html .= '<legend>Gestión de las bases de datos del host <span class="variable">'.$host.'</span></legend>';
              $html .= "<div class='row'>";
              $html .= '<div class="col-md-12">';
              $html .= '<form role="form" action="./index.php" method="post" class="form">';
              $html .= '<div id="radios">';*/
            foreach ($data as $index => $bd) {
                $html .= "<div class='form-check'>";
                $html .= "<input class='form-check-input' type='radio' name='radio_bd' value='" . $bd . "' id='radio_bd_" . $index . "' >";
                $html .= '<label class="form-check-label">';
                $html .= "<span class='variable'>$bd</span>";
                $html .= '</label>';
                $html .= '</div>';
                $html .= "\n";
            }
            /*
                        $html .= '<input id="btn_acceder" type="submit" name="submit" value="Acceder" class="btn btn-dark">';

                        $html .= '</form>';
                        $html .= ' </div>';
                        $html .= '</div>';

                        $html .= "<script>";
                        $html .= "document.querySelector('#radio_bd_0').checked = true;";
                        $html .= "</script>";
                        $html .= "</fieldset>";*/
        } else {
            $html .= '<div>El host no contiene bases de datos válidas.</div>';
            $this->msj_error = "El host no contiene bases de datos válidas.";
        }

        return $html;

    }
    //Pinta las tablas
    public function print_data_tables($bd = null)
    {
        $html = "";
        $listado_bd = $this->get_data_tables($bd);
        foreach ($listado_bd as $bd) {
            $html .= "<input type=submit name='tabla' value='{$bd}' class='btn btn-dark'/> ";
        }
        return $html;

    }
    //Pinta el formulario con la tabla que recoge los datos de la bd
    public function print_datos($tabla, $campos, $filas)
    {

        $hayFilas = false;

        $html = "";
        $html .= '<div class="table-responsive">';
        $html .= '<table id="tabla_datos" class="table table-striped table-hover">';
        /* $html .=     "<caption>$tabla</caption>";*/
        $html .= '<thead>';
        $html .= '<tr>';
        foreach ($campos as $indice => $nombre) {
            $html .= ' <th scope="col">' . ucfirst($nombre) . '</th>';
            $hayFilas = true;
            $arr_nombres_columnas[$indice] = $nombre;
        }
        if ($hayFilas == true) {
            $html .= '<th scope="col">Edición</th>';
        }
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= ' <tbody>';

        foreach ($filas as $index => $contenido) {
            $html .= ' <tr value="'.$index.'">';
            //Contabiliza el numero de campos que hay
            $contador = 0;
            foreach ($campos as $nombre){
                $datos_fila[$arr_nombres_columnas[$contador]] = $contenido[$nombre];
                $dato_campo = $contenido[$nombre];

                $html .= '<form role="form" action="gestionarTabla.php" method="post" class="form-inline">';
                $html .= '<th scope="row"><span class="variable">' . $dato_campo . '</span></th>';
                $html .= "<input type='hidden' name='datos[".$nombre."]' value='".$dato_campo."' >";

                $contador++;
            }
            $hayFilas = true;
            //Si hay filas pintamos los botones:
            if ($hayFilas == true) {
                $html .= '<td class="justify-content-center selector">';
                $html .= ' <button type="submit" name="submit" value="modificar" class="btn btn-info"><i class="fa fa-pencil"></i></button>';
                $html .= ' <button type="submit" name="submit" value="eliminar" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
                $html .= ' </td>';
            }
            $html .= '</form>';
            $html .= '</tr>';

        }
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>  ';
        if ($hayFilas == false) {
            $this->msj_error = "La tabla seleccionada está vacía.";
        }
        $html .= '<div class="col-sm-12">';
        $html .= '<div class="form-group">';
        $html .= '<form role="form" action="gestionarTabla.php" method="post" class="form-inline">';
        $html .= '<button type="submit" name="submit" value="crear" class="btn btn-success boton"><i class="fa fa-plus"></i> Crear nuevo registro</button>';
        $html .= '<button type="submit" name="submit" value="cerrar" class="btn btn-danger boton"><i class="fa fa-close"></i> Cerrar</button>';
        $html .= '</form>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
    //Pinta el formulario de nuevo registro
    public function print_create_new_register_form($tabla)
    {
        $html = "";
        $campos = $this->campos($tabla);
        foreach ($campos as $campo) {
            $html .= '<div class="form-group">';
            $html .= "<label class='form-label' for=$campo>" . ucfirst($campo) . "</label>";
            $html .= '<div class="col-sm-10">';
            $html .= "<input class='form-control' type='text' value='' name='campos[$campo]'/>";
            $html .= "</div>";

        }
        return $html;
    }
    //Pinta el formulario de modificación de un registro
    public function print_update_register_form($datos_a_modificar)
    {
        $html = "";

        foreach ($datos_a_modificar as $nombre_columna => $campo) {

            $html .= '<div class="form-group">';
            $html .= "<label class='form-label' for=$nombre_columna>" . ucfirst($nombre_columna) . "</label>";
            $html .= '<div class="col-sm-12">';
            $html .= "<input class='form-control' type='text' value='$campo' name='campos[$nombre_columna]'></input>";
            $html .= '</div>';
            $html .= "</div>";



        }
        $html .= '<div class="btn-group">';
        $html .= '<button type="submit" name="submit" value="guardar" class="btn btn-success boton">';
        $html .=  '<i class="fa fa-save"></i> Guardar</button>';
        $html .= '<button type="submit" name="submit" value="cancelar" class="btn btn-danger boton">';
        $html .= '<i class="fa fa-close"></i> Cancelar</button>';
        $html .=  '</div>';
        return $html;
    }

    //CRUD

    /**
     * @param $sentencia
     * @param null $valores
     * @param null $conexion
     * Debe de ejecutar una sentencia que le paso por parámetro
     */
    private function ejecutarConsulta($sentencia, $valores = null)
    {
        $this->msj_error = NULL;
        //Si no estoy conectado, me conecto
        if ($this->con == NULL) {
            $data_conection = $_SESSION['conexion'];
            $table = $_SESSION['tabla'];
            $this->conectar($data_conection);
        }
        //Intento lanzarla
        try {
            $stmt = $this->con->prepare($sentencia);
            $stmt->execute($valores);
        } catch (Exception $exception) {
            $this->msj_error .= 'Error ejecutando consulta: ' . $exception->getMessage();
            die();
        }
        return $stmt;

    }

    /**
     * @param $sentencia
     * @param null $valores
     * En este caso el código puede quedar como se muestra
     */
    public function insertar($sentencia, $valores = null)
    {
        $r = $this->ejecutarConsulta($sentencia);
        if ($this->msj_error != NULL)
            $this->msj_error = "Error insertando, tener encuenta las relaciones de integridad referencial <br />" . $this->msj_error;
    }

    public function prepared_insert($table, $data)
    {
        $keys = array_keys($data);
        $fields = implode(",", $keys);
        $placeholders = str_repeat('?,', count($keys) - 1) . '?';
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";

        $this->msj_error = NULL;
           //Si no estoy conectado, me conecto
           if ($this->con == NULL) {
               $data_conection = $_SESSION['conexion'];
               $this->conectar($data_conection);
           }
           try {
               $stmt = $this->con->prepare($sql);
               $stmt = $stmt->execute(array_values($data));
               /*var_dump($stmt);*/
           } catch (Exception $exception) {
               $this->msj_error .= 'Error ejecutando consulta' . $exception->getMessage();
               die();
           }
            if($stmt == true){
                $this->msj_info = 'Se ha insertado con éxito el nuevo registro';
            }

           return $stmt;

    }
    public function prepared_update ($tabla,$arr_valores_antiguos,$arr_valores_nuevos){
        foreach ($arr_valores_nuevos as $campo => $valor) {
            $valores .= "$campo = :$campo, ";
            $update[":$campo"] = $valor;
        }
        $valores = substr($valores, 0, -2);

        foreach ($arr_valores_antiguos as $campo => $valor) {
            if ($valor == "")
                $campos .= "$campo is null and ";
            else {
                $campos .= "$campo = :" . $campo . "1 and ";
                $update[":$campo" . "1"] = $valor;
            }
        }
        $campos = substr($campos, 0, -4);
        $sentencia = "UPDATE $tabla SET $valores WHERE $campos";

        $this->msj_error = NULL;
        //Si no estoy conectado, me conecto
        if ($this->con == NULL) {
            $data_conection = $_SESSION['conexion'];
            $this->conectar($data_conection);
        }
        try {
            $stmt = $this->con->prepare($sentencia);
            $stmt->execute($update);
            /*var_dump($stmt);*/

        } catch (Exception $exception) {
            $this->msj_error .= 'Error ejecutando consulta' . $exception->getMessage();
            die();
        }
        if($stmt == true){
            $this->msj_info = 'Se ha insertado con éxito el nuevo registro';
        }

        return $stmt;

    }

    /**
     * @param $sentencia
     * @param null $valores
     * En este caso el código puede quedar como se muestra
     */
    public function borrar($sentencia, $valores = null)
    {
        $this->error = null;
        $r = $this->ejecutarConsulta($sentencia, $valores);
        if ($this->msj_error != null) {
            $this->msj_error = "Error borrando, tener encuenta las relaciones de integridad referencial  <br />" . $this->msj_error;
        }else{
            $this->msj_info = "Se ha eliminado correctamente el registro indicado.";
        }
    }

    /**
     * @param $sentencia
     * @param null $valores
     * En este caso el código puede quedar como se muestra
     */
    public function actualizar($sentencia, $valores = null)
    {
        $this->msj_error = null;
        $r = $this->ejecutarConsulta($sentencia, $valores);
        //En este caso, aunque no se lance excepción, si no se ha insertado lo consideraremos un error
        if (($this->msj_error != NULL) || ($r->rowCount() == 0)) {
            $this->msj_error = "Error actualizando, tener encuenta las relaciones de integridad referencial <br />" . $this->msj_error;
        }else{
            $this->msj_info = "Se ha actualizado con éxito el registro";
        }
    }

    /**
     *
     * @param type $sentencia
     * @param type $valores
     * @return array con las filas de la consulta
     */
    public function seleccionar($sentencia, $valores = null): array
    {
        $resultado = [];


        return $resultado;
    }

    //Gettters and setters
    function getCon()
    {
        return $this->con;
    }

    function get_database()
    {
        return $this->database;
    }

    function getUser()
    {
        return $this->user;
    }

    function getPass()
    {
        return $this->pass;
    }

    function getHost()
    {
        return $this->host;
    }

    function setCon($conexion)
    {
        $this->con = $conexion;
    }

    //Cierre
    public function cerrar()
    {
        unset($this->con);
        /*$this->con = null;*/
    }

}