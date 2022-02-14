<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Home') }}
        </h2>
    </x-slot>
    <div class="content">
        <div class="body content-nav">

            <div class="nav-body">
                <div class="nav-body-wrapper">
                    <div class="container-fluid">
                        <form action="{{route('homes.update',$home->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @include('homes._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
