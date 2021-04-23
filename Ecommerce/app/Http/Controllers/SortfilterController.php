<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class SortfilterController extends Controller
{
    //di sini isi controller Sort filter
    public function nameAsc()
    {
        $data['title']='Products';
        $data['user']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

        $query = "SELECT 'products',*
                  FROM 'products'
                  ORDER BY 'products'.'name' ASC";
        $data['products'] =$this->db->query($query)->result_array();
        
        $query1 = "SELECT 'room'.'price'
                    FROM 'categories'
                    JOIN 'products' ON 'categories'.'products' = 'products'.'id'
                    GROUP BY 'products'.'id' ASC
        ";

        $data['categories'] = $this->db->query($query)->result_array();

        $this->load->views('layouts\header',$data);
        $this->load->Http('Controller\ProductController',$data);
        $this->load->views('layouts\footer');
    }

    public function nameDesc()
    {
        $data['title']='Products';
        $data['user']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

        $query = "SELECT 'products',*
                  FROM 'products'
                  ORDER BY 'products'.'name' DESC";
        $data['products'] =$this->db->query($query)->result_array();
        
        $query1 = "SELECT 'room'.'price'
                    FROM 'categories'
                    JOIN 'products' ON 'categories'.'products' = 'products'.'id'
                    GROUP BY 'products'.'id' DESC
        ";

        $data['categories'] = $this->db->query($query)->result_array();

        $this->load->views('layouts\header',$data);
        $this->load->Http('Controller\ProductController',$data);
        $this->load->views('layouts\footer');
    }


    public function priceless100() {
        $data['title']='Products'; 
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email)')])->row_array();
        
        $query ="SELECT 'products'.*, 'categories'.'price'
                FROM 'products'
                JOIN 'categories' ON 'categories'.'products_id' = 'products'.'id'
                WHERE 'categories'.'price'<100000
                GROUP BY 'products'.'name'
            ";
        $data['products'] = $this->db->query($query)->result_array();

        $query1 = "SELECT 'categories'.'price'
                   FROM 'categories'
                   JOIN 'products' ON 'categories'.'products_id' = 'products.id'
                   GROUP BY 'products'.'id' ASC
                ";
        $data['categories'] = $this->db->query($query1)->result_array();

        $this->load->views('layouts\header',$data);
        $this->load->Http('Controller\ProductController',$data);
        $this->load->views('layouts\footer');
    }
    public function pricemore150() {
        $data['title']='Products'; 
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email)')])->row_array();
        
        $query ="SELECT 'products'.*, 'categories'.'price'
                FROM 'products'
                JOIN 'categories' ON 'categories'.'products_id' = 'products'.'id'
                WHERE 'categories'.'price'>150000
                GROUP BY 'products'.'name'
            ";
        $data['products'] = $this->db->query($query)->result_array();

        $query1 = "SELECT 'categories'.'price'
                   FROM 'categories'
                   JOIN 'products' ON 'categories'.'products_id' = 'products.id'
                   GROUP BY 'products'.'id' ASC
                ";
        $data['categories'] = $this->db->query($query1)->result_array();

        $this->load->views('layouts\header',$data);
        $this->load->Http('Controller\ProductController',$data);
        $this->load->views('layouts\footer');
    }
    public function pricemore1000() {
        $data['title']='Products'; 
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email)')])->row_array();
        
        $query ="SELECT 'products'.*, 'categories'.'price'
                FROM 'products'
                JOIN 'categories' ON 'categories'.'products_id' = 'products'.'id'
                WHERE 'categories'.'price'>1000000
                GROUP BY 'products'.'name'
            ";
        $data['products'] = $this->db->query($query)->result_array();

        $query1 = "SELECT 'categories'.'price'
                   FROM 'categories'
                   JOIN 'products' ON 'categories'.'products_id' = 'products.id'
                   GROUP BY 'products'.'id' ASC
                ";
        $data['categories'] = $this->db->query($query1)->result_array();

        $this->load->views('layouts\header',$data);
        $this->load->Http('Controller\ProductController',$data);
        $this->load->views('layouts\footer');
    }
}