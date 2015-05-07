<?php
class Product extends CI_Model
{
	
	public function get_all_products()
    {
        $query = "SELECT * FROM products";
        return $this->db->query($query)->result_array();
    }

	public function get_product($product_id)
    {
        $query = "SELECT * FROM products WHERE id = ?";
        return $this->db->query($query, array($product_id))->row_array();
    }

    public function add_product($product)
    {
        $query = "INSERT INTO products (name, description, quantity, price, image_link) VALUES (?,?,?,?,?)";
        $values = array($product['name'], $product['description'], $product['quantity'], $product['price'], $product['image_link']); 
        return $this->db->query($query, $values);
    }

    public function search_by_category($categories_id)
    {
        $query = "
            SELECT products.id, products.name, categories.name AS category, products.image_link
            FROM products
            LEFT JOIN products_categories
            ON products.id = products_categories.product_id
            LEFT JOIN categories
            ON products_categories.category_id = categories.id
            WHERE categories.id = ?
            ";
        return $this->db->query($query, $categories_id)->result_array();
    }

    public function search_by_keyword($keyword)
    {
        $query = "SELECT * FROM products WHERE name like '%$keyword%'";
        return $this->db->query($query)->result_array();
    }

    public function show_all_categories()
    {
        $query = "
            SELECT categories.id, categories.name, count(categories.name) AS category_count
            FROM products
            LEFT JOIN products_categories
            ON products.id = products_categories.product_id
            LEFT JOIN categories
            ON products_categories.category_id = categories.id
            GROUP BY categories.name
            ORDER BY categories.name ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function show_category($categories_id)
    {
        $query = "SELECT name FROM categories WHERE id = ?";
        return $this->db->query($query, $categories_id)->row_array();
    }
}
?>