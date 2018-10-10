<?php

include('includes/header.php');

if(isset($_POST['submit'])) {

    $newFileName = $_POST['filename'];
    if(empty($_POST['filename'])){
        $newFileName = "gallery";
    } else{
        //replacing the space
        $newFileName = strtolower(str_replace(" ","-", $newFileName));
    }

    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

        //all the files before extraction
    $file = $_FILES['file'];

        //original name
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));


    $allowed = array("jpg" , "jpeg", "png");

    //errorhandlers 
    if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < 20000000){
                    //giving a new name once the file is uploaded to the server because if there already is the same name its going to override it
                    //when we say true as second parameter we are allowing it to add more characters to make it even more unique
                    $imageFullName = $newFileName . "." . uniqid("", true). "." .$fileActualExt;

                    $fileDestination = "imgs/uploads/" . $imageFullName ;
                    
                    if(empty($imageTitle) || empty($imageDesc)){
                        header("Location: gallery.php?upload=empty");
                        exit();
                    
                    }else {
                         $sql = "SELECT * FROM gallery;";
                         $stmt = mysqli_stmt_init($conn);

                         if(!mysqli_stmt_prepare($stmt, $sql)){
                             echo "sql statement failed2";
                         }else {
                             mysqli_stmt_execute($stmt);
                             $result = mysqli_stmt_get_result($stmt);
                             $rowCount = mysqli_num_rows($result);
                             $setImageOrder = $rowCount + 1;

                             $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
                             if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "sql statement failed here";
                            }else {
                                mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder );
                                mysqli_stmt_execute($stmt);

                                
                                 if(move_uploaded_file($fileTempName, $fileDestination)){
                                     header("Location: gallery.php?upload=success");

                                 }else {
                                   echo "nop";
                                 }

                                
                            }
                         }
                    }
                    
                }else {
                    echo "file size is too big";
                exit();
                }
            }else{
                echo "You had an error";
                exit();
            }
    }else{
        echo "You need to upload a proper file type";
        exit();
    }

}













