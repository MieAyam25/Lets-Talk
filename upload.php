<?php
$conn = mysqli_connect("localhost", "root", "", "upload");

// Check if nickname is provided
if (empty($_POST['nickname'])) {
    echo "Please insert a username";
    exit;
}

if (isset($_FILES['file']['name'])) {
    $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
    $imageName = $_FILES["file"]["name"];
    $tmpName = $_FILES["file"]["tmp_name"];

    // Periksa apakah file gambar diunggah
    if (!empty($imageName)) {

        // Image extension validation
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);

        $name = $imageExtension[0];
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "Invalid Extension";
            exit;
        } else {
            $newImageName = $name . "-" . uniqid(); // Generate new image name
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'uploads/' . $newImageName);
            $query = "INSERT INTO tb_upload (nickname, image) VALUES ('$nickname', '$newImageName')";
            mysqli_query($conn, $query);
            echo "Successfully Added";
            exit;
        }
    } else {
        // Jika tidak ada file gambar yang diunggah, lakukan hanya operasi penyimpanan nickname
        $query = "INSERT INTO tb_upload (nickname) VALUES ('$nickname')";
        mysqli_query($conn, $query);
        echo "Successfully Added";
        exit;
    }
}
