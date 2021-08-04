<?php

class panel extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
	$this->Modelyukle('adminpanel');
	Session::init();

	if	(!Session::get("AdminAd") && !Session::get("Adminid")) : 


		$this->giris();
		exit();
	endif;
	

	
	}	// construct	

	
	function giris() {

		if	(Session::get("AdminAd") && Session::get("Adminid")) : 
			$this->bilgi->direktYonlen("/panel/siparisler");
		else:
			
			
		$this->view->goster("YonPanel/sayfalar/index");
			
		endif;
		
		
	
		
	} // LOGİN GİRİŞ SAYFASI
	function Index() {
		
	
		$this->siparisler();
			
		}// Varsayılan olarak başlatır.
	
	
	
	//----------------------------------------------
	
	function siparisler() {
			
			
	$this->view->goster("YonPanel/sayfalar/siparis",array(
	
	"data" => $this->model->Verial("siparisler","order by id desc")
	
	));		
	
	
		
	} // SİPARİŞLERİN ANA EKRANI	
	
	function kargoguncelle($sipno) {
			
			
	$this->view->goster("YonPanel/sayfalar/siparis",array(
	
	"KargoGuncelle" => $this->model->Verial("siparisler","where siparis_no=".$sipno)
	
	));		
	
	
		
	}  // KARGO DURUM GÜNCELLEME
	
	function kargoguncelleSon() {
			
				if ($_POST) :	
		
				$sipno=$this->form->get("sipno")->bosmu();
				$durum=$this->form->get("durum")->bosmu();
				
				
		$sonuc=$this->model->Guncelle("siparisler",
		array("kargodurum"),
		array($durum),"siparis_no=".$sipno);
	
		if ($sonuc): 
	
			$this->view->goster("YonPanel/sayfalar/siparis",
			array(
			"bilgi" => $this->bilgi->basarili("GÜNCELLEME BAŞARILI","/panel/siparisler")
			 ));
				
		else:
		
			$this->view->goster("YonPanel/sayfalar/siparis",
			array(
			"data" => $this->model->Verial("siparisler",false),
			"bilgi" => $this->bilgi->uyari("danger","Güncelleme sırasında hata oluştu.")
			 ));	
		
		endif;
				
			else:
			$this->bilgi->direktYonlen("/panel/siparisler");
				
	
				endif;
	
		
	} // KARGO DURUM GÜNCELLEME SON	
	
	function siparisarama() {	
		
		if ($_POST) :
		$aramatercih=$this->form->get("aramatercih")->bosmu();
		
		$aramaverisi=$this->form->get("aramaverisi")->bosmu();
		
		
		
				if (!empty($this->form->error)) :
				
			$this->view->goster("YonPanel/sayfalar/siparis",
			array(		
			"bilgi" => $this->bilgi->hata("BİLGİ GİRİLMELİDİR.","/panel/siparisler",1)
			 ));
				
				
				else:
				
				
		if ($aramatercih=="sipno") :
				
				
			$this->view->goster("YonPanel/sayfalar/siparis",array(
	
			"data" => $this->model->arama("siparisler","siparis_no LIKE '".$aramaverisi."'")));	
			
			elseif($aramatercih=="uyebilgi"):
			
			
			$bilgicek=$this->model->arama("uye_panel",
			"id LIKE '%".$aramaverisi."%' or 
			ad LIKE '%".$aramaverisi."%'  or 
			soyad LIKE '%".$aramaverisi."%' or 
			telefon LIKE '%".$aramaverisi."%'");
			
				if ($bilgicek):
			
				$this->view->goster("YonPanel/sayfalar/siparis",array(				
				"data" => $bilgicek				
				));		
				
				else:
				
				$this->view->goster("YonPanel/sayfalar/siparis",
				array(		
				"bilgi" => $this->bilgi->hata("HİÇBİR KRİTER UYUŞMADI.","/panel/siparisler",2)
				 ));			
				endif;
				
		endif;
				
		
		
				
				endif;
		
		
		
		else:
			$this->bilgi->direktYonlen("/panel/siparisler");		
		
		
		endif;
	
			

	
		
	} // SİPARİŞ ARAMA
	
	//----------------------------------------------
	
	function kategoriler() {
			
			
	$this->view->goster("YonPanel/sayfalar/kategoriler",array(
	
	"anakategori" => $this->model->Verial("ana_kategori",false),
	"cocukkategori" => $this->model->Verial("cocuk_kategori",false),
	"altkategori" => $this->model->Verial("alt_kategori",false)
	
	
	
	));		
	
	
		
	} // KATEGORİLER GELİYOR	
	
	function kategoriGuncelle($kriter,$id) {
		
	
				
	$this->view->goster("YonPanel/sayfalar/kategoriguncelleme",array(
	
	"data" => $this->model->Verial($kriter."_kategori","where id=".$id),
	"kriter" => $kriter,
	"AnaktegorilerTumu" => $this->model->Verial("ana_kategori",false),
	"CocukkategorilerTumu" => $this->model->Verial("cocuk_kategori",false)
	
	));	
		
	
		
	} // KATEGORİLER GÜNCELLE	
	
	function kategoriGuncelSon() {
		
		
		
			if ($_POST) :	
				$kriter=$this->form->get("kriter")->bosmu();
				$kayitid=$this->form->get("kayitid")->bosmu();
				$katad=$this->form->get("katad")->bosmu();
				
				@$anakatid=$_POST["anakatid"];
				@$cocukkatid=$_POST["cocukkatid"];
		
				
				
				if (!empty($this->form->error)) :
				
			$this->view->goster("YonPanel/sayfalar/kategoriguncelleme",
			array(		
			"bilgi" => $this->bilgi->hata("Kategori adı girilmelidir.","/panel/kategoriler",1)
			 ));		
				
			else:	
				
		
		
		if ($kriter=="ana") :
		
		$sonuc=$this->model->Guncelle("ana_kategori",
		array("ad"),
		array($katad),"id=".$kayitid);
				
		elseif($kriter=="cocuk") :
		
		
		$sonuc=$this->model->Guncelle("cocuk_kategori",
		array("ana_kat_id","ad"),
		array($anakatid,$katad),"id=".$kayitid);
		
	
			
		elseif($kriter=="alt") :
		
		$sonuc=$this->model->Guncelle("alt_kategori",
		array("cocuk_kat_id","ana_kat_id","ad"),
		array($cocukkatid,$anakatid,$katad),"id=".$kayitid);
		endif;
		
				
				
				
				
		
	
		if ($sonuc): 
	
			$this->view->goster("YonPanel/sayfalar/kategoriguncelleme",
			array(
			"bilgi" => $this->bilgi->basarili("GÜNCELLEME BAŞARILI","/panel/kategoriler",2)
			 ));
				
		else:
		
			$this->view->goster("YonPanel/sayfalar/kategoriguncelleme",
			array(
			"bilgi" => $this->bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.","/panel/kategoriler",2)
			 ));	
		
		endif;
		
	
		
		endif;
		
				
			else:
			$this->bilgi->direktYonlen("/panel/kategoriler");
				
	
				endif;		
		
	
	
		
	} // KATEGORİLER GÜNCELLENENİYOR VE SON POST İŞLEMİ BURASI
	
	function kategoriSil($kriter,$id) {
	
		
	$sonuc=$this->model->Sil($kriter."_kategori","id=".$id);
	
	
		if ($sonuc): 
	
			$this->view->goster("YonPanel/sayfalar/kategoriler",
			array(
			"bilgi" => $this->bilgi->basarili("SİLME BAŞARILI","/panel/kategoriler",2)
			 ));
				
		else:
		
			$this->view->goster("YonPanel/sayfalar/kategoriler",
			array(
			"bilgi" => $this->bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.","/panel/kategoriler",2)
			 ));	
		
		endif;
	

	
		
	} // KATEGORİ SİL
	
	function kategoriEkle($kriter) {
		
	$this->view->goster("YonPanel/sayfalar/kategoriEkle",
	array("kriter" => $kriter,
	"AnaktegorilerTumu" => $this->model->Verial("ana_kategori",false),
	"CocukkategorilerTumu" => $this->model->Verial("cocuk_kategori",false)));		
		
		
	} // KATEGORİ EKLE
	
	function kategoriEkleSon() {
	
	
			
		
			if ($_POST) :	
				$kriter=$this->form->get("kriter")->bosmu();		
				$katad=$this->form->get("katad")->bosmu();
				
				@$anakatid=$_POST["anakatid"];
				@$cocukkatid=$_POST["cocukkatid"];
		
				
				
				if (!empty($this->form->error)) :
				
			$this->view->goster("YonPanel/sayfalar/kategoriekle",
			array(		
			"bilgi" => $this->bilgi->hata("Kategori adı girilmelidir.","/panel/kategoriler",1)
			 ));		
				
			else:	
				
		
		
		if ($kriter=="ana") :
		
		$sonuc=$this->model->Ekleme("ana_kategori",
		array("ad"),
		array($katad));
				
		elseif($kriter=="cocuk") :
		
		
		$sonuc=$this->model->Ekleme("cocuk_kategori",
		array("ana_kat_id","ad"),
		array($anakatid,$katad));
		
	
			
		elseif($kriter=="alt") :
		
		$sonuc=$this->model->Ekleme("alt_kategori",
		array("cocuk_kat_id","ana_kat_id","ad"),
		array($cocukkatid,$anakatid,$katad));
		endif;
		
				
				
				
				
		
	
		if ($sonuc): 
	
			$this->view->goster("YonPanel/sayfalar/kategoriekle",
			array(
			"bilgi" => $this->bilgi->basarili("EKLEME BAŞARILI","/panel/kategoriler",2)
			 ));
				
		else:
		
			$this->view->goster("YonPanel/sayfalar/kategoriekle",
			array(
			"bilgi" => $this->bilgi->hata("EKLEME SIRASINDA HATA OLUŞTU.","/panel/kategoriler",2)
			 ));	
		
		endif;
		
	
		
		endif;
		
				
			else:
			$this->bilgi->direktYonlen("/panel/kategoriler");
				
	
				endif;		
		
	
		
	} // KATEGORİ EKLE SON
	
	//----------------------------------------------
	
	function uyeler () {
		
		$this->view->goster("YonPanel/sayfalar/uyeler",array(
		
		"data" => $this->model->Verial("uye_panel",false)
		
		));
	
	
		
	} // ÜYELER GELİYOR	
		
	function uyeguncelleSon() {
			
			
			
				if ($_POST) :	
				
					$ad=$this->form->get("ad")->bosmu();
					$soyad=$this->form->get("soyad")->bosmu();
					$mail=$this->form->get("mail")->bosmu();
					$telefon=$this->form->get("telefon")->bosmu();
					//$durum=$this->form->get("durum")->bosmu();
					$uyeid=$this->form->get("uyeid")->bosmu();
					$durum=$_POST["durum"];
					
					if (!empty($this->form->error)) :
					
				$this->view->goster("YonPanel/sayfalar/uyeler",
				array(		
				"bilgi" => $this->bilgi->hata("Tüm alanlar doldurulmalıdır.","/panel/uyeler",2)
				 ));		
					
				else:	
					
			
		
		
			$sonuc=$this->model->Guncelle("uye_panel",
			array("ad","soyad","mail","telefon","durum"),
			array($ad,$soyad,$mail,$telefon,$durum),"id=".$uyeid);
					
		
			
		
			if ($sonuc): 
		
				$this->view->goster("YonPanel/sayfalar/uyeler",
				array(
				"bilgi" => $this->bilgi->basarili("GÜNCELLEME BAŞARILI","/panel/uyeler",2)
				 ));
					
			else:
			
				$this->view->goster("YonPanel/sayfalar/uyeler",
				array(
				"bilgi" => $this->bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.","/panel/uyeler",2)
				 ));	
			
			endif;
			
		
			
			endif;
			
					
				else:
				$this->bilgi->direktYonlen("/panel/uyeler");
					
		
					endif;		
			
		
		
			
		} // ÜYELER GÜNCEL SON	
	
	function uyeGuncelle($id) {
		
	
				
	$this->view->goster("YonPanel/sayfalar/uyeler",array(	
	"Uyeguncelle" => $this->model->Verial("uye_panel","where id=".$id)	
	));	
		
	
		
	} // ÜYELER GÜNCELLE	
		
	function uyeSil($id) {
	
		
	$sonuc=$this->model->Sil("uye_panel","id=".$id);
	
	
		if ($sonuc): 
	
			$this->view->goster("YonPanel/sayfalar/uyeler",
			array(
			"bilgi" => $this->bilgi->basarili("SİLME BAŞARILI","/panel/uyeler",2)
			 ));
				
		else:
		
			$this->view->goster("YonPanel/sayfalar/uyeler",
			array(
			"bilgi" => $this->bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.","/panel/uyeler",2)
			 ));	
		
		endif;
	

	
		
	}  // ÜYE SİL	
		
	function uyearama() {	
		
		if ($_POST) :
				
		$aramaverisi=$this->form->get("aramaverisi")->bosmu();
		
		
		
				if (!empty($this->form->error)) :
				
				$this->view->goster("YonPanel/sayfalar/uyeler",
				array(		
				"bilgi" => $this->bilgi->hata("KRİTER GİRİLMELİDİR.","/panel/uyeler",2)
				 ));
				
				
				else:
				
			
			
			$bilgicek=$this->model->arama("uye_panel",
			"id LIKE '%".$aramaverisi."%' or 
			ad LIKE '%".$aramaverisi."%'  or 
			soyad LIKE '%".$aramaverisi."%' or 
			telefon LIKE '%".$aramaverisi."%'");
			
				if ($bilgicek):
			
				$this->view->goster("YonPanel/sayfalar/uyeler",array(
				
				"data" => $bilgicek				
				));		
				
				else:
				
				$this->view->goster("YonPanel/sayfalar/uyeler",
				array(		
				"bilgi" => $this->bilgi->hata("HİÇBİR KRİTER UYUŞMADI.","/panel/uyeler",2)
				 ));			
				endif;
	
				
				endif;
		
		
		
		else:
			$this->bilgi->direktYonlen("/panel/uyeler");		
		
		
		endif;
	
			

	
		
	} // ÜYE ARAMA
	
	//----------------------------------------------
	
	function urunler () {
		
		$this->view->goster("YonPanel/sayfalar/urunler",array(
		
		"data" => $this->model->Verial("urunler",false),
		"data2" => $this->model->Verial("alt_kategori",false)
		
		));
	
	
		
	}  // ÜRÜNLER GELİYOR
	
	function urunGuncelle($id) {
		
	
				
	$this->view->goster("YonPanel/sayfalar/urunler",array(	
	"Urunguncelle" => $this->model->Verial("urunler","where id=".$id),
	"data2" => $this->model->Verial("alt_kategori",false)		
	));	
		
	
		
	} // ÜRÜNLER GÜNCELLE	
	
	function urunguncelleSon() {	
		
		
			if ($_POST) :	
			
				$urunad=$this->form->get("urunad")->bosmu();
				$katid=$this->form->get("katid")->bosmu();
				$kumas=$this->form->get("kumas")->bosmu();
				$uretimyeri=$this->form->get("uretimyeri")->bosmu();
				$renk=$this->form->get("renk")->bosmu();
				$fiyat=$this->form->get("fiyat")->bosmu();
				$stok=$this->form->get("stok")->bosmu();
				$durum=$this->form->get("durum")->bosmu();
				$urunaciklama=$this->form->get("urunaciklama")->bosmu();
				$urunozellik=$this->form->get("urunozellik")->bosmu();
				$urunekstra=$this->form->get("urunekstra")->bosmu();
				$kayitid=$this->form->get("kayitid")->bosmu();
				
				
		
				
if ($this->Upload->uploadPostAl("res1")) : $this->Upload->UploadDosyaKontrol("res1");	endif;	

if ($this->Upload->uploadPostAl("res2")) : $this->Upload->UploadDosyaKontrol("res2");	endif;	
				
if ($this->Upload->uploadPostAl("res3")) : $this->Upload->UploadDosyaKontrol("res3");	endif;				
		
		
				
			
				
			if (!empty($this->form->error)) :
				
			$this->view->goster("YonPanel/sayfalar/urunler",
			array(		
			"bilgi" => $this->bilgi->hata("Tüm alanlar doldurulmalıdır.","/panel/urunler",2)
			 ));
			 
			elseif (!empty($this->Upload->error)) :
				
			$this->view->goster("YonPanel/sayfalar/urunler",
			array(		
			"bilgi" => $this->Upload->error,
			"yonlen" =>$this->bilgi->sureliYonlen(3,"/panel/urunler") 
			 ));	
		
	
				
			else:	
				
		
			
			
			$sutunlar=array("katid","urunad","durum","aciklama","kumas","urtYeri","renk","fiyat","stok","ozellik","ekstraBilgi");
			
			$veriler=array($katid,$urunad,$durum,$urunaciklama,$kumas,$uretimyeri,$renk,$fiyat,$stok,$urunozellik,$urunekstra);
			
			
 if ($this->Upload->uploadPostAl("res1")) :
 	$sutunlar[]="res1"; 
	$veriler[]=$this->Upload->Yukle("res1",true); 
 endif;	

 if ($this->Upload->uploadPostAl("res2")) :
 	$sutunlar[]="res2"; 
	$veriler[]=$this->Upload->Yukle("res2",true); 
 endif;	
  if ($this->Upload->uploadPostAl("res3")) :
 	$sutunlar[]="res3"; 
	$veriler[]=$this->Upload->Yukle("res3",true); 
 endif;	
			
		
	
		$sonuc=$this->model->Guncelle("urunler",
		$sutunlar,
		$veriler,"id=".$kayitid);
				
	
		
	
		if ($sonuc): 
	
			$this->view->goster("YonPanel/sayfalar/urunler",
			array(
			"bilgi" => $this->bilgi->basarili("ÜRÜN BAŞARIYLA GÜNCELLENDİ","/panel/urunler",2)
			 ));
				
		else:
		
			$this->view->goster("YonPanel/sayfalar/urunler",
			array(
			"bilgi" => $this->bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.","/panel/urunler",2)
			 ));	
		
		endif;
		
	
		
		endif;
		
				
			else:
			$this->bilgi->direktYonlen("/panel/urunler");
				
	
	endif;		
		
		
		
	
	
		
	} // ÜRÜNLER GÜNCEL SON
	
	function Urunekleme() {	
				
	$this->view->goster("YonPanel/sayfalar/urunler",array(	
	"Urunekleme" => true,
	"data2" => $this->model->Verial("alt_kategori",false)		
	));	
		
	
		
	}	 // ÜRÜN EKLEME
	
	function urunekle() {	
		
		
			if ($_POST) :	
			
				$urunad=$this->form->get("urunad")->bosmu();
				$katid=$this->form->get("katid")->bosmu();
				$kumas=$this->form->get("kumas")->bosmu();
				$uretimyeri=$this->form->get("uretimyeri")->bosmu();
				$renk=$this->form->get("renk")->bosmu();
				$fiyat=$this->form->get("fiyat")->bosmu();
				$stok=$this->form->get("stok")->bosmu();
				$durum=$this->form->get("durum")->bosmu();
				$urunaciklama=$this->form->get("urunaciklama")->bosmu();
				$urunozellik=$this->form->get("urunozellik")->bosmu();
				$urunekstra=$this->form->get("urunekstra")->bosmu();
			
			$this->Upload->UploadResimYeniEkleme("res",3);
				
			
				
				if (!empty($this->form->error)) :
				
			$this->view->goster("YonPanel/sayfalar/urunler",
			array(		
			"bilgi" => $this->bilgi->hata("Tüm alanlar doldurulmalıdır.","/panel/urunler",2)
			 ));	
			 
			 	elseif (!empty($this->Upload->error)) :
				
			$this->view->goster("YonPanel/sayfalar/urunler",
			array(		
			"bilgi" => $this->Upload->error
			 ));	
				
			else:	
				
		
				$dosyayukleme=$this->Upload->Yukle();
	
		$sonuc=$this->model->Ekleme("urunler",
		array("katid","urunad","res1","res2","res3","durum","aciklama","kumas","urtYeri","renk","fiyat","stok","ozellik","ekstraBilgi"),
		array($katid,$urunad,$dosyayukleme[0],$dosyayukleme[1],$dosyayukleme[2],$durum,$urunaciklama,$kumas,$uretimyeri,$renk,$fiyat,$stok,$urunozellik,$urunekstra));
				
	
		
	
		if ($sonuc): 
	
			$this->view->goster("YonPanel/sayfalar/urunler",
			array(
			"bilgi" => $this->bilgi->basarili("ÜRÜN BAŞARIYLA EKLENDİ","/panel/urunler",2)
			 ));
				
		else:
		
			$this->view->goster("YonPanel/sayfalar/urunler",
			array(
			"bilgi" => $this->bilgi->hata("EKLEME SIRASINDA HATA OLUŞTU.","/panel/urunler",2)
			 ));	
		
		endif;
		
	
		
		endif;
		
				
			else:
			$this->bilgi->direktYonlen("/panel/urunler");
				
	
	endif;		
		
		
		
	
	
		
	}	 // ÜRÜN EKLEME SON	
		
	function urunSil($id) {
	
		
	$sonuc=$this->model->Sil("urunler","id=".$id);
	
	
		if ($sonuc): 
	
			$this->view->goster("YonPanel/sayfalar/urunler",
			array(
			"bilgi" => $this->bilgi->basarili("SİLME BAŞARILI","/panel/urunler",2)
			 ));
				
		else:
		
			$this->view->goster("YonPanel/sayfalar/urunler",
			array(
			"bilgi" => $this->bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.","/panel/urunler",2)
			 ));	
		
		endif;
	

	
		
	}  // ÜRÜNLER SİL	
	
	function katgoregetir() {	
		
		if ($_POST) :
				
		$katid=$this->form->get("katid")->bosmu();
		
		
		$bilgicek=$this->model->Verial("urunler","where katid=".$katid);
		
		
				if ($bilgicek):
			
				$this->view->goster("YonPanel/sayfalar/urunler",array(
				
				"data" => $bilgicek	,
				"data2" => $this->model->Verial("alt_kategori",false)			
				));		
				
				else:
				
				$this->view->goster("YonPanel/sayfalar/urunler",
				array(		
				"bilgi" => $this->bilgi->hata("HİÇBİR KRİTER UYUŞMADI.","/panel/urunler",2)
				 ));			
				endif;
	
				
			
		
		
		
		else:
			$this->bilgi->direktYonlen("/panel/urunler");		
		
		
		endif;
	
			

	
		
	} // ÜRÜNLERi KATEGORİYE GÖRE GETİR	
	
	function urunarama() {	
		
		if ($_POST) :
				
		$aramaverisi=$this->form->get("arama")->bosmu();
		
		
		
				if (!empty($this->form->error)) :
				
				$this->view->goster("YonPanel/sayfalar/urunler",
				array(		
				"bilgi" => $this->bilgi->hata("KRİTER GİRİLMELİDİR.","/panel/urunler",2)
				 ));
				
				
				else:
				
			
			
			$bilgicek=$this->model->arama("urunler",
			"urunad LIKE '%".$aramaverisi."%' or 
			kumas LIKE '%".$aramaverisi."%'  or 
			urtYeri LIKE '%".$aramaverisi."%' or 
			stok LIKE '%".$aramaverisi."%'");
			
				if ($bilgicek):
			
				$this->view->goster("YonPanel/sayfalar/urunler",array(
				
				"data" => $bilgicek,
				"data2" => $this->model->Verial("alt_kategori",false)			
				));		
				
				else:
				
				$this->view->goster("YonPanel/sayfalar/urunler",
				array(		
				"bilgi" => $this->bilgi->hata("HİÇBİR KRİTER UYUŞMADI.","/panel/urunler",2)
				 ));			
				endif;
	
				
				endif;
		
		
		
		else:
			$this->bilgi->direktYonlen("/panel/urunler");		
		
		
		endif;
	
			

	
		
	} // ÜRÜNLER ARAMA	
	
	//----------------------------------------------
	

	function yonetici(){

		$this->view->goster("YonPanel/sayfalar/yonetici",array(

			"data"=>$this->model->Verial("yonetim",false)

		));

	}

	function yonSil($id){
		$sonuc=$this->model->Sil("yonetim","id=".$id);

		if($sonuc):
			$this->view->goster("YonPanel/sayfalar/yonetici",array(
				"bilgi"=>$this->bilgi->basarili("Silme Başarılı","/panel/yonetici",2)

			));

		else:
			$this->view->goster("YonPanel/sayfalar/yonetici",array(
				"bilgi"=>$this->bilgi->hata("Silme Sırasında Hata oluştu.","/panel/yonetici",2)

			));

		endif;
	} //Yönetici sil
	function yonekle() {	
				
		$this->view->goster("YonPanel/sayfalar/yonetici",array(	
		"yoneticiekle" => true		
		));	
				
		}//Yönetici Ekle


		function yonekleson() {		

			if ($_POST) :		
				
			 $yonadi=$this->form->get("yonadi")->bosmu();

			 $sif1=$this->form->get("sif1")->bosmu();
			 $sif2=$this->form->get("sif2")->bosmu();
			
			 $sifre=$this->form->SifreTekrar($sif1,$sif2); 

			
			if (!empty($this->form->error)) :
			$this->view->goster("YonPanel/sayfalar/yonetici",
			array(
			"bilgi" => $this->bilgi->hata("Girilen Bilgiler Hatalıdır.","/panel/yonetici")
			 ));
			
			else:	
			
			
			
				
						$sonuc=$this->model->Ekleme("yonetim",
						array("ad","sifre"),
						array($yonadi,$sifre));
					
						if ($sonuc): 
						
					
						$this->view->goster("YonPanel/sayfalar/yonetici",
						array(
						
						"bilgi" => $this->bilgi->basarili("Yeni Yönetici Eklendi","/panel/yonetici")
						 ));
							
								
						else:
						
						$this->view->goster("YonPanel/sayfalar/yonetici",
						array(
							"bilgi" => $this->bilgi->hata("Ekleme Sırasında Hata Oluştu.","/panel/yonetici")
						
						));	
						
						endif;
					
			
			
			endif;
			
			
			else:	
			
			$this->bilgi->direktYonlen("/");
			endif;
			
			
				
			}	//Yönetici Ekle Son



/*
	function kayitkontrol() {
	
		if ($_POST) :		
		$ad=$this->form->get("ad")->bosmu();
		$soyad=$this->form->get("soyad")->bosmu();
		$mail=$this->form->get("mail")->bosmu();
		$sifre=$this->form->get("sifre")->bosmu();
		$sifretekrar=$this->form->get("sifretekrar")->bosmu();
		$telefon=$this->form->get("telefon")->bosmu();	
		$this->form->GercektenMailmi($mail);	
		$sifre=$this->form->SifreTekrar($sifre,$sifretekrar);
		
	
		
		if (!empty($this->form->error)) :
		
	
		$this->view->goster("sayfalar/uyeol",
		array("hata" => $this->form->error));
		
		
		else:
		
	
		
		$sonuc=$this->model->Ekleİslemi("uye_panel",
		array("ad","soyad","mail","sifre","telefon"),
		array($ad,$soyad,$mail,$sifre,$telefon));
		
			if ($sonuc):
		
		
			$this->view->goster("sayfalar/uyeol",
			array("bilgi" =>$this->bilgi->uyari("success","KAYIT BAŞARILI")));
			
			
			
			else:
			
			$this->view->goster("sayfalar/uyeol",
			array("bilgi" => 
			$this->bilgi->uyari("danger","Kayıt esnasında hata oluştu")));
			
			
			
			
			endif;
		
		endif;
			
			else:	
		
		$this->bilgi->direktYonlen("/");
		endif;
		
		
			
		} 	// KAYIT KONTROL*/		
		
		function cikis() {
				
				Session::destroy();			
				$this->bilgi->direktYonlen("/panel/giris");
			
		} // ÇIKIŞ	
		
		function sifredegistir() {	
	
	
			$this->view->goster("YonPanel/sayfalar/sifreislemleri",array(
			"sifredegistir" => Session::get("Adminid")));	
			
				
			} // ŞİFRE DEĞİŞTİRME FORMU

			
			
			
			
			function sifreguncelleson() {		

				if ($_POST) :		
					
				 $mevcutsifre=$this->form->get("mevcutsifre")->bosmu();
				 $yen1=$this->form->get("yen1")->bosmu();
				 $yen2=$this->form->get("yen2")->bosmu();
				 $yonid=$this->form->get("yonid")->bosmu();
				 $sifre=$this->form->SifreTekrar($yen1,$yen2); // ŞİFRELİ YENİ HALİ ALIYORUM
				/*
				ÖNCE GELEN ŞFİREYİ SORGULAMAM LAZIM DOĞRUMU DİYE, EĞER MEVCUT ŞİFRE DOĞRU İSE	
				DEVAM EDECEK HATALI İSE İŞLEM BİTECEK
				
				*/
				
				$mevcutsifre=$this->form->sifrele($mevcutsifre);
				
				if (!empty($this->form->error)) :
				$this->view->goster("YonPanel/sayfalar/sifreislemleri",
				array(
				"sifredegistir" => Session::get("Adminid"),
				"bilgi" => $this->bilgi->uyari("danger","Girilen bilgiler hatalıdır.")
				 ));
				
				else:	
				
				
					
				$sonuc2=$this->model->GirisKontrol("yonetim","ad='".Session::get("AdminAd")."' and sifre='$mevcutsifre'");
				
					if ($sonuc2): 
					
							$sonuc=$this->model->Guncelle("yonetim",
							array("sifre"),
							array($sifre),"id=".$yonid);
						
							if ($sonuc): 
							
						
							$this->view->goster("YonPanel/sayfalar/sifreislemleri",
							array(
							
							"bilgi" => $this->bilgi->basarili("ŞİFRE DEĞİŞTİRME BAŞARILI","/panel/siparisler")
							 ));
								
									
							else:
							
							$this->view->goster("YonPanel/sayfalar/sifreislemleri",
							array(
							"sifredegistir" => Session::get("AdminAd"),
							"bilgi" => $this->bilgi->uyari("danger","Şifre değiştirme sırasında hata oluştu.")
							));	
							
							endif;
						
					else:
					
					
					
					
					
						$this->view->goster("YonPanel/sayfalar/sifreislemleri",
				array(
				"sifredegistir" => Session::get("AdminAd"),
				"bilgi" => $this->bilgi->uyari("danger","Mevcut şifre hatalıdır.")
				 ));
					
						
					
					endif;
				
				endif;
				
				
				else:	
				
				$this->bilgi->direktYonlen("/");
				endif;
				
				
					
				}	//Yönetici Şifre Değiştirme .
		
}




?>