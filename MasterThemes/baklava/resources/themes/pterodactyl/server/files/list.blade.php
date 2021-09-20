{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}

<div class="card-header with-border">
    <h3 class="card-title">/home/container{{ $directory['header'] }}</h3>
    <div class="card-tools">
        <a href="/server/{{ $server->uuidShort }}/files/add/@if($directory['header'] !== '')?dir={{ $directory['header'] }}@endif">
            <button class="btn btn-success btn-sm btn-icon px-1">
                New File <i class="feather icon-file"></i>
            </button>
        </a>
        <button class="btn btn-sm btn-success btn-icon px-1" data-action="add-folder">
            New Folder <i class="feather icon-folder"></i>
        </button>
        <label class="btn btn-primary btn-sm btn-icon px-1">
            Upload <i class="feather icon-upload"></i><input type="file" id="files_touch_target" class="hidden">
        </label>
        <div class="btn-group hidden-xs">
            <button type="button" id="mass_actions" class="btn btn-sm btn-secondary dropdown-toggle disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-top: 10px; padding-bottom: 10px;">
                @lang('server.files.mass_actions') <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-massactions">
                <li><a href="#" id="selective-deletion" data-action="selective-deletion" class="p-1">@lang('server.files.delete') <i class="feather icon-trash"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="card-body table-responsive no-padding">
    <table class="table table-hover" id="file_listing" data-current-dir="{{ rtrim($directory['header'], '/') . '/' }}">
        <thead>
            <tr>
                <th class="middle min-size">
                    <input type="checkbox" class="select-all-files hidden-xs" data-action="selectAll"><i class="fa fa-refresh muted muted-hover use-pointer" data-action="reload-files" style="margin-left: 7px; font-size:14px;"></i>
                </th>
                <th>@lang('server.files.file_name')</th>
                <th class="hidden-xs">@lang('server.files.size')</th>
                <th class="hidden-xs">@lang('server.files.last_modified')</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="append_files_to">
            @if (isset($directory['first']) && $directory['first'] === true)
                <tr data-type="disabled">
                    <td class="middle min-size"><i class="feather icon-folder" style="margin-left: 3px"></i></td>
                    <td><a href="/server/{{ $server->uuidShort }}/files" data-action="directory-view">&larr;</a></td>
                    <td class="hidden-xs"></td>
                    <td class="hidden-xs"></td>
                    <td></td>
                </tr>
            @endif
            @if (isset($directory['show']) && $directory['show'] === true)
                <tr data-type="disabled">
                    <td class="middle min-size"><i class="feather icon-folder" style="margin-left: 3px"></i></td>
                    <td data-name="{{ rawurlencode($directory['link']) }}">
                        <a href="/server/{{ $server->uuidShort }}/files" data-action="directory-view">&larr; {{ $directory['link_show'] }}</a>
                    </td>
                    <td class="hidden-xs"></td>
                    <td class="hidden-xs"></td>
                    <td></td>
                </tr>
            @endif
            @foreach ($folders as $folder)
                <tr data-type="folder">
                    <td class="middle min-size" data-identifier="type">
                        <input type="checkbox" class="select-folder hidden-xs" data-action="addSelection"><i class="fa fa-folder" style="margin-left: 3px;"></i>
                    </td>
                    <td data-identifier="name" data-name="{{ rawurlencode($folder['entry']) }}" data-path="@if($folder['directory'] !== ''){{ rawurlencode($folder['directory']) }}@endif/">
                        <a href="/server/{{ $server->uuidShort }}/files" data-action="directory-view">{{ $folder['entry'] }}</a>
                    </td>
                    <td data-identifier="size" class="hidden-xs">{{ $folder['size'] }}</td>
                    <td data-identifier="modified" class="hidden-xs">
                        <?php $carbon = Carbon::createFromTimestamp($folder['date'])->timezone(config('app.timezone')); ?>
                        @if($carbon->diffInMinutes(Carbon::now()) > 60)
                            {{ $carbon->format('m/d/y H:i:s') }}
                        @elseif($carbon->diffInSeconds(Carbon::now()) < 5 || $carbon->isFuture())
                            <em>@lang('server.files.seconds_ago')</em>
                        @else
                            {{ $carbon->diffForHumans() }}
                        @endif
                    </td>
                    <td class="min-size">
                        <button class="btn btn-xxs btn-secondary disable-menu-hide" data-action="toggleMenu" style="padding:2px 6px 0px;"><i class="fa fa-ellipsis-h disable-menu-hide"></i></button>
                    </td>
                </tr>
            @endforeach
            @foreach ($files as $file)
                <tr data-type="file" data-mime="{{ $file['mime'] }}">
                    <td class="middle min-size" data-identifier="type"><input type="checkbox" class="select-file hidden-xs" data-action="addSelection">
                        {{--  oh boy --}}
                        @if(in_array($file['mime'], [
                            'application/x-7z-compressed',
                            'application/zip',
                            'application/x-compressed-zip',
                            'application/x-tar',
                            'application/x-gzip',
                            'application/x-bzip',
                            'application/x-bzip2',
                            'application/java-archive'
                        ]))
                            <i class="feather icon-archive" style="margin-left: 2px;"></i>
                        @elseif(in_array($file['mime'], [
                            'application/json',
                            'application/javascript',
                            'application/xml',
                            'application/xhtml+xml',
                            'text/xml',
                            'text/css',
                            'text/html',
                            'text/x-perl',
                            'text/x-shellscript'
                        ]))
                            <i class="feather icon-code" style="margin-left: 2px;"></i>
                        @elseif(starts_with($file['mime'], 'image'))
                            <i class="feather icon-image" style="margin-left: 2px;"></i>
                        @elseif(starts_with($file['mime'], 'video'))
                            <i class="feather icon-video" style="margin-left: 2px;"></i>
                        @elseif(starts_with($file['mime'], 'video'))
                            <i class="feather icon-volume" style="margin-left: 2px;"></i>
                        @elseif(starts_with($file['mime'], 'application/vnd.ms-powerpoint'))
                            <i class="feather icon-paperclip" style="margin-left: 2px;"></i>
                        @elseif(in_array($file['mime'], [
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
                            'application/msword'
                        ]) || starts_with($file['mime'], 'application/vnd.ms-word'))
                            <i class="feather icon-paperclip" style="margin-left: 2px;"></i>
                        @elseif(in_array($file['mime'], [
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
                        ]) || starts_with($file['mime'], 'application/vnd.ms-excel'))
                            <i class="feather icon-paperclip" style="margin-left: 2px;"></i>
                        @elseif($file['mime'] === 'application/pdf')
                            <i class="feather icon-paperclip" style="margin-left: 2px;"></i>
                        @else
                            <i class="feather icon-paperclip" style="margin-left: 2px;"></i>
                        @endif
                    </td>
                    <td data-identifier="name" data-name="{{ rawurlencode($file['entry']) }}" data-path="@if($file['directory'] !== ''){{ rawurlencode($file['directory']) }}@endif/">
                        @if(in_array($file['mime'], $editableMime))
                            @can('edit-files', $server)
                                <a href="/server/{{ $server->uuidShort }}/files/edit/@if($file['directory'] !== ''){{ $file['directory'] }}/@endif{{ $file['entry'] }}" class="edit_file">{{ $file['entry'] }}</a>
                            @else
                                {{ $file['entry'] }}
                            @endcan
                        @else
                            {{ $file['entry'] }}
                        @endif
                    </td>
                    <td data-identifier="size" class="hidden-xs">{{ $file['size'] }}</td>
                    <td data-identifier="modified" class="hidden-xs">
                        <?php $carbon = Carbon::createFromTimestamp($file['date'])->timezone(config('app.timezone')); ?>
                        @if($carbon->diffInMinutes(Carbon::now()) > 60)
                            {{ $carbon->format('m/d/y H:i:s') }}
                        @elseif($carbon->diffInSeconds(Carbon::now()) < 5 || $carbon->isFuture())
                            <em>@lang('server.files.seconds_ago')</em>
                        @else
                            {{ $carbon->diffForHumans() }}
                        @endif
                    </td>
                    <td class="min-size">
                        <button class="btn btn-xxs btn-secondary disable-menu-hide" data-action="toggleMenu" style="padding:2px 6px 0px;"><i class="fa fa-ellipsis-h disable-menu-hide"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
