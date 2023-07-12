@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <body>
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Update Sub Category</h4>
                                </div>
                                <form action="{{route('subCategory.update',$subCategory->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category_id" id="" class="form-control">
                                                @foreach($category  as $categories)
                                                <option value={{$categories->id}} {{ $categories->id == $subCategory->category_id ? 'selected' : ''}} >{{$categories->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Sub Category</label>
                                            <input type="text" class="form-control" placeholder="Sub Category" name="title" value="{{$subCategory->title}}">
                                        </div>
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label>Choose Image</label>
                                            <input type="file" name="image" class="form-control">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
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
@endsection
