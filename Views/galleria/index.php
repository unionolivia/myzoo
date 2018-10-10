<div class="container">
    
    <div class="row">
                  <div class="col s12">
                    <ul class="tabs tab-demo-active z-depth-1">
                      <li class="tab col s3"><a class="white-text purple darken-1 waves-effect waves-light active" href="#displays"><i class="mdi-action-settings-display"></i> Display</a>
                      </li>
                      <li class="tab col s3"><a class="white-text light-blue darken-1 waves-effect waves-light" href="#video-page"><i class="mdi-av-video-collection"></i> Videos</a>
                      </li>
                    </ul>
                  </div>
           <!-- First tab starts here -->
        <div id="displays" class="col s12">
            
                <input id="animal-name" value="<?= $this->animalName; ?>" type="hidden">
    <input id="animal-id" value="<?= $this->animalId; ?>" type="hidden">
     <nav class="navbar-color">
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="#!" class="brand-logo"> <?= $this->animalName; ?></a>
                <ul class="right">
                    
                        <li><a href="<?php echo URL; ?>display"><i class="mdi-navigation-arrow-back"></i></a>
                    </li>
                    <li><a href="" id="reload"><i class="mdi-navigation-refresh"></i></a>
                    </li>
                
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="gallery-list">
        
     
    </div>


     


        </div>
        <!-- ./First tab ends here -->
        
                <!-- Second tab starts here -->
        <div id="video-page" class="col s12">
            <div class="display-video">
                
            </div>

        </div>
        <!-- ./Second tab ends here -->
    </div>
        
    </div>
    
</div>