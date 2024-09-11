<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Load Nationalities</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <select id="nationalities"></select>

    <script>
        $(document).ready(function() {
            $.getJSON('assets/data/nationalities.json', function(data) {
                var $select = $('#nationalities');
                $.each(data, function(country, nationality) {
                    $select.append($('<option>', {
                        value: nationality,
                        text: nationality
                    }));
                });
            });
        });
    </script>
</body>
</html>