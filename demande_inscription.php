<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <section>
    <div class="conatainer">
    <form action="../includes/file_upload.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="spec">selectioner une specialite</label>
    <select class="form-control" id="spec" name="spec">
      <option>physic</option>
      <option>informatique</option>
      <option>chimie</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload a file</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
   </section> 
</body>
</html>