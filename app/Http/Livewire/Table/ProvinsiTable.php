<?php

namespace App\Http\Livewire\Table;

use App\Models\Provinsi;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Laravolt\Suitable\Columns\Raw;
use Laravolt\Suitable\Columns\RowNumber;
use Laravolt\Ui\TableView;

class ProvinsiTable extends TableView
{

    public function data(): LengthAwarePaginator
    {
        $columns = [
            'Provinsi',
        ];

        $query = Provinsi::query();

        return $query->whereLike($columns, $this->search)
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
                return \Str::limit($item->provinsi, 50);
            }, 'Provinsi'),

            Raw::make(function ($item) {
                $edit = '/daerah/provinsi/'.$item->id.'/edit';
                $show = '/daerah/provinsi/'.$item->id;
                $element = '';
                $element .= '<div class="ui icon buttons"> <a href="'.$show.'" class="ui button teal mini icon secondary"><i class="icon eye"></i></a> <a href="'.$edit.'" class="ui button teal mini icon secondary"><i class="icon pencil"></i></a> <button type="submit" form="provinsis-'.$item->id.'" href="'.$show.'" class="ui button teal mini icon secondary"><i class="icon times"></i></button> </div>';
                $element .= '<form id="provinsi-'.$item->id.'" role="form" action="'.$show.'" method="POST" onsubmit="return confirm(`Are you sure you want to delete '.$item->title.'?`)"> <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token" value="'.csrf_token().'"> </form>';

                return $element;
            }, ''),
        ];
    }
}
