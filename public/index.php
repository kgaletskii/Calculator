<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Calculator</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <form>
        <div class="calculator">
            <h1>Calculator</h1>
            <div>
                <input type="number" step="any" name="value1" placeholder="Value1" required>
                
                <select name="operation">
                    <option>Add</option>
                    <option>Subtract</option>
                    <option>Multiply</option>
                    <option>Divide</option>
                </select>
            </div>

            <input type="number" step="any" name="value2" placeholder="Value2" required>
        
            <div class="form-result">
                <?php
                    require '../vendor/autoload.php';
                    use Azubi\Math\Math;

                    $result = "";
                    if (isset($_GET['value1'], $_GET['value2'], $_GET['operation'])) {
                        $value1 = $_GET['value1'];
                        $value2 = $_GET['value2'];
                        $operation = $_GET['operation'];
                        $calculation = new Math();
                        $result = $calculation->calculate($value1, $value2, $operation);
                    }
                ?>

            </div>
            <div>
                <button>Calculate</button>
                <input class="input-result" name="result" readonly
                    placeholder="Result" value="<?php echo $result; ?>">
            </div>
        </div>
    </form>

    <script src="js/script.js"></script>
</body>

</html>