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
$sql="SELECT * FROM `banner`";
		$res = $mysqli -> query($sql);
		
		if ($res -> num_rows === 1) {
			
			$resPost = $res -> fetch_assoc()
			
			?>
			  <header class="header">
			  <div class="row"> <div class="header__blackfon-5"></div> <div class="header__blackfon"> 
			  <div class="container">
			  	
			  <div class="header__text row justify__content__center"> 
			  
			  	<h1 class="header__title"><?= $resPost['title']?></h1>
			  	<h2 class="header__subtitle"><?= $resPost['subtitle']?></h2>
			  	
			  	<a href="<?= $resPost['link']?>"><div class="header__button row justify__content__center"><p>СМОТРЕТЬ</p></div></a>
			  	
			  	</div></div>
			  	</div>
			  	</div>
			  </header>
			    
			  <?php 
				}
			 ?> 	 
			  
			  <div class="goods">
			  <div class="container"> 
			   <div class="row justify__content__center">
			  <div class="goods__list row justify__content__center">
			  
			  
			  <?php
					$sql = "SELECT * FROM `good`";
					  $res = $mysqli -> query($sql);

    if ($res -> num_rows > 0) {
        while ($resArticle = $res -> fetch_assoc()) {
            ?>	
					  <div class="goods__cards-1"> 
					  
			  <div class="goods__favorite-width row justify__content__end"><a href="entrance.php"><img id="favorite" class="goods__favorite" src="img/favorite/favorite.svg" /></a></div>
			    <a href="artical.php?id=<?= $resArticle['id']?>"><div class="goods__cards">
			  <img class="goods__img" src="img/goods/<?= $resArticle['img']?>"/>
			 <div class="goods__description"><h3 class="goods__name"><?= $resArticle['name']?></h3>     
			  <p class="goods__price"><?= $resArticle['price']?> РУБ.</p></div></div></a>
			  
			    <div class="goods__button-fon"><a href="entrance.php" class="goods__cart"><div class="goods__button row justify__content__center"><p>В КОРЗИНУ</p></div></a></div>
			
			    </div>
					
					 <?php	}} ?>	
			  
			  
			  
			   
			  
			  
			  </div>	
			  </div></div></div>
		 
			  
			  
			  
			   
			  
			  
			  <?php include('include/footer.php') ?> 
 
	</body>
</html>