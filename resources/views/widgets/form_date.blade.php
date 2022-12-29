<div class="form-group">
    <label>{{ $title ?? 'Form Title'}}</label>
    <div
        class="input-group date"
        id="{{ $id }}"
        data-target-input="nearest">
        <div class="input-group-prepend" data-target="#{{ $id }}" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
        <input
            type="text"
            class="form-control datetimepicker-input"
            name="{{ $name }}"
            data-target="#{{ $id }}"
            placeholder="{{ $placeholder }}"
            @if($required) required @endif
            @if($readonly) readonly @endif
            value="{{ $value }}">

    </div>
</div>

@section('scripts')
@parent
<script>
    $(document).ready(() => {
        $("#{{ $id }}").datetimepicker({
            format: 'YYYY/MM/DD',
            readonly: {!! json_encode($readonly) !!}
        });
    });
</script>
@endsection
