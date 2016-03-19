$(function(){
		var tour = new Tour({
			//backdrop: true,
			 keyboard: true,
			 //backdropContainer: 'body',
			 // duration: 5000,
			 //delay: 5000,
			steps: [
				{
					element : "#toggle-btn",
					backdrop: true,
					title : "Press this Button",
					content : "This button acts as a Navigation Drawer which will open & minimize the Navigation Drawer at the Left hand Side of your screen."
				},
				{
					element : "#profile-link",
					backdrop: true,
					title : "Profile",
					content : "This option will take you to the Profile Page , so that you can manage your looks, details about you, passwords and many more..."
				},
				{
					element : "#toggle-btn",
					backdrop: true,
					title : "Navigation Drawer",
					content : "This button acts as a Navigation Drawer which will open & minimize the Navigation Drawer at the Left hand Side of your screen."
				}	
			]

		})

		tour.init(true);
		tour.start(true);
	});