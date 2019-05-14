<div class="panel panel-default panel-filter">
	<div class="panel-footer">

        <form action="" method="GET" class="form-inline">
        	{{-- name --}}
        	@php
		  		$nameValue = '';
		  		if(isset($_GET['name'])){
            		$nameValue = $_GET['name'];
            	}
		  	@endphp

		  	@include('Core::fields.input_text', [
                'field_name' => 'name',
                'name' => 'City',
                'value' => $nameValue,
                'placeholder' => ''
            ])

            @php
                $options[] = ['value' => '', 'name' => '-- '.trans('Core::operations.select').' --'];
                if(isset($countries) && $countries->count()){
                    foreach ($countries as $country) {
                        $countryName = '';
                        if($country->trans){
                            $countryName = $country->trans->name;
                        }
                        $options[] = ['value' => $country->id, 'name' => $countryName];
                    }
                }

                $countryValue = '';
                if(isset($_GET['country'])){
                    $countryValue = $_GET['country'];
                }
            @endphp

            @include('Core::fields.select', [
                'field_name' => 'country',
                'name' => 'Country',
                'options' => $options,
                'value' => $countryValue,
            ])

            {{-- Select --}}
            @php
            	$statusValue = '';
            	if(isset($_GET['status'])){
            		$statusValue = $_GET['status'];
            	}
            @endphp

            @include('Core::fields.select', [
                'field_name' => 'status',
                'name' => trans('Core::operations.status'),
                'value' => $statusValue,
                'options' => [
                				['value' => '', 'name' => '-- '.trans('Core::operations.select').' --'],
                                ['value' => 1, 'name' => trans('Core::operations.active')],
                                ['value' => 2, 'name' => trans('Core::operations.inactive')]
                ]
            ])

		  	<button type="submit" class="btn btn-default">{{ trans('Core::operations.filter') }}</button>
		  	<a href="{{ action('\Uistacks\Locations\Controllers\CitiesController@index')}}" class="btn btn-default">{{ trans('Core::operations.reset') }}</a>
		</form>

	</div>
</div>