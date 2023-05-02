<?php 

try {
    $db = new PDO("mysql:host=localhost;dbname=eticaret", "root", "");
    //echo "Veritabanına başarıyla bağlandı.";
} catch(PDOException $e) {
    $e->getMessage();
}


?>