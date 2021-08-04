<?php

class uye extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
	$this->Modelyukle('uye');
	Session::init();
	
	
	}	
	

	
	function giris() {
		
	
	$this->view->goster("sayfalar/giris");
		
	} // GİRİŞ SAYFASI
	
	function hesapOlustur() {
		
	
	$this->view->goster("sayfalar/uyeol");
		
	} // HESAP OLUŞTUR SAYFASI
	
	
	
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
	
	
		
	} 	// KAYIT KONTROL		
	
	function cikis() {
			
			Session::destroy();			
			$this->bilgi->direktYonlen("/magaza");
		
	} // ÇIKIŞ	
	
	function giriskontrol() {
	if ($_POST) :		
		
		if($_POST["giristipi"]=="uye"):
		
	$ad=$this->form->get("ad")->bosmu();
	$sifre=$this->form->get("sifre")->bosmu();
	
	
	if (!empty($this->form->error)) :
	$this->view->goster("sayfalar/giris",
	array("bilgi" => $this->bilgi->uyari("danger","Ad ve şifre boş olamaz")));
	
	
	else:	
	$sifre=$this->form->sifrele($sifre);
	$sonuc=$this->model->GirisKontrol("uye_panel","ad='$ad' and sifre='$sifre'");
	
		if ($sonuc): 
		
	
			$this->bilgi->direktYonlen("/uye/panel");
			
			Session::init();
			Session::set("kulad",$sonuc[0]["ad"]);	
			Session::set("uye",$sonuc[0]["id"]); // üyenin id'si taşıcam	
									// 10 skfjsmfj5754154hfdsf
								//$this->form->sifrele($sifre);	
			
		else:
		
			$this->view->goster("sayfalar/giris",
			array("bilgi" => 
			$this->bilgi->uyari("danger","Kullanıcı adı veya şifresi hatalıdır")));		
		
		endif;
	
	endif;
		
	
	elseif($_POST["giristipi"]=="yon"):
		
		$AdminAd=$this->form->get("AdminAd")->bosmu();
	$Adminsifre=$this->form->get("Adminsifre")->bosmu();
	
	
	if (!empty($this->form->error)) :
	$this->view->goster("YonPanel/sayfalar/index",
	array("bilgi" => $this->bilgi->uyari("danger","Ad ve şifre boş olamaz")));
	
	
	else:	
	$sifre=$this->form->sifrele($Adminsifre);
	$sonuc=$this->model->GirisKontrol("yonetim","ad='$AdminAd' and sifre='$Adminsifre'");
	
		if ($sonuc): 
		
	
			$this->bilgi->direktYonlen("/panel/siparisler");
			
			Session::init();
			Session::set("AdminAd",$sonuc[0]["ad"]);	
			Session::set("Adminid",$sonuc[0]["id"]); // üyenin id'si taşıcam	
									// 10 skfjsmfj5754154hfdsf
								//$this->form->sifrele($sifre);	
			
		else:
		
			$this->view->goster("YonPanel/sayfalar/index",
			array("bilgi" => 
			$this->bilgi->uyari("danger","Kullanıcı adı veya şifresi hatalıdır")));		
		
		endif;
	
	endif;
		
	
endif; //hatanın 

else :
	$this->bilgi->direktYonlen("/");
	
endif;  
			

	
	
		
	} // GİRİŞ KONTROL
	
	
	//*********** ÜYENİN PANELİNİ SAĞLAYAN FONKSİYONLAR
	
	function Yorumsil () {
		
		if ($_POST) :	
		
		echo $this->model->yorumSil("yorumlar", "id=".$_POST["yorumid"]);
		
		else:	
	
		$this->bilgi->direktYonlen("/");
		endif;
		
	} // YORUM SİL
	
	function adresSil () {
		
		if ($_POST) :	
		
		echo $this->model->adresSil("adresler", "id=".$_POST["adresid"]);
		
		endif;
		
	} // ADRES SİL
	
	function YorumGuncelle()  {
		
		if ($_POST) :
		/*$_POST["yorum"];
		$_POST["yorumid"];	*/	
		
		// function yorumGuncelle($tabloisim,$sutunlar,$veriler,$kosul) {
		
		echo $this->model->yorumGuncelle("yorumlar",
		array("icerik","durum"),
		array($_POST["yorum"],"0"),"id=".$_POST["yorumid"]);
		
		
		else:	
	
		$this->bilgi->direktYonlen("/");
		endif;
		
		
	} // YORUM GÜNCELLE
	
	function AdresGuncelle()  {
		
		if ($_POST) :
		
		echo $this->model->yorumGuncelle("adresler",
		array("adres"),
		array($_POST["adres"]),"id=".$_POST["adresid"]);
		else:	
	
		$this->bilgi->direktYonlen("/");
		endif;
		
		
	} // ADRES GÜNCELLE	
	
	
	function Panel() {	
	
	$this->view->goster("sayfalar/panel",array(
	"siparisler" => $this->model->yorumlarial("siparisler","where uyeid=".Session::get("uye"))));		
		
	} // ANA PANEL
	
	function yorumlarim() {	
	
	
	$this->view->goster("sayfalar/panel",array(
	"yorumlar" => $this->model->yorumlarial("yorumlar","where uyeid=".Session::get("uye"))
	
	
	));		
	
		
	} // YORUMLAR
	
	function adreslerim() {	
	
	
	$this->view->goster("sayfalar/panel",array(
	"adres" => $this->model->yorumlarial("adresler","where uyeid=".Session::get("uye"))
	
	
	));		
	
		
	} // ADRESLER
	
	function hesapayarlarim() {	
	
	
	$this->view->goster("sayfalar/panel",array(
	"ayarlar" => $this->model->yorumlarial("uye_panel","where id=".Session::get("uye"))));		
	
		
	} // HESAP AYARLARI
	
	function sifredegistir() {	
	
	
	$this->view->goster("sayfalar/panel",array(
	"sifredegistir" => Session::get("uye")));	
	
		
	} // ŞİFRE DEĞİŞTİR
	
	function siparislerim() {	
	
	$this->view->goster("sayfalar/panel",array(
	"siparisler" => $this->model->yorumlarial("siparisler","where uyeid=".Session::get("uye"))));		
	
		
	} // SİPARİŞLER
	
	function ayarGuncelle() {		
		if ($_POST) :	
		
	$ad=$this->form->get("ad")->bosmu();
	$soyad=$this->form->get("soyad")->bosmu();
	$mail=$this->form->get("mail")->bosmu();
	$telefon=$this->form->get("telefon")->bosmu();
	$uyeid=$this->form->get("uyeid")->bosmu();
	
	
	
	if (!empty($this->form->error)) :
	$this->view->goster("sayfalar/panel",
	array(
	"ayarlar" => $this->model->yorumlarial("uye_panel","where id=".Session::get("uye")),
	"bilgi" => $this->bilgi->uyari("danger","Girilen bilgiler hatalıdır.")
	 ));
	 	
	else:	
	
	
	
		$sonuc=$this->model->AyarlarGuncelle("uye_panel",
		array("ad","soyad","mail","telefon"),
		array($ad,$soyad,$mail,$telefon),"id=".$uyeid);
	
		if ($sonuc): 
	
			$this->view->goster("sayfalar/panel",
			array(
			"ayarlar" => "ok",
			"bilgi" => $this->bilgi->basarili("GÜNCELLEME BAŞARILI","/uye/panel")
			 ));
				
		else:
		
			$this->view->goster("sayfalar/panel",
			array(
			"ayarlar" => $this->model->yorumlarial("uye_panel","where id=".Session::get("uye")),
			"bilgi" => $this->bilgi->uyari("danger","Güncelleme sırasında hata oluştu.")
			 ));	
		
		endif;
	
	endif;
	
	
		else:	
	
	$this->bilgi->direktYonlen("/");
	endif;
	
		
		
	} // ÜYE KENDİ AYARLARINI GÜNCELLİYOR.
	
	function sifreguncelle() {		

	if ($_POST) :		
		
	 $msifre=$this->form->get("msifre")->bosmu();
	 $yen1=$this->form->get("yen1")->bosmu();
	 $yen2=$this->form->get("yen2")->bosmu();
	 $uyeid=$this->form->get("uyeid")->bosmu();
	 $sifre=$this->form->SifreTekrar($yen1,$yen2); // ŞİFRELİ YENİ HALİ ALIYORUM
	/*
	ÖNCE GELEN ŞFİREYİ SORGULAMAM LAZIM DOĞRUMU DİYE, EĞER MEVCUT ŞİFRE DOĞRU İSE	
	DEVAM EDECEK HATALI İSE İŞLEM BİTECEK
	
	*/
	
	$msifre=$this->form->sifrele($msifre);
	
	if (!empty($this->form->error)) :
	$this->view->goster("sayfalar/panel",
	array(
	"sifredegistir" => Session::get("uye"),
	"bilgi" => $this->bilgi->uyari("danger","Girilen bilgiler hatalıdır.")
	 ));
	
	else:	
	
	
		
	$sonuc2=$this->model->GirisKontrol("uye_panel","ad='".Session::get("kulad")."' and sifre='$msifre'");
	
		if ($sonuc2): 
		
				$sonuc=$this->model->sifreGuncelle("uye_panel",
				array("sifre"),
				array($sifre),"id=".$uyeid);
			
				if ($sonuc): 
				
			
				$this->view->goster("sayfalar/panel",
				array(
				"sifredegistir" => "ok",
				"bilgi" => $this->bilgi->basarili("ŞİFRE DEĞİŞTİRME BAŞARILI","/uye/panel")
			 	));
					
						
				else:
				
				$this->view->goster("sayfalar/panel",
				array(
				"sifredegistir" => Session::get("uye"),
				"bilgi" => $this->bilgi->uyari("danger","Şifre değiştirme sırasında hata oluştu.")
				));	
				
				endif;
			
		else:
		
		
		
		
		
			$this->view->goster("sayfalar/panel",
	array(
	"sifredegistir" => Session::get("uye"),
	"bilgi" => $this->bilgi->uyari("danger","Mevcut şifre hatalıdır.")
	 ));
		
			
		
		endif;
	
	endif;
	
	
	else:	
	
	$this->bilgi->direktYonlen("/");
	endif;
	
	
		
	} // ÜYE ŞİFRESİNİ GÜNCELLİYOR.
	
	
	//***********  ÜYENİN PANELİNİ SAĞLAYAN FONKSİYONLAR
		
	
	function siparisTamamlandi() {
		
		if ($_POST) :		
		
		
	$ad=$this->form->get("ad")->bosmu();
	$soyad=$this->form->get("soyad")->bosmu();
	$mail=$this->form->get("mail")->bosmu();
	$telefon=$this->form->get("telefon")->bosmu();
	$toplam=$this->form->get("toplam")->bosmu();
	
		
	$odeme=$this->form->get("odeme")->bosmu();	
	$adrestercih=$this->form->get("adrestercih")->bosmu();
	$odemeturu=($odeme==1) ? "Nakit" : "Hata";
	$tarih=date("d.m.Y");
	
	
	if (!empty($this->form->error)) :
	$this->view->goster("sayfalar/siparisitamamla",
	array("bilgi" => $this->bilgi->uyari("danger","Bilgiler eksiksiz doldurulmalıdır")));
	
	
	else:
	
	$siparisNo=mt_rand(0,99999999);
	$uyeid=Session::get("uye");
	
	$this->model->TopluislemBaslat();
	
	
		if (isset($_COOKIE["urun"])) :
		
	
		foreach ($_COOKIE["urun"] as $id => $adet) :
		
$GelenUrun=$this->model->SiparisTamamlamaUrunCek("urunler","where id=".$id);


	$birimfiyat=$GelenUrun[0]["fiyat"]*$adet;
	
	$this->model->SiparisTamamlama(
	array(
	$siparisNo,
	$adrestercih,
	$uyeid,
	$GelenUrun[0]["urunad"],
	$adet,
	$GelenUrun[0]["fiyat"],
	$birimfiyat,
	$odemeturu,
	$tarih
	
	));
	
	
		
	endforeach;
	
	
	else:
	 // cookie  tanımlı değilse diye bir knotrol
		$this->bilgi->direktYonlen("/");
	
	endif;
	
	
	$this->model->TopluislemTamamla();
	
		
	Cookie::SepetiBosalt(); // sepeti boşalttık
		
		
	$TeslimatBilgileri=$this->model->Ekleİslemi("teslimatbilgileri",
	array("siparis_no","ad","soyad","mail","telefon"),
	array(
	$siparisNo,
	$ad,
	$soyad,
	$mail,
	$telefon	
	));
	
	
	
		if ($TeslimatBilgileri): 
		
		$this->view->goster("sayfalar/siparistamamlandi",
		array(
		"siparisno" => $siparisNo,
		"toplamtutar" => $toplam		
		));	
		
		
			
		else:
		
		$this->view->goster("sayfalar/siparisitamamla",
		array("bilgi" => $this->bilgi->uyari("danger","Sipariş oluşturulurken hata oluştu")));
		
		endif;
	
	endif;
	
	
	
	else:	
	
	$this->bilgi->direktYonlen("/");
	endif;
	

	} // SİPARİŞ TAMAMLANDI
	
	
	

	
}




?>