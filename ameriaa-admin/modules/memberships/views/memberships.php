<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md">
          <h1 class="m-n font-thin h3">Manage memberships</h1>
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
                      Memberships
                    </div>
                    <div class="col-md-6 text-right">            
                      <div class="btn-group btn-align icons-top">
                          <a class="btn m-b-xs btn-sm btn-primary btn-addon show-tooltip action-links" title="Add new memberships" 
                             href="<?php echo SITEURL; ?>memberships/add"><i class="icon-plus"></i>Add</a>                         
                          <a class="btn m-b-xs btn-sm btn-danger btn-addon deleteme action-links show-tooltip" title="Delete selected" href="javascript:void(0);" id="" url="<?php echo SITEURL; ?>memberships/deletememberships">
                              <i class="icon-trash"></i>Delete
                          </a>
                          <a class="btn m-b-xs btn-sm btn-warning btn-addon show-tooltip action-links show-tooltip" title="Refresh" href="javascript:void(0)" onclick="location.reload();">
                              <i class="icon-refresh"></i>Reload
                          </a>
                      </div>
                    </div>
                </div>              
            </div>              
            <div class="box-content">                
                <div class="table-responsive">
                    <table class="table table-advance" id="memberships_list">
                      <thead>
                        <tr>
                          <th style="width:18px" class="sorting-disabled">
                               <input type="checkbox" id="checkbox-1-1" class="regular-checkbox" />
                               <label for="checkbox-1-1"></label>
                          </th>
                          <th>Memberships Title</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>status</th>                    
                          <th class="text-center sorting-disabled">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td colspan="7" class="text-center"><img src="<?php echo THEMEURL ; ?>img/datatable_load.gif"></td>
                          </tr>
                      </tbody>
                    </table>
                </div><br>
            </div>            
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->
  
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        // success message
        $("#divsuccess").fadeOut(5000); 
        
        $('#memberships_list').dataTable({
            //"bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo SITEURL; ?>memberships/getMemberships",
            "sServerMethod": "POST",
            "sPaginationType": "full_numbers",
            "aoColumns": [
            {
                "sName": "ID",
                "bSearchable": false,
                "bSortable": false,
                "fnRender": function (oObj) {
                    var checkid = parseInt(oObj.aData[0]) + 1;
                    return '<input type="checkbox" id="checkbox-1-'+checkid+'" class="regular-checkbox" name="regular-checkbox"\n\
                            value="'+oObj.aData[0]+'"/><label for="checkbox-1-'+checkid+'"></label>'
                }
            },
            {
                "sName": "Memberships Title",
                // "sClass": "text-center",
                "bSearchable": false,
                "bSortable": false,
                "fnRender": function (oObj) {
                var name = oObj.aData[1];
                return name;
                }
            },
            {
                "sName": "Description",
                // "sClass": "text-center",
                "bSearchable": false,
                "bSortable": false,
                "fnRender": function (oObj) {
                    var name = oObj.aData[2];
                    return name;
                }
            },
            {
                "sName": "Price",
                // "sClass": "text-center",
                "bSearchable": false,
                "bSortable": false,
                "fnRender": function (oObj) {
                    var name = oObj.aData[3];
                    return name;
                }
            },

            {
                "sName": "status",
                "sClass": "text-center",
                "bSearchable": false,
                "bSortable": false,
                "fnRender": function (oObj) {
                    var sta = oObj.aData[4];
                    //alert(oObj.aData[4])
                    if(sta === '1') {
                    var status = '<div id="status'+oObj.aData[5]+'">\n\
                                    <a class="show-tooltip" title="Change status" href="javascript:void(0);" onclick="changeStatus('+"'status"+oObj.aData[5]+"'"+','+"'"+oObj.aData[5]+"'"+','+"'"+oObj.aData[4]+"'"+')" >\n\
                                        <i class="glyphicon glyphicon-ok"></i>\n\
                                        <div class="status_loader" style="display:none;">\n\
                                            <img src="<?php echo THEMEURL ; ?>img/loading_small.gif">\n\
                                        </div>\n\
                                    </a>\n\
                                  </div> ';
                    return status;
                    } else {
                        var status = '<div id="status'+oObj.aData[5]+'">\n\
                                        <a class="show-tooltip" title="Change status" href="javascript:void(0);" onclick="changeStatus('+"'status"+oObj.aData[5]+"'"+','+"'"+oObj.aData[5]+"'"+','+"'"+oObj.aData[4]+"'"+')" >\n\
                                            <i class="glyphicon glyphicon-remove"></i>\n\
                                            <div class="status_loader" style="display:none;">\n\
                                                <img src="<?php echo THEMEURL ; ?>img/loading_small.gif">\n\
                                            </div>\n\
                                        </a>\n\
                                      </div> ';
                        return status;
                    }
                }
            },
            {
                "sName": "ID",
                "sClass": "text-center",
                "bSearchable": false,
                "bSortable": false,
                "fnRender": function (oObj) {
                    var actionButtons = '<a class="show-tooltip" title="View membership" href="<?php echo SITEURL ;?>memberships/details/'+oObj.aData[5]+'"><i class="fa fa-eye fa-fw m-r-xs"></i></a>\n\
                                         <a class="show-tooltip" title="Edit membership" href="<?php echo SITEURL ;?>memberships/edit/'+oObj.aData[5]+'"><i class="fa fa-pencil fa-fw m-r-xs" ></i></a>\n\
                                         <a class="show-tooltip" title="Delete membership" id="'+oObj.aData[5]+'" class="deleteme" url="<?php echo SITEURL; ?>memberships/deletememberships"><i class="fa fa-times fa-fw"></i></a>' ;
                    return actionButtons;
                }
            }
        ]
        });
    });
    
    //change memberships status
    function changeStatus(id, membershipsId, status) {
        var url= "<?php echo SITEURL; ?>memberships/changeStatus";
        $('#'+id).html('<img src="<?php echo THEMEURL ; ?>img/loading_small.gif">');
        $.ajax({
            type: "POST",             
            url: url,
            data: 'statusId= ' + status + ' &membershipsId= ' + membershipsId,
            success: function(data) {                
                if(data == 1){
                    $('#'+id).html('<a href="javascript:void(0)" onclick="changeStatus(\''+ id +'\', \''+ membershipsId +'\', \'1\')">\n\
                                        <i class="glyphicon glyphicon-ok"></i>\n\
                                    </a>');
                } else {
                    $('#'+id).html('<a href="javascript:void(0)" onclick="changeStatus(\''+ id +'\', \''+ membershipsId +'\', \'0\')">\n\
                                        <i class="glyphicon glyphicon-remove"></i>\n\
                                    </a>');
                }
            }
        });
    }
</script>