<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <alert></alert>
     <a class="btn btn-success"  href="{{route('homes.create')}}">Add Home</a>
    <div class="py-12">

                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Price')}}</th>
                            <th>{{__('Cover Image')}}</th>
                            <th>{{__('City')}}</th>
                            <th>{{__('Desc')}}</th>
                            <th>{{__('Sales Agent Name')}}</th>
                            <th>{{__('Sales Agent Phone')}}</th>
                            <th>{{__('Link')}}</th>
                            <th>{{__('Created At')}}</th>
                            <th>{{__('Actions')}}</th>
                        </tr>
                        </thead>
                    </table>
    </div>
</x-app-layout>
