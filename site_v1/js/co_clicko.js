function dom()
{

    $('#all').append($('<input>').attr({'id':'backto', 'type':'button', 'class':'btn', 'value':'X'}).css('margin-left','2em').text('Retourner a la liste.').hide());
    
    $('#all').append($('<div>').attr('id', 'alldelet'));

    $('body').append($('<div>').attr('id', 'raptor_jesus').css("position", "absolute").css("top", "45%")
    	.css("left", "0%").css("height", "300").css("width", "0").css("background-size", "100%")
    	.css("background-image", "url('http://20px.com/wp-content/uploads/2013/02/unicorn_pooping_a_rainbow_20px.jpg')"));

    $('#alldelet').append($('<div>').attr('id', 'd1').css({'background':'rgba(145,145,145,0.4)', 'border':'5px solid #000000', 'box-shadow': '0px 2px 15px #f2f2f2', 'border-radius':'20px', 'margin-top':'2em', 'margin-bottom':'2em'}).text("article 1").css("height", "150").css("width", "100%"));

    $('#alldelet').append($('<div>').attr('id', 'd2').css({'background':'rgba(145,145,145,0.4)', 'border':'5px solid #000000', 'box-shadow': '0px 2px 15px #f2f2f2', 'border-radius':'20px', 'margin-top':'2em', 'margin-bottom':'2em'}).text("article 2").css("height", "150").css("width", "100%"));

    $('#alldelet').append($('<div>').attr('id', 'd3').css({'background':'rgba(145,145,145,0.4)', 'border':'5px solid #000000', 'box-shadow': '0px 2px 15px #f2f2f2', 'border-radius':'20px', 'margin-top':'2em', 'margin-bottom':'2em'}).text("article 3").css("height", "150").css("width", "100%"));

    $('#alldelet').append($('<div>').attr('id', 'd4').css({'background':'rgba(145,145,145,0.4)', 'border':'5px solid #000000', 'box-shadow': '0px 2px 15px #f2f2f2', 'border-radius':'20px', 'margin-top':'2em', 'margin-bottom':'2em'}).text("article 4").css("height", "150").css("width", "100%"));




    $( "#alldelet > div" ).click(function() {
		co_clicko(this);
	});
	
	$("#backto").click(function(){
		backtomenu();
	});

}

$( document ).ready(function(){
	dom();
});

function co_clicko(div_id)
{
	var flag = false;
	$("#alldelet > div").animate(
	{
		top: "0%",
		height:'0px',
		width:'0px',
	}, function(){
		
		if (!flag)
		{
		$("#alldelet > div").hide();
		
		//$("#alldelet").show()	
		$(div_id).show()
		flag = true;
			$(div_id).animate(
				{
					left:'16%',
					top: "37%",
					height:'30%',
					width:'80%'
				})
			$("#backto").show();
		}
	})
}

function backtomenu()
{
	var flagb = false;
  $("#alldelet > div").animate({
    left:'0%',
    height:'0%',
    width:'0%'
  },500, function(){
  	if (!flagb)
  	{
  		flagb = true;
      $("#alldelet").remove()
      console.log('#all')
       dom();
       $("#backto").hide();
    }
    });
}

function raptor()
{
	var flagraptor = false;
	if (!flagraptor)
	{
		flagraptor = true;
          	$('#raptor_jesus').css("width", "500")
            	$('#raptor_jesus').animate(
           	{
           		left: "100%"
           	},1500)
            
    	
    }
}

if ( window.addEventListener ) {
        var kkeys = [], wazaaa = "38,38,40,40,37,39,37,39,66,65";
        window.addEventListener("keydown", function(e){
                kkeys.push( e.keyCode );
        		
        		{
        			
                if ( kkeys.toString().indexOf( wazaaa ) >= 0 )
                 {
                 	raptor();
                 }
                }       
        }, true);
}