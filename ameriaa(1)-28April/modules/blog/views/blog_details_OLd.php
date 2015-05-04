<div class="dashboardPage">
  <div class="pageWidth dashboard">
    
      <div id="SecondMenu">
        <div class="MenuHeading"><i class="icon-gears"></i>Dashboard Settings</div>
      </div>
      <!-- /sideBar -->
      
      <div class="dashboardInfo">
        <div class="dashboardInner">
          <h1 class="bdrTitle">Blog Details<span></span></h1><br>
          <table>
              <tr>
                  <td style="width: 150px;">Blog title</td>
                  <td> : </td>
                  <td><?php echo $this->blogDetails['blog_title']; ?></td>
              </tr>
              <tr>
                  <td>Short description</td>
                  <td> : </td>
                  <td><?php echo $this->blogDetails['short_desc']; ?></td>
              </tr>
              <tr>
                  <td>Full description</td>
                  <td> : </td>
                  <td><?php echo $this->blogDetails['full_desc']; ?></td>
              </tr>
              <tr>
                  <td>Posted by</td>
                  <td> : </td>
                  <td><?php echo $this->blogDetails['posted_by']; ?></td>
              </tr>
              <tr>
                  <td>Created date</td>
                  <td> : </td>
                  <td><?php echo $this->blogDetails['created_date']; ?></td>
              </tr>
          </table>
          <br> 
          <div>
              <?php if($this->session->gets('ameriaa_user_id') != ''){ ?>
              <form id="blog_form">
                <div class="regsterDiv dashDetails cpw">
                  <div id="comment_success" style="display: none;color: green;font-weight: bold;"></div>                        
                  <ul>
                    <li style="width: 100%;">
                      <div>Your Comment<span>*</span></div>
                      <div>
                          <textarea class="textBox" name="comment" id="comment" style="background: #f8f8f8;
                            border: 1px solid #cbcbcb;
                            height: 75px;
                            line-height: 18px;
                            padding: 7px 1%;
                            width: 100%;
                            color: #444;"></textarea>
                      </div>
                    </li>
                    <li style="width: 100%;">
                      <div></div>
                      <div>
                        <input type="hidden" name="user_id" value="<?php echo $this->session->gets('ameriaa_user_id') ?>">
                        <input type="hidden" name="blog_id" value="<?php echo $this->blogDetails['blog_id']; ?>">
                        <button type="submit" class="btn btnBlue" id=""><i class="icon-ok"></i>Submit</button>                        
                      </div>
                    </li>
                  </ul>                  
                  
                </div>
              </form>
              <?php } ?>
              <div>
                  <h2>Comments</h2>
                  <div class="forum-main">
                    <div class="forum">
                      <h5>Description</h5>
                    </div>

                    <div class="Posts">
                      <h5>Comment by</h5>
                    </div>
                    <div class="Freshness">
                      <h5>Created date</h5>
                    </div>
                    <div class="clear"></div>
                  </div><div class="clear"></div>
                  <?php foreach ($this->commentslist as $commentdata) { ?>
                  <div class="forum-box forum-box1">
                    <div class="forum-inner">                      
                      <p><?php echo $commentdata['description']; ?></p>
                    </div>
                    <div class="Posts-inner">
                      <p><?php echo $commentdata['first_name'] . " " . $commentdata['middle_name'] . " " . $commentdata['family_name']; ?></p>
                    </div>
                    <div class="Freshness-inner">
                      <p><?php echo $commentdata['created_on']; ?></p>
                    </div>
                    <div class="clear"></div>
                  </div>
                  <?php } ?>
                  <div class="clear"></div>
                  
              </div>
          </div>
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