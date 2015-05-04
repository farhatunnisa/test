<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md">
          <h1 class="m-n font-thin h3">Manage quiz</h1>
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
                      Quiz
                    </div>
                    <div class="col-md-6 text-right">            
                      <div class="btn-group btn-align icons-top">
                          <a class="btn m-b-xs btn-sm btn-primary btn-addon show-tooltip action-links" title="Add new Banner" 
                             href="<?php echo SITEURL; ?>quiz/add">
                              <i class="icon-plus"></i>Add
                          </a>                         
                          <a class="btn m-b-xs btn-sm btn-danger btn-addon deleteme action-links" title="Delete selected" href="javascript:void(0);" id="" url="<?php echo SITEURL; ?>quiz/deleteTopic">
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
                    <table class="table table-advance" id="quiz_list">
                      <thead>
                        <tr>
                          <th style="width:18px" class="sorting-disabled">
                            <input type="checkbox" id="checkbox-1-1" class="regular-checkbox" value="selectall"/>
                            <label for="checkbox-1-1"></label>
                        </th>                                     
                        <th>Topic Name</th>
                        <th class="text-center sorting-disabled">Test</th>
                        <th class="text-center sorting-disabled">View</th>
                        <th class="text-center sorting">Status</th>
                        <th class="text-center sorting-disabled">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            $ch = 1;
                            foreach($this->topicList as $value) { $ch++; 
                            ?>
                            <tr class="table-flag-blue" id="deleteitem_<?php echo $value['topic_id'];   ?>">
                                <td width="5%">
                                    <input type="checkbox" id="checkbox-1-<?php echo $ch; ?>" class="regular-checkbox" name="regular-checkbox" value="<?php echo $value['topic_id']; ?>"/>
                                    <label for="checkbox-1-<?php echo $ch; ?>"></label>
                                </td>

                                <td  width="30%"><?php echo $value['topic_name']; ?></td>
                                <td  class="text-center">
                                    <a href="<?php echo SITEURL; ?>quiz/testquestion/<?php echo $value['topic_id'];?>" title="" class="btn bg-success" data-original-title="View"><i class="fa fa-comment-o"></i></a>
                                </td>
                                <td  class="text-center">
                                    <a href="<?php echo SITEURL; ?>quiz/manageTestQuestions/<?php echo $value['topic_id'];?>" title="" class="btn bg-light" data-original-title="View"><i>View</i></a>
                                </td>
                                <td class="text-center" id="status<?php echo $ch;?>">
                                    <?php
                                        if($value['status'] == '1') {
                                    ?>
                                    <a href="javascript:void(0)" onclick="changeStatus('status<?php echo $ch;?>', '<?php echo $value['topic_id'];?>', '<?php echo $value['status'];?>')">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    <?php } else { ?>
                                    <a href="javascript:void(0)" onclick="changeStatus('status<?php echo $ch;?>', '<?php echo $value['topic_id'];?>', '<?php echo $value['status'];?>')">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    <?php } ?>
                                    </a>
                                </td>
                                <td  width="15%" class="text-center">
                                    <a href="<?php echo SITEURL; ?>quiz/details/<?php echo $value['topic_id'];?>" title="" class="btn btn-info btn-view show-tooltip" data-original-title="View"><i class="icon-eye"></i></a>
                                    <a href="<?php echo SITEURL; ?>quiz/edit/<?php echo $value['topic_id'];?>" title="" class="btn btn-primary btn-edit show-tooltip" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a href="javascript:void(0);" title="" class="btn btn-danger btn-delete show-tooltip deleteme" data-original-title="Delete" id="<?php echo $value['topic_id'];?>" url="<?php echo SITEURL; ?>quiz/deleteTopic"><i class="icon-trash"></i></a>
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

  </script>
 <script type="text/javascript">
        $(document).ready(function(){
            $("#divsuccess").fadeOut(5000)
        });
        function changeStatus(id, user_id, status) {
            var url= "<?php echo SITEURL; ?>quiz/changeStatus";
            $('#'+id).html('<img src="<?php echo THEMEURL ; ?>images/loading_small.gif">');
            $.ajax({
                type: "POST",             
                url: url,
                data: 'statusId='+status+'&TopicId='+user_id,
                success: function(data) {  
                    if(data == 1){
                        $('#'+id).html('<a href="javascript:void(0)" onclick="changeStatus(\''+ id +'\', \''+ user_id +'\', \'y\')">\n\
                                            <i class="glyphicon glyphicon-ok"></i>\n\
                                        </a>');
                    } else {
                        $('#'+id).html('<a href="javascript:void(0)" onclick="changeStatus(\''+ id +'\', \''+ user_id +'\', \'n\')">\n\
                                            <i class="glyphicon glyphicon-remove"></i>\n\
                                        </a>');
                    }
                }
            });
        }
    </script>
      
  
