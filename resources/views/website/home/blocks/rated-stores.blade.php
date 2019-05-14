@if($ratedStores->count() > 0)
    @foreach($ratedStores as $key1 => $item3)
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="thumbnail result-info">
                <h3>
                    <a href="{{ action('SearchController@storeDetail', $item3->id) }}">
                        @if($item3->trans)
                            {{ $item3->trans->name }}
                        @endif
                    </a>
                </h3>
                <div class="caption">
                    <h4>
                        @if($item3->activity)
                            {{ $item3->activity->trans->name }}
                        @endif
                    </h4>
                    <ul>
                        <li> <i class="fa fa-globe" aria-hidden="true"></i><span>{{isset($item3) ? substr($item3->trans->location,0,25).'..' : ""}}</span></li>
                        <li>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span>
                                                            @if(isset($item3))
                                    {{ ($item3->view_count > 0) ? $item3->view_count : "0" }}
                                @endif views
                                                        </span>
                        </li>
                        <li>
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <span>
                                                            @if(isset($item3))
                                    {{ ($item3->search_count > 0) ? $item3->search_count : "0" }}
                                @endif search
                                                        </span>
                        </li>
                    </ul>
                </div>
                <a href="{{ isset($item3->trans) ? $item3->trans->instagram_media : "" }}" target="_blank">
                    <div class="insta-link"> <i class="fa fa-instagram" aria-hidden="true"></i> </div>
                </a>
            </div>
        </div>
    @endforeach
@endif