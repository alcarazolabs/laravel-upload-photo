<html>
    <head>
        <title>Create a new Product</title>
    </head>

    <form method="post"   enctype="multipart/form-data" action="{{ route('products.store') }}">
    <strong>Name:</strong>
    <input type="text" placeholder="name of product" name="name">
    <strong>Select a photo:</strong><br>
    <input type="file" style="color:red" name="photo">
    <br>
    <input type="submit" value="Save">
     
    </form>
</html>