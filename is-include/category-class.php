<?php 

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since  May 2016
 * @since version 0.3.0
 * @version 0.3.5 Beta
 */


/*
	Class Category for manage category 
*/

	class category 
	{
	/*
		Variable of a category for set in database 
	*/

		public $id;
		public $title;
		public $parent;

		/*
			Create a new Category
		*/
			public function create_category($title = '',$parent = '') 
			{
				global $dbc;
				if ($title == '') {
					return 0;
				}
				else {
					$query = $dbc->query("INSERT INTO `category` (id,title,parent) VALUES (id,'$title','$parent')");
					return 1;
				}
			}

		/*
			Get all category and set in array
		*/
			public  function get_all_category()
			{

				global $dbc;
				$all_category = array();

				$query = $dbc->query("SELECT * FROM `category`");
				while ($fq = $dbc->fetch($query) ) {
					$all_category[] = $fq;
				}
				return $all_category;
			}

			/*
				Get all category with parent and child set in array
			*/
				public function get_category_parent_child()
				{
					$get_all_category = self::get_all_category();
					$cat_parent = array();
					foreach ($get_all_category as $cat) {
						$id_cat = $cat['id'];
						$parent_cat = $cat['parent'];
						echo $id_cat;
						$cat_parent[$id_cat][] = $id_cat;

						foreach ($get_all_category as $subcat) {
							if ($id_cat == $subcat['parent']) {
								$cat_parent[$id_cat][] = $subcat['id'];
							}
						}
					}
					return $cat_parent;
				}

			/*
			Get single category
			*/
			public function get_single_category($idcat)
			{
				global $dbc;
				
				$query = $dbc->query("SELECT * FROM `category` WHERE `id` = '$idcat'");
				$cat = $dbc->fetch($query);
				return $cat;
			}

			/*
			Get parent category
			*/
			public function get_parent_category($idparent)
			{
				global $dbc;

				$query = $dbc->query("SELECT * FROM `category` WHERE `id` = '$idparent'");
				$catparent = $dbc->fetch($query);
				return $catparent; 
			}		
		}


			?>