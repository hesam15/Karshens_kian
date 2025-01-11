<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Role;
use App\Models\User;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use App\Models\Options;
use App\Models\Customer;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('داشبورد', route('home'));
});

// Options List
Breadcrumbs::for('show.options', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('خدمات', route('show.options'));
});

// Create Option
Breadcrumbs::for('create.option', function (BreadcrumbTrail $trail) {
    $trail->parent('show.options');
    $trail->push('ایجاد خدمت', route('create.option'));
});

// Edit Option
Breadcrumbs::for('edit.option', function (BreadcrumbTrail $trail) {
    $option = Options::where('id', request()->route('id'))->first();

    $trail->parent('show.options');
    $trail->push($option->name, route('edit.option', $option->id));
});


// Customer Form
Breadcrumbs::for('customer.form', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('فرم مشتری', route('customer.form'));
});

// Users List
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('کاربران', route('users.index'));
});

// Create User
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('ایجاد کاربر', route('users.create'));
});

// Edit User
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail) {
    $user = User::where('id', request()->route('user')->id)->first();

    $trail->parent('users.index');
    $trail->push("{$user->name}", route('users.edit', $user));
});

// User Profile
Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('پروفایل کاربری', route('profile.edit'));
});

// Reports List
Breadcrumbs::for('reports.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('گزارشات', route('reports.index'));
});

// Create Report
Breadcrumbs::for('reports.create', function (BreadcrumbTrail $trail) {
    $trail->parent('reports.index');
    $trail->push('ایجاد گزارش', route('reports.create'));
});

// Edit Report
Breadcrumbs::for('reports.edit', function (BreadcrumbTrail $trail, $report) {
    $trail->parent('reports.index');
    $trail->push("ویرایش گزارش", route('reports.edit', $report));
});


//Roles
    // Roles List
    Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
        $trail->parent('home');
        $trail->push('نقش‌ها', route('roles.index'));
    });

    // Create Role
    Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
        $trail->parent('roles.index');
        $trail->push('ایجاد نقش', route('roles.create')); 
    });

    // Edit Role
    Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail) {
        $role = Role::where('id', request()->route('role')->id)->first();

        $trail->parent('roles.index');
        $trail->push("{$role->persian_name}", route('roles.edit', $role));
    });

//Customers
    //Customer list
    Breadcrumbs::for('customers.index', function (BreadcrumbTrail $trail) {
        $trail->parent('home');
        $trail->push('لیست مشتریان', route('customers.index'));
    });
    // Customer show
    Breadcrumbs::for('customers.show', function (BreadcrumbTrail $trail) {
        $customer = Customer::where('fullname', request()->route('name'))->first();

        $trail->parent('customers.index');
        $trail->push("{$customer->fullname}", route('customers.show', ['name' => $customer->fullname]));
    });

    // Customer create
    Breadcrumbs::for('customers.create', function (BreadcrumbTrail $trail) {
        $trail->parent('customers.index');
        $trail->push('ایجاد مشتری', route('customers.create'));
    });

    //Customer Bookings
    Breadcrumbs::for('customers.bookings', function (BreadcrumbTrail $trail) {
        $customer = Customer::where('fullname', request()->route('name'))->first();
        $trail->parent('customers.show', ['name' => $customer->fullname]);
        $trail->push('رزرو ها', route('customers.bookings', ['name' => $customer->fullname]));
    });

    //Booking
    //Bookings Index
    Breadcrumbs::for('bookings.create', function (BreadcrumbTrail $trail) {
        $customer = Customer::where('fullname', request()->route('name'))->first();

        $trail->parent('customers.show', ['name' => $customer->fullname]);
        $trail->push('رزرو', route('bookings.create', ['name' => $customer->fullname]));
    });

    //Cars create
    Breadcrumbs::for('cars.create', function (BreadcrumbTrail $trail) {
        $customer = Customer::where('fullname', request()->route('name'))->first();
        $trail->parent('customers.show', ['name' => $customer->fullname]);
        $trail->push('ایجاد خودرو', route('cars.create', ['name' => $customer->fullname]));
    });