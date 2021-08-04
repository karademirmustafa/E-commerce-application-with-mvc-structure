<?php

class uye_model extends Model {
	
	
	function __construct() {		
		parent:: __construct();
	}
	
	
	
	function GirisKontrol($tabloisim,$kosul) {
		
		return $this->db->giriskontrol($tabloisim,$kosul);		
		
	}
	
		
	function Ekleİslemi($tabloisim,$sutunadlari,$veriler) {
		
		return $this->db->Ekle($tabloisim,$sutunadlari,$veriler);
	
		
		
	}
	
	function yorumlarial($tabloisim,$kosul) {
		
		return $this->db->listele($tabloisim,$kosul);
	
		
		
	}
	
	function yorumSil($tabloisim,$kosul) {
		
		return $this->db->sil($tabloisim,$kosul);
	
		
		
	}
	
	function adresSil($tabloisim,$kosul) {
		
		return $this->db->sil($tabloisim,$kosul);
	
		
		
	}
	
	function yorumGuncelle($tabloisim,$sutunlar,$veriler,$kosul) {
		
		
		return $this->db->guncelle($tabloisim,$sutunlar,$veriler,$kosul);
	}
	
	function AyarlarGuncelle($tabloisim,$sutunlar,$veriler,$kosul) {
		
		
		return $this->db->guncelle($tabloisim,$sutunlar,$veriler,$kosul);
	}
	function sifreGuncelle($tabloisim,$sutunlar,$veriler,$kosul) {
		
		
		return $this->db->guncelle($tabloisim,$sutunlar,$veriler,$kosul);
	}
	
	
	
	function SiparisTamamlamaUrunCek($tabloisim,$kosul) {
	
	return $this->db->listele($tabloisim,$kosul);
		
	} // ÜRÜN ÇEK
	
	function TopluislemBaslat() {		
	return $this->db->beginTransaction();	
		
	}
	
	function TopluislemTamamla() {
	return $this->db->commit();
	}
	
	
	
	function SiparisTamamlama($veriler) {
	
	return $this->db->siparisTamamla($veriler);
		
	} // SİPARİŞ TAMAMLAMA


	
}




?>