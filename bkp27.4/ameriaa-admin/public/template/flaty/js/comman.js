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
    
    $(document).on("click","a.eventphoto_delete",function(e){
        eventPhoto.openConfirm(this);
    });
    
    $(document).on('hidden', function() {
        $('.modal').removeData();
    });
});

//-------------------  delete multiple records --------------------------//
$(document).on("click", ".deleteme" ,function(e){
        var check_id = $(this).attr("id");
        if(check_id != "") {
           var data = check_id;
        } else {
            var checked = $(".regular-checkbox:checked").length > 0;
            if (!checked){
                alert("Please check at least one checkbox");
                return false;
            }
            var data = new Array();
            $("input[name='regular-checkbox']:checked").each(function(i) {
                data.push($(this).val());
            });
        }
        if (!data){
            alert("Please check at least one checkbox");
            return false;
        } else {
            if(confirm("Are You Sure Delete!")) {
                $.ajax({
                    type: "POST",
                    url: $(this).attr("url"),
                    data: 'deleteme='+ data,
                    success: function (msg) { 
                        $("#"+check_id).parent().parent().hide();
                        if(msg) {                            
                            if($.isArray(data)) {
                                for (var i=0;i<data.length;i++) {
                                    $("#deleteitem_"+data[i]).fadeOut("slow");                                    
                                }
                                $(".success_msg").show(function(){
                                    $(this).html('<i class="icon-check"></i><span class="text-success">Successfully deleted.</span>');
                                });
                            } else {
                                $("#deleteitem_"+data).fadeOut("slow");
                                $(".success_msg").show(function(){
                                    $(this).html('<i class="icon-check"></i><span class="text-success">Successfully deleted.</span>');
                                    $(".success_msg").fadeOut(5000);
                                });
                            }                           
                        } else {
                            $(".success_msg").show(function(){
                                $(this).html('<i class="icon-remove"></i><span class="text-error">Error on deleting.</span>');
                                $(".success_msg").fadeOut(5000);
                            });
                        }
                    }
                });
            } else {
                return false;
            }
        }
    });
    
    
    $(document).ready(function(){        
        // cancle button function
        $('#cancel').click(function() {
           if(confirm("Are you sure you want to navigate away from this page?"))
           {
              history.go(-1);
           }        
           return false;
        });
        
        //---------------- Active Tile --------------------//
        if ($('.tile-active').size() > 0) {
            var tileMoveDuration = 1500;
            var tileDefaultStop = 5000;

            var tileGoUp = function(el, stop1, stop2, height) {
                $(el).children('.tile').animate({top: '-='+ height +'px'}, tileMoveDuration);
                setTimeout(function(){ tileGoDown(el, stop1, stop2, height); }, stop2 + tileMoveDuration);
            }

            var tileGoDown = function(el, stop1, stop2, height) {
                $(el).children('.tile').animate({top: '+='+ height +'px'}, tileMoveDuration);
                setTimeout(function(){ tileGoUp(el, stop1, stop2, height); }, stop1 + tileMoveDuration);
            }

            $('.tile-active').each(function(index, el){
                var tile1, tile2, stop1, stop2, height;

                tile1 = $(this).children('.tile').first();
                tile2 = $(this).children('.tile').last();
                stop1 = $(tile1).data('stop');
                stop2 = $(tile2).data('stop');
                height = $(tile1).outerHeight();

                if (stop1 == undefined) {
                    stop1 = tileDefaultStop;
                }
                if (stop2 == undefined) {
                    stop2 = tileDefaultStop;
                }

                setTimeout(function(){ tileGoUp(el, stop1, stop2, height); }, stop1);
            });
        }
        //Check all and uncheck all table rows
        $('.table > thead > tr > th:first-child > input[type="checkbox"]').change(function() {
            var check = false;
            if ($(this).is(':checked')) {
                check = true;
            }
            $(this).parents('thead').next().find('tr > td:first-child > input[type="checkbox"]').prop('checked', check);
        })
        
        //------------------------------ Form validation --------------------------//
        if (jQuery().validate) {
            var removeSuccessClass = function(e) {
                $(e).closest('.form-group').removeClass('has-success');
            }
            $('#validation-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",

                invalidHandler: function (event, validator) { //display error alert on form submit              

                },

                highlight: function (element) { // hightlight error inputs
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change dony by hightlight
                    $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
                    setTimeout(function(){removeSuccessClass(element);}, 3000);
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                }
            });
        }
        
        //------------- date range picker -----------//
        // disabling dates
//        var nowTemp = new Date();
//        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
//
//        var checkin = $('#dpd1').datepicker({
//          onRender: function(date) {
//            return date.valueOf() < now.valueOf() ? 'disabled' : '';
//          }
//        }).on('changeDate', function(ev) {
//          if (ev.date.valueOf() > checkout.date.valueOf()) {
//            var newDate = new Date(ev.date)
//            newDate.setDate(newDate.getDate() + 1);
//            checkout.setValue(newDate);
//          }
//          checkin.hide();
//          $('#dpd2')[0].focus();
//        }).data('datepicker');
//        var checkout = $('#dpd2').datepicker({
//          onRender: function(date) {
//            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
//          }
//        }).on('changeDate', function(ev) {
//          checkout.hide();
//        }).data('datepicker');
        
        
    });
    
    
//********* tooltip *********//
$(document).on("mouseover",".show-tooltip",function(){ 
    $('.show-tooltip').tooltip({container: 'body', delay: {show:500}});
});
    