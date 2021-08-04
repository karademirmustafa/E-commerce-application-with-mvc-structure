<?php

class Form extends Bilgi  {
	
		public $deger,$veri;
		public $error=array(),$sonuc=array();

		
		function get ($key) {
			
			$this->deger=$key;
					
			
			$this->veri=htmlspecialchars(strip_tags($_POST[$key]));
			
			return $this;
			
			
		}
		
	
		
		
	
	function bosmu() {
			
			
			
			if (empty($this->veri)) :
			$this->error[]=$this->deger. " boş olamaz";
			
					
			return $this;
			
			else:
			
			return $this->veri;
			
			
			endif;
			
		} // boşmu 
		
		function GercektenMailmi($email) {		
		
						
			getmxrr(substr($email,strpos($email,'@')+1),$this->sonuc);
			
			if (!count($this->sonuc)>0):
					
			$this->error[]="Mail adresi geçersiz";
			
			endif;	
		
		
			
		} // mail kontrol	
		
	function sifrele($veri) {
			
			return base64_encode(gzdeflate(gzcompress(serialize($veri))));
					
			
		} // veri şifreleme
		
	function coz($veri) {
			
			return unserialize(gzuncompress(gzinflate(base64_decode($veri))));
		} // veri çözme		
		
	function SifreTekrar($deger,$deger2) {
			
			if ($deger!=$deger2) :
			
			$this->error[]="Girilen şifreler uyumsuz";	
			
			
			else:
			
			return $this->sifrele($deger);
			
			endif;
			
			
			
		} // şifreler uyuşuyor mu
		
		
	public static function Olustur($kriter,array $veri=NULL,$textmetin=false) {
		
		/*
		1 form
		2 input
		3 textarea	
		
		*/
		switch ($kriter):
			
		case "1": echo '<form ';	break;
		case "2": echo '<input ';	break;
		case "3": echo '<textarea '; break;	
		case "kapat": echo '</form> '; break;		
		endswitch;		
		
		
		if (isset($veri)) :
		
		
		
		
		foreach ($veri as $anahtar => $deger) :
		
		echo $anahtar."='".$deger."' ";	
				
		endforeach;
		
		echo ($kriter==3) ? '>'.$textmetin.'</textarea>' : '>'; // ternay tek satır sorgu
		
		endif;	
				
		
		
		/* 2.YÖNTEM
		
		// "method@POST",
		echo '<form ';
		
		foreach ($veri as  $deger) :
		
		$bol=explode("@",$deger);
		// $bol
		
		echo $bol[0]."='".$bol[1]."' ";
		
				
		endforeach;
		
		echo '>';
	
	*/
	}
	
	public static function OlusturSelect($kriter,array $veri=NULL) {
		
		if ($kriter==1) :
		
			 echo '<select '; 
		
		
			foreach ($veri as $anahtar => $deger) :
			
			echo $anahtar."='".$deger."' ";	
					
			endforeach;
			
	
			echo'>'; 
			
		 elseif ($kriter==2):
		 
		  
		echo'</select>'; 
		
		endif;
			
	
		

	
	}
	
	public static function OlusturOption(array $option=NULL,$selected=false,$optionmetin) {
			
		echo '<option ' ;
		//  Form::OlusturOption(array("value"=>0),"Tedarik");	
		
		
		foreach ($option as $anahtar => $deger) :	
		
		echo  $anahtar."='".$deger."' ".$selected." ";
				
		endforeach;
		echo "> ".$optionmetin."</option>";	

		
		
		
	

				
		
		
	
	}
	

	
	
				
		

		
		
		
		
	

	
}




?>