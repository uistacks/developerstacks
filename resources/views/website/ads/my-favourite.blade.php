@extends('website.master')
@section('page_title')
المفضلة
@endsection
@section('content')


<div class="adslist">
    <div class="container">
        <table class="table" dir="rtl">
            <thead>
                <tr>
                    <th> الصوره</th>  <!-- IMage -->
                    <th> اسم</th> <!--- TITle -->
                    <th>تاريخ الاعلان</th>   <!-- Posted Date-->
                    <th> وقت الاعلان</th>  <!--- Time -->
                </tr>
            </thead>
            <tbody>
                
                      @if(isset($user_fav) && count($user_fav)>0)
                    @foreach($user_fav as $key=>$value)
                <tr>
                    <td>

                             @if(isset($user_fav[$key]['thumbnail']))
                                <img src="{{url('/')}}/{{ $user_fav[$key]['thumbnail'] }}" width="100" height="100">
                                </a>     
                                @else
                                <img src="{{ asset('public/images/select_main_img.png') }}" width="100" height="100"">
                                @endif 
                                         
                    </td>
                    <td>
                        
                    <a href="<?php echo  url('/')  ?>/ar/section/{{ $user_fav[$key]['section']  }}/{{ $user_fav[$key]['ad_id'] }}">
                                            
                                            {{  $user_fav[$key]['commentUser'] }}
                                        </a> 
                    
                    
                    </td>
                    <td>
                        @if(isset($user_fav[$key]['created_at']))

                                        {{    date('Y-m-d',strtotime($user_fav[$key]['created_at']))  }}    

                                        @endif
                    </td>
                    <td>    
                    @if(isset($user_fav[$key]['created_at']))

                                        {{    date('H:i:s A',strtotime($user_fav[$key]['created_at']))  }}    

                                        @endif

                    </td>
                   
                </tr>
                
               
                @endforeach
                 
               
                
                @else
              
                <tr>
                    <td colspan="5" class="teimage">
                        <!--<img src="{{ asset('public/images/404.jpeg') }}">-->
                        <img src ="{{url('/')}}/uploads/fournotfour.jpeg">
                    </td>
            </tr>
                @endif
            </tbody>
            
        </table>
        
        @if(isset($favourite))
        {{ $favourite->links() }}
        @endif
     

    </div>
</div>
@endsection