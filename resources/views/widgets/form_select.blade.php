<div class="form-group">
    <label>{{ $title ?? 'Form Title'}}</label>
    <select
        class="form-control"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        @if($readonly) readonly @endif
        value="{{ $value }}">
        @foreach($select_data as $item)
        <option
            value="{{ $item }}"
            {{ ($item == $value) ? 'selected' : '' }}>
            {{ $item }}
        </option>
        @endforeach
    </select>
</div>
