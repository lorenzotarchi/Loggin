<?php
include 'conn.inc.php';
session_start();
				try
				{
	            $dbh=new PDO('mysql:host='.$host.';dbname='.$db,$username,$passw);	
			    if($_GET["Nome"] != "" && $_GET["Cognome"]!= "" && $_GET["Username"] != ""&& $_GET["Password"] != ""){
                $stm = $dbh ->prepare('INSERT INTO quintab_registrazioni.registrazione(Nome,Cognome,username,password) VALUES (:nome,:cognome,:user,:pass)' );
				$stm -> bindValue(':nome',$_GET['Nome']);
				$stm -> bindValue(':cognome',$_GET['Cognome']);
				$stm -> bindValue(':user',$_GET['Username']);
				$stm -> bindValue(':pass',$_GET['Password']);
				if($stm->execute())
				{
					echo 'Inserimento riuscito!';
				    $dbh->lastInsertId();
					header("location: log.php");
				}else
					{
						echo 'errore query';
					}		
				}else
					{
						echo 'Benvenuto! Registrati';	
					}
                }catch(PDOExeption $e)
					{
						echo 'errore connessione';
					}
			
?>
<html>
	<body>
	<h2>Registrazione</h2>
	<h3>Benvenuto nella pagina di registrazione<h3>
	 <form action='' method="GET">
			<p>Username: <input type="text" name="Username" value ="" /></p>
			<p>Password: <input type="text" name="Password" value ="" /></p>
			<p>Nome: <input type="text" name="Nome" value ="" /></p>
			<p>Cognome: <input type="text" name="Cognome" value ="" /></p>
			Completa la registrazione cliccando il pulsante OK: <input type="submit" name="invio" value="OK" />
	</form>
	
	</body>
</html>