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
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Enter the first number</td>
                        <td><input type="number" name="num1"></td>
                    </tr>
                    <tr>
                        <td>Enter the second number</td>
                        <td><input type="number" name="num2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="calculation" value="calculate"></td>
                    </tr>
                </table>
            </form>
            <?php
                class Claculate {
                    public $a;
                    public $b;
                    function __construct($x, $y) {
                        $this->a=$x;
                        $this->b=$y;
                    }
                    function add(){
                        echo "Summation : ".($this->a+$this->b)."<br>";
                    }
                    function sub(){
                        echo "Subtraction : ".($this->a-$this->b)."<br>";
                    }
                    function mul(){
                        echo "Multiplication : ".($this->a*$this->b)."<br>";
                    }
                    function div(){
                        echo "division  : ".($this->a/$this->b)."<br>";
                    }
                   

                }
                
                if (isset($_POST['calculation'])) {
                    $numOne = $_POST['num1'];
                    $numtwo = $_POST['num2'];
                    if (empty($numOne) or empty($numtwo)) {
                        echo "<span style='color:#EE6554'>Fild must not be empty..</span><br>";
                    } else {
                        echo "Number One is : ".$numOne."; Number Two is : ".$numtwo."<br>";
                        $cal = new Claculate("$numOne", "$numtwo");
                        $cal->add();
                        $cal->sub();
                        $cal->mul();
                        $cal->div();
                    }
                    
                }
            ?>                  
        </div>
        <div class="footer">
            <h1>Work hard to succeed</h1>
        </div>
    </div>
</body>
</html>