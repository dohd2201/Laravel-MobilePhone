@php
$arr = [
"course1"=>"NodeJS",
"course2"=>"ReactJS"
];
@endphp
@foreach($arr as $key=>$value)
{!!$key."=>".$value."<br />"!!}
@endforeach

///////

@php
$i=0;
@endphp
@while($i<=9) {{$i.", "}} @php $i++ @endphp @endwhile