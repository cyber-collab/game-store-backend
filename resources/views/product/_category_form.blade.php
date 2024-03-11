<div class="card-body">
    <div class="form-group">
        <label for="category_ids">{{ __('Categories') }}</label>
        <select id="category_ids" class="form-control" name="category_ids[]">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
</div>



