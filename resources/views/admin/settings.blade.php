@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link {{ $activeTab == 'general' ? 'active' : '' }}" id="general-tab" data-bs-toggle="pill" href="#general" role="tab" aria-controls="general" aria-selected="{{ $activeTab == 'general' ? 'true' : 'false' }}">
                                        <i class="ri-settings-3-line d-block fs-20 mb-1"></i> General
                                    </a>
                                    <a class="nav-link {{ $activeTab == 'appearance' ? 'active' : '' }}" id="appearance-tab" data-bs-toggle="pill" href="#appearance" role="tab" aria-controls="appearance" aria-selected="{{ $activeTab == 'appearance' ? 'true' : 'false' }}">
                                        <i class="ri-palette-line d-block fs-20 mb-1"></i> Appearance
                                    </a>
                                    <a class="nav-link {{ $activeTab == 'notifications' ? 'active' : '' }}" id="notifications-tab" data-bs-toggle="pill" href="#notifications" role="tab" aria-controls="notifications" aria-selected="{{ $activeTab == 'notifications' ? 'true' : 'false' }}">
                                        <i class="ri-notification-3-line d-block fs-20 mb-1"></i> Notifications
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="tab-content text-muted mt-3 mt-lg-0">
                                    <div class="tab-pane fade {{ $activeTab == 'general' ? 'show active' : '' }}" id="general" role="tabpanel" aria-labelledby="general-tab">
                                        <h6>General Settings</h6>
                                        <form id="generalSettingsForm" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <ul class="nav nav-tabs mb-2" id="generalSettingsTabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="general-sub-tab" data-bs-toggle="tab" href="#general-sub" role="tab" aria-controls="general-sub" aria-selected="true">General</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="seo-sub-tab" data-bs-toggle="tab" href="#seo-sub" role="tab" aria-controls="seo-sub" aria-selected="false">SEO</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="social-sub-tab" data-bs-toggle="tab" href="#social-sub" role="tab" aria-controls="social-sub" aria-selected="false">Social Media</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="mail-sub-tab" data-bs-toggle="tab" href="#mail-sub" role="tab" aria-controls="mail-sub" aria-selected="false">Mail</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="system-sub-tab" data-bs-toggle="tab" href="#system-sub" role="tab" aria-controls="system-sub" aria-selected="false">System</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="generalSettingsTabsContent">
                                                <div class="tab-pane fade show active" id="general-sub" role="tabpanel" aria-labelledby="general-sub-tab">
                                                    <div class="row">
                                                        <div class="mb-2 col-md-4">
                                                            <label for="project_name">Project Name</label>
                                                            <input type="text" name="project_name" id="project_name" class="form-control" required>
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="time_zone" class="form-label">Time Zone</label>
                                                            <select name="time_zone" id="time_zone" class="form-select" required>
                                                                <option value="Asia/Kolkata" selected>India Standard Time (UTC +5:30)</option>
                                                                <option value="Asia/Dubai">Gulf Standard Time (UTC +4)</option>
                                                                <option value="Asia/Singapore">Singapore Standard Time (UTC +8)</option>
                                                                <option value="Asia/Tokyo">Japan Standard Time (UTC +9)</option>
                                                                <option value="Europe/London">Greenwich Mean Time (UTC +0)</option>
                                                                <option value="Europe/Berlin">Central European Time (UTC +1)</option>
                                                                <option value="America/New_York">Eastern Standard Time (UTC -5)</option>
                                                                <option value="America/Los_Angeles">Pacific Standard Time (UTC -8)</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="default_language" class="form-label">Default Language</label>
                                                            <select name="default_language" id="default_language" class="form-select" required>
                                                                <option value="English" selected>English</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-2 col-md-4">
                                                            <label for="site_url">Site URL</label>
                                                            <input type="url" name="site_url" id="site_url" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="contact_info">Contact Info</label>
                                                            <input type="text" name="contact_info" id="contact_info" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="logo">Logo</label>
                                                            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                                                            <div class="mt-1 d-flex align-items-center gap-3" id="logoContainer">
                                                                <a href="#" id="downloadLogoLink" style="display:none;" class="text-success" title="Download" download>
                                                                    <i class="ri-eye-line fs-5"></i>
                                                                </a>
                                                                <button type="button" id="deleteLogoBtn" style="display:none; background:none; border:none; padding:0;" title="Delete">
                                                                    <i class="ri-delete-bin-6-line text-danger fs-5"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 col-md-12">
                                                            <label for="site_description">Site Description</label>
                                                            <textarea name="site_description" id="site_description" class="form-control" rows="2"></textarea>
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="maintenance_mode">Maintenance Mode</label>
                                                            <select name="maintenance_mode" id="maintenance_mode" class="form-select">
                                                                <option value="1">Enabled</option>
                                                                <option value="0" selected>Disabled</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="seo-sub" role="tabpanel" aria-labelledby="seo-sub-tab">
                                                    <div class="row">
                                                        <div class="mb-2 col-md-4">
                                                            <label for="meta_title">Meta Title</label>
                                                            <input type="text" name="meta_title" id="meta_title" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="meta_keywords">Meta Keywords</label>
                                                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="meta_description">Meta Description</label>
                                                            <textarea name="meta_description" id="meta_description" class="form-control" rows="1"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="social-sub" role="tabpanel" aria-labelledby="social-sub-tab">
                                                    <div class="row">
                                                        <div class="mb-2 col-md-4">
                                                            <label for="facebook_url">Facebook URL</label>
                                                            <input type="url" name="facebook_url" id="facebook_url" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="twitter_url">Twitter URL</label>
                                                            <input type="url" name="twitter_url" id="twitter_url" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="instagram_url">Instagram URL</label>
                                                            <input type="url" name="instagram_url" id="instagram_url" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="linkedin_url">LinkedIn URL</label>
                                                            <input type="url" name="linkedin_url" id="linkedin_url" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="youtube_url">YouTube URL</label>
                                                            <input type="url" name="youtube_url" id="youtube_url" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="mail-sub" role="tabpanel" aria-labelledby="mail-sub-tab">
                                                    <div class="row">
                                                        <div class="mb-2 col-md-4">
                                                            <label for="mail_from_name">Mail From Name</label>
                                                            <input type="text" name="mail_from_name" id="mail_from_name" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="mail_from_address">Mail From Address</label>
                                                            <input type="email" name="mail_from_address" id="mail_from_address" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="mail_driver">Mail Driver</label>
                                                            <input type="text" name="mail_driver" id="mail_driver" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="mail_host">Mail Host</label>
                                                            <input type="text" name="mail_host" id="mail_host" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="mail_port">Mail Port</label>
                                                            <input type="number" name="mail_port" id="mail_port" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="mail_username">Mail Username</label>
                                                            <input type="text" name="mail_username" id="mail_username" class="form-control">
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="mail_encryption">Mail Encryption</label>
                                                            <input type="text" name="mail_encryption" id="mail_encryption" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="system-sub" role="tabpanel" aria-labelledby="system-sub-tab">
                                                    <div class="row">
                                                        <div class="mb-2 col-md-4">
                                                            <label for="enable_registration">Enable Registration</label>
                                                            <select name="enable_registration" id="enable_registration" class="form-select">
                                                                <option value="1">Enabled</option>
                                                                <option value="0" selected>Disabled</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label for="currency">Currency</label>
                                                            <select name="currency" id="currency" class="form-select">
                                                                <option value="INR" selected>INR (₹)</option>
                                                                <option value="USD">$ USD</option>
                                                                <option value="EUR">€ EUR</option>
                                                                <option value="GBP">£ GBP</option>
                                                                <option value="JPY">¥ JPY</option>
                                                                <option value="AED">AED (د.إ)</option>
                                                                <option value="AUD">$ AUD</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-2 col-md-4">
                                                            <label for="date_format">Date Format</label>
                                                            <select name="date_format" id="date_format" class="form-select">
                                                                <option value="d-m-Y" selected>DD-MM-YYYY</option>
                                                                <option value="m-d-Y">MM-DD-YYYY</option>
                                                                <option value="Y-m-d">YYYY-MM-DD</option>
                                                                <option value="d/m/Y">DD/MM/YYYY</option>
                                                                <option value="m/d/Y">MM/DD/YYYY</option>
                                                                <option value="Y/m/d">YYYY/MM/DD</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">Save Settings</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade {{ $activeTab == 'notifications' ? 'show active' : '' }}" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                                        <h6>Notifications Settings</h6>
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="mb-2 form-check">
                                                <input type="checkbox" class="form-check-input" id="adminAlerts"
                                                    name="admin_alerts">
                                                <label class="form-check-label" for="adminAlerts">Enable Admin
                                                    Alerts</label>
                                            </div>
                                            <div class="mb-2">
                                                <label for="notificationChannel" class="form-label">Notification
                                                    Channel</label>
                                                <select class="form-select" id="notificationChannel"
                                                    name="notification_channel" required>
                                                    <option value="email">Email</option>
                                                    <option value="slack">Slack</option>
                                                    <option value="sms">SMS</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade {{ $activeTab == 'appearance' ? 'show active' : '' }}" id="appearance" role="tabpanel" aria-labelledby="appearance-tab">
                                        <h6>Appearance Settings</h6>
                                        <form method="POST" action="">
                                            @csrf
                                            <div data-simplebar class="h-100">
                                                <div class="p-1">
                                                    <h6 class="mb-0 fw-semibold text-uppercase">Layout</h6>
                                                    <p class="text-muted">Choose your layout</p>
                                                    <div class="row gy-3">
                                                        <div class="col-3">
                                                            <div class="form-check card-radio">
                                                                <input id="customizer-layout01" name="data-layout"
                                                                    type="radio" value="vertical"
                                                                    class="form-check-input">
                                                                <label
                                                                    class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                    for="customizer-layout01">
                                                                    <span class="d-flex gap-1 h-100">
                                                                        <span class="flex-shrink-0">
                                                                            <span
                                                                                class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                <span
                                                                                    class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="flex-grow-1">
                                                                            <span class="d-flex h-100 flex-column">
                                                                                <span
                                                                                    class="bg-light d-block p-1"></span>
                                                                                <span
                                                                                    class="bg-light d-block p-1 mt-auto"></span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <h5 class="fs-13 text-center mt-2">Vertical</h5>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check card-radio">
                                                                <input id="customizer-layout02" name="data-layout"
                                                                    type="radio" value="horizontal"
                                                                    class="form-check-input">
                                                                <label
                                                                    class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                    for="customizer-layout02">
                                                                    <span class="d-flex h-100 flex-column gap-1">
                                                                        <span
                                                                            class="bg-light d-flex p-1 gap-1 align-items-center">
                                                                            <span
                                                                                class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                                            <span
                                                                                class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                                            <span
                                                                                class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                                                        </span>
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-switch form-switch-md mb-2 mt-4">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="sidebarUserProfile" name="sidebar_user_profile">
                                                        <label class="form-check-label" for="sidebarUserProfile">Sidebar User Profile Avatar</label>
                                                    </div>
                                                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Theme</h6>
                                                    <p class="text-muted">Choose your suitable Theme.</p>
                                                    <div class="row">
                                                        @foreach ([['id' => 'customizer-theme01', 'value' => 'default', 'label' => 'Default'], ['id' => 'customizer-theme02', 'value' => 'saas', 'label' => 'Sass'], ['id' => 'customizer-theme03', 'value' => 'corporate', 'label' => 'Corporate'], ['id' => 'customizer-theme04', 'value' => 'galaxy', 'label' => 'Galaxy'], ['id' => 'customizer-theme05', 'value' => 'material', 'label' => 'Material'], ['id' => 'customizer-theme06', 'value' => 'creative', 'label' => 'Creative'], ['id' => 'customizer-theme07', 'value' => 'minimal', 'label' => 'Minimal'], ['id' => 'customizer-theme08', 'value' => 'modern', 'label' => 'Modern'], ['id' => 'customizer-theme09', 'value' => 'interactive', 'label' => 'Interactive'], ['id' => 'customizer-theme10', 'value' => 'classic', 'label' => 'Classic'], ['id' => 'customizer-theme11', 'value' => 'vintage', 'label' => 'Vintage']] as $theme)
                                                        <div class="col-3">
                                                            <div class="form-check card-radio">
                                                                <input id="{{ $theme['id'] }}" name="data-theme"
                                                                    type="radio" value="{{ $theme['value'] }}"
                                                                    class="form-check-input">
                                                                <label class="form-check-label p-0"
                                                                    for="{{ $theme['id'] }}">
                                                                    <img src="{{ asset('assets/images/demos/' . $theme['value'] . '.png') }}"
                                                                        alt="" class="img-fluid">
                                                                </label>
                                                            </div>
                                                            <h5 class="fs-13 text-center fw-medium mt-2">
                                                                {{ $theme['label'] }}
                                                            </h5>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Color Scheme</h6>
                                                    <p class="text-muted">Choose Light or Dark Scheme.</p>
                                                    <div class="colorscheme-cardradio">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-bs-theme" id="layout-mode-light"
                                                                        value="light">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="layout-mode-light">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Light</h5>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check card-radio dark">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-bs-theme" id="layout-mode-dark"
                                                                        value="dark">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 bg-dark material-shadow"
                                                                        for="layout-mode-dark">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-white bg-opacity-10 d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-white bg-opacity-10 d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-white bg-opacity-10 d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Dark</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="sidebar-visibility">
                                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar
                                                            Visibility
                                                        </h6>
                                                        <p class="text-muted">Choose Show or Hidden sidebar.</p>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-sidebar-visibility"
                                                                        id="sidebar-visibility-show" value="show">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="sidebar-visibility-show">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0 p-1">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span
                                                                                    class="d-flex h-100 flex-column pt-1 pe-2">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Show</h5>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-sidebar-visibility"
                                                                        id="sidebar-visibility-hidden" value="hidden">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 px-2 material-shadow"
                                                                        for="sidebar-visibility-hidden">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-grow-1">
                                                                                <span
                                                                                    class="d-flex h-100 flex-column pt-1 px-2">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Hidden</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="layout-width">
                                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Width
                                                        </h6>
                                                        <p class="text-muted">Choose Fluid or Boxed layout.</p>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-layout-width" id="layout-width-fluid"
                                                                        value="fluid">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="layout-width-fluid">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Fluid</h5>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-layout-width" id="layout-width-boxed"
                                                                        value="boxed">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 px-2 material-shadow"
                                                                        for="layout-width-boxed">
                                                                        <span
                                                                            class="d-flex gap-1 h-100 border-start border-end">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Boxed</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="layout-position">
                                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout
                                                            Position
                                                        </h6>
                                                        <p class="text-muted">Choose Fixed or Scrollable Layout
                                                            Position.
                                                        </p>
                                                        <div class="btn-group radio" role="group">
                                                            <input type="radio" class="btn-check"
                                                                name="data-layout-position" id="layout-position-fixed"
                                                                value="fixed">
                                                            <label class="btn btn-light w-sm"
                                                                for="layout-position-fixed">Fixed</label>
                                                            <input type="radio" class="btn-check"
                                                                name="data-layout-position"
                                                                id="layout-position-scrollable" value="scrollable">
                                                            <label class="btn btn-light w-sm ms-0"
                                                                for="layout-position-scrollable">Scrollable</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Topbar Color</h6>
                                                    <p class="text-muted">Choose Light or Dark Topbar Color.</p>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="form-check card-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="data-topbar" id="topbar-color-light"
                                                                    value="light">
                                                                <label
                                                                    class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                    for="topbar-color-light">
                                                                    <span class="d-flex gap-1 h-100">
                                                                        <span class="flex-shrink-0">
                                                                            <span
                                                                                class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                <span
                                                                                    class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="flex-grow-1">
                                                                            <span class="d-flex h-100 flex-column">
                                                                                <span
                                                                                    class="bg-light d-block p-1"></span>
                                                                                <span
                                                                                    class="bg-light d-block p-1 mt-auto"></span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <h5 class="fs-13 text-center mt-2">Light</h5>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check card-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="data-topbar" id="topbar-color-dark"
                                                                    value="dark">
                                                                <label
                                                                    class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                    for="topbar-color-dark">
                                                                    <span class="d-flex gap-1 h-100">
                                                                        <span class="flex-shrink-0">
                                                                            <span
                                                                                class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                <span
                                                                                    class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="flex-grow-1">
                                                                            <span class="d-flex h-100 flex-column">
                                                                                <span
                                                                                    class="bg-primary d-block p-1"></span>
                                                                                <span
                                                                                    class="bg-light d-block p-1 mt-auto"></span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <h5 class="fs-13 text-center mt-2">Dark</h5>
                                                        </div>
                                                    </div>
                                                    <div id="sidebar-size">
                                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Size
                                                        </h6>
                                                        <p class="text-muted">Choose a size of Sidebar.</p>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-sidebar-size"
                                                                        id="sidebar-size-default" value="lg">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="sidebar-size-default">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Default</h5>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-sidebar-size"
                                                                        id="sidebar-size-compact" value="md">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="sidebar-size-compact">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 bg-primary-subtle rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Compact</h5>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-sidebar-size" id="sidebar-size-small"
                                                                        value="sm">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="sidebar-size-small">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1">
                                                                                    <span
                                                                                        class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Small (Icon View)
                                                                </h5>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-sidebar-size"
                                                                        id="sidebar-size-small-hover" value="sm-hover">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="sidebar-size-small-hover">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1">
                                                                                    <span
                                                                                        class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Small Hover View
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="sidebar-view">
                                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar View
                                                        </h6>
                                                        <p class="text-muted">Choose Default or Detached Sidebar view.
                                                        </p>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-layout-style"
                                                                        id="sidebar-view-default" value="default">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="sidebar-view-default">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Default</h5>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-layout-style"
                                                                        id="sidebar-view-detached" value="detached">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="sidebar-view-detached">
                                                                        <span class="d-flex h-100 flex-column">
                                                                            <span
                                                                                class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                                                <span
                                                                                    class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                                                <span
                                                                                    class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                                                <span
                                                                                    class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                                                            </span>
                                                                            <span class="d-flex gap-1 h-100 p-1 px-2">
                                                                                <span class="flex-shrink-0">
                                                                                    <span
                                                                                        class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                        <span
                                                                                            class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                        <span
                                                                                            class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                        <span
                                                                                            class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                            <span
                                                                                class="bg-light d-block p-1 mt-auto px-2"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Detached</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="sidebar-color-setting">
                                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Color
                                                        </h6>
                                                        <p class="text-muted">Choose a color of Sidebar.</p>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-sidebar" id="sidebar-color-light"
                                                                        value="light">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="sidebar-color-light">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Light</h5>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-sidebar" id="sidebar-color-dark"
                                                                        value="dark">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="sidebar-color-dark">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Dark</h5>
                                                            </div>
                                                            <div class="col-3">
                                                                <button
                                                                    class="btn btn-link avatar-md w-100 p-0 overflow-hidden border"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseBgGradient"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseBgGradient">
                                                                    <span class="d-flex gap-1 h-100">
                                                                        <span class="flex-shrink-0">
                                                                            <span
                                                                                class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
                                                                                <span
                                                                                    class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                                                <span
                                                                                    class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="flex-grow-1">
                                                                            <span class="d-flex h-100 flex-column">
                                                                                <span
                                                                                    class="bg-light d-block p-1"></span>
                                                                                <span
                                                                                    class="bg-light d-block p-1 mt-auto"></span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </button>
                                                                <h5 class="fs-13 text-center mt-2">Gradient</h5>
                                                            </div>
                                                        </div>
                                                        <div class="collapse" id="collapseBgGradient">
                                                            <div
                                                                class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">
                                                                @foreach ([['id' => 'sidebar-color-gradient', 'value' => 'gradient'], ['id' => 'sidebar-color-gradient-2', 'value' => 'gradient-2'], ['id' => 'sidebar-color-gradient-3', 'value' => 'gradient-3'], ['id' => 'sidebar-color-gradient-4', 'value' => 'gradient-4']] as $gradient)
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-sidebar" id="{{ $gradient['id'] }}"
                                                                        value="{{ $gradient['value'] }}">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-xs rounded-circle"
                                                                        for="{{ $gradient['id'] }}">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-vertical-{{ $gradient['value'] }}"></span>
                                                                    </label>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="sidebar-img">
                                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Images
                                                        </h6>
                                                        <p class="text-muted">Choose a image of Sidebar.</p>
                                                        <div class="d-flex gap-2 flex-wrap img-switch">
                                                            <div class="form-check sidebar-setting card-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="data-sidebar-image" id="sidebarimg-none"
                                                                    value="none">
                                                                <label class="form-check-label p-0 avatar-sm h-auto"
                                                                    for="sidebarimg-none">
                                                                    <span
                                                                        class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
                                                                        <i class="ri-close-fill fs-20"></i>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            @foreach (['img-1', 'img-2', 'img-3', 'img-4'] as $img)
                                                            <div class="form-check sidebar-setting card-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="data-sidebar-image"
                                                                    id="sidebarimg-{{ str_replace('-', '', $img) }}"
                                                                    value="{{ $img }}">
                                                                <label class="form-check-label p-0 avatar-sm h-auto"
                                                                    for="sidebarimg-{{ str_replace('-', '', $img) }}">
                                                                    <img src="{{ asset('assets/images/sidebar/' . $img . '.jpg') }}"
                                                                        alt=""
                                                                        class="avatar-md w-auto object-fit-cover">
                                                                </label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div id="primary-color">
                                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Primary Color
                                                        </h6>
                                                        <p class="text-muted">Choose a color of Primary.</p>
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach ([['id' => 'themeColor-01', 'value' => 'default'], ['id' => 'themeColor-02', 'value' => 'green'], ['id' => 'themeColor-03', 'value' => 'purple'], ['id' => 'themeColor-04', 'value' => 'blue']] as $color)
                                                            <div class="form-check sidebar-setting card-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="data-theme-colors" id="{{ $color['id'] }}"
                                                                    value="{{ $color['value'] }}">
                                                                <label class="form-check-label avatar-xs p-0"
                                                                    for="{{ $color['id'] }}">
                                                                    <span
                                                                        class="avatar-title rounded-circle bg-{{ $color['value'] }}"></span>
                                                                </label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div id="preloader-menu">
                                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Preloader</h6>
                                                        <p class="text-muted">Choose a preloader.</p>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-preloader" id="preloader-view-custom"
                                                                        value="enable">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="preloader-view-custom">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                        <div id="status"
                                                                            class="d-flex align-items-center justify-content-center">
                                                                            <div class="spinner-border text-primary avatar-xxs m-auto"
                                                                                role="status">
                                                                                <span
                                                                                    class="visually-hidden">Loading...</span>
                                                                            </div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Enable</h5>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check sidebar-setting card-radio">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="data-preloader" id="preloader-view-none"
                                                                        value="disable">
                                                                    <label
                                                                        class="form-check-label p-0 avatar-md w-100 material-shadow"
                                                                        for="preloader-view-none">
                                                                        <span class="d-flex gap-1 h-100">
                                                                            <span class="flex-shrink-0">
                                                                                <span
                                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                                    <span
                                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                    <span
                                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="flex-grow-1">
                                                                                <span class="d-flex h-100 flex-column">
                                                                                    <span
                                                                                        class="bg-light d-block p-1"></span>
                                                                                    <span
                                                                                        class="bg-light d-block p-1 mt-auto"></span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="fs-13 text-center mt-2">Disable</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" id="save-theme-settings"
                                                class="btn btn-primary mt-3">Save Settings</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('custom/js/pages/setting.js') }}"></script>
@endpush