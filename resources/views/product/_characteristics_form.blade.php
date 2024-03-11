<button id="toggleCharacteristics" type="button">Показать характеристики</button>
<div id="characteristics" style="display: none; ">
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="producer">producer</label>
                <input type="text"
                       name="producer"
                       value="{{ isset($characteristics->producer) ? $characteristics->producer : '' }}"
                       id="producer"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <label for="display_size">display size:</label>

        <div class="row">
            <div class="row">
                <div class="col-md-3">
                    <label for="display_size">11-12":</label>
                    <input type="checkbox" name="display_size" id="display_size" value='11-12"' {{ isset($characteristics->display_size) && $characteristics->display_size === '11-12"' ? 'checked' : '' }}>
                </div>
                <div class="col-md-3">
                    <label for="new">13-14":</label>
                    <input type="checkbox" name="display_size" id="display_size" value='13-14"'{{isset($characteristics->display_size) && $characteristics->display_size === '13-14"' ? 'checked' : ''}} >
                </div>
                <div class="col-md-3">
                    <label for="new">14-15":</label>
                    <input type="checkbox" name="display_size" id="display_size" value='14-15"'{{isset($characteristics->display_size) && $characteristics->display_size === '14-15"' ? 'checked' : ''}}>
                </div>
                <div class="col-md-3">
                    <label for="new">15-16":</label>
                    <input type="checkbox" name="display_size" id="display_size" value='15-16"'{{isset($characteristics->display_size) && $characteristics->display_size === '15-16"' ? 'checked' : ''}}>
                </div>
                <div class="col-md-3">
                    <label for="new">Іньше:</label>
                    <input type="checkbox" name="display_size" id="display_size" value="Іньше"{{isset($characteristics->display_size) && $characteristics->display_size === 'Іньше"' ? 'checked' : ''}}>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="form-group">
                <label for="resolving_power">resolving power</label>
                <select id="resolving_power" class="form-control" name="resolving_power">
                    <option value="HD 1280 х 720 (16:9);" {{ isset($characteristics) && $characteristics->resolving_power === 'HD 1280 х 720 (16:9)' ? 'selected' : '' }}>HD 1280 х 720 (16:9);</option>
                    <option value="WXGA 1366 х 768 (16:9);" {{ isset($characteristics) && $characteristics->resolving_power === 'WXGA 1366 х 768 (16:9)' ? 'selected' : '' }}>WXGA 1366 х 768 (16:9);</option>
                    <option value="HD 1480 х 720 (18,5:9);" {{ isset($characteristics) && $characteristics->resolving_power === 'HD 1480 х 720 (18,5:9)' ? 'selected' : '' }}>HD 1480 х 720 (18,5:9);</option>
                    <option value="HD+ 1520 х 720 (19:9);" {{ isset($characteristics) && $characteristics->resolving_power === 'HD+ 1520 х 720 (19:9)' ? 'selected' : '' }}>HD+ 1520 х 720 (19:9);</option>
                    <option value="HD+ 1560 х 720 (19,5:9);" {{ isset($characteristics) && $characteristics->resolving_power === 'HD+ 1560 х 720 (19,5:9)' ? 'selected' : '' }}>HD+ 1560 х 720 (19,5:9);</option>
                    <option value="HD+ 1600 х 720 (20:9);" {{ isset($characteristics) && $characteristics->resolving_power === 'HD+ 1600 х 720 (20:9)' ? 'selected' : '' }}>HD+ 1600 х 720 (20:9);</option>
                    <option value="Full HD 1920 х 1080 (16:9);" {{ isset($characteristics) && $characteristics->resolving_power === 'Full HD 1920 х 1080 (16:9)' ? 'selected' : '' }}>Full HD 1920 х 1080 (16:9);</option>
                    <option value="Full HD+ 2220 х 1080 (18,5:9);" {{ isset($characteristics) && $characteristics->resolving_power === 'Full HD+ 2220 х 1080 (18,5:9)' ? 'selected' : '' }}>Full HD+ 2220 х 1080 (18,5:9);</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="screen">screen</label>
                <input type="text"
                       name="screen"
                       id="screen"
                       value="{{ isset($characteristics->screen) ? $characteristics->screen : '' }}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="matrix_type">matrix type</label>
                <input type="text"
                       name="matrix_type"
                       id="matrix_type"
                       value="{{ isset($characteristics->matrix_type)  ? $characteristics->matrix_type:''}}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="screen_refresh_rate">screen refresh rate</label>
                <input type="text"
                       name="screen_refresh_rate"
                       id="screen_refresh_rate"
                       value="{{ isset($characteristics->screen_refresh_rate) ? $characteristics->screen_refresh_rate:''}}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="processor">processor</label>
                <input type="text"
                       name="processor"
                       id="processor"
                       value="{{ isset($characteristics->processor) ? $characteristics->processor:''}}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="number_of_processor_cores">number  of processor cores</label>
                <input type="text"
                       name="number_of_processor_cores"
                       id="number_of_processor_cores"
                       value="{{ isset($characteristics->number_of_processor_cores) ?$characteristics->number_of_processor_cores :'' }}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="RAM_type">RAM  type</label>
                <input type="text"
                       name="RAM_type"
                       id="RAM_type"
                       value="{{ isset($characteristics->RAM_tupe)? $characteristics->RAM_tupe:'' }}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="RAM_capacity">RAM  capacity</label>
                <input type="text"
                       name="RAM_capacity"
                       id="RAM_capacity"
                       value="{{ isset($characteristics->RAM_capacity)? $characteristics->RAM_capacity:''}}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="types_of_hard_drives">types of hard drives</label>
                <input type="text"
                       name="types_of_hard_drives"
                       id="types_of_hard_drives"
                       value="{{ isset($characteristics->types_of_hard_drives)? $characteristics->types_of_hard_drives:'' }}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="SSD_size">SSD  size</label>
                <input type="text"
                       name="SSD_size"
                       id="SSD_size"
                       value="{{isset( $characteristics->SSD_size) ? $characteristics->SSD_size:'' }}"
                       class="form-control">
            </div>
        </div>
    </div>
</div><div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="video_card_type">video  card type</label>
                <input type="text"
                       name="video_card_type"
                       id="video_card_type"
                       value="{{ isset($characteristics->video_card_type)?$characteristics->video_card_type:'' }}"
                       class="form-control" >
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="video_card">video  card</label>
                <input type="text"
                       name="video_card"
                       id="video_card"
                       value="{{ isset($characteristics->video_card)?$characteristics->video_card:'' }}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="amount_of_VRAM">amount of  VRAM</label>
                <input type="text"
                       name="amount_of_VRAM"
                       id="amount_of_VRAM"
                       value="{{ isset($characteristics->amount_of_VRAM)?$characteristics->amount_of_VRAM:'' }}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="OS">OS</label>
                <input type="text"
                       name="OS"
                       id="OS"
                       value="{{ isset($characteristics->OS) ?$characteristics->OS:'' }}"
                       class="form-control" >
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="battery_capacity">battery  capacity</label>
                <input type="text"
                       name="battery_capacity"
                       id="battery_capacity"
                       value="{{ isset($characteristics->battery_capacity)?$characteristics->battery_capacity:'' }}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <label for="weight">weight</label>
                <input type="text"
                       name="weight"
                       id="weight"
                       value="{{ isset($characteristics->weight)?$characteristics->weight:'' }}"
                       class="form-control" >
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="country_of_production">country of production</label>
                <input type="text"
                       name="country_of_production"
                       id="country_of_production"
                       value="{{ isset($characteristics->country_of_production)?$characteristics->country_of_production:''}}"
                       class="form-control">
            </div>
        </div>
    </div>
</div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const characteristics = document.getElementById('characteristics');
        const toggleButton = document.getElementById('toggleCharacteristics');

        toggleButton.addEventListener('click', function() {
            if (characteristics.style.display === 'none') {
                characteristics.style.display = 'block';
            } else {
                characteristics.style.display = 'none';
            }
        });
    });
</script>
