<?php echo $header; ?>
<?php echo $column_left; ?>
<?php echo $column_right; ?>

<div id="content">
  <?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
 
  <div class="box">
    <div class="box-heading"><?php echo $heading_title; ?></div>
    <div class="box-content">
      <form name="formRastreio" method="post" action="?route=rastreioCorreios/rastreio">
        <h2><?php echo $text_info; ?></h2>
        <div class="buttons">
          <div><input required type="text" name="codigo" /></div>
          <br />
          <div class="left"><input type="submit" name="enviar" value="<?php echo $text_button; ?>" class="button" /></div>
          <br /> 
        </div>
      </form>
      <p><?php echo @$resultPost; ?></p>
    </div>
  </div>
 
<?php echo $content_bottom; ?>
</div>
<?php echo $footer; ?>
