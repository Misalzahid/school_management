<div class="modal-content">
    <h1 class="border">Order</h1>
    <div class="d-flex justify-content-center tbl">
    </div>
    <div class="p-5">
        <table class="table table-striped ">
            <tbody class="text-center">
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Pament</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $data->code }}</td>
                        <td scope="col">{{ $data->payment }} </td>
                    </tr>
                    <tr>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Status</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $data->total_amount }}</td>
                        <td scope="col">{{ $data->status }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Order Date</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $data->created_at }}</td>
                    </tr>
                @foreach ($data->orderItem as $orderItem)
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Order Id</th>
                    </tr>
                    <tr>
                    <td scope="col">{{ $orderItem->name }} </td>
                    <td scope="col">{{ $orderItem->id }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Quantity</th>
                        <th scope="col">Sub Total</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $orderItem->quantity }}</td>
                        <td scope="col">{{ $orderItem->sub_total }}</td>
                    </tr>
                @endforeach
            </tbody>
         </table>
    </div>
</div>
