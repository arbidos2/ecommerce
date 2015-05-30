<?php
class Product extends CI_Model
{
	
	public function get_all_products()
    {
        $query = "
            SELECT products.id, products.name, products.price, round(avg(reviews.rating), 1) AS rating, products.image_link
            FROM products
            LEFT JOIN reviews
            ON products.id = reviews.product_id
            GROUP BY products.id
            ";
        return $this->db->query($query)->result_array();
    }

	public function get_product($product_id)
    {
        $query = "
            SELECT products.id, products.name, categories.id AS category_id, products.description, products.price, products.image_link
            FROM products
            LEFT JOIN products_categories
            ON products.id = products_categories.product_id
            LEFT JOIN categories
            ON products_categories.category_id = categories.id
            WHERE products.id = $product_id
                ";
        return $this->db->query($query, array($product_id))->row_array();
    }

    public function add_product($product)
    {
        $query = "INSERT INTO products (name, description, quantity, price, image_link) VALUES (?,?,?,?,?)";
        $values = array($product['name'], $product['description'], $product['quantity'], $product['price'], $product['image_link']); 
        return $this->db->query($query, $values);
    }

    public function search($categories_id, $condition)
    {
        // Prevents previous category stored in session from being updated
        if (!$this->session->userdata('previous')){
            $this->session->set_userdata('previous', $categories_id);
        }
        // If category changes because user clicks on different category, then set keyword equal to null.
        if ($this->session->userdata('previous') !== $categories_id){
            $keyword = "";
            $this->session->unset_userdata('keyword');
        } else {
            $keyword = $this->session->userdata('keyword');
        }
        // $categories_id is set to be 0 when Show All is clicked.
        if ($categories_id == 0 && !$condition){
            $query = "
                SELECT products.id, products.name, products.price, round(avg(reviews.rating), 1) AS rating, products.image_link
                FROM products
                LEFT JOIN products_categories
                ON products.id = products_categories.product_id
                LEFT JOIN reviews
                ON products.id = reviews.product_id
                LEFT JOIN categories
                ON products_categories.category_id = categories.id
                WHERE categories.id > $categories_id AND products.name LIKE '%$keyword%'
                GROUP BY products.id
            ";
        } else if ($categories_id == 0 && $condition == "Most Popular"){ // Set the query to return products in order by ratings.
            $query = "
                SELECT products.id, products.name, products.price, round(avg(reviews.rating), 1) AS rating, products.image_link
                FROM products
                LEFT JOIN products_categories
                ON products.id = products_categories.product_id
                LEFT JOIN reviews
                ON products.id = reviews.product_id
                LEFT JOIN categories
                ON products_categories.category_id = categories.id
                WHERE categories.id > $categories_id AND products.name LIKE '%$keyword%'
                GROUP BY products.name
                ORDER BY rating DESC
            ";
        } else if ($categories_id == 0 && $condition == "Price: Highest - Lowest"){
            $query = "
                SELECT products.id, products.name, products.price, round(avg(reviews.rating), 1) AS rating, products.image_link
                FROM products
                LEFT JOIN products_categories
                ON products.id = products_categories.product_id
                LEFT JOIN reviews
                ON products.id = reviews.product_id
                LEFT JOIN categories
                ON products_categories.category_id = categories.id
                WHERE categories.id > $categories_id AND products.name LIKE '%$keyword%'
                GROUP BY products.name
                ORDER BY products.price DESC
            ";
        } else if ($categories_id == 0 && $condition == "Price: Lowest - Highest"){
            $query = "
                SELECT products.id, products.name, products.price, round(avg(reviews.rating), 1) AS rating, products.image_link
                FROM products
                LEFT JOIN products_categories
                ON products.id = products_categories.product_id
                LEFT JOIN reviews
                ON products.id = reviews.product_id
                LEFT JOIN categories
                ON products_categories.category_id = categories.id
                WHERE categories.id > $categories_id AND products.name LIKE '%$keyword%'
                GROUP BY products.name
                ORDER BY products.price ASC
            ";
        } else if ($categories_id !== 0 && $condition == "Most Popular") {
            $query = "
                SELECT products.id, products.name, products.price, round(avg(reviews.rating), 1) AS rating, categories.name AS category, products.image_link
                FROM products
                LEFT JOIN products_categories
                ON products.id = products_categories.product_id
                LEFT JOIN reviews
                ON products.id = reviews.product_id
                LEFT JOIN categories
                ON products_categories.category_id = categories.id
                WHERE categories.id = $categories_id AND products.name LIKE '%$keyword%'
                GROUP BY products.name
                ORDER BY rating DESC
                ";
        }  else if ($categories_id !== 0 && $condition == "Price: Highest - Lowest") {
            $query = "
                SELECT products.id, products.name, products.price, round(avg(reviews.rating), 1) AS rating, categories.name AS category, products.image_link
                FROM products
                LEFT JOIN products_categories
                ON products.id = products_categories.product_id
                LEFT JOIN reviews
                ON products.id = reviews.product_id
                LEFT JOIN categories
                ON products_categories.category_id = categories.id
                WHERE categories.id = $categories_id AND products.name LIKE '%$keyword%'
                GROUP BY products.name
                ORDER BY products.price DESC
                ";
        }  else if ($categories_id !== 0 && $condition == "Price: Lowest - Highest") {
            $query = "
                SELECT products.id, products.name, products.price, round(avg(reviews.rating), 1) AS rating, categories.name AS category, products.image_link
                FROM products
                LEFT JOIN products_categories
                ON products.id = products_categories.product_id
                LEFT JOIN reviews
                ON products.id = reviews.product_id
                LEFT JOIN categories
                ON products_categories.category_id = categories.id
                WHERE categories.id = $categories_id AND products.name LIKE '%$keyword%'
                GROUP BY products.name
                ORDER BY products.price ASC
                ";
        } else {
            $query = "
                SELECT products.id, products.name, products.price, round(avg(reviews.rating), 1) AS rating, categories.name AS category, products.image_link
                FROM products
                LEFT JOIN products_categories
                ON products.id = products_categories.product_id
                LEFT JOIN reviews
                ON products.id = reviews.product_id
                LEFT JOIN categories
                ON products_categories.category_id = categories.id
                WHERE categories.id = $categories_id AND products.name LIKE '%$keyword%'
                GROUP BY products.name
                ";
        }
        // Refreshes session of previous category
        $this->session->set_userdata('previous', $categories_id);
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

    public function show_similar($similar_category, $selected_product)
    {
        $query = "
            SELECT products.id, products.name, categories.name AS category, round(avg(reviews.rating), 1) AS rating, products.price, products.image_link
            FROM products
            LEFT JOIN products_categories
            ON products.id = products_categories.product_id
            LEFT JOIN categories
            ON products_categories.category_id = categories.id
            LEFT JOIN reviews
            ON products.id = reviews.product_id
            WHERE categories.id = $similar_category AND products.id != $selected_product
            GROUP BY products.id
            ORDER BY rating DESC
            LIMIT 0, 8
                ";
        return $this->db->query($query)->result_array();
    }
}
?>