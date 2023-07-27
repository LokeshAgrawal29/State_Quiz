<!DOCTYPE html>
<?php
$ques = array("UP", "MP", "HP", "AP", "Bihar", "Goa", "Gujrat", "Harayana", "Tamil Nadu", "West Bengal", "Maharashtra");
$ans = array("Lucknow", "Bhopal", "Shimla", "Amaravati", "Patna", "Panaji", "Gandhinagar", "Chandigarh", "Chennai", "Kolkata", "Mumbai");
$index = array_rand($ques);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adding Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>State Capitals Quiz</title>
    <style>
        body {
            background-color: #f2f2f2;
            padding: 20px;
        }

        .quiz-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        .feedback-icon {
            font-size: 24px;
            margin-left: 10px;
        }

        #timer {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-white bg-primary p-2">State Capitals Quiz</h1>
        <div id="timer">Time left: 15s</div>
        <form method="post" class="quiz-form" id="quiz-form">
            <input type="hidden" name="correct_ans" value="<?php echo $index; ?>">
            <div class="form-group">
                <label class="h5">Question: What is the capital of <?php echo $ques[$index]; ?>?</label>
                <input type="text" class="form-control" name="user_ans" required>
            </div>
            <button type="submit" name="subbtn" class="btn btn-primary">Submit Answer</button>
            <?php
            if (isset($_POST['subbtn'])) {
                $user_answer = $_POST['user_ans'];
                $correct_answer = $ans[$_POST['correct_ans']];
                $is_correct = strtolower($user_answer) == strtolower($correct_answer);
                echo "<br><br>User Answer: " . $user_answer . "<br>";
                echo "Correct Answer: " . $correct_answer;

                if ($is_correct) {
                    echo "<span class='feedback-icon text-success'>&#10004;</span><br><br><span class='text-success'>Correct Answer</span>";
                } else {
                    echo "<span class='feedback-icon text-danger'>&#10008;</span><br><br><span class='text-danger'>Wrong Answer</span>";
                }
            }
            ?>
        </form>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
     
        function startTimer(duration, display) {
            var timer = duration;
            var interval = setInterval(function () {
                display.textContent = "Time left: " + timer + "s";
                timer--;
                if (timer < 0) {
                    clearInterval(interval);
                    document.getElementById('quiz-form').submit();
                }
            }, 1000);
        }
        
        var duration = 15;
        var display = document.querySelector('#timer');
        startTimer(duration, display);
    </script>
</body>

</html>
