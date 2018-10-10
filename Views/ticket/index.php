<div class="container">
    <table id="data-table-simple" class="display table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Ticket Number</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <!-- Do not insert thead tag here. Javascript will take care of it. -->
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Ticket Number</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </tfoot>
    </table>

    <!-- Login Page -->
    <div id="ticket-modal" class="modal">
        <div class="modal-content">
            <h4>Add a ticket</h4>

            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="num" type="number" class="validatee">
                            <label for="num">Type in the number of tickets to generate</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s2">
                            <button class="generate-ticket btn waves-effect waves-light" type="submit">generate</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- End of login -->
</div>