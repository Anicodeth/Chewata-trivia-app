

<html>
<head>
    <title>Chewata</title>
    <link rel="stylesheet" type="text/css" href="../Style/game.css">

</head>


    <body>
    <?php
session_start();

    if (!isset($_SESSION['username'])){
        header('Location: ./loginpage.php');
    }

echo "<div class='info' >Let us play, ". $_SESSION['username']."<br> ".$_COOKIE['email']."<br><a href='logout.php'>Log Out</a></div>";
?>

        <div align="center">
        <h1>Chewata Questions</h1>
        <button id="displayBtn">Start game</button>
    </div>

    <div class = "clock-container" align="center"style="display: none;" >
        <div  class="clock-outer">
            <div color="white" align="center" class="clock-inner">
                <h1 class = "time"></h1>
            </div>
        </div>
    </div>






    <div id = "question-container" style="display: none;">
    <div id="question"></div>

    <div id="answers" >
        <form>
            <div class = "row">
                <div class ="keys ">
                    <input type="radio" name="user-answer"  value = 'a' >A: <span id="answera"></span>
                </div>

                <div class ="keys ">
                    <input type="radio" name="user-answer" value = 'b'>B: <span id="answerb"></span><br>
                </div>
            </div>

            <div class = "row">
                <div class ="keys ">
                    <input type="radio" name="user-answer" value = 'c'>C: <span id="answerc"></span>
                </div>

                <div class ="keys ">
                    <input type="radio" name="user-answer" value = 'd'>D: <span id="answerd"></span><br>
                </div>
            </div>
        </form>
    </div>


        <div align="center">
            <button id="nextBtn">Submit Answer</button>
        </div>
    </div>

    <div align="center">
        <div class="cash-pool-table">
            <ul>
                <li class="cash-value">100Birr</li>
                <li class="cash-value">200Birr</li>
                <li class="cash-value">300Birr</li>
                <li class="cash-value">500Birr</li>
                <li class="cash-value">1,000Birr</li>
                <li class="cash-value">2,000Birr</li>
                <li class="cash-value">4,000Birr</li>
                <li class="cash-value">8,000Birr</li>
                <li class="cash-value">16,000Birr</li>
                <li class="cash-value">32,000Birr</li>
            
            </ul>
        </div>
    </div>

    <script src = "../Script/script.js"></script>
    
</body>
</html>
