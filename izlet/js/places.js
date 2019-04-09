var defaultBounds = new google.maps.LatLngBounds(
new google.maps.LatLng(42.55139, 46.102792),
new google.maps.LatLng(42.55139, 46.102792));

var input = document.getElementById('pac-input');
var options = {
bounds: defaultBounds,
types: ['geocode']
};
var autocomplete = new google.maps.places.Autocomplete(input, options);


autocomplete.addListener('place_changed', function() {
var places = autocomplete.getPlaces();
if (places.length == 0){
  return;
}
})

var editInput = document.getElementById('location');
var editOptions = {
bounds: defaultBounds,
types: ['geocode']
};
var editAutocomplete = new google.maps.places.Autocomplete(editInput, editOptions);


editAutocomplete.addListener('place_changed', function() {
var editPlaces = editAutocomplete.getPlaces();
if (editPlaces.length == 0){
  return;
}
})
