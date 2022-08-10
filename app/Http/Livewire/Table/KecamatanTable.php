<?php

namespace App\Http\Livewire\Table;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Laravolt\Suitable\Columns\Raw;
use Laravolt\Suitable\Columns\RowNumber;
use Laravolt\Ui\TableView;

class KecamatanTable extends TableView
{

    public function data(): LengthAwarePaginator
    {
        $columns = [
            'Kecamatan',
        ];

        $query = Kecamatan::query();

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
                return \Str::limit($item->kecamatan, 50);
            }, 'Kecamatan'),
            Raw::make(function ($item) {
                return Kabupaten::where('id', $item->provinsi);
            }, 'Kabupaten'),
            Raw::make(function ($item) {
                return Provinsi::where('id', $item->provinsi);
            }, 'Provinsi'),

            Raw::make(function ($item) {
                $edit = '/daerah/kecamatan/'.$item->id.'/edit';
                $show = '/daerah/kecamatan/'.$item->id;
                $element = '';
                $element .= '<div class="ui icon buttons"> <a href="'.$show.'" class="ui button teal mini icon secondary"><i class="icon eye"></i></a> <a href="'.$edit.'" class="ui button teal mini icon secondary"><i class="icon pencil"></i></a> <button type="submit" form="kecamatan-'.$item->id.'" href="'.$show.'" class="ui button teal mini icon secondary"><i class="icon times"></i></button> </div>';
                $element .= '<form id="kecamatan-'.$item->id.'" role="form" action="'.$show.'" method="POST" onsubmit="return confirm(`Are you sure you want to delete '.$item->title.'?`)"> <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token" value="'.csrf_token().'"> </form>';

                return $element;
            }, ''),
        ];
    }
}
