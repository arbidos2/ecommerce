<?php
class Product extends CI_Model
{
	
	public function get_all_products()
    {
        return $this->db->query("SELECT * FROM products")->result_array();
    }

	public function get_product($product_id)
    {
        return $this->db->query("SELECT * FROM products WHERE id = ?", array($product_id))->row_array();
    }

    public function add_product($product)
    {
        $query = "INSERT INTO products (name, description, quantity, price, image_link) VALUES (?,?,?,?,?)";
        $values = array($product['name'], $product['description'], $product['quantity'], $product['price'], $product['image_link']); 
        return $this->db->query($query, $values);
    }

    




}
?>