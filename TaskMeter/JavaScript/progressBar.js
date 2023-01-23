let progressCircular = document.querySelectorAll(".progress-circular");
let btn = document.querySelector("button");
let inp = document.getElementById("sum");
let value = document.querySelector(".value");
let start = 0;

function compute () {
    var num1 = document.getElementById("U1").value;
    var num2 = document.getElementById("U2").value;
    var num3 = document.getElementById("U3").value;
    var sum = parseInt(num1) + parseInt(num2) + parseInt(num3);
    document.getElementById("sum").value = sum;
}

btn.addEventListener('click', bar);

function bar() {
    if (inp.value >= 101) {
    alert("Invalid percentage input!");
}
else{
let progress = setInterval(() => {
        if (start < inp.value) {
            start++;
            progressEND();
        } else {
            start--;
            progressEND();
        }
        
        function progressEND() {
        value.textContent = `${start}%`;
        progressCircular.style.background = `conic-gradient(#880bea ${start * 3.6}deg, #ededed 0deg`;
        console.log(start);

        if (start == inp.value) {
            clearInterval(progress);
            inp.value = "";
        }
        }
    }, 5 );
}
}

$(document).ready(function(){  
    /*$.get("departmentData.php", function(data){
            $('#dep').html(data); 
        });*/
    $.get("percent.php", function(data){
            $('#percent').val(data); 
        });
})