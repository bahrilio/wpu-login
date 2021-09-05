<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function delete_role($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function add_role($data)
    {
        $this->db->insert('user_role', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function edit_role($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_role', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }
}
