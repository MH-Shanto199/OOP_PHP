<?php
    spl_autoload_register(function ($class) {
        include $class.".php";
    });
?>
<?php
    $user = new Teacher();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object Oriented PHP For beginners</title>
    <style>
    .mbody {
        width: 900px;
        margin: auto;
        text-align: center;
    }

    .header, .footer {
        background: #3498FF;
        margin: 5px 0;
    }
    

    .header h1, .footer h1 {
        margin: 0;
        padding: 40px 0px;
        font-family: cursive;
    }

    .content {
        height: 346px;
        background: #F3F1FF;
        border: 3px solid #3498FF;
        padding: 15px;
        text-align: left;
    }
    .footer h1 {
        padding: 30px 20px;
        font-size: 31px;
    }
    .content-header h2 {
        padding: 0;
        margin: 0px;
        display: inline;
        font-size: 24px;
        text-align: left;
    }

    .content-header a {
        position: relative;
        left: 35px;
        bottom: -3px;
        font-size: 21px;
        display: inline-block;
    }


    .content-header {
        font-family: cursive;
        position: relative;
    }

    .content-header:after {
        position: absolute;
        left: -1px;
        bottom: -10px;
        content: "";
        width: 100%;
        height: 2px;
        background: #3498ff9e;
    }
    
    section.left {
        margin-top: 20px;
        border-right: 2px solid #33333354;
        width: 394px;
        font-family: cursive;
    }
    section.left form table input {
        padding: 7px 20px;
        margin: 5px 20px;
        border: 1px solid #33333345;
        border-radius: 4px;
        font-family: cursive;
    }

    section.left form table input:focus {
        outline: none;
    }
    section.right {
        position: absolute;
        max-width: 460px;
        min-width: 460px;
        right: 18%;
        top: 32%;
    }
    table.tblone td, table.tblone th {
        text-align: center;
        padding: 5px 10px;
    }

    table.tblone {
        width: 100%;
        border: 1px solid #fff;
        border-radius: 8px;
    }
    table.tblone tr:nth-child(2n+1) {
        background: #fff;
        height: 30px;
    }

    table.tblone tr:nth-child(2n) {
        background: #fdf0f1;
        height: 30px;
    }

    .bnd{
        color: #06960E;
        font-weight: bold;
    }

    .bnd2{
        color: #DE5A24;
        font-weight: bold;
    }

    </style>
</head>
<body>
    <div class="mbody">
        <div class="header">
            <h1>Object Oriented PHP For Beginners</h1>
        </div>
        <div class="content">
            <div class="content-header">
                <h2>CRUD With PDO - Template & Database Design</h2>
                <a href="CRUD.PHP">For Student</a> <a href="TcerCrud.PHP">For Teacher</a>
            </div>
            <section class="left">
                <?php
                    if (isset($_POST['create'])) {
                        $name = $_POST['name'];
                        $dep  = $_POST['department'];
                        $age  = $_POST['age'];

                        $user->setName($name);
                        $user->setDep($dep);
                        $user->setAge($age);

                        if ($user->insert()) {
                            echo "<span class='bnd'>Your data successfully Inserted........</span>";
                        }
                    }
                    if (isset($_POST['update'])) {
                        $id    = $_POST['id'];
                        $name  = $_POST['name'];
                        $dep   = $_POST['department'];
                        $age   = $_POST['age'];

                        $user->setName($name);
                        $user->setDep($dep);
                        $user->setAge($age);

                        if ($user->update($id)) {
                            echo "<span class='bnd'>Your data successfully Updated........</span>";
                        }
                    }
                ?>
                <?php
                    if (isset($_GET['action']) && $_GET['action'] == 'update') {
                        $id = (int)$_GET['id'];
                        $result = $user->readById($id);
                ?>
                <form action="" method="post">
                    <table>
                        <input type="hidden" name="id"  value="<?php echo $result['id'];?>"> 
                        <tr>
                            <td>Name :</td>
                            <td><input type="text" name="name" value="<?php echo $result['Name'];?>" required="1"></td>
                        </tr>
                        <tr>
                            <td>Department :</td>
                            <td><input type="text" name="department" value="<?php echo $result['Department'];?>" required="1"></td>
                        </tr>
                        <tr>
                            <td>Age :</td>
                            <td><input type="text" name="age" name="department" value="<?php echo $result['Age'];?>" required="1"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="update" value="Update"></td>
                        </tr>
                    </table>
                </form>
                <?php } else { ?>


                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Name :</td>
                            <td><input type="text" name="name" placeholder="Your Name..." required="1"></td>
                        </tr>
                        <tr>
                            <td>Department :</td>
                            <td><input type="text" name="department" placeholder="Your Department..." required="1"></td>
                        </tr>
                        <tr>
                            <td>Age :</td>
                            <td><input type="text" name="age" placeholder="Your Age..." required="1"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="create" value="Submit"></td>
                        </tr>
                    </table>
                </form>
                
                <?php } ?>
            </section>
            <section class="right">
                <table class="tblone">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $i = 0;
                        foreach ($user->readAll() as $key => $value) {
                            $i++;
                    ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $value['Name']; ?> </td>
                        <td> <?php echo $value['Department']; ?> </td>
                        <td> <?php echo $value['Age']; ?> </td>
                        <td>
                        <?php echo "<a href='TcerCrud.php?action=update&id=".$value['id']."'>Edit</a>"; ?>
                        <?php echo "<a href='TcerCrud.php?action=delete&id=".$value['id']."' onClick='return confirm(\"Do you really want to Delete Data 😡\")'>Delete</a>"; ?>
                        </td>
                    </tr>
                   <?php } ?>
                </table>
                <?php
                    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
                        $id = (int)$_GET['id'];
                        if ($user->deleteData($id)) {
                            echo "<span class='bnd2'>Data successfully Removed........</span>";
                        }
                    }
                ?>
            </section>
        </div>
        <div class="footer">
            <h1>Work hard to succeed</h1>
        </div>
    </div>
</body>
</html>