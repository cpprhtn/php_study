<?php
function print_title(){
    if(isset($_GET['id'])){
        echo $_GET['id'];
    } else {
        echo "Welcome";
    }
}
function print_description(){
    if(isset($_GET['id'])){
        echo file_get_contents("data/".$_GET['id']);
    } else {
        echo "Hello, PHP";
    }
}
function print_list(){
    $list = scandir('./data');
    /*
        echo "<li>$list[0]</li>\n";
        echo "<li>$list[1]</li>\n";
        echo "<li>$list[2]</li>\n";
        echo "<li>$list[3]</li>\n";
        echo "<li>$list[4]</li>\n";
        echo "<li>$list[5]</li>\n";
        echo "<li>$list[6]</li>\n";
        
        $i = 0;

        remove . || ..
        $i = 2;
        while($i < count($list)){
            echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</li>\n";
            $i = $i + 1;
        }
    */
    $i = 0;
    while($i < count($list)){
        if($list[$i] != '.') {
            if($list[$i] != '..') {
                echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
            }
        }
    $i = $i + 1;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            <?php
                print_title();
            ?>
        </title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <ol>
            <?php
            print_list();
            ?>
        </ol>

        <a href="create.php">create</a>
        <?php if(isset($_GET['id'])){ ?>
            <!-- <a href="update.php?id=<?php //echo $_GET['id']; ?>">update</a> -->
            <a href="update.php?id=<?=$_GET['id']?>">update</a>
        <?php } ?>

        <h2>
            <?php
                print_title();
            ?>
        </h2>
        <?php
            print_description();
        ?>

        <form action="update_process.php" method="post">
            <!-- 보이지 않지만 id값이 old_title라는 값으로 전송 -->
            <input type="hidden" name="old_title" value="<?=$_GET['id']?>">
            <p>
                <input type="text" name="title" placeholder="Title" value="<?php print_title(); ?>">
            </p>
            <p>
                <textarea name="description" placeholder="Description"><?php print_description(); ?></textarea>
            </p>
            <p>
                <input type="submit">
            </p>
        </form>
    </body>
</html>