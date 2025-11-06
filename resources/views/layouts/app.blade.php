<x-theme.header />
<div id="layout-wrapper">
    <x-theme.navbar />
    <x-theme.sidebar />
    <div class="vertical-overlay"></div>
    <div class="main-content">
        @yield('content')
        <x-theme.copyrigth />
    </div>
</div>
<x-theme.footer />