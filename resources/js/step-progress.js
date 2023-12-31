var currentStep = 0;
var steps = document.querySelectorAll('.step');
var nextButton = document.getElementById('next-button');

nextButton.addEventListener('click', function() {
    if (currentStep < steps.length - 1) {
        steps[currentStep].classList.remove('active');
        currentStep++;
        steps[currentStep].classList.add('active');
    }
});
