@section('tasks::chain-template')
    <div class="card-footer task-list-item" data-target="task-clone">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">@lang('server.schedule.task.time')</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <select name="tasks[time_value][]" class="form-control">
                                @foreach(range(0, 59) as $number)
                                    <option value="{{ $number }}">{{ $number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="tasks[time_interval][]" class="form-control">
                                <option value="s">@lang('strings.seconds')</option>
                                <option value="m">@lang('strings.minutes')</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">@lang('server.schedule.task.action')</label>
                    <div>
                        <select name="tasks[action][]" class="form-control">
                            <option value="command">@lang('server.schedule.actions.command')</option>
                            <option value="power">@lang('server.schedule.actions.power')</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">@lang('server.schedule.task.payload')</label>
                    <div data-attribute="remove-task-element">
                        <input type="text" name="tasks[payload][]" class="form-control">
                        <div class="input-group-btn" style="display: none;">
                            <button type="button" class="btn btn-danger" data-action="remove-task"><i
                                    class="fa fa-close"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@show
