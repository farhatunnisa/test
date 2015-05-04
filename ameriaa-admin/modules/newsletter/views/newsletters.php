<?php
$permissions = $this->session->gets('permissions');
?>

<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md">
          <h1 class="m-n font-thin h3">Manage Newsletters</h1>
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
                  Newsletters
                </div>
                <div class="col-md-6 text-right">            
                  <div class="btn-group btn-align icons-top"> 
                      <a class="btn m-b-xs btn-sm btn-info btn-addon action-links"  title="Export data" href="<?php echo SITEURL; ?>newsletter/getexcel">
                          <i class="glyphicon glyphicon-export"></i>Export
                      </a>
                      <a class="btn m-b-xs btn-sm btn-danger btn-addon deleteme action-links"  title="Delete selected" href="javascript:void(0);" id="" 
                         url="<?php echo SITEURL; ?>newsletter/deleteNewsletter">
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
                <div class="clearfix"></div>                
                <div class="table-responsive">
                    <table class="table table-advance" id="testimonial_list">
                      <thead>
                        <tr>
                          <th style="width:18px" class="sorting-disabled">
                               <input type="checkbox" id="checkbox-1-1" class="regular-checkbox" />
                               <label for="checkbox-1-1"></label>
                          </th>
                          <th>Email</th>
                          <th class="text-right
                              sorting-disabled">Actions</th>
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
        $('#testimonial_list').dataTable({
            //"bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo SITEURL; ?>newsletter/getNewsletter",
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
                "sName": "Email",
                // "sClass": "text-center",
                "bSearchable": false,
                "bSortable": false,
                "fnRender": function (oObj) {
                    var name = oObj.aData[1];
                    return name;
                }
            },
            
            {
                "sName": "ID",
                "sClass": "text-center",
                "bSearchable": false,
                "bSortable": false,
                "fnRender": function (oObj) {
                    var actionButtons = '<a id="'+oObj.aData[3]+'" class="deleteme" url="<?php echo SITEURL; ?>newsletter/deleteNewsletter"><i class="fa fa-times fa-fw"></i></a>' ;
                    return actionButtons;
                }
            }
        ]
        });
    });
        
</script>