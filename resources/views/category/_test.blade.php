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
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title"></div>
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab"  href="#maindata" role="tab">Основні дані</a>
                                                        </li>
                                                    </ul>
                                                    <br>
                                                    <div class="tab-content">
                                                        <div class="tab-pane  active" id="maindata"  role="tabpanel">
                                                            <div class="form-group">
                                                                <label for="title">Заголовок</label>
                                                                <input name="title" value="{{$item->title}}"
                                                                       id="title"
                                                                       type="text"
                                                                       class="form-control"
                                                                       minlength="3"
                                                                       required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="slug">Ідентифікатор</label>
                                                                <input name="slug"  value="{{$item->slug}}"
                                                                       id="slug"
                                                                       type="text"
                                                                       class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="parent_id">Батьківська категорія</label>
                                                                <select name="parent_id"
                                                                        id="parent_id"
                                                                        class="form-control"
                                                                        placeholder="Виберіть категорію">
                                                                    <option value="">Без батьківської категорії</option>
                                                                    @foreach($categoryList as $categoryOption)
                                                                        <option value="{{$categoryOption->id}}"
                                                                                @if($categoryOption->id == $item->parent_id) selected @endif>
                                                                            {{$categoryOption->title}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="status">Status</label>
                                                                <select name="status" id="status" class="form-control" required>
                                                                    <option value="1" @if($item->status == 1) selected @endif>Так</option>
                                                                    <option value="0" @if($item->status == 0) selected @endif>Ні</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description">Опис</label>
                                                                <textarea name="description"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <button type="submit" class="btn btn-primary">Зберегти</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    @if($item->exists)
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <ul class="list-unstyled">
                                                            <li>ID: {{$item->id}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="title">Створено</label>
                                                            <input type="text" value="{{$item->created_at}}" class="form-control" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Змінено</label>
                                                            <input type="text" value="{{$item->updated_at}}" class="form-control" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Видалено</label>
                                                            <input type="text" value="{{$item->deleted_at}}" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
