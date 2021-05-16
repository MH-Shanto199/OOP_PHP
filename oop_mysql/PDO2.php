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
        height: 325px;
        background: #F3F1FF;
        border: 3px solid #3498FF;
        padding: 15px;
        text-align: left;
    }
    .footer h1 {
        padding: 30px 20px;
        font-size: 31px;
    }
    </style>
</head>
<body>
    <div class="mbody">
        <div class="header">
            <h1>Object Oriented PHP For Beginners</h1>
        </div>
        <div class="content">
            <?php
                $dsn = "mysql:dbname=userdata;host=localhost;";
                $user = "root";
                $pass = "";
                try {
                    $pdo = new PDO($dsn, $user, $pass);
                } catch (PDOException $th) {
                    echo "Connection Lost.......!!😫<br>".$th->getMessage();
                }

                $Name= "Mushfiq Mobarak";
                $Email= "Mobarak@gmail.com";
                $Skill= "Economist";

                $sql = "INSERT INTO usertbl(Name, Email, Skill) VALUES(?,?,?)";
                $stmt = $pdo->prepare($sql);
                $arr = array($Name, $Email, $Skill);
                $stmt->execute($arr);

                // $sql = "INSERT INTO usertbl(Name, Email, Skill) VALUES(:Name, :Email, :Skill)";
                // $stmt = $pdo->prepare($sql);
                // $stmt->bindparam(':Name', $Name);
                // $stmt->bindparam(':Email', $Email);
                // $stmt->bindparam(':Skill', $Skill);
                // $stmt->execute();

                
            ?>                  
        </div>
        <div class="footer">
            <h1>Work hard to succeed</h1>
        </div>
    </div>
</body>
</html>