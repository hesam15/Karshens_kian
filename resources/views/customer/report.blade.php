@extends('layouts.app')

@section('title' , 'داشبورد')

@section('content')
<td><a class="btn btn-info" href="{{route("report.form" , ['carId' => $car->id])}}">ادیت گزارش</a></td>
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
                    <p class="col"><strong>درب موتور:</strong> {{$body->engine_door}}</p>
                    <p class="col"><strong>درب صندوق:</strong> {{$body->box_door}}</p>
                    <p class="col"><strong>گلگیر جلو راست:</strong> {{$body->right_front_fender}}</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>درب جلو راست:</strong> {{$body->right_front_door}}</p>
                    <p class="col"><strong>درب عقب راست:</strong> {{$body->right_rear_door}}</p>
                    <p class="col"><strong>گلگیر عقب راست:</strong> {{$body->right_rear_fender}}</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>گلگیر جلو چپ:</strong> {{$body->left_front_fender}}</p>
                    <p class="col"><strong>درب جلو چپ:</strong> {{$body->left_front_door}}</p>
                    <p class="col"><strong>درب عقب چپ:</strong> {{$body->left_rear_door}}</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>گلگیر عقب چپ:</strong> {{$body->left_rear_fender}}</p>
                    <p class="col"><strong>ستون‌های جانبی:</strong> {{$body->side_columns}}</p>
                    <p class="col"><strong>سقف:</strong> {{$body->ceiling}}</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>شاسی جلو:</strong> {{$body->front_chassis}}</p>
                    <p class="col"><strong>سپر جلو:</strong> {{$body->front_bumper}}</p>
                    <p class="col"><strong>سپر عقب:</strong> {{$body->rear_bumper}}</p>
                </div>
                <div class="row col-9">
                    <p class="col-4"><strong>رکاب راست:</strong> {{$body->right_sirrup}}</p>
                    <p class="col-4"><strong>رکاب چپ:</strong> {{$body->left_sirrup}}</p>
                </div>
            </div>            
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                کارشناسی فنی خودرو
            </button>
        </h2>
        <div id="flush-collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="row col-9">
                    <p class="col"><strong>رادیاتور:</strong> {{$technical_check->radiator}}</p>
                    <p class="col"><strong>باتری:</strong> {{$technical_check->battery}}</p>
                    <p class="col"><strong>دسته موتور:</strong> {{$technical_check->motor_mount}}</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>روغن ریزی:</strong> {{$technical_check->oil_leak}}</p>
                    <p class="col"><strong>سطح و کیفیت روغن موتور:</strong> {{$technical_check->oil_level_quality}}</p>
                    <p class="col"><strong>کمپرس:</strong> {{$technical_check->compression}}</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>روغن سوزی:</strong> {{$technical_check->oil_consumption}}</p>
                    <p class="col"><strong>دود سیاه یا آبی:</strong> {{$technical_check->black_blue_smoke}}</p>
                    <p class="col"><strong>سطح و کیفیت آب رادیاتور:</strong> {{$technical_check->radiator_water_level_quality}}</p>
                </div>
                <div class="row col-9">
                    <p class="col"><strong>صدای موتور:</strong> {{$technical_check->engin_sound}}</p>
                    <p class="col"><strong>لامپ‌های هشدار داشبورد:</strong> {{$technical_check->dashboard_warning_lights}}</p>
                    <p class="col"><strong>سطح روغن ترمز:</strong> {{$technical_check->brake_oil_level}}</p>
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
                    <p class="col"><strong>ایربگ:</strong> {{$options->airbag}}</p>
                    <p class="col"><strong>سویچ یدک:</strong> {{$options->spare_key}}</p>
                    <p class="col"><strong>چراغ روغن:</strong> {{$options->oil_light}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>سیستم گرمایش:</strong> {{$options->heating_system}}</p>
                    <p class="col"><strong>چراغ جلو:</strong> {{$options->headlight}}</p>
                    <p class="col"><strong>چراغ سقف:</strong> {{$options->ceiling_light}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>چراغ دنده عقب:</strong> {{$options->reverse_light}}</p>
                    <p class="col"><strong>شیشه بالابر جلو راست:</strong> {{$options->front_right_window}}</p>
                    <p class="col"><strong>شیشه جلو:</strong> {{$options->front_left_window}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>برف پاک کن جلو:</strong> {{$options->front_wiper}}</p>
                    <p class="col"><strong>آیینه وسط:</strong> {{$options->center_mirror}}</p>
                    <p class="col"><strong>مکانیزم آیینه چپ:</strong> {{$options->left_mirror_mechanism}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>مکانیزم صندلی راننده:</strong> {{$options->driver_seat_mechanism}}</p>
                    <p class="col"><strong>کنسول وسط:</strong> {{$options->stereo}}</p>
                    <p class="col"><strong>کروز کنترل:</strong> {{$options->cruise_control}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>درب بازکن صندوق:</strong> {{$options->trunk_opener}}</p>
                    <p class="col"><strong>رودری جلو راست:</strong> {{$options->front_right_door_panel}}</p>
                    <p class="col"><strong>ضبط:</strong> {{$options->stereo}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>ABS:</strong> {{$options->ABS}}</p>
                    <p class="col"><strong>کمربند:</strong> {{$options->safety_belt}}</p>
                    <p class="col"><strong>چراغ ترمز دستی:</strong> {{$options->handbrake_light}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>سیستم سرمایش:</strong> {{$options->cooling_system}}</p>
                    <p class="col"><strong>چراغ عقب:</strong> {{$options->rear_light}}</p>
                    <p class="col"><strong>چراغ مطالعه:</strong> {{$options->reading_light}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>چراغ داخل صندوق:</strong> {{$options->trunk_light}}</p>
                    <p class="col"><strong>شیشه بالابر جلو چپ:</strong> {{$options->front_left_window}}</p>
                    <p class="col"><strong>شیشه عقب:</strong> {{$options->rear_glass}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>برف پاک کن عقب:</strong> {{$options->rear_wiper}}</p>
                    <p class="col"><strong>آیینه راست:</strong> {{$options->right_mirror_mechanism}}</p>
                    <p class="col"><strong>پاور ویندوز:</strong> {{$options->power_windows}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>مکانیزم صندلی شاگرد:</strong> {{$options->passenger_seat_mechanism}}</p>
                    <p class="col"><strong>روکش صندلی:</strong> {{$options->seat_cover}}</p>
                    <p class="col"><strong>سنسور عقب:</strong> {{$options->radar}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>درب بازکن کاپوت:</strong> {{$options->hood_opener}}</p>
                    <p class="col"><strong>رودری جلو چپ:</strong> {{$options->front_left_door_panel}}</p>
                    <p class="col"><strong>باند:</strong> {{$options->speaker}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>قفل مرکزی:</strong> {{$options->central_locking}}</p>
                    <p class="col"><strong>شیفتر پشت فرمان:</strong> {{$options->steering_wheel_shifter}}</p>
                    <p class="col"><strong>چراغ کمربند:</strong> {{$options->safety_belt_light}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>تهویه دوگانه:</strong> {{$options->cooler_heater}}</p>
                    <p class="col"><strong>مه شکن عقب:</strong> {{$options->rear_indicator}}</p>
                    <p class="col"><strong>راهنمای آینه:</strong> {{$options->mirror_indicator}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>راهنمای عقب:</strong> {{$options->rear_indicator}}</p>
                    <p class="col"><strong>شیشه بالابر عقب چپ:</strong> {{$options->rear_left_door_panel}}</p>
                    <p class="col"><strong>کف پایی عقب:</strong> {{$options->floor_mats}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>شیشه شور عقب:</strong> {{$options->rear_wiper}}</p>
                    <p class="col"><strong>مکانیزم آیینه راست:</strong> {{$options->right_mirror_mechanism}}</p>
                    <p class="col"><strong>رودری عقب چپ:</strong> {{$options->rear_left_door_panel}}</p>

                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>حافظه صندلی:</strong> {{$options->seat_memory}}</p>
                    <p class="col"><strong>سرد کن و گرم کن:</strong> {{$options->cooler_heater}}</p>
                    <p class="col"><strong>رادار:</strong> {{$options->radar}}</p>
                </div>
        
                <div class="row col-9">
                    <p class="col"><strong>دستگیره درب بازکن:</strong> {{$options->door_handle_opener}}</p>
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
                    <p class="col"><strong>کنترل موتور:</strong> {{$diag->engine_control}}</p>
                    <p class="col"><strong>تجهیزات الکترونیکی:</strong> {{$diag->electronic_equipment}}</p>
                    <p class="col"><strong>سیستم پایداری الکترونیکی:</strong> {{$diag->electronic_stability_system}}</p>
                </div>
                
                <div class="row col-9">
                    <p class="col"><strong>سیستم تهویه مطبوع:</strong> {{$diag->air_conditioning_system}}</p>
                    <p class="col"><strong>سیستم ABS:</strong> {{$diag->ABS_system}}</p>
                    <p class="col"><strong>واحد کلید هوشمند:</strong> {{$diag->smart_key_unit}}</p>
                </div>
                
                <div class="row col-9">
                    <p class="col"><strong>کیلومتر شمار:</strong> {{$diag->odometer}}</p>
                </div>                
            </div>
        </div>
    </div>
</div>

<a href="{{route("download.pdf")}}">download PDF</a>

{{-- {{
            dd($pdfBody);
            $pdf = Pdf::loadView('dashboard', $pdfBody);
            return $pdf->download();
}} --}}
@endsection