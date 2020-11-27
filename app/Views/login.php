<!DOCTYPE html> 
<html lang="es">
    <head>
    <!--META and TITLE-->    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title> 
    <!--Style and Bootstrap-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/style.css" rel="stylesheet" type="text/css">
    </head>

<!--CÓDIGO HTML-->
    <body class="d-flex flex-column">
        
        <section class="login m-auto flex-column">

            <div class="text-center mt-5">
                <svg width="325" height="98" viewBox="0 0 325 98" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M211 49C211 36.0044 205.838 23.5411 196.648 14.3518C187.459 5.16249 174.996 9.81141e-07 162 0C149.004 -9.81141e-07 136.541 5.16248 127.352 14.3518C118.162 23.541 113 36.0044 113 49L116.536 49C116.536 36.9422 121.326 25.3783 129.852 16.8522C138.378 8.32602 149.942 3.53608 162 3.53608C174.058 3.53608 185.622 8.32602 194.148 16.8522C202.674 25.3783 207.464 36.9422 207.464 49H211Z" fill="#881163"/>
                    <path d="M211 49C211 55.4348 209.733 61.8065 207.27 67.7515C204.808 73.6964 201.198 79.0982 196.648 83.6482C192.098 88.1983 186.696 91.8076 180.751 94.2701C174.807 96.7326 168.435 98 162 98C155.565 98 149.193 96.7326 143.249 94.2701C137.304 91.8076 131.902 88.1983 127.352 83.6482C122.802 79.0982 119.192 73.6964 116.73 67.7515C114.267 61.8065 113 55.4348 113 49L116.538 49C116.538 54.9702 117.714 60.8819 119.998 66.3976C122.283 71.9134 125.632 76.9251 129.853 81.1466C134.075 85.3682 139.087 88.7169 144.602 91.0016C150.118 93.2863 156.03 94.4622 162 94.4622C167.97 94.4622 173.882 93.2863 179.398 91.0016C184.913 88.7169 189.925 85.3682 194.147 81.1466C198.368 76.9251 201.717 71.9134 204.002 66.3976C206.286 60.8819 207.462 54.9702 207.462 49H211Z" fill="#881163"/>
                    <line x1="206" y1="61.5" x2="324.004" y2="61.5" stroke="#881163" stroke-width="3"/>
                    <line x1="208" y1="50.5" x2="288" y2="50.5" stroke="#881163" stroke-width="3"/>
                    <line x1="33" y1="50.5" x2="113" y2="50.5" stroke="#881163" stroke-width="3"/>
                    <line x1="208" y1="39.5" x2="265" y2="39.5" stroke="#881163" stroke-width="3"/>
                    <line x1="59" y1="39.5" x2="116" y2="39.5" stroke="#881163" stroke-width="3"/>
                    <line y1="61.5" x2="118.004" y2="61.5" stroke="#881163" stroke-width="3"/>
                    <path d="M135.915 56.9735C137.777 52.3897 142.711 49.8563 147.521 51.0143L155.266 52.8788C159.697 53.9455 164.313 53.9886 168.763 53.0047L178.013 50.9597C183.041 49.8481 188.091 52.7364 189.682 57.6337L195 74H129L135.915 56.9735Z" fill="#06174C"/>
                    <ellipse cx="162" cy="33.5" rx="17" ry="15.5" fill="#06174C"/>
                </svg>
            </div>

            <h2 class="mt-4 mr-auto ml-auto">BIENVENIDO</h2>

            <div class="d-flex user mr-auto ml-auto mt-5">

                <div class="box-svg d-flex justify-content-center align-items-center">
                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z"/></svg>
                </div>
                
                
                <input class="float-right ml-auto user-input" type="text" name="username" id="username" class="input" value="" size="20" /></label>
                

            </div>

            <div class="d-flex user mr-auto ml-auto mt-3 ">

                <div class="box-svg d-flex justify-content-center align-items-center">
                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 17c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm3 0c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm3 0c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm2-7v-4c0-3.313-2.687-6-6-6s-6 2.687-6 6v4h-3v14h18v-14h-3zm-10-4c0-2.206 1.795-4 4-4s4 1.794 4 4v4h-8v-4zm11 16h-14v-10h14v10z"/></svg>
                </div>

                <input class="float-right ml-auto user-input" type="password" name="password" id="password" class="input" value="" size="20" /></label>


            </div>

            <div class="text-center mt-5">
                <input type="submit" name="login" class="btn-login" value="Iniciar Sesión" />
            </div>

            

        </section>

        <img class="logo ml-auto" src="images/logo.png">
        
        
        
        
        
        
        <!-- <section class="container-login m-auto">

            <h1 class="display-4 text-center mt-2"><strong>BIENVENIDO</strong></h1>

            <div class="container caja-login mt-5 d-flex flex-column">


                <div class="text-center">
                    <label class="lead" for="user_login">Nombre De Usuario<br />
                    <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
                </div>

                <div class="text-center mt-5">
                    <label class="lead" for="user_pass">Contraseña<br />
                    <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
                </div>

                <div class="text-center mt-5">
                    <input type="submit" name="login" class="btn btn-dark lead" value="Iniciar Sesión" />
                </div>
                
            </div>

        </section> -->




<!--fin de CÓDIGO HTML-->

    <!--jQuery and JavaScript-->
    <script src="assets/jQuery/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    </body>
</html>