<?php

class urunler extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
		
	Session::init();	
	
	$this->Modelyukle('urunler');

	/*$this->view->goster("sayfalar/index",
	array(
	"data1" => $this->model->anasayfaUrunler("urunler","where durum=0 order by id desc"),	"data2" => $this->model->anasayfaUrunler("urunler","where durum=1 order by id desc")
	
	));*/
	
	
		
	}	
	
	
	function detay($id,$ad) {
		
		//** gelen id ye göre urunlere bağlanarak ilgili ürünün tüm verileri çekicez ve tabi ki sayfaya gödnereceğiz.
		
		
		$sonuc=$this->model->uruncek("urunler","where id=".$id);
		
		//$sonuc[0]["katid"]
		
		//and id!=".$id
		
		$this->view->goster("sayfalar/urundetay",
		array(
		"data1" => $sonuc,
		"data2" => $this->model->uruncek("urunler","where katid=".$sonuc[0]["katid"]." and id<>$id and stok < 200 order by stok asc LIMIT 10 "),
		"data3" =>$this->model->uruncek("urunler","where katid=".$sonuc[0]["katid"]." and id<>$id  LIMIT 3"),
		"data4" =>$this->model->uruncek("yorumlar","where urunid=$id and durum=1")  
		));
		
		// 	"data3" =>$this->model->uruncek("urunler","where katid=".$sonuc[0]["katid"]." and id<>$id and stok > 180 LIMIT 3")  
	
		// echo $id. " = ". $ad;
	
	}
	
	function kategori($id,$ad) {
		
		$sonuc=$this->model->uruncek("urunler","where katid=".$id);
		$CocukKAtBul=$this->model->uruncek("alt_kategori","where id=".$id);
		//13
		
	
		
		$this->view->goster("sayfalar/kategori",
		array(
		"data1" => $sonuc,
		"data2" => $this->model->uruncek("alt_kategori",
		"where cocuk_kat_id=".$CocukKAtBul[0]["cocuk_kat_id"]." and id<>$id"),
		"data3" =>$this->model->uruncek("urunler","where  durum=2  LIMIT 5"), 
		));
		
		
		/*
		"data2" => $this->model->uruncek("urunler","where katid=".$sonuc[0]["katid"]." and id<>$id and stok < 200 order by stok asc LIMIT 10 "),
		"data3" =>$this->model->uruncek("urunler","where katid=".$sonuc[0]["katid"]." and id<>$id  LIMIT 3"),
		"data4" =>$this->model->uruncek("yorumlar","where urunid=$id and durum=1"
		*/

		
		
	}

	
}




?>