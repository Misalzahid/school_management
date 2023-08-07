@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <body>
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <a class="btn btn-primary mb-3" href="{{ url()->previous() }}">Back</a>
                    <form id="add_student" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <h4 class="text-center my-4">Add Product</h4>
                                        <div class="container">
                                            <div class="row " style="width: 90%; margin:auto">
                                                <div class="col-sm-6 ">
                                                    <div class="form-group mb-2">
                                                        <label>Name</label>
                                                        <input type="text" placeholder="Enter Product Name"
                                                            name="name" id="name" class="form-control">
                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 ">
                                                    <div class="form-group mb-2">
                                                        <label>Category</label>
                                                        <select id="category-dropdown" class="form-control"
                                                            name="category_id">
                                                            <option value=""disabled selected>Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->title }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row" style="width: 90%; margin:auto">
                                                <div class="col-sm-6 ">
                                                    <div class="form-group mb-2">
                                                        <label>Sub Category</label>
                                                        <select class="form-control" name="sub_Category_id"
                                                            id="subcategory-dropdown">
                                                        </select>
                                                        @error('subCategory_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 ">
                                                    <div class="form-group mb-2">
                                                        <label>Image</label>
                                                        <input type="file" placeholder="Image" name="image"
                                                            id="image" class="form-control">
                                                        @error('image')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 ">
                                                    <div class="form-group mb-3">
                                                        <label>Description</label>
                                                        <textarea placeholder="Enter description" name="description" id="description" class="form-control" required></textarea>
                                                        @error('description')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="container" id="fieldsContainer">
                                            <a class="btn btn-success mb-3" id="addFieldButton"
                                                style="padding: 0 14px !important; margin:10px 0px 10px 68px">+</a>
                                            <div class="row" style="width: 90%; margin:auto">
                                                <div class="col-sm-3">
                                                    <div class="form-group mb-2">
                                                        <label>Size</label>
                                                        <input type="number" placeholder="Enter size" name="size[]"
                                                            id="size" class="form-control" required>
                                                        @error('size')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 ">
                                                    <div class="form-group mb-3">
                                                        <label>Price</label>
                                                        <input type="number" placeholder="Enter price" name="price[]"
                                                            id="price" class="form-control" required>
                                                        @error('price')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group mb-3">
                                                        <label>Quantity</label>
                                                        <input type="number" placeholder="Enter quantity" name="quantity[]"
                                                            id="quantity" class="form-control" required>
                                                        @error('quantity')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 ">
                                                    <div class="form-group mb-3">
                                                        <label>Total Stock</label>
                                                        <input type="number" placeholder="Enter stock" name="total_stock[]"
                                                            id="stock" class="form-control" required>
                                                        @error('total_stock')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-success mr-1 btn-bg"
                                                    id="submit">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </body>
@endsection

@section('js')
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    <script>
        CKEDITOR.replace('description');
    </script>
    <script>
        $(document).ready(function() {
            $('#category-dropdown').on('change', function() {
                var category_id = this.value;
                $("#subcategory-dropdown").html('');
                $.ajax({
                    url: "{{ url('admin/get-subcategories/{id}') }}",
                    type: "GET",
                    data: {
                        category_id: category_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#subcategory-dropdown').html(
                            '<option value="" disabled selected>Select Sub Category</option>'
                        );
                        $.each(result.data, function(key, value) {
                            $("#subcategory-dropdown").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                    }
                });
            });
        });

        // Counter to keep track of the number of fields
        var fieldCounter = 0;

        // Event handler for the add field button
        $(document).on('click', '#addFieldButton', function() {
            fieldCounter++; // Increment the field counter

            // Create the HTML for the new fields
            var newFields = `
    <div class="fieldsContainer${fieldCounter}" style="margin:10px 35px 10px 45px">
        <a class="btn btn-danger mb-3 mt-3 removeFieldButton" data-target="${fieldCounter}"
            style="padding: 0 14px !important;margin-left: 25px">-</a>
        <div class="row mx-0 px-4">
            <div class="col-sm-3 pl-sm-0 pr-sm-2">
                <div class="form-group mb-3">
                    <label>Size</label>
                    <input type="number" placeholder="Enter size" name="size[]" id="size${fieldCounter}"
                        class="form-control" />
                    <div class="text-danger">
                        @error('size')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-3 pl-sm-0 pr-sm-2">
                <div class="form-group mb-3">
                    <label>Price</label>
                    <input type="number" placeholder="Enter price" name="price[]" id="price${fieldCounter}"
                        class="form-control" />
                    <div class="text-danger">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-3 pl-sm-0 pr-sm-2">
                <div class="form-group mb-3">
                    <label>Quantity</label>
                    <input type="number" placeholder="Enter quantity" name="quantity[]" id="quantity${fieldCounter}"
                        class="form-control" />
                    <div class="text-danger">
                        @error('quantity')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-3 pl-sm-0 pr-sm-2">
                <div class="form-group mb-3">
                    <label>Total Stock</label>
                    <input type="number" placeholder="Enter stock" name="total_stock[]" id="stock${fieldCounter}"
                        class="form-control" />
                    <div class="text-danger">
                        @error('total_stock')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    `;

            // Append the new fields to the container
            $('#fieldsContainer').append(newFields);
        });

        // Event handler for removing a field
        $(document).on('click', '.removeFieldButton', function() {
            var target = $(this).data('target');
            $('.fieldsContainer' + target).remove();
        });
        // });
    </script>

@endsection
