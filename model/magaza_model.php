<?php

class magaza_model extends Model {
	
	
	function __construct() {		
		parent:: __construct();
	}
	
	
	
	function anasayfaUrunler($tabload,$kosul) {		
		return $this->db->listele($tabload,$kosul); 
		
	}
	
	

	

	
}




?>