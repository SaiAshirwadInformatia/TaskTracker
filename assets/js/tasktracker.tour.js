$(function(){
var tour = new Tour({
	//backdrop: true,
	 keyboard: true,
	 //backdropContainer: 'body',
	 // duration: 5000,
	 //delay: 5000,
	steps: [
		{
			element : "a#toggle-btn",
			title : "Press this Button",
			content : "This button acts as a Navigation Drawer which will open & minimize the Navigation Drawer at the Left hand Side of your screen."
		},
		{
			element : "#profile-link",
			title : "Profile",
			content : "This option will take you to the Profile Page , so that you can manage your looks, details about you, passwords and many more..."
		},
		{
			element : "#toggle-btn",
			title : "Navigation Drawer",
			content : "This button acts as a Navigation Drawer which will open & minimize the Navigation Drawer at the Left hand Side of your screen."
		}	
	]

});
});