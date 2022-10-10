let questionsContainer = document.getElementById('questions');
let prevBtn = document.getElementById('prevBtn');
let nextBtn = document.getElementById('nextBtn');
let currentTab = 0;

function buildQuiz() {

    // loop through quiz questions
    quizQuestions.forEach((currentQuestion, index) => {
        let questionWrapper = document.createElement('div');
        let question = document.createElement('div');
        let options = document.createElement('div');

        // add a class of `question_wrapper` to newly created element
        questionWrapper.classList.add('question_wrapper');
        question.classList.add('question');
        options.classList.add('options');


        question.innerHTML = `<h3 style="text-indent: -1em; padding-left: 1em;"><span>${index + 1}. </span>${currentQuestion.question}</h3>`;

        // store answer options in a variable
        let answerOptions = currentQuestion.answers;
        for (let key in answerOptions) {

            let option = `
                            
                            <label class="option">
                            
                            <input type="radio" name="question${index + 1}" value="${key}">
                            ${answerOptions[key]}
                            
                            </label>
                            
                        `;

            options.innerHTML += option;
        }

        questionWrapper.appendChild(question);
        questionWrapper.appendChild(options);

        questionsContainer.appendChild(questionWrapper);

    });
}

function showQuestion(num) {
    setTimeout(() => {
        let questions = document.getElementsByClassName('question_wrapper');
        questions[num].style.display = 'block';

        if (num == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (num == (questions.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
    }, 0);

}

function nextPrev(num) {
    let questions = document.getElementsByClassName('question_wrapper');

    questions[currentTab].style.display = "none";

    // increment the current tab
    currentTab = currentTab + num;

    // if every question has been answered
    if (currentTab >= questions.length) {
        //...the form gets submitted:
        displayResult();
        document.getElementById('timer').style.display = 'none';
        return false;
    }

    showQuestion(currentTab);

}

function displayResult() {
    // gather answers container from quiz
    const answerContainers = document.querySelectorAll('.options');

    let numCorrect = 0; //initialize empty value to calculate score


    // loop through each questions
    quizQuestions.forEach((currentQuestion, index) => {

        let answerContainer = answerContainers[index];
        let selector = `input[name=question${index +1}]:checked`;
        let userAnswer = (answerContainer.querySelector(selector) || {});

        if (currentQuestion.correct === userAnswer.value) {
            numCorrect++;
        }


    });

    questionsContainer.innerHTML = `<div class="result"> 
                                        <h1>RESULT</h1>
                                        <p id="score">You Score: ${numCorrect}</p>
                                        <p><button id="restart_quiz" onclick="restartQuiz()">Restart Quiz</button></p>
                                    </div>`;
    prevBtn.style.display = 'none';
    nextBtn.style.display = 'none';
}

function startCountdown() {
    var currentDate = new Date();
    var endTime = currentDate.getTime() + 5 * 60 * 1000;

    var timer = setInterval(function () {

        var now = new Date().getTime();

        var distance = endTime - now;


        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if (hours < 10) {
            hours = '0' + hours;
        }
        if (minutes < 10) {
            minutes = '0' + minutes;
        }

        if (seconds < 10) {
            seconds = '0' + seconds;
        }

        // Display the result in the element with id="demo"
        document.getElementById("timer").innerHTML = `${hours}:${minutes}:${seconds}`;

        // If the count down is finished, write some text
        if (distance <= 0) {
            clearInterval(timer);
            document.getElementById('timer').style.display = 'none';
            // document.getElementById('timer').innerHTML = '';
            displayResult();

        }


    }, 1000);
}

function restartQuiz() {
    window.location.reload(true);
}

buildQuiz();
showQuestion(currentTab);
startCountdown();
// submitBtn.addEventListener('click', displayResult);