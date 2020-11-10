<?php 
session_start();
if (!empty(htmlspecialchars($_POST['email']))) {
    

    // Pulizia dati input
    require 'backend/SicurezzaForm/SicurezzaForm.php';
    $email=test_input_email_R($_POST['email']);
    
    
    if ($email[1]==true) {
        
        require 'DataBase/checkReg.php';
        $present=check_reg('Anagrafica', 'Email', $email[0]);
        if ($present[0]==true) {
            
        
        $destinatario=$email[0];
        
        $mittente='mindfulquestionnaire@altervista.org';
        
        $oggetto='Corso MBSR - Cambia Password';
        
        
        $corpo='<div style="width: inherit;background-color: #f5f5dc;padding: 20px; text-align: center;">
                <h3 style="text-align: center;">Corso MBSR</h3>
                <p>Gentile corsista,<br>ti inviamo questa email perchè hai richeitso di cambiare la password.<br>Clicca sul pulsante in basso per procedere</p>
                
                    
                    <a href="https://mindfulquestionnaire.altervista.org/MBSR/changePSWPage.php" style="  cursor: pointer;font-size: .8rem; border-radius: 10rem; padding: .75rem 1rem; display: block;width: 100%;color: #fff; background-color: #4e73df; border-color: #4e73df;text-align: center; vertical-align: middle;user-select: none;border: 1px solid transparent;line-height: 1.5;box-sizing: border-box;">Reset Password</a>
                
            </div>';
        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        
        // Additional headers
        $headers[] = 'To:'.$destinatario;
        $headers[] = 'From: MindfulSicilia <'.$mittente.'>';
        $headers[] = 'Cc: ';
        $headers[] = 'Bcc: ';
        
       // $corpo='Gentile corsista,<br>ti inviamo questa email perche hai richiesto di cambiare la password. Clicca sul link in basso per procedere. Si aprirà una pagina dove potrài inserire la nuova password!<br> https://mindfulquestionnaire.altervista.org/MBSR/changePSWPage.php<br> Cordiali saluti<br> lo staff<br>';
        //'Gentile corsista,<br>ti inviamo questa email perche hai richeitso di cambiare la password.Clicca sul link in basso per procedere. Si aprirà una pagina dove potrà inserire la nuova password!<br> https://mindfulquestionnaire.altervista.org/MBSR/changePSWPage.php<br> Cordiali saluti<br> lo staff<br> 
        mail($destinatario, $oggetto, $corpo,  implode("\r\n", $headers));
        $mailErr=' <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Ti abbiamo inviato una e-email all\'indirizzo '.$email[0].' con il link per cambiare la password
                   </div>';
        //francesco.corsaro.psi@gmail.com'
        
        } else {
            $mailErr= $present[1]; //Mostra un messaggio di errore
        }
        
    } elseif ( $email[1]== false) {
        
        $mailErr=$email[0];
    }
    
}

include 'startbootstrap-sb-admin-2-gh-pages/forgot-password.php';

?>