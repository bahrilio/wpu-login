<?php
defined('BASEPATH') or exit('No direct script access allowed');

class menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";

        return $this->db->query($query)->result_array();
    }
    public function getSubMenuById($id)
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                WHERE `user_sub_menu`.`id` = $id";

        return $this->db->query($query)->row_array();
    }

    public function delete_menu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function edit_menu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function delete_submenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }
    public function edit_submenu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return true;
    }
}
