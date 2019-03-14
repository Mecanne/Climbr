// Script para ocultar y mostrar la contraseña al editarla
const btnMostrar = document.getElementById('btn-mostrar');
const inputContrasena = document.getElementById('input-contrasena');
btnMostrar.addEventListener('click', function (e) {
    if (btnMostrar.textContent != ' Ocultar contraseña') {
        btnMostrar.innerHTML = '<span class="glyphicon glyphicon-eye-close" id="span-ojo"></span> Ocultar contraseña';
        inputContrasena.setAttribute("type","text");
    } else {
        btnMostrar.innerHTML = '<span class="glyphicon glyphicon-eye-open" id="span-ojo"></span> Mostrar contraseña';
        inputContrasena.setAttribute("type","password");
    }
});