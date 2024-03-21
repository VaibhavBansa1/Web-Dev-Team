//produce the word captcha
(function(){
    const fonts = ["cursive", "sans-serif", "monospace"];
    let captchaval = "";
    function generateCaptcha(){
        let value = btoa(Math.random()*1000000000).toString();
        value = value.slice(0, 5 + Math.floor(Math.random()*5));
        captchaval = value;
    }
    function setCaptcha(){
        let html = captchaval.split("").map((char) => {
            const rotate = -20 + Math.trunc(Math.random()*40);
            const font = fonts[Math.floor(Math.random()*fonts.length)];
            return `<span style="transform:rotate(${rotate}deg); font-family:${font};">${char}</span>`;
        }).join("");
        document.querySelector(".login-form .captcha .captcha-view").innerHTML = html;
    }
    function initCaptcha(){
        document.querySelector(".login-form .captcha .captcha-f .btn").addEventListener("click", function(){
            generateCaptcha();
            setCaptcha();
        });
        generateCaptcha();
        setCaptcha();
    }
    initCaptcha();

    document.querySelector(".login-form #login-b").addEventListener("click", function(){
        let inputcaptcha = document.querySelector(".login-form .captcha input").value;
        if(inputcaptcha === captchaval){
            window.location.href = 'otp.php';
        }
        else{
            swal("Wrong Captcha");
        }
    });
})();

//checks if the checkbox is checked or not if it is then it 
var isornot = document.getElementById('checkb');
isornot.addEventListener('change', function() {
    if(this.checked) {
        grecaptcha.execute();
    }
    else{
        var but = document.getElementById('login-b');
        but.disabled = true;
        but.classList.remove('active');
    }
});

// activates the verify user button
function onCaptchaSuccess() {
    var but = document.getElementById('login-b');
    but.disabled = false;
    but.classList.add('active');
}
