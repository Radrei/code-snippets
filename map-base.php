<!--A basic google map template. Written in PHP file to be used with WordPress-->
<script>
	function initMap() {
		var latitude = parseFloat("39.185969");
		var longitude = parseFloat("-119.7010497");		
		var uluru = {lat: latitude, lng: longitude}
		var map = new google.maps.Map(document.getElementById('map'), {
		  center: uluru,
		  zoom: 12,
		  scrollwheel: false,
		  styles: [
			  {
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#f5f5f5"
				  }
				]
			  },
			  {
				"elementType": "labels.icon",
				"stylers": [
				  {
					"visibility": "off"
				  }
				]
			  },
			  {
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#e46702"
				  }
				]
			  },
			  {
				"elementType": "labels.text.stroke",
				"stylers": [
				  {
					"color": "#f5f5f5"
				  }
				]
			  },
			  
			  {
				"featureType": "administrative.land_parcel",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#bdbdbd"
				  }
				]
			  },
			  
			  {
				"featureType": "poi",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#eeeeee"
				  }
				]
			  },
			 
			  {
				"featureType": "poi",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#757575"
				  }
				]
			  },			  
			  {
				"featureType": "poi.park",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#e5e5e5"
				  }
				]
			  },
			  {
				"featureType": "poi.park",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#9e9e9e"
				  }
				]
			  },
			  {
				"featureType": "road",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#ffffff"
				  }
				]
			  },
			  {
				"featureType": "road",
				"elementType": "labels",
				"stylers": [
				  {
					"visibility": "off"
				  }
				]
			  },
			  {
				"featureType": "road",
				"elementType": "labels.icon",
				"stylers": [
				  {
					"visibility": "off"
				  }
				]
			  },
			  {
				"featureType": "road.arterial",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#757575"
				  }
				]
			  },
			  {
				"featureType": "road.highway",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#dadada"
				  }
				]
			  },
			  {
				"featureType": "road.highway",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#616161"
				  }
				]
			  },
			  {
				"featureType": "road.local",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#9e9e9e"
				  }
				]
			  },
			  {
				"featureType": "transit",
				"stylers": [
				  {
					"visibility": "off"
				  }
				]
			  },
			  {
				"featureType": "transit.line",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#e5e5e5"
				  }
				]
			  },
			  {
				"featureType": "transit.station",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#eeeeee"
				  }
				]
			  },
			  {
				"featureType": "water",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#c9c9c9"
				  }
				]
			  },
			  {
				"featureType": "water",
				"elementType": "labels.text",
				"stylers": [
				  {
					"visibility": "off"
				  }
				]
			  },
			  {
				"featureType": "water",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#9e9e9e"
				  }
				]
			  }
			]
		})

		var contentString = 
			'<div class="map-info">'+
			'<h2>Owens Precision</h2>'+
			'5966 Morgan Mill Road <br>'+
			'Carson City, NV 89701'+
			'</div>';

		var infowindow = new google.maps.InfoWindow({
		  content: contentString
		});
		
		var iconBase = '<?php echo get_template_directory_uri(); ?>';
		var icons = {
		  office: {
			icon: iconBase + '/library/images/map-marker.png'
		  }
		};

		function addMarker(feature) {
		  var marker = new google.maps.Marker({
			position: feature.position,
			icon: icons[feature.type].icon,
			map: map
		  });
		  
		  /* Allow the info window to be reopened by clicking the marker */
		  marker.addListener('click', function() {
			  infowindow.open(map, marker);
		  });
		}

		var features = [
		  {
			position: new google.maps.LatLng(latitude, longitude),
			type: 'office'
		  }
		];
		for (var i = 0, feature; feature = features[i]; i++) {
		  addMarker(feature);
		}
	}
</script>
