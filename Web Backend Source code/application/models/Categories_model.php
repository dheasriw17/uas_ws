<?php class Categories_model extends CI_Model{
    protected $table_name;
    protected $primary_key;
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'categories';
        $this->primary_key= 'category_id';
    }
	 /**
     * Product category Data listing with filter
     * @param array $filter add database fields with value in array for filter and condition
     * @param string $search search value from product category table
     * @param string $offcet for set starting point of limit
     * @param string $limit for set number of rows in limit
     * @return array
     */
    function get($filter = array(),$search = "",$offcet="",$limit=""){
        if(!empty($filter))
        {
            $this->db->where($filter);
        }
        if($search != ""){
            $this->db->or_like(array($this->table_name.'.cat_name_en'=>$search,
                                    $this->table_name.'.cat_name_ar'=>$search));
        }
        $this->db->select("{$this->table_name}.*, ifnull(items.total_items,0) as total_items");
        $this->db->join("(select count(*) as total_items,category_id from products group by category_id) as items","items.category_id = categories.category_id","left");
        $this->db->where($this->table_name.".draft","0");		
        if($offcet !="" && $limit != ""){
            $this->db->limit($limit,$offcet);
        }
        $this->db->order_by("cat_sort_order");
        $q = $this->db->get($this->table_name);
        return $q->result();

    }
	/**
	* get product category by id
	* @param string $id for product category id
	* @return object
	*/ 	
    function get_by_id($id){
        $this->db->where($this->table_name.".".$this->primary_key,$id);
        $q = $this->db->get($this->table_name);
        return $q->row();
    }
}
