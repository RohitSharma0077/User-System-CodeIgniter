
<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

defined('BASEPATH') OR exit('No direct script access allowed');

class admin_ctrl extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->helper('url');
		$this->load->database();
		$this->load->model('file');

		$this->load->model('admin_model','model_obj');

	}

	public function register()
	{

		$this->load->view('register');
		$this->load->view('footer');


	}


	public function test_fun_insert()
	{


		// fetch from form	

		$un=$this->input->post('uname');
		$ps=$this->input->post('psw');
		$em=$this->input->post('email');



		// assign to db fields
		$data = array(
			'email' => $em,
			'username' => $un,
			'password' => $ps

		);

		// call to model and made query there
		// $this->load->model('admin_model','model_obj');    // load at contructor globally
		$this->model_obj->model_insert($data);

		$this->session->set_flashdata('registration', 'Registered Successfully');
		redirect(base_url('admin_ctrl/register'));
		// echo "<script> alert('Registered Successfully !!!') </script>";
		// $this->load->view('register');
		$this->load->view('footer');

	}


	public function test_fun_update()
	{

		$this->load->view('header');

		// fetch from form
		$id=$this->input->post('id');
		$un=$this->input->post('uname');
		$ps=$this->input->post('psw');


		// assign to db fields
		$data_update = array(
			'username' => $un,
			'password' => $ps

		);

		$this->model_obj->model_update($data_update,array('id' => $id));



		// fetch from model and send to view
		$a['key']= $this->model_obj->model_select();
		$this->load->view('user_record',$a);	
		redirect(base_url('admin_ctrl/user'));

	}

	public function test_fun_delete()
	{
		$this->load->view('header');

		$id=$this->input->post('id');

		if(	$this->model_obj->model_delete($id)){
			redirect('admin_ctrl/user');
		}

		// redirect(base_url('admin_ctrl/user'));

	}

	public function home()
	{
		$this->load->view('header');
		$this->load->view('sidebar');

		  // $this->load->helper('view_helper');
		  // echo view()	;

		// $a['key']= $this->model_obj->model_select();
		// $this->load->view('test_page1',$a);	

		$this->load->view('footer');
		
	}


	public function test_fun_page2()
	{
		
		$this->load->view('test_page2');
		
	}

	public function test_fun_sidebar()
	{
		
		$this->load->view('sidebar');
		
	}

	public function test_fun_page3()
	{
		
		$this->load->view('test_page3');
		
	}

	public function logout()
	{
		
		session_start();
		unset($_SESSION['admin']);
		$this->session->set_flashdata('logout_success', 'Logged out Succcessfully !!!');
		redirect(base_url('admin_ctrl/register'));
		// header('location:'.base_url().'admin_ctrl/register');		
	}


	public function loginform()
	{  
		
		$this->load->view('login');
		$this->load->view('footer');

	}

	public function test_fun_loginchk()
	{
		
		$em=$this->input->post('email');
		$ps=$this->input->post('psw');



			// set session

		session_start();
		$_SESSION['admin']=$em;
		
		$this->model_obj->model_logging($em,$ps);
		$this->load->view('login');	
		$this->load->view('footer');

	}




	public function mailconfirm()
	{    
		
		$this->load->view('forget_email');
		$this->load->view('footer');


		
	}

	public function test_fun_forgetmail_chk()
	{   

		$em=$this->input->post('email');
		$url =	$this->model_obj->model_mailconfirming($em);

		if($url)
		{

			$url_a=  "<a href='$url'>$url</a>";

			require 'vendor/autoload.php';

			$mail = new PHPMailer(true);

			try {
    //Server settings
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
				$mail->isSMTP();                                           
				$mail->Host       = 'smtp.sendgrid.net';                    
				$mail->SMTPAuth   = true;                                 
				$mail->Username   = 'apikey';                     
				$mail->Password   = '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';                     
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       
				$mail->Port       = 587;                                 
    //Recipients
				$mail->setFrom('awork0077@gmail.com', 'Mailer');
				$mail->addAddress($em, 'User');     
    // Content
				$mail->isHTML(true);                               
				$mail->Subject = 'Here is the subject';
				$mail->Body    = 'Click here to reset Password:<br>'.$url_a;
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}

			$this->session->set_flashdata('Confirm_Email_Success', 'Please Check your confirmed Email to reset your password');
			redirect(base_url('admin_ctrl/loginform'));

			redirect(site_url().'admin_ctrl/loginform','refresh');
		}
		else{
			$this->session->set_flashdata('Confirm_Email', 'Invalid EMail !!!');
			redirect(base_url('admin_ctrl/loginform'));

		}
		
	// header('location:'.base_url().'admin_ctrl/mailconfirm');	

	}

// public function resetPassword(){

// }

	public function newPassword(){
		$this->load->view('resetPassword');
	}

	public function test_fun_reseting(){


		// $token=$this->input->post('token');
		$ps=$this->input->post('psw');


		// assign to db fields
		$pass_update = array(
			'password' => $ps

		);

		$this->model_obj->model_passupdate($pass_update);
		echo "<script> alert('Password Changed Successfully !!!') </script>";
		$this->load->view('login');


	}

	
	public function user(){

		$this->load->view('header');

		// $u_id=$this->input->post('id');
		$a['key']= $this->model_obj->model_select();
		
		$this->load->view('user_record',$a);

		// $this->load->view('footer');
		// $this->load->view('test_page1',$a);

	}
	public function user_imageviewed(){

		$this->load->view('header');


		$a['key']= $this->model_obj->model_select();
		$this->load->view('user_record',$a);

	}
	
	public function activeUser(){



		$id = $this->input->post('id');
		$status = $this->input->post('status');
		// echo "<script> alert('$id') </script>";


		$this->model_obj->toggle_status($status,$id);


		if ($status == "active") {

			$this->session->set_flashdata('active', 'User Having Id: "'.$id.'" is Inactive'); 

		}

		if ($status == "deactive") {
			$this->session->set_flashdata('deactive', 'User Having Id: "'.$id.'" is Active');
		} 

	}

	public function file_upload(){

		$u_id=$this->input->post('id');
		
		$data = array();


// If file upload form submitted
		if($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])){

			$filesCount = count($_FILES['files']['name']);

			for($i = 0; $i < $filesCount; $i++){
				$_FILES['file']['name']     = $_FILES['files']['name'][$i];
				$_FILES['file']['type']     = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error']     = $_FILES['files']['error'][$i];
				$_FILES['file']['size']     = $_FILES['files']['size'][$i];

// File upload configuration
				$uploadPath = 'uploads/files/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|jpeg|png|gif';

// Load and initialize upload library
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

// Upload file to server
				if($this->upload->do_upload('file')){
// Uploaded file data
					$fileData = $this->upload->data();
					$uploadData[$i]['file_name'] = $uploadPath  . $fileData['file_name'];
					$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
					$uploadData[$i]['user_id'] = $u_id;
					echo "successfully";
					
				}

			}

			if(!empty($uploadData)){

// Insert files data into the database

				$insert = $this->file->insert($uploadData);
				redirect(base_url('admin_ctrl/user'));

			}
			else
			{
				echo "Fail";
				echo $this->upload->display_errors();
			}


		}
	}


}


