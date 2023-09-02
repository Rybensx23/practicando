import '../scss/app.scss';

document.addEventListener('DOMContentLoaded', (e)=> {

    // comente esto para que dejara de salier el error de app.js:7-14 ya que el .dropdown-menu---
    // o todos los elementos del dropdown no existen y es lo que da el error anterior.---

    // const dropdown = document.querySelector('.dropdown-menu');
    // console.log('dropdown:', dropdown);  // Añadido para depuración
    // if (dropdown) {
    // dropdown.style.margin = 0;
    // }


    let items = document.querySelectorAll('.nav-link')
    items.forEach(item => {
        if(item.href == location.href){
            item.classList.add('active')
            if(item.classList.contains('dropdown-item')){
               item.parentElement.parentElement.previousElementSibling.classList.add('active')
            }
        }
    });

})

document.onreadystatechange = () => {
    switch (document.readyState) {
        case "loading":

            break;
        case "interactive": 
            document.getElementById('bar') ? document.getElementById('bar').style.width = '35%' : null;
            break;
            
        case "complete":
            document.getElementById('bar') ? document.getElementById('bar').style.width = '100%' : null;
            setTimeout(() => {
                document.getElementById('bar') ? document.getElementById('bar').parentElement.style.display = 'none' : null 
            }, 1000);   
            break;
    }
}
