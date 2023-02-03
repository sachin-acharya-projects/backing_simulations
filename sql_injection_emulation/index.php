<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            height: 100vh;
            width: 100%;
            font-family: system-ui;
            background: rgb(2, 14, 27);
            color: white;
            
            display: flex;
            justify-content: center;align-items: center;
            flex-direction: column;
            gap: 10px;
            padding: 10px;
        }
        body::-webkit-scrollbar{width: 0;}
        div {
            height: fit-content;
            width: 450px;
            background: #0d0635;
            padding: 20px;
            border-radius: 10px;
            outline: none;
        }
        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 0px;
            width: 320px;
        }

        input:valid, input:focus {
            width: 300px;
            padding: 10px;
            outline: transparent;
            background: rgb(2, 14, 27);
            border: none;
            border-radius: 10px;    
            background: #0d0635;  
            color: white;      
        }
        
        button {
            width: 100px;
            padding: 10px;
            align-self: flex-start;
            border-radius: 10px;
            outline: none;
            border: none;
            cursor: pointer;
            background: #0d0635;
            color: white;  
        }
        coloring {
            color: orange;
            font-weight: normal;
        }
        coloring.topic {
            color: rgb(182, 106, 6);
            font-weight: 500;
            font-size: 15px;
        }
        div {color: rgb(14, 161, 14); font-weight: 500;}
        p {
            background: dodgerblue;
            color: white;
            text-align: center;
            border-radius: 10px;
            max-width: 400px;
            width: fit-content;
            padding: 10px;
            font-size: 14px;
            user-select: none;
        }
        p.empty {
            /* background: red; */
            padding: 0;
        }
        comment {
            color: dodgerblue;
            font-weight: normal;
            font-size: 12px;
            font-style: italic;
        }
        
        comment coloring {
            font-style: normal;
            font-size: 12px;
        }
        
        comment coloring.topic {
            font-size: 12px;
        }

        a {
            font-size: 12px;
            text-align: left;
            display: block;
            width: 100%;
            padding: 0px 10px;
            width: 300px;
            text-decoration: none;
            color: white;
        }
        a:hover {text-decoration: underline;}
    </style>
</head>
<body>

    <div contenteditable="true">
        <coloring>SELECT * FROM </coloring>`users` <coloring>WHERE </coloring> `username` = '<coloring class="topic">[USERNAME]</coloring>' <coloring>AND</coloring> `password` = '<coloring class="topic">[PASSWORD]</coloring>';
        <br>
        <br>
        <comment>- FOR PASSWORD USE ' OR '1' = '1</comment> <br>
        <comment>
            - USING ' OR '1' = '1, SQL QUERY WILL BE EQUIVALENT (RATHER EQUAL TO)
            <br>
            - <coloring>SELECT * FROM </coloring>`users` <coloring>WHERE </coloring> `username` = '<coloring class="topic">[USERNAME]</coloring>' <coloring>AND</coloring> `password` = '<coloring class="topic">[PASSWORD]</coloring>' <coloring>OR</coloring> '<coloring class="topic">1</coloring>' <coloring>=</coloring> '<coloring class="topic">1</coloring>';
        </comment>
        <br>
        <comment>
            - WHICH ALWAYS EVALUATES TO TRUE
        </comment>
    </div>
    <p class="<?php if(isset($_SESSION['message'])) echo 'messaged'; else echo 'empty'; ?>"> 
        <?php if (isset($_SESSION['message'])) echo $_SESSION['message'];?></p>
    <form action="./login.php" method="POST">
        <input type="text" name="user" placeholder="Username" autocomplete="off-user" value="">
        <input type="password" name="password" id="" placeholder="Password" autocomplete="off-user" value="">
        <a href="/logout.php">Logout</a>
        <button name="login">Login</button>
    </form>
</body>
</html>