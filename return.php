<?php
	ob_start();
	session_start();
	include('baglanti.php');
	$conn->set_charset("utf8");
						$iceriksorgu=mysqli_query($conn,"SELECT * FROM `chat` inner JOIN kullanici on kullanici.k_id=chat.k_id ORDER BY chat.c_id ASC");			
						while($oku=mysqli_fetch_array($iceriksorgu))
						{
						?>
						<li class="left clearfix"><span class="chat-img pull-left">
                            <img src="<?php echo $oku['avatar'] ?>" alt="User Avatar" class="img-circle" style="width:40px; height:40px;  margin-right:5px;" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"></strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span><?php echo gecenzaman($oku['mesaj_tarihi']); ?></small>
                                </div>
                                <p id="result" style="margin-top:5px;">
							<?php echo "<b> @".$oku['adi']." ".$oku['soyadi']."</b>\t  : "$oku['mesaj']; ?>
                                </p>
                            </div>
							 </li>
							<?php 
						}
							?>