var links = document.getElementsByClassName("nav-link");
var URL = window.location.pathname;
URL = URL.substring(URL.lastIndexOf('/'));
var in_profile = true;
for (var i = 0; i < links.length; i++) {    
    if (links[i].dataset.pathname == URL) {
        links[i].classList.add("active");
        in_profile = false;  
    }
}

if (in_profile)
{
    document.getElementById("navbarDropdown").classList.add("active");
}