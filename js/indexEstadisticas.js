window.onload=inicio;
function inicio(){
    // Configuración inicial y eventos:
    //acceso();
    document.getElementById("cNombreBTN").disabled=true;
    document.getElementById("cMailBTN").disabled=true;
    document.getElementById("cContraseñaBTN").disabled=true;
    document.getElementById("cNombre").addEventListener('blur',validarTextoNom);
    document.getElementById("cNombre").addEventListener('input',validarTextoNom);
    document.getElementById("cMail").addEventListener('blur',validarMail);
    document.getElementById("cMail").addEventListener('input',validarMail);
    document.getElementById("cContraseña").addEventListener('input',evaluarPass);
    document.getElementById("cContraseña2").addEventListener('focus',evaluarPass2);
    document.getElementById("cContraseña2").addEventListener('input',evaluarPass2);
}

function validarTextoNom(){
    if(this.value==''){
        document.getElementById("cNombreBTN").disabled=true;
    }else if(this.value.match(/^.*[\s]+.*$/)){
        document.getElementById("errores").innerHTML="<div class='error'>Tu nick no puede contener espacios</div>";
        document.getElementById("cNombreBTN").disabled=true;
        this.classList.add('error');
        this.focus();
    }else if(this.value.match(/^[\d]+$/)){
        document.getElementById("errores").innerHTML="<div class='error'>Tu nick no puede contener sólo números</div>";
        document.getElementById("cNombreBTN").disabled=true;
        this.classList.add('error');
        this.focus();
    }else{
        document.getElementById("errores").innerHTML="<br>";
        this.classList.remove('error');
        document.getElementById("cNombreBTN").disabled=false;
    }
}

function validarMail(){
    if(this.value==''){
        document.getElementById("cMailBTN").disabled=true;
        document.getElementById("errores").innerHTML="<br>";
        this.classList.remove('error');
    }else if(this.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
        document.getElementById("errores").innerHTML="<br>";
        this.classList.remove('error');
        document.getElementById("cMailBTN").disabled=false;
    }else{
        document.getElementById("errores").innerHTML="<div class='error'>Dirección de correo inválida</div>";
        this.classList.add('error');
        this.focus();
        document.getElementById("cMailBTN").disabled=true;
    }
}

var checkNum=false, checkLength=false, checkMayus=false, checkMinus=false;
var passOk=false, pass2Ok=false, Pass2Introducido=false;

function evaluarPass(){
    var aInput = this.value.split("");
    var iCuentaNum = 0;
    
    for (var iIndex = 0; iIndex <= aInput.length - 1; iIndex++) {
        if (!isNaN(aInput[iIndex]) && aInput[iIndex]!=' ') {         // Es numérico
            iCuentaNum++;
        }
    }

    // Símbolos
    if (iCuentaNum >0) {
        document.getElementById("passNum").innerHTML = "<i class='checkNum fas fa-check-circle'></i>";
        if(!checkNum){
            $(".checkNum").last().hide().fadeIn(500);
        }
        checkNum=true;
    } else {
        document.getElementById("passNum").innerHTML = "<i class='checkNum fas fa-times-circle'></i>";
        if(checkNum){
            $(".checkNum").last().hide().fadeIn(500);
        }
        checkNum=false;
    }
    if (aInput.length >= 10) {
        document.getElementById("passChar").innerHTML = "<i class='checkLength fas fa-check-circle'></i>";
        if(!checkLength){
            $(".checkLength").last().hide().fadeIn(500);
        }
        checkLength=true;
    } else {
        document.getElementById("passChar").innerHTML = "<i class='checkLength fas fa-times-circle'></i>";
        if(checkLength){
            $(".checkLength").last().hide().fadeIn(500);
        }
        checkLength=false;
    }
    if (this.value.match(/^.*[A-ZÑ]+.*$/)) {
        document.getElementById("passMayus").innerHTML = "<i class='checkMayus fas fa-check-circle'></i>";
        if(!checkMayus){
            $(".checkMayus").last().hide().fadeIn(500);
        }
        checkMayus=true;
    } else {
        document.getElementById("passMayus").innerHTML = "<i class='checkMayus fas fa-times-circle'></i>";
        if(checkMayus){
            $(".checkMayus").last().hide().fadeIn(500);
        }
        checkMayus=false;
    }
    if (this.value.match(/^.*[a-zñ]+.*$/)) {
        document.getElementById("passMinus").innerHTML = "<i class='checkMinus fas fa-check-circle'></i>";
        if(!checkMinus){
            $(".checkMinus").last().hide().fadeIn(500);
        }
        checkMinus=true;
    } else {
        document.getElementById("passMinus").innerHTML = "<i class='checkMinus fas fa-times-circle'></i>";
        if(checkMinus){
            $(".checkMinus").last().hide().fadeIn(500);
        }
        checkMinus=false;
    }

    // Booleana de validación
    if (iCuentaNum >0 && aInput.length >= 10 && this.value.match(/^.*[A-ZÑ]+.*$/) &&
    this.value.match(/^.*[a-zñ]+.*$/) && !this.value.match(/^.*[\s]+.*$/)) {
        passOk=true;
    } else {
        passOk=false;
    }
    // Errores
    if(this.value.match(/^.*[\s]+.*$/)){
        document.getElementById("errores").innerHTML="<div class='error'>Tu contraseña no puede tener espacios</div>";
        this.classList.add('error');
        this.focus();
    }else{
        document.getElementById("errores").innerHTML="<br>";
        this.classList.remove('error');
    }
    if(Pass2Introducido){
        evaluarPass2();
    }
}

function evaluarPass2(){ 
    Pass2Introducido=true;
    if (passOk && document.getElementById("cContraseña2").value==document.getElementById("cContraseña").value) {
        pass2Ok=true;
        document.getElementById("cContraseñaBTN").disabled=false;
        if(document.getElementById("cContraseña2").classList.contains('error')){
            document.getElementById("cContraseña2").classList.remove('error');
        }
        document.getElementById("cContraseña2").classList.add('ok');
    } else {
        pass2Ok=false;
        document.getElementById("cContraseñaBTN").disabled=true;
        if(document.getElementById("cContraseña2").classList.contains('ok')){
            document.getElementById("cContraseña2").classList.remove('ok');
        }
        document.getElementById("cContraseña2").classList.add('error');
    }
}