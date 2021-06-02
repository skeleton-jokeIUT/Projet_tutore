<!DOCTYPE html>
<html>
<head>
	<title>Surv'Easy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../view/style.css" />
</head>
<body>
	<header>
		<div>
			<a href="index.php"><img src='../view/images/menu.png' alt='image du menu' class="img_menu"</a>
		</div>
		<div>
			<a href="index.php"><img src='../view/images/logo.png' alt='image du logo, lien vers page accueil' class="img_logo"</a>
		</div>
		<div>
			<a href="index.php?module=login"><img src='../view/images/profil.png' alt='image du profil' class="img_profil"></a>
		</div>
		<div class ="deconnexion">
			<a href="index.php?deco"><?= $message_deco ?></a>
		</div>	
	</header>