<?php include_once MODX_MANAGER_PATH . 'includes/header.inc.php' ?>

<div class="module-page">
    <h1>
        <i class="fa fa-list"></i>
        @yield('pagetitle', Lang::get('example::global.main_caption'))
    </h1>

    @yield('buttons')

    <div class="sectionBody">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="tab-pane" id="documentPane">
            <script type="text/javascript">
                var tpModule = new WebFXTabPane(document.getElementById('documentPane'), false);
            </script>

            @yield('body')
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ MODX_BASE_URL }}assets/modules/example/css/style.css">
@stack('scripts')

<?php include_once MODX_MANAGER_PATH . 'includes/footer.inc.php' ?>
