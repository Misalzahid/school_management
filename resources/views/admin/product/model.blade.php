<div class="modal-content">
    <h1 class="border">Product Detail</h1>
    <div class="d-flex justify-content-center tbl">
    </div>
    <div class="p-5">
        <table class="table table-striped ">
            <tbody class="text-center">
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $data->name }}</td>
                        <td scope="col">{{ $data->category->title }} </td>
                    </tr>
                    <tr>
                        <th scope="col">Sub Category</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $data->subCategory->title }}</td>
                    </tr>

                @foreach ($data->varients as $varient)
                    <tr>
                        <th scope="col">Size</th>
                        <th scope="col">Quantity</th>
                    </tr>
                    <tr>
                    <td scope="col">{{ $varient->size }} </td>
                    <td scope="col">{{ $varient->quantity }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Price</th>
                        <th scope="col">Total Stock</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $varient->price }}</td>
                        <td scope="col">{{ $varient->total_stock }}</td>
                    </tr>
                @endforeach
            </tbody>
         </table>
    </div>
</div>
