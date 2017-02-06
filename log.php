
<?php
	session_start();

	include 'conn.inc.php';

	if($_SESSION['esiste']==0){
		
		$_SESSION['esiste']=0;
		echo "<html>
				<body>
				<h2>Ti sei registrato Correttamente</h2>
				<h3>Benvenuto nella pagina di login <h3>
				</body>
			</html>
		
		<html>
				<body>
					<form method='post'>
						Username: <input type='text' name='user' value=''></br>
						Password: <input type='password' name='password' value=''></br>
						<input type='submit' name='login' value='Login'>
					</form>
				</body>
			</html>";	
		if(isset($_POST['password'])){
			$dbh=new PDO('mysql:host='.$host.';dbname='.$db,$username,$passw);	
			$stm = $dbh->prepare('SELECT * FROM quintab_registrazioni.registrazione r WHERE r.Password=":password" and r.Username=":username"');
			$stm->bindValue(':username',$_POST['username']);
			$stm->bindValue(':password',$_POST['password']);
			if($stm->execute() == true){
				$_SESSION['esiste']=1;
				header("location: iniziale.php");
		}
		else{
			echo 'Username o password non valido.';
		}
	}
	}
	else{
		echo 'Sei gia loggato.';
	}
?>
<a href="http://localhost/informatica/5B%20IA/logout.php" >Logout</a>