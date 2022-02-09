<!DOCTYPE html>
@extends('layouts.app')
@section('link_css')
<style>
.jconfirm-box.jconfirm-hilight-shake.jconfirm-type-default.jconfirm-type-animated {
    width: 150%;
}
div.jc-bs3-container.container{
	padding-right: 45px !important;
	padding-left: 0px !important;
}
@media (hover:none) {
    /* No hover support */
}

div.jconfirm-content-pane.no-scroll
{
	 height: 35px !important;
}
.jconfirm .jconfirm-box div.jconfirm-title-c {
    font-size: 17px !important;
 }
 .click-polygon
 {
	background-color: #00aeef;
    border-color: #00aeef;
    color: #ffffff;
 }
</style>
@endsection


@section('scripts')

<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Aipg-wNL6BOU70PIhj7IY1iosSWzMBKnnpDqw9P8uPnbTkSetwTKg4KdFkQdj3ej' async defer></script>
<link rel="stylesheet" href="{{asset('css/jquery-confirm.min.css')}}">
<script src="{{asset('js/jquery-confirm.min.js')}}"></script>
<script type="text/javascript">
			
      var map, isDrawing, polygon, lastMousePoint, eventIds = [];
      function GetMap()
      {
		map = new Microsoft.Maps.Map('#myMap', {});
		//  var polygon = Microsoft.Maps.TestDataGenerator.getPolygons(1, map.getBounds());
          var center = map.getCenter();
        //Create array of locations to form a ring.
		/* 
		var arrLatLong = [{latitude:"28.69742562706177", longitude:"77.28520202636714"},{latitude:"28.69742562706177", longitude:"77.28726196289058"},{latitude:"28.69742562706177", longitude:"77.29275512695308"},{latitude:"28.696221013553405", longitude:"77.30236816406246"},{latitude:"28.696221013553405", longitude:"77.31404113769527"},{latitude:"28.69561870160026", longitude:"77.31953430175777"},{latitude:"28.692607089847144", longitude:"77.32159423828121"},{latitude:"28.689595391452478", longitude:"77.31884765624996"},{latitude:"28.68477649382112", longitude:"77.3154144287109"},{latitude:"28.67634288936202", longitude:"77.30580139160152"},{latitude:"28.69742562706177", longitude:"77.28520202636714"}];
		//console.log(arrLatLong);
		
		var locations = [];
		for (i = 0; i < arrLatLong.length; i++) { 
			var latitude = arrLatLong[i]['latitude'];
			var longitude = arrLatLong[i]['longitude'];
			locations[i] = new Microsoft.Maps.Location(latitude, longitude);
		}
		//console.log(locations);
        // var exteriorRing = [
            // new Microsoft.Maps.Location(28.69742562706177, 77.28520202636714),
            // new Microsoft.Maps.Location(28.69742562706177, 77.28726196289058),
            // new Microsoft.Maps.Location(28.69742562706177, 77.29275512695308),
            // new Microsoft.Maps.Location(28.696221013553405, 77.30236816406246),
            // new Microsoft.Maps.Location(28.696221013553405, 77.31404113769527),
            // new Microsoft.Maps.Location(28.69561870160026, 77.31953430175777),
            // new Microsoft.Maps.Location(28.692607089847144, 77.32159423828121),
            // new Microsoft.Maps.Location(28.689595391452478, 77.31884765624996),
            // new Microsoft.Maps.Location(28.68477649382112, 77.3154144287109),
            // new Microsoft.Maps.Location(28.67634288936202, 77.30580139160152),
            // new Microsoft.Maps.Location(28.69742562706177, 77.28520202636714)
        // ];
		
		
		 var exteriorRing = locations;
		
		
		//console.log(exteriorRing);
        //Create a polygon
        var polygon = new Microsoft.Maps.Polygon(exteriorRing, {
            fillColor: 'rgba(0, 255, 0, 0.5)',
            strokeColor: 'red',
            strokeThickness: 2
        }); */
		//map.entities.push(polygon);
		
		
        infobox = new Microsoft.Maps.Infobox(map.getCenter(), {
			title: 'Title',
			description: 'Description',
			visible: false
		});
		//Assign the infobox to a map instance.
		infobox.setMap(map);
		//Create a sample polygon.
		var shape = Microsoft.Maps.TestDataGenerator.getPolygons(1, map.getBounds());
		//Add an click event handler to the polygon.
		Microsoft.Maps.Events.addHandler(shape, 'click', polygonClicked);
		//Add the polygon to the map.
		map.entities.push(shape);
		
      }
		function polygonClicked(e) {
			infobox.setOptions({
				//Use the location of where the mouse was clicked to position the infobox.
				location: e.location,
				visible: true
			});
		}
		function changeCursor3(e) { 
            map.getRootElement().style.cursor = 'crosshair';
        }
		function changeCursor1(e) { 
            map.getRootElement().style.cursor = 'pencil';
        }
		function changeCursor2(e) { 
            map.getRootElement().style.cursor = 'pointer';
        }
		function revertCursor(e) { 
			map.getRootElement().style.cursor = 'url("http://teachers.musikalessons.com/img/pencil_new.png"), move';
		}
	  function DrawPolygon(){
		//Clear existing shapes
		//map.entities.clear();

		//Add mouse down event to start drawing.
		Microsoft.Maps.Events.addHandler(map, 'mouseover', revertCursor);	
		if(eventIds=='')
		{
			$("#drawPolygon").addClass("click-polygon");
			eventIds.push(Microsoft.Maps.Events.addHandler(map, 'mousedown', startDrawing));
		}
		console.log(eventIds); 
	  }
	  function startDrawing(e)
	  {
		polygon = new Microsoft.Maps.Polygon([e.location, e.location], { fillColor: 'rgba(0,0,0,0)',strokeColor: '#00aeef',strokeThickness: 2 });
		map.entities.push(polygon);
		map.setOptions({ disablePanning: true, disableZooming: true });
		//Add mouse events for the rest of the mouse events.
		eventIds.push(Microsoft.Maps.Events.addHandler(map, 'mouseup', stopDrawing));
		eventIds.push(Microsoft.Maps.Events.addHandler(map, 'mousemove', mouseMoved));
   	  }
	  function mouseMoved(e)
	  {
		//If we simply add a coordinate for each mouse move we could end up with too much data.
		//We can add a check to make sure the mouse has moved a couple of pixels before capturing a new coordinate.
		if (lastMousePoint)
		{
			var dx = lastMousePoint.x - e.point.x;
			var dy = lastMousePoint.y - e.point.y;
			var d = Math.sqrt(dx * dx + dy * dy);
			//I'm checking that the mouse has moved at least 5 pixels.
			//If it hasn't then I ignore the event. This significantly reduces the size of the generated polygon.
			if(d <= 5)
			{
				return;
			}
		}
		var locs = polygon.getLocations();
		//Replace last coordinate of polygon as polygon automatically close the ring.
		locs[locs.length-1] = e.location;
		polygon.setLocations(locs);
		lastMousePoint = e.point;
	  }
	  function stopDrawing(e)
	  {
		  Microsoft.Maps.Events.addHandler(map, 'mouseout', revertCursor);	
		//Remove mouse events.
		for(var i=0;i<eventIds.length;i++){
			Microsoft.Maps.Events.removeHandler(eventIds[i]);
		}
		eventIds = [];
		//re-enable panning and zooming.
		map.setOptions({ disablePanning: false, disableZooming: false });
		//Close the polygon
		var locs = polygon.getLocations();
		console.log(locs[0]['latitude']);
		var arr = [];
		for (i = 0; i < locs.length; i++) { 
			var latitude = locs[i]['latitude'];
			var longitude = locs[i]['longitude'];
			arr.push({"latitude" : latitude,"longitude" : longitude,});
			//arr.push(locs[i]['latitude']);
		  //console.log(arr[i])
		}
		//console.log(arr);
		$.confirm({
			title: 'What day of the week are you in this area?',
			content: '' +
			'<form action="" class="formName">' +
			'<div id="territory-availability1" style="display:block;height:60px" class="polygonblock">' +
			'<div style="float:left;margin-top:3px">' +
			'<input id="day11" class="weekday1" name="day1[]" value="1"  type="checkbox"> Sunday <input id="day12" class="weekday1" name="day1[]" value="2" type="checkbox"> Monday <input id="day13" name="day1[]" value="3" type="checkbox"> Tuesday <input id="day14" name="day1[]" value="4" type="checkbox"> Wednesday <input id="day15" name="day1[]" value="5"  type="checkbox"> Thursday <input id="day16" name="day1[]" value="6"  type="checkbox"> Friday <input id="day17" name="day1[]" value="7" type="checkbox"> Saturday' +
			'</div>' +
			'</div>' +
			'</form>',
			buttons: {
				formSubmit: {
					text: 'Submit',
					btnClass: 'btn-blue',
					action: function () {
						var final1 = [];
						$('.weekday1:checked').each(function(){        
							var values = $(this).val();
							//final1 += values;
							 final1.push(values);
						});
						if(final1=='')
						{
							$.alert({ title: 'Alert!', content: 'Please select at least one checkbox!',});
							return false;
						}
						
						var csrf_token = $("input[name=_token]").val();
						$.ajax({
							url: "<?php echo url('/TeritoryLocations') ?>",
							data: {
								type: 'new',
								mapLocations:arr,
								weekdays:final1,
								_token: csrf_token
							},
							type: 'POST',
							dataType: 'json',
							success: function(response){
								//console.log(response);
								
							},
							error: function(e){
								console.log(e.responseText);
							}
						}); 
					}
				},
				cancel: function () {
					
					 map.entities.remove(polygon);
				},
			}
		});	
		locs.push(locs[0]);
		polygon.setLocations(locs);
		$("#drawPolygon").removeClass("click-polygon"); 
		//Do something with the polygon locations (locs)
	  }
	/*  var arr = [
			"Hi",
			"Hello",
			"Bonjour"
		];

	// append new value to the array
	arr.push("Hola"); */

    </script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-8">
      <h2>Map Test</h2>
   </div>
   <div class="col-sm-4">
     
   </div>
</div>
<div class="wrapper wrapper-content calendar-margin">
    <div class="row animated fadeInDown">
        
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content mobile-padding">
                    <div style="position:relative; width:800px; height:600px;">
						<div id='myMap' style="position:relative; width:800px; height:600px;"></div>
						<input class="" type="button" id="drawPolygon" value="Draw Polygon" onclick="DrawPolygon()" style="position:absolute;left:10px;top:10px; border-radius: 5px;padding: 4px 12px;" />
					</div>

            </div>
        </div> 
		<div class="col-lg-12">
			<div id="territory-availability1" style="display:block;height:60px" class="polygonblock">
				<div>What day of the week are you in this area?</div>
				<div style="float:left;margin-top:3px">
					<input id="day11" name="day1[]" value="1" checked="" type="checkbox"> Sunday
					<input id="day12" name="day1[]" value="2" type="checkbox"> Monday
					<input id="day13" name="day1[]" value="3" type="checkbox"> Tuesday
					<input id="day14" name="day1[]" value="4" type="checkbox"> Wednesday
					<input id="day15" name="day1[]" value="5" checked="" type="checkbox"> Thursday
					<input id="day16" name="day1[]" value="6" checked="" type="checkbox"> Friday
					<input id="day17" name="day1[]" value="7" type="checkbox"> Saturday
				</div>
			</div>
		</div>
    </div>
</div>


@endsection
