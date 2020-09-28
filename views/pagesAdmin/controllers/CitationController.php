<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 
 

class CitationController
{
    static public function registerCitation($data){
        {
            $table = 'citacion';
            $dates = [
             'Id_oferta'=> $data['Id_oferta'],
             'Lugar'=> $data['Lugar'],
             'Fecha_citacion'=> $data['Fecha_citacion'],
             'Hora'=> $data['Hora'],
             'Estado_citacion'=> 'En proceso'
            ];
            $answer = Citation::saveCitation($table,$dates);
            return $answer;
        }

    }
    


      //Metodo para Enviar Correo
      static public function sendCitation($data,$email,$user,$name){
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
            $mail->addAddress($email);     // Add a recipient
        
    
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Citacion de Intercambio';
            $mail->Body    = 'La citacion fue planeada por:'.$user.','.$name.'
            <section> 
                <div> 
                    Lugar de la citacion :'.$data['Lugar'].' 
                </div>
                <div> 
                    Fecha Citacion :'.$data['Fecha_citacion'].' 
                </div>
                <div> 
                    Hora :'.$data['Hora'].' 
                </div>
            </section> ';
            $mail->CharSet = 'UTF-8';
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


    static public function listCitation(){
       $table = 'citacion';
       $answer = citation::showCitation($table);
       return $answer;

    }

    static public function listCitationFive(){
        $table = 'citacion';
        $answer = citation::showCitationFive($table);
        return $answer;
 
     }

}