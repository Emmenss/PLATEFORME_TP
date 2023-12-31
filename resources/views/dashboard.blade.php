<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
          <div class="container-fluid py-1 px-2">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                      <!-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Tableau de bord</a></li> -->
                      <!-- <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li> -->
                      <h6 class="font-weight-bold mb-0">Tableau de board</h6>
                  </ol>
              </nav>
          </div>
        </nav>

        
        <x-app.navbar />
        <div class="container-fluid py-1 px-2">
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">

                            <h3 class="font-weight-bold mb-0">Salut {{ auth()->user()->name }}</h3>
                        </div>
                        <button type="button"
                            class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                            <span class="btn-inner--icon">
                                <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                                    <span class="visually-hidden">New</span>
                                </span>
                            </span>
                            <span class="btn-inner--text">Messages</span>
                        </button>
                        <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                            <span class="btn-inner--icon">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                            </span>
                            <!-- <span class="btn-inner--text">Sync</span> -->
                        </button>
                    </div>
                </div>
            </div>
            <hr class="my-0">

            <!-- principal step bar -->
            <!-- <link rel="stylesheet" href="{{ asset('css/step-progress.css') }}">
            <div class="step-bar">

                <div class="step active"> Chapitre 1<div class="checked active">✔</div></div>
                <div class="step">Chapitre 2 <div class="checked">✔</div></div>
                <div class="step">Chapitre 3<div class="checked">✔</div></div>
                <div class="step">Chapitre 4<div class="checked">✔</div></div>
           </div>

           <button id="next-button">Suivant</button>
           <script src="{{ asset('js/step-progress.js') }}"></script>
        -->
   <script src="{{ asset('js/step-progress.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

 

   <div class="container">
       <div class="progress-bars">
        HTML
           <div class="progress-bar red">
               <div class="progress">
                  <div class="progress-bar-number">0%</div>
               </div>
           </div>
        JAVASCRIPT
           <div class="progress-bar blue">
               <div class="progress">
                    <div class="progress-bar-number">0%</div>
               </div>
           </div>
        CSS
           <div class="progress-bar green">
               <div class="progress">
                    <div class="progress-bar-number">0%</div>
               </div>
           </div>
       BOOTSTRAP
           <div class="progress-bar yellow">
               <div class="progress">
                   <div class="progress-bar-number">0%</div>
               </div>
           </div>
       </div>

       <div class="donut-chart">
           <canvas id="donutChart" width="200" height="200"></canvas>
       </div>
   </div>

   <script>
       var ctx = document.getElementById('donutChart').getContext('2d');
       var donutChart = new Chart(ctx, {
           type: 'doughnut',
           data: {
               labels: ['JAVASCRIPT', 'CSS', 'BOOTSTRAP' ,'HTML'],
               datasets: [{
                   data: [25, 30, 20,25],
                   backgroundColor: ['blue','green','orange','red']
               }],
            //    labels: ['A = 25 %', 'B = 30 %', 'C = 20 %' ,'D = 25 %'],
           },
       options: {
               plugins: {
                   datalabels: {
                       formatter: (value, context) => {
                           return context.chart.data.labels[context.dataIndex] + '\n' + value + '%';
                       }
                   }
               }
           }
       });
   </script>

<style>

.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
      }

      .progress-bars {
        display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    max-width: 300px;
    margin: 0 auto;     
    }

   .progress-bar {
    width: 100%;
    margin: 10px 0;
}

/* Styles pour le graphique en forme de donut */
.donut-chart {
    max-width: 300px;
    margin: 0 auto;
}

   </style>
  <hr class="my-0">








       <!-- barre de progression -->

       <!-- <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-widt" />
       <div class="container mt-5 offset-1ù">
      <div class="steps">
        <span class="circle active">1</span>
        <span class="circle">2</span>
        <span class="circle">3</span>
        <span class="circle">4</span>
        <div class="progress-bar">
          <span class="indicator"></span>
        </div>
      </div> -->
      <!-- second bar -->
      <!-- <div class="steps">
        <span class="circle active">1</span>
        <span class="circle">2</span>
        <span class="circle">3</span>
        <span class="circle">4</span>
        <div class="progress-bar">
          <span class="indicator"></span>
        </div>
      </div>
      <div class="buttons">
        <button id="prev" disabled>Prev</button>
        <button id="next">Next</button>
      </div>
    </div> -->

    <!-- pie chart -->
       <!-- <div class="circular">
            <div class="inner"></div>
            <div class="outer"></div>
            <div class="numb">
               0%
            </div>
            <div class="circle">
               <div class="dot">
                  <span></span>
               </div>
               <div class="bar left">
                  <div class="progress"></div>
               </div>
               <div class="bar right">
                  <div class="progress"></div>
               </div>
            </div>
         </div> -->

           <div class="row my-8 mt-5">
           <h4 style=text-align:center;>PROGRESSION DES 7 DERNIERS JOURS</h4>
                <div class="col-lg-14 col-md-14 mb-md-0 mb-4">
                    <div class="card shadow-xs border h-100">
                        <div class="card-header pb-0">
                            <h6 class="font-weight-semibold text-lg mb-0">Balances over time</h6>
                            <p class="text-sm">Here you have details about the balance.</p>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                    autocomplete="off" checked>
                                <label class="btn btn-white px-3 mb-0" for="btnradio1">12 months</label>
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2"
                                    autocomplete="off">
                                <label class="btn btn-white px-3 mb-0" for="btnradio2">30 days</label>
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3"
                                    autocomplete="off">
                                <label class="btn btn-white px-3 mb-0" for="btnradio3">7 days</label>
                            </div>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart mb-2">
                                <canvas id="chart-bars" class="chart-canvas" height="240"></canvas>
                            </div>
                            <button class="btn btn-white mb-0 ms-auto">View report</button>
                        </div>
                    </div>
                </div>           
            <x-app.footer />
        </div>
    </main>
<!-- 
    <style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f6f7fb;
}
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 40px;
  max-width: 400px;
  width: 100%;
}
.container .steps {
  display: flex;
  width: 100%;
  align-items: center;
  justify-content: space-between;
  position: relative;
}
.steps .circle {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50px;
  width: 50px;
  color: #999;
  font-size: 22px;
  font-weight: 500;
  border-radius: 50%;
  background: #fff;
  border: 4px solid #e0e0e0;
  transition: all 200ms ease;
  transition-delay: 0s;
}
.steps .circle.active {
  transition-delay: 100ms;
  border-color: #4070f4;
  color: #4070f4;
}
.steps .progress-bar {
  position: absolute;
  height: 4px;
  width: 100%;
  background: #e0e0e0;
  z-index: -1;
}
.progress-bar .indicator {
  position: absolute;
  height: 100%;
  width: 0%;
  background: #4070f4;
  transition: all 300ms ease;
}
.container .buttons {
  display: flex;
  gap: 20px;
}
.buttons button {
  padding: 8px 25px;
  background: #4070f4;
  border: none;
  border-radius: 8px;
  color: #fff;
  font-size: 16px;
  font-weight: 400;
  cursor: pointer;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
  transition: all 200ms linear;
}
.buttons button:active {
  transform: scale(0.97);
}
.buttons button:disabled {
  background: #87a5f8;
  cursor: not-allowed;
}    
</style>
<style>

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  text-align: center;
  place-items: center;
  background: #dde6f0;
}
.circular{
  height: 100px;
  width: 100px;
  position: relative;
}
.circular .inner, .circular .outer, .circular .circle{
  position: absolute;
  z-index: 6;
  height: 100%;
  width: 100%;
  border-radius: 100%;
  box-shadow: inset 0 1px 0 rgba(0,0,0,0.2);
}
.circular .inner{
  top: 50%;
  left: 50%;
  height: 80px;
  width: 80px;
  margin: -40px 0 0 -40px;
  background-color: #dde6f0;
  border-radius: 100%;
  box-shadow: 0 1px 0 rgba(0,0,0,0.2);
}
.circular .circle{
  z-index: 1;
  box-shadow: none;
}
.circular .numb{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 10;
  font-size: 18px;
  font-weight: 500;
  color: #4158d0;
}
.circular .bar{
  position: absolute;
  height: 100%;
  width: 100%;
  background: #fff;
  -webkit-border-radius: 100%;
  clip: rect(0px, 100px, 100px, 50px);
}
.circle .bar .progress{
  position: absolute;
  height: 100%;
  width: 100%;
  -webkit-border-radius: 100%;
  clip: rect(0px, 50px, 100px, 0px);
}
.circle .bar .progress, .dot span{
  background: #4158d0;
}
.circle .left .progress{
  z-index: 1;
  animation: left 4s linear both;
}
@keyframes left {
  100%{
    transform: rotate(180deg);
  }
}
.circle .right{
  z-index: 3;
  transform: rotate(180deg);
}
.circle .right .progress{
  animation: right 4s linear both;
  animation-delay: 4s;
}
@keyframes right {
  100%{
    transform: rotate(180deg);
  }
}
.circle .dot{
  z-index: 2;
  position: absolute;
  left: 50%;
  top: 50%;
  width: 50%;
  height: 10px;
  margin-top: -5px;
  animation: dot 8s linear both;
  transform-origin: 0% 50%;
}
.circle .dot span {
  position: absolute;
  right: 0;
  width: 10px;
  height: 10px;
  border-radius: 100%;
}
@keyframes dot{
  0% {
    transform: rotate(-90deg);
  }
  50% {
    transform: rotate(90deg);
    z-index: 4;
  }
  100% {
    transform: rotate(270deg);
    z-index: 4;
  }
}
</style> -->



<!-- 
    <script>
      
      const circles = document.querySelectorAll(".circle"),
  progressBar = document.querySelector(".indicator"),
  buttons = document.querySelectorAll("button");
let currentStep = 1;
// function that updates the current step and updates the DOM
const updateSteps = (e) => {
  // update current step based on the button clicked
  currentStep = e.target.id === "next" ? ++currentStep : --currentStep;
  // loop through all circles and add/remove "active" class based on their index and current step
  circles.forEach((circle, index) => {
    circle.classList[`${index < currentStep ? "add" : "remove"}`]("active");
  });
  // update progress bar width based on current step
  progressBar.style.width = `${((currentStep - 1) / (circles.length - 1)) * 100}%`;
  // check if current step is last step or first step and disable corresponding buttons
  if (currentStep === circles.length) {
    buttons[1].disabled = true;
  } else if (currentStep === 1) {
    buttons[0].disabled = true;
  } else {
    buttons.forEach((button) => (button.disabled = false));
  }
};
// add click event listeners to all buttons
buttons.forEach((button) => {
  button.addEventListener("click", updateSteps);
});
                    
   </script>

<script>
            const numb = document.querySelector(".numb");
            let counter = 0;
            setInterval(()=>{
              if(counter == 100){
                clearInterval();
              }else{
                counter+=1;
                numb.textContent = counter + "%";
              }
            }, 80);
         </script> -->
<!-- style bar principal -->
         <!-- <style>
            .step-bar {
    display: flex;
    justify-content: space-between;
    width: 80%;
    margin: 0 auto;
 }
 
 .step {
    width: 24%;
    background-color: #ddd;
    text-align: center;
    padding: 10px;
    border: 1px solid #999;
    border-radius: 5px;
    cursor: pointer;
 }
 
 .step.active {
    background-color: purple;
    color: white;
 }
 
 #next-button {
    background-color: #007BFF;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
 }
 
         </style> -->
         <!-- js bar principale -->
         <!-- <script>
       var currentStep = 0;
var steps = document.querySelectorAll('.step');
var nextButton = document.getElementById('next-button');
var etape = "Étape 1";

nextButton.addEventListener('click', function() {
    if (currentStep < steps.length - 1) {
        currentStep++;
        steps[currentStep].classList.add('active');
        etape = "Étape " + (currentStep + 1);
        document.getElementById('etape-display').textContent = etape; // Met à jour le texte dans l'élément HTML
    }
});

         </script> -->

         <style>
.step-bar-2 {
   display: flex;
   align-items: center;
   width: 80%;
   margin: 0 auto;
}

.step-circle {
   width: 40px;
   height: 40px;
   background-color: #ddd;
   border-radius: 50%;
   display: flex;
   align-items: center;
   justify-content: center;
   font-size: 14px;
   cursor: pointer;
   
}

.step-line {
   width:  200px;
   height: 10px;
   background-color: #ddd;
}

.step-circle.completed {
   background-color: #007BFF;
   color: white;
}

         </style>
        <script>
           var steps = document.querySelectorAll('.step-circle');
           var lines = document.querySelectorAll('.step-line');
           var nextButton = document.getElementById('next-button');
           var currentStep = 0;

           nextButton.addEventListener('click', function() {
               if (currentStep < steps.length) {
                   steps[currentStep].classList.add('completed');
                   lines[currentStep].style.backgroundColor = '#007BFF';
                   currentStep++;
               }
           });


        </script> 



<style> 



.progress-bar {
   width: 300px;
   height: 20px;
   background-color: #ddd;
   position: relative;
}

.red .progress {
   background-color: red;
}

.blue .progress {
   background-color: blue;
}

.green .progress {
   background-color: green;
}

.yellow .progress {
   background-color: orange;
}


.progress {
   width: 0;
   height: 100%;
   background-color: #007BFF;
   position: relative;
}

.progress-bar-number {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   color: white;
   font-size: 16px;
}
</style> 

<script> 
function updateProgressBar(progressElement, percentage) {
    var progressBar = progressElement.querySelector('.progress');
    var progressNumber = progressElement.querySelector('.progress-bar-number');
    var currentProgress = 0;
    
    var interval = setInterval(function() {
        if (currentProgress < percentage) {
            currentProgress++;
            progressBar.style.width = currentProgress + '%';
            progressNumber.textContent = currentProgress + '%';
        } else {
            clearInterval(interval);
        }
    }, 20);
}

document.addEventListener('DOMContentLoaded', function() {
    var progressBars = document.querySelectorAll('.progress-bar');
    
    progressBars.forEach(function(progressBar, index) {
        var percentage = Math.floor(Math.random() * 100) + 1; // Génère un pourcentage aléatoire
        updateProgressBar(progressBar, percentage);
    });
});
</script> 


</x-app-layout>
