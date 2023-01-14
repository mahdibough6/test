<?php
session_start();
include_once './db/db.php';
include_once './includes/func.inc.php';
$data = getDemandes($conn); 
$pageTitle = "boite des demandes";
include_once './includes/header.php';
?>
<section id="boiteDemandesSection">
    <div class="container" >

    <h1>boite des demandes</h1>
    </div>
</section>
<section>
    
<div id="boiteDemandesContainer" class="container d-flex flex-column justify-content-center">

<table>
    <tr><th>id</th>
        <th>nom </th>
        <th>prenom</th>
        <th>email</th>
        <th>tele</th>
        <th>password</th>
        <th>status</th>
        <th>dossier</th>
        <th>phase 1</th>
        <th>phase 2</th>
    </tr>
    
    <?php echo var_dump($data); for ($i = 0; $i < count($data); $i++) { ?>

        <tr>
            <td><?php echo $data[$i]['condidat_id']; ?></td>
            <td><?php echo $data[$i]['nom']; ?></td>
            <td><?php echo $data[$i]['prenom']; ?></td>
            <td><?php echo $data[$i]['email']; ?></td>
            <td><?php echo $data[$i]['tele']; ?></td>
            <td><?php echo $data[$i]['pass']; ?></td>
            <td><?php echo $data[$i]['status']; ?></td>
            <td>
                <form action="./includes/file_download.php" method="post">

                <button class="btn btn-success btn-sm" type="submit" name="submit" value="<?php /* remove the ' signe*/ echo '$data[$i]["user_id"]' ?>">download file</button>
                <input type="hidden" value="<?php echo $data[$i]['nom_doc'];?>" name="fileName">
                </form>
            </td>
            <td>
                <form action="./includes/update_status.php" method="post">
                <div class="form-check">
                  <input class="form-check-input " type="checkbox" name="phase1" value="phase1" id="" <?php echo ($data[$i]["status"] == 'phase1') ?"checked":""?>>
                </div>
            </td>
            <td>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="phase2" value="phase2" id=""<?php echo ($data[$i]["status"] == 'phase2') ?"checked":""?>>
                </div>
                <input type="hidden" name="id" value="<?php echo $data[$i]['condidat_id']?>">
                
            </td>
            <td>
                <button  type="submit" class="btn btn-warning btn-sm">submit</button>
            </td>
</form>
        </tr>
    <?php } ?>
</table>
</div>
</section>
<script>


</script>

<?php
include_once './includes/footer.php';
?>