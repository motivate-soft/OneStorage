<div class="font_13">
    <div class="footer-accordion relative appearance-none items-center">
        <div class="flex">
            <img class="mr-4" src="{{asset('images/footer/Group 22.png')}}" />
            <span class="self-center text-primary">{{$location['name']}}</span>
        </div>
    </div>
    <div class="footer-panel">
        @foreach($location['items'] as $item)
        <div class="flex mb-2">
            <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
            <div class="leading-5 ">
                <p class="">電話 : <span>{{$item['phone']}}</span></p>
                <a href="{{'http://maps.google.com/?q='.$item['address']}}" target="_blank" rel="noopener noreferrer">
                    地址 : {{$item['address']}}
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
