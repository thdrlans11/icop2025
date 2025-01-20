
            <div class="abstract-conbox">
                <div class="abs-success-conbox">
                    <img src="/assets/image/sub/ic_abst_complete.png" alt="">
                    <strong class="tit">Your abstract has been successfully submitted!</strong>
                    <strong class="highlights text-skyblue3">Abstract Submission No. : {{ $apply->rnum }}</strong>
                    <ul class="list-type list-type-dot">
                        <li>Your abstract has been successfully submitted.</li>
                        <li>
                            To review and make modification, please visit ‘My Page’ on the congress website. <br>
                            After <strong class="text-red">March 31 (Mon), 2025</strong> (Abstract Submission Deadline), you will no longer be able to modify your submitted abstract.
                        </li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="{{ route('abstract.registration', ['step'=>'1']) }}" class="btn btn-type1 color-type7">Submit another abstract</a>
                        <a href="{{ route('registration.guide') }}" class="btn btn-type1 color-type1">Go to Registration</a>
                        <a href="{{ route('abstract.registration.search') }}" class="btn btn-type1 color-gra1">Abstract Review & Modification</a>
                    </div>
                </div>
            </div>
       