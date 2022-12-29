<div class="form-group">
    <label>{{ $title ?? 'Form Title'}}</label>
    @if($value !== "")
    <br/>
   
    @if(!$readonly)
    <div class="input-group">
        <div class="custom-file">
            <input
                type="{{ $type }}"
                class="custom-file-input"
                name="{{ $name }}"
                id="{{ $id }}"
                placeholder="{{ $placeholder }}"
                @if($required) required @endif
                @if($readonly) readonly @endif>
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        </div>
    </div>
    @endif
</div>

@section('scripts')
@parent
<script>
    $(document).ready(function () {
        const a = bsCustomFileInput.init();
    });
</script>
@endsection
