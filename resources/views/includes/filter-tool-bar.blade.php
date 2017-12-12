<div class="filter-tool-bar">
    <form class="form-inline" action="/action_page.php">
        <div class="tool-bar-content">
            <div class="form-group hospitals">
                <select class="form-control input-sm" id="hospital" name="hospital">
                    <option value="0">Tat ca benh vien</option>
                    @foreach($hospitals as $hospital)
                        <option value="{!! $hospital['id'] !!}">{!! $hospital['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group specialists">
                <select class="form-control input-sm" id="specialist" name="specialist">
                    <option value="0">Tat ca chuyen khoa</option>
                    @foreach($specialists as $specialist)
                        <option value="{!! $specialist['id'] !!}">{!! $specialist['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group doctor">
                <input type="text" class="form-control input-sm" placeholder="Nhap ten bac sy" id="doctor" name="doctor" />
            </div>
            <div class="form-group submit-button">
                <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
    </form>
</div>
