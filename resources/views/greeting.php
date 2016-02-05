<!DOCTYPE HTML>
<html>
<body>
    <form name="{{ url('/addIngredient') }}" method = "POST">
        Ingredient Name:<input name = "rec_name" type = "text" id = "rec_name">
        Ingredient Measurement:<input type="text" name="myInputs[]">
        <br />
        <input name = "add" type = "submit" id = "add" value = "Add Ingredient">
    </form>
</body>
</html>
