<?php

// include_once 'toolbox.php';
// include_once 'gvars.php';
// $toolbox = new DDDToolBox();
// $gvar = new DDDGVAR();
// console_log($gvar->$tabletBreakpoint);
console_log('test');
class DDDresponsive
{
  public function image($imageName)
  {
    // $uploadDir = $toolBox->getUploadDir().'responsive/';
    ?>
    <picture>
      <source
      type='image/webp'
      media='(max-width: <?php $tabletBreakpoint - 1 ?>)'
      srcset=
      '
      <?php echo $uploadDir.$imageName.'-300px.webp' ?> 300w,
      <?php echo $uploadDir.$imageName.'-450px.webp' ?> 450w,
      <?php echo $uploadDir.$imageName.'-600px.webp' ?> 600w,
      <?php echo $uploadDir.$imageName.'-750px.webp' ?> 750w,
      '
      sizes='100vw'
      >
      <source
      type='image/jpeg'
      media='(max-width: <?php $tabletBreakpoint - 1 ?>)'
      srcset=
      '
      <?php echo $uploadDir.$imageName.'-300px.jpg' ?> 300w,
      <?php echo $uploadDir.$imageName.'-450px.jpg' ?> 450w,
      <?php echo $uploadDir.$imageName.'-600px.jpg' ?> 600w,
      <?php echo $uploadDir.$imageName.'-750px.jpg' ?> 750w,
      '
      sizes='100vw'
      >
      <source
      type='image/webp'
      media='(max-width: <?php $desktopBreakpoint - 1 ?>)'
      srcset=
      '
      <?php echo $uploadDir.$imageName.'-900px.webp' ?> 900w
      '
      sizes='100vw'
      >
      <source
      type='image/jpeg'
      media='(max-width: <?php $desktopBreakpoint - 1 ?>)'
      srcset=
      '
      <?php echo $uploadDir.$imageName.'-900px.jpg' ?> 900w
      '
      sizes='100vw'
      >
      <source
      type='image/webp'
      media='(min-width: <?php $desktopBreakpoint ?>)'
      srcset=
      '
      <?php echo $uploadDir.$imageName.'-1050px.webp' ?> 1050w,
      <?php echo $uploadDir.$imageName.'-1200px.webp' ?> 1200w,
      <?php echo $uploadDir.$imageName.'-1350px.webp' ?> 1350w,
      <?php echo $uploadDir.$imageName.'-1500px.webp' ?> 1500w,
      <?php echo $uploadDir.$imageName.'-1750px.webp' ?> 1750w
      '
      sizes='100vw'
      >
      <source
      type='image/jpeg'
      media='(min-width: <?php $desktopBreakpoint ?>)'
      srcset=
      '
      <?php echo $uploadDir.$imageName.'-1050px.jpg' ?> 1050w,
      <?php echo $uploadDir.$imageName.'-1200px.jpg' ?> 1200w,
      <?php echo $uploadDir.$imageName.'-1350px.jpg' ?> 1350w,
      <?php echo $uploadDir.$imageName.'-1500px.jpg' ?> 1500w,
      <?php echo $uploadDir.$imageName.'-1750px.jpg' ?> 1750w
      '
      sizes='100vw'
      >
      <img src='<?php echo $uploadDir.$imageName.'1050px.jpg' ?>' alt='test'>
    </picture>
    <?php
  }
}

?>
