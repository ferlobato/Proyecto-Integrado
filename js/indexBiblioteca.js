// Autor: Fernando Lobato
window.onload=inicio;

function inicio(){
    document.getElementById("j1").addEventListener('mouseenter', selecciona1);
    document.getElementById("j2").addEventListener('mouseenter', selecciona2);
    document.getElementById("j3").addEventListener('mouseenter', selecciona3);
    document.getElementById("j4").addEventListener('mouseenter', selecciona4);
    document.getElementById("j1").addEventListener('mouseleave', deselecciona);
    document.getElementById("j2").addEventListener('mouseleave', deselecciona);
    document.getElementById("j3").addEventListener('mouseleave', deselecciona);
    document.getElementById("j4").addEventListener('mouseleave', deselecciona);
    audioH = document.getElementById("AudioH");
}
function playAudio(){
    audioH.pause();
    audioH.currentTime = 0;
    audioH.play();
}
function selecciona1(){
    document.getElementById("cajaDesc").innerHTML='<p>Juego de plataforma 2.5 d</p>';
    $("#cajaDesc p").hide().fadeIn(200);
    playAudio();
}
function selecciona2(){
    document.getElementById("cajaDesc").innerHTML='<p>Encuentra la capsula dorada en un laberinto con gravedad cambiante</p>';
    $("#cajaDesc p").hide().fadeIn(200);
    playAudio();
}
function selecciona3(){
    document.getElementById("cajaDesc").innerHTML='<p>Air Hockey version Alpha. Modo un solo jugador</p>';
    $("#cajaDesc p").hide().fadeIn(200);
    playAudio();
}
function selecciona4(){
    document.getElementById("cajaDesc").innerHTML='<p>Juego clasico de arcade</p>';
    $("#cajaDesc p").hide().fadeIn(200);
    playAudio();
}
function deselecciona(){
    $("#cajaDesc p").fadeOut(200);
}