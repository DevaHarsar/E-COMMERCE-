<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
<script src="assets/custom.js"></script>

<script>
  alertify.set('notifier', 'position', 'top-right');
  <?php 
  if(isset($_SESSION['message'])) {
  ?>
    alertify.success('<?=$_SESSION['message'];?>');
    <?php
    unset($_SESSION['message']);
  }
  ?>
</script>
</body>
</html>
