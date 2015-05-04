
<!-- BEGIN Content -->
  <div id="content" class="app-content" role="main"> 
      <div class="app-content-body "> 
    <!-- BEGIN Breadcrumb -->
     <div class="bg-light lter b-b wrapper-md">
          <h1 class="m-n font-thin h3">Manage Questions</h1>
     </div>
    <!-- END Breadcrumb -->
    
 <!-- BEGIN Main Content -->
    <div class="wrapper-md">
      <div class="panel panel-default">
        <div class="panel-heading">
           <div class="row">
            <div class="col-md-6">
              Test Question
            </div>
            <div class="col-md-6 text-right">            
              <div class="btn-group btn-align icons-top">
                  <a class="btn m-b-xs btn-sm btn-primary btn-addon show-tooltip action-links" title="Add new Banner" 
                     href="<?php echo SITEURL?>quiz/testquestion/<?php echo $this->testId; ?>">
                      <i class="icon-plus"></i>Add
                  </a>                         
                  <a class="btn m-b-xs btn-sm btn-info btn-addon deleteme action-links" title="Delete selected" href="javascript:void(0);" id="" url="<?php echo SITEURL; ?>quiz/deleteTopic">
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
              <table class="table table-advance" id="table3">
                <thead>
                  <tr>
                    <th style="width:18px"><input type="checkbox" id="checkbox-1-1" class="regular-checkbox" />
                    <label for="checkbox-1-1"></label></th>                                    
                    <th>Question Name</th>
                    <th>Options</th> 
                    <th>Status</th>                              
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    if($this->questionsLists != '') {
                         $i= 2;
                    foreach($this->questionsLists as $value) {
                    ?>
                  <tr class="table-flag-blue">
                    <td><input type="checkbox" id="checkbox-1-<?php echo $i;?>" name="regular-checkbox" class="regular-checkbox" value="<?php echo $value['question_id']; ?>" />
                      <label for="checkbox-1-<?php echo $i;?>"></label></td>                                         
                    <td><?php echo $value['question_name']; ?></td>                   
                    <td><a href="<?php echo SITEURL;?>quiz/displayTestQuestionOptions/<?php echo $value['question_id'];?>" title="" class="btn btn-primary btn-sm show-tooltip" data-original-title="Edit">
                           <?php echo count($this->choiceCountDetails[$value['question_id']]);?>
                        </a>
                    </td>                    
                    <td>
                        <?php
                        if($value['question_status'] == 'y') {
                        ?>
                        <i class="glyphicon glyphicon-ok"></i>
                        <?php } else { ?>
                       <i class="glyphicon glyphicon-remove"></i>
                        <?php } ?>                             
                    </td>                   
                    <td class="text-center">
                        <a href="<?php echo SITEURL;?>quiz/editTestQuestion/<?php echo $value['question_id']; ?>" title="" class="btn btn-primary btn-sm show-tooltip" data-original-title="Edit">
                            <i class="icon-pencil"></i>
                        </a>          
                        <a href="<?php echo SITEURL;?>quiz/deleteTestQuestion/<?php echo $value['question_id']; ?>/<?php echo $value['test_id']; ?>" title="" class="btn btn-danger btn-sm show-tooltip" data-original-title="Delete">
                            <i class="icon-trash"></i>
                        </a>                       
                    </td>
                  </tr>
                 <?php
                    $i++;}  }                        
                    ?>                                  
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>
    </div>
 </div>
</div>
    <!-- END Main Content --> 
   <script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
 $("#deleteall").click(function (){
			
                     var checked = $(".regular-checkbox:checked").length > 0;
			if (!checked){
			alert("Please check at least one checkbox");
			return false;
		}else
			{
			if(confirm("Are You Sure Delete!")){
			var data = new Array();
			$("input[name='regular-checkbox']:checked").each(function(i) {
                          
                      	data.push($(this).val());
			});
			
			$.ajax({
				type: "POST",
                                    url: "<?php echo SITEURL;?>quiz/deleteAllTestQuestions",
				data: 'deletdata='+ data +'&action_delet=deletall',
				success: function (msg) {                           
                           	document.location.reload();
					}
				});
			
			}else{
				return false;
			}
		}
		});
});
</script>