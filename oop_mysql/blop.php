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
                $db = new mysqli("localhost","root","","images");
                if (mysqli_connect_errno()) {
                    echo "Connection Lost.......!!😫<br>";
                } else {
                    echo "Successfully Connected............😊<br>";
                }

                $sql = "SELECT Image FROM user_images WHERE id=?";
                $stmt = $db->prepare($sql);
                $stmt->bind_param("i", $id);
                $id = 2;
                $stmt->execute();
                $stmt->bind_result($image);
                $stmt->fetch();
                header("content-type: jpg");
                echo '<img src="data:image/jpg; base64,'.base64_encode($image).'" style="width: 439px;">'


                // $sql = "INSERT INTO user_images(image) VALUES(?)";

                // $stmt = $db->prepare($sql);
                // $stmt->bind_param("b", $image);
                // $image = file_get_contents("Himu.jpg");
                // $stmt->send_long_data(0, $image);
                // $stmt->execute();
                
            ?>                  
        </div>
        <div class="footer">
            <h1>Work hard to succeed</h1>
        </div>
    </div>
</body>
</html>