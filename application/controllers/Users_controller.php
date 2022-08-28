<?php 

class Users_controller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('UsersModel');
    }

    public function index(){

           $json = array(
                "detalle" => "no encontrado"
           );

           echo json_encode($json, true);
    }

    // login de usuario

    public function login(){

        $this->form_validation->set_rules(
            'email', 
            'Email',
            'required|valid_email',
            array(
                'required' => 'El %s es obligatorio para acceder', 
                'valid_email'=> 'El %s con el que esta intentando ingresar no es valido',
            )
        );

        $this->form_validation->set_rules(
            'password', 
            'Password',
            'required',
            array(
                'required' => 'El %s es obligatorio para poder ingresar'
            )
        );

        if($this->form_validation->run() == FALSE){
            echo json_encode(array('error' => true, 'mensaje'=>validation_errors()));
            exit();

        }else{
            
            $datos = array('email'=>$this->input->post('email'), 
                           'password'=>$this->input->post('password'));

            echo $this->UsersModel->getUser($datos);
                           
        }

    }

    // crear registro

    public function create(){
        
   
        if($this->input->post()){
    
            $this->form_validation->set_rules(
                'email', 
                'Email',
                'required|valid_email|is_unique[users.email]',
                array(
                    'required' => 'El %s es obligatorio', 
                    'valid_email'=> 'El %s no es valido', 
                    'is_unique'=> 'El %s ya existe en la base de datos'
                )
            );

            $this->form_validation->set_rules(
                'password', 
                'Password',
                'required|min_length[5]|max_length[16]',
                array(
                    'required' => 'El %s es obligatorio', 
                    'min_length' => 'El tama;o minimo del %s son 5 caracteres', 
                    'max_length' => 'El tama;o maximo del %s son 16 caracteres'
                )
            );

            $this->form_validation->set_rules(
                'rep_password', 
                'Repetir Password',
                'required|min_length[5]|max_length[16]',
                array(
                    'required' => 'El %s es obligatorio', 
                    'min_length' => 'El tama;o minimo del %s son 5 caracteres', 
                    'max_length' => 'El tama;o maximo del %s son 16 caracteres'
                )
            );

            $this->form_validation->set_rules(
                'full_name', 
                'Nombre Completo',
                'required|min_length[5]|max_length[100]',
                array(
                    'required' => 'El %s es obligatorio', 
                    'min_length' => 'El tama;o minimo del %s son 5 caracteres', 
                    'max_length' => 'El tama;o maximo del %s son 100 caracteres'
                )
            );

            $this->form_validation->set_rules(
                'username', 
                'Nombre de usuario',
                'required|min_length[5]|max_length[30]',
                array(
                    'required' => 'El %s es obligatorio', 
                    'min_length' => 'El tama;o minimo del %s son 5 caracteres', 
                    'max_length' => 'El tama;o maximo del %s son 30 caracteres'
                )
            );

            if($this->form_validation->run() == FALSE){
                echo json_encode(array('error' => true, 'mensaje'=>validation_errors()));
                exit();

            }else{

                if ($this->input->post('password') != $this->input->post('rep_password')) {

                    echo json_encode(array('error' => true, 'mensaje'=>"Las contrase;as no coinciden"));
                    exit();
                   
                }else{
                
                    $datos = array('email'=>$this->input->post('email'), 
                                'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT), 
                                'username'=>$this->input->post('username'),
                                'full_name'=>$this->input->post('full_name'),
                                'stat'=>$this->input->post('stat'),
                                'type_user'=>$this->input->post('type_user'));

                    echo $this->UsersModel->setUsers($datos);

                }
                               
            }

        }

        /* hice esta funciones de validacion antes de saber que codelgniter tenia validaciones propias

        public function regexPass($pass){

            validacion de la contrase;a

            Minimo 8 caracteres
            Maximo 15
            Al menos una letra mayúscula
            Al menos una letra minucula
            Al menos un dígito
            No espacios en blanco
            Al menos 1 caracter especial

            $reg = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/";
            if (preg_match($reg, $pass)){
                return true; 
            }else{
                return false;
            } 
        }

        if ($this->input->post('email') !== null && $this->input->post('password') !== null) {

            if ($this->input->post('email') != '' || $this->input->post('password') != '') {

                if(filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {

                    if($this->regexPass($this->input->post('password'))){

                        $datos = array('email'=>$this->input->post('email'), 
                                       'password'=>$this->input->post('password'));

                        $datos = array('email'=>$datos['email'], 
                                       'password'=>password_hash($datos['password'], PASSWORD_DEFAULT, ['cost' => 15]));

                        $this->db->insert('users',$datos);  

                    }else{
                        echo 'La contrase;a debe tener entre 8 a 15 caracteres una mayuscula por lo menos y un caracter especial';
                    }
                    
                }else{
                    echo 'No es un Email Valido';
                }

            }else{
                echo 'Campos Vacios';
            }
            
        }else{
            echo '404';
        } */

    }

    public function get_conversations(){

        
        $data = json_decode(file_get_contents('php://input'), true);

        echo $this->UsersModel->get_conversations($data);

    }

}