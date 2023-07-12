@extends('admin.layout.app')
@section('title', 'index')
@section('content')
    <div class="main-content" style="min-height: 562px;">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4>Product</h4>
                                </div>
                            </div>
                            <div class="card-body table-striped table-bordered table-responsive">
                                <a class="btn btn-success mb-3" href="{{ route('product.create') }}">Add Product</a>
                                <table class="table text-center" id="table_id_events">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            {{-- <th>size</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Quantity</th> --}}
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>
                                                    <img src="{{ asset($product->image) }}" alt="" height="70"
                                                        width="70" class="image">
                                                </td>
                                                <td>{{ $product->category->title }}</td>
                                                <td>{{ $product->subCategory->title }}</td>
                                                {{-- @foreach ($product->varients as $varient )
                                                <td>{{ $varient->size }}</td>
                                                <td>{{ $varient->price }}</td>
                                                <td>{{ $varient->total_stock }}</td>
                                                <td>{{ $varient->quantity }}</td>
                                                @endforeach --}}
                                                <td
                                                    style="display: flex;align-items: center;justify-content: center;column-gap: 8px">

                                                    <button type="button" class="btn btn-primary product-data"
                                                        id="{{ $product->id }}" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg">view</button>

                                                    <a class="btn btn-info"
                                                        href="{{ route('product.edit', $product->id) }}">Edit</a>
                                                    <form method="post"
                                                        action="{{ route('product.destroy', $product->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-flat show_confirm"
                                                            data-toggle="tooltip">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg scrol" id="mymodal">
            </div>

        </div>
    </div>

@endsection

@section('js')
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#table_id_events').DataTable()

        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

        $(document).on('click', '.product-data', function() {
            var id = $(this).attr('id');
            // alert('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                url: "{{ url('admin/product/show') }}",
                data: {
                    'id': id,

                },
                success: function(response) {
                    $("#mymodal").html(response);

                }
            });
        });
    </script>

@endsection
