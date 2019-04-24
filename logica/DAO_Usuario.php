<?php

require_once("DAO_Interface.php");

class DAO_Usuario implements DAO_Interface {

    private static $instance = null;

    //Evitamos asi la contruccion de la clase
    private function __construct() {  }

    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new DAO_Usuario();
        }
        return self::$instance;
      }

	//METODOS
  public function createElement($transfer) {//crea usuario

		$app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();

		$ID_Empresa=$transfer->getId_Usuario();
		$email=$transfer->getEmail();
		$password=$transfer->getPassword();
		$Nombre=$transfer->getNombre();
		$Img_Empresa=$transfer->getImagenPerfil();
		$Localizacion=$transfer->getLocalizacion();
		$cartaPresentacion=$transfer->getCartaPresentacion();

		if($Img_Empresa == NULL)
		{
			$consulta="INSERT INTO empresa (ID_Empresa, email, password, Nombre, Localizacion, Img_Empresa, cartaPresentacion) VALUES('$ID_Empresa' ,'$email', '$password', '$Nombre', '$Localizacion', 'img/usuario.png', '$cartaPresentacion')";
		}
		else
		{
			$consulta="INSERT INTO empresa (ID_Empresa, email, password, Nombre, Localizacion, Img_Empresa, cartaPresentacion) VALUES('$ID_Empresa' ,'$email', '$password', '$Nombre', '$Localizacion', '$Img_Empresa', '$cartaPresentacion')";
		}
		$rs = $conn->query($consulta);
		if(!$rs) echo "<br>".$conn->error."<br>";
		return $rs;
	}
//--------------------------
	public function getElementById($id){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta = "SELECT * FROM empresa WHERE ID_Empresa='$id'";//consulta sql
		$results = mysqli_query($db, $consulta);

		if (mysqli_num_rows($results) == 1) {  //si se encuentra la fila, el usuario y contraseña son correctas
			$empresa = mysqli_fetch_assoc($results);
			//cambio
			if($empresa["Img_Empresa"] == NULL)	{
					return new usuarioTransfer($empresa["ID_Empresa"],$empresa["Nombre"],$empresa["password"],$empresa["email"], $empresa["Localizacion"], $empresa["Img_Empresa"], $empresa["cartaPresentacion"]);
			}
			else{
			    return new usuarioTransfer($empresa["ID_Empresa"],$empresa["Nombre"],$empresa["password"],$empresa["email"], $empresa["Localizacion"], $empresa["Img_Empresa"], $empresa["cartaPresentacion"]);
			}
		}
		else {
			return ;//NULL
		}
	}
//--------------------------
	public function deleteElement($id){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta="DELETE FROM empresa WHERE ID_Empresa = '$id'";
		$res = mysqli_query($db, $consulta)? true : false;
    return $res;
	}
//--------------------------
	public function updateElement($id, $campo, $nuevoValor){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();

		if($campo == "imagen") {
			$query = "SELECT imagen FROM empresa WHERE ID_Empresa = '$id'";
			$results  = mysqli_query($db, $query);

			if(mysqli_num_rows($results) != 0) {

				while($fila=mysqli_fetch_assoc($results))	{
					$imagen = $fila["imagen"];
					unlink('./imagenPerfil/'.$imagen);	//TO DO
				}
			}
		}

		$consulta="UPDATE empresa SET ".$campo." = '$nuevoValor' WHERE ID_Empresa = '$id'";
		$res = mysqli_query($db, $consulta) ? false :true ;
    return $res;
	}

    //--------------------------
	public function getAllElements(){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM empresa ORDER BY nombre";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($fila = mysqli_fetch_assoc($query)){
                $transfer = new usuarioTransfer($fila["ID_Empresa"],$fila["Nombre"],$fila["password"],$fila["email"], $fila["Localizacion"], $fila["Img_Empresa"], $fila["cartaPresentacion"]);
				array_push($lista,$transfer);
			}
		}
    return empty($lista) ? null : $lista;
	}

    /**Esta funcion se encarga de buscar un elemento en la base de datos a traves del campo gmail
	@param gmail: recibe un string del tipo email
	@return id: devuelve un transfer referenciado a ese gmail o un objeto nul
	*/
	public function getElementByEmail($gmail) {
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
	    //Buscamos en la base de datos el posble gmail
	     $consul = sprintf("SELECT * FROM empresa WHERE email = '$gmail' ORDER BY nombre");
	     $res = $db->query($consul);

    //Si la consulta fuese tan correcta
	  if ($res){
	  		$empresa = mysqli_fetch_assoc($res);
			$transfer = new usuarioTransfer($empresa["ID_Empresa"],$empresa["Nombre"],$empresa["password"],$empresa["email"], $empresa["Localizacion"],$empresa["Img_Empresa"], $empresa["cartaPresentacion"]);
			return $transfer;
		}
		else {
			return null;
		}
	}
}
?>
