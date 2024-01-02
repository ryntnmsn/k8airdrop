<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <title>Document</title>
</head>
<body>

    <select id="js-example-basic-multiple" name="states[]" style="padding:10px; width:100%; font-size:20px">
        <option value="AL">Alabama</option>
        <option value="WY">Wyoming</option>
      </select>

</body>
</html>


<script>
    $(document).ready(function() {
        $('#js-example-basic-multiple').select2({
            multiple:true
        });
    });
</script>