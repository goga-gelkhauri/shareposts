<?php
class Products extends Controller{
    public function __construct(){
        // Load Models
        $this->ProductModel = $this->model('Product');
    }

    // Load All Product
    public function index(){
        $products = $this->ProductModel->getProducts();

        $data = [
        'products' => $products
        ];
        
        $this->view('products/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST
          $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          $data = [
            'Name' => trim($_POST['Name']),
            'Price' => trim($_POST['Price']),
            'Producttype' => trim($_POST['Producttype']),
            'typeval' => trim($_POST['typeval']),
            'SKU' => trim($_POST['SKU']),
            'Name_err' => '',
            'Price_err' => '',
            'Producttype_err' => '',
            'typeval_err' => '',
            'SKU_err' => '',
          ];
  
           // Validate email
           if(empty($data['Name'])){
            $data['Name_err'] = 'Please enter name';
            // Validate name
            if(empty($data['Price'])){
              $data['Price_err'] = 'Please enter the Price';
            }

            if(empty($data['Producttype'])){
              $data['Producttype_err'] = 'Please enter Producttype';
            }

            if(empty($data['typeval'])){
              $data['typeval_err'] = 'Please enter typeval';
            }

            if(empty($data['SKU'])){
              $data['SKU_err'] = 'Please enter SKU';
            }
          }
  
          // Make sure there are no errors
          if(empty($data['Name_err']) && empty($data['Price_err']) && empty($data['Producttype_err']) && empty($data['typeval_err']) && empty($data['SKU_err'])){
            // Validation passed
            //Execute
            
            if($this->model('Product')->addProduct($data)){
              // Redirect to login
              flash('product_message', 'Product Added');
              redirect('products');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('products/add', $data);
          }
  
        } else {
          $data = [
            'Name' => '',
            'Price' => '',
            'Producttype' => '',
            'typeval' => '',
            'SKU' => '',
          ];
  
          $this->view('products/add', $data);
        }
    } 

    public function delete(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $id = trim(htmlentities($_POST['Id']));
        if($this->model('Product')->deleteProduct($id))
        {
          // Redirect to login
          flash('product_message', 'product Removed');
          redirect('products');
        }
        else 
        {
          die('Something went wrong');
        }
        
      }
    }

}