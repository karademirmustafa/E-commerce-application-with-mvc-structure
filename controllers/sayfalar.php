<?php

class sayfalar extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
	Session::init();
	
	
	}	
	
		
	
	function iletisim() {
	
	$this->view->goster("sayfalar/iletisim");
		
	}
	
	function sepet() {
	
	$this->view->goster("sayfalar/sepet");
		
	}
	
	function kargonezamangelir() {
	
	$this->view->goster("sayfalar/diger/kargonezaman");
		
	}
	
	function iadehakki() {
	
	$this->view->goster("sayfalar/diger/iadehakki");
		
	}
	
	function musterihizmetleri() {
	
	$this->view->goster("sayfalar/diger/musterihizmetleri");
		
	}
	
	function gizlilikpolitikasi() {
	
	$this->view->goster("sayfalar/diger/gizlilikpolitikasi");
		
	}
	function satissozlesmesi() {
	
	$this->view->goster("sayfalar/diger/satissozlesmesi");
		
	}

	
	function siparisitamamla() {
	
	$this->view->goster("sayfalar/siparisitamamla");
		
	}
	
	
	
	
}




?>