<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
        <?php
        $list = scandir('./data');
        // var_dump($list);
        /*
        echo "<li>$list[0]</li>\n";
        echo "<li>$list[1]</li>\n";
        echo "<li>$list[2]</li>\n";
        echo "<li>$list[3]</li>\n";
        echo "<li>$list[4]</li>\n";
        echo "<li>$list[5]</li>\n";
        echo "<li>$list[6]</li>\n";
        */
        // $i = 0;

        //remove . || ..
        // $i = 2;
        // while($i < count($list)){
        //     echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</li>\n";
        //     $i = $i + 1;
        // }
        $i = 0;
        while($i < count($list)){
            if($list[$i] != '.'){
                if($list[$i] != '..'){
                    echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</li>\n";
                }
            }
            $i = $i + 1;
        }
        ?>
    </ol>
    <h2>
        <?php
        if(isset($_GET['id'])){
            echo $_GET['id'];
        }
        else{
            echo "Welcome";
        }
        ?>
    </h2>
    <?php
    if(isset($_GET['id'])){
        echo file_get_contents("data/".$_GET['id']);
    }
    else{
        echo "Hello, PHP";
    }
    ?>
</body>
</html>