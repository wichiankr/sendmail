<?php
ob_start(); 
@ini_set('display_errors'     , 'off');
@ini_set('default_charset'    , 'utf-8');
include('phpmailer/class.phpmailer.php');

	if (isset($_POST)){
			
            
            $fromname = $_POST['name'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
						
			$mail_subject =  'POLA - Business ติดต่อเรา';
			
			$mail_content  =<<<EOD
			Firstname : {$fromname} <br/>
			Lastname : {$lastname} <br/>
			Email : {$lastname} <br/>
EOD;

			$mail_from = $inp_email;
			
			$mail_to      = 'wichian.kraubut@gmail.com';		
			
			$mail = new PHPMailer();			
			$mail->SetFrom('wichian.kr@pola.co.th');
			$mail->IsSMTP(); 
			$mail->Encoding = "quoted-printable";
			$mail->CharSet = "utf-8";			
			$mail->SMTPSecure = '';
			$mail->Host = 'smtpm.csloxinfo.com'; 
			$mail->Port = '587'; 
			$mail->SMTPAuth = true; 
			$mail->Username = 'wichian.kr@pola.co.th'; 
			$mail->Password = 'p2012011'; 
			
			
			
			$mail->AddAddress($mail_to);
						
			$mail->Subject = $mail_subject;
			
			$mail->MsgHTML('<html><body>'.$mail_content .'</body></html>');
			
			if ($mail->Send()){	
                echo"success";
			}else{
                echo"fail";
            }
			
			
	}
?>