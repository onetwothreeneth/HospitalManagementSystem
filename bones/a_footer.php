<script type="text/javascript" src="assets/assets-minified/admin-all-demo.js"></script> 
</div>
</body> 
</html>
<button style="opacity:0; z-index:-112;" class="btn btn-default btn-md" id="notifications" data-toggle="modal" data-target="#myModal">
Notification modal
</button> 
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-right: 17px; margin-top:10%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Marcelo Hospital</h4>
            </div>
            <div class="modal-body">
                <p><?php if(isset($notifications)){ echo $notifications;} ?></p>
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 
<?php if(isset($task)){ echo $task;} ?>