<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_Files extends CI_Controller {
	function  __construct() {
		parent::__construct();
// Load session library
		$this->load->library('session');

// Load file model
		$this->load->model('file');
		$this->load->helper('url');
		$this->load->database();
			$this->load->model('admin_model','model_obj');
	}


	function index(){

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


			}
			else
			{
				echo "Fail";
				echo $this->upload->display_errors();
			}


		}

     // Get files data from the database
      // $data['files'] = $this->file->getRows($u_id);


        // Pass the files data to view
         // $this->load->view('user_record', $data);
         // redirect(base_url('admin_ctrl/user_imageviewed'));
	}

	

	function img_view(){

		$u_id=$this->input->post('id');
		$data['files'] = $this->file->getRows($u_id);
		$this->load->view('test_page2',$data);

		// $a['key']= $this->model_obj->model_select();
		 // $data1=$data['files'];
		 // $data_zindex['key']=$data1[0];
		 // $this->session->set_flashdata('zero_index', $data_zindex);
		// $this->load->view('user_record',$data_zindex,$a);
		
	}

}