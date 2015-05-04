<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Page Title -->
    
    
    <!-- END Page Title --> 
    
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active">Manage Admin Privileges</li>
      </ul>
    </div>
    <!-- END Breadcrumb --> 
<!-- BEGIN Main Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-table"></i>Manage Admin Privileges</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> <a data-action="close" href="#"><i class="icon-remove"></i></a> </div>
          </div>
          <div class="box-content">
            <div class="btn-toolbar pull-right clearfix">
              <div class="btn-group"> 
              <!--<a class="btn btn-circle show-tooltip" title="Add new record" href="<?php echo SITEURL?>adminRoles/addAdminRole"><i class="icon-plus"></i></a> 
                  <a class="btn btn-circle show-tooltip" title="Edit selected" href="#"><i class="icon-pencil"></i></a>
                  <a class="btn btn-circle show-tooltip" title="Delete selected" href="#" id="deleteall" ><i class="icon-trash"></i></a>
              </div>
                
              <div class="btn-group"> <!-- <a class="btn btn-circle show-tooltip" title="Print" href="#"><i class="icon-print"></i></a>
                  <a class="btn btn-circle show-tooltip" title="Export to PDF" href="#"><i class="icon-file-text-alt"></i></a>
                  <a class="btn btn-circle show-tooltip" title="Export to Exel" href="#"><i class="icon-table"></i></a> -->
              </div>
                
              <div class="btn-group">
                  <a class="btn btn-circle show-tooltip" title="Refresh" href="#" id="something"><i id="refresh"class="icon-repeat"></i></a>
                  
              </div>
            </div>
            <br/>
            <br/>
            <div class="clearfix"></div>
            <div class="table-responsive" style="border:0">
              <table class="table table-advance" id="table1">
                 <thead>
                  <tr>
                    <th width="5%" class="sorting-disabled"><input type="checkbox" id="checkbox-1-1" class="regular-checkbox" />
                      <label for="checkbox-1-1"></label></th>
                    <th width="25%">Module Name</th>
                    <th width="12%" class="text-center sorting-disabled">Access</th>
                    <th width="12%" class="text-center sorting-disabled">Add</th>
                    <th width="12%" class="text-center sorting-disabled">Edit</th>
                    <th width="12%" class="text-center sorting-disabled">Delete</th>
                    <th width="12%" class="text-center sorting-disabled">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
               
                $i=1;
                foreach($this->modulesList as $value) {
                ?>
                    
                <tr>
                    <td>
                         <input type="checkbox" id="checkbox-1-<?php echo $i;?>" name="regular-checkbox" class="regular-checkbox" value="<?php echo $value['module_id']; ?>" />
                         <label for="checkbox-1-<?php echo $i;?>"></label>
                    </td>
                    <td><?php echo $value['module_name']; ?></td>                    
                    <?php
                    if($this->accessRolesList !='') {
                    $values = explode(',', $this->accessRolesList['access']);                       
                    ?>                    
                    <td class="text-center" id='access_status<?php echo $i;?>' >
                    <?php  if(in_array($value['module_id'], $values)){ ?>
                    <a href="#" onclick="saveAccessPages('access_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','n', 'access')">
                    <i class="icon-ok ok-btn"></i>
                    </a>
                    <?php }else {?>
                    <a href="#" onclick="saveAccessPages('access_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','y', 'access')">
                    <i class="icon-remove remov"></i>
                    </a>
                    <?php                                
                     }
                    ?>
                    </td>
                    
                    <td class="text-center" id='add_status<?php echo $i;?>' >
                    <?php  $addValues = explode(',', $this->accessRolesList['add']);
                    if(in_array($value['module_id'], $addValues)){
                    ?>
                    <a href="#" onclick="saveAccessPages('add_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','n', 'add')">
                    <i class="icon-ok ok-btn"></i>
                    </a>
                    <?php
                    } else {
                    ?>
                    <a href="#" onclick="saveAccessPages('add_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','y', 'add')">
                    <i class="icon-remove remov"></i>
                    </a>
                    <?php
                    }
                    ?>
                    </td>
                    
                    <td class="text-center" id='edit_status<?php echo $i;?>' >
                    <?php  $editValues = explode(',', $this->accessRolesList['edit']);
                    if(in_array($value['module_id'], $editValues)){
                    ?>
                    <a href="#" onclick="saveAccessPages('edit_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','n', 'edit')">
                    <i class="icon-ok ok-btn"></i>
                    </a>
                    <?php
                    } else {
                    ?>
                    <a href="#" onclick="saveAccessPages('edit_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','y', 'edit')">
                    <i class="icon-remove remov"></i>
                    </a>
                    <?php
                    }
                    ?>
                    </td>
                    
                    <td class="text-center" id='delete_status<?php echo $i;?>' >
                    <?php  $deleteValues = explode(',', $this->accessRolesList['delete']);
                    if(in_array($value['module_id'], $deleteValues)){
                    ?>
                    <a href="#" onclick="saveAccessPages('delete_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','n', 'delete')">
                    <i class="icon-ok ok-btn"></i>
                    </a>
                    <?php 
                    } else {
                    ?>
                    <a href="#" onclick="saveAccessPages('delete_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','y', 'delete')">
                    <i class="icon-remove remov"></i>
                    </a>
                    <?php
                    }
                    ?>
                    </td>
                    
                    <td class="text-center" id='status_status<?php echo $i;?>' >
                    <?php  $statusValues = explode(',', $this->accessRolesList['status']);
                    if(in_array($value['module_id'], $statusValues)){
                    ?>
                    <a href="#" onclick="saveAccessPages('status_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','n', 'status')">
                    <i class="icon-ok ok-btn"></i>
                    </a>
                    <?php
                    } else {
                    ?>
                    <a href="#" onclick="saveAccessPages('status_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','y', 'status')">
                    <i class="icon-remove remov"></i>
                    </a>
                    <?php } ?>
                    </td>
                  
                    
                    <?php
                    } else {
                    ?>
                    
                        <td class="text-center" id='access_status<?php echo $i;?>' >
                        <a href="#" onclick="saveAccessPages('access_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','y', 'access')">
                        <i class="icon-remove remov"></i>
                        </a>
                        </td>
                        
                        <td class="text-center" id='add_status<?php echo $i;?>' >
                        <a href="#" onclick="saveAccessPages('add_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','y', 'add')">
                        <i class="icon-remove remov"></i>
                        </a>
                        </td>
                        
                        <td class="text-center" id='edit_status<?php echo $i;?>' >
                        <a href="#" onclick="saveAccessPages('edit_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','y', 'edit')">
                        <i class="icon-remove remov"></i>
                        </a>
                        </td>
                        
                        <td class="text-center" id='delete_status<?php echo $i;?>' >
                        <a href="#" onclick="saveAccessPages('delete_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','y', 'delete')">
                        <i class="icon-remove remov"></i>
                        </a>
                        </td>
                         
                        <td class="text-center" id='status_status<?php echo $i;?>' >
                        <a href="#" onclick="saveAccessPages('status_status<?php echo $i;?>', '<?php echo $this->getUrl(5);?>', '<?php echo $value['module_id']; ?>','y', 'status')">
                        <i class="icon-remove remov"></i>
                        </a>
                        </td>
                  
                    <?php
                    }
                    ?>
                </tr>
                <?php
                $i++; }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- END Main Content -->
<script type="text/javascript">    
function saveAccessPages(id, roleId, moduleSlug, status, access) { 
  
    var ajaxLoading = false;
    if(!ajaxLoading) {
        var ajaxLoading = true;
        $.ajax({
            type: "POST",             
            url: "<?php echo SITEURL; ?>privileges/accessPages",
            data: 'roleId='+roleId+'&slugName='+moduleSlug+'&status='+status+'&accessName='+access,
            beforeSend: function(){
                $('#'+id).html('<i class="icon-spinner"></i>');
            },
            success: function(data) {
                 //alert(data);     
                 if(data == 1){
                 $('#'+id).html('<a href="#" onclick="saveAccessPages(\''+id+'\', \'<?php echo $this->getUrl(5);?>\', \''+moduleSlug+'\', \'n\', \''+access+'\')"><i class="icon-ok ok-btn"></i></a>');
                 } else {
                 $('#'+id).html('<a href="#" onclick="saveAccessPages(\''+id+'\', \'<?php echo $this->getUrl(5);?>\', \''+moduleSlug+'\', \'y\', \''+access+'\')"><i class="icon-remove remov"></i></a>');
                 }
                 ajaxLoading = false;
            }
        }); 
    }
    
}
</script>

