
function addListeners() {

  $('#select-author').change(function() {
    var author = $('#select-author').val();
    var genre = $('#select-genre').val();
    filterDisks(author, genre);
  });
  // $('#select-genre').change(function() {
  //   var author = $('#select-author').val();
  //   var genre = $('#select-genre').val();
  //   filterDisks(author, genre);
  // });
}

function printSelectAuthor () {

  var authors = [];

  var target = $('#select-author');
  var template = $('#author-template').html();
  var compiled = Handlebars.compile(template);

  $.ajax({
    url: `server.php`,
    method: 'GET',
    success: function(data) {
      var authorsData = sortByKeyAsc(data['response'],'author');
      var key = "author";
      for (key in authorsData) {
        var name = authorsData[key]['author'];
        if (!authors.includes(name)) {
          authors.push(name);
          var obj = {
            author: name
          }
          var authorHTML = compiled(obj);
          target.append(authorHTML);
        }
      }
    },
    error: function(err) {
      console.log('err',err);
    }
  });
}

function printSelectGenre () {

  var genres = [];

  var target = $('#select-genre');
  var template = $('#genre-template').html();
  var compiled = Handlebars.compile(template);

  $.ajax({
    url: `server.php`,
    method: 'GET',
    success: function(data) {
      var genresData = sortByKeyAsc(data['response'],'genre');
      var key = "genre";
      for (key in genresData) {
        var name = genresData[key]['genre'];
        if (!genres.includes(name)) {
          genres.push(name);
          var obj = {
            genre: name
          }
          var genreHTML = compiled(obj);
          target.append(genreHTML);
        }
      }
    },
    error: function(err) {
      console.log('err',err);
    }
  });
}


function filterDisks(author, genre) {
  $.ajax({
    url: `server.php`,
    method: 'GET',
    data: {
      author: author
    },
    success: function(data) {
      console.log('data filtered',data);
      $('.disks-container').html('');
      var disks = data;
      console.log('disks filtered', disks);
      printDisks(disks);
    },
    error: function(err) {
      console.log('err',err);
    }
  });
}

function getData() {
  $.ajax({
    url: 'server.php',
    method: 'GET',
    success: function(data) {
      var disks =data['response'];
      printDisks(disks);
    },
    error: function(err) {
      console.log('err',err);
    }
  });
}

function printDisks(disks) {

  var templateDisk = $('#disk-template').html();
  var compiledDisk = Handlebars.compile(templateDisk);
  var targetDisk = $('.disks-container');

  for (var i = 0; i < disks.length; i++) {
    var disk = disks[i];
    var templateHTMLDisk = compiledDisk(disk);
    targetDisk.append(templateHTMLDisk);
  }

}

function init() {
  getData();
  addListeners();
  printSelectAuthor();
  printSelectGenre();
}

$(document).ready(init);

// Utility Functions
function sortByKeyDesc(array, key) {
    return array.sort(function(a, b) {
        var x = a[key];
        var y = b[key];
        return ((x < y) ? 1 : ((x > y) ? -1 : 0));
    });
}

function sortByKeyAsc(array, key) {
    return array.sort(function(a, b) {
        var x = a[key];
        var y = b[key];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    });
}
