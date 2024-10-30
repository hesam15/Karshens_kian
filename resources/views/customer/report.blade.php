@extends('layouts.app')

@section('title' , 'داشبورد')

@section('content')
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                کارشناسی بدنه و رنگ خودرو            
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="row col-9">
                    <p class="col"><strong>درب موتور:</strong> سالم</p>
                    <p class="col"><strong>درب صندوق:</strong> سالم</p>
                    <p class="col"><strong>گلگیر جلو راست:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>درب جلو راست:</strong> سالم</p>
                    <p class="col"><strong>درب عقب راست:</strong> سالم</p>
                    <p class="col"><strong>گلگیر عقب راست:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>گلگیر جلو چپ:</strong> سالم</p>
                    <p class="col"><strong>درب جلو چپ:</strong> سالم</p>
                    <p class="col"><strong>درب عقب چپ:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>گلگیر عقب چپ:</strong> سالم</p>
                    <p class="col"><strong>ستون‌های جانبی:</strong> سالم</p>
                    <p class="col"><strong>سقف:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>شاسی جلو:</strong> سالم</p>
                    <p class="col"><strong>سپر جلو:</strong> سالم</p>
                    <p class="col"><strong>سپر عقب:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col-4"><strong>رکاب راست:</strong> سالم</p>
                    <p class="col-4"><strong>رکاب چپ:</strong> سالم</p>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                کارشناس فنی خودرو   
            </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="row col-9">
                    <p class="col"><strong>رادیاتور:</strong> سالم</p>
                    <p class="col"><strong>باتری:</strong> سالم</p>
                    <p class="col"><strong>دسته موتور:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>روغن ریزی:</strong> سالم</p>
                    <p class="col"><strong>سطح و کیفیت روغن موتور:</strong> سالم</p>
                    <p class="col"><strong>کمپرس:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>روغن سوزی:</strong> سالم</p>
                    <p class="col"><strong>دود سیاه یا آبی:</strong> سالم</p>
                    <p class="col"><strong>سطح و کیفیت آب رادیاتور:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>صدای موتور:</strong> سالم</p>
                    <p class="col"><strong>لامپ‌های هشدار داشبورد:</strong> سالم</p>
                    <p class="col"><strong>سطح روغن ترمز:</strong> سالم</p>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                بررسی آپشن ها
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="row col-9">
                    <p class="col"><strong>ایربگ:</strong> سالم</p>
                    <p class="col"><strong>سویچ یدک:</strong> سالم</p>
                    <p class="col"><strong>چراغ روغن:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>سیستم گرمایش:</strong> سالم</p>
                    <p class="col"><strong>چراغ جلو:</strong> سالم</p>
                    <p class="col"><strong>چراغ سقف:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>چراغ دنده عقب:</strong> سالم</p>
                    <p class="col"><strong>شیشه بالابر جلو راست:</strong> سالم</p>
                    <p class="col"><strong>شیشه جلو:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>برف پاک کن جلو:</strong> سالم</p>
                    <p class="col"><strong>آیینه وسط:</strong> سالم</p>
                    <p class="col"><strong>مکانیزم آیینه چپ:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>مکانیزم صندلی راننده:</strong> سالم</p>
                    <p class="col"><strong>کنسول وسط:</strong> سالم</p>
                    <p class="col"><strong>کروز کنترل:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>درب بازکن صندوق:</strong> سالم</p>
                    <p class="col"><strong>رودری جلو راست:</strong> سالم</p>
                    <p class="col"><strong>ضبط:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>ABS:</strong> سالم</p>
                    <p class="col"><strong>کمربند:</strong> سالم</p>
                    <p class="col"><strong>چراغ ترمز دستی:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>سیستم سرمایش:</strong> سالم</p>
                    <p class="col"><strong>چراغ عقب:</strong> سالم</p>
                    <p class="col"><strong>چراغ مطالعه:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>چراغ داخل صندوق:</strong> سالم</p>
                    <p class="col"><strong>شیشه بالابر جلو چپ:</strong> سالم</p>
                    <p class="col"><strong>شیشه عقب:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>برف پاک کن عقب:</strong> سالم</p>
                    <p class="col"><strong>آیینه راست:</strong> سالم</p>
                    <p class="col"><strong>پاور ویندوز:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>مکانیزم صندلی شاگرد:</strong> سالم</p>
                    <p class="col"><strong>روکش صندلی:</strong> سالم</p>
                    <p class="col"><strong>سنسور عقب:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>درب بازکن کاپوت:</strong> سالم</p>
                    <p class="col"><strong>رودری جلو چپ:</strong> سالم</p>
                    <p class="col"><strong>باند:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>قفل مرکزی:</strong> سالم</p>
                    <p class="col"><strong>شیفتر پشت فرمان:</strong> سالم</p>
                    <p class="col"><strong>چراغ کمربند:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>تهویه دوگانه:</strong> سالم</p>
                    <p class="col"><strong>مه شکن عقب:</strong> سالم</p>
                    <p class="col"><strong>راهنمای آینه:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>راهنمای عقب:</strong> سالم</p>
                    <p class="col"><strong>شیشه بالابر عقب چپ:</strong> سالم</p>
                    <p class="col"><strong>آفتابگیر:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>شیشه شور عقب:</strong> سالم</p>
                    <p class="col"><strong>مکانیزم آیینه راست:</strong> سالم</p>
                    <p class="col"><strong>شیشه شور چراغ:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>حافظه صندلی:</strong> سالم</p>
                    <p class="col"><strong>سرد کن و گرم کن:</strong> سالم</p>
                    <p class="col"><strong>رادار:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>دستگیره درب بازکن:</strong> سالم</p>
                    <p class="col"><strong>رودری عقب چپ:</strong> سالم</p>
                    <p class="col"><strong>کف پایی عقب:</strong> سالم</p>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                دیاگ
            </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="row col-9">
                    <p class="col"><strong>کنترل موتور:</strong> سالم</p>
                    <p class="col"><strong>تجهیزات الکترونیکی:</strong> سالم</p>
                    <p class="col"><strong>سیستم پایداری الکترونیکی:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>سیستم تهویه مطبوع:</strong> سالم</p>
                    <p class="col"><strong>سیستم ABS:</strong> سالم</p>
                    <p class="col"><strong>واحد کلید هوشمند:</strong> سالم</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>تخمین کیلومتر:</strong> سالم</p>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection