// Map
var latString = document.getElementById('lat')
var longString = document.getElementById('long')

var latNum = +latString.value
var longNum = +longString.value
console.log(latNum)
console.log(longNum)
var POS = [longNum,latNum]


var map = tt.map({
      key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
      container: "map",
      center: POS,
      zoom: 3,
})

map.on('load', () => {
      new tt.Marker().setLngLat(POS).addTo(map)
})