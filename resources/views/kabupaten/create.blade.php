

<x-volt-app title="{{Str::of($category)->replace('-', ' ')->title()}}">

    <x-slot name="actions">
        <x-laravolt::backlink url="{{ url('/cms/'.$category) }}"/>
    </x-slot>
    <x-volt-panel title="Tambah Artikel">
        {!! form()->open()->route('articles.store',['category'=>$category])->multipart()->attribute('novalidate','') !!}
        {!! form()->text('title')->label('Judul')->required() !!}
        {!! form()->redactor('content')->label('Deskripsi')->required() !!}
        {!! form()->dropdown('status', ['publish'=>'Publish','draft'=>'Draft'])->label('Status')->required()->removeClass('clearable')->removeClass('search'); !!}
        {!! form()->uploader('featured_image')->limit(1)->fileMaxSize(5)->label('Media')->extensions(['jpg', 'png','jpeg','mp4','mpeg4'])->hint('Format file harus PNG, JPG/JPEG, MP4/MPEG4')!!}
        <div class="ui segment">
            <label>Jadikan Highlight? </label>
            <br>
            <div class="field">
                <div class="ui toggle checkbox">

                    <input type="checkbox" name="is_featured" tabindex="1" class="hidden">
                </div>
            </div>
        </div>
        <br>
        {!! form()->submit('Simpan') !!}
        {!! form()->close() !!}
    </x-volt-panel>

</x-volt-app>


