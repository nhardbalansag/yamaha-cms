<!DOCTYPE html>
<html>
    <head>
    <title>yamaha megavia capstone</title>
    <style>
    	.button {
            background-color: #3C99DC;
            border: none;
            color: white;
            padding: 12px 50px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 15px 8px;
            cursor: pointer;
            }

            div.just{
            text-align: justify-all;
            } 

            .box {
            background-color: white;
            width: 345px;
            border: 2px solid lightgray;
            padding: 50px;
            margin: 20px;
        }
    </style>
    </head>
    <body>
        <div style = "border: 1px solid gray: padding: 5px: border-radius: 5px">
            <div class="box">
                <center>
                    <h1 style ="color:blue; text-transform: capitalize">yamaha megavia capstone</h1>
                </center>
                <h3>{{$userInfo}}</h3>
                <div class="just">
                    <div>
                        <p>You registered an account on customer's Yamaha Website, before being able to use your account you need to verify that this is your email address by clicking the button below.</p>
                    </div>
                    <div>  	
                        <center>
                            <a href="https://bbalansag.online/account/verify/{{$productInfo['email']}}">click here to confirm email</a>
                        <center>
                    </div>
                    <p>And if not, ignore this message.</p>
                    <p>Thank you!</p>
                    <center>
                        <p>'Copyright 2020 | All Rights Reserved | Powered by capstone project'</p>
                    </center>
                </div>
            </div>
        </div>
    </body> 
</html>