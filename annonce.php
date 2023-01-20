   
    <?php
    session_start();
    include_once("./includes/header.php");
        $id = $_GET['id'];
        include_once("./db/db.php");
        $req = "select * from notifications where notification_id =".$id."";
        $result = sqlsrv_query($conn,$req);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $title = $row['titre_notification'];
        $date = $row['date_notification']->format('Y-m-d');
        $text = $row['text_notification'];
        $file = $row['nom_doc_not'];
    ?>








    <div class="card w-50 m-5">
        <div class="card-header"><span class=" fa fa-info-circle fa-2x p-1 bg-bleu"></span><?= $title;?></div>
        <div class="card-body">
                <p><?= $text; ?></p>
                <form action="./includes/file_download.php" method="post">
                    <input type="hidden" name="fileName" value="<?php echo $file?>">
                <p class=""><?= $date; ?></p>
                <br>
                <button type="submit"  class="btn btn-primary " name="submit">download file</button>
</form>
  </div>
</div>
<?php  include_once("./includes/footer.php");      ?>