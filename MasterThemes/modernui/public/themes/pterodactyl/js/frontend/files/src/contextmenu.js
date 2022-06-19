"use strict";

// Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
//
// The above copyright notice and this permission notice shall be included in all
// copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
// SOFTWARE.
class ContextMenuClass {
    constructor() {
        this.activeLine = null;
    }

    run() {
        this.directoryClick();
        this.rightClick();
    }

    makeMenu(parent) {
        $(document).find('#fileOptionMenu').remove();
        if (!_.isNull(this.activeLine)) this.activeLine.removeClass('active');

        let newFilePath = $('#file_listing').data('current-dir');
        if (parent.data('type') === 'folder') {
            const nameBlock = parent.find('td[data-identifier="name"]');
            const currentName = decodeURIComponent(nameBlock.attr('data-name'));
            const currentPath = decodeURIComponent(nameBlock.data('path'));
            newFilePath = `${currentPath}${currentName}`;
        }

        let buildMenu = '';

        if (Pterodactyl.permissions.moveFiles) {
            buildMenu += '<div class="btn-group">\
                          <button class="btn btn-success btn-sm" data-action="rename"><a class="text-white" tabindex="-1" href="#"><i class="fa fa-fw fa-pencil-square-o"></i> Rename</a></button> \
                          <button class="btn btn-warning btn-sm" data-action="move"><a class="text-white" tabindex="-1" href="#"><i class="fa fa-fw fa-arrow-right"></i> Move</a></button>\
                          </div><hr>';
        }

        if (Pterodactyl.permissions.copyFiles) {
            buildMenu += '<button class="btn btn-info btn-sm" data-action="copy"><a class="text-white" tabindex="-1" href="#"><i class="fa fa-fw fa-clone"></i> Copy</a></button><hr>';
        }

        if (Pterodactyl.permissions.compressFiles || Pterodactyl.permissions.decompressFiles) {
            buildMenu += '<div class="btn-group compressActions" style="display: none;">';
        }

        if (Pterodactyl.permissions.compressFiles) {
            buildMenu += '<button data-action="compress" class="btn btn-warning btn-sm" style="display: none;"><a class="text-white" tabindex="-1" href="#"><i class="fa fa-fw fa-file-archive-o"></i> Compress</a></button>';
        }

        if (Pterodactyl.permissions.decompressFiles) {
            buildMenu += '<button data-action="decompress" class="btn btn-primary btn-sm" style="display: none;"><a class="text-white" tabindex="-1" href="#"><i class="fa fa-fw fa-expand"></i> Decompress</a></button>';
        }

        if (Pterodactyl.permissions.compressFiles || Pterodactyl.permissions.decompressFiles) {
            buildMenu += '</div><hr class="compressActions" style="display: none;">';
        }

        if (Pterodactyl.permissions.createFiles) {
            buildMenu += '<div class="btn-group">' +
                '         <button class="btn btn-sm btn-primary" data-action="file"><a class="text-white" href="/server/'+ Pterodactyl.server.uuidShort +'/files/add/?dir=' + $('<div>').text(newFilePath).html() + '" class="text-muted"><i class="fa fa-fw fa-plus"></i> New File</a></button> \
                          <button class="btn btn-sm btn-info" data-action="folder" onclick="$(\'#actionsModal\').modal(\'hide\');"><a class="text-white" tabindex="-1" href="#"><i class="fa fa-fw fa-folder"></i> New Folder</a></button>\
                          </div><hr>';
        }

        if (Pterodactyl.permissions.downloadFiles || Pterodactyl.permissions.deleteFiles) {
            buildMenu += '<div class="btn-group">';
        }

        if (Pterodactyl.permissions.downloadFiles) {
            buildMenu += '<button data-action="download" class="btn btn-sm btn-success" style="display: none;"><a tabindex="-1" href="#" class="text-white"><i class="fa fa-fw fa-download"></i> Download</a></button>';
        }

        if (Pterodactyl.permissions.deleteFiles) {
            buildMenu += '<button data-action="delete" class="bg-danger btn btn-sm btn-danger"><a tabindex="-1" href="#" class="text-white"><i class="fa fa-fw fa-trash-o"></i> Delete</a></button>';
        }

        if (Pterodactyl.permissions.downloadFiles || Pterodactyl.permissions.deleteFiles) {
            buildMenu += '</div>';
        }

        return buildMenu;
    }

    rightClick() {
        $('[data-action="toggleMenu"]').on('mousedown', event => {
            event.preventDefault();
            if ($(document).find('#fileOptionMenu').is(':visible')) {
                $('body').trigger('click');
                return;
            }
            this.showMenu(event);
        });
        $('#file_listing > tbody td').on('contextmenu', event => {
            this.showMenu(event);
        });
    }

    showMenu(event) {
        const parent = $(event.target).closest('tr');
        const menu = $(this.makeMenu(parent));

        if (parent.data('type') === 'disabled') return;
        event.preventDefault();

        $('#actionsModalBody').html(menu);
        $('#actionsModal').modal('show');

        this.activeLine = parent;
        this.activeLine.addClass('active');

        // Handle Events
        const Actions = new ActionsClass(parent, menu);
        if (Pterodactyl.permissions.moveFiles) {
            $('#actionsModalBody').find('button[data-action="move"]').unbind().on('click', e => {
                e.preventDefault();
                $('#actionsModal').modal('hide');
                Actions.move();
            });
            $('#actionsModalBody').find('button[data-action="rename"]').unbind().on('click', e => {
                e.preventDefault();
                $('#actionsModal').modal('hide');
                Actions.rename();
            });
        }

        if (Pterodactyl.permissions.copyFiles) {
            $('#actionsModalBody').find('button[data-action="copy"]').unbind().on('click', e => {
                e.preventDefault();
                $('#actionsModal').modal('hide');
                Actions.copy();
            });
        }

        if (Pterodactyl.permissions.compressFiles) {
            if (parent.data('type') === 'folder') {
                $('#actionsModalBody').find('button[data-action="compress"]').show();
                $('#actionsModalBody').find('.compressActions').show();
            }
            $('#actionsModalBody').find('button[data-action="compress"]').unbind().on('click', e => {
                e.preventDefault();
                $('#actionsModal').modal('hide');
                Actions.compress();
            });
        }

        if (Pterodactyl.permissions.decompressFiles) {
            if (_.without(['application/zip', 'application/gzip', 'application/x-gzip'], parent.data('mime')).length < 3) {
                $('#actionsModalBody').find('button[data-action="decompress"]').show();
                $('#actionsModalBody').find('.compressActions').show();
            }
            $('#actionsModalBody').find('button[data-action="decompress"]').unbind().on('click', e => {
                e.preventDefault();
                $('#actionsModal').modal('hide');
                Actions.decompress();
            });
        }

        if (Pterodactyl.permissions.createFiles) {
            $('#actionsModalBody').find('button[data-action="folder"]').unbind().on('click', e => {
                e.preventDefault();
                Actions.folder();
            });
        }

        if (Pterodactyl.permissions.downloadFiles) {
            if (parent.data('type') === 'file') {
                $('#actionsModalBody').find('button[data-action="download"]').show();
            }
            $('#actionsModalBody').find('button[data-action="download"]').unbind().on('click', e => {
                e.preventDefault();
                $('#actionsModal').modal('hide');
                Actions.download();
            });
        }

        if (Pterodactyl.permissions.deleteFiles) {
            $('#actionsModalBody').find('button[data-action="delete"]').unbind().on('click', e => {
                e.preventDefault();
                $('#actionsModal').modal('hide');
                Actions.delete();
            });
        }

        /*$(window).unbind().on('click', event => {
            if($(event.target).is('.disable-menu-hide')) {
                event.preventDefault();
                return;
            }
            $(menu).unbind().remove();
            if(!_.isNull(this.activeLine)) this.activeLine.removeClass('active');
        });*/
    }

    directoryClick() {
        $('a[data-action="directory-view"]').on('click', function (event) {
            event.preventDefault();

            const path = $(this).parent().data('path') || '';
            const name = $(this).parent().data('name') || '';

            window.location.hash = encodeURIComponent(path + name);
            Files.list();
        });
    }
}

window.ContextMenu = new ContextMenuClass;
