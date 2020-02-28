<?php
	ob_start();
	session_start();
	include('baglanti.php');
	$conn->set_charset("utf8");
	?>
<head> 
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<div class="container">
    <div class="row" style="margin-top:200px; margin-bottom:100px;">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> JavaScript + Php Anlık Chat Sistemi
                    <div class="btn-group pull-right">
						<div class="col-md-12">
							<div class="circle-tile "> 
								<a href="#"><div class="circle-tile-heading red"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
							</div>
						</div>
                    </div>
                </div>
				<body onload="ajax();">
                <div class="panel-body" >
                    <ul id="chat" style="list-style: none;"> 
					<!-- Bu kısımda return.php dosyasından gelen <li> tagları arasında ki mesajlar gelecektir. -->
                    </ul>

                </div>	
                <div class="panel-footer">
				<form method="POST" id="msgonder" onsubmit="return false;">
				
                    <div class="input-group" onmouseover="myFunction()">
					<div class="row">
					<div class="col-md-10">
						<input id="btn-input" type="text" class="form-control input-sm" style="border: 2px solid #337ab7; margin-top:20px;" name="mesaj" placeholder="Mesajınızı girin" ></input>
						</div>
						<div class="col-md-2">
						<input type="button" onclick="yorumgonder();"  style="margin-top:10px; margin-left:5px;" value="Mesajı gönder"/>			
				</div>
					</div>
					
					</form>
				 
    <script> 
	 $(document).on("keypress", "input", function(e){
        if(e.which == 13){
            yorumgonder();
			document.getElementById('btn-input').value = ''
        }
    });
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
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange=function(){
				if(req.readyState == 4 && req.status == 200 ){
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET','return.php',true);
			req.send();
		
		//Mesaj alanında ki scroll'u En aşağı çektik.
		var messageBody = document.querySelector('.panel-body');
		messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
	}

	setInterval(function(){ajax();},2000);
	
    </script>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
<style>
body{
	background-image: url(images/tam2.png);
    background-attachment: fixed;
    background-size: cover;
}

input[type=button]{
  background-color: #337ab7;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
    border-radius: 20px;
	cursor: pointer;
}
.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}
.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
    height: 40px;
}
.input-group {
	display: block;
}
.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 500px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #16A085;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}


</style>
