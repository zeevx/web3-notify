*{{ $title }}*
======================
@foreach ($items as $key => $value)
    {{ $loop->iteration	 }}. [{{ $key }}]({{ $value }})
    =======================
@endforeach
