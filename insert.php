
				
				<?php
	ob_start();
	session_start();
	include('baglanti.php');
	
			extract($_POST); 

		if(empty($mesaj)){
			echo "bos";
		}
		else
		{
			$kt=date("Y-m-d H:i:s");
			$sql = mysqli_query($conn,"insert into chat (k_id,mesaj,mesaj_tarihi) values('".$id."','".$_POST['mesaj']."','".$kt."')");
			if($sql){
				echo "good;";
				
			}
			else
				echo "Hata";
					
		}
					
					?>