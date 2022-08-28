<?php 

class UsersModel extends CI_Model {

    function __construct()
    {
        $this->load->database();
    }

    public function setUsers(array $datos){

        return $this->db->insert('users',$datos); 

    }

    public function getUser(array $datos){

        $pass = $this->db->select('*')->from('users')->where('email', $datos['email'])->get()->result();

        foreach ($pass as $key => $pass2) {
            $pass_encry = $pass2->password;
        }
        
        if (password_verify($datos['password'], $pass_encry)) {
            
            $json = array(
                "error" => false,
                "detalle" => "Ha ingresado al sistema"
           );

           return json_encode($json, true);
            
        }else{
            
            $json = array('error' => true, 'Usuario y contrase;a no coinciden, intentelo de nuevo o restablesca su contrase;a');
            return json_encode($json, true);
        } 

    }

    public function user_model(array $datos){

        $id = $this->db->select('uid')->from('user_activities')->where('uid', $datos['uid'])->get()->result();
        
        if (!empty($id)) {

           return $id;
            
        }else{
            return false;
        }

    }

    public function user_activity_model($fiel, $value_id){

        $chat = $this->db->select('*')->from('user_activities')->where($fiel, $value_id)->get()->result();
        
        if (!empty($chat)) {

           return $chat;
            
        }else{
            return false;
        }

    }

    public function get_conversations($response){

      if (array_key_exists("uid", $response)) {
       
            $user_exists = self::user_model($response);
            $res         = array();

            if ($user_exists) {
  
                $all_convos = self::user_activity_model("uid", $user_exists[0]->uid);
                if (sizeof($all_convos) > 0) {
                    $i = 0;
                    foreach ($all_convos as $row) {
                        $res[$i]["datetime"]       = $row->datetime;
                        $res[$i]["conversation"][] = array(
                            "id"          => $row->id,
                            "messageType" => $row->message_from,
                            "value"       => $row->message_text,
                            "timestamp"   => intval($row->timestamp),
                        );
                        $get_datetime = $row->timestamp; 
                        $i++;
                    }

                } 

            } else {
            }  
        } else {
        }

        return json_encode($res, JSON_UNESCAPED_UNICODE);

    }

}
