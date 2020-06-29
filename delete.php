<?php
    $dsn = 'mysql:dbname=test_DB;host=localhost;';
    $user = 'kato';
    $password = 'morijyobi';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_GET['id'];

        $sql = "delete from user where id=:id";
        $stmt = $dbh->prepare($sql);
        $prams = array(':id'=> $id);
        $stmt->execute($prams);

        header('location: index.php?fg=1');

        $result = $dbh->query($sql);
    } catch (PDOException $e) {
        header('location: index.php?fg=2?err='.$e->getMessage());
        exit();
    }

?>