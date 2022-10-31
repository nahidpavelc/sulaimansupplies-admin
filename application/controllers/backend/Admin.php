<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  function __construct()
  {

    parent::__construct();

    $this->lang->load('content', $_SESSION['lang']);

    if (!isset($_SESSION['user_auth']) || $_SESSION['user_auth'] != true) {
      redirect('login', 'refresh');
    }
    if ($_SESSION['userType'] != 'admin')
      redirect('login', 'refresh');
    //Model Loading
    $this->load->model('AdminModel');
    $this->load->library("pagination");
    $this->load->helper("url");
    $this->load->helper("text");

    date_default_timezone_set("Asia/Dhaka");
  }

  public function index()
  {
    $data['total_slider']   = $this->db->from("tbl_slider")->count_all_results();
    $data['total_client']   = $this->db->from("tbl_our_client")->count_all_results();
    $data['total_service']   = $this->db->from("tbl_services")->count_all_results();
    $data['total_work']   = $this->db->from("tbl_our_work")->count_all_results();

    $data['title']        = 'Admin Panel • HRSOFTBD News Portal Admin Panel';
    $data['page']         = 'backEnd/dashboard_view';
    $data['activeMenu']   = 'dashboard_view';


    $this->load->view('backEnd/master_page', $data);
  }

  public function theme_setting($param1 = '', $param2 = '', $param3 = '')
  {



    $theme_data_temp    = $this->db->get('tbl_backend_theme')->result();
    $data['theme_data'] = array();
    foreach ($theme_data_temp as $value) {
      $data['theme_data'][$value->name]  = $value->value;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $long_title = $this->input->post('long_title', true);
      $this->AdminModel->theme_text_update('long_title', $long_title);

      $short_title = $this->input->post('short_title', true);
      $this->AdminModel->theme_text_update('short_title', $short_title);

      $tagline = $this->input->post('tagline', true);
      $this->AdminModel->theme_text_update('tagline', $tagline);

      $share_title = $this->input->post('share_title', true);
      $this->AdminModel->theme_text_update('share_title', $share_title);

      $share_title = $this->input->post('version', true);
      $this->AdminModel->theme_text_update('version', $share_title);

      $share_title = $this->input->post('organization', true);
      $this->AdminModel->theme_text_update('organization', $share_title);


      if (!empty($_FILES['logo']['name'])) {

        $path_parts                 = pathinfo($_FILES["logo"]['name']);
        $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
        $dir                        = date("YmdHis", time());
        $config_c['file_name']      = $newfile_name . '_' . $dir;
        $config_c['remove_spaces']  = TRUE;
        $config_c['upload_path']    = 'assets/themeLogo/';
        $config_c['max_size']       = '20000'; //  less than 20 MB
        $config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

        $this->load->library('upload', $config_c);
        $this->upload->initialize($config_c);
        if (!$this->upload->do_upload('logo')) {
        } else {

          $upload_c = $this->upload->data();
          $logo['logo'] = $config_c['upload_path'] . $upload_c['file_name'];
          $this->image_size_fix($logo['logo'], 300, 300);
        }
        $this->AdminModel->theme_text_update('logo', $logo['logo']);
      }



      if (!empty($_FILES['share_banner']['name'])) {

        $path_parts                 = pathinfo($_FILES["share_banner"]['name']);
        $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
        $dir                        = date("YmdHis", time());
        $config['file_name']      = $newfile_name . '_' . $dir;
        $config['remove_spaces']  = TRUE;
        $config['upload_path']    = 'assets/themeBanner/';
        $config['max_size']       = '20000'; //  less than 20 MB
        $config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('share_banner')) {
        } else {

          $upload = $this->upload->data();
          $share_banner['share_banner'] = $config['upload_path'] . $upload['file_name'];
          $this->image_size_fix($share_banner['share_banner'], 600, 315);
        }
        $this->AdminModel->theme_text_update('share_banner', $share_banner['share_banner']);
      }



      $this->session->set_flashdata('message', 'Theme Info Updated Successfully!');
      redirect('admin/theme-setting', 'refresh');
    }

    $data['page']       = 'backEnd/admin/theme_setting';
    $data['activeMenu'] = 'theme_setting';

    $this->load->view('backEnd/master_page', $data);
  }

  public function add_user($param1 = '')
  {


    $messagePage['divissions'] = $this->db->get('tbl_divission')->result_array();
    $messagePage['userType']   = $this->db->get('user_type')->result_array();

    $messagePage['title']      = 'Add User Admin Panel • HRSOFTBD News Portal Admin Panel';
    $messagePage['page']       = 'backEnd/admin/add_user';
    $messagePage['activeMenu'] = 'add_user';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $saveData['firstname'] = $this->input->post('first_name', true);
      $saveData['lastname']  = $this->input->post('last_name', true);
      $saveData['username']  = $this->input->post('user_name', true);
      $saveData['email']     = $this->input->post('email', true);
      $saveData['phone']     = $this->input->post('phone', true);
      $saveData['password']  = sha1($this->input->post('password', true));
      $saveData['address']   = $this->input->post('address', true);
      $saveData['roadHouse'] = $this->input->post('road_house', true);
      $saveData['userType']  = $this->input->post('user_type', true);
      $saveData['photo']     = 'assets/userPhoto/defaultUser.jpg';


      //This will returns as third parameter num_rows, result_array, result
      $username_check = $this->AdminModel->isRowExist('user', array('username' => $saveData['username']), 'num_rows');
      $email_check = $this->AdminModel->isRowExist('user', array('email' => $saveData['email']), 'num_rows');

      if ($username_check > 0 || $email_check > 0) {
        //Invalid message
        $messagePage['page'] = 'backEnd/admin/insertFailed';
        $messagePage['noteMessage'] = "<hr> UserName: " . $saveData['username'] . " can not be create.";
        if ($username_check > 0) {

          $messagePage['noteMessage'] .= '<br> Cause this username is already exist.';
        } else if ($email_check > 0) {

          $messagePage['noteMessage'] .= '<br> Cause this email is already exist.';
        }
      } else {
        //success
        $insertId = $this->AdminModel->saveDataInTable('user', $saveData, 'true');

        $messagePage['page'] = 'backEnd/admin/insertSuccessfull';
        $messagePage['noteMessage'] = "<hr> UserName: " . $saveData['username'] . " has been created successfully.";

        // Category allocate for users
        if (!empty($this->input->post('selectCategory', true))) {

          foreach ($this->input->post('selectCategory', true) as $cat_value) {

            $this->db->insert('category_user', array('userId' => $insertId, 'categoryId' => $cat_value));
          }
        }
      }
    }


    $this->load->view('backEnd/master_page', $messagePage);
  }

  public function edit_user($param1 = '')
  {
    // Update using post method 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $saveData['firstname'] = $this->input->post('first_name', true);
      $saveData['lastname']  = $this->input->post('last_name', true);
      $saveData['phone']     = $this->input->post('phone', true);
      $saveData['address']   = $this->input->post('address', true);
      $saveData['roadHouse'] = $this->input->post('road_house', true);
      $saveData['userType']  = $this->input->post('user_type', true);
      $user_id               = $this->input->post('user_id', true);


      $this->db->where('id', $user_id);
      $this->db->update('user', $saveData);

      $data['page']        = 'backEnd/admin/insertSuccessfull';
      $data['noteMessage'] = "<hr> Data has been Updated successfully.";
    } else if ($this->AdminModel->isRowExist('user', array('id' => $param1), 'num_rows') > 0) {

      $data['userDetails']   = $this->AdminModel->isRowExist('user', array('id' => $param1), 'result_array');

      $myupozilla_id         = $this->db->get_where('tbl_upozilla', array("id" => $data['userDetails'][0]['address']))->row();

      $data['myzilla_id']    = $myupozilla_id->zilla_id;
      $data['mydivision_id'] = $myupozilla_id->division_id;

      $data['divissions']    = $this->db->get('tbl_divission')->result();

      $data['distrcts']      = $this->db->get_where('tbl_zilla', array('divission_id' => $data['mydivision_id']))->result();
      $data['upozilla']      = $this->db->get_where('tbl_upozilla', array('zilla_id' => $data['myzilla_id']))->result();

      $data['userType'] = $this->db->get('user_type')->result_array();
      $data['user_id']  = $param1;
      $data['page']     = 'backEnd/admin/edit_user';
    } else {

      $data['page']        = 'errors/invalidInformationPage';
      $data['noteMessage'] = $this->lang->line('wrong_info_search');
    }

    $data['title']      = 'Users List Admin Panel • HRSOFTBD News Portal Admin Panel';
    $data['activeMenu'] = 'user_list';
    $this->load->view('backEnd/master_page', $data);
  }

  public function suspend_user($id, $setvalue)
  {

    $this->db->where('id', $id);
    $this->db->update('user', array('status' => $setvalue));
    $this->session->set_flashdata('message', 'Data Saved Successfully.');
    redirect('admin/user_list', 'refresh');
  }

  public function delete_user($id)
  {

    $old_image_url = $this->db->where('id', $id)->get('user')->row();
    $this->db->where('id', $id)->delete('user');
    if (isset($old_image_url->photo)) {
      unlink($old_image_url->photo);
    }

    $this->session->set_flashdata('message', 'Data Deleted.');
    redirect('admin/user_list', 'refresh');
  }

  public function user_list()
  {

    $this->db->where('userType !=', 'admin');
    $data['myUsers']    = $this->db->get('user')->result_array();
    $data['title']      = 'Users List Admin Panel • HRSOFTBD News Portal Admin Panel';
    $data['page']       = 'backEnd/admin/user_list';
    $data['activeMenu'] = 'user_list';
    $this->load->view('backEnd/master_page', $data);
  }

  public function image_size_fix($filename, $width = 600, $height = 400, $destination = '')
  {

    // Content type
    // header('Content-Type: image/jpeg');
    // Get new dimensions
    list($width_orig, $height_orig) = getimagesize($filename);

    // Output 20 May, 2018 updated below part
    if ($destination == '' || $destination == null)
      $destination = $filename;

    $extention = pathinfo($destination, PATHINFO_EXTENSION);
    if ($extention != "png" && $extention != "PNG" && $extention != "JPEG" && $extention != "jpeg" && $extention != "jpg" && $extention != "JPG") {

      return true;
    }
    // Resample
    $image_p = imagecreatetruecolor($width, $height);
    $image   = imagecreatefromstring(file_get_contents($filename));
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);



    if ($extention == "png" || $extention == "PNG") {
      imagepng($image_p, $destination, 9);
    } else if ($extention == "jpg" || $extention == "JPG" || $extention == "jpeg" || $extention == "JPEG") {
      imagejpeg($image_p, $destination, 70);
    } else {
      imagepng($image_p, $destination);
    }
    return true;
  }

  public function get_division()
  {

    $result = $this->db->select('id, name')->get('tbl_divission')->result();
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
  }

  public function get_zilla_from_division($division_id = 1)
  {

    $result = $this->db->select('id, name')->where('divission_id', $division_id)->get('tbl_zilla')->result();
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
  }

  public function get_upozilla_from_division_zilla($zilla_id = 1)
  {

    $result = $this->db->select('id, name')->where('zilla_id', $zilla_id)->get('tbl_upozilla')->result();
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
  }

  public function download_file($file_name = '', $fullpath = '')
  {

    $this->load->helper('download');

    $filePath = $file_name;

    if ($file_name == 'full' && ($fullpath != '' || $fullpath != null)) $filePath = $fullpath;

    if ($_GET['file_path']) $filePath = $_GET['file_path'];

    if (file_exists($filePath)) {

      force_download($filePath, NULL);
    } else {

      die('The provided file path is not valid.');
    }
  }

  public function profile($param1 = '')
  {

    $user_id            = $this->session->userdata('userid');
    $data['user_info']  = $this->AdminModel->get_user($user_id);


    $myzilla_id         = $data['user_info']->zilla_id;
    $mydivision_id      = $data['user_info']->division_id;

    $data['divissions'] = $this->db->get('tbl_divission')->result();

    $data['distrcts']   = $this->db->get_where('tbl_zilla', array('divission_id' => $mydivision_id))->result();
    $data['upozilla']   = $this->db->get_where('tbl_upozilla', array('zilla_id'  => $myzilla_id))->result();

    if ($param1 == 'update_photo') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        //exta work
        $path_parts               = pathinfo($_FILES["photo"]['name']);
        $newfile_name             = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
        $dir                      = date("YmdHis", time());
        $config['file_name']      = $newfile_name . '_' . $dir;
        $config['remove_spaces']  = TRUE;
        //exta work
        $config['upload_path']    = 'assets/userPhoto/';
        $config['max_size']       = '20000'; //  less than 20 MB
        $config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {

          // case - failure
          $upload_error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', "Failed to update image.");
        } else {

          $upload                 = $this->upload->data();
          $newphotoadd['photo']   = $config['upload_path'] . $upload['file_name'];

          $old_photo              = $this->db->where('id', $user_id)->get('user')->row()->photo;

          if (file_exists($old_photo)) unlink($old_photo);

          $this->image_size_fix($newphotoadd['photo'], 200, 200);

          $this->db->where('id', $user_id)->update('user', $newphotoadd);

          $this->session->set_userdata('userPhoto', $newphotoadd['photo']);
          $this->session->set_flashdata('message', 'User Photo Updated Successfully!');

          redirect('admin/profile', 'refresh');
        }
      }
    } else if ($param1 == 'update_pass') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $old_pass    = sha1($this->input->post('old_pass', true));
        $new_pass    = sha1($this->input->post('new_pass', true));
        $user_id     = $this->session->userdata('userid');

        $get_user    = $this->db->get_where('user', array('id' => $user_id, 'password' => $old_pass));
        $user_exist  = $get_user->row();

        if ($user_exist) {

          $this->db->where('id', $user_id)
            ->update('user', array('password' => $new_pass));
          $this->session->set_flashdata('message', 'Password Updated Successfully');
          redirect('admin/profile', 'refresh');
        } else {

          $this->session->set_flashdata('message', 'Password Update Failed');
          redirect('admin/profile', 'refresh');
        }
      }
    } else if ($param1 == 'update_info') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $update_data['firstname']   = $this->input->post('firstname', true);
        $update_data['lastname']    = $this->input->post('lastname', true);
        $update_data['roadHouse']   = $this->input->post('roadHouse', true);
        $update_data['address']     = $this->input->post('address', true);


        $db_email     = $this->db->where('id!=', $user_id)->where('email', $this->input->post('email', true))->get('user')->num_rows();
        $db_username  = $this->db->where('id!=', $user_id)->where('username', $this->input->post('username', true))->get('user')->num_rows();


        if ($db_username == 0) {

          $update_data['username']    = $this->input->post('username', true);
        }
        if ($db_email == 0) {

          $update_data['email']       = $this->input->post('email', true);
        }


        $current_password = sha1($this->input->post('password', true));

        $db_password      = $data['user_info']->password;

        if ($current_password == $db_password) {

          if ($this->AdminModel->update_pro_info($update_data, $user_id)) {

            $this->session->set_userdata('username_first', $update_data['firstname']);
            $this->session->set_userdata('username_last', $update_data['lastname']);
            $this->session->set_userdata('username', $update_data['username']);

            $this->session->set_flashdata('message', 'Information Updated Successfully!');
            redirect('admin/profile', 'refresh');
          } else {

            $this->session->set_flashdata('message', 'Information Update Failed!');
            redirect('admin/profile', 'refresh');
          }
        } else {

          $this->session->set_flashdata('message', 'Current Password Does Not Match!');
          redirect('admin/profile', 'refresh');
        }
      }
    }

    $data['title']      = 'Profile Admin Panel • HRSOFTBD News Portal Admin Panel';
    $data['activeMenu'] = 'Profile';
    $data['page']       = 'backEnd/admin/profile';

    $this->load->view('backEnd/master_page', $data);
  }

  public function testimonial($param1 = 'add', $param2 = '', $param3 = '')
  {
    if ($param1 == 'add') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $insert_testimonials['name']        = $this->input->post('name', true);
        $insert_testimonials['position']    = $this->input->post('position', true);
        $insert_testimonials['priority']    = $this->input->post('priority', true);
        $insert_testimonials['description'] = $this->input->post('description', true);
        $insert_testimonials['insert_by']   = $_SESSION['userid'];
        $insert_testimonials['insert_time'] = date('Y-m-d H:i:s');

        if (!empty($_FILES['photo']['name'])) {

          $path_parts                 = pathinfo($_FILES["photo"]['name']);
          $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
          $dir                        = date("YmdHis", time());
          $config_c['file_name']      = $newfile_name . '_' . $dir;
          $config_c['remove_spaces']  = TRUE;
          $config_c['upload_path']    = 'assets/testimonialsPhoto/';
          $config_c['max_size']       = '20000'; //  less than 20 MB
          $config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

          $this->load->library('upload', $config_c);
          $this->upload->initialize($config_c);
          if (!$this->upload->do_upload('photo')) {
          } else {

            $upload_c = $this->upload->data();
            $insert_testimonials['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
            $this->image_size_fix($insert_testimonials['photo'], 400, 400);
          }
        }

        $add_testimonials = $this->db->insert('testimonials', $insert_testimonials);

        if ($add_testimonials) {

          $this->session->set_flashdata('message', 'Testimonials Added Successfully!');
          redirect('admin/testimonial/list', 'refresh');
        } else {

          $this->session->set_flashdata('message', 'Testimonials Add Failed!');
          redirect('admin/testimonial/list', 'refresh');
        }
      }

      $data['title']             = 'Testimonials Add';
      $data['activeMenu']        = 'testimonials_add';
      $data['page']              = 'backEnd/admin/testimonials_add';
    } elseif ($param1 == 'list') {

      $data['title']        = 'Testimonials List';
      $data['activeMenu']   = 'testimonials_list';
      $data['testimonials'] = $this->db->order_by('priority', 'desc')->get('testimonials')->result();
      $data['page']         = 'backEnd/admin/testimonials_list';
    } elseif ($param1 == 'edit' && $param2 > 0) {

      $data['edit_info']   = $this->db->get_where('testimonials', array('id' => $param2));

      if ($data['edit_info']->num_rows() > 0) {

        $data['edit_info']    = $data['edit_info']->row();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $update_testimonials['name']        = $this->input->post('name', true);
          $update_testimonials['position']    = $this->input->post('position', true);
          $update_testimonials['priority']    = $this->input->post('priority', true);
          $update_testimonials['description'] = $this->input->post('description', true);

          if (!empty($_FILES['photo']['name'])) {

            $path_parts                 = pathinfo($_FILES["photo"]['name']);
            $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
            $dir                        = date("YmdHis", time());
            $config_c['file_name']      = $newfile_name . '_' . $dir;
            $config_c['remove_spaces']  = TRUE;
            $config_c['upload_path']    = 'assets/testimonialsPhoto/';
            $config_c['max_size']       = '20000'; //  less than 20 MB
            $config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

            $this->load->library('upload', $config_c);
            $this->upload->initialize($config_c);
            if (!$this->upload->do_upload('photo')) {
            } else {

              $upload_c = $this->upload->data();
              $update_testimonials['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
              $this->image_size_fix($update_testimonials['photo'], 400, 400);
            }
          }

          if ($this->AdminModel->update_testimonials($update_testimonials, $param2)) {

            $this->session->set_flashdata('message', 'Testimonials  Updated Successfully!');
            redirect('admin/testimonial/list', 'refresh');
          } else {

            $this->session->set_flashdata('message', 'Testimonials Update Failed!');
            redirect('admin/testimonial/list', 'refresh');
          }
        }
      } else {

        $this->session->set_flashdata('message', 'Wrong Attempt!');
        redirect('admin/testimonial/list', 'refresh');
      }

      $data['title']      = 'Testimonials Edit';
      $data['activeMenu'] = 'testimonials_edit';
      $data['page']       = 'backEnd/admin/testimonials_edit';
    } elseif ($param1 == 'delete' && $param2 > 0) {

      if ($this->AdminModel->delete_testimonials($param2)) {

        $this->session->set_flashdata('message', 'Testimonials  Deleted Successfully!');
        redirect('admin/testimonial/list', 'refresh');
      } else {

        $this->session->set_flashdata('message', 'Testimonials Deleted Failed!');
        redirect('admin/testimonial/list', 'refresh');
      }
    } else {

      $this->session->set_flashdata('message', 'Wrong Attempt!');
      redirect('admin/testimonial/list', 'refresh');
    }
    $this->load->view('backEnd/master_page', $data);
  }

  // All_Student
  public function all_student($param1 = 'add', $param2 = '', $param3 = '')
  {
    if ($param1 == 'add') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $all_student_data['name']           = $this->input->post('name', true);
        $all_student_data['email']          = $this->input->post('email', true);
        $all_student_data['phone']          = $this->input->post('phone', true);
        $all_student_data['address']        = $this->input->post('address', true);
        $all_student_data['skill']          = $this->input->post('skill', true);
        $all_student_data['status']         = $this->input->post('status', true);
        $all_student_data['description']    = $this->input->post('description', true);

        if (!empty($_FILES["attached"]['name'])) { //exta work

          $path_parts                 = pathinfo($_FILES["attached"]['name']);
          $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
          $dir                        = date("YmdHis", time());
          $config['file_name']      = $newfile_name . '_' . $dir;
          $config['remove_spaces']  = TRUE;
          $config['upload_path']    = 'assets/allStudent/';
          $config['max_size']       = '20000'; //  less than 20 MB
          $config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG|pdf|docx';

          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('attached')) {
          } else {
            $upload = $this->upload->data();
            $all_student_data['attached']   = $config['upload_path'] . $upload['file_name'];
            $file_parts = pathinfo($all_student_data['attached']);
            if ($file_parts['extension'] != "pdf") {
              $this->image_size_fix($all_student_data['attached'], $width = 670, $height = 487);
            }
          }
        }

        $check_name_exist = $this->db->where('name', $all_student_data['name'])->get('tbl_test');
        if ($check_name_exist->num_rows() > 0) {

          $this->session->set_flashdata('message', 'This Student Already Exists!');
          redirect('admin/all_student', 'refresh');
        } else {

          $all_student = $this->db->insert('tbl_test', $all_student_data);
          if ($all_student) {

            $this->session->set_flashdata('message', 'User created Successfully!');
            redirect('admin/all_student', 'refresh');
          } else {

            $this->session->set_flashdata('message', 'User Create Failed!');
            redirect('admin/all_student', 'refresh');
          }
        }
      }
      $data['title']         = 'All Student Add';
      $data['page']          = 'backEnd/admin/all_student_add';
      $data['activeMenu']    = 'all_student_add';
    } elseif ($param1 == 'edit' && (int) $param2 > 0) {

      $data['table_info']    = $this->db->where('id', $param2)->get('tbl_test')->row();
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //extra work
        $path_parts                   = pathinfo($_FILES["attached"]['name']);
        $newfile_name                 = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
        $dir                          = date("YmdHis", time());
        $config['file_name']          = $newfile_name . '_' . $dir;
        $config['remove_spaces']      = TRUE;
        $config['max_size']           = '20000'; //  less than 20 MB
        $config['allowed_types']      = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG|pdf|docx';
        $config['upload_path']        = 'assets/pageSettings';

        $old_file_url                 = $data['table_info'];
        $update_data['name']          = $this->input->post('name', true);
        $update_data['email']         = $this->input->post('email', true);
        $update_data['phone']         = $this->input->post('phone', true);
        $update_data['address']       = $this->input->post('address', true);
        $update_data['skill']         = $this->input->post('skill', true);
        $update_data['status']        = $this->input->post('status', true);
        $update_data['description']   = $this->input->post('description', true);

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('attached')) {

          $this->session->set_flashdata('message', 'Data Updated Successfully');
          $this->db->where('id', $param2)->update('tbl_test', $update_data);

          redirect('admin/all_student/list', 'refresh');
        } else {

          $upload = $this->upload->data();

          $update_data['attached'] = $config['upload_path'] . '/' . $upload['file_name'];
          $this->db->where('id', $param2)->update('tbl_test', $update_data);
          $file_parts = pathinfo($update_data['attached']);
          if ($file_parts['extension'] != "pdf") {
            $this->image_size_fix($update_data['attached'], $width = 670, $height = 487);
          }
          if (file_exists($old_file_url->attached)) unlink($old_file_url->attached);
          $this->session->set_flashdata('message', 'Data Updated Successfully');
          redirect('admin/all_student/list', 'refresh');
        }
      }

      $data['all_student'] = $this->db->select('id, name')->where('id !=', $param2)->get('tbl_test')->result();

      $data['title']         = 'All Student Update';
      $data['page']          = 'backEnd/admin/all_student_edit';
      $data['activeMenu']    = 'all_student_edit';
    } elseif ($param1 == 'list') {

      $data['title']      = 'All Student List';
      $data['page']       = 'backEnd/admin/all_student_list';
      $data['activeMenu'] = 'all_student_list';
      $data['table_info'] = $this->db->get('tbl_test')->result_array();
    } elseif ($param1 == 'delete' && (int) $param2 > 0) {

      $attached = $this->db->where('id', $param2)->get('tbl_test')->row()->attached;
      if (file_exists($attached)) {

        unlink($attached);
      }

      $all_student_delete = $this->db->where('id', $param2)->delete('tbl_test');
      if ($all_student_delete) {

        $this->session->set_flashdata('message', 'Page Deleted Successfully!');
        redirect('admin/all_student/list', 'refresh');
      } else {

        $this->session->set_flashdata('message', 'Page Delete Failed!');
        redirect('admin/all_student/list', 'refresh');
      }
    } else {

      $this->session->set_flashdata('message', 'Wrong Attempt!');
      redirect('admin/all_student/list', 'refresh');
    }
    $this->load->view('backEnd/master_page', $data);
  }
  // CLient
  public function our_clint($param1 = 'add', $param2 = '', $param3 = '')
  {
    if ($param1 == 'add') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $insert_clint['client_name']    = $this->input->post('name', true);
        $insert_clint['priority']      = $this->input->post('priority', true);
        $insert_clint['insert_by']     = $_SESSION['userid'];
        $insert_clint['insert_time']   = date('Y-m-d H:i');

        if (!empty($_FILES['logo']['name'])) {

          $path_parts                 = pathinfo($_FILES["logo"]['name']);
          $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
          $dir                        = date("YmdHis", time());
          $config_c['file_name']      = $newfile_name . '_' . $dir;
          $config_c['remove_spaces']  = TRUE;
          $config_c['upload_path']    = 'assets/clientLogo/';
          $config_c['max_size']       = '20000'; //  less than 20 MB
          $config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

          $this->load->library('upload', $config_c);
          $this->upload->initialize($config_c);
          if (!$this->upload->do_upload('logo')) {
          } else {

            $upload_c = $this->upload->data();
            $insert_clint['logo'] = $config_c['upload_path'] . $upload_c['file_name'];
            $this->image_size_fix($insert_clint['logo'], 140, 40);
          }
        }

        $add_clint = $this->db->insert('tbl_our_client', $insert_clint);

        if ($add_clint) {

          $this->session->set_flashdata('message', 'Client Added Successfully!');
          redirect('admin/our-clint/list', 'refresh');
        } else {

          $this->session->set_flashdata('message', 'Client Add Failed!');
          redirect('admin/our-clint/list', 'refresh');
        }
      }

      $data['title']             = 'Our Client Add';
      $data['activeMenu']        = 'clint_add';
      $data['page']              = 'backEnd/admin/our_clint_add';
    } elseif ($param1 == 'list') {

      $data['title']             = 'Our Client List';
      $data['activeMenu']        = 'clint_list';
      $data['clint_list']      = $this->db->select('id, client_name, logo, priority, insert_time')->order_by('priority', 'desc')->get('tbl_our_client')->result();
      $data['page']              = 'backEnd/admin/our_clint_list';
    } elseif ($param1 == 'edit' && $param2 > 0) {

      $data['edit_info']   = $this->db->get_where('tbl_our_client', array('id' => $param2));

      if ($data['edit_info']->num_rows() > 0) {

        $data['edit_info']    = $data['edit_info']->row();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $update_clint['client_name']    = $this->input->post('name', true);
          $update_clint['priority']      = $this->input->post('priority', true);

          if (!empty($_FILES['logo']['name'])) {

            $path_parts                 = pathinfo($_FILES["logo"]['name']);
            $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
            $dir                        = date("YmdHis", time());
            $config_c['file_name']      = $newfile_name . '_' . $dir;
            $config_c['remove_spaces']  = TRUE;
            $config_c['upload_path']    = 'assets/clientLogo/';
            $config_c['max_size']       = '20000'; //  less than 20 MB
            $config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

            $this->load->library('upload', $config_c);
            $this->upload->initialize($config_c);
            if (!$this->upload->do_upload('logo')) {
            } else {

              $upload_c = $this->upload->data();
              $update_clint['logo'] = $config_c['upload_path'] . $upload_c['file_name'];
              $this->image_size_fix($update_clint['logo'], 140, 40);
            }
          }

          if ($this->AdminModel->update_clint($update_clint, $param2)) {

            $this->session->set_flashdata('message', 'Our Client Updated Successfully!');
            redirect('admin/our-clint/list', 'refresh');
          } else {

            $this->session->set_flashdata('message', 'Our Client Update Failed!');
            redirect('admin/our-clint/list', 'refresh');
          }
        }
      } else {

        $this->session->set_flashdata('message', 'Wrong Attempt!');
        redirect('admin/our-clint/list', 'refresh');
      }

      $data['title']      = 'Our Client Edit';
      $data['activeMenu'] = 'clint_edit';
      $data['page']       = 'backEnd/admin/our_clint_edit';
    } elseif ($param1 == 'delete' && $param2 > 0) {

      if ($this->AdminModel->delete_clint($param2)) {

        $this->session->set_flashdata('message', 'Our Client  Deleted Successfully!');
        redirect('admin/our-clint/list', 'refresh');
      } else {

        $this->session->set_flashdata('message', 'Our Client Deleted Failed!');
        redirect('admin/our-clint/list', 'refresh');
      }
    } else {

      $this->session->set_flashdata('message', 'Wrong Attempt!');
      redirect('admin/our-clint/list', 'refresh');
    }

    $this->load->view('backEnd/master_page', $data);
  }

  // public function page_settings($param1 = 'add', $param2 = '', $param3 = '')
  // {

  //   if ($param1 == 'add') {

  //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //       $page_settings_data['name']           = $this->input->post('name', true);
  //       $page_settings_data['title']          = $this->input->post('title', true);
  //       $page_settings_data['body']           = $this->input->post('body');
  //       $page_settings_data['is_menu']        = $this->input->post('is_menu', true);
  //       $page_settings_data['priority']       = $this->input->post('priority', true);
  //       $page_settings_data['parent_page_id'] = $this->input->post('parent_page_id', true);

  //       if (!empty($_FILES["attached"]['name'])) {
  //         //exta work
  //         $path_parts                 = pathinfo($_FILES["attached"]['name']);
  //         $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
  //         $dir                        = date("YmdHis", time());
  //         $config['file_name']      = $newfile_name . '_' . $dir;
  //         $config['remove_spaces']  = TRUE;
  //         $config['upload_path']    = 'assets/pageSettings/';
  //         $config['max_size']       = '20000'; //  less than 20 MB
  //         $config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG|pdf|docx';

  //         $this->load->library('upload', $config);
  //         $this->upload->initialize($config);
  //         if (!$this->upload->do_upload('attached')) {
  //         } else {
  //           $upload = $this->upload->data();
  //           $page_settings_data['attached']   = $config['upload_path'] . $upload['file_name'];
  //           $file_parts = pathinfo($page_settings_data['attached']);
  //           if ($file_parts['extension'] != "pdf") {
  //             $this->image_size_fix($page_settings_data['attached'], $width = 670, $height = 487);
  //           }
  //         }
  //       }

  //       $check_name_exist = $this->db->where('name', $page_settings_data['name'])->get('tbl_common_pages');
  //       if ($check_name_exist->num_rows() > 0) {

  //         $this->session->set_flashdata('message', 'This Page Already Exists!');
  //         redirect('admin/page_settings', 'refresh');
  //       } else {
  //         $page_settings = $this->db->insert('tbl_common_pages', $page_settings_data);
  //         if ($page_settings) {
  //           $this->session->set_flashdata('message', 'Page Created Successfully!');
  //           redirect('admin/page_settings', 'refresh');
  //         } else {
  //           $this->session->set_flashdata('message', 'Page Create Failed!');
  //           redirect('admin/page_settings', 'refresh');
  //         }
  //       }
  //     }

  //     $data['title']         = 'Page Setting Add';
  //     $data['page']          = 'backEnd/admin/page_settings_add';
  //     $data['activeMenu']    = 'page_settings_add';
  //     $data['page_settings'] = $this->db->select('id, name')->get('tbl_common_pages')->result();
  //   } elseif ($param1 == 'edit' && (int) $param2 > 0) {

  //     $data['table_info']    = $this->db->where('id', $param2)->get('tbl_common_pages')->row();
  //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //       //exta work
  //       $path_parts                   = pathinfo($_FILES["attached"]['name']);
  //       $newfile_name                 = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
  //       $dir                          = date("YmdHis", time());
  //       $config['file_name']          = $newfile_name . '_' . $dir;
  //       $config['remove_spaces']      = TRUE;
  //       $config['max_size']           = '20000'; //  less than 20 MB
  //       $config['allowed_types']      = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG|pdf|docx';
  //       $config['upload_path']        = 'assets/pageSettings';

  //       $old_file_url                   = $data['table_info'];
  //       $update_data['title']           = $this->input->post('title', true);
  //       $update_data['body']            = $this->input->post('body');
  //       $update_data['is_menu']         = $this->input->post('is_menu', true);
  //       $update_data['priority']        = $this->input->post('priority', true);
  //       $update_data['parent_page_id']  = $this->input->post('parent_page_id', true);

  //       $this->load->library('upload', $config);
  //       if (!$this->upload->do_upload('attached')) {

  //         $this->session->set_flashdata('message', 'Data Updated Successfully');
  //         $this->db->where('id', $param2)->update('tbl_common_pages', $update_data);

  //         redirect('admin/page_settings/list', 'refresh');
  //       } else {

  //         $upload = $this->upload->data();

  //         $update_data['attached'] = $config['upload_path'] . '/' . $upload['file_name'];
  //         $this->db->where('id', $param2)->update('tbl_common_pages', $update_data);
  //         $file_parts = pathinfo($update_data['attached']);
  //         if ($file_parts['extension'] != "pdf") {
  //           $this->image_size_fix($update_data['attached'], $width = 670, $height = 487);
  //         }
  //         if (file_exists($old_file_url->attached)) unlink($old_file_url->attached);
  //         $this->session->set_flashdata('message', 'Data Updated Successfully');
  //         redirect('admin/page_settings/list', 'refresh');
  //       }
  //     }



  //     $data['page_settings'] = $this->db->select('id, name')->where('id !=', $param2)->get('tbl_common_pages')->result();



  //     $data['title']         = 'Page Setting Update';
  //     $data['page']          = 'backEnd/admin/page_settings_edit';
  //     $data['activeMenu']    = 'page_settings_edit';
  //   } elseif ($param1 == 'list') {

  //     $data['title']      = 'Page Setting List';
  //     $data['page']       = 'backEnd/admin/page_settings_list';
  //     $data['activeMenu'] = 'page_settings_list';
  //     $data['table_info'] = $this->db->get('tbl_common_pages')->result_array();
  //   } elseif ($param1 == 'delete' && (int) $param2 > 0) {

  //     $attached = $this->db->where('id', $param2)->get('tbl_common_pages')->row()->attached;

  //     if (file_exists($attached)) {

  //       unlink($attached);
  //     }

  //     $page_settings_delete = $this->db->where('id', $param2)->delete('tbl_common_pages');



  //     if ($page_settings_delete) {

  //       $this->session->set_flashdata('message', 'Page Deleted Successfully!');
  //       redirect('admin/page_settings/list', 'refresh');
  //     } else {

  //       $this->session->set_flashdata('message', 'Page Delete Failed!');
  //       redirect('admin/page_settings/list', 'refresh');
  //     }
  //   } else {

  //     $this->session->set_flashdata('message', 'Wrong Attempt!');
  //     redirect('admin/page_settings/list', 'refresh');
  //   }

  //   $this->load->view('backEnd/master_page', $data);
  // }

  public function sms_send($param1 = 'list', $param2 = '', $param3 = '')
  {
    if ($param1 == 'list') {

      $data['title']         = 'SMS Send';
      $data['activeMenu']    = 'sms_send';
      $data['page']          = 'backEnd/admin/sms_send_list';
      //$data['sms_send_list'] = $this->db->order_by('send_date_time','desc')->get('tbl_sms_send_list')->result();


    } elseif ($param1 == 'setting') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $setting_data['username'] = $this->input->post('username', true);
        $setting_data['password'] = $this->input->post('password', true);

        $update_setting = $this->db->where('id', 1)->update('tbl_sms_send_setting', $setting_data);

        if ($update_setting) {

          $this->session->set_flashdata('message', 'SMS Setting Updated Successfully!');
          redirect('admin/sms_send/setting', 'refresh');
        } else {

          $this->session->set_flashdata('message', 'SMS Setting Update Failed!');
          redirect('admin/sms_send/setting', 'refresh');
        }
      }

      $data['title']        = 'SMS Send';
      $data['activeMenu']   = 'sms_send';
      $data['page']         = 'backEnd/admin/sms_send_setting';
      //$data['setting_info'] = $this->db->where('id',1)->get('tbl_sms_send_setting')->row();

    } elseif ($param1 == 'new_sms') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $sms_send_data['send_date_time']   = date('Y-m-d H:i:s');
        $sms_send_data['message']          = $this->input->post('message', true);
        $sms_send_data['receiver_numbers'] = $this->input->post('receiver_numbers', true);
        $sms_send_data['insert_by']        = $_SESSION['userid'];

        $sms_send_add = $this->db->insert('tbl_sms_send_list', $sms_send_data);

        if ($sms_send_add) {

          $this->session->set_flashdata('message', 'Message Send Successfully!');
          redirect('admin/sms_send/new_sms', 'refresh');
        } else {

          $this->session->set_flashdata('message', 'Message Send Failed!');
          redirect('admin/sms_send/new_sms', 'refresh');
        }
      }

      $data['title']         = 'SMS Send';
      $data['activeMenu']    = 'sms_send';
      $data['page']          = 'backEnd/admin/sms_send_new';
    } else {

      $this->session->set_flashdata('message', 'Wrong Attempt!');
      redirect('admin/sms_send/list', 'refresh');
    }

    $this->load->view('backEnd/master_page', $data);
  }

  public function get_sms_number($sms_to)
  {
    if ($sms_to == 1) {

      $result = $this->db->select('mobile')->get('tbl_members')->result();

      $mobile = '';

      foreach ($result as $key => $value) {

        if ($mobile != '') if ($value->mobile != '') $mobile .= ',';
        $mobile .= $value->mobile;
      }

      echo json_encode($mobile, JSON_UNESCAPED_UNICODE);
    } else {

      $result = $this->db->select('phone as mobile')->get('tbl_committee')->result();

      $mobile = '';

      foreach ($result as $key => $value) {

        if ($mobile != '') if ($value->mobile != '') $mobile .= ',';
        $mobile .= $value->mobile;
      }
      echo json_encode($mobile, JSON_UNESCAPED_UNICODE);
    }
  }

  public function mail_setting()
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      foreach ($this->input->post('mail_setting_id', true) as $key => $id_value) {

        $id    = $id_value;
        $value = $this->input->post('value', true)[$key];

        $this->db->where('id', $id)->update('tbl_mail_send_setting', array('value' => $value));
      }

      $this->session->set_flashdata('message', 'Mail Send Setting Updated Successfully!');
      redirect('admin/mail_setting', 'refresh');
    }

    $data['title']             = 'Mail Setting';
    $data['activeMenu']        = 'mail_setting';
    $data['page']              = 'backEnd/admin/mail_setting';
    $data['mail_setting_info'] = $this->db->get('tbl_mail_send_setting')->result();
    $this->load->view('backEnd/master_page', $data);
  }

  //General
  public function general($param1 = '', $param2 = '', $param3 = '')
  {
    if ($param1 == 'add') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $insert_general['name']  = $this->input->post('name', true);
        $insert_general['value'] = $this->input->post('value', true);

        $add_general = $this->db->insert('tbl_general', $insert_general);

        if ($add_general) {

          $this->session->set_flashdata('message', "General Add Successfully!");
          redirect('admin/general', 'refresh');
        } else {

          $this->session->set_flashdata('message', "General Add Failed");
          redirect('admin/general', 'refresh');
        }
      }
    } elseif ($param1 == 'edit') {

      $param2 = $this->input->post('general_id');

      $data['edit_info'] = $this->db->get_where('tbl_general', array('id' => $param2));

      if ($data['edit_info']->num_rows() > 0) {;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $update_general['name']  = $this->input->post('name', true);
          $update_general['value'] = $this->input->post('value', true);

          $general_update = $this->db->where('id', $param2)->update('tbl_general', $update_general);

          if ($general_update) {

            $this->session->set_flashdata('message', "General Update Successfully!");
            redirect('admin/general', 'refresh');
          } else {

            $this->session->set_flashdata('message', "General Update Failed");
            redirect('admin/general', 'refresh');
          }
        }
      } else {

        $this->session->set_flashdata('message', 'Wrong Attempt!');
        redirect('admin/general', 'refresh');
      }
    } elseif ($param1 == 'delete' && $param2 > 0) {

      $delete_general = $this->db->where('id', $param2)->delete('tbl_general');

      if ($delete_general) {

        $this->session->set_flashdata('message', "General Delete Successfully!");
        redirect('admin/general', 'refresh');
      } else {

        $this->session->set_flashdata('message', "General Delete Failed");
        redirect('admin/general', 'refresh');
      }
    }

    $data['title']      = 'General Settings';
    $data['activeMenu'] = 'general_setting';
    $data['page']       = 'backEnd/admin/general';
    $data['generals']   = $this->db->get('tbl_general')->result();
    $this->load->view('backEnd/master_page', $data);
  }

  public function our_work($param1 = '', $param2 = '', $param3 = '')
  {
    if ($param1 == 'add') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $insert_work['title']            = $this->input->post('title', true);
        $insert_work['client_id']              = $this->input->post('client_id', true);
        $insert_work['insert_by']              = $_SESSION['userid'];
        $insert_work['insert_time']            = date('Y-m-d H:i');

        if (!empty($_FILES['photo']['name'])) {

          $path_parts                     = pathinfo($_FILES["photo"]['name']);
          $newfile_name                   = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
          $dir                            = date("YmdHis", time());
          $config_c['file_name']          = $newfile_name . '_' . $dir;
          $config_c['remove_spaces']      = TRUE;
          $config_c['upload_path']        = 'assets/workPhoto/';
          $config_c['max_size']           = '20000'; //  less than 20 MB
          $config_c['allowed_types']      = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

          $this->load->library('upload', $config_c);
          $this->upload->initialize($config_c);
          if (!$this->upload->do_upload('photo')) {
          } else {

            $upload_c = $this->upload->data();
            $insert_work['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
            $this->image_size_fix($insert_work['photo'], 370, 208);
          }
        }

        $add_subject = $this->db->insert('tbl_our_work', $insert_work);

        if ($add_subject) {

          $this->session->set_flashdata('message', 'Our Work Added Successfully!');
          redirect('admin/our-work/list', 'refresh');
        } else {

          $this->session->set_flashdata('message', 'Our Work Add Failed!');
          redirect('admin/our-work/list', 'refresh');
        }
      }
      $data['client_list'] = $this->db->select('id, client_name')->get('tbl_our_client')->result();


      $data['title']          = 'Our Work Add';
      $data['activeMenu']     = 'work_add';
      $data['page']           = 'backEnd/admin/our_work_add';
    } elseif ($param1 == 'list') {

      $this->db->select('tbl_our_work.id, tbl_our_work.title, tbl_our_work.photo, tbl_our_work.insert_time, tbl_our_client.client_name');
      $this->db->join('tbl_our_client', 'tbl_our_client.id = tbl_our_work.client_id', 'left');


      $data['our_work_list']  = $this->db->get('tbl_our_work')->result();
      $data['title']          = 'Our Work List';
      $data['activeMenu']     = 'work_list';
      $data['page']           = 'backEnd/admin/our_work_list';
    } elseif ($param1 == 'edit' && $param2 > 0) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $update_work['client_id']              = $this->input->post('client_id', true);
        $update_work['title']                = $this->input->post('title', true);

        if (!empty($_FILES['photo']['name'])) {

          $path_parts                     = pathinfo($_FILES["photo"]['name']);
          $newfile_name                   = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
          $dir                            = date("YmdHis", time());
          $config_c['file_name']          = $newfile_name . '_' . $dir;
          $config_c['remove_spaces']      = TRUE;
          $config_c['upload_path']        = 'assets/workPhoto/';
          $config_c['max_size']           = '20000'; //  less than 20 MB
          $config_c['allowed_types']      = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

          $this->load->library('upload', $config_c);
          $this->upload->initialize($config_c);
          if (!$this->upload->do_upload('photo')) {
          } else {

            $upload_c = $this->upload->data();
            $update_work['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
            $this->image_size_fix($update_work['photo'], 370, 208);
          }
        }

        $update_work = $this->AdminModel->update_work($update_work, $param2);

        if ($update_work) {

          $this->session->set_flashdata('message', 'Our Work Updated Successfully!');
          redirect('admin/our-work/list', 'refresh');
        } else {

          $this->session->set_flashdata('message', 'Our Work Update Failed!');
          redirect('admin/our-work/list', 'refresh');
        }
      }

      $data['edit_info'] = $this->db->where('id', $param2)->get('tbl_our_work');

      if ($data['edit_info']->num_rows() > 0) {

        $data['edit_info'] = $data['edit_info']->row();
      } else {

        $this->session->set_flashdata('message', 'Wrong Attempt!');
        redirect('admin/our-work/list', 'refresh');
      }

      $data['client_list']   = $this->db->select('id, client_name')->get('tbl_our_client')->result();


      $data['title']          = 'Our Work Edit';
      $data['activeMenu']     = 'work_edit';
      $data['page']           = 'backEnd/admin/our_work_edit';
    } elseif ($param1 == 'delete' && $param2 > 0) {

      $delete_work = $this->AdminModel->delete_work($param2);

      if ($delete_work) {

        $this->session->set_flashdata('message', 'Our Work Deleted Successfully!');
        redirect('admin/our-work/list', 'refresh');
      } else {

        $this->session->set_flashdata('message', 'Our Work Delete Failed!');
        redirect('admin/our-work/list', 'refresh');
      }
    }

    $this->load->view('backEnd/master_page', $data);
  }

  //Services
  public function services($param1 = '', $param2 = '', $param3 = '')
  {
    if ($param1 == 'add') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $insert_services['name']           = $this->input->post('name', true);
        $insert_services['parent_service_id']     = $this->input->post('parent_service_id', true);
        $insert_services['service_details']         = $this->input->post('service_details', true);
        $insert_services['priority']              = $this->input->post('priority', true);
        $insert_services['insert_by']              = $_SESSION['userid'];
        $insert_services['insert_time']            = date('Y-m-d H:i');

        $add_services = $this->db->insert('tbl_services', $insert_services);

        if ($add_services == 'true') {

          $insert_service_photo['service_id']         = $this->db->insert_id();;
          $insert_service_photo['insert_by']          = $_SESSION['userid'];
          $insert_service_photo['inser_time']          = date('Y-m-d H:i');

          if (!empty($_FILES['photo']['name'])) {

            $path_parts                       = pathinfo($_FILES["photo"]['name']);
            $newfile_name                     = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
            $dir                              = date("YmdHis", time());
            $config_c['file_name']            = $newfile_name . '_' . $dir;
            $config_c['remove_spaces']        = TRUE;
            $config_c['upload_path']          = 'assets/servicePhoto/';
            $config_c['max_size']             = '20000'; //  less than 20 MB
            $config_c['allowed_types']        = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

            $this->load->library('upload', $config_c);
            $this->upload->initialize($config_c);
            if (!$this->upload->do_upload('photo')) {
            } else {

              $upload_c = $this->upload->data();
              $insert_service_photo['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
              $this->image_size_fix($insert_service_photo['photo'], 800, 560);
            }
          }

          $add_service_photo = $this->db->insert('tbl_service_photo', $insert_service_photo);
        }
        if ($add_services) {

          $this->session->set_flashdata('message', 'Services Added Successfully!');
          redirect('admin/services/list', 'refresh');
        } else {

          $this->session->set_flashdata('message', 'Services Add Failed!');
          redirect('admin/services/list', 'refresh');
        }
      }

      $data['parent_list']    = $this->db->select('id, name')->where('parent_service_id', '0')->get('tbl_services')->result();
      $data['title']          = 'Services Add';
      $data['activeMenu']     = 'services_add';
      $data['page']           = 'backEnd/admin/services_add';
    } elseif ($param1 == 'list') {

      $data['services_list']  = $this->db->select('id, name, service_details, parent_service_id, priority, insert_time')->order_by('parent_service_id', 'asc')->order_by('priority', 'desc')->get('tbl_services')->result();
      $data['title']          = 'Service List';
      $data['activeMenu']     = 'services_list';
      $data['page']           = 'backEnd/admin/services_list';
    } elseif ($param1 == 'edit' && $param2 > 0) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $update_services['name']           = $this->input->post('name', true);
        $update_services['parent_service_id']     = $this->input->post('parent_service_id', true);
        $update_services['service_details']          = $this->input->post('service_details', true);
        $update_services['priority']              = $this->input->post('priority', true);


        $update_services = $this->AdminModel->update_services($update_services, $param2);

        $update_service_photo = array();
        if (!empty($_FILES['photo']['name'])) {

          $path_parts                       = pathinfo($_FILES["photo"]['name']);
          $newfile_name                     = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
          $dir                              = date("YmdHis", time());
          $config_c['file_name']            = $newfile_name . '_' . $dir;
          $config_c['remove_spaces']        = TRUE;
          $config_c['upload_path']          = 'assets/servicePhoto/';
          $config_c['max_size']             = '20000'; //  less than 20 MB
          $config_c['allowed_types']        = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

          $this->load->library('upload', $config_c);
          $this->upload->initialize($config_c);
          if (!$this->upload->do_upload('photo')) {
          } else {

            $upload_c = $this->upload->data();
            $update_service_photo['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
            $this->image_size_fix($update_service_photo['photo'], 800, 560);

            $this->AdminModel->update_service_photo($update_service_photo, $param2);
          }
        }

        if ($update_services) {

          $this->session->set_flashdata('message', 'Services Updated Successfully!');
          redirect('admin/services/edit/' . $param2, 'refresh');
        } else {

          $this->session->set_flashdata('message', 'Services Update Failed!');
          redirect('admin/services/edit/' . $param2, 'refresh');
        }
      }



      $data['edit_info'] = $this->db->where('id', $param2)->get('tbl_services');

      if ($data['edit_info']->num_rows() > 0) {

        $data['edit_info'] = $data['edit_info']->row();
      } else {

        $this->session->set_flashdata('message', 'Wrong Attempt!');
        redirect('admin/services/list', 'refresh');
      }

      $service_id       = $data['edit_info']->id;
      $data['service_photo']   = $this->db->select('photo')->where('service_id', $service_id)->get('tbl_service_photo')->row();
      $data['service_photo_list'] = $this->db->select('id, photo')->where('service_id', $service_id)->get('tbl_service_photo')->result();
      $data['parent_list']    = $this->db->select('id, name')->where('parent_service_id', '0')->get('tbl_services')->result();
      $data['title']          = 'Services Edit';
      $data['activeMenu']     = 'services_edit';
      $data['page']           = 'backEnd/admin/services_edit';
    } elseif ($param1 == 'delete' && $param2 > 0) {

      $delete_work = $this->AdminModel->delete_services($param2);
      $delete_work = $this->AdminModel->delete_service_photo($param2);

      if ($delete_work) {

        $this->session->set_flashdata('message', 'Services Deleted Successfully!');
        redirect('admin/services/list', 'refresh');
      } else {

        $this->session->set_flashdata('message', 'Services Delete Failed!');
        redirect('admin/services/list', 'refresh');
      }
    }

    $this->load->view('backEnd/master_page', $data);
  }

  public function service_photo($param1 = '', $param2 = '', $param3 = '')
  {
    if ($param1 == 'add') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $insert_service_photo['service_id']         = $this->input->post('service_id', true);
        $insert_service_photo['insert_by']          = $_SESSION['userid'];
        $insert_service_photo['inser_time']         = date('Y-m-d H:i');

        if (!empty($_FILES['photo']['name'])) {

          $path_parts                       = pathinfo($_FILES["photo"]['name']);
          $newfile_name                     = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
          $dir                              = date("YmdHis", time());
          $config_c['file_name']            = $newfile_name . '_' . $dir;
          $config_c['remove_spaces']        = TRUE;
          $config_c['upload_path']          = 'assets/servicePhoto/';
          $config_c['max_size']             = '20000'; //  less than 20 MB
          $config_c['allowed_types']        = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

          $this->load->library('upload', $config_c);
          $this->upload->initialize($config_c);
          if (!$this->upload->do_upload('photo')) {
          } else {

            $upload_c = $this->upload->data();
            $insert_service_photo['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
            $this->image_size_fix($insert_service_photo['photo'], 800, 560);
          }
        }

        $add_service_photo = $this->db->insert('tbl_service_photo', $insert_service_photo);

        if ($add_service_photo) {

          $this->session->set_flashdata('message', 'Service Photo Added Successfully!');
          redirect('admin/services/edit/' . $insert_service_photo['service_id'], 'refresh');
        } else {

          $this->session->set_flashdata('message', 'Service Photo Add Failed!');
          redirect('admin/services/edit/' . $insert_service_photo['service_id'], 'refresh');
        }
      }
      // $data['service_list'] = $this->db->select('id, name')->get('tbl_services')->result();


      // $data['title']          = 'Service Photo Add';
      // $data['activeMenu']     = 'service_photo_add';
      // $data['page']           = 'backEnd/admin/service_photo_add';

    } elseif ($param1 == 'list') {

      $this->db->select('tbl_service_photo.id, tbl_service_photo.photo, tbl_service_photo.inser_time, tbl_services.name');
      $this->db->join('tbl_services', 'tbl_services.id = tbl_service_photo.service_id', 'left');


      $data['service_photo_list']  = $this->db->get('tbl_service_photo')->result();
      $data['title']             = 'Service Photo List';
      $data['activeMenu']        = 'service_photo_list';
      $data['page']              = 'backEnd/admin/service_photo_list';
    } elseif ($param1 == 'edit' && $param2 > 0) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $update_service_photo['service_id']         = $this->input->post('service_id', true);

        if (!empty($_FILES['photo']['name'])) {

          $path_parts                       = pathinfo($_FILES["photo"]['name']);
          $newfile_name                     = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
          $dir                              = date("YmdHis", time());
          $config_c['file_name']            = $newfile_name . '_' . $dir;
          $config_c['remove_spaces']        = TRUE;
          $config_c['upload_path']          = 'assets/servicePhoto/';
          $config_c['max_size']             = '20000'; //  less than 20 MB
          $config_c['allowed_types']        = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

          $this->load->library('upload', $config_c);
          $this->upload->initialize($config_c);
          if (!$this->upload->do_upload('photo')) {
          } else {

            $upload_c = $this->upload->data();
            $update_service_photo['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
            $this->image_size_fix($update_service_photo['photo'], 800, 560);
          }
        }

        $update_service = $this->AdminModel->update_service_photo($update_service_photo, $param2);

        if ($update_service) {

          $this->session->set_flashdata('message', 'Service Photo Updated Successfully!');
          redirect('admin/service-photo/list', 'refresh');
        } else {

          $this->session->set_flashdata('message', 'Service Photo Update Failed!');
          redirect('admin/service-photo/list', 'refresh');
        }
      }

      $data['edit_info'] = $this->db->where('id', $param2)->get('tbl_service_photo');

      if ($data['edit_info']->num_rows() > 0) {

        $data['edit_info'] = $data['edit_info']->row();
      } else {

        $this->session->set_flashdata('message', 'Wrong Attempt!');
        redirect('admin/service-photo/list', 'refresh');
      }

      $data['service_list']   = $this->db->select('id, name')->get('tbl_services')->result();


      $data['title']          = 'Service Photo Edit';
      $data['activeMenu']     = 'service_photo_edit';
      $data['page']           = 'backEnd/admin/service_photo_edit';
    } elseif ($param1 == 'delete' && $param2 > 0) {

      $delete_service_photo = $this->AdminModel->delete_service_photo($param2);

      if ($delete_service_photo) {

        $this->session->set_flashdata('message', 'Service Photo Deleted Successfully!');
        redirect('admin/services/edit/' . $param3, 'refresh');
      } else {

        $this->session->set_flashdata('message', 'Service Photo Delete Failed!');
        redirect('admin/services/edit/' . $param3, 'refresh');
      }
    }

    $this->load->view('backEnd/master_page', $data);
  }

  public function slider($param1 = 'add', $param2 = '', $param3 = '')
  {

    if ($param1 == 'add') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $insert_slider['title']         = $this->input->post('title', true);
        $insert_slider['subtitle']      = $this->input->post('subtitle', true);
        $insert_slider['priority']      = $this->input->post('priority', true);
        $insert_slider['insert_by']     = $_SESSION['userid'];


        if (!empty($_FILES["photo"]['name'])) {

          //exta work
          $path_parts                 = pathinfo($_FILES["photo"]['name']);
          $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
          $dir                        = date("YmdHis", time());
          $config_c['file_name']      = $newfile_name . '_' . $dir;
          $config_c['remove_spaces']  = TRUE;
          $config_c['upload_path']    = 'assets/sliderPhoto/';
          $config_c['max_size']       = '20000'; //  less than 20 MB
          $config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

          $this->load->library('upload', $config_c);
          $this->upload->initialize($config_c);
          if (!$this->upload->do_upload('photo')) {
          } else {

            $upload_c = $this->upload->data();
            $insert_slider['photo']   = $config_c['upload_path'] . $upload_c['file_name'];
            $this->image_size_fix($insert_slider['photo'], 1024, 755);
          }
        }

        $slider_add = $this->db->insert('tbl_slider', $insert_slider);

        if ($slider_add) {

          $this->session->set_flashdata('message', "Slider Added Successfully.");
          redirect('admin/slider/', 'refresh');
        } else {

          $this->session->set_flashdata('message', "Slider Add Failed.");
          redirect('admin/slider/', 'refresh');
        }
      }
    } else if ($param1 == 'edit' && $param2 > 0) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $update_slider['priority']     = $this->input->post('priority', true);
        $update_slider['subtitle']     = $this->input->post('subtitle', true);
        $update_slider['title']        = $this->input->post('title', true);

        if (!empty($_FILES["photo"]['name'])) {

          //exta work
          $path_parts                 = pathinfo($_FILES["photo"]['name']);
          $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
          $dir                        = date("YmdHis", time());
          $config_c['file_name']      = $newfile_name . '_' . $dir;
          $config_c['remove_spaces']  = TRUE;
          $config_c['upload_path']    = 'assets/sliderPhoto/';
          $config_c['max_size']       = '20000'; //  less than 20 MB
          $config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

          $this->load->library('upload', $config_c);
          $this->upload->initialize($config_c);
          if (!$this->upload->do_upload('photo')) {
          } else {

            $upload_c = $this->upload->data();
            $update_slider['photo']   = $config_c['upload_path'] . $upload_c['file_name'];
            $this->image_size_fix($update_slider['photo'], 1024, 755);
          }
        }

        if ($this->AdminModel->slider_update($update_slider, $param2)) {

          $this->session->set_flashdata('message', "Slider Updated Successfully.");
          redirect('admin/slider', 'refresh');
        } else {

          $this->session->set_flashdata('message', "Slider Update Failed.");
          redirect('admin/slider', 'refresh');
        }
      }

      $data['slider_info'] = $this->db->get_where('tbl_slider', array('id' => $param2));

      if ($data['slider_info']->num_rows() > 0) {

        $data['slider_info']    = $data['slider_info']->row();
        $data['slider_info_id'] = $param2;
      } else {

        $this->session->set_flashdata('message', "Wrong Attempt !");
        redirect('admin/slider', 'refresh');
      }
    } elseif ($param1 == 'delete' && $param2 > 0) {

      if ($this->AdminModel->slider_delete($param2)) {

        $this->session->set_flashdata('message', "Slider Deleted Successfully.");
        redirect('admin/slider', 'refresh');
      } else {

        $this->session->set_flashdata('message', "Slider Delete Failed.");
        redirect('admin/slider', 'refresh');
      }
    }

    $data['title']      = 'Slider';
    $data['activeMenu'] = 'slider';
    $data['page']       = 'backEnd/admin/slider';
    $data['all_slider'] = $this->db->order_by('priority', 'desc')->get('tbl_slider')->result();

    $this->load->view('backEnd/master_page', $data);
  }

  //Gallery Category
  public function gallary_category($param1 = '', $param2 = '', $param3 = '')
  {

    if ($param1 == 'add') {

      $insert_album['name']            = $this->input->post('name', true);
      $insert_album['priority']          = $this->input->post('priority', true);
      $insert_album['update_by']       = $_SESSION['userid'];

      $this->db->insert('tbl_gallery_category', $insert_album);

      $redirect_action = $this->input->post('redirect_action');
      redirect($redirect_action . "?modal=show", 'refresh');
    }

    if ($param1 == 'edit') {

      $edit_id     = $this->input->post('id', true);
      $checking_id = $this->db->get_where('tbl_gallery_category', array('id' => $edit_id));

      if ($checking_id->num_rows() > 0) {

        $name = $this->input->post('name', true);
        $priority = $this->input->post('priority', true);

        $this->db->where('id', $edit_id)->update('tbl_gallery_category', array('name' => $name, 'priority' => $priority));
        $redirect_action = 'admin/gallary/add';
        redirect($redirect_action . "?modal=show", 'refresh');
      }
    }
    if ($param1 == 'delete' && $param2 > 0) {

      $this->db->where('id', $param2)->delete('tbl_gallery_category');
      $redirect_action = 'admin/gallary/add';
      redirect($redirect_action . "?modal=show", 'refresh');
    }
  }

  //Gallery
  public function gallary($param1 = 'add', $param2 = '', $param3 = '')
  {
    if ($param1 == 'add') {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $insert_galary['type']                = $this->input->post('type', true);
        $insert_galary['gallery_category_id'] = $this->input->post('gallery_category_id', true);
        $insert_galary['title']               = $this->input->post('title', true);
        $insert_galary['priority']            = $this->input->post('priority', true);
        $insert_galary['insert_time']       = date('Y-m-d H:i');
        $insert_galary['insert_by']          = $_SESSION['userid'];

        if ($insert_galary['type'] == 'Video') {
          $insert_galary['path']  = $this->input->post('path1');
        } elseif ($insert_galary['type'] == 'Photo') {

          if (!empty($_FILES["path"]['name'])) {

            //exta work
            $path_parts                 = pathinfo($_FILES["path"]['name']);
            $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
            $dir                        = date("YmdHis", time());
            $config_c['file_name']      = $newfile_name . '_' . $dir;
            $config_c['remove_spaces']  = TRUE;
            $config_c['upload_path']    = 'assets/galleryPhoto/';
            $config_c['max_size']       = '20000'; //  less than 20 MB
            $config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

            $this->load->library('upload', $config_c);
            $this->upload->initialize($config_c);
            if (!$this->upload->do_upload('path')) {
            } else {

              $upload_c = $this->upload->data();
              $insert_galary['path']   = $config_c['upload_path'] . $upload_c['file_name'];
              //$this->image_size_fix($insert_galary['path'], 800, 600);
            }
          }
        }

        $gallary_add = $this->db->insert('tbl_gallery', $insert_galary);

        if ($gallary_add) {

          $this->session->set_flashdata('message', "Gallary Added Successfully.");
          redirect('admin/gallary/list', 'refresh');
        } else {

          $this->session->set_flashdata('message', "Gallary Add Failed.");
          redirect('admin/gallary/list', 'refresh');
        }
      }

      $data['title']           = 'Gallery Add';
      $data['activeMenu']      = 'gallery_add';
      $data['galary_category'] = $this->db->get('tbl_gallery_category')->result();
      $data['page']            = 'backEnd/admin/galary_add';
    } elseif ($param1 == 'list') {

      $data['title']           = 'Gallery List';
      $data['activeMenu']      = 'gallery_list';
      $data['page']            = 'backEnd/admin/galary_list';
      $data['all_gallery']     = $this->AdminModel->get_gallery();
    } elseif ($param1 == 'edit' && $param2 > 0) {

      $data['gallery_info']    = $this->db->get_where('tbl_gallery', array('id' => $param2));

      if ($data['gallery_info']->num_rows() > 0) {

        $data['gallery_info']    = $data['gallery_info']->row();
        $data['gallery_info_id'] = $param2;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $update_galary['type']                = $this->input->post('type', true);
          $update_galary['gallery_category_id'] = $this->input->post('gallery_category_id', true);
          $update_galary['title']               = $this->input->post('title', true);
          $update_galary['priority']            = $this->input->post('priority', true);


          if ($update_galary['type'] == 'Video') {

            $update_galary['path']  = $this->input->post('path1');
          } elseif ($update_galary['type'] == 'Photo') {

            if (!empty($_FILES["path"]['name'])) {

              //exta work
              $path_parts                 = pathinfo($_FILES["path"]['name']);
              $newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
              $dir                        = date("YmdHis", time());
              $config_c['file_name']      = $newfile_name . '_' . $dir;
              $config_c['remove_spaces']  = TRUE;
              $config_c['upload_path']    = 'assets/galleryPhoto/';
              $config_c['max_size']       = '20000'; //  less than 20 MB
              $config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

              $this->load->library('upload', $config_c);
              $this->upload->initialize($config_c);
              if (!$this->upload->do_upload('path')) {
              } else {

                $upload_c = $this->upload->data();
                $update_galary['path'] = $config_c['upload_path'] . $upload_c['file_name'];
                //$this->image_size_fix($update_galary['path'], 800, 600);
              }
            }
          }

          if ($this->AdminModel->galary_update($update_galary, $param2)) {

            $this->session->set_flashdata('message', "Gallary Updated Successfully.");
            redirect('admin/gallary/list', 'refresh');
          } else {

            $this->session->set_flashdata('message', "Gallary Updated Failed.");
            redirect('admin/gallary/list', 'refresh');
          }
        }
      } else {

        $this->session->set_flashdata('message', "Wrong Attempt !");
        redirect('admin/gallary/list', 'refresh');
      }

      $data['title']           = 'Gallery Edit';
      $data['activeMenu']      = 'gallery_edit';
      $data['galary_category'] = $this->db->get('tbl_gallery_category')->result();
      $data['page']            = 'backEnd/admin/galary_edit';
    } elseif ($param1 == 'delete' && $param2 > 0) {

      if ($this->AdminModel->gallery_delete($param2)) {
        $this->session->set_flashdata('message', "Gallery Deleted Successfully.");
        redirect('admin/gallary/list', 'refresh');
      } else {
        $this->session->set_flashdata('message', "Gallery Delete Failed.");
        redirect('admin/gallary/list', 'refresh');
      }
    }

    $data['albums'] = $this->db->order_by('priority', 'desc')->get('tbl_gallery_category')->result();

    $this->load->view('backEnd/master_page', $data);
  }
}
