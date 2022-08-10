<?php

namespace App\Http\Livewire\Table;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Laravolt\Suitable\Columns\Raw;
use Laravolt\Suitable\Columns\RowNumber;
use Laravolt\Ui\TableView;

class KabupatenTable extends TableView
{

    public function data(): LengthAwarePaginator
    {
        $columns = [
            'Kabupaten',
        ];

        $query = Kabupaten::query();

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
                return \Str::limit($item->kabupaten, 50);
            }, 'Kabupaten'),
            Raw::make(function ($item) {
                return Provinsi::where('id', $item->Provinsi);
            }, 'Provinsi'),

            Raw::make(function ($item) {
                $edit = '/daerah/kabupaten/'.$item->id.'/edit';
                $show = '/daerah/kabupaten/'.$item->id;
                $element = '';
                $element .= '<div class="ui icon buttons"> <a href="'.$show.'" class="ui button teal mini icon secondary"><i class="icon eye"></i></a> <a href="'.$edit.'" class="ui button teal mini icon secondary"><i class="icon pencil"></i></a> <button type="submit" form="kabupaten-'.$item->id.'" href="'.$show.'" class="ui button teal mini icon secondary"><i class="icon times"></i></button> </div>';
                $element .= '<form id="kabupaten-'.$item->id.'" role="form" action="'.$show.'" method="POST" onsubmit="return confirm(`Are you sure you want to delete '.$item->title.'?`)"> <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token" value="'.csrf_token().'"> </form>';

                return $element;
            }, ''),
        ];
    }
}
