<?php

class  Cookie {
	

	
	
	public static function SepeteEkle($id,$adet){
		
		if (isset($_COOKIE["urun"])) :
		
		
					if (array_key_exists($id,$_COOKIE["urun"])) :
						
					$adetal=$_COOKIE["urun"][$id]; 
					$sonadet=$adetal + $adet; 
						
					setcookie('urun['.$id.']',$sonadet, time()+ 60*60*24,"/");
					
					else:
					
					setcookie('urun['.$id.']',$adet, time()+ 60*60*24,"/");
					
					endif;
					
	else:
	
	setcookie('urun['.$id.']',$adet, time()+ 60*60*24,"/");
		
		
	endif;
		
	
	
			
		
	
		
	}
	
		
	public static function SepeteBak(){
		
		if (isset($_COOKIE["urun"])) :
		
		
				foreach ($_COOKIE["urun"] as $id => $adet) :
				
				echo "Ürün İd : ". $id. " Adeti : ". $adet."<br>";
				
				endforeach;
		
		
		
		
		else:
		
		// eğer ki ürün yok ise buradan uytarı döndürebilirz.
		return false;
		
		endif;
		
		
		
		
	
		
	}
	
	
	public static function UrunUcur($id){
		
		if (isset($_COOKIE["urun"])) :
		
		setcookie('urun['.$id.']',false, time()-2 ,"/");
				
		
		endif;		
		
		
	
		
	}
	
		public static function Guncelle($id,$adet){
		
		if (isset($_COOKIE["urun"])) :
		
		/*$adetal=$_COOKIE["urun"][$id]; // burada mevcut adeti alıyorum
		$sonadet=$adetal + $adet; // 8 rakamı ulaştım
		
		// 17   adet 6
		// 17   adet 2*/
		
		setcookie('urun['.$id.']',$adet, time()+ 60*60*24,"/");
				
		
		endif;		
		
		
	
		
	}
	
	
	
	
		public static function SepetiBosalt(){
		
		if (isset($_COOKIE["urun"])) :
		
		
				foreach ($_COOKIE["urun"] as $id => $adet) :
				
				setcookie('urun['.$id.']',$adet, time()-2 ,"/");
				
				endforeach;
		
		
		
		
		endif;
		
		
		
		if (!isset($_COOKIE["urun"])) :
		
		// SEPET BOŞALINCA BURADA DÖNECEK
		return true;
		
		endif;
		
		
		
		
	
		
	}
		
	
	
	
	
	

	
}




?>