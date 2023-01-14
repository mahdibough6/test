<?php

include_once'./includes/header.php';
?>

<section id="notificationSec">
<div class="container">


<form action="./includes/handle_notifications.php" method="post" enctype="multipart/form-data">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">titre</label>
  <input type="text" name="titre" class="form-control" id="exampleFormControlInput1" placeholder="avis">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">sujet</label>
  <textarea class="form-control" name="sujet" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="formFile" class="form-label">inserer un fichier</label>
  <input class="form-control" type="file" name="file" id="formFile">
</div>
<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</section>



<?php

include_once'./includes/footer.php';

?>