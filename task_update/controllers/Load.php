<?php 
	/***
	
	 * Class Load
	 * With namespace Controller\Loads	
	 * This class use to get value input form (text, password, email, checkbox)
	 * Return data input
	 * Update on Github	
	**/
	namespace Controller\Loads;
	
	require_once("ConnectDb.php");

	use Controller\Db\ConnectDb;

	class Load extends ConnectDb
	{
		protected $path;
		protected $data;
		protected $formErr = array();

		// Load file as path

		// Set a exactly argument as path is obligatory

		// Varible data is option, path plus
		public function load($path, array &$data = array())
		{
			if (isset($data)) {
				$this->data = $data;
				$this->path = $path;
				return require_once($this->path);
			}
			return require_once($this->path);
		}

/*--------------------------------------------------------------------*/

		// Load all value input form
		// Field is a array hold name of input feild to get value
		// Return data get;
		public function loadFormInput(array $feild = array())
		{
			if (isset($feild) && !empty($feild)) {
				foreach ($feild as $name) {

					$this->data[$name] = $_POST[$name];
				}
				return $this->data;
			} 
			return false;
		}

/*--------------------------------------------------------------------*/

		// Load all value in put form and if any feil is empty 
		// Return empty field name 
		public function loadFormInputErrors(array $feild = array())
		{
			if (isset($feild) && !empty($feild)) {
				foreach ($feild as $name) {
					if (isset($_POST[$name]) && $_POST[$name] == '') {
						
						$this->formErr[$name] = 'Feild: '. $name . ' is empty!';
					}
					if (array_key_exists($name, $_POST) == false) {
						$this->formErr[$name] = 'Feild: '. $name . ' is empty!';
					}
				}
				return $this->formErr;
			}
			return false;
		}
	}

