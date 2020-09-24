<form method="GET" action="{{Request::url()}}" class="flex justify-end" style="height: 44px;">
    <div class="flex relative mr-8 shadow-md">
        <select name="key" id="search-field-select" class="block text-primary appearance-none w-full bg-white border-none hover:border-gray-500 px-20 leading-tight focus:outline-none focus:shadow-outline ">
            <option value="" selected class="text-grey">Search Field</option>
            @foreach($keys as $key)
            <option value="{{$key['key']}}" {{$key['key'] == (isset($_GET['key'])?$_GET['key']:'') ? 'selected' : ''}} class="text-grey-2">{{$key['value']}}</option>
            @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-primary">
            <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" style="color: #4D5567 !important" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
        </div>
    </div>
    <div class="flex relative mr-2">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x1.png')}}" alt="">
        <input class="form-control w-full shadow-md" style="color: #4D5567 !important" type="text" placeholder="" name="value" value="{{isset($_GET['value'])?$_GET['value']:''}}">
    </div>
    <a class="ml-8 text-blue-700 my-auto cursor-pointer" href="{{Request::url().'/export'}}">Export as xls</a>
</form>