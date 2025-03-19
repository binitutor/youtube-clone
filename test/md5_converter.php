<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>md5</title>
</head>
<body>
    <center>
        <p>password converted to md5 hash</p>
        <input type="text" class="form-control" id="source">
        <h3>output: <span id="result"></span></h3>
    </center>
                                            
<script>
    const inputHandler = function(e) {
        result.innerText = e.target.value;
        outtext = result.innerText;
        // make ajax call to convert it to md5
        convert_to_md5(outtext)
    }
    
    const userInput = document.getElementById("source");
    const result = document.getElementById('result');

    userInput.addEventListener('input', inputHandler);
    userInput.addEventListener('propertychange', inputHandler); // initialization


    function capture_change(){
        const userInput = document.getElementById("userInput").value;
        console.log(userInput)
    }

    function convert_to_md5(in_val){
        const container = document.getElementById('result');
        const xhr = new XMLHttpRequest();  
        xhr.onload = function(){
            if(this.status === 200) {
                container.innerHTML = xhr.responseText;
            } else {
                console.warn('Did not receive 200 OK - partial page SP');
                alert("Your request is not valid. Please contact the site developer.");
            }
        };
        pageURL = 'md5.php?in=' + in_val
        xhr.open('get', pageURL);
        xhr.send();
    }

    
</script>
</body>
</html>