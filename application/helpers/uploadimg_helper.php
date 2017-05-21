<?php 

function doUpload($campo , $width, $height, $caminho){
    $ci = get_instance();
    $files = $campo;
    $file_loop = count($files['userfile']['name']);

    $data = array();
    for($i=0; $i<$file_loop; $i++) {

        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];  

        $config = array();
        //$config['upload_path']   = './uploads/';
        $config['upload_path']   = $caminho;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '0';
        $config['false']         = TRUE;
        $config['encrypt_name']  = TRUE;

        $ci->upload->initialize($config);
        if (!$ci->upload->do_upload('userfile')) {
           
            $data = array('error' => $ci->upload->display_errors());
            //$data[] = array('error' => $error );

            return $data;
        
        } else {

            $data[] = array('upload_data' => $ci->upload->data());

            $ci->load->library('image_lib');
            
             $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $data[$i]['upload_data']['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  $width,
              'height'          =>  $height,
            );
            $ci->image_lib->clear();
            $ci->image_lib->initialize($configer);
            $ci->image_lib->resize();
        }
    }
     return $data; 

    }
    

