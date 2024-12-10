<?php
// Le mot de passe en clair
$password = 'admin123';

// Hachage du mot de passe avec la fonction password_hash
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Afficher le mot de passe haché
echo $hashedPassword;
?>
