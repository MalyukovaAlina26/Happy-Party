<?php 

include('include/db_connect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Блог</title>
		
		
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
			  <?php 
		 
		 $idparty = $_GET["id"];	
			  
			     
$sql="SELECT party.name AS ВЕЧЕРИНКА FROM `party`   
WHERE party.id = '$idparty'";
$res = $mysqli -> query($sql);
		
		if ($res -> num_rows === 1) {
			
			$resPost = $res -> fetch_assoc()
 
		 ?> 
			   <div class="bread container row">
			   	<a class="bread__txt" href="index.php">Happy Party</a>	<p class="bread__txt">&nbsp;&nbsp;>&nbsp;&nbsp;</p> <a class="bread__txt">Товары</a> <p class="bread__txt">&nbsp;&nbsp;>&nbsp;&nbsp;</p> <a class="bread__txt"><?= $resPost['ВЕЧЕРИНКА']?></a> 
			   	
			   </div>
			  	  <?php
					}
			  ?> 
			  	 
			  
			  <div class="goods">
			  <div class="container"> 
			   <div class="row justify__content__center">
			  <div class="goods__list row justify__content__center">
			  
			 <?php
			 
			  
			  $idparty = $_GET["id"];	
					 	
					 	 
					  
$sql="SELECT good.id AS айдиТовара, good.img AS изображение, good.name AS ТОВАРЫ, good.price AS цена, party.name AS ВЕЧЕРИНКА, party.id AS Айди 
FROM `party`  
join good ON good.idparty = party.id 
WHERE party.id = '$idparty'";
		$res = $mysqli -> query($sql);
		 

    if ($res -> num_rows > 0) {
        while ($resPost = $res -> fetch_assoc()) {
            ?>	
 
					  <div class="goods__cards-1"> 
					  
			  <div class="goods__favorite-width row justify__content__end"><a><img id="favorite" class="goods__favorite" src="img/favorite/favorite.svg" /></a></div>
			    <a href="artical.php?id=<?= $resPost['айдиТовара']?>"><div class="goods__cards">
			  <img class="goods__img" src="img/goods/<?= $resPost['изображение']?>"/>
			 <div class="goods__description"><h3 class="goods__name"><?= $resPost['ТОВАРЫ']?></h3>     
			  <p class="goods__price"><?= $resPost['цена']?> РУБ.</p></div></div></a>
			  
			    <div class="goods__button-fon"><a class="goods__cart"><div class="goods__button row justify__content__center"><p>В КОРЗИНУ</p></div></a></div>
			
			    </div>
					
					 <?php
					 	}}
						
 	  ?>	
			  
			  
			  </div>	
			  </div></div></div>
			  
			  
			  
			  
			  
			  
			  
			  <?php include('include/footer.php') ?> 
 
	</body>
</html>