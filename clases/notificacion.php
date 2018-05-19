<?php 

require_once("clases/clase_base.php");

class Notificacion extends ClaseBase{
	private $id = 0;
    private $vista = false;
    private $contenido = "";
    private $idusuario = 0;
    private $fecha = "";
    private $hora = "";
    private $activa = "";

    public function __construct($obj=NULL) {
        if(isset($obj)){
            foreach ($obj as $key => $value) {
                $this->$key=$value;
            }    
        }

        parent::__construct("notificaciones");
    }

    //Getters
    public function getId(){
    	return $this->id; 	
    }

    public function getIdUsuario(){
    	return $this->idUsuario; 	
    }

    public function getContenido () {
        return $this->contenido;
    }

    public function getVista(){
    	return $this->vista; 	
    }

    public function getFecha(){
    	return $this->fecha; 	
    }

    public function getHora(){
    	return $this->hora; 	
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNotifUser($idUsuario){
        $sql="select * from notificaciones WHERE idusuario=$idUsuario AND activa = 1";
        $res=NULL;
        $resultado =$this->db->query($sql) or die ("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
        while($fila = $resultado->fetch_object()) {
            $res[] = new $this->modelo($fila);
        }
        
        return $res;
    }


    public function getNotif($idNotif){

        $sql="select * from notificaciones where id=$idNotif";
        $res=NULL;
        $resultado =$this->db->query ($sql) or die ("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
        $fila = $resultado->fetch_object();
        $res = new $this->modelo($fila);
        return $res;

    }


    public function getListado () {
        $sql = "SELECT * FROM `notificaciones` WHERE activa = 1 AND idUsuario IN (SELECT id from `usuarios` WHERE activo=1)";
        $res=NULL;
        $resultado =$this->db->query($sql) or die ("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
        while($fila = $resultado->fetch_object()) {
            $res[] = new $this->modelo($fila);
        }
        return $res;
    }

    public function vista(){
        ini_set("display_errors", 1);
        error_reporting(E_ALL & ~E_NOTICE);

        $sql=$this->db->prepare("UPDATE `notificaciones` SET `vista`= 1");
        $sql->execute();
        if ($this->db->affected_rows >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function eliminar(){
        ini_set("display_errors", 1);
        error_reporting(E_ALL & ~E_NOTICE);

        $sql=$this->db->prepare("UPDATE `notificaciones` SET `activa`= 0  WHERE id=".$this->getId());
        $sql->execute();
        if ($this->db->affected_rows == 1){
            return true;
        }else{
            return false;
        }
    }
}
?>
