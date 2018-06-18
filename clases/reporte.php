<?php

require_once("clases/clase_base.php");

class Reporte extends ClaseBase {


    private $idArchivo = 0;
    private $idReporte = 0;
    private $tipo = "";
    private $descripcion = "";


    public function __construct($obj = NULL) {
        if (isset($obj)) {
            foreach ($obj as $key => $value) {
                $this->$key = $value;
            }
        }

        parent::__construct("reportes");
    }

    /*  ajustar para reportes
    public function buscar($filtro) {
        if ($filtro == NULL)
            return NULL;

        $sql = "SELECT * FROM `Reportes` WHERE activo=1 AND duenio IN (SELECT id from `usuarios` WHERE activo=1)";
        $res = NULL;
        $resultado = $this->db->query($sql) or die("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");

        while ($fila = $resultado->fetch_object()) {
            if (strpos($fila->nombre, $filtro) !== false || strpos($fila->descripcion, $filtro) !== false)
                $res[] = new $this->modelo($fila);
        }

        return $res;
    }*/

    public function getReportes() { 
        //0:idArchivo , 1:nombreArchivo , 2:idReporte, 3:tipo, 4:descripcion , 5:correo
        $stmt = DB::conexion ()->prepare("SELECT r.idArchivo AS idA, a.nombre ,r.idReporte AS idR ,r.tipo,r.descripcion,u.correo FROM reportes as r , archivos as a, usuarios as u WHERE r.idArchivo = a.id AND a.duenio=u.id ");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $res = null;
        while($fila = $resultado->fetch_array(MYSQLI_NUM) ){
            $res[] = $fila;
        }
        return $res;
    }


    public function eliminarReporte($idReporte) {
        $sql = $this->db->prepare("DELETE FROM `reportes` WHERE `idReporte`=?");
        $sql->bind_param("i", $idReporte);
        if($sql->execute()){
            return true;
        }else{
            return false;
        }

    }
    
    public function cantidad($idArchivo,$tipo){
        $cant=DB::conexion ()->prepare("SELECT COUNT(*) AS cant from reportes where idArchivo= \"" . $idArchivo . "\" and tipo= \"" . $tipo . "\"");
        $cant->execute();
        $resultadoCant = $cant->get_result();
        return $resultadoCant->fetch_object()->cant;
    }

    public function getReportesOrdenadoPorArchivo() { 
        //0:idArchivo , 1:nombreArchivo , 2:idReporte, 3:tipo, 4:descripcion
        $stmt = DB::conexion ()->prepare("SELECT r.idArchivo AS idA, a.nombre ,r.idReporte AS idR ,r.tipo,r.descripcion FROM reportes as r , archivos as a WHERE r.idArchivo = a.id ORDER BY r.idArchivo DESC");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $res = null;
        while($fila = $resultado->fetch_array(MYSQLI_NUM) ){
            $res[] = $fila;
        }
        return $res;
    }

    public function getReportesOrdenadoPorTipo() { 
        //0:idArchivo , 1:nombreArchivo , 2:idReporte, 3:tipo, 4:descripcion
        $stmt = DB::conexion ()->prepare("SELECT r.idArchivo AS idA, a.nombre ,r.idReporte AS idR ,r.tipo,r.descripcion FROM reportes as r , archivos as a WHERE r.idArchivo = a.id ORDER BY r.tipo DESC");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $res = null;
        while($fila = $resultado->fetch_array(MYSQLI_NUM) ){
            $res[] = $fila;
        }
        return $res;
    }


}

?>
