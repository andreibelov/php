$(document).ready(function(){

	$(function(){
		$('li.menu-item ul.sub-menu').hide();
		$('li.menu-item').click(function () {
			if($('ul.sub-menu', this).is(":visible")){
				$('ul.sub-menu', this).slideUp('medium');
			} else {
				$('ul.sub-menu', this).slideDown('medium');
			}
		});
		$("li.menu-item ul.sub-menu a.sub_li").click(function(e) {
			e.stopPropagation();
		});
	});
	$("#mark").click(function () {
      $("#welcome").hide('drop', { direction: 'down' }, 1000);
	});
	$("#list2").click(function(){
		$("#content").load("/incl/db_con.php",function(){
			$('#checkall:checkbox').change(function () {
				if($(this).is(":checked")){  
					$("input:checkbox").prop("checked", true);
					$('#newspaper-a tr').attr("class","excited");  
				} else {
					$("input:checkbox").prop("checked", false);
					$('#newspaper-a tr').removeAttr("class");
					}
			});

			$('#newspaper-a tr').click(function(event) {
				if (event.target.type !== 'checkbox') {
					if (window.getSelection) {
					  if (window.getSelection().empty) {  // Chrome
						window.getSelection().empty();
					  } else if (window.getSelection().removeAllRanges) {  // Firefox
						window.getSelection().removeAllRanges();
					  }
					} else if (document.selection) {  // IE?
					  document.selection.empty();
					}
					$(':checkbox', this).trigger('click');
					
				}
			
				function clearSelection() {
					if(document.selection && document.selection.empty) {
						document.selection.empty();
					} else if(window.getSelection) {
						var sel = window.getSelection();
						sel.removeAllRanges();
					}
				}
			});
			
			$("input[type='checkbox']").change(function() {
			   $(this).closest("tr").toggleClass("excited"); 
			});	
		})
	});

	$("#addstr").click(function () {
		$("#content").hide('slide', {direction: 'right'}, 600);
    	$("#slider").show('slide', {direction: 'right'}, 600);
	});
	$("#archive").click(function () {
		$("#content").animate({
			marginLeft: '+=700px'
		}, 600);
    	$("#slider").hide('slide', {direction: 'right'}, 600);
	});
		
});