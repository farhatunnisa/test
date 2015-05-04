$(document).ready(function(){
	var s = $("#s"); // search input field
	var c = $("#results"); // results container
	var t; // timer 
	
	$("#s").keydown(function(e){
    clearTimeout(t);
    if (!args) { var args = []; }
    
    if (e.which === 65 && (e.ctrlKey || e.metaKey)) {
        // allow the user to ctrl+a or cmd+a to select text
        // without calling a new search function
    } else {
			t = setTimeout(function(){ vimeoSearch() }, 400);  		
		}
	});
		
	function vimeoSearch() {
		c.empty();
		var q = s.val();
		
		c.html('<img src="vimeo/images/loader.gif" alt="loading..." id="loader">');
		
		$.ajax({
			type: 'POST',
			url: 'vimeo/ajax.php',
			data: "q="+q,
			success: function(data){
				
				$.each(data, function(i, item) {
					var code = '<div class="v"> <span class="details"><img src="'+data[i].userpic+'" class="userpic"> <h3>'+data[i].title+'</h3> <span class="user">uploaded by <a href="javascript:selectVideo(\'' + data[i].userurl + '\',\'vimeo\')">'+data[i].username+'</a></span></span> <a href="javascript:selectVideo(\'' + data[i].url + '\',\'vimeo\')" class="wrapping"><img src="'+data[i].thumbnail+'" alt="'+data[i].title+' video thumbnail" class="thumbnail"></a> </div>';					
					$("#loader").remove();
					c.append(code);
				}); // end each loop
			},
			error: function(xhr, type, exception) { 
				c.html("Vimeo Error: " + type); 
			}}); // end ajax call
	} // end vimeoSearch() function
});