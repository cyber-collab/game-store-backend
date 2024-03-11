@php
/** @var \App\Models\BlogCategory $item */
 @endphp
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
                            <input name="title" value="{{ $item->exists ? $item->title : '' }}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="2"
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
                            <label for="parent_id">Батькивська категорія</label>
                            <select name="parent_id"
                                    id="parent_id"
                                    class="form-control"
                                    placeholder="Виберіть категорію"
                                    required>
                                @if($item->parent_id == 0)
                                    <option value="0" selected>Без категорії</option>
                                @else
                                    <option value="{{ $item->parent_id }}" selected>{{ $item->name }}</option>
                                @endif
                                @foreach($categoryList as $categoryOption)
                                    @if($categoryOption->id != $item->parent_id)
                                        <option value="{{ $categoryOption->id }}">{{ $categoryOption->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="name" value="{{ $item->parent_id == 0 ? 'Без категорії' : $item->parent_id }}">

                        </div>


                                    <div class="form-group">
                                        <ul class="list-unstyled">
                                            <li>Опубліковано</li>
                                        </ul>

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
                                      rows="3">{{ $item->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
