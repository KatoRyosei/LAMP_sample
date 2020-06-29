<?php
    $dsn = 'mysql:dbname=test_DB;host=localhost;';
    $user = 'kato';
    $password = 'morijyobi';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];

        $sql = "update user set name=:name, age=:age where id=:id";
        $stmt = $dbh->prepare($sql);
        $prams = array(':id'=> $id, ':name'=> $name, ':age'=> $age,);
        $stmt->execute($prams);

        header('location: index.php?fg=1');

        $result = $dbh->query($sql);
    } catch (PDOException $e) {
        header('location: index.php?fg=2?err='.$e->getMessage());
        exit();
    }

?>