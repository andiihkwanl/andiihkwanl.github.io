const mode=document.getElementById('mode');
const body= document.querySelector('body');

document.getElementById("menuBurger").addEventListener("click",function(){
    document.getElementById("nav").classList.toggle("active")
})

mode.addEventListener('click', function(){
    this.classList.toggle('fa-moon');
    if(this.classList.toggle('fa-sun')){
        body.style.background='white';
        body.style.color='black';
        body.style.transition='3s';
        alert("Anda akan memasuki mode LightMode");
        
    }
    else{
        body.style.background='black';
        body.style.color='white';
        body.style.transition='3s';
        alert("Anda akan memasuki mode DarkMode");
    }
})

const nama=document.getElementById('nama');
nama.style.color='darkblue';

const biodata=document.getElementsByTagName('td');
for (let i=0; i<10; i++){
        biodata[i].style.color='black';
        biodata[i].style.fontSize='20px'; 
}




