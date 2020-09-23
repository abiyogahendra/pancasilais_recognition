@extends('template')

@section('main')
<?php
$no = 1;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
          <div class="card-header ">
            <h5 class="card-title">API Documentation</h5>

          </div>
          <div class="card-body ">
            <div class="form-group">
                <label>Request</label>
                <input type="text" class="form-control" value="POST api/detection/manual" disabled/>
            </div>
            <div class="form-group">
                <label>Parameter</label>
                <input type="text" class="form-control" value="username" disabled/>
            </div>
            <div class="form-group">
                <label>Response</label>
                <textarea class="form-control" disabled>
                [{"tweet":"@purnamanama24 Mantap kak thread nya... Udah aku like dan
RT","class":"negative","classification":0.9750090899669696664631146632018499076366424560546875},{"tweet":"RT
@purnamanama24: [A Thread]\nDo you realize?\nWhen you look out for other person's life,\nOther person's look out for
your life
too.","class":"negative","classification":0.61783278210096381766192052964470349252223968505859375},{"tweet":"Alan Turing
adalah ahli matematika dan saintis hebat, pelopor pembuat komputer. \n\nSejarawan militer menyebutnya seb\u2026
https:\/\/t.co\/alsgpHKMUD","class":"positive","classification":0.97490838202553897762214774047606624662876129150390625},{"tweet":"Kalau
tidak ada Alan Turing, probabilitasnya mendekati 100% kita tidak ngetwit sekarang ini. Kita bisa ngetwit kare\u2026
https:\/\/t.co\/BeCCxjg8xT","class":"positive","classification":0.8942625205513616837293966455035842955112457275390625},{"tweet":"Sampai
2014 tidak banyak yg tahu Alan Mathison Turing, sampai akhirnya ada film Imitation game, barulah banyak ora\u2026
https:\/\/t.co\/jyEjW6i5mW","class":"positive","classification":0.9622953373711651270383526934892870485782623291015625},{"tweet":"Paper
legendaris Alan Turing yang menjadi cikal bakal dunia Maya saat ini, dan teorinya tentang Artificial intellig\u2026
https:\/\/t.co\/gShimL0reW","class":"positive","classification":0.9891832164111045155863166655763052403926849365234375},{"tweet":"RT
@WHO: Lack of support for people with #depression or #MentalHealth conditions, coupled with a fear of stigma, prevent
access to
treatmen\u2026","class":"positive","classification":0.9732302427585419746236539140227250754833221435546875},{"tweet":"RT
@WHO: Feeling lonely and depressed at times of the #NewYear? Talk to someone you trust and seek help.\n\n#Depression is
the leading
cause\u2026","class":"positive","classification":0.70908984249902662355680149630643427371978759765625},{"tweet":"RT
@indrawhan: 2020 Wish\n\n\u2022 Sehat\n\u2022 Glowing\n\u2022 Candu ibadah\n\u2022 Stop insecure\n\u2022 Stop gak
enakan\n\u2022 Stop overthinking\n\u2022 Stop jadi pemalas\n\u2022
Puny\u2026","class":"positive","classification":0.7685703042429736786544935966958291828632354736328125},{"tweet":"RT
@msninx_: 2020 wish list ;\n\n1) 8-9 hours of sleep\n2) Good grades\n3) Healthy lifestyle\n4) Positive
mindset","class":"positive","classification":0.8958841574414435626749764196574687957763671875}]
                </textarea>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              
            </div>
          </div>
        </div>
    </div>
</div>
@stop