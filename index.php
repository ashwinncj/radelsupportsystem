<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RADEL Support System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .wrapper{
                overflow-x: hidden;
            }
            .sidebar {
                position: absolute;
                min-height: 100vh;
                background-color: #333;
                width: 220px;
            }
            .content {
                min-height: 100vh;
                padding: 20px;
                background: #eee;
                box-shadow: 0 0 5px rgba(0,0,0,1);
                transform: translate3d(0,0,0);
                transition: transform .3s;
            }
            .content.isOpen {
                transform: translate3d(220px,0,0);
            }            
            .content.isSmall {
                transform: translate3d(0px,0,0);
            }
            .close-btn{
                display: none;
            }
            @media(max-width:400px){
                .content.isOpen {
                    transform: translate3d(0px,0,0);
                }
                .content.isSmall {
                    transform: translate3d(220px,0,0);
                }
                .close-btn{
                    display: block;
                }
            }
            .button {
                cursor: pointer;
            }
            .button:before {
                content: '\f0c9';
                font: 42px fontawesome;
            }
            .nav li a {
                position: relative;
                display: block;
                padding: 10px 0 10px 50px;
                font-size: 12px;
                color: #eee;
                border-bottom: 1px solid #222;
            }
            .nav li a:hover {
                background: #444;
                cursor: pointer;
            }
            .active{
                border: 2px solid greenyellow;
            }
            .nav .sub-menu > a{
                background-color: #352d2d;
                padding: 10px 0 10px 70px;
                border: 0;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <div class="text-center">
                    <span style="font-size: 25px; color: whitesmoke">RADEL</span>
                </div>
                <ul class="nav">
                    <li><a href="http://localhost/radelsupportsystem">Create Ticket</a></li>
                    <li><a href="">Tickets</a></li>
                    <li class="sub-menu"><a href="">Open Tickets</a></li>
                    <li class="sub-menu"><a href="">Close Tickets</a></li>
                    <li class="sub-menu"><a href="">All Tickets</a></li>
                    <li><a href="">Help</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Reference</a></li>
                </ul>
            </div>
            <div class="content isOpen">
                <a class="button close-btn" style="text-decoration: none;"></a>
                <p style="font-size: 25px;">Create new Ticket</p>
                <?php
                include_once './form.php';
                ?>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.button').on('click', function () {
                    $('.content').toggleClass('isOpen');
                    $('.content').toggleClass('isSmall');
                });
            });
        </script>
    </body>
</html>