@csrf
<div class="row">
    <div class="col-lg-12">
        <div class="card panel">
            <div class="card-block">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="hidden" name="id" value="{{$home->id}}">
                    <div class="form-group col-lg-4">
                        <label>{{__('Title')}}</label>
                        <input type="text" class="form-control"

                               name="title" value="{{ old('title', $home->title) }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4">
                        <label>{{__('Cover Image')}}</label>
                        <input type="file" class="form-control"
                               name="cover_image"
                               >
                        @error('cover_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <div class="form-group col-lg-4">
                            <label>{{__('Price')}}</label>
                            <input type="number" class="form-control"
                                   name="price"
                                   value="{{old('price',$home->price)}}"
                            >
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="form-group col-lg-4">
                        <label for="category_id">{{__('City')}}</label>
                        <input type="text" class="form-control"
                               name="city" value="{{ old('city', $home->city) }}"
                               required>
                        @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-lg-4">
                        <label>{{__('Desc')}}</label>
                        <input type="text" class="form-control"

                               name="desc" value="{{ old('desc', $home->desc) }}">
                        @error('desc')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label>{{__('Sales Agent Name')}}</label>
                        <input type="text" class="form-control"
                               name="sales_agent" value="{{ old('sales_agent', $home->sales_agent) }}">
                        @error('sales_agent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4">
                        <label> {{__('Sales Agent Phone')}}</label>
                        <input id="sales_agent_phone" type="text" class="form-control flatpickr"
                               name="sales_agent_phone"
                               value="{{ old('sales_agent_phone', $home->sales_agent_phone) }}">
                        @error('sales_agent_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4">
                        <label> {{__('Link')}}</label>
                        <input id="link" type="text" class="form-control flatpickr"
                               name="link"
                               value="{{ old('link', $home->link) }}">
                        @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                </div>

            </div>
        </div>
    </div>

</div>
