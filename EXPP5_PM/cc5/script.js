/* =====================================
   START BUTTON
===================================== */

function startTest() {

    window.location.href = "student.html";

}


/* =====================================
   STUDENT DETAILS
===================================== */

var studentForm =
    document.getElementById("studentForm");


if (studentForm) {

    studentForm.addEventListener("submit", function(event) {

        event.preventDefault();


        var name =
            document.getElementById("studentName").value;

        var register =
            document.getElementById("registerNumber").value;

        var department =
            document.getElementById("department").value;

        var year =
            document.getElementById("year").value;

        var email =
            document.getElementById("email").value;

        var college =
            document.getElementById("college").value;


        /* SAVE DETAILS */

        localStorage.setItem("name", name);

        localStorage.setItem("register", register);

        localStorage.setItem("department", department);

        localStorage.setItem("year", year);

        localStorage.setItem("email", email);

        localStorage.setItem("college", college);


        /* OPEN EXAM */

        window.location.href = "exam.html";

    });

}


/* =====================================
   SHOW STUDENT DETAILS
===================================== */

window.addEventListener("load", function() {

    var name =
        localStorage.getItem("name");

    var register =
        localStorage.getItem("register");

    var department =
        localStorage.getItem("department");

    var year =
        localStorage.getItem("year");


    if (document.getElementById("showName")) {

        document.getElementById("showName").innerHTML =
            name;

        document.getElementById("showRegister").innerHTML =
            register;

        document.getElementById("showDepartment").innerHTML =
            department;

        document.getElementById("showYear").innerHTML =
            year;

    }

});


/* =====================================
   CALCULATE RESULT
===================================== */

function calculateResult() {


    var answers = {

        q1: "HTML",

        q2: "background-color",

        q3: "//",

        q4: "Stack",

        q5: "INSERT",

        q6: "Central Processing Unit",

        q7: "HTTP",

        q8: "Python",

        q9: "Router",

        q10: "RAM"

    };


    var score = 0;

    var userAnswers = {};


    for (var question in answers) {


        var selected =
            document.querySelector(
                'input[name="' +
                question +
                '"]:checked'
            );


        if (selected) {

            userAnswers[question] =
                selected.value;


            if (
                selected.value ===
                answers[question]
            ) {

                score++;

            }

        } else {

            userAnswers[question] =
                "Not Answered";

        }

    }


    var percentage =
        (score / 10) * 100;


    var name =
        localStorage.getItem("name");

    var register =
        localStorage.getItem("register");


    var result =

        "<div class='result'>" +

        "<h2>Examination Result</h2>" +

        "<p><b>Student Name:</b> " +
        name +
        "</p>" +

        "<p><b>Register Number:</b> " +
        register +
        "</p>" +

        "<p><b>Question 1:</b> " +
        userAnswers.q1 +
        "</p>" +

        "<p><b>Question 2:</b> " +
        userAnswers.q2 +
        "</p>" +

        "<p><b>Question 3:</b> " +
        userAnswers.q3 +
        "</p>" +

        "<p><b>Question 4:</b> " +
        userAnswers.q4 +
        "</p>" +

        "<p><b>Question 5:</b> " +
        userAnswers.q5 +
        "</p>" +

        "<p><b>Question 6:</b> " +
        userAnswers.q6 +
        "</p>" +

        "<p><b>Question 7:</b> " +
        userAnswers.q7 +
        "</p>" +

        "<p><b>Question 8:</b> " +
        userAnswers.q8 +
        "</p>" +

        "<p><b>Question 9:</b> " +
        userAnswers.q9 +
        "</p>" +

        "<p><b>Question 10:</b> " +
        userAnswers.q10 +
        "</p>" +

        "<p class='score'>" +
        "Final Score: " +
        score +
        " / 10" +
        "</p>" +

        "<p class='score'>" +
        "Percentage: " +
        percentage +
        "%" +
        "</p>" +

        "</div>";


    document.getElementById("result").innerHTML =
        result;


    window.scrollTo({
        top: document.body.scrollHeight,
        behavior: "smooth"
    });

}


/* =====================================
   CLEAR ANSWERS
===================================== */

function clearAnswers() {

    var radios =
        document.querySelectorAll(
            'input[type="radio"]'
        );


    for (var i = 0; i < radios.length; i++) {

        radios[i].checked = false;

    }


    document.getElementById("result").innerHTML = "";

}