<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserAccessModel extends CI_model
{

    public function load_index_data()
    {

        $rs_main_menu = array();
        $rs_sub_menu = array();
        $rs_user_roles = array();

        /* main menu */
        $this->db->order_by("pri", "asc");
        $this->db->where('act', 1);
        $main_menu = $this->db->get("admin_menu_main");
        if ($main_menu->num_rows() > 0) {
            foreach ($main_menu->result() as $data) {
                $rs_main_menu[] = $data;
            }
        }

        /* sub menu */
        $this->db->order_by("pri", "asc");
        $this->db->where('act', 1);
        $sub_menu = $this->db->get("admin_menu_sub");
        if ($sub_menu->num_rows() > 0) {
            foreach ($sub_menu->result() as $data) {
                $rs_sub_menu[] = $data;
            }
        }

        /* user roles */
        $this->db->where('user_id', $this->session->user_id);
        $user_roles = $this->db->get("user_roles");
        if ($user_roles->num_rows() > 0) {
            foreach ($user_roles->result() as $data) {
                $rs_user_roles[] = $data;
            }
        }


        return array(
            'main_menu' => $rs_main_menu,
            'sub_menu' => $rs_sub_menu,
            'index_user_roles' => $rs_user_roles
        );
    }

    public function validate_login()
    {

        $result = array();
        $user_id = array();
        $user_role = array();
        $user_fn = array();
        $user_ln = array();
        $user_PID = array();
        $user_EID = array();
        $user_image = array();

        $password = md5($this->input->post("password", TRUE));

        /* ADMIN LOGIN VALIDATION */

        $this->db->where('user_name', $this->input->post("username", TRUE));
        $this->db->where('user_pass', $password);

        $admin_account = $this->db->get("user_info");

        if ($admin_account->num_rows() == 1) {

            $rs = $admin_account->row();
            $result = true;
            $user_id = $rs->user_id;
            $user_role = $rs->user_role;
            $user_fn = $rs->user_fn;
            $user_ln = $rs->user_ln;
            $user_PID = $rs->user_patientid;
            $user_EID = $rs->user_employeeid;
            $user_image = $rs->user_image;
        }

        return array(
            'success' => $result,
            'user_id' => $user_id,
            'user_role' => $user_role,
            'user_fn' => $user_fn,
            'user_ln' => $user_ln,
            'user_PID' => $user_PID,
            'user_EID' => $user_EID,
            'user_image' => $user_image
        );

    }



}