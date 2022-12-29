<div class="form-group">
    <label>{{ $title ?? 'Form Title'}}</label>
    <input
        type="{{ $type }}"
        class="form-control"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        required="{{ $required }}"
        @if($readonly) readonly @endif
        value="{{ $value }}">
</div>
