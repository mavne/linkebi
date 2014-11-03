<?php
class Md_sendemail extends CI_Model
{

	public function sendit($mailtype,$from,$name,$to,$subject,$text,$cc = false, $bcc = false)
	{
		//send email
		$this->load->library('email'); 
		
		$config['protocol']    = 'mail';
        $config['mail_host']    = 'mail.404.ge';
        $config['mail_port']    = 26;
        $config['mail_timeout'] = 7;
        $config['mail_user']    = 'book@404.ge';
        $config['mail_pass']    = 'gio123';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = $mailtype; //text or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
        $config['useragent'] = 'l33t Mailer 1.0';
        
        $this->email->initialize($config);

        $this->email->from($from, $name);
        $this->email->to($to); 

        $this->email->subject($subject);
        $this->email->message($text);  

        $this->email->send();

       // echo $this->email->print_debugger();

	}

}
?>