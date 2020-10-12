@extends('layouts.app')

@section('title')
<title>{{__('迷你倉 | 免頁聲明 | 至尊迷你倉 One Storage')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div class="bg-white">
    <div class="px-4 mx-auto">
        <!-- <p class="heading-font">免責聲明</p> -->
        <p class=" text-center fontsize-21 py-6 regular-color px-5">免責聲明</p>


        <div class="flex bg-grey p-8 mb-8">
            <p class="font_14 leading-relaxed">
                本網頁所載的資料是以"實際可行的範圍"及"實際可用的範圍"免費提供並只供參考。至尊迷你倉明確卸棄任何因本網頁所提供的資料或服務，或因接觸或獲得該等資料或服務，或因使用本網頁而獲得的結果而衍生的任何形式的陳述、保證或責任，包括但不限於任何對該等資料的合法性、有效性、準確性、足夠性或可被執行性的保證。
                <br/><br/>
                在法律許可下，至尊迷你倉卸棄一切因使用或依賴本網頁所提供的資料而引致的任何直接、間接、附帶、有關連或相應而生的損失、損害賠償、費用、申索或要求的所有責任。
                <br/><br/>
                使用者明白並同意使用者須自行判斷應否使用或倚賴該等資料並自負風險，同時使用者在任何交易作出決定前應考慮從其他獨立資源核實該等資料並尋求獨立意見。
                <br/><br/>
                使用者須確認及接納任何由於使用或瀏覽本網頁下載或向本網頁提取的資料自承風險。使用者須獨自承擔因於本網頁下載任何資料而導致對使用者電腦系統的任何破壞或資料的流失所帶來的損失。
                <br/><br/>
                如閣下通過電郵cs@onestorage.com.hk查詢本公司資料，本公司有權因應閣下的電郵以正常形式作出宣傳或發佈資料。
            </p>


        </div>


    </div>
</div>


@endsection

@section('footer')
@include('layouts.footer')
@endsection
