<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pray_m extends CI_Model
{
	private $table = "pray_note";					//Admin table
	
	public function get_list($where = NULL){
		if($where)
			$this->db->where($where);
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get($this->table)->result_array();
	}

	public function get_show_list(){
		$this->db->where('is_publish', 'yes');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(50);
		return $this->db->get($this->table)->result_array();
	}

	public function get_today_pray_count(){
		$this->db->where('created_at <', date('Y-m-d H:i:s'));
		$this->db->where('created_at >=', date('Y-m-d'));
		return $this->db->get($this->table)->num_rows();
	}


	public function add_pray_note($req){
		$this->db->insert($this->table, $req);
		return $this->db->insert_id();
	}

	public function update_note($info, $where){
		$this->db->where($where);
		$this->db->update($this->table, $info);
	}

	public function delete_note($where){
		$this->db->where($where);
		$this->db->delete($this->table);
	}

	public function get_wp_posts(){
		$query = "
			SELECT 
				wpp.post_title, 
				wpp.guid, 
				wpp.post_date, 
				REPLACE( 
					REPLACE( 
						REPLACE( 
							REPLACE( wpo.option_value, '%year%', DATE_FORMAT(wpp.post_date,'%Y') ),
							'%monthnum%', 
							DATE_FORMAT(wpp.post_date, '%m') 
						), 
						'%day%', 
						DATE_FORMAT(wpp.post_date, '%d') 
					), 
					'%postname%', wpp.post_name 
				) AS permalink
  			FROM SzaooBw_posts wpp
  			JOIN SzaooBw_options wpo
    		ON wpo.option_name = 'permalink_structure'
    		LEFT JOIN SzaooBw_term_relationships wptr
    		ON wptr.object_id = wpp.id
    		LEFT JOIN  SzaooBw_terms wpt
			ON wpt.term_id = wptr.term_taxonomy_id 
			LEFT JOIN SzaooBw_term_taxonomy wptt
			ON wptt.term_id = wpt.term_id
			WHERE wpp.post_type = 'post'
				AND wpp.post_status = 'publish'
			    AND wptt.taxonomy = 'category'
			    AND wpt.name = 'Our Lady Devotional'
			ORDER BY wpp.post_date DESC;";

 		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function get_wp_posts_lord_message(){
		$query = "
			SELECT 
				wpp.post_title, 
				wpp.guid, 
				wpp.post_date, 
				REPLACE( 
					REPLACE( 
						REPLACE( 
							REPLACE( wpo.option_value, '%year%', DATE_FORMAT(wpp.post_date,'%Y') ),
							'%monthnum%', 
							DATE_FORMAT(wpp.post_date, '%m') 
						), 
						'%day%', 
						DATE_FORMAT(wpp.post_date, '%d') 
					), 
					'%postname%', wpp.post_name 
				) AS permalink
  			FROM SzaooBw_posts wpp
  			JOIN SzaooBw_options wpo
    		ON wpo.option_name = 'permalink_structure'
    		LEFT JOIN SzaooBw_term_relationships wptr
    		ON wptr.object_id = wpp.id
    		LEFT JOIN  SzaooBw_terms wpt
			ON wpt.term_id = wptr.term_taxonomy_id 
			LEFT JOIN SzaooBw_term_taxonomy wptt
			ON wptt.term_id = wpt.term_id
			WHERE wpp.post_type = 'post'
				AND wpp.post_status = 'publish'
			    AND wptt.taxonomy = 'category'
			    AND wpt.name = 'Our Lord Message'
			ORDER BY wpp.post_date DESC;";

 		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function get_wp_posts_with_voice_category(){
		$query = "
			SELECT 
				wpp.post_title, 
				wpp.guid, 
				wpp.post_date, 
				REPLACE( 
					REPLACE( 
						REPLACE( 
							REPLACE( wpo.option_value, '%year%', DATE_FORMAT(wpp.post_date,'%Y') ),
							'%monthnum%', 
							DATE_FORMAT(wpp.post_date, '%m') 
						), 
						'%day%', 
						DATE_FORMAT(wpp.post_date, '%d') 
					), 
					'%postname%', wpp.post_name 
				) AS permalink
  			FROM SzaooBw_posts wpp
  			JOIN SzaooBw_options wpo
    		ON wpo.option_name = 'permalink_structure'
    		LEFT JOIN SzaooBw_term_relationships wptr
    		ON wptr.object_id = wpp.id
    		LEFT JOIN  SzaooBw_terms wpt
			ON wpt.term_id = wptr.term_taxonomy_id 
			LEFT JOIN SzaooBw_term_taxonomy wptt
			ON wptt.term_id = wpt.term_id
			WHERE wpp.post_type = 'post'
				AND wpp.post_status = 'publish'
			    AND wptt.taxonomy = 'category'
			    AND wpt.name = 'with voice'
			ORDER BY wpp.post_date DESC;";

 		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function get_wp_posts_angel_number_category(){
		$query = "
			SELECT 
				wpp.post_title, 
				wpp.guid, 
				wpp.post_date, 
				REPLACE( 
					REPLACE( 
						REPLACE( 
							REPLACE( wpo.option_value, '%year%', DATE_FORMAT(wpp.post_date,'%Y') ),
							'%monthnum%', 
							DATE_FORMAT(wpp.post_date, '%m') 
						), 
						'%day%', 
						DATE_FORMAT(wpp.post_date, '%d') 
					), 
					'%postname%', wpp.post_name 
				) AS permalink
  			FROM SzaooBw_posts wpp
  			JOIN SzaooBw_options wpo
    		ON wpo.option_name = 'permalink_structure'
    		LEFT JOIN SzaooBw_term_relationships wptr
    		ON wptr.object_id = wpp.id
    		LEFT JOIN  SzaooBw_terms wpt
			ON wpt.term_id = wptr.term_taxonomy_id 
			LEFT JOIN SzaooBw_term_taxonomy wptt
			ON wptt.term_id = wpt.term_id
			WHERE wpp.post_type = 'post'
				AND wpp.post_status = 'publish'
			    AND wptt.taxonomy = 'category'
			    AND wpt.name = 'Angel Numbers'
			ORDER BY wpp.post_date DESC;";

 		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function get_wp_posts_your_area_prayer($category_name){
		$query = "
			SELECT 
				wpp.post_title, 
				wpp.guid, 
				wpp.post_date, 
				REPLACE( 
					REPLACE( 
						REPLACE( 
							REPLACE( wpo.option_value, '%year%', DATE_FORMAT(wpp.post_date,'%Y') ),
							'%monthnum%', 
							DATE_FORMAT(wpp.post_date, '%m') 
						), 
						'%day%', 
						DATE_FORMAT(wpp.post_date, '%d') 
					), 
					'%postname%', wpp.post_name 
				) AS permalink
  			FROM SzaooBw_posts wpp
  			JOIN SzaooBw_options wpo
    		ON wpo.option_name = 'permalink_structure'
    		LEFT JOIN SzaooBw_term_relationships wptr
    		ON wptr.object_id = wpp.id
    		LEFT JOIN  SzaooBw_terms wpt
			ON wpt.term_id = wptr.term_taxonomy_id 
			LEFT JOIN SzaooBw_term_taxonomy wptt
			ON wptt.term_id = wpt.term_id
			WHERE wpp.post_type = 'post'
				AND wpp.post_status = 'publish'
			    AND wptt.taxonomy = 'category'
			    AND wpt.name = '" . $category_name . "'
			ORDER BY wpp.post_date DESC;";

 		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function get_wp_posts_from_category($category_name){
		$query = "
			SELECT 
				wpp.post_title, 
				wpp.guid, 
				wpp.post_date, 
				REPLACE( 
					REPLACE( 
						REPLACE( 
							REPLACE( wpo.option_value, '%year%', DATE_FORMAT(wpp.post_date,'%Y') ),
							'%monthnum%', 
							DATE_FORMAT(wpp.post_date, '%m') 
						), 
						'%day%', 
						DATE_FORMAT(wpp.post_date, '%d') 
					), 
					'%postname%', wpp.post_name 
				) AS permalink
  			FROM SzaooBw_posts wpp
  			JOIN SzaooBw_options wpo
    		ON wpo.option_name = 'permalink_structure'
    		LEFT JOIN SzaooBw_term_relationships wptr
    		ON wptr.object_id = wpp.id
    		LEFT JOIN  SzaooBw_terms wpt
			ON wpt.term_id = wptr.term_taxonomy_id 
			LEFT JOIN SzaooBw_term_taxonomy wptt
			ON wptt.term_id = wpt.term_id
			WHERE wpp.post_type = 'post'
				AND wpp.post_status = 'publish'
			    AND wptt.taxonomy = 'category'
			    AND wpt.name = '" . $category_name . "'
			ORDER BY wpp.post_date DESC;";

 		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function get_wp_posts_with_image_from_category($category_name){
		$query = "
			SELECT 
				wpp.id,
				wpp.post_title, 
				wpp.guid, 
				wpp.post_date, 
				wpp_image.guid AS image_path,
				REPLACE( 
					REPLACE( 
						REPLACE( 
							REPLACE( wpo.option_value, '%year%', DATE_FORMAT(wpp.post_date,'%Y') ),
							'%monthnum%', 
							DATE_FORMAT(wpp.post_date, '%m') 
						), 
						'%day%', 
						DATE_FORMAT(wpp.post_date, '%d') 
					), 
					'%postname%', wpp.post_name 
				) AS permalink
  			FROM SzaooBw_posts wpp
  			JOIN SzaooBw_options wpo
    		ON wpo.option_name = 'permalink_structure'
    		LEFT JOIN SzaooBw_term_relationships wptr
    		ON wptr.object_id = wpp.id
    		LEFT JOIN  SzaooBw_terms wpt
			ON wpt.term_id = wptr.term_taxonomy_id 
			LEFT JOIN SzaooBw_term_taxonomy wptt
			ON wptt.term_id = wpt.term_id

			LEFT JOIN SzaooBw_postmeta postmeta 
			ON  postmeta.post_id = wpp.id AND meta_key = '_thumbnail_id'
			LEFT JOIN SzaooBw_posts wpp_image 
			ON meta_value = wpp_image.id AND wpp_image.post_type = 'attachment'
			
			WHERE wpp.post_type = 'post'
				AND wpp.post_status = 'publish'
			    AND wptt.taxonomy = 'category'
			    AND wpt.name = '" . $category_name . "'
			ORDER BY wpp.post_date DESC;";

 		$result = $this->db->query($query);
		return $result->result_array();
	}
}

?>