<!-- Get flash message passed from session as well as return view (passed as variable) -->
@php
    $flash=Session::has('flash')?Session::get('flash'):(!empty($flash)?$flash:[]);
@endphp
@if(!empty($flash))
    <div class="alert alert-{{$flash['type']}} text-center fs-4 fw-bold">
            {{$flash['message']}}
    </div>
@endif

