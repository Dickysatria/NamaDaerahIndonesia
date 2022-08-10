<?php

namespace App\Http\Livewire\Table;

use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Laravolt\Ui\TableView;
use Laravolt\Suitable\Columns\Raw;
use Laravolt\Suitable\Columns\RowNumber;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DesaTable extends TableView
{

    public function data(): LengthAwarePaginator
    {
        $columns = [
            'Desa',
        ];

        $query = Desa::query();

        return $query
            ->whereLike($columns, $this->search)
            ->latest()
            ->paginate();
    }

    /**
     * Return array of column.
     *
     * @return array<string>
     */
    public function columns(): array
    {
        return [
            RowNumber::make(),
            Raw::make(function ($item) {
                return \Str::limit($item->Desa, 50);
            }, 'Desa'),
            Raw::make(function ($item) {
                return Kecamatan::where('id', $item->kecamatan);
            }, 'Kecamatan'),
            Raw::make(function ($item) {
                return Kabupaten::where('id', $item->kabupaten);
            }, 'Kabupaten'),
            Raw::make(function ($item) {
                return Provinsi::where('id', $item->Provinsi);
            }, 'Provinsi'),


            Raw::make(function ($item) {
                $edit = '/daerah/desa/'.$item->id.'/edit';
                $show = '/daerah/desa/'.$item->id;
                $element = '';
                $element .= '<div class="ui icon buttons"> <a href="'.$show.'" class="ui button teal mini icon secondary"><i class="icon eye"></i></a> <a href="'.$edit.'" class="ui button teal mini icon secondary"><i class="icon pencil"></i></a> <button type="submit" form="desa-'.$item->id.'" href="'.$show.'" class="ui button teal mini icon secondary"><i class="icon times"></i></button> </div>';
                $element .= '<form id="desa-'.$item->id.'" role="form" action="'.$show.'" method="POST" onsubmit="return confirm(`Are you sure you want to delete '.$item->title.'?`)"> <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token" value="'.csrf_token().'"> </form>';

                return $element;
            }, ''),
        ];
    }
}
