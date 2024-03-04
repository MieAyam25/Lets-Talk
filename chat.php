<?php
// Lakukan koneksi ke database di sini
$conn = mysqli_connect("localhost", "root", "", "upload");

// Cek apakah parameter 'nickname' ada dalam URL
$nickname = isset($_GET['nickname']) ? $_GET['nickname'] : 'Guest';

// Query untuk mengambil informasi foto profil berdasarkan nickname
$query = "SELECT image FROM tb_upload WHERE nickname = '$nickname'";
$result = mysqli_query($conn, $query);

// Inisialisasi variabel $profileImage untuk menyimpan nama file foto profil
$profileImage = '';

// Periksa apakah ada hasil dari query
if ($result && mysqli_num_rows($result) > 0) {
    // Ambil nama file foto profil dari hasil query
    $row = mysqli_fetch_assoc($result);
    $profileImage = $row['image'];
}

// Handle penyimpanan pesan jika ada pengiriman formulir
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    // Ambil teks pesan dari formulir
    $message = $_POST['message'];

    // Lakukan penyimpanan ke dalam tabel tb_message
    $insertQuery = "INSERT INTO tb_message (id, message) VALUES ('$nickname', '$message')";
    mysqli_query($conn, $insertQuery);
    exit; // Keluar dari skrip setelah penyimpanan pesan
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's Talk</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lilita One' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/louis-george-cafe" rel="stylesheet">
    <link rel="stylesheet" href="chat.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <div class="back">
                    <!-- Use JavaScript to navigate back when clicked -->
                    <i id="backButton" class="fa fa-arrow-left" style="font-size: 25px;"></i>
                </div>
                <div id='title' class="title" style="font-size: 35px;"><span class="lets">LET'S</span><span class="talk"> TALK</span></div>
            </div>
            <div class="profile">
                <img id='pfp' src="uploads/<?php echo $profileImage; ?>" alt="Profile Picture">
                <span id='username'>
                    <?php
                    // Cek apakah parameter 'nickname' ada dalam URL
                    $nickname = isset($_GET['nickname']) ? $_GET['nickname'] : 'Guest';
                    // Menampilkan username di halaman chat
                    echo $nickname;
                    ?>
                </span>
            </div>
        </nav>
        <div class="chat-container">
            <!-- Tempat pesan-pesan ditampilkan -->
        </div>
        <div class="form-chat">
            <div class="chat-form" style="width: 100%; max-width: 680px" id="message-form">
                <input type="hidden" id="user-id" value="<?php echo $userId; ?>"><!-- Assuming you have the user ID -->
                <input type="text" id="message-input" placeholder="Say something...">
                <button type="button" class="fa fa-paper-plane" id="sendButton"></button>
            </div>
        </div>
    </div>

    <script>
        // Add event listener to the back button
        document.getElementById('backButton').addEventListener('click', function() {
            // Navigate back to the previous page
            window.history.back();
        });
        $(document).ready(function() {  
            $("#sendButton").click(function() {
                // Ambil teks pesan dari input
                var message = $("#message-input").val().trim();

                // Kirim teks pesan ke skrip PHP menggunakan AJAX
                $.post("save_message.php", {
                    message: message
                }, function(data, status) {
                    // Lakukan sesuatu setelah pengiriman berhasil, jika diperlukan
                    console.log("Pesan terkirim: " + message);
                });

                // Kosongkan input setelah pengiriman pesan
                $("#message-input").val('');
            });
        });
    </script>
</body>

</html>