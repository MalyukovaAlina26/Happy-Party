<?php 

include('include/db_connect.php'); 


 $id = $_GET["id"];

$sql="
SELECT party.name AS вечеринка, category.name AS категория, good.name AS товар FROM `good` 
join party ON party.id = good.idparty 
join category ON category.id = good.idcategory 
WHERE good.id = '$id'";
		$res = $mysqli -> query($sql);
		
		if ($res -> num_rows === 1) {
			
			$resPost = $res -> fetch_assoc()
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
	 
		 
		 
		 
		 <?php include('include/nav.php') 
		 
		 
			
		 ?> 
			
			
			  <div class="padding"></div>
			  
			   
			   <div class="bread container row">
			   	<a class="bread__txt" href="index.php">Happy Party</a>	<p class="bread__txt">&nbsp;&nbsp;>&nbsp;&nbsp;</p> 
			   	<a class="bread__txt"><?= $resPost['вечеринка']?></a><p class="bread__txt">&nbsp;&nbsp;>&nbsp;&nbsp;</p> 
			   	<a class="bread__txt"><?= $resPost['категория']?></a> 
<p class="bread__txt">&nbsp;&nbsp;>&nbsp;&nbsp;</p> <a class="bread__txt"><?= $resPost['товар']?></a>
			   	
			   </div>
			    <?php 
	}
	
	
	
$id = $_GET["id"];

$sql="SELECT * FROM `good` WHERE `id` = '$id'";
		$res = $mysqli -> query($sql);
		
		if ($res -> num_rows === 1) {
			
			$resPost = $res -> fetch_assoc()
			
			?>
			  <div class="good"><div class="container row justify__content__between">
			  
			  
			  	<div class="good__block"><img class="good__img" src="img/goods/<?= $resPost['img']?>"/></div>
			  	<div class="good__block"><h3 class="good__name"><?= $resPost['name']?></h3>
			  	<p class="good__price"><?= $resPost['price']?> РУБ.</p> 
			  	
			  	<h3 class="good__size">Размер</h3>
			  	<div class="row">
			  	<?php 
}
  
			
			
					$sql = "
SELECT size.name AS названиеРазмера, size.title AS описаниеРазмера FROM `stock` 
join good ON stock.idgood = good.id  
join size ON stock.idsize  = size.id
WHERE good.id = '$id'";
					  $res = $mysqli -> query($sql);

    if ($res -> num_rows > 0) {
        while ($resArticle = $res -> fetch_assoc()) {
        
			 

 
?>
			  		 
			  	<a title="<?= $resArticle['описаниеРазмера']?>" ><div class="good__size-img row justify__content__center"><p class="good__size-txt row justify__content__center"><?= $resArticle['названиеРазмера']?></p></div></a> 
			  
			   
			  	 
			  	 <?php 
	}}
	
	
	
$id = $_GET["id"];

$sql="SELECT * FROM `good` WHERE `id` = '$id'";
		$res = $mysqli -> query($sql);
		
		if ($res -> num_rows === 1) {
			
			$resPost = $res -> fetch_assoc()
			
			
?>
				</div>

			  	<div class="row"><a href="entrance.php"><div class="good__button row justify__content__center"><p>В КОРЗИНУ</p></div></a><a href="entrance.php"><div><img class="good__favorite-img" src="img/favorite/favorite.svg"/></div></a></div>
			  	
			  	<h3 class="good__description-title">Артикул</h3>
			  	<p class="good__description"><?= $resPost['id']?></p>
			  	<br>
			  	<h3 class="good__description-title">Описание</h3>
			  	<p class="good__description"><?= $resPost['description']?></p>
			  	
			  	
			  	</div>
			  	</div>  
			  </div> 
			  
			  <?php 
	}
			   
		?>	   
	 
		
		 
			  <?php 
				 
			  include('include/footer.php') ?> 
 
	</body>
</html>