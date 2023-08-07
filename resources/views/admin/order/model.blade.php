<div class="modal-content">
    <h1 class="border text-center">Order Details</h1>
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

                    {{-- user details --}}
                    <tr>
                        <th scope="col"><h4>User Details</h4></th>
                    </tr>
                    <tr>
                        <th scope="col">Cuntry</th>
                        <th scope="col">First Name</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $data->orderAddress->country }}</td>
                        <td scope="col">{{ $data->orderAddress->f_name }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Last name</th>
                        <th scope="col">Email</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $data->orderAddress->l_name }}</td>
                        <td scope="col">{{ $data->orderAddress->email }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Address</th>
                        <th scope="col">State</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $data->orderAddress->address }}</td>
                        <td scope="col">{{ $data->orderAddress->state }}</td>
                    </tr>
                    <tr>
                        <th scope="col">City</th>
                        <th scope="col">Postal Code</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $data->orderAddress->city }}</td>
                        <td scope="col">{{ $data->orderAddress->postal_code }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Phone Number</th>
                    </tr>
                    <tr>
                        <td scope="col">{{ $data->orderAddress->phone_no }}</td>
                    </tr>

                    {{-- product details --}}
                    <tr>
                        <th scope="col"><h4>Product Details</h4></th>
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
