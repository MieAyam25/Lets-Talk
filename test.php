<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <h2>Upload Photo</h2>

    <form id="uploadForm" enctype="multipart/form-data">
        <label for="nickname">Nickname:</label>
        <input type="text" id="nickname" name="nickname" required>

        <label for="file">Select Photo:</label>
        <input type="file" id="file" name="file" accept="image/*" required>
        
        <!-- Live Preview -->
        <div id="imagePreview" style="display: none;">
            <img src="" id="preview" style="width: 100px; height: 100px; border-radius: 50%;">
        </div>

        <button type="button" onclick="uploadPhoto()">Upload</button>
    </form>

    <div id="message"></div>

    <script>
        // Live Preview
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
        function uploadPhoto() {
            var formData = new FormData($('#uploadForm')[0]);

            $.ajax({
                type: 'POST',
                url: 'upload.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#message').html(response);
                }
            });
        }
    </script>
</body>

</html>
