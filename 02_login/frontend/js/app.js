/**
 * Javascript para conectar a la API
 * 
 * Se requiere hacer peticiones AJAX a la API
 * http://localhost:8001/login.php
 * y obtendrá como resultado un JSON.
 * 
 * AJAX: Asyncronic Javascript And XML
 */

function validarUsuario(u, c) {
    $.post('http://localhost:8001/login.php',
        { username: u, userpasswd: c },
        function (d) {
            if (typeof d.data.error == 'undefined') {
                alert('Hola ' + d.data.firstname);
            } else {
                alert('Error: ' + d.data.error);
            }
        }), 'json';
}

function validarFormulario(u, c) {
    if (u == '' || c == '') {
        return false;
    } else {
        return true;
    }
}

$(document).ready(function () {
    $('#btnLogin').click(function (e) {
        e.preventDefault();
        let usuario = $('#username').val();
        let contrasena = $('#userpasswd').val();
        if (!validarFormulario(usuario, contrasena)) {
            alert('Debes ingresar nombre de usuario y contraseña');
        } else {
            validarUsuario(usuario, contrasena);
        }
    });
});