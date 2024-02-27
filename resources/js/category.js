$(document).ready(function() {
    $('button.add-subcategory').click(function() {
        let html = '<div class="col-md-12"><div class="mb-3"><input type="text" name="subcategories[]" class="form-control" placeholder="Subcategory"></div></div>';
        $('#subcategory-container').append(html);
    });
});

