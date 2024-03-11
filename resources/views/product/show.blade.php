@extends('layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('products.index')}}" class="btn btn-primary">Products</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid my-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->

                <!-- Default box -->
                <div class="container-fluid">
                   {{-- <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')--}}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title">ID:</label>
                                                    <input type="text" name="title"
                                                           id="title"
                                                           value="{{ $product->id }}"
                                                           class="form-control"
                                                           placeholder="Title">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title"
                                                           id="title"
                                                           value="{{ $product->title }}"
                                                           class="form-control"
                                                           placeholder="Title">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea name="description"
                                                              id="description"

                                                              cols="30" rows="10"
                                                              class="summernote"
                                                              placeholder="Description">{{ $product->description }}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Color</h2>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="price">Color</label>
                                                    <input type="text" name="price"
                                                           id="price"
                                                           value="{{ $product->color }}"
                                                           class="form-control"
                                                           placeholder="Price">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Inventory</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product_code">Product Code:</label>
                                                <input type="text" name="product_code"
                                                       id="product_code"
                                                       value="{{ $product->product_code }}"
                                                       class="form-control"
                                                       required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="additional_code">Additional Code:</label>
                                                <input type="text" name="additional_code"
                                                       id="additional_code"
                                                       value="{{ $product->additional_code }}"
                                                       class="form-control"
                                                       required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="article">Article:</label>
                                                <input type="text" name="article"
                                                       id="article"
                                                       value="{{ $product->article }}"
                                                       class="form-control"
                                                       required>
                                            </div>
                                            {{-- <div class="col-md-6">
                                                 <div class="mb-3">
                                                     <label for="sku">SKU (Stock Keeping Unit)</label>
                                                     <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">
                                                 </div>
                                             </div>--}}
                                            {{--<div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="barcode">Barcode</label>
                                                    <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">
                                                </div>
                                            </div>--}}
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                               id="track_qty" name="track_qty" checked>
                                                        <label for="track_qty" class="custom-control-label">Track
                                                            Quantity</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number" min="0" name="qty" id="qty"
                                                           class="form-control" placeholder="Qty">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card md-3">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <label for="summary">Summary:</label>
                                            <textarea name="summary"
                                                      id="summary"
                                                      class="form-control"
                                                      >{{ $product->summary }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body">
                                         <div class="card-md-12">
                                             <h2 class="h4 md-3">Characteristics</h2>
                                            @include('product._characteristics_form')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Product status</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="new">New:</label>
                                                <input type="checkbox" name="new" id="new" value="1" @if($product->new == 1) checked @endif>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="top_sales">Top Sales:</label>
                                                <input type="checkbox" name="top_sales" id="top_sales" value="1" @if($product->top_sales == 1) checked @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="h4  mb-3">Product category</h2>
                                        @include('product._category_form')
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Pricing</h2>
                                        @include('product._price_form')
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Product brand</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Apple</option>
                                                <option value="">Vivo</option>
                                                <option value="">HP</option>
                                                <option value="">Samsung</option>
                                                <option value="">DELL</option>
                                            </select>
                                        </div>
                                        <div class="h4 md-3"> Country of production</div>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">USA</option>
                                            <option value="">EUROPE</option>
                                            <option value="">CHINA</option>
                                            <option value="">UKRAINE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Featured product</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Images</h2>
                                        @include('product._images_product')
                                    </div>
                                </div>
                            </div>
                        </div>
                       {{-- <div class="pb-5 pt-3">
                            <button class="btn btn-primary">Create</button>
                            <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div>--}}
                    {{--</form>--}}
                </div>
                <!-- /.card -->

                <!-- /.content -->

            </div>
        </div>
    </div>

@endsection
