<x-volt-app title="Kabupaten">

    <x-volt-link-button
            label="Tambah"
            icon="plus"
            url="{{ route('daerah.kabupaten.create') }}"/>
        @livewire(\App\Http\Livewire\Table\KabupatenTable::class)

    @push('script')
        <script>
            $('.menu .item')
                .tab()
            ;
        </script>
    @endpush

</x-volt-app>
