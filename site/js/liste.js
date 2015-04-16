function liste(params)
{
	$(".square").remove();
	$.each(params, function(ind, obj) {
		addSquare(obj);
	});
}


function addSquare(params) {

	var $container = $("#container");
	var square = $("<div>").attr("class", "square");
	square.append('<h3>' + params.Title + '</h3>');
	if (params.Ep != "NC")
		square.append('<h4>'+params.Ep+'</h4>');
	else;
	if (params.URLP != "NC")
		square.append('<img src="'+params.URLP+'">');
	else
		square.append('<p style="color: red">Image Indisponible</p>');
	square.append(
			'<p>Origine: ' + params.ProdC + '</p>' +
			'<p>Producteur: ' + params.Dir+ '<p>' +
			'<p>Plate-forme VOD: ' + params.VOD+ '<p>' +			
			'<p>Annee de publication: ' + params.PubD+ '<p>' +
			'<p>Acteurs: ' + params.Cast+ '<p>' +
			'<p>Categorie: ' + params.Cat+ '<p>' +
			'<p>Format: ' + params.Format+ '<p>' +
			'<p>Resume: ' + params.Plot+ '<p>' +
			'<p>Langue: ' + params.Lang+ '<p>' +
			'<p>Duree: ' + params.Dur+ '<p>' +
			'<p>Classification: ' + params.PControl+ '<p>'
	);
	if (params.url != "NC")
		square.append('<a href="'+ params.url+ '">Lien vers la video</a>');
	else
		square.append('<p style="color: red">Video Indisponible</p>');
	$container.append(square);
}

