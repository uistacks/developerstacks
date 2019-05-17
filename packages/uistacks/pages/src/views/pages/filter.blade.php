<div class="page-filter">
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
          'name' => trans('Ads::ads.name'),
          'value' => $nameValue,
          'placeholder' => ''
      ])

		{{-- Category --}}
		@php
			$categoryValue = '';
            if(isset($_GET['category'])){
              $categoryValue = $_GET['category'];
          }
		@endphp

		@include('Core::fields.select', [
          'field_name' => 'category',
          'name' => trans('Ads::ads.category'),
          'value' => $categoryValue,
          'options' => [
                          ['value' => '', 'name' => '-- '.trans('Core::operations.select').' --'],
                          ['value' => 1, 'name' => trans('Ads::ads.ads')],
                          ['value' => 2, 'name' => trans('Ads::ads.services')]
          ]
      ])

		{{-- Section --}}
		@php
			$options[] = ['value' => '', 'name' => '-- '.trans('Core::operations.select').' --'];
            if(isset($sections) && $sections->count()){
                foreach ($sections as $section) {
                    $sectionName = '';
                    if($section->trans){
                        $sectionName = $section->trans->name;
                    }
                    $options[] = ['value' => $section->id, 'name' => $sectionName, 'dependencyValue' => $section->category];
                }
            }

            $sectionValue = '';
            if(isset($_GET['section'])){
                $sectionValue = $_GET['section'];
            }
		@endphp

		@include('Core::fields.select', [
            'field_name' => 'section',
            'name' => trans('Ads::ads.section'),
            'value' => $sectionValue,
            'dependOn' => 'category',
            'options' => $options
        ])

		&nbsp;
		&nbsp;
		&nbsp;
		&nbsp;

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

		<button type="submit" class="btn btn-primary ml-sm-2 mb-sm-0">{{ trans('Core::operations.filter') }}</button>
		<a href="{{ action('\Uistacks\Ads\Controllers\AdsController@index')}}" class="btn btn-default">{{ trans('Core::operations.reset') }}</a>
	</form>
</div>