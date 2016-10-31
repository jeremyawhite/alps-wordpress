<?php
	while(the_flexible_field("primary_structured_content")):
		$grid_layout = get_sub_field('grid_layout');
		if (($grid_layout) == '2up-70-30') {
			$classes = 'g-2up--70-30--at-medium';
		} elseif (($grid_layout) == '2up-50-50') {
			$classes = 'g-2up--at-medium';
		} elseif (($grid_layout) == '3up') {
			$classes = 'g-3up--at-medium with-gutters';
		} else {
			$classes = '';
		}

		$image = get_sub_field('image');
		$image_layout = get_sub_field('image_layout');
		$thumbnail = $image['sizes']['flex-height--s'];
		$alt = $image['alt'];
?>

  <!-- Content Block: Grid -->
	<?php if(get_row_layout() == "content_block_grid"): ?>
    <div class="g <?php echo $classes; ?> pad--primary spacing">
      <div class="gi right-gutter--l">
        <div class="text spacing">
          <?php the_sub_field('grid_item_1'); ?>
        </div>
      </div>
      <div class="gi">
        <div class="text spacing">
          <?php the_sub_field('grid_item_2'); ?>
        </div>
      </div>
      <?php if (($grid_layout) == '3up'): ?>
        <div class="gi">
          <div class="text spacing">
            <?php the_sub_field('grid_item_3'); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <!-- Content Block: Image -->
	<?php if(get_row_layout() == "content_block_image"):?>
		<!-- Full width media image -->
    <?php if (($image_layout) == 'full_width'): ?>
      <picture class="picture">
        <!--[if IE 9]><video style="display: none;"><![endif]-->
				<source srcset="<?php echo wp_get_attachment_image_src($image, "featured__hero--xl")[0]; ?>" media="(min-width: 1100px)">
        <source srcset="<?php echo wp_get_attachment_image_src($image, "featured__hero--l")[0]; ?>" media="(min-width: 900px)">
        <source srcset="<?php echo wp_get_attachment_image_src($image, "featured__hero--m")[0]; ?>" media="(min-width: 500px)">
        <!--[if IE 9]></video><![endif]-->
        <img itemprop="image" srcset="<?php echo wp_get_attachment_image_src($image, "featured__hero--s")[0]; ?>" alt="<?php echo $alt; ?>">
      </picture>
		<!-- Breakout media image -->
    <?php elseif (($image_layout)== 'breakout'): ?>
      <style>
      .breakout-image_<?php echo $image; ?> { background-image: url(<?php echo wp_get_attachment_image_src($image, "featured__hero--s")[0]; ?>); }
      @media (min-width: 500px) {
        .breakout-image_<?php echo $image; ?> { background-image: url(<?php echo wp_get_attachment_image_src($image, "featured__hero--m")[0]; ?>); }
      }
      @media (min-width: 700px) {
        .breakout-image_<?php echo $image; ?> { background-image: url(<?php echo wp_get_attachment_image_src($image, "featured__hero--l")[0]; ?>); }
      }
      @media (min-width: 1200px) {
        .breakout-image_<?php echo $image; ?> { background-image: url(<?php echo wp_get_attachment_image_src($image, "featured__hero--xl")[0]; ?>); }
      }
      </style>
      <div class="breakout has-parallax breakout-image breakout-image_<?php echo $image; ?> bg--cover" data-type="background" data-speed="8"></div>
    <?php endif; ?>
	<?php endif; ?>
<?php endwhile; ?>
