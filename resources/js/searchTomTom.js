// Mappa
var ITALIA = [12.49427, 41.89056]
var map = tt.map({
      key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
      container: "map",
      center: ITALIA,
      zoom: 5,
      language: "it-IT",
})



var options = {
      searchOptions: {
            key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
            language: "it-IT",
            limit: 1,
      },
      autocompleteOptions: {
            key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
            language: "it-IT",
      },
}

// SearchBox
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options)
var searchBoxHTML = ttSearchBox.getSearchBoxHTML()

var search_box = document.getElementById('search_cont')
search_box.appendChild(searchBoxHTML)

// ATACCARE SEARCH A MAP
// var searchMarkersManager = new SearchMarkersManager(map)
// ttSearchBox.on("tomtom.searchbox.resultsfound", handleResultsFound)
// ttSearchBox.on("tomtom.searchbox.resultselected", handleResultSelection)
// ttSearchBox.on("tomtom.searchbox.resultfocused", handleResultSelection)
// ttSearchBox.on("tomtom.searchbox.resultscleared", handleResultClearing)
// map.addControl(ttSearchBox, "top-left")




// EVENT HENDLER
// function handleResultsFound(event) {
//       var results = event.data.results.fuzzySearch.results

//       if (results.length === 0) {
//             searchMarkersManager.clear()
//       }
//       searchMarkersManager.draw(results)
//       fitToViewport(results)

//       // Lat


//       var lat
//       var address
//       results.forEach(element => {
//             lat = element.position.lat
//             address = element.address.freeformAddress
//             console.log(address)
//             console.log(element)

//             var addr = document.getElementById('address');
//             addr.value = address
//       });


//       console.log(address)
//       var latitudine = document.getElementById('lat');
//       latitudine.value = lat;

//       // Long
//       var long
//       results.forEach(element => {
//             long = element.position.lng
//       });

//       console.log(long)
//       var longitudine = document.getElementById('long');
//       longitudine.value = long;
// }



// function handleResultSelection(event) {
//       var result = event.data.result
//       if (result.type === "category" || result.type === "brand") {
//             return
//       }
//       searchMarkersManager.draw([result])
//       fitToViewport(result)
// }

// function fitToViewport(markerData) {
//       if (!markerData || (markerData instanceof Array && !markerData.length)) {
//             return
//       }
//       var bounds = new tt.LngLatBounds()
//       if (markerData instanceof Array) {
//             markerData.forEach(function (marker) {
//                   bounds.extend(getBounds(marker))
//             })
//       } else {
//             bounds.extend(getBounds(markerData))
//       }
//       map.fitBounds(bounds, {

//             linear: true
//       })
// }

// function getBounds(data) {
//       var btmRight
//       var topLeft
//       if (data.viewport) {
//             btmRight = [
//                   data.viewport.btmRightPoint.lng,
//                   data.viewport.btmRightPoint.lat,
//             ]
//             topLeft = [data.viewport.topLeftPoint.lng, data.viewport.topLeftPoint.lat]
//       }
//       return [btmRight, topLeft]
// }

// function handleResultClearing() {
//       searchMarkersManager.clear()
// }

// // Manipulation
// function SearchMarkersManager(map, options) {
//       this.map = map
//       this._options = options || {}
//       this._poiList = undefined
//       this.markers = {}
// }

// SearchMarkersManager.prototype.draw = function (poiList) {
//       this._poiList = poiList
//       this.clear()
//       this._poiList.forEach(function (poi) {
//             var markerId = poi.id
//             var poiOpts = {
//                   name: poi.poi ? poi.poi.name : undefined,
//                   address: poi.address ? poi.address.freeformAddress : "",
//                   distance: poi.dist,
//                   classification: poi.poi ? poi.poi.classifications[0].code : undefined,
//                   position: poi.position,
//                   entryPoints: poi.entryPoints,
//             }
//             var marker = new SearchMarker(poiOpts, this._options)
//             marker.addTo(this.map)
//             this.markers[markerId] = marker
//       }, this)
// }

// SearchMarkersManager.prototype.clear = function () {
//       for (var markerId in this.markers) {
//             var marker = this.markers[markerId]
//             marker.remove()
//       }
//       this.markers = {}
//       this._lastClickedMarker = null
// }

// // -------------
// function SearchMarker(poiData, options) {
//       this.poiData = poiData
//       this.options = options || {}
//       this.marker = new tt.Marker({
//             element: this.createMarker(),
//             anchor: "bottom",
//       })
//       var lon = this.poiData.position.lng || this.poiData.position.lon
//       this.marker.setLngLat([lon, this.poiData.position.lat])
// }

// SearchMarker.prototype.addTo = function (map) {
//       this.marker.addTo(map)
//       this._map = map
//       return this
// }

// SearchMarker.prototype.createMarker = function () {
//       var elem = document.createElement("div")
//       elem.className = "tt-icon-marker-black tt-search-marker"
//       if (this.options.markerClassName) {
//             elem.className += " " + this.options.markerClassName
//       }
//       var innerElem = document.createElement("div")
//       innerElem.setAttribute(
//             "style",
//             "background: white; width: 10px; height: 15px; border-radius: 50%; border: 3px solid black;"
//       )

//       elem.appendChild(innerElem)
//       return elem
// }

// SearchMarker.prototype.remove = function () {
//       this.marker.remove()
//       this._map = null
// }