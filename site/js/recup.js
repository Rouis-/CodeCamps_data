function request_php()
	{
    	var gobe = "data/db.php";
    	console.log(gobe);
	    $.ajax({
		type: "GET",
		url: gobe,
		data: {
			title: $("#recherche").val() + "",
			cat: $("#cat").text(),
		},
		dataType: "json",
		success: function(data) {
			console.log($("#cat").text());
			console.log($("#recherche").val());
		    console.log(data);
		    liste(data);
		},
		error: function() {
		    console.log("Error");
		    console.log(arguments);
		}
  	  });
}


//request_php();