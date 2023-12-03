<?php 

   session_start(); 

   include("include/db_connect.php");

   if ($_GET["submit_add"])
    {

      $error = array();
      if (count($error))
       {         
            $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
       }else
       {
      	
$name = $_GET['name'];
$tel = $_GET['tel'];
$pass = $_GET['pass']; 



  
	$query ="INSERT INTO users (name, tel, pass) VALUES 
    ( '".mysqli_real_escape_string($mysqli, $name)."',  
	'".mysqli_real_escape_string($mysqli,$tel)."', 
	'".mysqli_real_escape_string($mysqli,$pass)."'
	)";
 
$result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 

//Если запрос пройдет успешно то в переменную result вернется true
if ($result == 'true') {
	
	}
else {echo "Ваши данные не добавлены";}
   
      $_SESSION['message'] = "<p id='form-success'>Данные успешно добавлены!</p>";
      
      $id = mysqli_insert_id($mysqli);
      if (empty($_GET["upload_image"]))
      {        
      include("user/actions/user_image.php");
      unset($_GET["upload_image"]);           
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
	 
		 
		 
		 
	<!--	 <?php include('include/nav.php') ?> -->
			
			
			   
			  
			  
		  <div class="padding"></div>
			
			
			
			<div class="authorization"> 
			   <div class="container"> 
			   
				<div class="row justify__content__center">
			  <div class="authorization__fon-2">
			  
			  
		 <div class="authorization__form">
		 
  <div class="authorization__titles row justify__content__center"><div class="authorization__title-2"><a href="entrance.php">Вход</a></div><div class="authorization__title"><a href="registration.php">Регистрация</a></div></div>
   
  <form class="row justify__content__center" class="form" enctype="multipart/form-data" method="GET">
  	<div>
    <div class="authorization__box">
    <label class="authorization__label">Имя, фамилия</label><br>
    <input  class="authorization__input0" type="text" placeholder="" name="name" required="">
    </div> 
    
    <div class="authorization__box">
    <label class="authorization__label">Номер</label><br>
    <input  class="authorization__input" type="text" placeholder="" name="tel" required="">
    </div> 
    
    <div class="authorization__box">
     <label class="authorization__label">Пароль</label><br> 
     <input class="authorization__input2 row" type="password" name="pass" required="">
    </div> 
     
    
     <div class="authorization__box">
                            <label for="formFile" class="authorization__label authorization__margin10">Фотография</label> <br>
                            <input class="authorization__input"  type="hidden" name="MAX_FILE_SIZE" value="5000000"/><input class="form-file"  type="file" name="upload_image" />
                        </div> 
    
    <div class="row justify__content__center"> 
    <a type="submit" id="submit_form" name="submit_add"><div class="authorization__button-2 row justify__content__center"><a>Зарегистрироваться</a></div></a>
    </div>
    </div>
  </form>
</div>
		 
		 </div>
			  </div>
			  
			  
			    
			  
			  
			  
			  
		</div>
			</div>	  
			  
			  
			  
			  
			  
			  <?php include('include/footer.php') ?> 
 
	</body>
</html>