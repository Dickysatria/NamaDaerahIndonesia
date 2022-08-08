@push('style')

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
<link type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
@endpush

<x-volt-app title="Database Backup">
    <x-slot name="actions">
        <div class="column p-x-5 p-y-1">
            <x-volt-link-button
            label="Backup"
            icon="folder"
            url="{{ url('/backup/run') }}"
            />
        </div>

    </x-slot>

	<div class="col-xs-12" style="text-align: center; margin-left:50px; margin-right: 50px">
            @if (count($backups))
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>File Name</th>
                        <th>File Size</th>
                        <th>Created Date</th>
                        <th>Created Age</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($backups as $backup)
                        <tr>
                            <td>{{ $backup['file_name'] }}</td>
                            <td>{{ \App\Http\Controllers\BackupController::humanFilesize($backup['file_size']) }}</td>
                            <td>
                                {{ date('F jS, Y, g:ia (T)',$backup['last_modified']) }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($backup['last_modified'])->diffForHumans() }}
                            </td>
                            <td>
                                <a class="btn btn-success"
                                   href="{{ url('backup/download/'.$backup['file_name']) }}"><i
                                        class="fa fa-cloud-download"></i> Download</a>
                                <a class="btn btn-danger" onclick="return confirm('Do you really want to delete this file');" data-button-type="delete"
                                   href="{{ url('backup/delete/'.$backup['file_name']) }}"><i class="fa fa-trash-o"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="well">
                    <h4>No backups</h4>
                </div>
            @endif
        </div>


</x-volt-app>

