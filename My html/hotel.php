<?php
	$servername = "localhost";
	$username = "root";
	$dbname = "rezervari";
	$pass = "";
	
	$conn=new mysqli($servername, $username, $pass);
	
	if($conn==false)
		echo "Conexiune esuata";
	else
	{
		echo "Conexiune reusita <br><br>";
		
		$sql1="CREATE DATABASE IF NOT EXISTS rezervari;";
		$rez1=mysqli_query($conn, $sql1);
		
		if($rez1==false) echo "Baza de date nu a putut fi creata <br><br>";
	    else echo "Baza de date creata cu succes <br><br>";
	    
		$conn2 = mysqli_connect($servername, $username, $pass, $dbname);

		
        $sql2="CREATE TABLE IF NOT EXISTS `rezervare` (
	      nume VARCHAR(30),
	      prenume VARCHAR(30),
 	      telefon VARCHAR(15),
	      email VARCHAR(30),
	      data_inceput DATE,
	      data_final DATE,
	      prelucrare_date BOOL,
	      hotel VARCHAR(30),
	      camera VARCHAR(30),
	      masa VARCHAR(30),
	      obs VARCHAR(250));";
	      
	      $rez2=mysqli_query($conn2, $sql2);
	      
	      if($rez2==false) echo "Tabelul nu a putut fi creat <br><br>";
	      else echo "Tabelul a fost creat cu succes <br><br>";
	      
          $nume = $_POST['nume'];
          $prenume = $_POST['prenume'];
          $telefon = $_POST['telefon'];
          $email = $_POST['email'];
          $data_inceput = $_POST['data_inceput'];
          $data_final = $_POST['data_final'];
          $prelucrare_date = $_POST['prelucrare_date'];
	      $hotel = $_POST['hotel'];
	      $camera = $_POST['camera'];
	      $masa = $_POST['masa'];
	      $obs = $_POST['obs'];
	      
          $sql3 = "INSERT INTO `rezervare` (`nume`, `prenume`, `telefon`, `email`, `data_inceput`, `data_final`,`prelucrare_date`,`hotel`,`camera`,`masa`,`obs`)
                  VALUES ('$nume', '$prenume', '$telefon', '$email', '$data_inceput', '$data_final','$prelucrare_date','$hotel','$camera','$masa','$obs')";
				
          $rez3=mysqli_query($conn2,$sql3);
		
          if($rez3==false)
              echo "Nu s-au putut adauga datele in tabel";
          else 
          {
              echo "Introducerea datelor a fost realizata cu succes<br><br>";
              echo "<a href= '.\index.html'> INAPOI</a>";
          }
	}
?>