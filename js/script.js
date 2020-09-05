
function getData() {
  $.ajax({
    url: 'data.php',
    method: 'GET',
    success: function(data) {
      var disks =data['response'];
      printDisks(disks);
    },
    error: function(err) {
      console.log(err);
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
}

$(document).ready(init);
