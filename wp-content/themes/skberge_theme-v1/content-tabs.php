<?php
					if(have_posts()){

                            $arg= array(
                              'post_type'      => 'destacados',
                              'posts_per_page' =>  3,
                              'orderby'        => 'title',
                              'order'          => 'ASC',
                              'category_name'  => 'mitsubishi'
                            );

                            $the_query = new WP_Query($arg);
                            $cat       = get_term_by('slug','mitsubishi','category');

                            echo '<div class="tab-pane fade show active" id="v-pills-'.$cat->slug.'" role="tabpanel" aria-labelledby="v-pills-'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca        = get_field('marca');
                            $sku          = get_field('sku');
                            $precio       = get_field('precio');
                            $id           = get_the_ID();

                            foreach((get_the_category()) as $category) {
                            echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">';
                            echo '<article class="contenCard">';
                            echo '<div class="headerCard">';
                            echo the_post_thumbnail('squere', array('class' => 'img-fluid'));
                            echo '</div>';
                            echo '<div class="headerBody">';
                            echo '<ul class="list-group list-group-flush">';
                            echo '<li class="list-group-item destacado text-uppercase" id="'.'destacado-'.$id.'">'.get_the_title().'</li>';
                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
                            echo '<li class="list-group-item sku text-uppercase" id="'.'sku-'.$id.'">SKU: '.$sku.'</li>';
                            echo '</ul>';
                            echo '<span class="precio" id="'.'precio-'.$id.'"><h3>$ '.$precio.'</h3></span>';
                            echo '</div>';
                            echo '<div class="headerFooter">';
                            echo ' <a class="btn btn-lg btn-cotizar bloque" href="'.get_category_link($category->cat_ID).'">Cotizar</a>';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';
                        	}
                            endwhile;
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos Mitsubishi/h3>';
                          }
                          wp_reset_postdata();


                          if(have_posts()){
                            $arg= array(
                              'post_type'      => 'destacados',
                              'posts_per_page' =>  3,
                              'orderby'        => 'title',
                              'order'          => 'ASC',
                              'category_name'  => 'ssangyong'
                            );
                            $the_query = new WP_Query($arg);
                            $cat       = get_term_by('slug','ssangyong','category');

                            echo '<div class="tab-pane fade" id="v-pills-'.$cat->slug.'" role="tabpanel" aria-labelledby="v-pills-'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca        = get_field('marca');
                            $sku          = get_field('sku');
                            $precio       = get_field('precio');
                            $id           = get_the_ID();
                            foreach((get_the_category()) as $category) {
	                            echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">';
	                            echo '<article class="contenCard">';
	                            echo '<div class="headerCard">';
	                            echo the_post_thumbnail('squere', array('class' => 'img-fluid'));
	                            echo '</div>';
	                            echo '<div class="headerBody">';
	                            echo '<ul class="list-group list-group-flush">';
	                            echo '<li class="list-group-item destacado text-uppercase" id="'.'destacado-'.$id.'">'.get_the_title().'</li>';
	                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
	                            echo '<li class="list-group-item sku text-uppercase" id="'.'sku-'.$id.'">SKU: '.$sku.'</li>';
	                            echo '</ul>';
	                            echo '<span class="precio" id="'.'precio-'.$id.'"><h3>$ '.$precio.'</h3></span>';
	                            echo '</div>';
	                            echo '<div class="headerFooter">';
	                            echo ' <a class="btn btn-lg btn-cotizar bloque" href="'.get_category_link($category->cat_ID).'">Cotizar</a>';
	                            echo '</div>';
	                            echo '</article>';
	                            echo '</div>';
                        	}
                            endwhile;
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos Ssangyong</h3>';
                          }
                          wp_reset_postdata();

                        if(have_posts()){
                            $arg= array(
                              'post_type'      => 'destacados',
                              'posts_per_page' =>  3,
                              'orderby'        => 'title',
                              'order'          => 'ASC',
                              'category_name'  => 'fiat'
                            );
                            $the_query = new WP_Query($arg);
                            $cat       = get_term_by('slug','fiat','category');

                            echo '<div class="tab-pane fade" id="v-pills-'.$cat->slug.'" role="tabpanel" aria-labelledby="v-pills-'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca        = get_field('marca');
                            $sku          = get_field('sku');
                            $precio       = get_field('precio');
                            $id           = get_the_ID();

                            foreach((get_the_category()) as $category) {
	                            echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">';
	                            echo '<article class="contenCard">';
	                            echo '<div class="headerCard">';
	                            echo the_post_thumbnail('squere', array('class' => 'img-fluid'));
	                            echo '</div>';
	                            echo '<div class="headerBody">';
	                            echo '<ul class="list-group list-group-flush">';
	                            echo '<li class="list-group-item destacado text-uppercase" id="'.'destacado-'.$id.'">'.get_the_title().'</li>';
	                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
	                            echo '<li class="list-group-item sku text-uppercase" id="'.'sku-'.$id.'">SKU: '.$sku.'</li>';
	                            echo '</ul>';
	                            echo '<span class="precio" id="'.'precio-'.$id.'"><h3>$ '.$precio.'</h3></span>';
	                            echo '</div>';
	                            echo '<div class="headerFooter">';
	                            echo ' <a class="btn btn-lg btn-cotizar bloque" href="'.get_category_link($category->cat_ID).'">Cotizar</a>';
	                            echo '</div>';
	                            echo '</article>';
	                            echo '</div>';
                        	}
                            endwhile;
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos FIAT</h3>';
                          }
                          wp_reset_postdata();

                        if(have_posts()){
                            $arg= array(
                              'post_type'      => 'destacados',
                              'posts_per_page' =>  3,
                              'orderby'        => 'title',
                              'order'          => 'ASC',
                              'category_name'  => 'jeep'
                            );
                            $the_query = new WP_Query($arg);
                            $cat       = get_term_by('slug','jeep','category');

                            echo '<div class="tab-pane fade" id="v-pills-'.$cat->slug.'" role="tabpanel" aria-labelledby="v-pills-'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca        = get_field('marca');
                            $sku          = get_field('sku');
                            $precio       = get_field('precio');
                            $id           = get_the_ID();
                            foreach((get_the_category()) as $category) {
	                            echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">';
	                            echo '<article class="contenCard">';
	                            echo '<div class="headerCard">';
	                            echo the_post_thumbnail('squere', array('class' => 'img-fluid'));
	                            echo '</div>';
	                            echo '<div class="headerBody">';
	                            echo '<ul class="list-group list-group-flush">';
	                            echo '<li class="list-group-item destacado text-uppercase" id="'.'destacado-'.$id.'">'.get_the_title().'</li>';
	                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
	                            echo '<li class="list-group-item sku text-uppercase" id="'.'sku-'.$id.'">SKU: '.$sku.'</li>';
	                            echo '</ul>';
	                            echo '<span class="precio" id="'.'precio-'.$id.'"><h3>$ '.$precio.'</h3></span>';
	                            echo '</div>';
	                            echo '<div class="headerFooter">';
	                            echo ' <a class="btn btn-lg btn-cotizar bloque" href="'.get_category_link($category->cat_ID).'">Cotizar</a>';
	                            echo '</div>';
	                            echo '</article>';
	                            echo '</div>';
                        	}
                            endwhile;
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos JEEP</h3>';
                          }
                          wp_reset_postdata();

                        if(have_posts()){
                            $arg= array(
                              'post_type'      => 'destacados',
                              'posts_per_page' =>  3,
                              'orderby'        => 'title',
                              'order'          => 'ASC',
                              'category_name'  => 'ram'
                            );
                            $the_query = new WP_Query($arg);
                            $cat       = get_term_by('slug','ram','category');

                            echo '<div class="tab-pane fade" id="v-pills-'.$cat->slug.'" role="tabpanel" aria-labelledby="v-pills-'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca        = get_field('marca');
                            $sku          = get_field('sku');
                            $precio       = get_field('precio');
                            $id           = get_the_ID();

                            foreach((get_the_category()) as $category) {
	                            echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">';
	                            echo '<article class="contenCard">';
	                            echo '<div class="headerCard">';
	                            echo the_post_thumbnail('squere', array('class' => 'img-fluid'));
	                            echo '</div>';
	                            echo '<div class="headerBody">';
	                            echo '<ul class="list-group list-group-flush">';
	                            echo '<li class="list-group-item destacado text-uppercase" id="'.'destacado-'.$id.'">'.get_the_title().'</li>';
	                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
	                            echo '<li class="list-group-item sku text-uppercase" id="'.'sku-'.$id.'">SKU: '.$sku.'</li>';
	                            echo '</ul>';
	                            echo '<span class="precio" id="'.'precio-'.$id.'"><h3>$ '.$precio.'</h3></span>';
	                            echo '</div>';
	                            echo '<div class="headerFooter">';
	                            echo ' <a class="btn btn-lg btn-cotizar bloque" href="'.get_category_link($category->cat_ID).'">Cotizar</a>';
	                            echo '</div>';
	                            echo '</article>';
	                            echo '</div>';
                        	}
                            endwhile;
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos RAM</h3>';
                          }
                          wp_reset_postdata();

                         if(have_posts()){
                            $arg= array(
                              'post_type'      => 'destacados',
                              'posts_per_page' =>  3,
                              'orderby'        => 'title',
                              'order'          => 'ASC',
                              'category_name'  => 'dodge'
                            );
                            $the_query = new WP_Query($arg);
                            $cat       = get_term_by('slug','dodge','category');

                            echo '<div class="tab-pane fade" id="v-pills-'.$cat->slug.'" role="tabpanel" aria-labelledby="v-pills-'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca        = get_field('marca');
                            $sku          = get_field('sku');
                            $precio       = get_field('precio');
                            $id           = get_the_ID();
                            foreach((get_the_category()) as $category) {
                            echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">';
                            echo '<article class="contenCard">';
                            echo '<div class="headerCard">';
                            echo the_post_thumbnail('squere', array('class' => 'img-fluid'));
                            echo '</div>';
                            echo '<div class="headerBody">';
                            echo '<ul class="list-group list-group-flush">';
                            echo '<li class="list-group-item destacado text-uppercase" id="'.'destacado-'.$id.'">'.get_the_title().'</li>';
                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
                            echo '<li class="list-group-item sku text-uppercase" id="'.'sku-'.$id.'">SKU: '.$sku.'</li>';
                            echo '</ul>';
                            echo '<span class="precio" id="'.'precio-'.$id.'"><h3>$ '.$precio.'</h3></span>';
                            echo '</div>';
                            echo '<div class="headerFooter">';
                            echo ' <a class="btn btn-lg btn-cotizar bloque" href="'.get_category_link($category->cat_ID).'">Cotizar</a>';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';
                       		 }
                            endwhile;
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos DODGE</h3>';
                          }
                          wp_reset_postdata();
					 ?>