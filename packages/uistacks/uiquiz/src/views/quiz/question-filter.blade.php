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
              'name' => trans('Core::operations.name'),
              'value' => $nameValue,
              'placeholder' => ''
          ])

			{{-- Select Topic--}}
			@php
			$topics = \UiStacks\Uiquiz\Models\Topic::where(array('active'=>1))->get();
				$options[] = ['value' => '', 'name' => '-- '.trans('Core::operations.select').' --'];
                if(isset($topics) && $topics->count()){
                    foreach ($topics as $topic) {
                        $topicName = '';
                        if($topic->trans){
                            $topicName = $topic->trans->title;
                        }
                        $options[] = ['value' => $topic->id, 'name' => $topicName];
                    }
                }

                $topicValue = '';
                if(isset($_GET['topic'])){
                    $topicValue = $_GET['topic'];
                }
			@endphp

			@include('Core::fields.select', [
                'field_name' => 'topic',
                'name' => trans('Uiquiz::quiz.topic'),
                'options' => $options,
                'value' => $topicValue,
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
		  	<a href="{{ action('\UiStacks\Uiquiz\Controllers\QuestionsController@index')}}" class="btn btn-default">{{ trans('Core::operations.reset') }}</a>
		</form>

	</div>
</div>