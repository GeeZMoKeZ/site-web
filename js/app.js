window.addEventListener("DOMContentLoaded", (event) => {
    setTimeout(function() {
        document.getElementById("loader").style.top = "-100vh";
    }, 1000)
    console.log("DOM entièrement chargé et analysé");

    inputs = document.querySelectorAll("input:not(input[type=\"submit\"]), textarea");
    
    inputs.forEach(e => {
        e.addEventListener("click", function(){
            inputs.forEach(e => {
               e.style.borderBottom = "2px solid #FF7E7E";
            });
            e.style.borderBottom = "2px solid black";
        })
    });



    menuHamburger = document.getElementById("hamburger-menu");
    changingMenu = document.getElementById("changing-menu");
    menuHamburger.addEventListener("click", function(){
        changingMenu.classList.add("header-responsive");
    })

});


function display_modal(){
    document.getElementById("modal").style.display = "block"
}
