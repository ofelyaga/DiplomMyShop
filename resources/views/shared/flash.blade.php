@if(!is_null($message=Session::flash('message')?->get()))
    <div class="{{$message->class()}} p-5">
        {{$message->message()}}
    </div>
@endif
