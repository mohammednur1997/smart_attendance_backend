

<div class="panel-body pan">
    <form action={{route("localization")}} method="post" class="form-horizontal">
        @csrf
        <div class="form-body pal">

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Default Country</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input  type="text" placeholder="Enter Country Name" value="{{app_config('Country')}}" name="country" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Date Format</label>
                <div class="col-md-9">
                    <select class="form-control selectpicker" data-live-search="true" name="date_format">
                        <option value="d/m/Y" @if(app_config('DateFormat') == 'd/m/Y') selected="selected" @endif>15/05/2016</option>
                        <option value="d.m.Y" @if(app_config('DateFormat') == 'd.m.Y') selected="selected" @endif>15.05.2016</option>
                        <option value="d-m-Y" @if(app_config('DateFormat') == 'd-m-Y') selected="selected" @endif>15-05-2016</option>
                        <option value="m/d/Y" @if(app_config('DateFormat') == 'm/d/Y') selected="selected" @endif>05/15/2016</option>
                        <option value="Y/m/d" @if(app_config('DateFormat') == 'Y/m/d') selected="selected" @endif>2016/05/15</option>
                        <option value="Y-m-d" @if(app_config('DateFormat') == 'Y-m-d') selected="selected" @endif>2016-05-15</option>
                        <option value="M d Y" @if(app_config('DateFormat') == 'M d Y') selected="selected" @endif>May 15 2016</option>
                        <option value="d M Y" @if(app_config('DateFormat') == 'd M Y') selected="selected" @endif>15 May 2016</option>
                        <option value="jS M y" @if(app_config('DateFormat') == 'jS M y') selected="selected" @endif>15th May 16</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">TimeZone</label>
                <div class="col-md-9">
                    <select name="timezone" class="form-control selectpicker" data-live-search="true">
                        @foreach (timezoneList() as $value => $label)
                            <option value="{{$value}}" @if(app_config('Timezone')==$value) selected @endif>{{$label}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Currency Code</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input  type="text" placeholder="Enter Currency Code" value="{{app_config('Currency')}}" name="currency_code" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Currency Symbol</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input type="text" placeholder="Enter Currency Symbol" value="{{app_config('CurrencyCode')}}" name="currency_symbol" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Currency Symbol Position</label>
                <div class="col-md-9">
                    <select class="form-control selectpicker" name="currency_symbol_position">
                        <option value="left" @if(app_config('currency_symbol_position') == 'left') selected="selected" @endif>{{translate('Left')}}</option>
                        <option value="right" @if(app_config('currency_symbol_position') == 'right') selected="selected" @endif>{{translate('Right')}}</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Currency Format</label>
                <div class="col-md-9">
                    <select class="form-control selectpicker" name="cformat">
                        <option value="1" @if (app_config('dec_point') == '.' AND app_config('thousands_sep') == '') selected="selected" @endif>1234.56</option>
                        <option value="2" @if (app_config('dec_point') == '.' AND app_config('thousands_sep') == ',')  selected="selected" @endif>1,234.56</option>
                        <option value="3" @if (app_config('dec_point') == ',' AND app_config('thousands_sep') == '') selected="selected" @endif>1234,56</option>
                        <option value="4" @if (app_config('dec_point') == ',' AND app_config('thousands_sep') == '.')  selected="selected" @endif>1.234,56</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Currency Decimal Digits</label>
                <div class="col-md-9">
                    <select class="form-control selectpicker" name="currency_decimal_digits">
                        <option value="false" @if(app_config('currency_decimal_digits') == 'false')  selected="selected" @endif>0 (e.g. 100)</option>
                        <option value="true" @if(app_config('currency_decimal_digits') == 'true') selected="selected" @endif>2 (e.g. 100.00)</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Default Language</label>
                <div class="col-md-9">
                    <select name="language" class="form-control" >
                        <option value="english" {{app_config('language')=='english'?'selected':''}}>{{translate('english')}}</option>
                        <option value="bangla" {{app_config('language')=='bangla'?'selected':''}}>{{translate('bangla')}}</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="form-actions">
            <div class="form-group mbn">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

