<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Products 2 Feed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="center-align">Products 2 Feed</h1>
    <div class="row">
      <div class="col s6 offset-s3">
        <div class="row card-panel center-align">
          <form class="col s12" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="row">
              <h5>Upload CSV</h5>
              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" name="feedUpload" type="text">
                </div>
              </div>
            </div>
            <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action" value="Upload File">Submit
              <i class="material-icons right">send</i>
            </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row">
      <div class='col s6'>
        <p>Output</p>
      </div>
      <div class='col s6 right-align'>
        <button class="btn waves-effect waves-light copy" class='right-align'>Copy <i class="material-icons right">assignment</i></h4>
      </div>
    </div>
    <div class="card-panel">
      <pre>
        <code class="language-js output">
          <?php
            if ($_FILES['file']) {

              if (($handle = fopen($_FILES['file']['tmp_name'], 'r')) === false) {
                  die('Error opening file');
              }

              $headers = fgetcsv($handle, 1024, ',');
              $headers = array_map('strtolower', $headers);
              
              $complete = array();

              while ($row = fgetcsv($handle, 1024, ',')) {
                  $complete[] = array_combine($headers, $row);
              }

              fclose($handle);

              echo json_encode($complete, JSON_PRETTY_PRINT);

            } else {

              echo 'Upload your file above!';

            }
          ?>
        </code>
      </pre>
    </div>
  </div>

  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="./script.js"></script>
</html>
