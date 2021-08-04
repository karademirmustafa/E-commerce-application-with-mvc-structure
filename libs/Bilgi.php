<?php

class Bilgi  {

		function basarili($deger,$yol,$sure=3) {
			
			
			return '<div class="alert alert-success mt-5 text-center">'.$deger.'</div>'
			. header("Refresh:".$sure."; url=".URL.$yol);
		}
		
		function hata($deger=false,$yol,$sure=3) {
			
			
			return '<div class="alert alert-danger mt-5">'.$deger.'</div>'
			. header("Refresh:".$sure."; url=".URL.$yol);
		}
		
		function uyari($tur,$metin,$id=false) {
			
			
			return '<div class="alert alert-'.$tur.' mt-2 pt-3 text-center" '. $id.'>'.$metin.'</div>';
		}
		
		function direktYonlen($yol) {
			
			
			return  header("Location:".URL.$yol);
		}
	
	
	function sureliYonlen($zaman,$yol) {
			
			
			return  header("Refresh:".$zaman."; url=".URL.$yol);
		}
	
	
	

	
}




?>