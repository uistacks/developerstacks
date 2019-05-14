<link rel="stylesheet" href="{{ asset('public/website_assets/css/autocomplete/chosen.css') }}">
<div class="search-form">
    <div class="row">
        <form id="frm_store_search" action="{{ action("SearchController@searchResult") }}" method="GET">
            <?php
            $storeName = '';
            if(isset($_GET['store_name'])){
                $storeName = $_GET['store_name'];
            }
            $activityName = '';
            if(isset($_GET['activity'])){
                $activityName = $_GET['activity'];
            }
            $countryValue = '';
            if(isset($_GET['country'])){
                $countryValue = $_GET['country'];
            }
            $areaValue = '';
            if(isset($_GET['area'])){
                $areaValue = $_GET['area'];
            }
            ?>
            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12 col-md-3 col-sm-3 col-xs-12">
                <div class="cust-from">
                    <label for="{{trans('Contactus::contactus.commercial_stores')}}">{{trans('Contactus::contactus.commercial_stores')}}</label>
                    <div class="relative">
                        <select class="form-control" name="store_name" id="store_name" style="width:257px;">
                            <option> </option>
                            @if(isset($stores) && $stores->count())
                                @foreach($stores as $store)
                                    @if(isset($storeName))
                                        <option value="{{ $store->id }}" @if($store->id == $storeName) selected @endif>{{ $store->trans->name }}</option>
                                    @else
                                        <option value="{{ $store->id }}" >{{ $store->trans->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="cust-from">
                    <label for="{{trans('Activities::activities.activity')}}">{{trans('Activities::activities.activity')}} </label>
                    {{--<div class="cust-select relative">--}}
                    <div class="relative">
                        <select id="activity" name="activity" class="form-control">
                            <option value="">{{trans('Core::operations.select').' '.ucfirst(trans('Activities::activities.activity'))}}</option>
                            @if(isset($activities) && $activities->count())
                                @foreach($activities as $activity)
                                    @if(isset($activityName))
                                        <option value="{{ $activity->id }}" @if($activity->id == $activityName) selected @endif>{{ $activity->trans->name }}</option>
                                    @else
                                        <option value="{{ $activity->id }}" >{{ $activity->trans->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <?php
            if(\Request::segment(1) == 'en'){
                $otherLang = "ar";
            }else{
                $otherLang = "en";
            }
            ?>
            {{--{{ dd($countries[0]->trans) }}--}}
            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="cust-from">
                    <label for="sel1">Country</label>
                    <div class="relative">
                        <select id="country" name="country" class="form-control">
                            <option value="">{{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.country'))}}</option>
                            @if(isset($countries) && $countries->count())
                                @foreach($countries as $country)
                                    @if(isset($country->id))
                                        @php
                                            $otherCountry = \Innoflame\Countries\Models\CountryTrans::where(array('country_id'=>$country->id,'lang'=>$otherLang))->first();
                                        @endphp
                                    @endif
                                    @if(isset($countryValue))
                                        {{--<option value="{{ $country->id }}" @if($country->id == $countryValue) selected @endif>{{ ucwords($country->trans->name) }}</option>--}}
                                        <option value="{{ $country->id }}" @if($country->id == $countryValue) selected @endif>{{ ucwords(strtolower($country->trans->name))." ( ".$otherCountry->name ." ) ". "+".$country->trans->phone_code }}</option>
                                    @else
                                        <option value="{{ $country->id }}" >{{ ucwords(strtolower($country->trans->name))." ( ".$otherCountry->name ." ) ". "+".$country->trans->phone_code }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-2 col-md-2 col-sm-3 col-xs-12">
                <div class=" cust-from">
                    <label for="sel1">City </label>
                    <div class="relative">
                        <select id="area" name="area" class="form-control">
                            <option value="">{{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.area'))}}</option>
                            @if(isset($areas))
                                @foreach($areas as $ar)
                                    @if(isset($areaValue))
                                        <option value="{{ $ar->id }}" @if($ar->id == $areaValue) selected @endif>{{ $ar->trans->name }}</option>
                                    @endif
                                @endforeach
                                {{--@else--}}
                                {{--<option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.area'))}} -</option>--}}
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-1 col-md-1 hidden-sm col-xs-12">
                <div class="btn-search">
                    <button type="submit" class="btn btn-warning">{{ trans('project.search') }}</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="form-group col-lg-12 addshop">
			<span>
				<a href="{{ action('StoreController@addStore') }}" type="button" class="btn  btn-info"> {{ trans('project.add_store') }}</a></span> <span class="btn-mob btn-search"><a href="{{ action('StoreController@addStore') }}" type="button" class="btn  btn-warning"> {{ trans('project.search') }}</a>
			</span>
        </div>
    </div>
</div>
<script src="{{ asset('public/website_assets/js/autocomplete/chosen.jquery.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#store_name").chosen({
            search_contains: true
        });
        $("#activity").chosen({
            search_contains: true
        });
        $("#country").chosen({
            search_contains: true
        });
        $("#area").chosen({
            search_contains: true
        });
        // Load country areas
        $('#country').off().on("change", function() {
            loadCountryAreas(this.value);
        });
        var oldcountry = "{{ old('country') }}";
        if (oldcountry != '') {
            loadCountryAreas(oldcountry);
        }
    });
    function loadCountryAreas(countryId) {
        $("#area option").remove();
        $.get("{{url('/')}}/{{ Lang::getLocale() }}/country-areas/" + countryId, function(data) {
            $("#area").append($("<option></option>").attr("value", "").text("{{trans('Core::operations.select'). " ". ucfirst(trans('Countries::countries.area'))}}"));
            for (var i = 0; i < data.areas.length; i++) {
                $("#area").append($("<option></option>").attr("value", data.areas[i].id).text(data.areas[i].trans.name));
//                $("#area").chosen();
                // Check if old data equal area
                var oldArea = "{{ old('area') }}";
                if (oldArea != '') {
                    $('#area').val(oldArea);
                }
            }
            $("#area").trigger("chosen:updated");
            $("#area").chosen({
                search_contains: true
            });
        });
    }
</script>