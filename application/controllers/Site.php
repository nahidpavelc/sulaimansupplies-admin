<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{

  function __construct()
  {

    parent::__construct();

    $this->load->library("pagination");
    $this->load->helper("url");
    $this->load->helper("text");
  }

  public function index()
  {
    $data = array();

    $data['sliders'] = $this->db->order_by('priority', 'desc')->get('tbl_slider')->result();

    $data['aboutus'] = $this->db->select('id, title, body, attatched')->where('name', 'about')->get('tbl_common_pages')->row();
    $data['mission'] = $this->db->select('id, title, body')->where('name', 'mission')->get('tbl_common_pages')->row();
    $data['vision']  = $this->db->select('id, title, body')->where('name', 'vision')->get('tbl_common_pages')->row();
    $data['client_list']  = $this->db->select('client_name, logo')->order_by('priority', 'desc')->get('tbl_our_client')->result();

    $data['servicetab1']  = $this->db->select('id, title, body, attatched')->where('name', 'servicetab1')->get('tbl_common_pages')->row();
    $data['servicetab2']  = $this->db->select('id, title, body, attatched')->where('name', 'servicetab2')->get('tbl_common_pages')->row();
    $data['servicetab3']  = $this->db->select('id, title, body, attatched')->where('name', 'servicetab3')->get('tbl_common_pages')->row();
    $data['servicetab4']  = $this->db->select('id, title, body, attatched')->where('name', 'servicetab4')->get('tbl_common_pages')->row();

    $data['slider_bottom_title']  = $this->db->select('value')->where('name', 'slider_bottom_title')->get('tbl_general')->row();

    $data['body_title']  = $this->db->select('value')->where('name', 'body_title')->get('tbl_general')->row();

    $data['facebook_link']  = $this->db->select('value')->where('name', 'facebook_link')->get('tbl_general')->row();
    $data['twitter_link']  = $this->db->select('value')->where('name', 'twitter_link')->get('tbl_general')->row();

    // for most viewed items
    $this->db->limit(4);
    $this->db->select('tbl_services.id, tbl_services.name, tbl_services.service_details, tbl_service_photo.photo');
    $this->db->join('tbl_service_photo', 'tbl_service_photo.service_id=tbl_services.id', 'left');
    $this->db->where('tbl_services.parent_service_id !=', '0');
    $this->db->order_by('tbl_services.total_view', 'desc');
    $this->db->group_by('tbl_services.id');
    $data['popular_services']   = $this->db->get('tbl_services')->result();

    // for gallery

    $data['gallery_category'] = $this->db->select('id, name')->get('tbl_gallery_category')->result();
    $data['gallery_photos']   = $this->db->select('id, gallery_category_id, path, title')->where('type', 'photo')->get('tbl_gallery')->result();


    $data['content'] = 'frontend/index';
    $this->load->view('frontend/welcome', $data);
  }

  public function product($param1 = 0, $param2 = 0)
  {
    $data = array();

    $data['Services Name']  = $this->db->select('name,  parent_service_id')->where('name', 'parent_service_id')->get('tbl_services')->row();
    $data['facebook_link']  = $this->db->select('value')->where('name', 'facebook_link')->get('tbl_general')->row();
    $data['twitter_link']   = $this->db->select('value')->where('name', 'twitter_link')->get('tbl_general')->row();
    $data['client_list']    = $this->db->select('client_name, logo')->order_by('priority', 'desc')->get('tbl_our_client')->result();

    $this->db->select('tbl_services.id, tbl_services.name, tbl_services.service_details, tbl_service_photo.photo');
    $this->db->join('tbl_service_photo', 'tbl_service_photo.service_id=tbl_services.id', 'left');
    $this->db->group_by('tbl_service_photo.service_id');
    $check_service         = $this->db->where('tbl_services.parent_service_id', $param1)->order_by('tbl_services.priority', 'desc')->get('tbl_services');


    if ($check_service->num_rows() > 0) {

      $data['service_list']     = $check_service->result();

      $this->db->query("UPDATE tbl_services SET total_view = total_view+1 WHERE id=" . $param1);
    } else {

      $data['service_list']   = array();
    }

    $data['content'] = 'frontend/product';
    $this->load->view('frontend/welcome', $data);
  }

  public function accessories_details($param1 = 0, $param2 = 0)
  {

    $data = array();

    $data['client_list']     = $this->db->select('client_name, logo')->order_by('priority', 'desc')->get('tbl_our_client')->result();
    $data['facebook_link']   = $this->db->select('value')->where('name', 'facebook_link')->get('tbl_general')->row();
    $data['twitter_link']    = $this->db->select('value')->where('name', 'twitter_link')->get('tbl_general')->row();
    $data['contact_number']  = $this->db->select('value')->where('name', 'contact_number')->get('tbl_general')->row();
    $data['contact_mail']    = $this->db->select('value')->where('name', 'contact_mail')->get('tbl_general')->row();

    $check_service = $this->db->where('tbl_services.id', $param1)->get('tbl_services');

    if ($check_service->num_rows() > 0) {

      $data['service_list']     = $check_service->row();
      $data['service_photos']   = $this->db->where('service_id', $param1)->get('tbl_service_photo')->result();

      $this->db->query("UPDATE tbl_services SET total_view = total_view+1 WHERE id=" . $param1);
    } else {

      $data['service_list']   = array();
    }

    $this->db->limit(8);
    $this->db->select('tbl_services.id, tbl_services.name, tbl_service_photo.photo');
    $this->db->join('tbl_service_photo', 'tbl_service_photo.service_id=tbl_services.id', 'left');
    $this->db->where('tbl_services.parent_service_id !=', '0');
    $this->db->order_by('tbl_services.total_view', 'desc');
    $this->db->group_by('tbl_service_photo.service_id');
    $data['popular_services']   = $this->db->get('tbl_services')->result();


    $data['content'] = 'frontend/accessories_details';
    $this->load->view('frontend/welcome', $data);
  }

  public function work()
  {
    $data = array();
    $data['client_list']  = $this->db->select('client_name, logo')->order_by('priority', 'desc')->get('tbl_our_client')->result();
    $data['facebook_link']  = $this->db->select('value')->where('name', 'facebook_link')->get('tbl_general')->row();
    $data['twitter_link']  = $this->db->select('value')->where('name', 'twitter_link')->get('tbl_general')->row();
    $data['content'] = 'frontend/work';
    $this->load->view('frontend/welcome', $data);
  }

  public function gallery()
  {
    $data = array();
    $data['client_list']  = $this->db->select('client_name, logo')->order_by('priority', 'desc')->get('tbl_our_client')->result();
    $data['facebook_link']  = $this->db->select('value')->where('name', 'facebook_link')->get('tbl_general')->row();
    $data['twitter_link']  = $this->db->select('value')->where('name', 'twitter_link')->get('tbl_general')->row();


    $data['gallery_category'] = $this->db->select('id, name')->get('tbl_gallery_category')->result();
    $data['gallery_photos']   = $this->db->select('id, gallery_category_id, path, title')->where('type', 'photo')->get('tbl_gallery')->result();

    $data['content'] = 'frontend/gallery';
    $this->load->view('frontend/welcome', $data);
  }

  public function client()
  {
    $data = array();
    $data['facebook_link']  = $this->db->select('value')->where('name', 'facebook_link')->get('tbl_general')->row();
    $data['twitter_link']  = $this->db->select('value')->where('name', 'twitter_link')->get('tbl_general')->row();

    $data['client_list']  = $this->db->select('client_name, logo')->order_by('priority', 'desc')->get('tbl_our_client')->result();



    $data['content'] = 'frontend/client';
    $this->load->view('frontend/welcome', $data);
  }

  public function pages($param1 = '')
  {
    $data = array();
    $data['client_list']  = $this->db->select('client_name, logo')->order_by('priority', 'desc')->get('tbl_our_client')->result();

    $data['facebook_link']  = $this->db->select('value')->where('name', 'facebook_link')->get('tbl_general')->row();
    $data['twitter_link']  = $this->db->select('value')->where('name', 'twitter_link')->get('tbl_general')->row();

    $check_page = $this->db->select('id, title, body, attatched')->where('name', $param1)->get('tbl_common_pages');

    if ($check_page->num_rows() > 0) {

      $data['page_info'] = $check_page->row();
      $data['content']   = 'frontend/common_page';
    } else {

      $data['content'] = 'frontend/error_page';
    }


    $this->load->view('frontend/welcome', $data);
  }

  public function contact()
  {
    $data = array();

    $data['client_list']  = $this->db->select('client_name, logo')->order_by('priority', 'desc')->get('tbl_our_client')->result();
    $data['contact_number']  = $this->db->select('value')->where('name', 'contact_number')->get('tbl_general')->row();
    $data['address']  = $this->db->select('value')->where('name', 'address')->get('tbl_general')->row();
    $data['contact_mail']  = $this->db->select('value')->where('name', 'contact_mail')->get('tbl_general')->row();


    $data['facebook_link']  = $this->db->select('value')->where('name', 'facebook_link')->get('tbl_general')->row();
    $data['twitter_link']  = $this->db->select('value')->where('name', 'twitter_link')->get('tbl_general')->row();
    $data['content'] = 'frontend/contact';
    $this->load->view('frontend/welcome', $data);
  }
}
