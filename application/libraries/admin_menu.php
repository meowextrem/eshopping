<?php

class Admin_Menu {

	public function __construct()
    {
        $this->CI = & get_instance();

        //$this->CI->load->library('session');
        //$this->CI->load->helper(array('form', 'url'));
    }

    public function get_admin_menu_tree()
    {
        $this->CI->load->database();

        //get permission info of the current role
        //bti or // not

       

        $this->CI->db->order_by('order', 'ASC');
        $query = $this->CI->db->get_where('admin_menu', array('visible' => 1));
        $admin_menu = $query->result_array();

        $menu_list = array();

        foreach ($admin_menu as $child)
        {

            $path = explode('/', $child['path']);

            $module = (isset($path[0])) ? $path[0] : $child['path'];
            $action = (isset($path[1])) ? $path[1] : 'index';
           	
            
                    foreach ($admin_menu as $parent)
                    { 
                        if ($child['parent_id'] == $parent['id'])
                        {
                            $menu_list[$parent['title']]['attribute'] = array(
                                'parent_id' => $parent['parent_id'],
                                'title' => $parent['title'],
                                'path' => $parent['path'],
                                'icon' => $parent['icon']
                            );
                            $menu_list[$parent['title']]['children'][$child['title']] = array(
                                'path' => $child['path'],
                                'icon' => $child['icon']
                            );
                        }
                    }
            
        }
        
        return $menu_list;


    }
}