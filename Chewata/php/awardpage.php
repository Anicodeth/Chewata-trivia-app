<!DOCTYPE html>
<html>
<head>
  <title>Award</title>
 <style>

body{
margin:0px;
font-family: monospace;
color: White;

background-color:rgb(21, 18, 51);
}



#confetti-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
}
.confetti {
  width: 10px;
  height: 10px;
  background-color: #e84c4c;
  position: absolute;
  top: -10px;
  animation: confetti-fall 4s infinite;
}

@keyframes confetti-fall {
  0% {
    transform: translateX(0) translateY(-100px) rotateZ(0);
  }
  100% {
    transform: translateX(200vw) translateY(200vh) rotateZ(720deg);
  }
}
.redirect{
padding: 1.5em 4em;
color: rgba(#fff,.7);
text-align: center;
background-color: transparent;
font-size: 1.1em;
transition: 0.3s;
border:none;
background: linear-gradient(to right, #016062 0%, #4a5e8c 44%, #4a5e8c 49%, #4a5e8c 57%, #744a9e 100%);
border-radius:1rem;
color:white;
margin:auto;

}
 </style>
</head>
<body align = "center">
  <div id="confetti-container"></div>
  

  <?php
  session_start();
  echo "<div align = 'center' class = 'award'><h1>We hope you had fun playing our game, go for another round!</h1></div>";

  ?>
<button class = "redirect" onclick = 'redirect()'>New Game</button>
  <script >
 
       function redirect(){
        window.location.href = './gamepage.php';
       }

    function createConfetti() {
  const confettiContainer = document.getElementById('confetti-container');
  
  for (let i = 0; i < 100; i++) {
    const confetti = document.createElement('div');
    confetti.classList.add('confetti');
    confetti.style.left = Math.random() * 100 + 'vw';
    confetti.style.animationDelay = Math.random() * 4 + 's';
    confettiContainer.appendChild(confetti);
  }
}

createConfetti();

  </script>
</body>
</html>
