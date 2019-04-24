<?php
class usuarioTransfer {

	private $id_empresa;
	private $nombre;
	private $password;
	private $email;
	private $localizacion;
	private $imagenPerfil;
	private $cartaPresentacion;


	function __construct($id_empresa, $nombre, $password, $email, $localizacion,$imagenPerfil,$cartaPresentacion){
		$this->id_empresa = $id_empresa;
		$this->nombre = $nombre;
		$this->password = $password;
		$this->email = $email;
		$this->localizacion = $localizacion;
		$this->imagenPerfil = $imagenPerfil;
		$this->cartaPresentacion = $cartaPresentacion;
	}

	/**GETTER: devuelve los parametros privados*/

	/**@return $id_empresa: string value*/
	public function getId_Usuario() {
		return $this->id_empresa;
	}

	/**@return nombre: string value*/
	public function getNombre(){
		return $this->nombre;
	}

	/**@return email: string value*/
	public function getPassword(){
		return $this->password;
	}

	/**@return email: string value*/
	public function getEmail(){
		return $this->email;
	}

	/**@return localizacion: string value*/
	public function getLocalizacion(){
		return $this->localizacion;
	}

		/**@return imagenPerfil: url value*/
	public function getImagenPerfil(){
		if(($this->imagenPerfil)==null)
			return 'img/usuario.png';
		else
			return $this->imagenPerfil;
	}
	public function getCartaPresentacion(){
		return $this->cartaPresentacion;
	}


/**SETTER: cambian los valores */

		/** set @param $id_empresa : string value */
	public function setId_Usuario($id_empresa){
		$this->id_empresa = $id_empresa;
	}

		/** set @param nombre : string value */
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

		/** set @param password : string value */
	public function setPassword($password){
		$this->password = $password;
	}

	/** set @param email : string value */
	public function setEmail($email){
		$this->email = $email;
	}

	/** set @param localizacion : string value */
	public function setLocalizacion($localizacion){
		$this->contPelisVistas = $contPelisVistas;
	}

	/** set @param imagenPerfil : string value */
	public function setImagenPerfil($imagenPerfil){
		$this->imagenPerfil = $imagenPerfil;
	}
	public function setCartaPresentacion($cartaPresentacion){
		$this->cartaPresentacion = $cartaPresentacion;
	}
}
?>
