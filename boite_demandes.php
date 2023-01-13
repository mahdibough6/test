<?php

include_once './db/db.php';
include_once './includes/func.inc.php';
$data = getDemandes($conn); 
$pageTitle = "boite des demandes";
include_once './includes/header.php';
?>
<section>
    <div class="container">

    <h1>boite des demandes</h1>
    </div>
</section>
<section>
    
<div class="container d-flex flex-column justify-content-center">

<table>
    <tr><th>id</th>
        <th>nom </th>
        <th>prenom</th>
        <th>email</th>
        <th>tele</th>
        <th>password</th>
        <th>dossier</th>
        <th>phase 1</th>
        <th>phase 2</th>
    </tr>
    <?php for ($i = 0; $i < count($data); $i++) { ?>

        <tr>
            <td><?php echo $data[$i]['user_id']; ?></td>
            <td><?php echo $data[$i]['nom']; ?></td>
            <td><?php echo $data[$i]['prenom']; ?></td>
            <td><?php echo $data[$i]['email']; ?></td>
            <td><?php echo $data[$i]['tele']; ?></td>
            <td><?php echo $data[$i]['pass']; ?></td>
            <td>
                <form action="./includes/file_upload.php" method="post">

                <button type="submit" name="submit" value="<?php /* remove the ' signe*/ echo '$data[$i]["user_id"]' ?>">download file</button>
                </form>
            </td>
            <td>
                <form action="./includes/update_status.php" method="post">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="phase1" value="phase1" id="">
                </div>
</form>
            </td>
            <td>
                <form action="./includes/update_status.php" method="post">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="phase2" value="phase2" id="">
</form>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>
</div>
</section>
<script>


</script>

<?php
include_once '../includes/header.php';
?>