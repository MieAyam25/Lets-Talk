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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img src="image/Group 100.png" class="background">
    <div class="container">

        <h1 id='title' class="title"><span class="lets">LET'S</span><span class="talk"> TALK</span></h1>
        <h4>Join the conversation, share your insights, thought, and take a part in our community. </h4>
        <div class="title-line"></div>

        <form id="uploadForm" enctype="multipart/form-data" autocomplete="off">
            <label for="nickname"></label>
            <input type="text" placeholder="Username" maxlength="12" pattern="[A-Za-z0-9]+" id="nickname" name="nickname" required>


            <input type="file" id="file" name="file" accept="image/jpeg, image/png, image/jpg" required>
            <label for="file">
                <i class="fa fa-camera" aria-hidden="true"></i>
            </label>

            <!-- Live Preview -->
            <div id="imagePreview">
                <img class="photo" src="" id="preview" style="background-color: #7D0A0A; box-shadow: 0em 0.1em 0em 0em #7D0A0A; width: 100%; height: 100%; border-radius: 100%;">
            </div>

            <button type="button" id="joinButton" style="position: absolute" onclick="join()">Join</button>
        </form>

        <div id="warning" class="warning" style="position: absolute">
            Note : Dont use your real name. We disclaims any responsibility for the misuse of information provided.
        </div>


        <script>
            $("#file").change(function() {
                readURL(this);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $("#preview").attr("src", e.target.result);
                        $("#imagePreview").show();
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Submit Form
            function join() {
                var nickname = document.getElementById('nickname').value.trim();
                var file = document.getElementById('file').value.trim(); // Changed from nickname to file

                if (file === '') {
                    // Jika file gambar kosong, tampilkan pesan kesalahan
                    document.getElementById('warning').innerHTML = 'Please insert your profile picture!';
                    return; // Berhenti jika file gambar kosong
                } else if (nickname === '') {
                    // Jika username kosong, tampilkan pesan kesalahan
                    document.getElementById('warning').innerHTML = 'Please insert your username!';
                    return; // Berhenti jika username kosong
                }

                var formData = new FormData($('#uploadForm')[0]);

                $.ajax({
                    type: 'POST',
                    url: 'upload.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Redirect ke halaman chat setelah join
                        window.location.href = 'chat.php?nickname=' + nickname;
                    }
                });
            }
        </script>


    </div>
</body>

</html>