
// Axios Per ricerca
$(document).ready(function () {
      $('#search_text').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                  $.ajax({
                        url: "api/search?search_text=" + query,
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                              console.log(data)

                              var output = '';

                              $.each(data, function (key, value) {
                                    output += '<a href="/' + value.id + '" >' +
                                          '<div class="card ms-3 mb-3" style="width: 18rem; height: 18rem;">' +
                                          '<img src="http://localhost:8000/uploads/cover_image/' + value.cover_image + '" class="card-img-top h-50" alt="cover image">' +
                                          '<div class="card-body">' +
                                          '<h5 class="card-title">' + value.name + '</h5>' +
                                          '<p class="card-text">' + value.description + '</p>' +
                                          '<div class="d-flex justify-content-between">' +
                                          '<div class="fw-bold">' + value.price + '$ a notte</div>' +
                                          '<div class="text-muted">' + value.address + '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</a>';
                              });

                              $('#search_results').html(output);
                        }
                  });
            } else {
                  $('#search_results').html('');

            }
      });

      $.ajax({
            url: "api/search",
            method: "GET",
            dataType: "json",
            success: function (data) {
                  console.log(data);

                  var output = '';
                  $.each(data, function (key, value) {
                        output += '<a href="/' + value.id + '" >' +
                              '<div class="card ms-3 mb-3" style="width: 18rem; height: 18rem;">' +
                              '<img src="http://localhost:8000/uploads/cover_image/' + value.cover_image + '" class="card-img-top h-50" alt="cover image">' +
                              '<div class="card-body">' +
                              '<h5 class="card-title">' + value.name + '</h5>' +
                              '<p class="card-text">' + value.description + '</p>' +
                              '<div class="d-flex justify-content-between">' +
                              '<div class="fw-bold">' + value.price + '$ a notte</div>' +
                              '<div class="text-muted">' + value.address + '</div>' +
                              '</div>' +
                              '</div>' +
                              '</div>' +
                              '</a>';
                  });
                  $('#search_results').html(output);
            }
      });



});


// Axios Ricerca Avanzata SERVICE
$(document).ready(function () {

      $('input[type=checkbox]').change(function () {
            var checkedValues = $('input[type=checkbox]:checked').map(function () {
                  return this.value;
            }).get();
            if (checkedValues.length > 0) {
                  $.ajax({
                        url: "api/search/services",
                        method: "GET",
                        data: { services: checkedValues },
                        dataType: "json",
                        success: function (data) {
                              console.log(data);
                              var output = '';
                              $.each(data, function (key, value) {
                                    output += '<a href="/' + value.id + '" >' +
                                          '<div class="card ms-3 mb-3" style="width: 18rem; height: 18rem;">' +
                                          '<img src="http://localhost:8000/uploads/cover_image/' + value.cover_image + '" class="card-img-top h-50" alt="cover image">' +
                                          '<div class="card-body">' +
                                          '<h5 class="card-title">' + value.name + '</h5>' +
                                          '<p class="card-text">' + value.description + '</p>' +
                                          '<div class="d-flex justify-content-between">' +
                                          '<div class="fw-bold">' + value.price + '$ a notte</div>' +
                                          '<div class="text-muted">' + value.address + '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</a>';
                              });
                              $('#search_results').html(output);
                        }
                  });
            } else {
                  $.ajax({
                        url: "api/search",
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                              console.log(data);

                              var output = '';
                              $.each(data, function (key, value) {
                                    output += '<a href="/' + value.id + '" >' +
                                          '<div class="card ms-3 mb-3" style="width: 18rem; height: 18rem;">' +
                                          '<img src="http://localhost:8000/uploads/cover_image/' + value.cover_image + '" class="card-img-top h-50" alt="cover image">' +
                                          '<div class="card-body">' +
                                          '<h5 class="card-title">' + value.name + '</h5>' +
                                          '<p class="card-text">' + value.description + '</p>' +
                                          '<div class="d-flex justify-content-between">' +
                                          '<div class="fw-bold">' + value.price + '$ a notte</div>' +
                                          '<div class="text-muted">' + value.address + '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</a>';
                              });
                              $('#search_results').html(output);
                        }
                  });
            }
      });


});


// ROOMS
$(document).ready(function () {
      $('#min-rooms').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                  $.ajax({
                        url: "api/search/rooms?rooms=" + query,
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                              console.log(data);

                              var output = '';
                              $.each(data, function (key, value) {
                                    output += '<a href="/' + value.id + '" >' +
                                          '<div class="card ms-3 mb-3" style="width: 18rem; height: 18rem;">' +
                                          '<img src="http://localhost:8000/uploads/cover_image/' + value.cover_image + '" class="card-img-top h-50" alt="cover image">' +
                                          '<div class="card-body">' +
                                          '<h5 class="card-title">' + value.name + '</h5>' +
                                          '<p class="card-text">' + value.description + '</p>' +
                                          '<div class="d-flex justify-content-between">' +
                                          '<div class="fw-bold">' + value.price + '$ a notte</div>' +
                                          '<div class="text-muted">' + value.address + '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</a>';
                              });

                              $('#search_results').html(output);
                        }
                  });
            } else {
                  $.ajax({
                        url: "api/search",
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                              console.log(data);

                              var output = '';
                              $.each(data, function (key, value) {
                                    output += '<a href="/' + value.id + '" >' +
                                          '<div class="card ms-3 mb-3" style="width: 18rem; height: 18rem;">' +
                                          '<img src="http://localhost:8000/uploads/cover_image/' + value.cover_image + '" class="card-img-top h-50" alt="cover image">' +
                                          '<div class="card-body">' +
                                          '<h5 class="card-title">' + value.name + '</h5>' +
                                          '<p class="card-text">' + value.description + '</p>' +
                                          '<div class="d-flex justify-content-between">' +
                                          '<div class="fw-bold">' + value.price + '$ a notte</div>' +
                                          '<div class="text-muted">' + value.address + '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</a>';
                              });
                              $('#search_results').html(output);
                        }
                  });
            }
      });
});


// BEds
$(document).ready(function () {
      $('#min-beds').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                  $.ajax({
                        url: "api/search/beds?beds=" + query,
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                              console.log(data);

                              var output = '';
                              $.each(data, function (key, value) {
                                    output += '<a href="/' + value.id + '" >' +
                                          '<div class="card ms-3 mb-3" style="width: 18rem; height: 18rem;">' +
                                          '<img src="http://localhost:8000/uploads/cover_image/' + value.cover_image + '" class="card-img-top h-50" alt="cover image">' +
                                          '<div class="card-body">' +
                                          '<h5 class="card-title">' + value.name + '</h5>' +
                                          '<p class="card-text">' + value.description + '</p>' +
                                          '<div class="d-flex justify-content-between">' +
                                          '<div class="fw-bold">' + value.price + '$ a notte</div>' +
                                          '<div class="text-muted">' + value.address + '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</a>';
                              });

                              $('#search_results').html(output);
                        }
                  });
            } else {
                  $.ajax({
                        url: "api/search",
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                              console.log(data);

                              var output = '';
                              $.each(data, function (key, value) {
                                    output += '<a href="/' + value.id + '" >' +
                                          '<div class="card ms-3 mb-3" style="width: 18rem; height: 18rem;">' +
                                          '<img src="http://localhost:8000/uploads/cover_image/' + value.cover_image + '" class="card-img-top h-50" alt="cover image">' +
                                          '<div class="card-body">' +
                                          '<h5 class="card-title">' + value.name + '</h5>' +
                                          '<p class="card-text">' + value.description + '</p>' +
                                          '<div class="d-flex justify-content-between">' +
                                          '<div class="fw-bold">' + value.price + '$ a notte</div>' +
                                          '<div class="text-muted">' + value.address + '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</a>';
                              });
                              $('#search_results').html(output);
                        }
                  });
            }
      });
});


// bath
$(document).ready(function () {
      $('#min_bathrooms').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                  $.ajax({
                        url: "api/search/bath?rooms=" + query,
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                              console.log(data);

                              var output = '';
                              $.each(data, function (key, value) {
                                    output += '<a href="/' + value.id + '" >' +
                                          '<div class="card ms-3 mb-3" style="width: 18rem; height: 18rem;">' +
                                          '<img src="http://localhost:8000/uploads/cover_image/' + value.cover_image + '" class="card-img-top h-50" alt="cover image">' +
                                          '<div class="card-body">' +
                                          '<h5 class="card-title">' + value.name + '</h5>' +
                                          '<p class="card-text">' + value.description + '</p>' +
                                          '<div class="d-flex justify-content-between">' +
                                          '<div class="fw-bold">' + value.price + '$ a notte</div>' +
                                          '<div class="text-muted">' + value.address + '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</a>';
                              });

                              $('#search_results').html(output);
                        }
                  });
            } else {
                  $.ajax({
                        url: "api/search",
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                              console.log(data);

                              var output = '';
                              $.each(data, function (key, value) {
                                    output += '<a href="/' + value.id + '" >' +
                                          '<div class="card ms-3 mb-3" style="width: 18rem; height: 18rem;">' +
                                          '<img src="http://localhost:8000/uploads/cover_image/' + value.cover_image + '" class="card-img-top h-50" alt="cover image">' +
                                          '<div class="card-body">' +
                                          '<h5 class="card-title">' + value.name + '</h5>' +
                                          '<p class="card-text">' + value.description + '</p>' +
                                          '<div class="d-flex justify-content-between">' +
                                          '<div class="fw-bold">' + value.price + '$ a notte</div>' +
                                          '<div class="text-muted">' + value.address + '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</div>' +
                                          '</a>';
                              });
                              $('#search_results').html(output);
                        }
                  });
            }
      });
});






