API_URL = '../server/index.php';

$(document).ready(function() {
    $.ajax({
        url: API_URL,
        data: {
            action: "newUser"
        },
        type: 'GET',
        dataType: 'json',
        success: function(users) {
            var html = '';
            for (var i = 0; i < users.length; i++) {
                html += '<tr>';
                html += '<td>' + users[i].email + '</td>';
                html += '<td>' + users[i].firstName + '</td>';
                html += '<td>' + users[i].lastName + '</td>';
                html += '</tr>';
            }

            $('users-table').html(html);
        },
        error: function(xhr, textStatus, errorThrown) {
            alert('Error retrieving users: ' + errorThrown);
        }
    });
});