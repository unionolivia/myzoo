
<div class="container">

    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a href="#test1">Gallery</a></li>
                <li class="tab col s3"><a href="#video-page">Videos</a></li>
            </ul>
        </div>
        <div id="test1" class="col s12">
            <nav class="navbar-color">
                <input id="animal-name" value="<?= $this->animalName; ?>" type="hidden">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="#!" class="brand-logo"> <?= $this->animalName; ?></a>
                        <ul class="right">

                            <li><a href="dashboard"><i class="mdi-navigation-arrow-back"></i></a>
                            </li>
                            <li><a href="" id="reload"><i class="mdi-navigation-refresh"></i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="gallery-list">

                <!--        <div class="col s4">
                          <div class="card small">
                            <div class="card-image">
                              <img class="materialboxed" data-caption="" width="250" src="public/image/2.jpg">
                              <span class="card-title">Card Title</span>
                            </div>
                            <div class="card-content">
                              <p>I am a very simple card. I am good at containing small bits of information.
                              I am convenient because I require little markup to use effectively.</p>
                            </div>
                            <div class="card-action">
                                <a href="#"><i class="material-icons">visibility</i></a>
                              <a href="#"><i class="material-icons">system_update_alt</i></a>
                            </div>
                          </div>
                         </div>-->

            </div>

            <div id="update-animal-gallery">

            </div>
            <!-- Login Page -->
            <div id="gallery-detail" class="modal">
                <div class="modal-content">
                    <h4>Add more detail</h4><span class="loading"></span>

                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title" type="text" class="validate">
                                    <label for="title">Title</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="descp" class="materialize-textarea"></textarea>
                                    <label for="description"></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s2">
                                    <button class="add-gallery btn waves-effect waves-light" type="submit">update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- End of login -->
        </div>
        <!-- End of first tab -->


        <!-- Second tab starts here -->
        <div id="video-page" class="col s12">
            <!--            <div class="display-videoo">
                        <p><a href="#" id="videolink1">Change video</a></p>
            <video id="videoclip" class="responsive-video"  controls="controls" poster="public/image/pic/9.jpg" title="Video title">
              <source id="mp4video" src="public/image/pic/OSTRICH.mp4" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'  />
              <source id="mp4video" src="public/image/pic/OSTRICH.mp4" type='video/webm;codecs="vp8, vorbis"' />
             </video>
                        </div>-->

            <div class="display-video"></div>

        </div>




<!--                        <source src="public/image/pic/Miley_Cyrus_-_Wrecking_Ball_Directors_Cut.mp4" type="video/webm">
       <source src="public/image/pic/Miley_Cyrus_-_Wrecking_Ball_Directors_Cut.mp4" type="video/mp4">-->

        <!--  </div>

      </div>-->
        <!-- ./Second tab ends here -->
    </div>


    <!-- Floating action button starts here -->
    <div class="fixed-action-btn" style="top: 0px; right: 300px;">
        <a class="btn-floating black lighten-2 btn-large waves-effect"><form id="form-gallery" method="post" enctype="multipart/form-data">
                <label>
                    <i class="small mdi-image-photo"></i><input type="file" name="files[]" id="gallery-pics" multiple>
                    <input type="hidden" id="animalId" value="<?= $this->animalId; ?>" name="animalId">
                </label>
            </form>
        </a>
        <!-- Videos -->
        <a class="btn-floating green lighten-2 btn-large waves-effect"><form id="video-gallery" method="post" enctype="multipart/form-data">
                <label>
                    <i class="mdi-av-video-collection"></i><input type="file" name="video" id="video" multiple>
                    <input type="hidden" id="animalId" value="<?= $this->animalId; ?>" name="animalId">
                </label>
            </form>
        </a>
    </div>
    <!-- ./Float action end here -->
</div>
