

    document.getElementById("displayBtn").addEventListener('click', function (){
        var countdown = 30;
        function rotateClockHand() { 
            if(countdown == 0){
                setTimeout(function() {
                window.location.href = "./awardpage.php";
                }, 3000);
                }
            else{
                document.querySelector('.time').textContent = countdown;
                countdown--;
            }
        }
        setInterval(rotateClockHand, 1000);

        var xhr = new XMLHttpRequest();
        document.getElementById("displayBtn").style.display = 'none';
        document.getElementById("question-container").style.display = 'block';
        document.querySelector(".clock-container").style.display = 'inline';
       
        xhr.open('GET', 'retrieve_questions.php', true);

        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 && xhr.status == 200){
                console.log(xhr.responseText);
                var questions = JSON.parse(xhr.responseText);
                

                var questionIndex = 0;
                var prevAnswer = 'e';
                function displayQuestions(){


                    if (questionIndex < questions.length){
                        var question = questions[questionIndex];
                        document.getElementById('question').textContent = question.sentence;
                            document.getElementById('answera').textContent = question.answer_a;
                            document.getElementById('answerb').textContent = question.answer_b;
                            document.getElementById('answerc').textContent = question.answer_c;
                            document.getElementById('answerd').textContent = question.answer_d;

                    prevAnswer = question.answer_key;
                    questionIndex++;
                   
                        }
                   countdown = 30;
                   
                }

                displayQuestions();

                document.getElementById('nextBtn').addEventListener('click', ()=>{
                    var selectedAnswer = document.querySelector('input[name="user-answer"]:checked').value;
                    console.log(selectedAnswer);
                    if(prevAnswer == 'e' || prevAnswer == selectedAnswer){
                        document.querySelectorAll(".cash-value")[questionIndex-1].style.background = 'red';
                        displayQuestions();}
                    else 
                    {document.querySelector(`#answer`+ prevAnswer).style.background = 'green';
                        document.querySelector(`#answer`+ selectedAnswer).style.background = 'red';
                        setTimeout(()=>{
                        window.location.href = "./awardpage.php";
                    },3000);}

                });
            }
        }
        xhr.send();
    } );
