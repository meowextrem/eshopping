<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{

    public function index()
    {
        $this->load->library('Curl');

        $data                          = array();
        $data['all_featured_products'] = $this->curl->get_all_products();
        $data['all_latest_products'] = $this->curl->get_latest_products();
        $data['page_title'] = 'home';
        
        $this->load->view('pages/home',$data);
    }

    public function products()
    {
        $this->load->library('Curl');

        $data                          = array();
        $data['all_featured_products'] = $this->curl->get_all_products();
        $data['page_title'] = 'products';

        $this->load->view('pages/products',$data);
    }

    public function add_to_cart($id = 0)
    {
        $this->load->library('Curl');
        $data       = array();
        $where      = array( 'id' => $id );
        $results    = $this->curl->get_product_info($where);

        if(empty($results)) {
            redirect('products');
        }else {

            $data['id']      = $results['id'];
            $data['name']    = $results['thename'];
            $data['price']   = $results['price'];
            $data['qty']     = 1;
            $data['options'] = array('product_image' => $results['image']);

            $this->cart->insert($data);
            redirect('cart');
        }
        
    }

    public function cart()
    {
        $data                  = array();
        $data['cart_contents'] = $this->cart->contents();
        $data['page_title']    = 'cart';
        $this->load->view('pages/cart',$data);
    }

    public function remove_to_cart($rowid = 0)
    {

        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('cart');
    }


}
