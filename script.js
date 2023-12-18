window.addEventListener('scroll', reveal);

function reveal(){
    let reveals = document.querySelectorAll('.reveal');

    for(let i = 0; i<reveals.length; i++){

        let windowheight = window.innerHeight;
        let revealtop = reveals[i].getBoundingClientRect().top;
        let revealpoint = 150;

        if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('active');
        }
        else{
            reveals[i].classList.remove('active');
        }
    }
}


function goEdit(){
    document.getElementById("form1").style.display = "none";
    document.getElementById("form2").style.display = "block";
}

function cancel(){
    document.getElementById("form2").style.display = "none";
    document.getElementById("form1").style.display = "block";
}

function godelete(){
    document.getElementById("pro").style.display = "block";
}

function godecline(){
    document.getElementById("pro").style.display = "none";
}

function wow(){
    document.getElementById("upper").style.display = "none";
    document.getElementById("users-container").style.display = "block";
}

function hideUsers(){
    document.getElementById("upper").style.display = "block";
    document.getElementById("lower").style.display = "block";
    document.getElementById("users-container").style.display = "none";
}

