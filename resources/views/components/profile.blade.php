@php
    $selectors = selectors();
    $base = 'storage/profiles/';
    $path = isset($profile->foto) ? $profile->utente_id. '/'.$profile->foto : 'default.jpg';
    $utente = session()->get('utente');
    $collegamenti = getNumCollegamenti($profile->utente_id);
    $ml = 'ml-4';
    $mt = 3;
@endphp

<div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 col-xs-12 mt-5 ml-md-4" id="mll">
    <div class="{{ $selectors['row'] }} justify-content-md-start mt-3">
        <div class="{{ $selectors['col'] }} {{ $selectors['border'] }}" id="profile_card" title="{{ $profile->utenteEmail }}">
            <div class="row">
                <div class="{{ $selectors['col'] }} bg-secondary" id="profile_bg">
                    <div class="row">
                        <img
                                id="profile_img"
                                src="{{ $base }}{{ $path }}"
                                alt="{{ $profile->utenteEmail }}"
                                class="rounded-circle mt-{{ $mt + 2 }} {{ $ml }}"
                        />
                    </div>
                </div>
                <div class="{{ $selectors['col'] }}5">
                    <div class="row">
                        <div class="{{ $selectors['col'] }}5" id="username-container">
                            <div class="row">
                                <h1 class="{{ $ml }} mt-{{ $mt + 1 }}">
                                    {{ $profile->utenteName }}
                                    {{ $profile->utenteSurname }}
                                </h1>
                            </div>
                        </div>
                        <div class="{{ $selectors['col'] }}">
                            <div class="row">
                                <x-lavora-presso
                                    lavoroPresso="{{ $profile->lavoroPresso}}"
                                    cond="{{ true }}"
                                />
                            </div>
                        </div>
                        <div class="{{ $selectors['col'] }}1">
                            <div class="row">
                                <h6 class="{{ $ml }}">
                                    Data di inizio Lavoro:
                                </h6>
                                <h6 class="ml-2">
                                    {{ $profile->dataInizioLavoro ?? 'no.'}}
                                </h6>
                            </div>
                        </div>
                        <div class="{{ $selectors['col'] }}2">
                            <div class="row">
                                @if($own_profile)
                                    <a href="/edit-profile">
                                        <button class="btn btn-primary {{ $selectors['border'] }} {{ $ml }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                @else
                                    @livewire('collegati', [
                                        'utenteMittente' => $utente->id,
                                        'utenteRicevente' => $profile->utente_id
                                    ])
                                @endif
                                <a href="{{ route('collegamenti') }}" title="Visualizza / modifica la lista collegamenti relativi a questo profilo.">
                                    <b
                                            class="text-primary ml-3 numero_collegamenti"
                                            id="collegamenti">
                                        {{ $collegamenti }}
                                    </b>
                                    <b class="text-primary ml-1 numero_collegamenti">
                                        Collegamenti
                                    </b>
                                </a>
                            </div>
                        </div>
                        <div class="{{ $selectors['col'] }}{{ $mt }} mb-2">
                            <div class="{{ $selectors['row'] }}">
                                <p class="text-dark big_font_size">
                                    {{ $profile->testo }}
                                </p>
                            </div>
                            <x-success />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>