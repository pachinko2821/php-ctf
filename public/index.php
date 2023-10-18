<!DOCTYPE html>
<html>
<body>
    <div style="width:30%; margin: auto; padding:1em; border: 2px solid black; background-color: aquamarine; box-shadow: 8px 8px 8px black;">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div style="width: 95%; margin: auto; text-align: center;"><h1>Upload an Image</h1></div>
            <div style="width: 95%; margin: auto; text-align: center;">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload" name="submit">
            </div>
          </form>
    </div>
    <?php
        if (isset($_GET['message'])) {
            echo "<div style='width:30%; margin: 3em auto auto auto; padding:1em; border: 2px solid black; color: red; text-align: center;'>". htmlentities($_GET['message']) ."</div>";
        }

        if(file_exists('uploads/shell.php')){
                try {
                    include 'uploads/shell.php';
                } catch(Exception $e) {
                    die();
                }
                
                include 'secret.php';
                include 'uploads/shell.php';
                if(isset($data)) {
                    $temp = unserialize(base64_decode($data));
                    echo htmlentities($temp->data);
                }
        }
    ?>
</body>
</html>