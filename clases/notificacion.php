<?php 

require_once("clases/clase_base.php");

class Notificacion extends ClaseBase{
	private $id = 0;
    private $idUsuario = 0;
    private $contenido = "";
    private $vista = false;
    private $fecha = "";
    private $hora = "";

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

    public function getNotifUser($idUsuario){
        $sql="select * from notificaciones where idUsuario=$idUsuario";
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
        $sql = "SELECT * FROM `notificaciones` WHERE idUsuario IN (SELECT id from `usuarios` WHERE activo=1)";
        $res=NULL;
        $resultado =$this->db->query($sql) or die ("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
        while($fila = $resultado->fetch_object()) {
            $res[] = new $this->modelo($fila);
        }
        return $res;
    }

}
?>
