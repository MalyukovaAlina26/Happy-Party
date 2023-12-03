<?php
   


session_start();
include("include/db_connect.php");

$user= '';
if (isset($_GET["submit_enter"]))
{
  $error = array();

  if (count($error))
   {           
        $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";    
   }else
   {   
$tel = $_GET['input_login'];
$password = $_GET['input_pass'];

$check_user =  mysqli_query($mysqli, "SELECT * FROM `admin` WHERE `tel` = '$tel' AND 
`pass` = '$password'");

if( mysqli_num_rows($check_user)>0){
	$user = mysqli_fetch_assoc($check_user);
   $_SESSION['users'] = [
      "id" => $user['id'],
      "tel" => $user['tel'],
      "pass" => $user['pass']
   ];
   header('Location: admin/index.php');

} else{
   $_SESSION['message'] = 'Неверный логин или пароль';
} 
} }  



?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Happy Party</title>
		
		
		<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
		
		
		<link href="css/reset.css" rel="stylesheet"/>
		<link href="css/main.css" rel="stylesheet"/>
		<link href="css/setka.css" rel="stylesheet"/>
		<link href="css/adaptive.css" rel="stylesheet"/>
		<link href="css/fonts.css" rel="stylesheet"/> 
		<link rel="icon" href="img/icon.svg" type="image/x-icon">
		
	</head>
	<body>
	 
		 
		 <?php include('include/nav.php') ?>  
			   
			  
			  
		  <div class="padding"></div>
			
			
			
			<div class="authorization"> 
			   <div class="container"> 
			   
				<div class="row justify__content__center">
			  <div class="authorization__fon">
			  
			  
		 <div class="authorization__form">
		 
  <div class="authorization__titles row justify__content__center"><div class="authorization__title"><a href="entrance.php">Вход</a></div><div class="authorization__title-2"><a href="user-add.php">Регистрация</a></div></div>
    <?php 
			if(isset( $_SESSION['message'])){
		   	 echo '<p class="msg row justify__content__center">' . $_SESSION['message'] . '</p>';
			}
			unset( $_SESSION['message']);
		?>
  <form class="row justify__content__center" enctype="multipart/form-data" method="GET">
  
  
  	<div>
    <div class="authorization__box">
    <label class="authorization__label" for="exampleInputEmail1">Номер</label><br>
    <input  class="authorization__input" type="text" placeholder="" name="input_login" id="exampleInputEmail1" required="">
      
    </div> 
    <div class="authorization__box">
     <label class="authorization__label" for="exampleInputPassword1">Пароль</label><br> 
     <input class="authorization__input2 row" type="password" id="exampleInputPassword1" name="input_pass" required="">
     
    </div> 
    <div class="row justify__content__center">  
        <div class="row justify__content__center">   <input class="form-btn" name="submit_enter" id="submit_enter" type="submit" value="Зайти"/>    </div>	
    </div>
    </div>
  </form>
  <br><br><br>
  
  <a class="authorization__admin-txt" href="entrance.php">назад</a>

  
</div>
		 
		 </div>
			  </div>
			  
			  
			    
			  
			  
			  
			  
		</div>
			</div>	  
			  
			  
			  
			  
			  <?php include('include/footer.php') ?> 
 
	</body>
</html>