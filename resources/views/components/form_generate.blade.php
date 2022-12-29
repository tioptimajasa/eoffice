@foreach($forms as $form)
    @switch($form['type'])

        {{-- @case('text')
            @include('widgets.form_text', $form)
            @break
        @case('textarea')
            @include('widgets.form_text_area', $form)
            @break
        @case('textarea_tinymce')
            @include('widgets.form_tinymce', $form)
            @break
        @case('datetime')
            @include('widgets.form_datetime', $form)
            @break
        @case('date')
            @include('widgets.form_date', $form)
            @break 
        @case('file')
            @include('widgets.form_file', $form)
            @break --}}
        @case('file_doc')
            @include('widgets.form_file_doc', $form)
            @break
        {{-- @case('select')
            @include('widgets.form_select', $form)
            @break
        @case('select-option')
            @include('widgets.form_select_option', $form)
            @break
        @case('password')
            @include('widgets.form_text', $form)
            @break  --}}
    @endswitch
@endforeach
