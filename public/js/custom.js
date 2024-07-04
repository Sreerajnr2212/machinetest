$(document).ready(function () {
    $('#search').on('keyup', function () {
        var searchText = $('#search').val().toLowerCase();
        $.ajax({
            url: searchUrl,
            type: 'GET',
            data: { search: searchText },
            success: function (data) {
                displaySearchResults(data);
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
    function displaySearchResults(users) {
        var container = $('.job-container');
        container.empty();
        users.forEach(function (user) {
            var html = '<div class="job-card">' +
                '<h2>' + user.name + '</h2>' +
                '<h4>' + user.designation.name + '</h4>' +
                '<div>' + user.department.name + '</div>' +
                '</div>';
            container.append(html);
        });
    }
});
