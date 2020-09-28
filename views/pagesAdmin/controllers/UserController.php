<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


class UserController
{
    static public function registerUser($data)
    {
            if (filter_var($data['Correo'], FILTER_VALIDATE_EMAIL )) {
                
                $table = 'usuario';
                $data['Contrasena'] = hash('sha256',$data['Contrasena']);
                $dates = [
                    'Nombre' => $data['Nombre'],
                    'Apellido' => $data['Apellido'],
                    'Correo' => $data['Correo'],
                    'Contrasena' => $data['Contrasena'],
                    'Direccion' => $data['Direccion'],
                    'FechaNacimiento' => $data['FechaNacimiento'],
                    'Genero' => $data['Genero'],
                    'Celular' => $data['Celular'],
                    'Estado' => 'Activo',
                    'IdRol' => 2,
                    'Id_barrio' => $data['Id_barrio']
                ];
                $answer = User::save($table,$dates);
                return $answer;
            }else {
                $answer = "error";
                return $answer;
            }
    }
     
    //Metodo para Enviar Correo
    static public function sendEmail($data){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0 ;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'leixer.mv@gmail.com';                     // SMTP username
            $mail->Password   = 'Unch@rt3d2009:)';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('leixer.mv@gmail.com');
            $mail->addAddress($data['Correo']);     // Add a recipient
        
    
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Usuario Registrado';
            $mail->Body    = 'Ahora ingresa a la pagina 
            <p>Recuerda que tu Usuario es :'.$data['Correo'].'</p> 
            <p> Recuerda que tu contraseña es:'.$data['Contrasena'].'</p>
            <a href="http://localhost/Canjea/"></a>';
            $mail->CharSet = 'UTF-8';
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }

     public function login($data){

            if(isset($data['Correo'])){
                $table = 'usuario';
                $item = 'Correo';
                $value = $data['Correo'];
                $answer = User::showUser($table,$item,$value);
                $data['Contrasena'] = hash('sha256',$data['Contrasena']);
                if ($answer['Correo']==$data['Correo'] && $answer['Contrasena']==$data['Contrasena'] && $answer['Estado'] == 'Activo' && $answer['IdRol']== 2) {
                    $_SESSION['user']=$answer; 
                    echo '<script>
                    if(window.history.replaceState){

                        window.history.replaceState(null,null,window.location.href);
                    }
                    window.location="index.php"
                    </script>';
                }elseif ($answer['Correo']==$data['Correo'] && $answer['Contrasena']==$data['Contrasena'] && $answer['Estado'] == 'Activo' &&  $answer['IdRol']== 1) {
                    $_SESSION['user']=$answer; 
                    echo '<script>
                    if(window.history.replaceState){

                        window.history.replaceState(null,null,window.location.href);
                    }
                    window.location="views/pagesAdmin/template.php"
                    </script>';              
                  } else{
                    echo "<div class='alert alert-danger'> Usuario o Contraseña incorrectos / cuenta inhabilitada </div>";
                }
            }
     }

    public function sendPassword($data){
        if(isset($data['Correo'])){
            $table = 'usuario';
            $item = 'Correo';
            $value = $data['Correo'];
            $answer = User::showUser($table,$item,$value);
            if($answer['Correo']== $data['Correo']){
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0 ;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'leixer.mv@gmail.com';                     // SMTP username
                    $mail->Password   = 'Unch@rt3d2009:)';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                    //Recipients
                    $mail->setFrom('leixer.mv@gmail.com');
                    $mail->addAddress($data['Correo']);     // Add a recipient
                
            
                
                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Recupera tu contraseña';
                    $mail->Body    = '
                    <html>
                    <body>
                    <h1>Enlace para cambiar contraseña</h1><br>
                    <a href="http://localhost/Canjea/index.php?pagesUser=editPassword&id='.$answer["Id_Usuario"].'">Recuperar contraseña</a>
                    </body>
                    </html>
                    ';
                    $mail->CharSet = 'UTF-8';
                    $mail->send();
                    echo '<div class="alert alert-success">
                    <h4 class="font-text-bold>¡Exitoso!</h4>
                    <p>Se ha enviado a tu correo '.$data['Correo'].'para recuperar contraseña.</p>
                    </div>';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }else {
                echo "<div class='alert alert-danger'> Correo no existe en la pagina </div>";
            }

        }
        
    }

    static public function findUser($item,$value){
        $table = 'usuario';
        $answer = User::showUser($table,$item,$value);
        return $answer;
    }

    static public function updatePassword(){
        if(isset($_POST['Contrasena'])){
            $_POST['Contrasena']=  hash('sha256',$_POST['Contrasena']);
            $table = 'usuario';
            $data = ['Id_Usuario'=>$_POST['Id_Usuario'],
                    'Contrasena'=>$_POST['Contrasena']
            ];
            $answer = User::editPassword($table,$data);
            return $answer;
        }

    }  

    static public function editUser(){
        if(isset($_POST['Id_Usuario'])){
             $table = 'usuario';
             $dates = [
                'Nombre' => $_POST['Nombre'],
                'Apellido' => $_POST['Apellido'],
                'Correo' => $_POST['Correo'],
                'Direccion' => $_POST['Direccion'],
                'FechaNacimiento' => $_POST['FechaNacimiento'],
                'Celular' => $_POST['Celular'],
                'Id_barrio' => $_POST['Id_barrio'],
                'Id_Usuario' => $_POST['Id_Usuario']
            ];
            $answer = User::update($table,$dates);
            return $answer;

        }
    }

      public function updateStatusActive(){
        if (isset($_POST['Id_Usuario'])) {
             $table = 'usuario';
             $value =$_POST['Id_Usuario']; 
             $answer = User::statusActive($table,$value);
             if ($answer == "ok") {
                echo '<script> setTimeout(function(){
                    window.location = "template.php?pagesAdmin=listUser";
                }, 1000 ) </script>';
        }         
    }
}

    public function updateStatusInactive(){
        if (isset($_POST['Id_Usuario1'])) {
             $table = 'usuario';
             $value = $_POST['Id_Usuario1'];
             $answer = User::statusInactive($table,$value);
            if ($answer == "ok") {
                echo '<script> setTimeout(function(){
                    window.location = "template.php?pagesAdmin=listUser";
                }, 1000 ) </script>';
            }
        }

    } 
       
    
   /*  static public function sendInactivateEmail($dates){
        $table = 'usuario';
        $item = 'Id_Usuario';
        $value = $dates['Id_Usuario'];
        $answer = User::showUser($table,$item,$value);
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0 ;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'leixer.mv@gmail.com';                     // SMTP username
            $mail->Password   = 'Unch@rt3d2009:)';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('leixer.mv@gmail.com');
            $mail->addAddress($answer['Correo']);     // Add a recipient
        
    
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Usuario Inactivado';
            $mail->Body    = '<p> El Usuario:'.$answer['Nombre'].' esta inactivado por falta de credibilidad de identidad </p>';
            $mail->CharSet = 'UTF-8';
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } */

}