<div class="form-create-time">
    <form class="form-inline" action="{!! route('admin.doctors.time.create', ['doctor' => $doctor->id]) !!}" method="POST">
        <div class="form-group">
            <label for="day">Chon thu: </label>
            <select class="form-control" name="day_of_week" id="day">
                <option value="1">2</option>
                <option value="2">3</option>
                <option value="3">4</option>
                <option value="4">5</option>
                <option value="5">6</option>
                <option value="6">7</option>
                <option value="0">Chu Nhat</option>
            </select>
            @if ($errors->has('day_of_week'))
                <span class="help-block">
                    <strong>{{ $errors->first('day_of_week') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="pwd">Gio bat dau:</label>
            <input type="text" class="form-control timepicker" id="begin-time" name="begin_time" placeholder="08:00">
            @if ($errors->has('begin_time'))
                <span class="help-block">
                    <strong>{{ $errors->first('begin_time') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="pwd">Gio ket thuc:</label>
            <input type="text" class="form-control timepicker" id="end-time" name="end_time"  placeholder="08:00">
            @if ($errors->has('end_time'))
                <span class="help-block">
                    <strong>{{ $errors->first('end_time') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-default">Them</button>
        {!! csrf_field() !!}
    </form>
</div>
