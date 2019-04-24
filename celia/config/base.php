<?php
    try {
        $base = new PDO('mysql:host=localhost;dbname=celia', 'root', '');
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

?>