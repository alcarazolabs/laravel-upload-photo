<html>

   <head>
       <title>Products - List</title>

       <style type="text/css">
       table, th, td {
            border: 1px solid black;
         }
    </style>
    </head>

<body>
    <h3>Products List</h3>
    <a href="{{ route('products.create') }}">New Product</a>
    <hr>
    <table style="width:50%">
         <thead>
             <th>Name</th>
             <th>Photo</th>
         </thead>

         <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td><a target="_blank" href="{{ asset('storage/'.optional($product)->photo) }}"> {{ $product->photo }} </a></td>
            </tr> 
            @endforeach
         </tbody>
    </table>
</body>

</html>