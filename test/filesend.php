<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Send Test</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input id="file-to-upload" type="file" name="file-to-upload">
        <button id="btn-submit">upload</button>

    </form>
    <div id="resp"></div>

    <script>
        document.querySelector('#btn-submit').addEventListener('click' , function(ev){
            ev.preventDefault();
            /**
             * formData() representing form fields
             * https://developer.mozilla.org/en-US/docs/Web/API/FormData
             */
            formData = new FormData(); 
            /**
             * fileToUpload [input file]
             * input file has property called [files] contain 1 or multiple files
             * i use one file so i get 0 index file => image.files[0]
             */
            fileToUpload = document.querySelector('#file-to-upload');
            formData.append('fileToUpload' , fileToUpload.files[0]);
            /**
             * XMLHttpRequest
             */
            var xhr = new XMLHttpRequest();
            xhr.open('POST' , 'page.php' , true);
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4){
                    // console.log(this.responseText);
                    document.getElementById('resp').innerHTML = this.responseText
                }
            }
            xhr.send(formData);
        });
    </script>
</body>
</html>