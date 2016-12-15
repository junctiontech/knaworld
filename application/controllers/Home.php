<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper ('url');
		$this->data['url'] = base_url ();
		$this->load->model('Registration_model');
		$this->load->library('parser');
		$this->load->library('session');
		$this->load->library('upload');
	}
	/*------------------------------- start function for home page -----------------------------------------*/
	function index()
	{
		 $this->parser->parse('header',$this->data); 
		 $this->load->view('index',$this->data);
	     $this->parser->parse('footer',$this->data);
	}
	
   /*------------------------------- start function for registration view -----------------------------------------*/
	 
	/*--------------------------------- End function for registration view --------------------------------------------*/
	
	/*-------------------------------star File attaech Uploading and mail function  -----------------------------------------*/
	function set_Registration()
	{ 
		//if(isset($_POST['submit']))
		//{
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$mobile=$this->input->post('mobile');
			$category =$this->input->post('category');
			$uploadfile = tempnam(sys_get_temp_dir(),sha1($_FILES['resume']['name']));
			move_uploaded_file($_FILES['resume']['tmp_name'],$uploadfile);
			$cv = $_FILES['resume']['name'];
			
	    if($name !="" && $mobile!="" && $email!="" && $category!="" && $cv!="")
		{
			 if(strlen($mobile)>=10)
			 {
					if($this->input->post('category')!=='Other')
					  {
						   $category = $this->input->post('category');
					  }else 
						{
						   $category =  $this->input->post('category_other');
						 }
						    
						    $data = array(
										'name'=>$this->input->post('name'),
										'mobile'=>$this->input->post('mobile'),
										'email'=>$this->input->post('email'),
								        'category'=>$category,
									    'cv'=>$cv,
										);
							$InsertInfo=$this->data['InsertInfo']= $this->Registration_model->POST('registration',$data);
				   if($InsertInfo)
				    {
							$subject=" Lexus Infra Tech LLP. :- $name Current CV upload";
							$message= " <html><body><h3>Hello: Lexus Infra Tech </h3><p><h4>New CV Attached In Your Email ID Please Check Candidate Information!!!!</h4> <br> User name: - <b> $name </b> <br> Email: - <b> $email </b> <br> Mobile: - <b> $mobile </b> <br>Category: -<b>$category</b> <br> </h3></p><br> </p></body></html>";
							$name='Lexus Infra Tech LLP.';
							date_default_timezone_set('Etc/UTC');
							require 'PHPMailer/PHPMailerAutoload.php';
							//Create a new PHPMailer instance
							$mail = new PHPMailer;
						    //Tell PHPMailer to use SMTP
							$mail->isSMTP();
							//Enable SMTP debugging
							// 0 = off (for production use)
							// 1 = client messages
							// 2 = client and server messages
							$mail->SMTPDebug = 0;
								
							//Ask for HTML-friendly debug output
							$mail->Debugoutput = 'html';
								
							//Set the hostname of the mail server
							$mail->Host = 'smtp.gmail.com';
								
							//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
							$mail->Port = 587;
								
							//Set the encryption system to use - ssl (deprecated) or tls
							$mail->SMTPSecure = 'tls';
								
							//Whether to use SMTP authentication
							$mail->SMTPAuth = true;
								
							//Username to use for SMTP authentication - use full email address for gmail
							$mail->Username = "dev4junction@gmail.com";
								
							//Password to use for SMTP authentication
							$mail->Password = 'initial1$'; 
								
							//Set who the message is to be sent from
							$mail->setFrom('info@lexusinfra.in',$name);
								
							//Set an alternative reply-to address
							$mail->addReplyTo('info@lexusinfra.in',$name);
								
							//Set who the message is to be sent to
							$mail->addAddress('info@lexusinfra.in');
								
							//Set the subject line
							$mail->Subject = $subject;
								
							//Read an HTML message body from an external file, convert referenced images to embedded,
							//convert HTML into a basic plain-text alternative body
							$mail->msgHTML($message);
								
							//Replace the plain text body with one created manually
							$mail->AltBody = 'This is a plain-text message body';
					
							$mail->WordWrap = 80; // set word wrap
							
							//Attach an image file
							$mail->addAttachment($uploadfile,$cv);
								
							//send the message, check for errors
								
				    if (!$mail->send())
						  {
						     print "We encountered an error sending your mail";
						  }
						  
						  $this->session->set_flashdata('message_success','<h3>Your CV Upload Successfully..</h3>');
						  redirect('Home/#templatemo-upload'); 
				        }  
	                  }
	                  else
	                  {
	                  	$this->session->set_flashdata('message_error','<h3>Please Enter Valid Mobile Number</h3>');
	                  	redirect('Home/#templatemo-upload');
	                  }
				}
					else
				       {
					     $this->session->set_flashdata('message_error','<h3>All Fields Are Mandatory</h3>');
					     redirect('Home/#templatemo-upload');
	                   }
		}
  }
    //$data['message'] = 'Data Inserted Successfully';
/*------------------------------- End function for registration Insert and update ----------------------------------------------*/
	