
<!-- BEGIN Content -->
  <div id="content" class="app-content" role="main"> 
   <div class="app-content-body ">
    <!-- BEGIN Breadcrumb -->
       <div class="bg-light lter b-b wrapper-md">
          <h1 class="m-n font-thin h3">Manage Test Question Options</h1>
       </div>
    <!-- END Breadcrumb --> 
    
<!-- BEGIN Main Content -->
    <div class="wrapper-md">
      <div class="panel panel-default">
        <div class="panel-heading">
           <div class="row">
                <div class="col-md-6">
                  Manage Test Question Options
                </div>
                <div class="col-md-6 text-right">            
                  <div class="btn-group btn-align icons-top">
                      
                      <a class="btn m-b-xs btn-sm btn-warning btn-addon show-tooltip action-links" title="Refresh" href="javascript:void(0)" onclick="location.reload();">
                          <i class="icon-refresh"></i>Reload
                      </a>
                  </div>
                </div>
              </div> 
        </div>
          <div class="box-content">
            <div class="table-responsive">
              <table class="table table-advance" id="table1">
                <thead>
                  <tr>
                    <th style="width:18px"><input type="checkbox" id="checkbox-1-1" class="regular-checkbox" />
                    <label for="checkbox-1-1"></label></th>  
                    <th>Options</th>   
                    <th class="sorting">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    if($this->optionsLists != '') {
                         $i= 2;
                    foreach($this->optionsLists as $value) {
                    ?>
                   <tr class="table-flag-blue">
                    <td><input type="checkbox" id="checkbox-1-<?php echo $i;?>" name="regular-checkbox" class="regular-checkbox" value="" />
                      <label for="checkbox-1-<?php echo $i;?>"></label></td> 
                  
                    <td><?php echo $value['choice_name'];?></td>                    
                    <td>
                        <a href="<?php echo SITEURL;?>quiz/editOption/<?php echo $value['question_id']; ?>/<?php echo $value['choice_id'];?>" title="" class="btn btn-primary btn-sm show-tooltip" data-original-title="Edit">
                            <i class="icon-pencil"></i>
                        </a>                                    
                     </td>
                  </tr>
                 <?php
                    $i++;}  }                        
                    ?>
                </tbody>
              </table>
            </div>
            
             <div class="table-responsive" style="border:0">
              <table class="table table-advance" id="table1">
                <thead>
                  <tr>
                    <th style="width:18px"><input type="checkbox" id="checkbox-1-1" class="regular-checkbox" />
                    <label for="checkbox-1-1"></label></th> 
                    <th>Answer</th>
                    <th>Answer Explanation</th>
                  </tr>
                </thead>
                <tbody>
                   
                  <tr class="table-flag-blue">
                    <td><input type="checkbox" id="checkbox-1-<?php echo $i;?>" name="regular-checkbox" class="regular-checkbox" value="" />
                      <label for="checkbox-1-<?php echo $i;?>"></label></td>                                       
                     
                     <td><?php echo $this->optionAnswerLists['choice_name'];?></td>
                     <td><?php echo $this->answerLists['question_explanation'];?></td>                    
                     <td>               
                    </td>
                  </tr>  
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
 $("#deleteall").click(function () { 
			
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
				url: "<?php echo SITEURL;?>quiz/deleteAllTests",
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