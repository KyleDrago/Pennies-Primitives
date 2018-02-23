<?php
/*
    Template Name: Home Page Template
*/
// $toolBox = new DDDToolBox();

// $imageDir = $toolBox->getUploadDir();
// $responsive = new DDDresponsive();
// console_log($responsive->image('Daisypatch'));
get_header();?>


<div class="col-full home-page-wrapper">
    <h1>Grain Sack Inspired Custom Linens</h1>
    <?php
    do_action('ddd_add_responsive_image', ['Beautiful-Beach-Landscape', '20vw', null, '50vw', null, '100vw', 'This Is The Alt Text', 'home-page-image']);
    ?>
    <p class='font-test-1'>Aenean commodo pellentesque sapien, eget lobortis felis semper eget. In hac habitasse platea dictumst. Duis accumsan sapien et elit dapibus suscipit. Proin ornare, orci quis posuere laoreet, arcu leo suscipit massa, finibus feugiat mi eros non neque. Etiam sagittis lectus at sem hendrerit placerat consequat id mi. In nunc ipsum, placerat nec lectus sed, aliquam blandit ipsum. Integer mi est, congue non euismod vitae, luctus sit amet ex.</p>
    <p class='font-test-2'>Aenean commodo pellentesque sapien, eget lobortis felis semper eget. In hac habitasse platea dictumst. Duis accumsan sapien et elit dapibus suscipit. Proin ornare, orci quis posuere laoreet, arcu leo suscipit massa, finibus feugiat mi eros non neque. Etiam sagittis lectus at sem hendrerit placerat consequat id mi. In nunc ipsum, placerat nec lectus sed, aliquam blandit ipsum. Integer mi est, congue non euismod vitae, luctus sit amet ex.</p>
    <p class='font-test-3'>Aenean commodo pellentesque sapien, eget lobortis felis semper eget. In hac habitasse platea dictumst. Duis accumsan sapien et elit dapibus suscipit. Proin ornare, orci quis posuere laoreet, arcu leo suscipit massa, finibus feugiat mi eros non neque. Etiam sagittis lectus at sem hendrerit placerat consequat id mi. In nunc ipsum, placerat nec lectus sed, aliquam blandit ipsum. Integer mi est, congue non euismod vitae, luctus sit amet ex.</p>
</div>

<?php get_footer();

// $obj = new DDDToolBox();
//   console_log($obj->getCurrentURL());
?>
