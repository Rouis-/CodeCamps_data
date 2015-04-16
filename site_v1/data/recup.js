function search()
	{
    	var gobe = "data/db.php";
    	console.log(gobe);
	    $.ajax({
		type: "GET",
		url: gobe,
		data: {
			title: "rouge",
			actor: "",
			cat: "cinema",
			director: "",
		},
		dataType: "json",
		success: function(data) {
			console.log("ok ");
		    console.log(data);
		    add_div(data);
		},
		error: function() {
		    console.log("Error");
		    console.log(arguments);
		}
  	  });
}

function add_div(data)
{


}

search();