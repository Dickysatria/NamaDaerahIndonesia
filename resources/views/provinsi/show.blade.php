


<x-volt-app title="{{Str::of($category)->replace('-', ' ')->title()}}">
    <x-slot name="actions">
        <x-laravolt::backlink url="{{ url('/cms/'.$category) }}"/>
    </x-slot>
    <x-volt-panel title="Detail Artikel" >
        <table class="ui definition table">
            <tbody>
            <tr>
                <td>Penulis</td>
                <td>
                    {{$author->name}}
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    @if ($article->status == 'publish')
                        <a class="ui blue label">Publish</a>
                    @else
                        <a class="ui orange label">Draft</a>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    @if ($article->category == 'tempo_dulu')
                        <a class="ui green label">Masa lalu</a>
                    @elseif($article->category == 'masa_kini')
                        <a class="ui orange label">Masa kini</a>
                    @else
                        <a class="ui violet label">Masa depan</a>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Gambar Headline</td>
                <td>
                    @if($article->featured_image)
                    <a href=" {{$article->featured_image}}" target="_blank">Lihat Gambar</a>
                    @else
                    Tidak ada gambar
                    @endif
                </td>
            </tr>
            <tr>
                <td>Created at</td>
                <td>
                    {{\Carbon\Carbon::parse($article->created_at)->timezone(auth()->user()->timezone)->isoFormat('LLL')}}
                </td>
            </tr>
            <tr>
            <tr>
                <td>Updated at</td>
                <td>
                    {{\Carbon\Carbon::parse($article->updated_at)->timezone(auth()->user()->timezone)->isoFormat('LLL')}}
                </td>
            </tr>
            <tr>
            </tbody></table>

        <br>
        <div class="ui styled fluid accordion">
            <div class="title active">
                <i class="dropdown icon"></i>
                Judul
            </div>
            <div class="content active">
                <p class="transition visible" style="display: block !important;">{{ $article->title }}</p>
            </div>
            <div class="title">
                <i class="dropdown icon"></i>
              Deskripsi
            </div>
            <div class="content">
                {!! $article->content !!}
            </div>

        </div>

    </x-volt-panel>

    @push('script')
        <script>
            $('.ui.accordion').accordion()
        </script>
    @endpush
</x-volt-app>
