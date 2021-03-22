<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  header('Content-Type: text/html; charset=utf-8');
  require("../../global/bd.php");
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  require '../../phpmailer/src/Exception.php';
  require '../../phpmailer/src/PHPMailer.php';
  require '../../phpmailer/src/SMTP.php';
  $resultat = "erreurExistant";
  $requeteVerification = $dbh->prepare('SELECT * FROM Usager WHERE Identifiant = ?');
  $requeteVerification->execute(array($_POST["username"]));
  if ($requeteVerification->rowCount() == 1) {
		echo $resultat;
	}else{
    $cle = md5(microtime(TRUE)*100000);
    $pass_hache = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $gradeCompte = 0;
    if (array_key_exists('grade', $_POST)) {
        $gradeCompte = $_POST["grade"];
    }
    $requeteInserer = $dbh->prepare("INSERT INTO Usager(`Identifiant`, `Nom`, `Prenom`,`MotDePasse`,`Verification`,`Grade`,`cle`) VALUES (?,?,?,?,'0',?,?)");
    $requeteInserer->execute(array(htmlspecialchars($_POST["username"]),htmlspecialchars($_POST["nom"]),htmlspecialchars($_POST["prenom"]),$pass_hache,$gradeCompte,$cle));

    //--------------------------------------------------
    //mail

    $login = $_POST["username"];
    //Preparation mail
    $mail= new PHPmailer(TRUE);
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPOptions = array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    ));
    //Set the hostname of the mail server
    //$mail->Host = 'smtp.gmail.com';
    // use
    $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

    //Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'anankecontactclient@gmail.com';

    //Password to use for SMTP authentication

    $mail->Password = "69jUrY5WUY7T4GK";
    $mail->addAddress($login,"");
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->setFrom("anankecontactclient@gmail.com","Ananké");
    $mail->addReplyTo("anankecontactclient@gmail.com","Ananké");
    $mail->Subject = "Activer votre compte";
    $mail->IsHTML(True);
    //lien exemple : http://votresite.com/activation.php?log=".urlencode($login)."&cle=".urlencode($cle)."
    //message et lien d'activation
    $mail->Body="<html><head><meta http-equiv='Content-Type' content='text/html; charset='UTF-8' /></head><body>Bienvenue sur Ananke, voici votre code d'activation pour faire vos achats sur notre site : <br />https://ananke.minarox.fr/compte/mail-valide.php?log=".urlencode(htmlspecialchars($login))."&cle=".urlencode($cle)."<body><html>";
    if (!$mail->send()) {
      echo 'Mailer Error: '. $mail->ErrorInfo;
    } else {
      echo 'Message sent!';
    }
	}



?>
