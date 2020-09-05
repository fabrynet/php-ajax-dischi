
function getData() {
  $.ajax({
    url: 'data.php',
    method: 'GET',
    success: function(data) {
      console.log(data['response']);
    },
    error: function(err) {
      console.log(err);
    }
  });
}

function init() {
  getData();
}

$(document).ready(init);
