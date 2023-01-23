let progressCircular = document.querySelector(".progress-circular");
let btn = document.querySelector("prgbtn");
let inp = document.getElementById("percent");
let value = document.querySelector(".value");
let start = 0;

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
        }
        }
    }, 5 );
}
}

