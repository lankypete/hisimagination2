<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content=" music from dean :) ">
    <meta name="author" content=" hisimagination ">

    <title><?php echo $title; ?></title>

    <link href="css/mystyles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js">   </script>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js">   </script>
    <script type="text/javascript" src="js/addFan.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/png" href="img/green16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="img/green32.png" sizes="32x32">
</head>

<body>
<div id="doublewidth">
	<div id="leftside" class="colourone">
		<div id="content">
			<!--THE MAIN CONTENT OF THE PAGE PEOPLE-->
			<!--LIST MUSIC HERE-->
			<div class="music">
				<h1 class="albumtitle">Argent légal by Rednext Level</h1>
				<img class="albumart" src="images/art1.jpg">
				<iframe style="border: 0; width: 100%; height: 472px;" src="http://bandcamp.com/EmbeddedPlayer/album=3881061328/size=large/bgcol=ffffff/linkcol=0687f5/artwork=none/transparent=true/" seamless><a href="http://rednextlevel.bandcamp.com/album/argent-l-gal">Argent légal by Rednext Level</a></iframe>
			</div>
			<!--LIST FEED HERE-->
			<div class="feed">
				<div id="startinghisimagination">
					5:17am<br>
					July 1st 2016<br>
					Starting hisimagination<br>
					<br>
					im coming down, i was on mdma<br>
					we should have a very honest relationship<br>
					otherwise I will just start this off here and you will never see the code I
					just wrote.<br>
					I'm 24 and I live in Montreal, Canada. I'm just starting to release music as
					hisimagination.  I have a dream to one day play my music on really loud sound
					systems.  Control the vibe of a crowd and have a party great people in front of me.
					I think music I the greatest gift.  I grown to like nearly all of it.  But something about
					a crazy bassy soundsystem and weird basslines that just seem grooby somehow.
				</div>
			</div>
		</div>
	</div>

	<div id="rightside" class="colourone">
		<div id="fanlist">
			<?php
				//list the fans from the database
				if ($fans->num_rows > 0){
					while ($value = $fans->fetch_assoc()){
						echo "<p>" . $value["name"] . "</p> <br>";
					}
				}
				else{
					echo "0 results";
				}
			?>
		</div>
	</div>
	</div>
	<div class="hisimagination"><img style="height: 100px; margin-left: 10px" src="images/montreallogo.png">
	</div>
	<ul id="nav">
		<li><a id="musiclink" href="#leftside">&nbsp;Music</a></li>
		<li><a id="feedlink" href="#leftside">&nbsp;Feed</a></li>
		<li><a id="fanpagelink" href="#rightside">&nbsp;Fanpage</a></li>
		<li><a id="colorButton" href="#">&nbsp;Colours</li>
	</ul>
	<!--FANNAV FANNAV FANNAV-->
	<div id="fannav">
		<h2 id="joinjoin">Room for one more (Join)</h2>

	</div>
</body>
</html>
<!--SCRIPTS SCRIPTS SCRIPTS-->
<script>
	$(document).ready(function()
		{ $("#nav a").bind("click",function(event)
			{
			event.preventDefault();
			var target = $(this).attr("href");
			$("html, body").stop().animate({ scrollLeft: $(target).offset().left, scrollTop: $(target).offset().top }, 400);
			});
		});
</script>
<script>
    //light colours only
	var colorsArray = [
	"#EEFFCC",
	"#D5FFCC",
	"#CCF6FF",
	"#CCD5FF",
	"#DDCCFF",
	"#FFCCD5",
	"#FFF7CC",
	"#FFEE99",
	"#FFCC99",
	"#FFFF99"
	];


	$("#colorButton").click(function(){
		// Random Color Picker
		var backGroundColor = colorsArray[Math.floor(Math.random() * colorsArray.length)];
		$(".colourone").css("background-color", backGroundColor);
		$(".hisimagination").css("background", "transparent");

	});
</script>

<script>
	// to switch between feed and music
	//initially the music link will be bold
	var status = "music";
	var boldType = {
      color : "black",
      fontWeight: "bold"
    };
    var notBold = {
      color : "#787096",
      fontWeight: ""
    };
	$('#musiclink').css( boldType );
	var possibleStatus = ["music", "feed", "fanpage"];
	//if the music link is clicked
	$('#musiclink').click(function(){
		status = possibleStatus[0];
		$("#musiclink, #feedlink, #fanpagelink").css( notBold );
		$("#" + status + "link").css( boldType );
		$(".music, .feed").hide();
		$("." + status).fadeIn("slow");
	});
	//if the feed link is clicked
	$('#feedlink').click(function(){
		status = possibleStatus[1];
		$("#musiclink, #feedlink, #fanpagelink").css( notBold );
		$("#" + status + "link").css(boldType);
		$(".music, .feed").hide();
		$("." + status).fadeIn("slow");
	});
	//if the fanpage link is clicked
	$('#fanpagelink').click(function(){console.log('here');
		status = possibleStatus[2];
		$("#musiclink, #feedlink, #fanpagelink").css( notBold );
		$("#" + status + "link").css( boldType);
	});

</script>

<script>
//check the form before allowing submit

function newForm(){

	$('#joinjoin').hide();
	$('#fannav').append('<form id="newFanForm" target="_blank" action="http://localhost:8888/sourcefiles/addfan.php" method="post">\
			<p>Name:</p>\
			<input type="text" name="name" value="">\
			<p>Email:</p>\
			<input type="text" name="email" value="">\
			<br/>\
			<input id="formSubmit" type="submit" name="submit" value="join"></form>');
	$('#formSubmit').hide();
	$('#fannav').append('<button id="checkButton" type="button" onclick="formCheck()">Check ..</button>');

	//prevent enter button submit
	$('#newFanForm').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
    e.preventDefault();
    return false;
    }
    });
}

function formCheck(){
	var numErrors = 0;
	var errorsArray;
	$('#newFanForm').validate({
		rules:{
			name:{
				required : true,
				maxlength : 33
				},
			email:{
				required: true,
				email: true
			}
		},
		messages:{
			name: "Enter a name less than 33 char",
			email: "Enter a valid email address"
		}
	});


	if ($('#newFanForm').valid()){console.log('here')
		$('#checkButton').hide();
		$('#formSubmit').show();
	}
}

$("#joinjoin").click(function(e){
	newForm();
});

</script>



















