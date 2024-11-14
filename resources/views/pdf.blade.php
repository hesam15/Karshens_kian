<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/pdf.css')}}">
</head>
<body class="border p-1">
    <h1 class="text-center">کارشناس کیان</h1>
    <h2>گزارش کارشناسی خودرو</h2>
    <table>
        <tr>
            <td colspan="2"><strong>نام مشتری:</strong> {{ $customer->name}}</td>
            <td colspan="2"><strong>مدل خودرو:</strong> {{ $car->name }}</td>
            <td colspan="2"><strong>تاریخ گزارش:</strong> {{ $date[0] }}</td>
        </tr>
    </table>
    <h3>کارشناسی بدنه و رنگ خودرو</h3>
    <table>
        <tr>
            <td><strong>محافظ رنگ:</strong> {{ $vip_services->upgrade->paint_protection }}</td>
            <td><strong>صافکاری:</strong> {{ $vip_services->upgrade->approved_bodywork }}</td>
            <td><strong>نقاشی:</strong> {{ $vip_services->upgrade->approved_painting }}</td>
            <td><strong>رکاب چپ:</strong> {{ $body->left_sirrup }}</td>
        </tr>
        <tr>
            <td><strong>درب موتور:</strong> {{ $body->engine_door }}</td>
            <td><strong>درب صندوق:</strong> {{ $body->box_door }}</td>
            <td><strong>گلگیر جلو راست:</strong> {{ $body->right_front_fender }}</td>
            <td><strong>درب جلو راست:</strong> {{ $body->right_front_door }}</td>
        </tr>
        <tr>
            <td><strong>درب عقب راست:</strong> {{ $body->right_rear_door }}</td>
            <td><strong>گلگیر عقب راست:</strong> {{ $body->right_rear_fender }}</td>
            <td><strong>گلگیر جلو چپ:</strong> {{ $body->left_front_fender }}</td>
            <td><strong>درب جلو چپ:</strong> {{ $body->left_front_door }}</td>
        </tr>
        <tr>
            <td><strong>درب عقب چپ:</strong> {{ $body->left_rear_door }}</td>
            <td><strong>گلگیر عقب چپ:</strong> {{ $body->left_rear_fender }}</td>
            <td><strong>ستون‌های جانبی:</strong> {{ $body->side_columns }}</td>
            <td><strong>سقف:</strong> {{ $body->ceiling }}</td>
        </tr>
        <tr>
            <td><strong>شاسی جلو:</strong> {{ $body->front_chassis }}</td>
            <td><strong>سپر جلو:</strong> {{ $body->front_bumper }}</td>
            <td><strong>سپر عقب:</strong> {{ $body->rear_bumper }}</td>
            <td><strong>رکاب راست:</strong> {{ $body->right_sirrup }}</td>
        </tr>
    </table>

    <h3>کارشناسی فنی خودرو</h3>
    <table>
        <tr>
            <td><strong>رادیاتور:</strong> {{$technical_check->radiator}}</td>
            <td><strong>باتری:</strong> {{$technical_check->battery}}</td>
            <td><strong>دسته موتور:</strong> {{$technical_check->motor_mount}}</td>
            <td><strong>روغن ریزی:</strong> {{$technical_check->oil_leak}}</td>
        </tr>
        <tr>
            <td><strong>سطح و کیفیت روغن موتور:</strong> {{$technical_check->oil_level_quality}}</td>
            <td><strong>کمپرس:</strong> {{$technical_check->compression}}</td>
            <td><strong>روغن سوزی:</strong> {{$technical_check->oil_consumption}}</td>
            <td><strong>دود سیاه یا آبی:</strong> {{$technical_check->black_blue_smoke}}</td>
        </tr>
        <tr>
            <td><strong>سطح و کیفیت آب رادیاتور:</strong> {{$technical_check->radiator_water_level_quality}}</td>
            <td><strong>صدای موتور:</strong> {{$technical_check->engin_sound}}</td>
            <td><strong>لامپ‌های هشدار داشبورد:</strong> {{$technical_check->dashboard_warning_lights}}</td>
            <td><strong>سطح روغن ترمز:</strong> {{$technical_check->brake_oil_level}}</td>
        </tr>
    </table> 
    
    <h3>بررسی آپشن ها</h3>
    <table>
        <tr>
            <td><strong>ایربگ:</strong> {{$options->airbag}}</td>
            <td><strong>سویچ یدک:</strong> {{$options->spare_key}}</td>
            <td><strong>چراغ روغن:</strong> {{$options->oil_light}}</td>
            <td><strong>سیستم گرمایش:</strong> {{$options->heating_system}}</td>
        </tr>
        <tr>
            <td><strong>چراغ جلو:</strong> {{$options->headlight}}</td>
            <td><strong>چراغ سقف:</strong> {{$options->ceiling_light}}</td>
            <td><strong>چراغ دنده عقب:</strong> {{$options->reverse_light}}</td>
            <td><strong>شیشه بالابر جلو راست:</strong> {{$options->front_right_window}}</td>
        </tr>
        <tr>
            <td><strong>شیشه جلو:</strong> {{$options->front_left_window}}</td>
            <td><strong>برف پاک کن جلو:</strong> {{$options->front_wiper}}</td>
            <td><strong>آیینه وسط:</strong> {{$options->center_mirror}}</td>
            <td><strong>مکانیزم آیینه چپ:</strong> {{$options->left_mirror_mechanism}}</td>
        </tr>
        <tr>
            <td><strong>مکانیزم صندلی راننده:</strong> {{$options->driver_seat_mechanism}}</td>
            <td><strong>کنسول وسط:</strong> {{$options->stereo}}</td>
            <td><strong>کروز کنترل:</strong> {{$options->cruise_control}}</td>
            <td><strong>درب بازکن صندوق:</strong> {{$options->trunk_opener}}</td>
        </tr>
        <tr>
            <td><strong>رودری جلو راست:</strong> {{$options->front_right_door_panel}}</td>
            <td><strong>ضبط:</strong> {{$options->stereo}}</td>
            <td><strong>ABS:</strong> {{$options->ABS}}</td>
            <td><strong>کمربند:</strong> {{$options->safety_belt}}</td>
        </tr>
        <tr>
            <td><strong>چراغ ترمز دستی:</strong> {{$options->handbrake_light}}</td>
            <td><strong>سیستم سرمایش:</strong> {{$options->cooling_system}}</td>
            <td><strong>چراغ عقب:</strong> {{$options->rear_light}}</td>
            <td><strong>چراغ مطالعه:</strong> {{$options->reading_light}}</td>
        </tr>
        <tr>
            <td><strong>چراغ داخل صندوق:</strong> {{$options->trunk_light}}</td>
            <td><strong>شیشه بالابر جلو چپ:</strong> {{$options->front_left_window}}</td>
            <td><strong>شیشه عقب:</strong> {{$options->rear_glass}}</td>
            <td><strong>برف پاک کن عقب:</strong> {{$options->rear_wiper}}</td>
        </tr>
        <tr>
            <td><strong>آیینه راست:</strong> {{$options->right_mirror_mechanism}}</td>
            <td><strong>پاور ویندوز:</strong> {{$options->power_windows}}</td>
            <td><strong>مکانیزم صندلی شاگرد:</strong> {{$options->passenger_seat_mechanism}}</td>
            <td><strong>روکش صندلی:</strong> {{$options->seat_cover}}</td>
        </tr>
        <tr>
            <td><strong>سنسور عقب:</strong> {{$options->radar}}</td>
            <td><strong>درب بازکن کاپوت:</strong> {{$options->hood_opener}}</td>
            <td><strong>رودری جلو چپ:</strong> {{$options->front_left_door_panel}}</td>
            <td><strong>باند:</strong> {{$options->speaker}}</td>
        </tr>
        <tr>
            <td><strong>قفل مرکزی:</strong> {{$options->central_locking}}</td>
            <td><strong>شیفتر پشت فرمان:</strong> {{$options->steering_wheel_shifter}}</td>
            <td><strong>چراغ کمربند:</strong> {{$options->safety_belt_light}}</td>
            <td><strong>تهویه دوگانه:</strong> {{$options->cooler_heater}}</td>
        </tr>
        <tr>
            <td><strong>مه شکن عقب:</strong> {{$options->rear_indicator}}</td>
            <td><strong>راهنمای آینه:</strong> {{$options->mirror_indicator}}</td>
            <td><strong>راهنمای عقب:</strong> {{$options->rear_indicator}}</td>
            <td><strong>شیشه بالابر عقب چپ:</strong> {{$options->rear_left_door_panel}}</td>
        </tr>
        <tr>
            <td><strong>کف پایی عقب:</strong> {{$options->floor_mats}}</td>
            <td><strong>شیشه شور عقب:</strong> {{$options->rear_wiper}}</td>
            <td><strong>مکانیزم آیینه راست:</strong> {{$options->right_mirror_mechanism}}</td>
            <td><strong>رودری عقب چپ:</strong> {{$options->rear_left_door_panel}}</td>
        </tr>
        <tr>
            <td><strong>حافظه صندلی:</strong> {{$options->seat_memory}}</td>
            <td><strong>سرد کن و گرم کن:</strong> {{$options->cooler_heater}}</td>
            <td><strong>رادار:</strong> {{$options->radar}}</td>
            <td><strong>دستگیره درب بازکن:</strong> {{$options->door_handle_opener}}</td>
        </tr>
    </table>    

    <h3>دیاگ</h3>
    <table>
        <tr>
            <td><strong>کنترل موتور:</strong> {{$diag->engine_control}}</td>
            <td><strong>تجهیزات الکترونیکی:</strong> {{$diag->electronic_equipment}}</td>
            <td><strong>سیستم پایداری الکترونیکی:</strong> {{$diag->electronic_stability_system}}</td>
            <td><strong>سیستم تهویه مطبوع:</strong> {{$diag->air_conditioning_system}}</td>
        </tr>
        <tr>
            <td><strong>سیستم ABS:</strong> {{$diag->ABS_system}}</td>
            <td><strong>واحد کلید هوشمند:</strong> {{$diag->smart_key_unit}}</td>
            <td><strong>کیلومتر شمار:</strong> {{$diag->odometer}}</td>
            <td></td>
        </tr>
    </table>

    <h3>تست رانندگی</h3>
    <table>
        <tr>
            <td><strong>استارت خودرو:</strong> {{$vip_services->driving_test->car_start}}</td>
            <td><strong>پلوس‌ها:</strong> {{$vip_services->driving_test->cv_joints}}</td>
            <td><strong>کمک‌فنرها:</strong> {{$vip_services->driving_test->shocks}}</td>
            <td><strong>صدای کابین:</strong> {{$vip_services->driving_test->cabin_noise}}</td>
        </tr>
        <tr>
            <td><strong>لرزش موتور:</strong> {{$vip_services->driving_test->engine_vibration}}</td>
            <td><strong>سیستم فرمان:</strong> {{$vip_services->driving_test->steering_system}}</td>
            <td><strong>دود اگزوز:</strong> {{$vip_services->driving_test->exhaust_smoke}}</td>
            <td><strong>صدای گیربکس:</strong> {{$vip_services->driving_test->transmission_sound}}</td>
        </tr>
        <tr>
            <td><strong>صفحه کلاچ:</strong> {{$vip_services->driving_test->clutch_plate}}</td>
            <td><strong>جلوبندی:</strong> {{$vip_services->driving_test->front_suspension}}</td>
            <td><strong>ترمزها:</strong> {{$vip_services->driving_test->brakes}}</td>
            <td><strong>دمای آب:</strong> {{$vip_services->driving_test->water_temperature}}</td>
        </tr>
        <tr>
            <td><strong>ترمز دستی:</strong> {{$vip_services->driving_test->handbrake}}</td>
            <td><strong>عملکرد درجا:</strong> {{$vip_services->driving_test->idle_performance}}</td>
            <td><strong>زاویه فرمان:</strong> {{$vip_services->driving_test->steering_angle}}</td>
            <td><strong>صدای اگزوز:</strong> {{$vip_services->driving_test->exhaust_sound}}</td>
        </tr>
    </table>    

    <h3>قولنامه و حقوقی</h3>
    <table>
        <tr>
            <td><strong>استعلام نظام وظیفه:</strong> {{$vip_services->legal->military_legal_inquiry}}</td>
            <td><strong>استعلام خلافی:</strong> {{$vip_services->legal->traffic_violation_inquiry}}</td>
            <td><strong>تنظیم قولنامه حقوقی:</strong> {{$vip_services->legal->legal_contract_setup}}</td>
            <td></td>
        </tr>
    </table>
    
    <h3>ارتقاء ظاهری خودرو</h3>
    <table>
        <tr>
            <td><strong>نانو تکنولوژی تضمینی:</strong> {{$vip_services->upgrade->guaranteed_nanotechnology}}</td>
            <td><strong>خط‌گیری:</strong> {{$vip_services->upgrade->line_removal}}</td>
            <td><strong>پولیش:</strong> {{$vip_services->upgrade->polishing}}</td>
            <td><strong>محافظ رنگ:</strong> {{$vip_services->upgrade->paint_protection}}</td>
        </tr>
        <tr>
            <td><strong>صافکاری تایید شده:</strong> {{$vip_services->upgrade->approved_bodywork}}</td>
            <td><strong>نقاشی تایید شده:</strong> {{$vip_services->upgrade->approved_painting}}</td>
            <td></td>
            <td></td>
        </tr>
    </table>    
</body>
</html>
