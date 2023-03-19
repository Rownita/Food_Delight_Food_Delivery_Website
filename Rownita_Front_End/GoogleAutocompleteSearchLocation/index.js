
function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 23.7986, lng: 90.3507 },//Setting the position
    zoom: 15,
    });
    const card = document.getElementById("pac-card");
    const input = document.getElementById("pac-input");
    const biasInputElement = document.getElementById("use-location-bias");
    const strictBoundsInputElement = document.getElementById("use-strict-bounds");
    const options = {
    fields: ["formatted_address", "geometry", "name"],
    strictBounds: false,
    types: ["establishment"],
    };
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
    const autocomplete = new google.maps.places.Autocomplete(input, options);
    // Bind the map's bounds (viewport) property to the autocomplete object,
    // so that the autocomplete requests use the current map bounds for the
    // bounds option in the request.
    autocomplete.bindTo("bounds", map);
    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");
    infowindow.setContent(infowindowContent);
    const marker = new google.maps.Marker({
    map,
    anchorPoint: new google.maps.Point(0, -29),
    });
    autocomplete.addListener("place_changed", () => {
    infowindow.close();
    marker.setVisible(false);
    const place = autocomplete.getPlace();
    
    if (!place.geometry || !place.geometry.location) {
    // User entered the name of a Place that was not suggested and
    // pressed the Enter key, or the Place Details request failed.
    window.alert("No details available for input: '" + place.name + "'");
    return;
    }
    
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
    map.fitBounds(place.geometry.viewport);
    } else {
    map.setCenter(place.geometry.location);
    map.setZoom(17);
    }
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);
    infowindowContent.children["place-name"].textContent = place.name;
    infowindowContent.children["place-address"].textContent =
    place.formatted_address;
    infowindow.open(map, marker);
    });
    //Code for my feature
    //Getting the Latitude,longnitude,&Location by Place Object
    var item_Lat=place.geometry.Location.lat();
    var item_Lng=place.geometry.Location.lng();
    var item_Location=place.formatted_address;
    //alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"____Location="+item_Location);
    $("#lat").val(item_Lat);
    $("#lng").val(item_Lng);
    $("#location").val(item_Location);
    
    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    function setupClickListener(id, types) {
    const radioButton = document.getElementById(id);
    radioButton.addEventListener("click", () => {
    autocomplete.setTypes(types);
    input.value = "";
    });
    }
    setupClickListener("changetype-all", []);
    setupClickListener("changetype-address", ["address"]);
    setupClickListener("changetype-establishment", ["establishment"]);
    setupClickListener("changetype-geocode", ["geocode"]);
    biasInputElement.addEventListener("change", () => {
    if (biasInputElement.checked) {
    autocomplete.bindTo("bounds", map);
    } else {
    // User wants to turn off location bias, so three things need to happen:
    // 1. Unbind from map
    // 2. Reset the bounds to whole world
    // 3. Uncheck the strict bounds checkbox UI (which also disables strict bounds)
    autocomplete.unbind("bounds");
    autocomplete.setBounds({ east: 180, west: -180, north: 90, south: -90 });
    strictBoundsInputElement.checked = biasInputElement.checked;
    }
    input.value = "";
    });
    strictBoundsInputElement.addEventListener("change", () => {
    autocomplete.setOptions({
    strictBounds: strictBoundsInputElement.checked,
    });
    
    if (strictBoundsInputElement.checked) {
    biasInputElement.checked = strictBoundsInputElement.checked;
    autocomplete.bindTo("bounds", map);
    }
    input.value = "";
    });
    }