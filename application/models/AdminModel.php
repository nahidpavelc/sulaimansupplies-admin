<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class AdminModel extends CI_Model
{

  // $returnmessage can be num_rows, result_array, result
  public function isRowExist($tableName, $data, $returnmessage, $user_id = NULL)
  {

    $this->db->where($data);
    if ($user_id !== NULL) {
      $this->db->where('userId', $user_id);
    }
    if ($returnmessage == 'num_rows') {
      return $this->db->get($tableName)->num_rows();
    } else if ($returnmessage == 'result_array') {
      return $this->db->get($tableName)->result_array();
    } else {
      return $this->db->get($tableName)->result();
    }
  }
  // saveDataInTable table name , array, and return type is null or last inserted ID.
  public function saveDataInTable($tableName, $data, $returnInsertId = 'false')
  {

    $this->db->insert($tableName, $data);
    if ($returnInsertId == 'true') {
      return $this->db->insert_id();
    } else {
      return -1;
    }
  }

  public function check_campaign_ambigus($start_date, $end_date)
  {

    if (date_format(date_create($start_date), "Y-m-d") > date_format(date_create($end_date), "Y-m-d")) {
      return -2;
    }

    $this->db->limit(1);
    $this->db->where('end_date >=', $start_date);
    $this->db->where('available_status', 1);
    $query = $this->db->get('create_campaign')->num_rows();
    if ($query > 0) {
      return -1;
    }
    return 1;
  }

  public function end_date_extends($end_date, $id)
  {

    $this->db->limit(1);
    $this->db->where('start_date >=', $end_date);
    $this->db->where('id', $id);
    $this->db->where('available_status', 1);
    $query = $this->db->get('create_campaign')->num_rows();
    if ($query > 0) {
      return -1;
    }
    $this->db->limit(1);
    $this->db->where('end_date >=', $end_date);
    $this->db->where('id !=', $id);
    $this->db->where('available_status', 1);
    $query2 = $this->db->get('create_campaign')->num_rows();
    if ($query2 > 0) {
      return -1;
    }
    return 1;
  }
  public function fetch_data_pageination($limit, $start, $table, $search = NULL, $approveStatus = NULL, $user_id = NULL)
  {

    $this->db->limit($limit, $start);

    if ($approveStatus !== NULL) {
      $this->db->where('approveStatus', $approveStatus);
    }

    if ($user_id !== NULL) {
      $this->db->where('userId', $user_id);
    }

    if ($search !== NULL) {
      $this->db->like('title', $search);
      $this->db->or_like('body', $search);
      $this->db->or_like('date', $search);
    }

    $this->db->order_by('date', 'desc');
    $query = $this->db->get($table);

    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }
  public function fetch_images($limit = 18, $start = 0, $table, $search = NULL, $where_data = NULL)
  {

    $this->db->limit($limit, $start);

    if ($search !== NULL) {
      $this->db->like('date', $search);
      $this->db->or_like('photoCaption', $search);
    }
    if ($where_data !== NULL) {
      $this->db->where($where_data);
    }
    $this->db->group_by('photo');
    $this->db->order_by('date', 'desc');
    $query = $this->db->get($table);

    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function usersCategory($userId)
  {

    $this->db->select('category.*');
    $this->db->join('category', 'category_user.categoryId = category.id', 'left');
    $this->db->where('category_user.userId', $userId);
    return $this->db->get('category_user')->result_array();
  }


  public function get_user($user_id)
  {
    $query = $this->db->select('user.*,tbl_upozilla.*')
      ->where('user.id', $user_id)
      ->from('user')
      ->join('tbl_upozilla', 'user.address = tbl_upozilla.id', 'left')
      ->get();

    return $query->row();
  }

  public function update_pro_info($update_data, $user_id)
  {
    return $this->db->where('id', $user_id)->update('user', $update_data);
  }

  public function update_testimonials($update_testimonials, $param2)
  {
    if (isset($update_testimonials['photo']) && file_exists($update_testimonials['photo'])) {

      $result = $this->db->select('photo')
        ->from('testimonials')
        ->where('id', $param2)
        ->get()
        ->row()->photo;

      if (file_exists($result)) {
        unlink($result);
      }
    }

    return $this->db->where('id', $param2)->update('testimonials', $update_testimonials);
  }

  public function delete_testimonials($param2)
  {
    $result = $this->db->select('photo')
      ->from('testimonials')
      ->where('id', $param2)
      ->get()
      ->row()->photo;

    if (file_exists($result)) {
      unlink($result);
    }

    return $this->db->where('id', $param2)->delete('testimonials');
  }

  public function theme_text_update($name_index, $value)
  {

    if ($name_index == 'logo') {
      $result = $this->db->select('value')->where(array('id' => 6))->get('tbl_backend_theme')->row()->value;

      if (file_exists($result)) {
        unlink($result);
      }
    } elseif ($name_index == 'share_banner') {
      $result = $this->db->select('value')->where(array('id' => 7))->get('tbl_backend_theme')->row()->value;

      if (file_exists($result)) {
        unlink($result);
      }
    }

    $update_theme['value'] = $value;
    $this->db->where('name', $name_index)->update('tbl_backend_theme', $update_theme);
    return true;
  }

  //Update Clint
  public function update_clint($update_clint, $param2)
  {
    if (isset($update_clint['logo']) && file_exists($update_clint['logo'])) {

      $result = $this->db->select('logo')->from('tbl_our_client')->where('id', $param2)->get()->row()->logo;

      if (file_exists($result)) {
        unlink($result);
      }
    }

    return $this->db->where('id', $param2)->update('tbl_our_client', $update_clint);
  }

  //Delete Clint
  public function delete_clint($param2)
  {
    $result = $this->db->select('logo')->from('tbl_our_client')->where('id', $param2)->get()->row()->logo;

    if (file_exists($result)) {
      unlink($result);
    }

    return $this->db->where('id', $param2)->delete('tbl_our_client');
  }

  //Update Work
  public function update_work($update_work, $param2)
  {
    if (isset($update_work['photo']) && file_exists($update_work['photo'])) {

      $result = $this->db->select('photo')->from('tbl_our_work')->where('id', $param2)->get()->row()->photo;

      if (file_exists($result)) {
        unlink($result);
      }
    }

    return $this->db->where('id', $param2)->update('tbl_our_work', $update_work);
  }

  //Delete Work
  public function delete_work($param2)
  {
    $result = $this->db->select('photo')->from('tbl_our_work')->where('id', $param2)->get()->row()->photo;

    if (file_exists($result)) {
      unlink($result);
    }

    return $this->db->where('id', $param2)->delete('tbl_our_work');
  }

  //Update Services
  public function update_services($update_services, $param2)
  {

    return $this->db->where('id', $param2)->update('tbl_services', $update_services);
  }

  //Delete Services
  public function delete_services($param2)
  {
    return $this->db->where('id', $param2)->delete('tbl_services');
  }

  //Update Service Photo
  public function update_service_photo($update_service_photo, $param2)
  {
    if (isset($update_service_photo['photo']) && file_exists($update_service_photo['photo'])) {

      $result = $this->db->select('photo')->from('tbl_service_photo')->where('service_id', $param2)->get()->row();

      if (file_exists($result->photo)) {
        unlink($result->photo);
      }
    }

    return $this->db->where('service_id', $param2)->update('tbl_service_photo', $update_service_photo);
  }

  //Delete Service Photo
  public function delete_service_photo($param2)
  {
    $result = $this->db->select('photo')->from('tbl_service_photo')->where('id', $param2)->get()->row()->photo;

    if (file_exists($result)) {
      unlink($result);
    }

    return $this->db->where('id', $param2)->delete('tbl_service_photo');
  }

  //Slider Update
  public function slider_update($update_slider, $param2)
  {
    if (isset($update_slider['photo']) && file_exists($update_slider['photo'])) {

      $query = $this->db->select('photo')->from('tbl_slider')->where('id', $param2)->get();
      $result = $query->row()->photo;

      if (file_exists($result)) {
        unlink($result);
      }
    }
    return $this->db->where('id', $param2)->update('tbl_slider', $update_slider);
  }

  //Slider Delete
  public function slider_delete($param2)
  {
    $query = $this->db->select('photo')->from('tbl_slider')->where('id', $param2)->get();
    $result = $query->row()->photo;

    if (file_exists($result)) {
      unlink($result);
    }

    return $this->db->where('id', $param2)->delete('tbl_slider');
  }

  //Gallery List 
  public function get_gallery()
  {
    $query = $this->db->select('tbl_gallery.*,tbl_gallery_category.name')
      ->from('tbl_gallery')
      ->join('tbl_gallery_category', 'tbl_gallery.gallery_category_id = tbl_gallery_category.id', 'left')

      ->order_by('priority', 'desc')
      ->get();

    return $query->result();
  }

  // Gallary Update
  public function galary_update($update_galary, $param2)
  {
    if (isset($update_galary['path']) && file_exists($update_galary['path'])) {

      $query   = $this->db->select('path')->from('tbl_gallery')->where('id', $param2)->get();
      $result = $query->row()->path;

      if (file_exists($result)) {
        unlink($result);
      }
    }
    return $this->db->where('id', $param2)->update('tbl_gallery', $update_galary);
  }

  //Gallery delete
  public function gallery_delete($param2)
  {
    $galary = $this->db->get_where('tbl_gallery', array('id' => $param2))->row();

    if ($galary->type == 'Photo' && file_exists($galary->path)) {

      $query   = $this->db->select('path')->from('tbl_gallery')->where('id', $param2)->get();
      $result = $query->row()->path;

      if (file_exists($result)) {
        unlink($result);
      }
    }

    return $this->db->where('id', $param2)->delete('tbl_gallery');
  }
}

?>

