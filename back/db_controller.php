<?php
require_once 'db_connection.php';

function receptiToDb($dbh){
	//$slika = chk($_POST['slika']);
	$vreme_pripreme = chk($_POST['vreme_pripreme']);
	$vreme_kuvanja = chk($_POST['vreme_kuvanja']);
	$naziv = chk($_POST['naziv']);
	$sastojci = chk($_POST['sastojci']);
	$proizvodi = chk($_POST['amenities']);
	$priprema = chk($_POST['priprema']);
	$ime = chk($_POST['ime']);
	$email = chk($_POST['email']);
	$adresa = chk($_POST['adresa']);	
	$drzava = chk($_POST['drzava']);	
	$broj_telefona = chk($_POST['broj_telefona']);	

	$user = getUser($dbh,$email);

	$slika = chk($_FILES['slika']);
	if(is_array($sastojci)){
		$sastojci = json_encode($sastojci);
	}
	if(is_array($proizvodi)){
		$proizvodi = json_encode($proizvodi);
	}
	$user_id = 0;
	if(isset($user[0])){ //user exists
		$prepared = $dbh->prepare('UPDATE korisnici SET 
			ime_prezime = :ime_prezime,
			adresa_grad = :adresa_grad,
			drzava = :drzava,
			telefon = :telefon
			WHERE email = :email');
		$prepared->execute(array(':ime_prezime'=>$ime,':adresa_grad'=>$adresa,':drzava'=>$drzava,':telefon'=>$broj_telefona,':email'=>$email));
		$user_id = $user[0]['id'];
	} 
	else{
		$prepared = $dbh->prepare('INSERT INTO korisnici(ime_prezime,adresa_grad,drzava,telefon,email) VALUES(:ime_prezime,:adresa_grad,:drzava,:telefon,:email)');
		$prepared->execute(array(':ime_prezime'=>$ime,':adresa_grad'=>$adresa,':drzava'=>$drzava,':telefon'=>$broj_telefona,':email'=>$email));
		$user_id = $prepared->lastInsertId();
	}

	$slika_ime = '';
	if($slika){
		$slika_ime = uploadFile($slika);;
	}

	

	$prepared = $dbh->prepare('INSERT INTO `recepti`(`naziv`, `sastojci`, `slika`, `vreme_pripreme`, `vreme_trajanja`, `nacin_pripreme`, `proizvodi`, `korisnik_id`) VALUES (:naziv, :sastojci, :slika, :vreme_pripreme, :vreme_trajanja, :nacin_pripreme, :proizvodi, :korisnik_id)');
		$prepared->execute(array(':naziv'=>$naziv, ':sastojci'=>$sastojci, ':slika'=>$slika_ime, ':vreme_pripreme'=>$vreme_pripreme, ':vreme_trajanja'=>$vreme_kuvanja, ':nacin_pripreme'=>$priprema, ':proizvodi'=>$proizvodi, ':korisnik_id'=>$user_id));

	header('Location: /savrsendan-dev/unesi-recept.php?success');

}
 
function receptiList($dbh){
	$prepared = $dbh->prepare('SELECT * FROM recepti ORDER BY id DESC');
	$prepared->execute();

	return $prepared->fetchAll();
}

function getUser($dbh,$email){
	$prepared = $dbh->prepare('SELECT * FROM korisnici WHERE email = :email');
	$prepared->execute(array(':email'=>$email));

	return $prepared->fetchAll();
}

function chk($a){
	if(isset($a)){
		return $a;
	}
	else{
		return null;
	}
}

function uploadFile($file){
	$msg="";
	$filename = "";
	if(!empty($_FILES['slika']))
    {
    	$path = "uploads/";
    	$file_info = pathinfo($_FILES['slika']['name']);
    	$part_filename = $file_info['filename'] . '-' . rand(0,1000) . '.' . $file_info['extension'];

    	$filename = $part_filename;

    	$path = $path . $filename;
    	if(move_uploaded_file($_FILES['slika']['tmp_name'], $path)) {
     		echo "The file ".  basename( $_FILES['slika']['name']). " has been uploaded";
    	} 
    }
    else{
        echo "There was an error uploading the file, please try again!";
    }

    return $filename;
 }

if(isset($_POST['unesi'])){
	receptiToDb($dbh);
}

?>