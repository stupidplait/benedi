<?
    try {
        $connect = new PDO("mysql:host=localhost; dbname=benedi", "root", "");
    } catch(PDOException $e) {
        echo $e;
    }
?>