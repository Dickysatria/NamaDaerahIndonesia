<x-volt-app title="Desa">

    <x-volt-link-button
            label="Tambah"
            icon="plus"
            url="{{ route('daerah.desa.create') }}"/>
        @livewire(\App\Http\Livewire\Table\DesaTable::class)

    @push('script')
        <script>
            $('.menu .item')
                .tab()
            ;
        </script>
    @endpush

</x-volt-app>
