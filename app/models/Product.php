<?php
  class Product {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }

    // Get All Posts
    public function getProducts(){
      $this->db->query("SELECT * FROM products");

      $results = $this->db->resultset();

      return $results;
    }

    public function addProduct($data){
      //return true;
      // Prepare Query
      $this->db->query('INSERT INTO products (Name, Price, Producttype, typeval, SKU) 
      VALUES (:Name, :Price, :Producttype, :typeval, :SKU)');

      // Bind Values
      $this->db->bind(':Name', $data['Name']);
      $this->db->bind(':Price', $data['Price']);
      $this->db->bind(':Producttype', $data['Producttype']);
      $this->db->bind(':typeval', $data['typeval']);
      $this->db->bind(':SKU', $data['SKU']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function deleteProduct($id){
    
      // Prepare Query
      $this->db->query('DELETE FROM products WHERE Id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }

  ?>