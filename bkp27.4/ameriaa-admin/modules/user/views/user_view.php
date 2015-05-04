<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md">
          <h1 class="m-n font-thin h3">Manage User</h1>
        </div>
        <!-- success or failure message -->
        <?php
            if($this->session->gets('success') || $this->session->gets('fail') ) {
            ?>
            <div id="divsuccess">
                <?php
                if($this->session->gets('fail')) {
                ?>
                <div class="list-group-item bg-error form-success">
                    <div class="clear text-center">
                        <i class="glyphicon glyphicon-remove-circle"></i> 
                        <?php 
                            echo $this->session->gets('fail'); $this->session->sets('fail', '');
                        ?>
                    </div>
                </div>                
                <?php } else if($this->session->gets('success')) { ?>
                <div class="list-group-item bg-success form-success">
                    <div class="clear text-center">
                        <i class="glyphicon glyphicon-ok-circle"></i> 
                        <?php 
                            echo $this->session->gets('success'); $this->session->sets('success', '');
                        ?>
                    </div>
                </div>               
                <?php } ?>          
            </div>
        <?php } ?>
        
        <div class="wrapper-md">
          <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                      User
                    </div>
                    <div class="col-md-6 text-right">            
                      <div class="btn-group btn-align icons-top">
                          <a class="btn m-b-xs btn-sm btn-primary btn-addon show-tooltip action-links" title="Add new user" 
                             href="<?php echo SITEURL; ?>user/add"><i class="icon-plus"></i>Add
                          </a>                         
                          <a class="btn m-b-xs btn-sm btn-danger btn-addon deleteme action-links" title="Delete selected" href="javascript:void(0);" id="" url="<?php echo SITEURL; ?>user/deleteUser">
                              <i class="icon-trash"></i>Delete
                          </a>
                          <a class="btn m-b-xs btn-sm btn-warning btn-addon show-tooltip action-links" title="Refresh" href="javascript:void(0)" onclick="location.reload();">
                              <i class="icon-refresh"></i>Reload
                          </a>
                      </div>
                    </div>
                </div>              
            </div>              
            <div class="box-content">                
                <div class="table-responsive">
                    <table class="table table-advance" id="faculty_list">
                      <thead>
                        <tr>
                          <th class="text-center sorting-disabled" style="width:18px"><input type="checkbox" id="checkbox-1-1" class="regular-checkbox" />
                            <label for="checkbox-1-1"></label></th>
                          <th>Username</th>
                          <th>Name</th>                          
                          <th>User Level</th>
                          <th class="text-center sorting-disabled">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            $ch = 1;
                            foreach($this->usersList as $user) { $ch++;
                            ?>
                                <tr class="table-flag-blue" id="deleteitem_<?php echo $user['adminuser_id']; ?>">
                                <td>
                                    <?php if($user['adminuser_id'] === "1") { ?>
                                    <a href="#" style="margin-left:5px;" title="Super Admin" class="show-tooltip"><i class="icon-user"></i></a>   
                                    <?php } else { ?>
                                    <input type="checkbox" id="checkbox-1-<?php echo $ch; ?>" class="regular-checkbox" name="regular-checkbox" value="<?php echo $user['adminuser_id']; ?>"/>
                                    <label for="checkbox-1-<?php echo $ch; ?>"></label>                            
                                    <?php } ?>
                                </td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['fname'] ." ". $user['lname']; ?></td>
                                
                                <td><?php echo $user['adminrole_name']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo SITEURL; ?>user/details/<?php echo $user['adminuser_id'];?>" title="" class="btn btn-info btn-view show-tooltip" data-original-title="View"><i class="icon-eye"></i></a>
                                    <a href="<?php echo SITEURL; ?>user/edit/<?php echo $user['adminuser_id'];?>" title="" class="btn btn-primary btn-edit show-tooltip" data-original-title="Edit"><i class="fa fa-pencil fa-fw m-r-xs"></i></a> 
                                    <?php if($user['adminuser_id'] !== "1") { ?>
                                    <a href="#" title="" class="btn btn-danger btn-delete show-tooltip deleteme" id="<?php echo $user['adminuser_id'];?>" data-original-title="Delete" url="<?php echo SITEURL; ?>user/deleteUser"><i class="icon-trash"></i></a>
                                    <?php } ?>
                                </td>
                              </tr>                
                            <?php } ?> 
                      </tbody>
                    </table>
                </div><br>
            </div>            
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->  
  <script type="text/javascript">
        $(document).ready(function(){
            $("#divsuccess").fadeOut(5000);
        });
        function changeStatus(id, user_id, status) {
            var url= "<?php echo SITEURL; ?>user/changeStatus";
            $('#'+id).html('<img src="<?php echo THEMEURL ; ?>img/loading_small.gif">');
            $.ajax({
                type: "POST",             
                url: url,
                data: 'statusId='+status+'&user_id='+user_id,
                success: function(data) {  
                    if(data == 1){
                        $('#'+id).html('<a href="javascript:void(0)" onclick="changeStatus(\''+ id +'\', \''+ user_id +'\', \'y\')">\n\
                                            <i class="glyphicon glyphicon-ok"></i>\n\
                                        </a>');
                    } else {
                        $('#'+id).html('<a href="javascript:void(0)" onclick="changeStatus(\''+ id +'\', \''+ user_id +'\', \'p\')">\n\
                                            <i class="glyphicon glyphicon-remove"></i>\n\
                                        </a>');
                    }
                }
            });
        }
    </script>