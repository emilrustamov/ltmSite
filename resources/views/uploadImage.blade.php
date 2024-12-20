<div class="form-row">
    <label>Изображения:</label>
    <div class="img-list" id="js-file-list"></div>
    <input id="js-file" type="file" name="imagess[]" multiple accept=".jpg,.jpeg,.png,.gif" csrf="{{ csrf_token() }}">
</div>
