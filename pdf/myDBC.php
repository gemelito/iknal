<?php
class myDBC {
    public $mysqli = null;
 
    public function __construct() {
        //_construct-Abre una nueva conexión al servidor de MySQL
 
        include_once "dbconfig.php";
        $this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 
        if ($this->mysqli->connect_errno) {
            echo "Error MySQLi: ("&nbsp. $this->mysqli->connect_errno.") " . $this->mysqli->connect_error;
            exit();
            //connect_errno-Devuelve el código de error de la última llamada, connect_error-Devuelve una cadena con la descripción del último error de conexión
        }
        $this->mysqli->set_charset("utf8");
    }
 
    public function __destruct() {// _destruct
        $this->CloseDB();
    }
 
    public function runQuery($qry) {
        $result = $this->mysqli->query($qry);
        return $result;
    }
 
    public function CloseDB() {
        $this->mysqli->close();
    }
 
    public function clearText($text) {
        $text = trim($text);
        return $this->mysqli->real_escape_string($text);
        //real_escape_string-Escapa los caracteres especiales de una cadena para usarla en una sentencia SQL, tomando en cuenta el conjunto de caracteres actual de la conexión
    }
    //trim-Elimina espacio en blanco (u Otro tipo de caractères) del inicio y el final de de la cadena
    //LTRIM () - Retira espacios en blanco (u Otros Caracteres) del inicio de un string
    //rtrim () - Retira los espacios en blanco (u Otros Caracteres) del final de un string
    //str_replace () - Reemplaza Todas las Apariciones del string Buscado Con El string de Reemplazo
 
    public function obtenerAlumno($matricula){
        //Buscamos en la tabla el registro coincidente con matricula obtenida
        $q = "select * from alumno where matricula_alumno='$matricula' "; 
 
        $result = $this->mysqli->query($q);
 
        $arreglo = array();
 
            $obj = mysqli_fetch_array($result);
            //En arreglo se guarda cada campo, utf8 para los acentos y ñ's
            //fetch_array — Obtiene una fila de resultados como un array asociativo, numérico, o ambos
             //strtoupper=Convierte una cadena en mayúsculas
           
            $arreglo[0] = utf8_decode($obj['nombre_alumno']);
            $arreglo[1] = utf8_decode($obj['apellidop_alumno']);  
            $arreglo[2] = utf8_decode($obj['apellidom_alumno']);
            $arreglo[3] = $obj['matricula_alumno']; 
            $carrera=$obj['carrera_alumno'];
            $query = "SELECT Id_carrera, carrera FROM carrera WHERE $carrera = Id_carrera";
            $resultado=$this->mysqli->query($query);
            while ($cambio=mysqli_fetch_array($resultado))
            $carreras=$cambio["carrera"];
            $arreglo[4] = utf8_decode($carreras);
            $arreglo[5] = utf8_decode($obj['semestre_alumno']);
        return $arreglo;
    }
}
?>