$(function() {
	var eventPhoto = {
        'open' : function(id) {
            $("#myModal #photo_id").val($(id).attr("url"));
            $("#myModal #title").val($(id).attr("title"));
            $("#myModal #long_desc").val($(id).attr("description"));
            //$("#myModal #status").val($(id).attr("status"));
            $('#myModal').modal('show');
        },
        'close' : function() {
            $('.modal').modal('hide');
        },
        'save' : function(e) {
            e.preventDefault();
            var url = $("#photoinfo").attr('action');
            var data = $("#photoinfo").serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                beforeSend: function(){
                    $("#pleasewait").show();
                },
                complete: function(){
                    $("#pleasewait").hide();
                    eventPhoto.close();
                },
                success:function(result){
                    if(result){                        
                        $(".success_msg").show(function(){
                            $(this).html('<i class="icon-check"></i><span class="text-success">Successfully saved picture information.</span>');
                        }); 
                        //$(".success_msg").delay(5000).hide();
                    } else {
                        $(".success_msg").show(function(){
                           $(this).html('<i class="icon-remove"></i><span class="text-error">Error Message Error Message Error Message</span>');
                        });
                    }
                }
            }); 
        },
        'openDropzone' : function() {
            $("#upload-dropzone-area").slideToggle( "slow" );
        },
        'openConfirm' : function(id) {
            $('#myModal-Delete').modal('show');
            $("#myModal-Delete #photo_id").val($(id).attr("url"));
            
            $(document).on("click","#myModal-Delete #submit",function(e){
                e.preventDefault();
                
                var url = $("#photodelete").attr('action');
                var data = $("#photodelete").serialize();
                
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    beforeSend: function(){
                        $("#pleasewait").show();
                    },
                    complete: function(){
                        $("#pleasewait").hide();
                        eventPhoto.close();
                    },
                    success:function(result) {
                        if(result){
                            $("#photoid_"+result).fadeOut();
                            $(".success_msg").show(function(){
                                $(this).html('<i class="icon-check"></i><span class="text-success">Successfully saved picture information.</span>');
                            });

                        } else {
                             $(".success_msg").show(function(){
                                $(this).html('<i class="icon-remove"></i><span class="text-error">Error Message Error Message Error Message</span>');
                             });
                        }
                    }
                }); 
            });            
        }
    };
    
    $(document).on("click","a.eventphoto_edit",function(e){
        eventPhoto.open(this);
    });
    
    $(document).on("click","#close",function(e){
        eventPhoto.close();
    });
    
    $(document).on("click","#myModal #submit",function(e){
        eventPhoto.save(e);
    });
    
    $(document).on("click","#upload-dropzone",function(e){
        eventPhoto.openDropzone();
    });
    
    $(document).on("click","a.eventphoto_delete",function(e){
        eventPhoto.openConfirm(this);
    });
    
    $(document).on('hidden', function() {
        $('.modal').removeData();
    });
    
});