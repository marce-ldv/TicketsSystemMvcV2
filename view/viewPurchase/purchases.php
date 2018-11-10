
<?php if ($messageOk) { ?>
  <div class="alert alert-primary" role="alert">
    <?php echo $messageOk ?>
</div> <?php } ?>

<?php if ($messageWrong) { ?>
  <div class="alert alert-warning" role="alert">
    <?php echo $messageWrong ?>
</div> <?php } ?>

<form class="" action="<?php echo VIEW_URL ?>/purchase/create" method="post">
  <input type="submit" name="" value="Crear Compra :D">
</form>
