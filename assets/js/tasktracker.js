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


tasktracker.doStatusChange = function(){
	var taskId = $(this).data('taskId');
	var status = $(this).data('state');
	var task = $(this).data('task');
	var buttonGroup = $(this).data('buttonGroup');
	// AJAX for changing state
	task.state = status;
	console.log('Update to Status: ' + status);
 	$('#task_card_' + taskId).appendTo('#' + status);
	$(buttonGroup).children().remove();
	tasktracker.drawButton(task,buttonGroup);

};

tasktracker.drawButton = function(task, buttonGroup){
	var nextState = tasktracker.nextStatus[task.state]['next'];
	for(var stateIdx in nextState){
		var myState = nextState[stateIdx];
		var icon = tasktracker.nextStatus[myState]['icon']
		var button = $('<button class="btn btn-xs btn-'+tasktracker.status[myState].className+'" title="'+myState+'"><i class="'+icon+'">');
		$(button).data('taskId', task.id);
		$(button).data('state', myState);
		$(button).data('task', task);
		$(button).data('buttonGroup', buttonGroup);
		$(button).click(tasktracker.doStatusChange);
		$(button).appendTo(buttonGroup);
	}
};
tasktracker.doAssign  = function(){
	var taskId = $(this).data('taskId');
};

tasktracker.changeAssignedMember = function(task, selectTag){
	$(selectTag).change(function(){
		var assignedUser = $(selectTag).val();
		$.ajax({
			async: true,
			cache: false,
			type: 'POST',
			url: tasktracker.apiurl+'/tasks/changeAssignedMemberByTaskId',
			data: {
				task_id : task['id'],
				assigned_id : assignedUser,
			},
			success: function(response){
				var result = response;
				if(result.status != 'OK'){
					console.log('Cannot assigned new mwmber for task - '+task.title)
				}else{
					console.log('Status - '+result.status);
					console.log('Task ID - '+result.task_id);
					console.log('Assigned Id - '+result.assigned_id);
				}
			}
		});
	});
}

tasktracker.drawCard = function(task, container, color, teamMembers){
	//console.log('Drawing Card');
	//console.log(task);
	var box = $('<div id="task_card_' + task.id + '" class="box box-'+color+'">');
	var boxTitle = $('<div class="box-header with-border">');
	var timeAgo = $('<small class="pull-right"><time id="'+task.assigned_id+'_'+task.id+'" datetime="'+task.creation_ts+'">');
	var H3 = $('<h3 class="box-title">');
	var boxBody = $('<div class="box-body task_content">');
	var boxFooter = $('<div class="box-footer">');
	var description = $('<small>');
	var selectTag = $('<select class="select2 select2-hidden-accessible" id="'+task['id']+'" style="width:50%">');
	$(selectTag).data('taskId', task.id);
	$(selectTag).change(tasktracker.doAssign);
	var buttonGroup = $('<div class="btn-group '+task['id']+'_button pull-right">');
	tasktracker.drawButton(task, buttonGroup);
	console.log('Team Members in Draw Card : ');
	console.log(teamMembers);
	for(var key in teamMembers){
		var user = teamMembers[key];
		//console.log('User');
		//console.log(user);
		var option = $('<option value="'+user.id+'">');
		$(option).html(user.fname + ' ' + user.lname);
		if(task.assigned_id === user.id){
			 $(option).prop('selected', true);
		}
		$(selectTag).append(option);
	}
	$(H3).html(task['title']);
	$(description).html(task['description']);
	$(H3).appendTo(boxTitle);
	$(boxBody).append(description);
	$(boxTitle).append(timeAgo);
	$(selectTag).appendTo(boxFooter);
	$(buttonGroup).appendTo(boxFooter);
	$(boxTitle).appendTo(box);
	$(boxBody).appendTo(box);
	$(boxFooter).appendTo(box);
	$(box).appendTo(container);		
	$(selectTag).select2();
	tasktracker.changeAssignedMember(task, selectTag);
	$('time').timeago();
	$('.task_content').slimScroll({
		height: '150px',
		size: '5px'
	});
};



tasktracker.kanbanBuilder = function(){

	var teamMembers = [];
	var releaseId;

	var prepareTeamMembers = function(){
		$.ajax({
			async: true,
			cache: false,
			type : 'POST',
			data: {
				release_id: releaseId
			},
			url: tasktracker.apiurl + '/releases/teamMembers',
			success: function(response){
				teamMembers = response;
				console.log('Team Members : ');
				console.log(teamMembers);
				startBuilding();
			}
		});
	};

	var loadTaskByStatus = function(state,taskType){
		$.ajax({
			aync : true,
			cache: false,
			type: 'POST',
			url: tasktracker.apiurl+'/tasks/getByState',
			data: {
				state : state.label,
				release_id : releaseId
			},
			success: function(response){
				console.log('Response for: ' + state.label);
				console.log(response);
				if(response.length > 0){
					for(var key in response){
						var task = response[key];
						var taskType = tasktracker.taskType[task.type];
						tasktracker.drawCard(task,'#' + state.label, taskType.className, teamMembers);
					}
				}
			}
		});
	};

	var startBuilding = function(){
		for(var sIdx in tasktracker.status){
			var state = tasktracker.status[sIdx];
			if(state.kanban){
				console.log('Preparing kanban for: ' + state.label);
				$('#' + state.label).children().remove();
				loadTaskByStatus(state);
			}
		}
	};

	this.start = function(release_id){
		releaseId = release_id;
		prepareTeamMembers();
	}
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