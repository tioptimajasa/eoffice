<div class="form-group">
    <label>{{ $title ?? 'Form Title'}}</label>
    <textarea
        type="{{ $type }}"
        class="form-control"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        @if($readonly) readonly @endif
        value="{{ $value }}">{{ $value }}</textarea>
</div>
