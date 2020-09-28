<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class OfferController
{
    static public function registerOffer($data){
        $table='oferta';
        $data = [
            'Id_Usuario'=>$data['Id_Usuario'],
            'Correo'=>$data['Correo'],
            'Mensaje'=>$data['Mensaje'],
            'Fecha_oferta'=>$data['Fecha_oferta'],
            'Estado'=> 'En proceso',
            'Id_articulo' => $data['Id_articulo']
        ]; 
         $answer=Offer::getOffer($table,$data);
         return $answer; 
    }
    static public function sendOffer($data,$articles,$date,$email,$name){

           $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0 ;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'canjea.co@gmail.com';                     // SMTP username
            $mail->Password   = 'Int3rc@mb1ar';                                 // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('canjea.co@gmail.com');
            $mail->addAddress($data['Correo']);     // Add a recipient
        
    
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Oferta de Intercambio';
            $mail->Body    = '<html> 
            <body>
            <header>
                <h1>Propuesta de Intercambio por parte de:'.$email.' </h1>
                <h1>Mensaje Propuesta de Intercambio por parte de:'.$data['Mensaje'].' </h1>
            </header>
             <main>
               <section> 
                    <p> El usuario '.$name.'Esta interasado en intercambiar el siguiente articulo: </p>
                    <div> 
                       <p> Nombre Anuncio :'.$articles['Nombre'].'</p> 
                    </div>
                    <div> 
                       <p> Imagen anuncio : <img src="/Canjea/assets/img/Articles/'.$articles['img'].'" alt="" ></p> 
                    </div>
                    <div> 
                       <p> Descripcion anuncio :'.$articles['Descripcion'].'></p> 
                    </div>
                    <div>
                        <label>¿Aceptas?</label>
                        <a href ="http://localhost/Canjea/index.php?pagesCitation=registerCitation">SI </a>
                        <p>Si no aceptas el intercambio, puedes enviar un correo al: '.$data['Correo'].' y puedes explicar tus razones.</p>
                    </div>
               </section>
             </main>
            </body>
            </html>';
            //$mail->AddEmbeddedImage(dirname(__FILE__).'/Canjea/assets/img/Articles/Disco duro.jpg','article');
            $mail->CharSet = 'UTF-8';
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
   /*  static public function sendNotOffer($email,$data)
    {
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
            $mail->Subject = 'No se pudo realizar el intercambio';
            $mail->Body    = '<html> 
            <body>
            <header>
                <h1>Respuesta a  la propuesta de Intercambio por parte de:'.$data.' </h1>
            </header>
             <main>
               <section> 
                  <p> No se pudo realizar el intercambio </P>
                    <h2> Gracias por visitar la pagina </p>
               
               </section>
             </main>
            </body>
            </html>';
            $mail->CharSet = 'UTF-8';
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } */
    

    static public function lastIdOffer($table){
        $table='oferta';
        $answer = Offer::showLastIdOffer($table);
        return $answer;

    }
    


}
