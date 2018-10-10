<!DOCTYPE html>
<html>
    <head>
        <title><?= (isset($this->title)) ? $this->title : 'Welcome'; ?></title>
        <!--Import Google Icon Font-->
        <link href="<?php echo URL; ?>public/css/icone91f.css?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="<?php echo URL; ?>public/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?php echo URL; ?>public/css/custom.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/materialize.min.js"></script>
<!--        <script type="text/javascript" src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>-->
        <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>


        <?php
        // Meta Tags
        if (isset($this->meta)) {
            foreach ($this->meta as $meta) {
                echo '<meta />';
            }
        }

        if (isset($this->js)) {
            // Let loop through the array from the controller
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . URL . $js . '"></script>';
            }
        }


        if (isset($this->css)) {
            // Let loop through the array from the controller
            foreach ($this->css as $css) {
                echo '<link type="text/css" rel="stylesheet" href="' . URL . $css . '" media="screen,projection"/>';
            }
        }
        ?>

        <!-- header -->
        <?php Session::init(); ?>
        <?php if (Session::get('loggedIn') == FALSE) {
            ?>


            <header>
                <nav>
                    <div class="nav-wrapper indigo lighten-2">
                        <a href="#!" class="brand-logo">Multimedia Zoo</a>
                        <a href="#" data-activates="mobile-menu" class="button-collapse mobile_menu show-on-largee"><i class="mdi-navigation-menu"></i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="#options" data-activates="demo" class="button-collapse demo"><i class="mdi-navigation-more-vert"></i></a></li>
                            <li><a href="<?php echo URL; ?>">Home</a></li>
                            <li><a href="<?= URL; ?>">About</a></li>
                            <li> <a class="waves-effect waves-light modal-login" href="<?php echo URL; ?>login">login</a></li>
                            <li> <a class="waves-effect waves-light modal-signup" href="<?php echo URL; ?>signup">Signup</a></li>
                        </ul>
                        <ul class="side-nav" id="mobile-menu">
                            <li><a href="<?php echo URL; ?>">Home</a></li>
                            <li><a href="<?php echo URL; ?>about">About</a></li>
                            <li> <a class="waves-effect waves-light modal-login" href="<?php echo URL; ?>login">login</a></li>
                            <li> <a class="waves-effect waves-light modal-signup" href="<?php echo URL; ?>signup">Signup</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <?php
        }
        ?>

        <?php
        if (Session::get('loggedIn') == TRUE and Session::get('role') == 'admin') {
            ?>
            <header>
                <nav>

                    <div class="nav-wrapper indigo lighten-2">
                        <a href="<?php echo URL; ?>dashboard" class="brand-logo">Multimedia Zoo</a>
                        <a href="#" data-activates="myprofiledetails" class="button-collapse show-on-largee"><i class="mdi-navigation-menu"></i></a>



                        <ul class="right hide-on-med-and-down">
                            <!-- Search form -->
                            <li>
                            <form>
                                <div class="input-field">
                                    <input id="searchbox" type="search" style="width: 350px;" required>
                                    <label class="label-icon" for="search"><i class="mdi-action-search"></i></label>
                                    <i class="mdi-navigation-close"></i>
                                </div>
                                 <!-- Where the result will appear -->
                                    <div class="searchres"></div>
                            </form>
                            </li>
                            <!-- ./End of search form -->
                            <li>
                                <a href="<?php echo URL; ?>profile" data-activates="myprofiledetails" class="profile">
                                </a>

                            </li>

                        </ul>

                    </div>
                </nav>

            </header>
            <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                <a href="<?= URL; ?>dashboard" class="btn-floating indigo lighten-2 btn-large waves-effect">
                    <i class=" mdi-action-home"></i>
                </a>
                <a href="<?= URL; ?>users" class="btn-floating indigo lighten-2 btn-large waves-effect">
                    <i class="mdi-social-people-outline"></i>
                </a>
                <a href="<?= URL; ?>animal" class="btn-floating purple accent-1 btn-large waves-effect">
                    <i class="mdi-content-add"></i>
                </a>
                <a href="<?= URL; ?>ticket" class="btn-floating blue lighten-1 btn-large waves-effect">
                    <i class="mdi-action-note-add"></i>
                </a>
            </div>
            <!-- Floating Action Button -->
            <?php
        }
        ?>

        <!-- For user -->
        <?php
        if (Session::get('loggedIn') == TRUE and Session::get('role') == 'default') {
            ?>
            <header>
                <nav>

                    <div class="nav-wrapper indigo lighten-2">
                        <a href="<?php echo URL; ?>user" class="brand-logo">Multimedia Zoo</a>
                        <a href="#" data-activates="myprofiledetails" class="button-collapse show-on-largee"><i class="mdi-navigation-menu"></i></a>
                        <ul class="right hide-on-med-and-down">
                            <!-- Search form -->
                            <li>
                            <form>
                                <div class="input-field">
                                    <input id="searchbox" type="search" style="width: 350px;" required>
                                    <label class="label-icon" for="search"><i class="mdi-action-search"></i></label>
                                    <i class="mdi-navigation-close"></i>
                                </div>
                                 <!-- Where the result will appear -->
                                    <div class="searchres"></div>
                            </form>
                            </li>
                            <!-- ./End of search form -->
                            <li>

    <!--<a href="<?php // echo URL; ?>profile" data-activates="myprofiledetails" class="profile"> <img class="circle responsive-img profile-image" src="/zoo/public/image/profile.jpg"></a>-->
                                <a href="<?php echo URL; ?>profile" data-activates="myprofiledetails" class="profile">
                                </a>

                            </li>

                        </ul>

                    </div>
                </nav>

            </header>
            <?php
        }
        ?>




        <?php
        if (Session::get('loggedIn') == TRUE and Session::get('role') == 'staff') {
            ?>
            <header>
                <nav>
                    <div class="nav-wrapper indigo lighten-2">
                        <a href="<?php echo URL; ?>staff" class="brand-logo">Multimedia Zoo</a>
                        <a href="#" data-activates="myprofiledetails" class="button-collapse show-on-largee"><i class="mdi-navigation-menu"></i></a>
                        <ul class="right hide-on-med-and-down">
                               <!-- Search form -->
                            <li>
                            <form>
                                <div class="input-field">
                                    <input id="searchbox" type="search" style="width: 350px;" required>
                                    <label class="label-icon" for="search"><i class="mdi-action-search"></i></label>
                                    <i class="mdi-navigation-close"></i>
                                </div>
                                 <!-- Where the result will appear -->
                                    <div class="searchres"></div>
                            </form>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>profile" data-activates="myprofiledetails" class="profile"> 

                                </a>
                            </li>

                        </ul>

                    </div>
                </nav>

            </header>
            <?php
        }
        ?>

        <main>
