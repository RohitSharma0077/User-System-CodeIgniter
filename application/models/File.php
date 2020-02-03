    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class File extends CI_Model{
        function __construct() {
            $this->tableName = 'files';
        }

    /*
    * Fetch files data from the database
    * @param id returns a single record if specified, otherwise all records
    */
    public function getRows($u_id){

   
        $this->db->select('file_name');
        $this->db->from('files');
        $this->db->where('user_id', $u_id); 
        $query = $this->db->get();

         // $query= $this->db->get("files");
         return $query->result_array();


    }

    /*
    * Insert file data into the database
    * @param array the data for inserting into the table
    */
    public function insert($data = array()){


        $insert = $this->db->insert_batch('files',$data);
        return $insert?true:false;
    }

}