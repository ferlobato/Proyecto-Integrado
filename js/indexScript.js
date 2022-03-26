// Autor: Fernando Lobato

// Booleanas para comprobar la validez de todos los campos del formulario
var nombreOk=false, emailOk=false, passOk=false, pass2Ok=false, Pass2Introducido=false;
var checkNum=false, checkLength=false, checkMayus=false, checkMinus=false;

window.onload=inicio;

function inicio(){
    // Configuración inicial y eventos:
    //acceso();
    document.getElementById("registro").disabled=true;
    document.getElementById("rNombre").addEventListener('blur',validarTextoNom);
    document.getElementById("rNombre").addEventListener('input',validarTextoNom);
    document.getElementById("rMail").addEventListener('blur',validarMail);
    document.getElementById("rContraseña").addEventListener('input',evaluarPass);
    document.getElementById("rContraseña2").addEventListener('focus',evaluarPass2);
    document.getElementById("rContraseña2").addEventListener('input',evaluarPass2); 
    //document.getElementById("fRegistro").addEventListener('submit',registro);
    
}

/***************************************************
                Funciones formulario
***************************************************/
function validarTextoNom(){
    if(this.value==''){
        document.getElementById("errores").innerHTML="<div class='error'>No dejes el nick vacío</div>";
        nombreOk=false;
        this.classList.add('error');
        this.focus();
    }else if(this.value.match(/^.*[\s]+.*$/)){
        document.getElementById("errores").innerHTML="<div class='error'>Tu nick no puede contener espacios</div>";
        nombreOk=false;
        this.classList.add('error');
        this.focus();
    }else if(this.value.match(/^[\d]+$/)){
        document.getElementById("errores").innerHTML="<div class='error'>Tu nick no puede contener sólo números</div>";
        nombreOk=false;
        this.classList.add('error');
        this.focus();
    }else{
        document.getElementById("errores").innerHTML="<br>";
        this.classList.remove('error');
        nombreOk=true;
    }
    evaluarTodo();
}

function validarMail(){
    if(this.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){ 
        /* (Cualquier sucesión de caracteres) + ["-" o "." 0 o 1 vez + (Cualquier sucesión de caracteres)] 0 o n veces +
        carácter "@" + (Cualquier sucesión de caracteres) + ["-" o "." 0 o 1 vez + (Cualquier sucesión de caracteres)] 0 o n veces +       
        carácter "." + 3 carácteres*/
        document.getElementById("errores").innerHTML="<br>";
        this.classList.remove('error');
        emailOk=true;
    }else{
        document.getElementById("errores").innerHTML="<div class='error'>Dirección de correo inválida</div>";
        this.classList.add('error');
        this.focus();
        emailOk=false;
    }
    evaluarTodo();
}

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
    evaluarTodo();
}

function evaluarPass2(){ 
    Pass2Introducido=true;
    if (document.getElementById("rContraseña2").value==document.getElementById("rContraseña").value) {
        pass2Ok=true;
        if(document.getElementById("rContraseña2").classList.contains('error')){
            document.getElementById("rContraseña2").classList.remove('error');
        }
        document.getElementById("rContraseña2").classList.add('ok');
    } else {
        pass2Ok=false;
        if(document.getElementById("rContraseña2").classList.contains('ok')){
            document.getElementById("rContraseña2").classList.remove('ok');
        }
        document.getElementById("rContraseña2").classList.add('error');
    }
    evaluarTodo();
}

function evaluarTodo(){ // Comprobando la validez de todos los campos
    if(nombreOk && emailOk && passOk && pass2Ok){
            document.getElementById("registro").disabled=false;
        }else{
            document.getElementById("registro").disabled=true;
    }
}




/***************************************************
            Funciones registro y acceso de usuarios
Los usuarios se crearán de forma artificial con LocalStorage
***************************************************/
/*function registro(){
    var nuevoUsuario = { 
        'nombre' : document.getElementById("rNombre").value, 
        'mail' : document.getElementById("rMail").value, 
        'pass': document.getElementById("rContraseña").value
    };
    localStorage.setItem('baseDatos', JSON.stringify(nuevoUsuario));
}

function acceso(){
    var usuario = JSON.parse(localStorage.getItem('baseDatos'));
    var form=document.getElementById("fInicio");
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }else if(usuario===null || document.getElementById("usuarioMail").value!=usuario.mail || document.getElementById("contraseña").value!=usuario.pass){
            document.getElementById("errores2").innerHTML="<div class='error'>Usuario/contraseña incorrectos</div>";
            event.preventDefault()
            event.stopPropagation()
        }
        form.classList.add('was-validated')
    }, false)
}*/



    


