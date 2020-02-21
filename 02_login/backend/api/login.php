<?php
require_once '../lib/myconnection.php';

header('Content-Type: application/json');
// Revisar el método utilizado en la petición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['userpasswd'])) {
        $username = $_POST['username'];
        $userpassword = $_POST['userpasswd'];

        // abrir una conexion a mysql
        $cnn = new MyConnection();
        // definir la consulta
        $sql = sprintf("select name,email,firstname,lastname from users where name='%s' and passwd='%s'", $username, $userpassword);
        // ejecutar la consulta
        $rst = $cnn->query($sql);
        // cerrar la conexion
        $cnn->close();
        // evaluar el resultado
        if (!$rst) {
            // TODO: manejar el error de la ejecución de la consulta
        } else {
            // TODO: manejar la respuesta de la base de datos
            // para preparar lo que se enviará al frontend
        }
    
        echo json_encode(['usuario' => $username, 'contrasenia' => $userpassword]);
    } else {
        echo json_encode(['error' => 'no se recibieron todos los valores']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'El método '.$_SERVER['REQUEST_METHOD'].' no esta permitido']);
}
