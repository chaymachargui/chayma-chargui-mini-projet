<?php
require_once __DIR__ . '/php/db.php';
$errors=[]; $success=false; 
$name=$email=$subject=$message='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
 $name=trim($_POST['name']??''); 
 $email=trim($_POST['email']??''); 
 $subject=trim($_POST['subject']??''); 
 $message=trim($_POST['message']??'');
 if($name==='') $errors[]='Veuillez saisir votre nom.';
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)) $errors[]='Veuillez saisir une adresse e-mail valide.';
 if($subject==='') $errors[]='Veuillez saisir un sujet.';
 if($message==='') $errors[]='Veuillez écrire un message.';
 if(!$errors){ try{$stmt=$pdo->prepare('INSERT INTO messages(name,email,subject,message) VALUES(?,?,?,?)');
    $stmt->execute([$name,$email,$subject,$message]);$success=true;$name=$email=$subject=$message='';}catch(PDOException $e){$errors[]=
        'Impossible d’enregistrer le message. Vérifie la base de données MySQL.';} }
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Portfolio de Chayma Ibn Chargui, étudiante en Technologie de l'Informatique à l'ISET de Sfax.">
        <title>Contact | Chayma Ibn Chargui</title><link rel="stylesheet" href="css/style.css">
    </head>
<body id="top">
    <header class="header">
        <div class="container header-inner">
            <a class="brand" href="index.html">CHAYMA<span>.</span></a>
            <button class="menu" aria-label="Ouvrir le menu" aria-expanded="false">☰</button>
            <nav class="nav"><a href="index.html">Accueil</a>
            <a href="competences.html">Compétences</a>
            <a href="projets.html">Réalisations</a>
            <a href="contact.php">Contact</a>
            <button class="theme" id="themeToggle" aria-label="Changer le thème">☾</button>
        </nav>
    </div>
</header><main><section class="container page-intro">
    <p class="eyebrow">RESTONS EN CONTACT</p>
    <h1 class="page-title">Me <span class="accent">contacter.</span></h1>
    <p class="lead">Une question, une suggestion ou envie d'échanger autour de l'informatique ? Tu peux m'envoyer un message.</p></section>
    <section class="container section contact-grid"><div><div class="photo">
        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=900&q=80" alt="Collaboration autour d'un projet"></div>
        <h2 style="font-family:'Playfair Display',serif">Chayma Ibn Chargui</h2>
        <p class="muted">Étudiante en 1ère année · Technologie de l'Informatique<br>ISET de Sfax · Tunisie</p>
        <p>✉ <span class="muted">Ajoute ici ton adresse e-mail si tu souhaites la publier.</span></p></div>
        <form class="contact-box" id="contactForm" method="post" action="contact.php" novalidate>
<?php if ($success): ?>
    <div class="success">Ton message a été enregistré. Merci !</div><?php endif; ?>
<?php if ($errors): ?><div class="error">
    <?php foreach ($errors as $e) echo '<p>'.htmlspecialchars($e, ENT_QUOTES, 'UTF-8').'</p>'; ?></div><?php endif; ?>
<label for="name">Nom complet</label>
<input id="name" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>" required placeholder="Ton nom">
<label for="email">Adresse e-mail</label><input id="email" name="email" type="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>
" required placeholder="nom@exemple.com"><label for="subject">Sujet</label><input id="subject" name="subject" value="<?= htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') ?>" required placeholder="Sujet du message">
<label for="message">Message</label><textarea id="message" name="message" rows="5" required placeholder="Écris ton message..."><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
</textarea><p id="formError" class="form-message" aria-live="polite"></p>
<button class="btn btn-primary" type="submit">Envoyer le message ↗</button>
<p class="muted" style="font-size:11px">Les champs sont obligatoires. La validation est faite en JavaScript et en PHP.</p>
</form></section></main><footer class="footer"><div class="container footer-inner"><a class="brand" href="index.html">CHAYMA<span>.</span>
</a><p>© 2026 Chayma Ibn Chargui · Portfolio personnel · ISET de Sfax</p><a href="#top">Retour en haut ↑</a></div></footer><script src="js/main.js" defer></script>
<script src="js/form.js" defer></script></body></html>