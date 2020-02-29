# Javascript-Php-Chat-sistemi
Javascript ve php ile yaptığım anlık chat sistemi


PROJE BAŞLIK

Javascript ve php ile Anlık Chat projesi
	
	* VERİTABANI TABLOLAR
	
		* Chat Tablosu
                CREATE TABLE `chat` ( 
                `c_id` int(11) NOT NULL,
                `k_id` int(11) NOT NULL, 
                `mesaj` varchar(255) NOT NULL,
                `mesaj_tarihi` datetime NOT NULL 
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        * Kullanicilar Tablosu
                CREATE TABLE `kullanici` ( 
                `k_id` int(11) NOT NULL, 
                `adi` varchar(20) NOT NULL,
                `soyadi` varchar(20) NOT NULL,
                `kullanici_adi` varchar(20) NOT NULL,
                `k_trh` date NOT NULL,
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
                
                
        * JAVASCRİPT FONKSİYONLAR
                Tüm Mesaj gönderen ve Mesajları çeken Ajax Fonksiyonları chat.php dosyasında bulunmaktadır.
                Tek tek incelemek gerekirse.
                
                
        * yorumgonder() gonder fonksiyonu ile sayfayı yenilemeden ajax ile insert.php'ye değerleri post ederek mesajımızı veritabanına             ekliyoruz.
		
                function yorumgonder(){
			var yorum= $("#msgonder").serialize();
			$.ajax({
				type : "POST",
				url : "insert.php",
				data : yorum,
				
            success: function (data) {
                        if (data == "bos") {
                                alert("Boş alan bırakmayınız");	
                        }
                        if (data == "no") {
                                 alert("Hatalı yorum ekleme");
                        }
                }
            });
		}
		
		* Klavyemizi dinleyerek Enter tuşu tetiklendiği zaman yorumgonder() fonksiyonunu çağırıyoruz.
		
				$(document).on("keypress", "input", function(e){
				if(e.which == 13){
					yorumgonder();
					document.getElementById('btn-input').value = ''
				}
			});
                        
         * Bu fonksiyon ile return.php yi Gönderdiğimiz istekte hata yok ise bize geri döndürmektedir.
		 
                                                function ajax(){
                                var req = new XMLHttpRequest();
                                req.onreadystatechange=function(){
                                        if(req.readyState == 4 && req.status == 200 ){
                                                document.getElementById('chat').innerHTML = req.responseText;
                                        }
                                }
                                req.open('GET','return.php',true);
                                req.send();
                                var messageBody = document.querySelector('.panel-body');
                                messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
						}
						
           * Sistemi yormadan 2 saniyede bir çağırıyoruz.  
		   
                                 setInterval(function(){ajax();},2000); 
                                 
                                 Ajax metodunu Body içerisinde çağırıyoruz.
                                        <body onload="ajax();">
                                            
