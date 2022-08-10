<x-volt-app title="Provinsi">

    <x-volt-link-button
            label="Tambah"
            icon="plus"
            url="{{ route('daerah.provinsi.create') }}"/>
        @livewire(\App\Http\Livewire\Table\ProvinsiTable::class)

    @push('script')
        <script>
            $('.menu .item')
                .tab()
            ;
        </script>
    @endpush

</x-volt-app>
