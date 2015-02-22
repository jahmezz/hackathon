/*global $*/
'use strict';

$(function() {
  $('#error').hide();
  var request = $.ajax({
    type: 'GET',
    url: 'get-tags.php',
  });
  var tags = [];
  request.done(function (data, statusText, xhr) {
    var classes = JSON.parse(data);
    classes.forEach(function (course) {
      console.log(course);
      var id = course.courseid;
      tags.push({
        label: id,
        value: id
      });
      //fill in the list
    });
    return tags;
  });
  request.fail(function(data, status) {
      
  });
  $('#tags').on('keydown', function (e) {
    if(e.which === 13) {
      $('#classForm').submit();
    }
  });
  $('#tags').autocomplete({
    minLength: 0,
    source: tags,
    select: function( event, ui ) {
      $('#tags').val(ui.item.value);
      $('#classForm').submit();
      return false;
    }
  })
  .autocomplete('instance')._renderItem = function(ul, item) {
    return $('<li>').append(item.value).appendTo(ul);
  };
});