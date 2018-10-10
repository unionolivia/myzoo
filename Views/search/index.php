
<div class="container">

    <div class="row">
        <div class="col s12 m12 l12">
            <h5 class="breadcrumbs-title">Search Results  <a href="" class="search-back"><i class="mdi-hardware-keyboard-backspace right"></i></a></h5> 
            <hr />
        </div>
    </div>

    <div class="row">
        <input id="animalId" value="<?= $this->animalId; ?>" type="hidden">

        <div class="section">
            <div id="blog-post-full" class="search-result">

                <!-- <div class="card large">
                     <div class="card-image">
                         <img src="public/image/1.jpg" alt="sample">
                         <span class="card-title">Large post style</span>
                         <!--<span class="card-title blog-post-full-cat right light-blue"><a href="#">#Materilize</a></span>
                     </div>-->
                <!--
                <div class="card-content">
                    <p class="ultra-small">June 30, 2015</p>
                    <p>I am a very simple full width blog post. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>

                </div>
                <div class="card-action">
                    By <a href="#">John Doe</a>
                    <a href="#" class="right">Read more ></a>
                </div>
            </div>-->
            </div>            
        </div>


        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Other Results</h5>
                <hr />

            </div>
        </div>

        <div class="col s12">
            <ul class="tabs tab-demo-active z-depth-1">
                <li class="tab col s3"><a class="darken-1 waves-effect waves-light active" href="#displays"><i class="mdi-action-settings-display"></i> More results</a>
                </li>
                <li class="tab col s3"><a class="darken-1 waves-effect waves-light" href="#video-page"><i class="mdi-av-video-collection"></i> Videos</a>
                </li>
            </ul>
        </div>
        <!-- First tab starts here -->
        <div id="displays" class="col s12">

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


<!-- Other Results -->
