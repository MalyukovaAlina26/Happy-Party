<?php 
   session_start(); 

   include("include/db_connect.php");

   if ($_POST["submit_add"])
    {

      $error = array();
      if (count($error))
       {         
            $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
       }else
       {
      	
$name = $_POST['name'];
$tel = $_POST['tel']; 
$pass = $_POST['pass']; 



  
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
      if (empty($_POST["upload_image"]))
      {        
      include("actions/users_image.php");
      unset($_POST["upload_image"]);           
      }  
 } }  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Party</title>

  
		<link href="css/jquery.ui.min.css" rel="stylesheet"/>
		<link href="css/reset.css" rel="stylesheet"/>
		<link href="css/main.css" rel="stylesheet"/>
		<link href="css/setka.css" rel="stylesheet"/>
		<link href="css/adaptive.css" rel="stylesheet"/> 
		<link href="css/todo.css" rel="stylesheet"/>
		<link href="css/admin.css" rel="stylesheet"/>
		<link href="css/fonts.css" rel="stylesheet"/> 
		<link rel="icon" href="img/icon.svg" type="image/x-icon">


    <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>

</head>
<body>
    
<?php include('include/nav.php') ?>


<div class="padding"></div>

     <div class="authorization"> 
			   <div class="container"> 
			   
				<div class="row justify__content__center">
			  <div class="authorization__fon-2">
			  
			  
		 <div class="authorization__form">


     <div class="authorization__titles row justify__content__center"><div class="authorization__title-2"><a href="entrance.php">Вход</a></div><div class="authorization__title"><a>Регистрация</a></div></div>
   
  <form class="row justify__content__center" class="form" enctype="multipart/form-data" method="post"> 
      	
      	<div>
    <div class="authorization__box">
    <label for="" class="authorization__label">Имя, фамилия</label><br>
    <input  class="authorization__input0" type="text" name="name" id="">
    </div> 
    
    <div class="authorization__box">
    <label class="authorization__label">Номер</label><br>
    <input  class="authorization__input" type="text" name="tel" id="">
    </div> 
    
    <div class="authorization__box">
     <label class="authorization__label">Пароль</label><br> 
     <input class="authorization__input2 row" type="password" name="pass" id="">
    </div> 
    
                        
                        <div class="col-12 form__block">
                            <label for="formFile" class="form-label">Иконка</label> <br>
                            <input class="form-control"  type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
                            <input class="form-file"  type="file" name="upload_image" />
                        </div>
                        
                       <div class="row justify__content__center">   <input class="form-btn" type="submit" id="submit_form" name="submit_add" value="Зарегестрироваться"/>    </div>	
                          
                    </form>
                </div>
            </div>
        </div>
    </section>


    <?php include('include/footer.php') ?>

     <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script src="js/jquery-3.6.0.min.js"></script>
    
    <script>
        if( $(document).height() <= $(window).height() ){		
  $(".footer").addClass("fixed-bottom");
}
    </script>


</body>
</html>