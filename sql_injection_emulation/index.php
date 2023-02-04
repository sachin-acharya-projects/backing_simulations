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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
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
            /* background: #0d0635; */
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
            position: relative;
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
            margin-left: 10px;
            padding: 10px;
            align-self: flex-start;
            border-radius: 5px;
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
        div {color: rgb(14, 161, 14); font-weight: 500;margin-top: -100px;}
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
            width: fit-content;
            text-align: center;
            padding: 0px 10px;
            text-decoration: none;
            color: white;

            position: fixed;
            right: 10px;
            top: 10px;
            padding: 8px;
            background-color: dodgerblue;
            border-radius: 5px;
        }
        a:hover {text-decoration: underline;}

        .popup {
            margin-top: 0;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 500px !important;
            height: 340px !important;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: #fff;
            padding: 40px;
            gap: 20px;
            transition: 0.3s;
        }

        .popup.remove {
            height: 0 !important;
            width: 0 !important;
            padding: 0 !important;
            top: 600px;
        }

        .popup.remove * {
            opacity: 0;
        }

        .popup h1 {
            color: #545454;
            font-size: 30px;
            font-family: Montserrat, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif;;
        }
        
        .popup p {
            color: #545454;
            font-size: 18px;
            font-weight: normal;
        }

        .popup button {
            background: #7066E0;
            padding: 10px 17.6px;
            width: 60px;
            height: 39px;
            font-size: 16px;
            align-self: center;
            margin-top: 40px;
            margin-left: 0;
        }
    </style>
</head>
<body>
    <?php
        if (isset($_SESSION['message'])) {
            if ($_SESSION['message'] == 'success') {
                echo "<span class='dull' hidden>1</span>";
            } else {
                echo "<span class='dull' hidden>2</span>"; 
            }
        }
    ?>
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

    <form action="./login.php" method="POST">
        <input type="text" name="user" placeholder="Username" autocomplete="off-user" value="">
        <input type="password" name="password" id="" placeholder="Password" autocomplete="off-user" value="">
        <?php
            if (isset($_SESSION['message'])) {
                    echo '<a href="/logout.php">Logout</a>';
            } 
        ?>
        <button name="login">Login</button>
    </form>
    <script>
        function popup(html) {
            const pop = document.createElement("div")
            pop.innerHTML = html
            pop.style.width = '0'
            pop.style.height = '0'
            document.body.appendChild(pop)
            pop.classList.add("popup")

            requestAnimationFrame(() => {
                pop.style.width = '500px'
                pop.style.height = '500px'
            })
        }
        const templateText = document.querySelector(".dull").textContent
        if (templateText === '1') {
            const template = `
            <h1>Hurray! God Job!!</h1>
            <p>You have successfully hacked the Authentication System</p>
            <button class='close'>OK</button>
            `
            popup(template)
        } else {
            const template = `
            <h1>Oops! Bad Job!!</h1>
            <p>Your attempts were indequate</p>
            <button class='close'>OK</button>
            `
            popup(template)
        }

        document.querySelector('.close').addEventListener('click', closeMe)
        function closeMe() {
            const popup = document.querySelector(".popup")
            popup.classList.add("remove")
            setTimeout(() => document.body.removeChild(popup), 400)
        }
    </script>
</body>
</html>