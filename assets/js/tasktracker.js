/**
 * Task Tracker Application JS
 */

var tasktracker = {};

tasktracker.isAvailableValidation = function(options){
	var defaultSettings = {
		'selector' : '#key',
		'module' : 'projects',
		'onBlur' : function(instance){
			return {};
		},
		'onSuccess' : function(response){

		},
		'onError' : function(response){

		}
 	};

 	defaultSettings = $.extend(defaultSettings, options);
 	console.log(defaultSettings);
 	$(defaultSettings.selector).blur(function(){
 		if($(this).val() == ''){
 			$(this).parent().addClass('has-error').removeClass('has-success');
 		}else{
	 		var data = defaultSettings.onBlur(this);
	 		$.ajax({
	 			async: true,
	 			cache: false,
	 			url: tasktracker.apiurl + defaultSettings.module + '/isAvailable',
	 			data: data,
	 			type: 'POST',
	 			success: defaultSettings.onSuccess,
	 			error: defaultSettings.onError
	 		});
 		}
 	});
};

/**
 * Call all the commonly required JS directly
 */
 $(function(){
 	/**
 	 * Assign onFocus next click events
 	 */

	
 	$('.date input[type=text], .colorpicker input[type=text]').focus(function(){ 
		$(this).next().click();
	});
	$(".select2").select2();

 });