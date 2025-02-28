
<ul class="write-wrap">
    <li>
        <div class="form-tit">Registration No.</div>
        <div class="form-con">
            @if( $apply->payStatus == 'N' )
            <span class="text-red">Your registration no. will be given after your payment is completed. </span>
            @else
            {{ $apply->rnum }}
            @endif
            
        </div>
    </li>
    <li>
        <div class="form-tit">Registration Date</div>
        <div class="form-con">
            {{ $apply->complete_at }}
        </div>
    </li>
    <li>
        <div class="form-tit">Country</div>
        <div class="form-con">
            {{ $apply->country->cn }}
        </div>
    </li>
    <li>
        <div class="form-tit">E-mail</div>
        <div class="form-con">
            {{ $apply->email }}
        </div>
    </li>
    <li>
        <div class="form-tit">Title</div>
        <div class="form-con">
            {{ $apply->makeTitle() }}
        </div>
    </li>
    <li>
        <div class="form-tit">Degree</div>
        <div class="form-con">
            {{ config('site.registration.degree')[$apply->degree] }}
        </div>
    </li>
    <li>
        <div class="form-tit">Name</div>
        <div class="form-con">
            {{ $apply->firstName.' '.$apply->lastName }}
        </div>
    </li>
    
    <!-- Country > Korea, Repulic of 선택 시 노출-->
    @if( $apply->ccode == 'KR' )
    <li>
        <div class="form-tit">국문 성명</div>
        <div class="form-con">
            {{ $apply->name }}
        </div>
    </li>
    @endif

    <li>
        <div class="form-tit">Department</div>
        <div class="form-con">
            {{ $apply->department }}
        </div>
    </li>
    <li>
        <div class="form-tit">Affiliation</div>
        <div class="form-con">
            {{ $apply->affiliation }}
        </div>
    </li>
    <li>
        <div class="form-tit">Phone Number</div>
        <div class="form-con">
            +{{ $apply->cnum.' '.$apply->mobile }}
        </div>
    </li>
    <li>
        <div class="form-tit">Category</div>
        <div class="form-con">
            {{ $apply->category ? config('site.registration.category')[$apply->category] : '' }}
        </div>
    </li>
    <li>
        <div class="form-tit">Attendance Type</div>
        <div class="form-con">
            {{ $apply->attendType ? config('site.registration.attendType')[$apply->attendType] : '' }}
        </div>
    </li>
    @if( $apply->attendType == 'O' )
    <li>
        <div class="form-tit">Which date you want to register?</div>
        <div class="form-con">
            {{ $apply->getOneDay('value') }}
        </div>
    </li>
    @endif
    <li>
        <div class="form-tit">Accompanying Person</div>
        <div class="form-con">
            {!! $apply->accompanying ? $apply->accompanying == 'N' ? config('site.registration.accompanying')[$apply->accompanying] : $apply->makeTotalText('accompanying') : '' !!}
        </div>
    </li>
    <li>
        <div class="form-tit">Banquet</div>
        <div class="form-con">
            {!! $apply->banquet ? $apply->banquet == 'N' ? config('site.registration.banquet')[$apply->banquet] : $apply->makeTotalText('banquet') : '' !!}
        </div>
    </li>
    <li>
        <div class="form-tit">Field Trip</div>
        <div class="form-con">
            {!! $apply->tour ? $apply->tour == 'N' ? config('site.registration.tour')[$apply->tour] : $apply->makeTotalText('tour') : '' !!}
        </div>
    </li>
    @if( $apply->category == 'B' )
    <li>
        <div class="form-tit">File upload</div>
        <div class="form-con">
            {{ $apply->filename }}
        </div>
    </li>
    @endif
    <li>
        <div class="form-tit">Total Amount</div>
        <div class="form-con">
            {!! $apply->makeTotalText() !!}
        </div>
    </li>
    <li>
        <div class="form-tit">Payment method</div>
        <div class="form-con">
            {{ $apply->payMethod ? config('site.registration.payMethod')[$apply->payMethod] : '' }}
        </div>
    </li>
    <li>
        <div class="form-tit">Payment Status</div>
        <div class="form-con">
            <span class="text-{{ $apply->payStatus == 'N' ? 'red' : 'blue' }}">{{ config('site.registration.payStatus')[$apply->payStatus] }}</span>
        </div>
    </li>
</ul>
<div class="help-text state-info mt-20">
    <strong class="text-red">* Payment Status</strong>
    <ul>
        <li><span class="text-red">Payment is needed : </span>Your payment is not completed.</li>
        <li><span class="text-blue">Complete : </span>Your payment is completed.</li>
    </ul>
</div>

<!-- Bank Trasfer 선택 / Country > Korea, Republic of 선택 시 노출 -->
@if( $apply->payMethod == 'B' )
<ul class="write-wrap">
    <li class="n2">
        <div class="form-tit">Registrant’s Name & Affiliation <strong class="required">*</strong></div>
        <div class="form-con">
            {{ $apply->payName }}
        </div>
        <div class="form-tit">Eexpected Remittance Date <strong class="required">*</strong></div>
        <div class="form-con">
            {{ $apply->payDate }}
        </div>
    </li>
</ul>
@endif