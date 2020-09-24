<table class="w-full bg-white" id="content">
    <tr class="table-heading shadow-lg border border-primary">
        <th class="py-5 border-r border-second">註冊日期</th>
        <th class="py-5 border-r border-second">客人資料</th>
        <th class="py-5 border-r border-second">註冊渠道</th>
        <th class="py-5 border-r border-second">查詢</th>
    </tr>
    @foreach($users as $user)
    <tr class="border-b border-third align-top">
        <td class="item-column">
            <?php
            $date = new DateTime($user->created_at);
            ?>
            <p class="mb-1">{{$date->format('H:i Y-m-d')}}</p>
            <br/>
            <p>M{{str_pad($user->id, 5, '0', STR_PAD_LEFT)}}</p>
        </td>
        <td class="item-column robert-regular">
            <div class="grid grid-cols-1 col-gap-2 mb-3">
                <div class="flex">
                    <span class="my-auto">{{$user->first_name.' '.$user->last_name}}</span>
                    <br/>
                </div>
                <div class="my-auto">
                    <span class="robert-black">D.O.B: </span>
                    <?php
                    $birthday = new DateTime($user->profile->birthday);
                    ?>
                    <span>{{$birthday->format('d M Y')}}</span>
                    <br/>
                </div>
            </div>
            <div class="grid grid-cols-2 col-gap-2 mb-3">
                <div class="flex">
                    <span class="my-auto">{{$user->phone}}</span>
                    <br/>
                </div>
                <div class="my-auto">
                    <span class="robert-black">Preferred: </span>
                    <span>Whatsapp</span>
                    <br/>
                </div>
            </div>
            <div class="grid grid-cols-2 col-gap-2 mb-3">
                <div class="flex">
                    <span class="my-auto">{{$user->email}}</span>
                    <br/>
                </div>
                <div class="my-auto">
                    <span class="robert-black">Returning: </span>
                    <span>{{$user->profile->is_soundwill_member ? 'SoundWill' : '-'}} <br />{{$user->profile->is_existing_customer ? 'OneStorage (分店)' : '-'}}</span>
                    <br/>
                </div>
            </div>
            <div class="flex">
                <span class="my-auto">{{$user->profile->address_line1}}</span>
            </div>
        </td>
        <td class="item-column align-middle text-center">
            <p class="font_19">{{$user->profile->contact_method}}</p>
        </td>
        <td class="item-column">
            <p>E00001, E00002, E00003</p>
        </td>
    </tr>
    @endforeach
</table>