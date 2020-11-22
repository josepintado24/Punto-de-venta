<!DOCTYPE html>
<html lang="es">
    <head>

<!--__________ETIQUETAS META__________-->

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <link rel="shortcut icon" href="<?php echo base_url();?>/svg/logometa.png">
        <title>Sistemas venta</title>

<!--__________STYLES__________-->

        <link href="<?php echo base_url();?>/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="<?php echo base_url();?>/js/all.min.js" crossorigin="anonymous"></script>
        
    </head>


<!--__________ESTRUCTURA DEL SITIO__________-->


    <body class="sb-nav-fixed sb-sidenav-toggled">

<!-----MAIN------>
        <nav class="header sb-topnav navbar navbar-expand navbar-dark bg-dark">
        
        <!-- _________HEADER left_________ -->

            <button class="ml-1 btn btn-link btn-sm order-1 order-lg-0 mr-5" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <img class="m-2 logo" src="<?php echo base_url();?>/svg/logo.png">
             <!--<a class="navbar-brand" href="index.html">Sis-Ventas</a> -->

        <!-- _________HEADER right_________ -->
        
            
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">       
                <li class="nav-item dropdown">
                    
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Maximiliano    
                        <i class="ml-3 fas fa-user fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" href="login.html">Salir</a>
                    </div>
                </li>
            </ul>

        </nav>

<!-----The end MAIN------>   

        <div id="layoutSidenav" class="mt-5">

    <!-- ________MENÚ DESPLEGABLE________ -->

            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

            <!-- ______LISTA DE MENÚ______ -->
                <ul class="ul mt-5">
                
                <!-- _________PRINCIPAL_________ -->
                    <li class="estas li mt-3">
                        <a href="#">
                            <div class="p-2 bd-highlight">
                                <div class="d-flex justify-content-start align-items-center ml-4 m-2 find-click">
                                    <svg class="mr-4" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">    
                                        <path class="svg" d="M15.5232 8.94116H8.54412L13.1921 13.5891C13.3697 13.7667 13.6621 13.7812 13.8447 13.6091C14.9829 12.5367 15.7659 11.0912 15.9956 9.46616C16.035 9.18793 15.8041 8.94116 15.5232 8.94116ZM15.0576 7.03528C14.8153 3.52176 12.0076 0.714119 8.49412 0.471767C8.22589 0.453237 8 0.679413 8 0.948236V7.5294H14.5815C14.8503 7.5294 15.0762 7.30352 15.0576 7.03528ZM6.58824 8.94116V1.96206C6.58824 1.68118 6.34147 1.45029 6.06353 1.48971C2.55853 1.985 -0.120585 5.04705 0.00412089 8.71675C0.132356 12.4856 3.37736 15.5761 7.14794 15.5288C8.6303 15.5103 10 15.0326 11.1262 14.2338C11.3585 14.0691 11.3738 13.727 11.1724 13.5256L6.58824 8.94116Z" fill="#A4A6B3"/>
                                        <defs>
                                        <clipPath id="clip0">
                                        <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>                
                                    <p class="p-hover">Principal</p>
                                </div>
                            </div>
                        </a>
                    </li>
                
                <!-- _________CAJA_________ -->
                    <li class="li">
                        <a id="click" href="#" style="text-decoration: none;">
                            <div class="p-2 bd-highlight">
                                <div class="d-flex justify-content-start align-items-center ml-4 m-2 find-click">    
                                    <svg class="mr-4" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="svg" d="M3.55556 5.33334H12.4444V10.6667H3.55556V5.33334ZM14.6667 8C14.6667 8.73639 15.2636 9.33334 16 9.33334V12C16 12.7364 15.4031 13.3333 14.6667 13.3333H1.33333C0.596944 13.3333 0 12.7364 0 12V9.33334C0.736389 9.33334 1.33333 8.73639 1.33333 8C1.33333 7.26362 0.736389 6.66667 0 6.66667V4.00001C0 3.26362 0.596944 2.66667 1.33333 2.66667H14.6667C15.4031 2.66667 16 3.26362 16 4.00001V6.66667C15.2636 6.66667 14.6667 7.26362 14.6667 8ZM13.3333 5.11112C13.3333 4.74292 13.0349 4.44445 12.6667 4.44445H3.33333C2.96514 4.44445 2.66667 4.74292 2.66667 5.11112V10.8889C2.66667 11.2571 2.96514 11.5556 3.33333 11.5556H12.6667C13.0349 11.5556 13.3333 11.2571 13.3333 10.8889V5.11112Z" fill="#9FA2B4"/>
                                        </svg>                
                                    <p class="p-hover">Caja</p>
                                </div>
                            </div>
                        </a>
                    </li>
                
                <!-- _________COMPRAS_________ -->
                    <li class="li">
                        <a id="click" href="<?php echo base_url().'/compras'; ?>" style="text-decoration: none;">
                            <div class="p-2 bd-highlight">
                                <div class="d-flex justify-content-start align-items-center ml-4 m-2 find-click">
                                    <svg class="mr-4" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                                        <path class="svg" d="M5.50187 14.1984C5.50219 14.395 5.56031 14.5875 5.66937 14.7512L6.20344 15.5541C6.29467 15.6913 6.41841 15.8039 6.56366 15.8817C6.7089 15.9596 6.87114 16.0003 7.03594 16.0003H8.96438C9.12917 16.0003 9.29141 15.9596 9.43665 15.8817C9.5819 15.8039 9.70564 15.6913 9.79688 15.5541L10.3309 14.7512C10.44 14.5875 10.4982 14.3952 10.4984 14.1984L10.4997 13H5.50031L5.50187 14.1984ZM2.5 5.5C2.5 6.88656 3.01406 8.15156 3.86125 9.11812C4.3775 9.70718 5.185 10.9378 5.49281 11.9759C5.49406 11.9841 5.495 11.9922 5.49625 12.0003H10.5037C10.505 11.9922 10.5059 11.9844 10.5072 11.9759C10.815 10.9378 11.6225 9.70718 12.1388 9.11812C12.9859 8.15156 13.5 6.88656 13.5 5.5C13.5 2.45656 11.0284 -0.00937887 7.98281 -3.87451e-06C4.795 0.00968363 2.5 2.59281 2.5 5.5ZM8 3C6.62156 3 5.5 4.12156 5.5 5.5C5.5 5.77625 5.27625 6 5 6C4.72375 6 4.5 5.77625 4.5 5.5C4.5 3.57 6.07 2 8 2C8.27625 2 8.5 2.22375 8.5 2.5C8.5 2.77625 8.27625 3 8 3Z" fill="#9FA2B4"/>
                                        <defs>
                                        <clipPath id="clip0">
                                        <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                
                                    <p class="p-hover">Compras</p>
                                </div>
                            </div>
                        </a> 
                    </li>
                    <li class="li">
                        <a id="click" href="<?php echo base_url().'/compras/nuevo'; ?>" style="text-decoration: none;">
                            <div class="p-2 bd-highlight">
                                <div class="d-flex justify-content-start align-items-center ml-4 m-2 find-click">
                                    <svg class="mr-4" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                                        <path class="svg" d="M5.50187 14.1984C5.50219 14.395 5.56031 14.5875 5.66937 14.7512L6.20344 15.5541C6.29467 15.6913 6.41841 15.8039 6.56366 15.8817C6.7089 15.9596 6.87114 16.0003 7.03594 16.0003H8.96438C9.12917 16.0003 9.29141 15.9596 9.43665 15.8817C9.5819 15.8039 9.70564 15.6913 9.79688 15.5541L10.3309 14.7512C10.44 14.5875 10.4982 14.3952 10.4984 14.1984L10.4997 13H5.50031L5.50187 14.1984ZM2.5 5.5C2.5 6.88656 3.01406 8.15156 3.86125 9.11812C4.3775 9.70718 5.185 10.9378 5.49281 11.9759C5.49406 11.9841 5.495 11.9922 5.49625 12.0003H10.5037C10.505 11.9922 10.5059 11.9844 10.5072 11.9759C10.815 10.9378 11.6225 9.70718 12.1388 9.11812C12.9859 8.15156 13.5 6.88656 13.5 5.5C13.5 2.45656 11.0284 -0.00937887 7.98281 -3.87451e-06C4.795 0.00968363 2.5 2.59281 2.5 5.5ZM8 3C6.62156 3 5.5 4.12156 5.5 5.5C5.5 5.77625 5.27625 6 5 6C4.72375 6 4.5 5.77625 4.5 5.5C4.5 3.57 6.07 2 8 2C8.27625 2 8.5 2.22375 8.5 2.5C8.5 2.77625 8.27625 3 8 3Z" fill="#9FA2B4"/>
                                        <defs>
                                        <clipPath id="clip0">
                                        <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                
                                    <p class="p-hover">Nuevo</p>
                                </div>
                            </div>
                        </a> 
                    </li>

                <!-- _________CLIENTES_________ -->
                    <li class="li">
                        <a id="click" href="<?php echo base_url().'/clientes'; ?>" style="text-decoration: none;">
                            <div class="p-2 bd-highlight">
                                <div class="d-flex justify-content-start align-items-center ml-4 m-2 find-click">
                                    <svg class="mr-4" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="svg" d="M2.4 7.2C3.2825 7.2 4 6.4825 4 5.6C4 4.7175 3.2825 4 2.4 4C1.5175 4 0.8 4.7175 0.8 5.6C0.8 6.4825 1.5175 7.2 2.4 7.2ZM13.6 7.2C14.4825 7.2 15.2 6.4825 15.2 5.6C15.2 4.7175 14.4825 4 13.6 4C12.7175 4 12 4.7175 12 5.6C12 6.4825 12.7175 7.2 13.6 7.2ZM14.4 8H12.8C12.36 8 11.9625 8.1775 11.6725 8.465C12.68 9.0175 13.395 10.015 13.55 11.2H15.2C15.6425 11.2 16 10.8425 16 10.4V9.6C16 8.7175 15.2825 8 14.4 8ZM8 8C9.5475 8 10.8 6.7475 10.8 5.2C10.8 3.6525 9.5475 2.4 8 2.4C6.4525 2.4 5.2 3.6525 5.2 5.2C5.2 6.7475 6.4525 8 8 8ZM9.92 8.8H9.7125C9.1925 9.05 8.615 9.2 8 9.2C7.385 9.2 6.81 9.05 6.2875 8.8H6.08C4.49 8.8 3.2 10.09 3.2 11.68V12.4C3.2 13.0625 3.7375 13.6 4.4 13.6H11.6C12.2625 13.6 12.8 13.0625 12.8 12.4V11.68C12.8 10.09 11.51 8.8 9.92 8.8ZM4.3275 8.465C4.0375 8.1775 3.64 8 3.2 8H1.6C0.7175 8 0 8.7175 0 9.6V10.4C0 10.8425 0.3575 11.2 0.8 11.2H2.4475C2.605 10.015 3.32 9.0175 4.3275 8.465Z" fill="#9FA2B4"/>
                                        </svg>                
                                    <p class="p-hover">Clientes</p>
                                </div>
                            </div>
                        </a>
                    </li>

                <!-- _________PRODUCTOS_________ --> <!--trabajado-->  
                    <li class="li">
                        <a class="m-product-list" id="click" href="#" style="text-decoration: none;">
                            <div class="p-2 bd-highlight">
                                <div class="d-flex justify-content-start align-items-center ml-4 m-2 find-click">
                                    <svg class="mr-4" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="svg" d="M15 11.25V0.75C15 0.334375 14.6656 0 14.25 0H4C2.34375 0 1 1.34375 1 3V13C1 14.6562 2.34375 16 4 16H14.25C14.6656 16 15 15.6656 15 15.25V14.75C15 14.5156 14.8906 14.3031 14.7219 14.1656C14.5906 13.6844 14.5906 12.3125 14.7219 11.8313C14.8906 11.6969 15 11.4844 15 11.25ZM5 4.1875C5 4.08437 5.08437 4 5.1875 4H11.8125C11.9156 4 12 4.08437 12 4.1875V4.8125C12 4.91563 11.9156 5 11.8125 5H5.1875C5.08437 5 5 4.91563 5 4.8125V4.1875ZM5 6.1875C5 6.08437 5.08437 6 5.1875 6H11.8125C11.9156 6 12 6.08437 12 6.1875V6.8125C12 6.91563 11.9156 7 11.8125 7H5.1875C5.08437 7 5 6.91563 5 6.8125V6.1875ZM12.9187 14H4C3.44688 14 3 13.5531 3 13C3 12.45 3.45 12 4 12H12.9187C12.8594 12.5344 12.8594 13.4656 12.9187 14Z" fill="#9FA2B4"/>
                                        </svg>                
                                    <p class="p-hover">Productos</p>
                                </div>
                            </div>
                        </a>
                        <ul class="ul-prod mb-2">
                            <li class="li-prod d-flex justify-content-end"><a href="<?php echo base_url().'/productos'; ?>"><div class="div-prod"><p class="p-prod">Productos</p></div></a></li>
                            <li class="li-prod d-flex justify-content-end"><a href="<?php echo base_url(); ?>/unidades"><div class="div-prod"><p class="p-prod">Unidades</p></div></a></li>
                        </ul>
                    </li>

                <!-- _________VENTAS_________ -->
                    <li class="li">
                        <a id="click" href="#" style="text-decoration: none;">
                            <div class="p-2 bd-highlight">
                                <div class="d-flex justify-content-start align-items-center ml-4 m-2 find-click">    
                                    <svg class="mr-4" width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path  d="M6 2H10V3H6V2ZM6 8H10V9H6V8ZM6 10H10V11H6V10ZM15.1406 15H0.859375L2.10938 10H4V1C4 0.864583 4.02604 0.736979 4.07812 0.617188C4.13021 0.497396 4.20052 0.390625 4.28906 0.296875C4.3776 0.203125 4.48438 0.130208 4.60938 0.078125C4.73438 0.0260417 4.86458 0 5 0H11C11.1354 0 11.263 0.0260417 11.3828 0.078125C11.5026 0.130208 11.6094 0.200521 11.7031 0.289062C11.7969 0.377604 11.8698 0.484375 11.9219 0.609375C11.974 0.734375 12 0.864583 12 1V10H13.8906L15.1406 15ZM5 12H11V1H5V12ZM13.8594 14L13.1094 11H12V13H4V11H2.89062L2.14062 14H13.8594Z" fill="#C5C5C5"/>
                                    </svg>                
                                    <p class="p-hover">Ventas</p>
                                </div>
                            </div>
                        </a>
                    </li>

    
                <div class="dropdown-divider mt-4 mb-4"></div>

                <!-- _________REPORTES_________ --> <!--trabajado-->  
                    <li class="li">
                        <a class="m-reportes-list" id="click" href="#" style="text-decoration: none;">
                            <div class="p-2 bd-highlight">
                                <div class="d-flex justify-content-start align-items-center ml-4 m-2 find-click">
                                    <svg class="mr-4" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="svg" fill-rule="evenodd" clip-rule="evenodd" d="M1 6.25721V2.5L1.5 2H6.5L6.84998 2.15002L7.70996 3H13.5L14 3.5V6H15.13L15.61 6.63L12.98 13.63L12.5 14H8.7429C8.99653 13.6929 9.21745 13.3578 9.40035 13H12.13L14.5 7H8.7429C8.52568 6.73698 8.28448 6.49451 8.02265 6.27592L8.15002 6.15002L8.5 6H13V4H7.5L7.15002 3.84998L6.29004 3H2L2.0105 5.59439C1.64877 5.77833 1.31011 6.0011 1 6.25721Z" fill="#C5C5C5"/>
                                        <path class="svg" d="M6 10.5C6 11.3284 5.32843 12 4.5 12C3.67157 12 3 11.3284 3 10.5C3 9.67157 3.67157 9 4.5 9C5.32843 9 6 9.67157 6 10.5Z" fill="#C5C5C5"/>
                                        <path class="svg" fill-rule="evenodd" clip-rule="evenodd" d="M8 10.5C8 12.433 6.433 14 4.5 14C2.567 14 1 12.433 1 10.5C1 8.567 2.567 7 4.5 7C6.433 7 8 8.567 8 10.5ZM4.5 13C5.88071 13 7 11.8807 7 10.5C7 9.11929 5.88071 8 4.5 8C3.11929 8 2 9.11929 2 10.5C2 11.8807 3.11929 13 4.5 13Z" fill="#C5C5C5"/>
                                    </svg>                
                                    <p class="p-hover">Reportes</p>
                                </div>
                            </div>
                        </a>
                        <ul class="ul-reportes mb-2">
                            <li class="li-reportes d-flex justify-content-end"><a href="<?php echo base_url().'/productos'; ?>"><div class="div-reportes"><p class="p-reportes">Productos</p></div></a></li>
                            <li class="li-reportes d-flex justify-content-end"><a href="<?php echo base_url(); ?>/unidades"><div class="div-reportes"><p class="p-reportes">Unidades</p></div></a></li>
                        </ul>
                    </li>
                <!-- _________CONFIGURACIÓN_________ -->
                    <li class="li">
                       <a id="click" href="#" style="text-decoration: none;">
                            <div class="p-2 bd-highlight">
                                <div class="d-flex justify-content-start align-items-center ml-4 m-2 find-click">
                                    <svg class="mr-4" width="16" height="19" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="svg" d="M15.2313 9.86557L13.9 9.09682C14.0344 8.37182 14.0344 7.62807 13.9 6.90307L15.2313 6.13432C15.3844 6.04682 15.4531 5.86557 15.4031 5.69682C15.0563 4.58432 14.4656 3.57807 13.6938 2.74057C13.575 2.61244 13.3813 2.58119 13.2313 2.66869L11.9 3.43744C11.3406 2.95619 10.6969 2.58432 10 2.34057V0.806191C10 0.631191 9.87814 0.478066 9.70627 0.440566C8.55939 0.184316 7.38439 0.196816 6.29377 0.440566C6.12189 0.478066 6.00002 0.631191 6.00002 0.806191V2.34369C5.30627 2.59057 4.66252 2.96244 4.10002 3.44057L2.77189 2.67182C2.61877 2.58432 2.42814 2.61244 2.30939 2.74369C1.53752 3.57807 0.946895 4.58432 0.60002 5.69994C0.546895 5.86869 0.61877 6.04994 0.771895 6.13744L2.10314 6.90619C1.96877 7.63119 1.96877 8.37494 2.10314 9.09994L0.771895 9.86869C0.61877 9.95619 0.55002 10.1374 0.60002 10.3062C0.946895 11.4187 1.53752 12.4249 2.30939 13.2624C2.42814 13.3906 2.62189 13.4218 2.77189 13.3343L4.10314 12.5656C4.66252 13.0468 5.30627 13.4187 6.00314 13.6624V15.1999C6.00314 15.3749 6.12502 15.5281 6.29689 15.5656C7.44377 15.8218 8.61877 15.8093 9.70939 15.5656C9.88127 15.5281 10.0031 15.3749 10.0031 15.1999V13.6624C10.6969 13.4156 11.3406 13.0437 11.9031 12.5656L13.2344 13.3343C13.3875 13.4218 13.5781 13.3937 13.6969 13.2624C14.4688 12.4281 15.0594 11.4218 15.4063 10.3062C15.4531 10.1343 15.3844 9.95307 15.2313 9.86557ZM8.00002 10.4999C6.62189 10.4999 5.50002 9.37807 5.50002 7.99994C5.50002 6.62182 6.62189 5.49994 8.00002 5.49994C9.37814 5.49994 10.5 6.62182 10.5 7.99994C10.5 9.37807 9.37814 10.4999 8.00002 10.4999Z" fill="#9FA2B4"/>
                                        </svg>                
                                    <p class="p-hover">Configuración</p>
                                </div>
                            </div>
                        </a>
                    </li>

            </ul>
                                             

                </nav>
            </div>

<!--_______________FIN DE CÓDIGO html______________________________-->
    
    <!--__jQuery__-->
            <script src="<?php echo base_url();?>/jQuery/jquery-3.3.1.slim.min.js"></script>
    
        <!-- _________FUNCTION CLICK link_________ -->
            <script type="text/javascript">
                 
                 $(".ul").find("li").click(function(){
                      $(".ul li").removeClass('estas')
                      $(this).addClass('estas')
                })
            
            </script>
    
            
        <!-- _________FUNCTION list-prod_________ -->
            <script type="text/javascript">

             $('.m-product-list').on('click', function(){
                 $('.ul-prod').toggleClass('ul-prod-active');
             })
         
         
            </script>   
        
        <!-- _________FUNCTION list-reportes_________ -->
            <script type="text/javascript">

             $('.m-reportes-list').on('click', function(){
                 $('.ul-reportes').toggleClass('ul-reportes-active');
             })
         
         
            </script> 

        <!-- _________FUNCTION link active_________ -->
             <script>



             </script>