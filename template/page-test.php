<?php
/*
    Template Name: Test Page Template
*/

// $imageDir = content_url() . "/uploads/";
// get_header();
$imageDir = 'test/' ?>

<!-- @@include('content.html') -->

<picture>
  <source
  media="(min-width: 650px)"
  srcset="<?php echo $imageDir ?>Anchors.jpg 650w,
  <?php echo $imageDir ?>Daisypatch.jpg 800w,
  <?php echo $imageDir ?>Dark-Brown.jpg 1000w,
  <?php echo $imageDir ?>Dark-Green.jpg 1200w"
  sizes="50vw"
  >
  <source media="(min-width: 465px)" srcset="<?php echo $imageDir ?>Blueberry-Orchard.jpg">
  <img src="<?php echo $imageDir ?>Boulangerie-Bee.jpg" alt="Flowers">
</picture>


<?php //get_footer(); ?>
