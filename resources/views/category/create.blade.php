@extends('layouts.main')
@section('content')
    @php
        /** @var \App\Models\Category $item */
    @endphp
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('categories.index')}}" class="btn btn-primary">Categories</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid my-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-3">

                    <form method="POST" action="{{route('categories.store')}}" >
                        @csrf

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    @include('category.includes.item_edit_main_col')
                                </div>
                                <div class="col-md-3">
                                    @include('category.includes.item_edit_add_col')
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>

@endsection
