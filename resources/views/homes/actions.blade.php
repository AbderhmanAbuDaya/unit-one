<div class="">
    <a   class="btn btn-success" href="{{route('homes.edit',$home->id)}}"  >{{__('Edit')}}</a>
    <form  method="post"  action="{{route('homes.destroy',$home->id)}}" class="d-inline" id="deleteForm">
        @csrf
        @method('delete')
    <button type="submit"  class="btn btn-danger" >{{__('Delete')}}</button>
    </form>
    @if($home->deleted_at!=null)
        <form action="{{ route('homes.restore') }}" method="post" class=" d-inline">
            @csrf
            @method('put')
    <button type="submit"  class="btn btn-primary" href="{{route('homes.edit',$home->id)}}">{{__('ReStore')}}</button>
        </form>
    @endif
</div>
