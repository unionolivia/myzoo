<div class="container">

    <table id="data-table-simple" class="display table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <!-- Do not insert thead tag here. Javascript will take care of it. -->
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Fisrtname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>


    <div id="edit-modal" class="modal">
        <div class="modal-content">
            <a href="<?= URL; ?>users"><i class="medium mdi-navigation-arrow-back"></i></a>
            <h4 class="user-name"><?php // echo $this->name;  ?></h4>

            <div class="row form">
                <form class="col s12">
                    <div class="row email-row">
                        <div class="input-field col s6">
                            <select id="role">
                                <option value="" disabled selected>Choose a role</option>
                                <option value="staff">Staff</option>
                                <option value="admin" disabled="">admin</option>
                            </select>
                            <label>Give privileges.</label>                          
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s2">
                            <button class="update-user btn waves-effect waves-light" type="submit">update</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>