<?php

class  View {
	
	
	
	//  ($dosyaad,$header=null,$data1=null,$data2=null,$data3=null) {
	public function goster ($dosyaad,array $veri= NULL) {
		
		require 'views/'.$dosyaad.'.php';
		
	}
	
	
	

	
}




?>