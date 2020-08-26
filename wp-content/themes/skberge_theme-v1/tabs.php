<?php
					$argsMitsu = array(
					    'post_type'      => 'destacados',
					    'posts_per_page' => 1,
					    'category_name'  => 'mitsubishi'
					);
					$the_queryMitsu = new WP_Query($argsMitsu);
					while($the_queryMitsu->have_posts()) : $the_queryMitsu->the_post();
						if (in_category('mitsubishi')) {
							$cat = get_term_by('slug','mitsubishi','category');
							echo '<a class="btn btn-success text-uppercase active" id="v-pills-'.$cat->slug.'-tab" data-toggle="pill" href="#v-pills-'.$cat->slug.'" role="tab" aria-controls="v-pills-'.$cat->slug.'" aria-selected="true">DESTACADO '.$cat->slug.'</a>';
						}
					endwhile;
					wp_reset_postdata();

					$argsSsang= array(
					    'post_type'      => 'destacados',
					    'posts_per_page' => 1,
					    'category_name'  => 'ssangyong'
					);
					$the_querySsang = new WP_Query($argsSsang);
					while($the_querySsang->have_posts()) : $the_querySsang->the_post();
						if (in_category('ssangyong')) {
							$cat = get_term_by('slug','ssangyong','category');
							echo '<a class="btn btn-success text-uppercase" id="v-pills-'.$cat->slug.'-tab" data-toggle="pill" href="#v-pills-'.$cat->slug.'" role="tab" aria-controls="v-pills-'.$cat->slug.'" aria-selected="true">DESTACADO '.$cat->slug.'</a>';
						}
					endwhile;
					wp_reset_postdata();

					$argsFiat = array(
					    'post_type'      => 'destacados',
					    'posts_per_page' => 1,
					    'category_name'  => 'fiat'
					);
					$the_queryFiat = new WP_Query($argsFiat);
					while($the_queryFiat->have_posts()) : $the_queryFiat->the_post();
						if (in_category('fiat')) {
							$cat = get_term_by('slug','fiat','category');
							echo '<a class="btn btn-success text-uppercase" id="v-pills-'.$cat->slug.'-tab" data-toggle="pill" href="#v-pills-'.$cat->slug.'" role="tab" aria-controls="v-pills-'.$cat->slug.'" aria-selected="true">DESTACADO '.$cat->slug.'</a>';
						}
					endwhile;
					wp_reset_postdata();

					$argsJeep = array(
					    'post_type'      => 'destacados',
					    'posts_per_page' => 1,
					    'category_name'  => 'jeep'
					);
					$the_queryJeep = new WP_Query($argsJeep);
					while($the_queryJeep->have_posts()) : $the_queryJeep->the_post();
						if (in_category('jeep')) {
							$cat = get_term_by('slug','jeep','category');
							echo '<a class="btn btn-success text-uppercase" id="v-pills-'.$cat->slug.'-tab" data-toggle="pill" href="#v-pills-'.$cat->slug.'" role="tab" aria-controls="v-pills-'.$cat->slug.'" aria-selected="true">DESTACADO '.$cat->slug.'</a>';
						}
					endwhile;
					wp_reset_postdata();

					$argsRam = array(
					    'post_type'      => 'destacados',
					    'posts_per_page' => 1,
					    'category_name'  => 'ram'
					);
					$the_queryRam = new WP_Query($argsRam);
					while($the_queryRam->have_posts()) : $the_queryRam->the_post();
						if (in_category('ram')) {
							$cat = get_term_by('slug','ram','category');
							echo '<a class="btn btn-success text-uppercase" id="v-pills-'.$cat->slug.'-tab" data-toggle="pill" href="#v-pills-'.$cat->slug.'" role="tab" aria-controls="v-pills-'.$cat->slug.'" aria-selected="true">DESTACADO '.$cat->slug.'</a>';
						}
					endwhile;
					wp_reset_postdata();

					$argsDodge = array(
					    'post_type'      => 'destacados',
					    'posts_per_page' => 1,
					    'category_name'  => 'dodge'
					);
					$the_queryDodge = new WP_Query($argsDodge);
					while($the_queryDodge->have_posts()) : $the_queryDodge->the_post();
						if (in_category('dodge')) {
							$cat = get_term_by('slug','dodge','category');
							echo '<a class="btn btn-success text-uppercase" id="v-pills-'.$cat->slug.'-tab" data-toggle="pill" href="#v-pills-'.$cat->slug.'" role="tab" aria-controls="v-pills-'.$cat->slug.'" aria-selected="true">DESTACADO '.$cat->slug.'</a>';
						}
					endwhile;
					wp_reset_postdata();


?>