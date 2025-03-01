@php
    $selectors = selectors();
@endphp

<!DOCTYPE html>
<html lang="{{ $selectors['lang'] }}" dir="{{ $selectors['dir'] }}">

<head>
    <x-head title="Iscriviti" />
    <link rel="stylesheet" type="text/css" href="/css/registrazione/index.css" />
</head>

<body>
<div class="{{ $selectors['container'] }}">
    <div class="{{ $selectors['col'] }}">
        <div class="{{ $selectors['row'] }}">
            @component('components.no-script')
            @endcomponent
            <div class="mt-4-5">
                <x-title />
            </div>
            <div class="{{ $selectors['col'] }}4">
                <div class="{{ $selectors['row'] }}">
                    <h5 id="subtitle">
                        get the most out of your professional life
                    </h5>
                </div>
            </div>
            <div class="col-xs-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 mt-4">
                <div class="{{ $selectors['row'] }}">
                    <div id="form-card" class="{{ $selectors['col'] }}3 p-4">
                        <form method="{{ $selectors['method'] }}" action="{{ route('insert-user') }}" id="profile-form" class="reg">
                            @csrf
                            <x-errors />
                            <div class="{{ $selectors['col'] }}">
                                <div class="row">
                                    <x-email label="{{ ucfirst($selectors['email']) }}"/>
                                </div>
                            </div>
                            <div class="{{ $selectors['col'] }}3">
                                <div class="row">
                                    <x-password label="Almeno {{ $selectors['passLen'] }} caratteri"/>
                                </div>
                            </div>
                            <div class="{{ $selectors['col'] }}3">
                                <div class="row">
                                    <x-text label="nome"/>
                                </div>
                            </div>
                            <div class="{{ $selectors['col'] }}3">
                                <div class="row">
                                    <x-text label="cognome" />
                                </div>
                            </div>
                            <div class="{{ $selectors['col'] }}3">
                                <div class="row">
                                    <label for="{{ $selectors['select2'] }}">
                                        {{ ucfirst($selectors['select2']) }}
                                    </label>
                                    <select
                                            class="{{ $selectors['input'] }}"
                                            name="{{ $selectors['select2'] }}"
                                            required>
                                        @component('components.option', [
                                            'data' => $citta,
                                            'selected' => old('citta')
                                        ])
                                        @endcomponent
                                    </select>
                                </div>
                            </div>
                            <div class="{{ $selectors['col'] }}3">
                                <div class="row">
                                    <label for="{{ $selectors['select1'] }}">
                                        {{ ucfirst($selectors['select1']) }}
                                    </label>
                                    <select
                                            class="{{ $selectors['input'] }}"
                                            id="{{ $selectors['select1']}}"
                                            name="{{ $selectors['select1'] }}">
                                        @component('components.option', [
                                           'data' => $lavori,
                                           'selected' => old('lavoro') ?? 'Disoccupato'
                                           ])
                                        @endcomponent
                                    </select>
                                </div>
                            </div>
                            <div class="{{ $selectors['col'] }}3">
                                <div class="row">
                                    <x-date />
                                </div>
                            </div>
                            <x-submit text="Iscriviti" mt="{{ 4 }}" />
                            <x-reset />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="/js/notification-script.js"></script>
<script type="text/javascript" src="js/login/index.js"></script>
<script type="text/javascript" src="js/registrazione/index.js"></script>
</body>
</html>