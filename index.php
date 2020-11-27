<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Test</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="title">ChatBot Test</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there..!</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input type="text" placeholder="Type something here" name="data" id="data" required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                // alert($value);
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+$value+'</p></div></div>';
                // alert($msg);
                $(".form").append($msg);
            
                //Ajax Code
                $.ajax({
                    url: 'msg.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay ='<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+result+'</p></div></div>';
                        $(".form").append($replay);

                        //Scroll Down
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });

            });
        });
    </script>

</body>
</html>