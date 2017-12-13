<div class="filter-tool-bar" id="filter-tool-bar">
    <form class="form-inline" action="{!! route('home') . '#filter-tool-bar' !!}" method="GET">
        <div class="tool-bar-content">
            <div class="form-group hospitals">
                <select class="form-control input-sm" id="hospital" name="hospital">
                    <option value="0">Tất cả bệnh viện</option>
                    @foreach($hospitals as $hospital)
                        <option value="{!! $hospital['id'] !!}" {!! (isset($hospitalChecked) &&  $hospitalChecked == $hospital['id']) ? 'selected' : '' !!}>{!! $hospital['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group specialists">
                <select class="form-control input-sm" id="specialist" name="specialist">
                    <option value="0">Tất cả chuyên khoa</option>
                    @foreach($specialists as $specialist)
                        <option value="{!! $specialist['id'] !!}" {!! (isset($specialistChecked) &&  $specialistChecked == $specialist['id']) ? 'selected' : '' !!}>{!! $specialist['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group doctor">
                <input type="text" class="form-control input-sm" placeholder="Nhập tên bác sỹ" id="doctor" name="doctor" value="{!! $doctorName or '' !!}"/>
            </div>
            <div class="form-group submit-button">
                <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
    </form>
</div>
