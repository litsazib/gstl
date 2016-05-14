<?php 

function themes_taxonomy() {  
   register_taxonomy(  
        'themes_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'service',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'service categories',  //Display name
            'query_var' => true,
			'public'=>true,
            'rewrite' => array(
                'slug' => 'themes', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'themes_taxonomy');
?>