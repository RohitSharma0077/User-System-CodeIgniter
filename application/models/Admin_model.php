    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	function __construct() {
        $this->tableName = 'files';
    }
    

public function model_insert($data)
{
$this->load->database();

$this->db->insert('user', $data);   // $data from ctrl and insert to db 'user'

}	


public function model_update($data_update,$id)
{
$this->load->database();

$this->db->update('user', $data_update,$id);   // $data from ctrl and update to db 'user'

}	


public function model_delete($id)
{
$this->load->database();

$query = $this->db->set('current_status', '0')
->where('id',$id)
->update('user');

if($query)
return true;
else
return false;

}	



public function model_select()
{
$this->load->database();

$query= $this->db->get("user");    // Select * From user


// $this->db->select('user.id,user.email,user.username,user.password,user.current_status,user.status,files.file_name');
// $this->db->from('user');
// $this->db->join('files', 'user.id = files.user_id');
// $query = $this->db->get();


$list = $query->result_array();

foreach($list as $key => $user_list){
                        $user_id = $user_list['id'];
                        $user_images = $this->db->select('file_name')
                        				->where('user_id',$user_id)
                                          ->get('files');
                    $user_images = $user_images->result_array();
                    $list[$key]['files'] = $user_images;
                }

return $list;

}


public function model_logging($em,$ps)
{
$this->load->database();

$this->db->select('password');
$this->db->from('user');
$this->db->where('email', $em); 
$query = $this->db->get();


$result=$query->result_array();

foreach ($result as $row) 
{


$returnpass= $row['password'] ;

}
if ($returnpass==$ps) 

{

$this->session->set_flashdata('Login_Success', 'Login Successfully');
redirect(base_url('admin_ctrl/home'));
// echo "pass";
// header('location:'.base_url(). 'admin_ctrl/home');
}


else{

$this->session->set_flashdata('Invalid_Login_Details', 'Invalid Email or Password');
redirect(base_url('admin_ctrl/loginform'));

// echo "<script>alert('invalid input')</script>";
// redirect(site_url().'admin_ctrl/loginform','refresh');

}



}

public function model_mailconfirming($em)
{
$this->load->database();

$query = $this->db->select('id')
->where('email',$em)
->get('user');

if($query->num_rows()){
$user_id = $query->row()->id;


$token = random_bytes(32);

$expires = date("U")+1800;

$hashedToken = password_hash($token,PASSWORD_DEFAULT);


$url = $this->DB_Reset($em,$expires,$hashedToken,$user_id );

// echo "<br>".$url;

return $url;
}



}

public function DB_Reset($user_email,$expires,$hashedToken,$user_id){

$this->load->database();

$this->db->where('confirmemail',$user_email);
if(!$this->db->delete('passreset')){
echo "Error Deleting pwdReset table";
exit();
}

//Insert  in the pwd database table

$data = array(
'confirmemail' => $user_email,
'token' => $hashedToken,
'expiry' => $expires,
'userid' => $user_id,
);

// echo "<pre>"; print_r($data);

if($this->db->insert('passreset', $data)){

$url = base_url('admin_ctrl/newPassword')."?token=".$data['token'];
return $url;

}

}


public function model_passupdate($pass_update)
{
$this->load->database();

// $query= $this->db->get("user");    // Select * From user

// // convert query obj to array
// $query->result_array();
// return $query->result_array();


// $this->db->update('user', $data_update,$id);   // $data from ctrl and update to db 'user'


$this->db->select('email');
$this->db->from('user');
$this->db->join('passreset', 'user.email = passreset.confirmemail');
$query = $this->db->get();
$return= $query->result_array();

foreach ($return as $row) {
$returnmail =$row['email'];
}


$this->db->update('user', $pass_update,  array('email' => $returnmail));  

}	


public function toggle_status($status,$id)
{
$this->load->database();

if ($status == "active") {

$query = $this->db->set('status', 'deactive')
->where('id',$id)
->update('user');


if($query)
return array($status);
else
return false;
}
else{

$query = $this->db->set('status', 'active')
->where('id',$id)
->update('user');

if($query)
//return $status;
return array($status);

else
return false;

}

}


}

