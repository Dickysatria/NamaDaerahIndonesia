<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index()
    {
        try {
            $backup_name = config('backup.monitor_backups')[0]['name'];
            $disk = Storage::disk(config('laravel-back.backup.destination.disk'));
            $files = $disk->files($backup_name);

            $backups = [];
            foreach($files as $k => $f)
            {
                if(substr($f, -4) == '.zip' && $disk->exists($f)){
                    $backups[] = [
                        'file_path' => $f,
                        'file_name' => str_replace(config('laravel-backup.backup.name').$backup_name.'/','',$f),
                        'file_size' => $disk->size($f),
                        'last_modifed' => $disk->lastModified($f),
                    ];
                }
            }
            $backups = array_reverse($backups);
            return view('backup.index')->with(compact('backups'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function humanFileSize($size, $unit = '')
    {
        if ((! $unit && $size >= 1 << 30) || $unit == 'GB') {
            return number_format($size / (1 << 30), 2).'GB';
        }
        if ((! $unit && $size >= 1 << 20) || $unit == 'MB') {
            return number_format($size / (1 << 20), 2).'MB';
        }
        if ((! $unit && $size >= 1 << 10) || $unit == 'KB') {
            return number_format($size / (1 << 10), 2).'KB';
        }

        return number_format($size).' bytes';
    }

    public function create()
    {
        try {
            /* only database backup*/
            Artisan::call('backup:run --only-db');
            /* all backup */
            /* Artisan::call('backup:run'); */
            return redirect()->back()->withSuccess('Backup Berhasil Dilakukan');
        } catch (\Exception $e) {
            session()->flash('danger', $e->getMessage());

            return redirect()->back();
        }
    }

    public function download($file_name)
    {
        $backup_name = config('backup.monitor_backups')[0]['name'];
        $file = config('laravel-backup.backup.name')."/$backup_name/".$file_name;

        $disk = Storage::disk(config('laravel-backup.backup.destination.disks'));

        if ($disk->exists($file)) {
            $fs = Storage::disk(config('laravel-backup.backup.destination.disks'))->getDriver();
            $stream = $fs->readStream($file);

            return \Response::stream(function () use ($stream) {
                fpassthru($stream);  //@phpstan-ignore-line
            }, 200, [
                'Content-Type' => $fs->getMimetype($file),
                'Content-Length' => $fs->getSize($file),
                'Content-disposition' => 'attachment; filename="'.basename($file).'"',
            ]);
        } else {
            abort(404, "Backup file doesn't exist.");
        }
    }

    public function delete($file_name)
    {
        $backup_name = config('backup.monitor_backups')[0]['name'];
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks'));

        if ($disk->exists(config('laravel-backup.backup.name')."/$backup_name/".$file_name)) {
            $disk->delete(config('laravel-backup.backup.name')."/$backup_name/".$file_name);
            session()->flash('delete', 'Successfully deleted backup!');

            return redirect()->back()->withSuccess('Delete berhasil dilakukan');
        } else {
            abort(404, "Backup file doesn't exist.");
        }
    }
}
