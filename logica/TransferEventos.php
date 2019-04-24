<?php
class eventoTransfer {

	private $nombre;
	private $Localizacion;
	private $precio;
	private $Cantidad_Perros;
	private $fecha;
	private $Img_Evento;

	function __construct($nombre, $Localizacion ,$precio, $Cantidad_Perros,$Img_Evento){
		$this->nombre = $nombre;
		$this->Localizacion = $Localizacion;
		$this->precio = $precio;
		$this->Cantidad_Perros = $Cantidad_Perros;
		$this->Img_Evento = $Img_Evento;
	}

	/**GETTER: devuelve los parametros privados*/

	/**@return nombre: string value*/
	public function getNombre(){
		return $this->nombre;
	}

	/**@return nombre: string value*/
	public function getLocalizacion(){
		return $this->Localizacion;
	}
	/**@return precio: integer value*/
	public function getPrecio(){
		return $this->precio;
	}

/**@return cantidad: integer value*/
	public function getCantidad(){
		return $this->Cantidad_Perros;
	}

/**@return imagenEvento: url value*/
	public function getImagenEvento(){
		if(($this->Img_Evento)==null)
			return 'img/event.png';
		else
			return $this->Img_Evento;
	}

/**SETTER: cambian los valores */

/** set @param nombre : string value */
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

/** set @param precio : integer value */
	public function setPrecio($precio){
		$this->precio = $precio;
	}

/** set @param cantidad : integer value */
	public function setCantidad($Cantidad_Perros){
		$this->cantidad = $Cantidad_Perros;
	}

/** set @param imagenEvebto : string value */
	public function setImagenEvento($Img_Evento){
		$this->Img_Evento = $Img_Evento;
	}

}
?>
