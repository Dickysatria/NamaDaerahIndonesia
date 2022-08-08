

<x-volt-app title="{{Str::of($category)->replace('-', ' ')->title()}}">
    <x-slot name="actions">
        <x-laravolt::backlink url="{{ url('/cms/'.$category) }}"/>
    </x-slot>
    <x-volt-panel title="Edit Artikel">
        {!! form()->open()->put()->route('articles.update',['article'=>$article->id,'category'=>$category])->multipart()->attribute('novalidate','') !!}
        {!! form()->text('title',$article->title)->label('Judul')->required() !!}
        {!! form()->redactor('content',$article->content)->label('Deskripsi')->required() !!}
        {!! form()->dropdown('status', ['publish'=>'Publish','draft'=>'Draft'],$article->status)->label('Status')->required()->removeClass('clearable')->removeClass('search'); !!}
        {!!form()->uploader('featured_image')->value($article->featured_image)->limit(1)->fileMaxSize(5)->label('Media')->extensions(['jpg', 'png','jpeg','mp4','mpeg4'])->hint('Format file harus PNG, JPG/JPEG, MP4/MPEG4')!!}
        <div class="ui segment">
            <label>Jadikan Highlight? </label>
            <br>
            <div class="field">
                <div class="ui toggle checkbox">

                    <input type="checkbox" name="is_featured" tabindex="1" class="hidden" {{ ($article->is_featured)?'checked':'' }}>
                </div>
            </div>
        </div>
        <br>
        {!! form()->link('Batal', url('/cms/'.$category) ) !!}
        {!! form()->submit('Update') !!}
        {!! form()->close() !!}
    </x-volt-panel>
</x-volt-app>
