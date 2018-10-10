<div class="container">
    <ul class="side-nav" id="myprofiledetails">
        <div class="row">
            <div class="col s12">
                <div class="col s6 offset-s1"><span class="flow-text">Profile</span></div>
                <div class="col s2"><a href="" class="edit" data-user="<?= $this->email; ?>"><i class="small mdi-editor-mode-edit"></i></a></div>

            </div>
        </div>

        <div class="row">
            <div class="col 12">
                <div class="card-panel white lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s4 display-pic">
                            <!--<img src="/zoo/public/image/profile.jpg" alt="" class="circle responsive-img">-->
                        </div>
                        <div class="col s4">


                            <label>
                                <i class="small mdi-image-camera"></i><input type="file" name="file" id="file">
                                <input type="hidden" name="email" value="<?= $this->email; ?>" id="email">
                            </label>
                              <!--<a href=""><i class="medium mdi-image-camera"></i></a>-->
                        </div>
                        <div class="col s4">
                            <a href="<?php echo URL; ?>dashboard/logout">logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s6 offset-s1">

                <div class="section">
                    <span class="flow-text">Firstname</span>
                    <p class="fn"><?php // echo $this->firstname; ?></p>
                </div>
                <div class="divider"></div>
                <div class="section">
                    <span class="flow-text">Lastname</span>
                    <p class="ln"><?php // echo $this->lastname; ?></p>
                </div>
                <div class="divider"></div>
                <div class="section">
                    <span class="flow-text">email</span>
                    <p><?= $this->email; ?></p>
                </div>
            </div>
        </div>

        <!--            <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header">Dropdown<i class="mdi-navigation-arrow-drop-down"></i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="#!">First</a></li>
                                        <li><a href="#!">Second</a></li>
                                        <li><a href="#!">Third</a></li>
                                        <li><a href="#!">Fourth</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
        -->

    </ul>


    <div id="theModal"></div>
    
</div>
