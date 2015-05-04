<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md">
          <h1 class="m-n font-thin h3">Manage Privileges</h1>
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
                      Privileges
                    </div>
                    <div class="col-md-6 text-right">            
                      <div class="btn-group btn-align icons-top">
                          <a class="btn m-b-xs btn-sm btn-primary btn-addon show-tooltip action-links" title="Add new faculty" 
                             href="<?php echo SITEURL; ?>privileges/add"><i class="icon-plus"></i>Add</a>                         
                          <a class="btn m-b-xs btn-sm btn-danger btn-addon deleteme action-links" title="Delete selected" href="javascript:void(0);" id="" url="<?php echo SITEURL; ?>privileges/deletePrivileges">
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
                            <th class="sorting-disabled">
                                <input type="checkbox" id="checkbox-1-1" class="regular-checkbox" />
                                <label for="checkbox-1-1"></label>
                            </th>
                            <th>Role Name</th>
                            <?php if(in_array(1, $permissions['edit'])) { ?>
                            <th class="text-center sorting">Edit pages</th>
                            <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                            if($this->rolesList != '') {
                                $i= 2;
                                unset($this->rolesList[0]);
                                foreach($this->rolesList as $value) { ?>
                                <tr class="table-flag-blue" id="deleteitem_<?php echo $value['adminrole_id']; ?>">
                                    <td width="5%"><input type="checkbox" id="checkbox-1-<?php echo $i;?>" name="regular-checkbox" class="regular-checkbox" value="<?php echo $value['adminrole_id']; ?>" />
                                        <label for="checkbox-1-<?php echo $i;?>"></label></td>
                                    <td width="65%"><?php echo $value['adminrole_name']; ?></td>
                                    <?php if(in_array(1, $permissions['edit'])) { ?>
                                    <td width="15%" class="text-center">
                                        <a href="<?php echo SITEURL; ?>privileges/edit/<?php echo $value['adminrole_id'];?>" title="" class="btn btn-primary btn-edit show-tooltip" data-original-title="Edit"><i class="icon-pencil"></i></a> 
                                        <a href="#" title="" class="btn btn-danger btn-delete show-tooltip deleteme" data-original-title="Delete" id="<?php echo $value['adminrole_id'];?>" url="<?php echo SITEURL; ?>privileges/deletePrivileges"><i class="icon-trash"></i></a>
                                    </td>
                                    <?php } ?>
                                </tr>
                        <?php 
                                $i++;
                                } // foreach close  
                            } // if end here
                        ?>
                      </tbody>
                    </table>
                </div><br>
            </div>            
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->
  