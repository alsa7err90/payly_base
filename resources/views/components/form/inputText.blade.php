@if ($type == "text") 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{!! $nameView ?? 'Name'!!}:</strong>

            <input 
            value="{!! $value ?? "" !!}" 
            placeholder="{!! $placeholder ?? "Name" !!}" 
            class="form-control" 
            name="{!! $nameInDb ?? 'name' !!}" 
            type="text">
        </div>
    </div>
@elseif ($type == "button")
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary"> {!! $nameView ?? 'Save'!!}</button>
    </div>

@elseif ($type == "file")
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{!! $nameView ?? 'Name'!!} :</strong>
            <input type="file" name="{!! $nameInDb ?? 'file' !!}" accept="image/*" class="form-control" >
        </div>
    </div>

@elseif ($type == "select")
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $nameView ?? 'name'}} :</strong>
                <select name="{{ $nameInDb ?? 'name'}}" class="form-control">
                    {!! $placeholder !!}
                </select>
            </div>
    </div>
@endif