<form class="form-login">
    <p class="text2 mb-8">給我們留言</p>
    <div class="flex mb-4 w-full">
        <div class="flex w-1/2 input-group">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
            <input class="w-full form-control" type="text" placeholder="姓">
        </div>
        <div class="w-1/2 flex input-group">
            <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名">
        </div>
    </div>
    
    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
        <input class="form-control" type="text" placeholder="">
    </div>

    <div class="w-full inline-block relative mb-6">
        <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
            <option value="" selected>分店</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    </div>

    <div class="w-full inline-block relative mb-6">
        <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
            <option value="" selected>查詢問題</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    </div>

    <input class="w-full form-control mb-6" style="padding-left:16px" type="text" placeholder="你的信息">

    <button class="submit-btn hover:bg-purple-400">
        送出
    </button>
</form>