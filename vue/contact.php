<html>
<body>
<h1>Contact</h1>
<p>Salut l'ami <?php echo $params["user"]->getName(); ?> !</p>
<p>On peut te contacter sur l'email suivant : </p>
<h2><?php echo $params["user"]->getEmail(); ?></h2>
</body>
</html>