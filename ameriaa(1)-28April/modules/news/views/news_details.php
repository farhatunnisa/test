<div class="dashboardPage">
  <div class="pageWidth dashboard">
    
      <div id="SecondMenu">
        <div class="MenuHeading"><i class="icon-gears"></i>Dashboard Settings</div>
      </div>
      <!-- /sideBar -->
      
      <div class="dashboardInfo">
        <div class="dashboardInner">
          <h1 class="bdrTitle">News Details<span></span></h1><br>
          <table>
              <tr>
                  <td style="width: 150px;">News title</td>
                  <td> : </td>
                  <td><?php echo $this->newsDetails['blog_title']; ?></td>
              </tr>
              <tr>
                  <td>Short description</td>
                  <td> : </td>
                  <td><?php echo $this->newsDetails['short_desc']; ?></td>
              </tr>
              <tr>
                  <td>Full description</td>
                  <td> : </td>
                  <td><?php echo $this->newsDetails['full_desc']; ?></td>
              </tr>
              <tr>
                  <td>Posted by</td>
                  <td> : </td>
                  <td><?php echo $this->newsDetails['posted_by']; ?></td>
              </tr>
              <tr>
                  <td>Created date</td>
                  <td> : </td>
                  <td><?php echo $this->newsDetails['created_date']; ?></td>
              </tr>
              <tr>
                  <td>Image</td>
                  <td> : </td>
                  <td><img src="<?php echo IMAGEURL."uploads/blog/". $this->newsDetails['image']; ?> " ></td>
              </tr>
          </table>
        </div>
      </div>
      <!-- /dashboardInfo -->
      <div class="clear"></div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /dashboard -->
  <script type="text/javascript">
      $(document).ready(function() {
          $("#blog_form").validate({        
            rules: {
               'comment' : {
                 required:true
               }
            },
            messages: {  
              'comment' : {
                required:"Please enter email"
              }
            },
            submitHandler: function() {
                $.ajax({
                      type:'post',
                      url:'<?php echo SITEURL;?>blog/postcomment',
                      data: $("#blog_form").serialize(),
                      success: function(data) {                
                        if(data != 0) {
                            $("#comment_success").show();
                            $("#comment_success").html("Comment submitted successfully it will be activated with is 24 hours");
                            $("#comment_success").fadeOut(10000);                            
                            $("#blog_form")[0].reset();
                        } else {
                            $("#comment_success").show(); 
                            $("#comment_success").css("color","red"); 
                            $("#comment_success").html("Sorry somthing is wrong"); 
                            $("#comment_success").fadeOut(10000);
                        }
                    }
                });
            }
        });
      });     
</script>
<style>
    .forum-main {
        width: 99%;
        background-color: #f9f4e9;
        padding: 5px;
      }
      .forum {
        float: left;
        width: 40%;
      }
      .Posts {
        float: left;
        width: 15%;
      }
      .Freshness {
        float: left;
        width: 30%;
      }
      .forum-inner {
        padding: 0;
        margin: 0;
        width: 40%;
        float: left;
      }
      .Posts-inner {
        width: 15%;
        float: left;
      }
      .Freshness-inner {
        float: left;
        width: 30%;
      }
</style>